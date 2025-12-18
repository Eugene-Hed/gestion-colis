<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Simple env loader
function env($key, $default = null) {
    if (file_exists(__DIR__.'/../.env')) {
        static $data = null;
        if ($data === null) {
            $data = [];
            $lines = file(__DIR__.'/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) continue;
                [$k, $v] = array_map('trim', explode('=', $line, 2) + [1 => '']);
                $data[$k] = $v;
            }
        }
        if (array_key_exists($key, $data)) return $data[$key];
    }
    $val = getenv($key);
    return $val === false ? $default : $val;
}

require_once __DIR__ . '/../src/Database.php';
require_once __DIR__ . '/../src/FileBasedDatabase.php';
require_once __DIR__ . '/../src/ShipmentModel.php';
require_once __DIR__ . '/../src/Notifications.php';

$db = Colis\Database::getInstance();
$model = new Colis\ShipmentModel($db);
$notifier = new Colis\Notifications();

$route = $_GET['route'] ?? $_POST['route'] ?? 'home';

function render($template, $vars = []) {
    extract($vars);
    include __DIR__ . '/../templates/layout.php';
}

// Routes
if ($route === 'home') {
    render('home');
    exit;
}

if ($route === 'dashboard') {
    $shipments = $model->getAll();
    render('dashboard', ['shipments' => $shipments]);
    exit;
}

if ($route === 'list') {
    $shipments = $model->getAll();
    render('list', ['shipments' => $shipments]);
    exit;
}

if ($route === 'new' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    render('form');
    exit;
}

if ($route === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'sender_name' => $_POST['sender_name'] ?? '',
        'sender_phone' => $_POST['sender_phone'] ?? '',
        'sender_email' => $_POST['sender_email'] ?? '',
        'receiver_name' => $_POST['receiver_name'] ?? '',
        'receiver_phone' => $_POST['receiver_phone'] ?? '',
        'receiver_email' => $_POST['receiver_email'] ?? '',
        'description' => $_POST['description'] ?? '',
        'value' => floatval($_POST['value'] ?? 0)
    ];
    $id = $model->createShipment($data);
    $notifier->notifyRegistration($data);
    header('Location: ?route=view&id='.$id);
    exit;
}

if ($route === 'view' && isset($_GET['id'])) {
    $s = $model->getById((int)$_GET['id']);
    render('view', ['s' => $s]);
    exit;
}

if ($route === 'arrive' && isset($_GET['id'])) {
    $model->markArrived((int)$_GET['id']);
    $s = $model->getById((int)$_GET['id']);
    $notifier->notifyArrival($s);
    header('Location: ?route=view&id=' . (int)$_GET['id']);
    exit;
}

if ($route === 'pickup' && isset($_GET['id'])) {
    $model->markPickedUp((int)$_GET['id']);
    $s = $model->getById((int)$_GET['id']);
    $notifier->notifyPickup($s);
    header('Location: ?route=view&id=' . (int)$_GET['id']);
    exit;
}

// default
header('Location: ?route=list');
