<?php
// Arquivo para processar formulários e ações
require_once 'config.php';

// Função para validar e sanitizar dados
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Função para validar email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Função para validar telefone brasileiro
function validatePhone($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    return strlen($phone) >= 10 && strlen($phone) <= 11;
}

// Processar formulário de contato
if ($_POST['action'] === 'contact') {
    $response = ['success' => false, 'message' => ''];
    
    $name = sanitizeInput($_POST['name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $phone = sanitizeInput($_POST['phone'] ?? '');
    $event_date = sanitizeInput($_POST['event_date'] ?? '');
    $event_location = sanitizeInput($_POST['event_location'] ?? '');
    $guests = sanitizeInput($_POST['guests'] ?? '');
    $message = sanitizeInput($_POST['message'] ?? '');
    
    // Validações
    if (empty($name)) {
        $response['message'] = 'Nome é obrigatório.';
    } elseif (empty($phone) || !validatePhone($phone)) {
        $response['message'] = 'Telefone válido é obrigatório.';
    } elseif (!empty($email) && !validateEmail($email)) {
        $response['message'] = 'Email inválido.';
    } else {
        // Salvar lead no arquivo
        $lead_data = [
            'timestamp' => date('Y-m-d H:i:s'),
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'event_date' => $event_date,
            'event_location' => $event_location,
            'guests' => $guests,
            'message' => $message,
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
        ];
        
        // Salvar em arquivo CSV
        $csv_file = 'data/leads.csv';
        if (!file_exists('data')) {
            mkdir('data', 0755, true);
        }
        
        $file_exists = file_exists($csv_file);
        $fp = fopen($csv_file, 'a');
        
        if (!$file_exists) {
            // Cabeçalho do CSV
            fputcsv($fp, array_keys($lead_data));
        }
        
        fputcsv($fp, $lead_data);
        fclose($fp);
        
        // Gerar mensagem personalizada para WhatsApp
        $whatsapp_message = "🎉 *NOVO LEAD DO SITE* 🎉\n\n";
        $whatsapp_message .= "👤 *Nome:* {$name}\n";
        $whatsapp_message .= "📱 *Telefone:* {$phone}\n";
        if (!empty($email)) {
            $whatsapp_message .= "📧 *Email:* {$email}\n";
        }
        if (!empty($event_date)) {
            $whatsapp_message .= "📅 *Data do Evento:* {$event_date}\n";
        }
        if (!empty($event_location)) {
            $whatsapp_message .= "📍 *Local:* {$event_location}\n";
        }
        if (!empty($guests)) {
            $whatsapp_message .= "👥 *Convidados:* {$guests}\n";
        }
        if (!empty($message)) {
            $whatsapp_message .= "💬 *Mensagem:* {$message}\n";
        }
        $whatsapp_message .= "\n⏰ *Recebido em:* " . date('d/m/Y H:i');
        
        $response['success'] = true;
        $response['message'] = 'Dados enviados com sucesso! Entraremos em contato em breve.';
        $response['whatsapp_url'] = getWhatsAppLink('contato') . '&text=' . urlencode($whatsapp_message);
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Processar contador de visitas
if ($_POST['action'] === 'track_visit') {
    $visits_file = 'data/visits.txt';
    if (!file_exists('data')) {
        mkdir('data', 0755, true);
    }
    
    $current_visits = file_exists($visits_file) ? (int)file_get_contents($visits_file) : 0;
    $current_visits++;
    file_put_contents($visits_file, $current_visits);
    
    header('Content-Type: application/json');
    echo json_encode(['visits' => $current_visits]);
    exit;
}

// Redirecionar para página principal se acessado diretamente
header('Location: index.php');
exit;
?>

