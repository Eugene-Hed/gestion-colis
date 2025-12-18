<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Database.php';
require_once __DIR__ . '/src/FileBasedDatabase.php';
require_once __DIR__ . '/src/Notifications.php';

// Charge .env
function env($key, $default = null) {
    if (file_exists(__DIR__.'/.env')) {
        static $data = null;
        if ($data === null) {
            $data = [];
            $lines = file(__DIR__.'/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) continue;
                [$k, $v] = array_map('trim', explode('=', $line, 2) + [1 => '']);
                $data[$k] = $v;
            }
        }
        if (array_key_exists($key, $data)) return $data[$key];
    }
    return getenv($key) ?: $default;
}

use Colis\Notifications;

echo "🧪 TEST ENVOI EMAIL\n";
echo "═══════════════════════════════════════════\n\n";

$notifier = new Notifications();

// Données de test
$testData = [
    'sender_name' => 'Test Sender',
    'sender_phone' => '+237670123456',
    'sender_email' => env('MAIL_USER'), // Envoie à toi-même
    'receiver_name' => 'Test Receiver',
    'receiver_phone' => '+237671234567',
    'receiver_email' => env('MAIL_USER'),
    'description' => 'Test item',
    'value' => 100000
];

echo "📧 Envoi email de test à : " . $testData['sender_email'] . "\n\n";

// Test 1 : Email d'enregistrement
echo "Test 1 : Notification d'enregistrement\n";
echo "─────────────────────────────────────\n";
$result = $notifier->sendEmail(
    $testData['sender_email'],
    $testData['sender_name'],
    'Test — Colis enregistré',
    '<h1>Bonjour ' . htmlspecialchars($testData['sender_name']) . '</h1>
    <p>Votre colis pour <strong>' . htmlspecialchars($testData['receiver_name']) . '</strong> a été enregistré.</p>
    <p><strong>Valeur :</strong> ' . htmlspecialchars($testData['value']) . ' FCFA</p>
    <p><strong>Prix (10%) :</strong> ' . round($testData['value'] * 0.10, 2) . ' FCFA</p>
    <p>Merci d\'utiliser notre service !</p>'
);

if ($result) {
    echo "✅ Email d'enregistrement envoyé avec succès !\n\n";
} else {
    echo "❌ Erreur lors de l'envoi. Vérifie .env et les logs.\n\n";
}

// Test 2 : Email d'arrivée
echo "Test 2 : Notification d'arrivée\n";
echo "────────────────────────────────\n";
$result = $notifier->sendEmail(
    $testData['receiver_email'],
    $testData['receiver_name'],
    'Test — Colis arrivé en agence',
    '<h1>Bonjour ' . htmlspecialchars($testData['receiver_name']) . '</h1>
    <p>Votre colis est <strong>arrivé en agence</strong> !</p>
    <p>Veuillez passer pour le récupérer dès que possible.</p>'
);

if ($result) {
    echo "✅ Email d'arrivée envoyé avec succès !\n\n";
} else {
    echo "❌ Erreur lors de l'envoi.\n\n";
}

// Test 3 : Email de retrait
echo "Test 3 : Notification de retrait\n";
echo "─────────────────────────────────\n";
$result = $notifier->sendEmail(
    $testData['sender_email'],
    $testData['sender_name'],
    'Test — Colis retiré',
    '<h1>Bonjour ' . htmlspecialchars($testData['sender_name']) . '</h1>
    <p>Le colis pour <strong>' . htmlspecialchars($testData['receiver_name']) . '</strong> a été <strong>retiré</strong>.</p>
    <p>Livraison confirmée ! ✓</p>'
);

if ($result) {
    echo "✅ Email de retrait envoyé avec succès !\n\n";
} else {
    echo "❌ Erreur lors de l'envoi.\n\n";
}

echo "═══════════════════════════════════════════\n";
echo "✨ Test termité ! Vérifie ta boîte email.\n";
echo "═══════════════════════════════════════════\n";
