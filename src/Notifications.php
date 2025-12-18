<?php
namespace Colis;

use PHPMailer\PHPMailer\PHPMailer;

class Notifications {
    private $mailConfig = [];

    public function __construct()
    {
        // Load .env variables
        $this->loadEnv();
        
        $this->mailConfig = [
            'host' => $this->getEnv('MAIL_HOST'),
            'port' => $this->getEnv('MAIL_PORT'),
            'user' => $this->getEnv('MAIL_USER'),
            'pass' => $this->getEnv('MAIL_PASS'),
            'from' => $this->getEnv('MAIL_FROM') ?: ($this->getEnv('MAIL_USER') ?: 'no-reply@example.com'),
            'from_name' => $this->getEnv('MAIL_FROM_NAME') ?: 'Colis Agence'
        ];
    }

    private function loadEnv()
    {
        if (!file_exists(__DIR__ . '/../.env')) {
            return;
        }
        
        $lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;
            [$k, $v] = array_map('trim', explode('=', $line, 2) + [1 => '']);
            if ($k && !getenv($k)) {
                putenv("$k=$v");
            }
        }
    }

    private function getEnv($key, $default = null)
    {
        $val = getenv($key);
        return $val !== false ? $val : $default;
    }

    public function sendEmail($to, $toName, $subject, $body)
    {
        // if no SMTP config, skip but log to file
        if (!$this->mailConfig['host']) {
            error_log("[Notifications] Email skipped (no MAIL_HOST) to $to: $subject");
            return false;
        }

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = $this->mailConfig['host'];
            $mail->Port = (int)($this->mailConfig['port'] ?: 587);
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Important for Gmail
            $mail->Username = $this->mailConfig['user'];
            $mail->Password = $this->mailConfig['pass'];
            $mail->setFrom($this->mailConfig['from'], $this->mailConfig['from_name']);
            $mail->addAddress($to, $toName);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->SMTPDebug = 0; // Set to 2 for debugging
            $mail->send();
            error_log("[Notifications] ✓ Email sent to $to: $subject");
            return true;
        } catch (\Exception $e) {
            error_log('[Notifications] ✗ Mail error to ' . $to . ': ' . $e->getMessage());
            return false;
        }
    }

    public function sendSMS($phone, $message)
    {
        // Twilio not implemented inline; if TWILIO_* set, user can expand
        if (!getenv('TWILIO_SID') || !getenv('TWILIO_TOKEN')) {
            error_log("[Notifications] SMS skipped to $phone: $message");
            return false;
        }
        // For real SMS, integrate Twilio SDK. Currently we just log.
        return false;
    }

    public function notifyRegistration(array $data)
    {
        $sub = 'Colis enregistré';
        $body = "Bonjour {$data['sender_name']},<br>Votre colis pour {$data['receiver_name']} a été enregistré. Prix estimé: {$data['value']} FCFA (10% = " . round($data['value']*0.10,2) . " ).";
        if (!empty($data['sender_email'])) $this->sendEmail($data['sender_email'], $data['sender_name'], $sub, $body);
        if (!empty($data['sender_phone'])) $this->sendSMS($data['sender_phone'], strip_tags($body));
    }

    public function notifyArrival(array $s)
    {
        $sub = 'Colis arrivé en agence';
        $body = "Bonjour {$s['receiver_name']},<br>Votre colis est arrivé en agence. Veuillez passer pour le récupérer.";
        if (!empty($s['receiver_email'])) $this->sendEmail($s['receiver_email'], $s['receiver_name'], $sub, $body);
        if (!empty($s['receiver_phone'])) $this->sendSMS($s['receiver_phone'], strip_tags($body));
    }

    public function notifyPickup(array $s)
    {
        $sub = 'Colis retiré';
        $body = "Bonjour {$s['sender_name']},<br>Le colis pour {$s['receiver_name']} a été retiré. Statut: retiré.";
        if (!empty($s['sender_email'])) $this->sendEmail($s['sender_email'], $s['sender_name'], $sub, $body);
        if (!empty($s['sender_phone'])) $this->sendSMS($s['sender_phone'], strip_tags($body));
    }
}
