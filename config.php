<?php
// Configurações gerais do site
define('SITE_NAME', 'Recanto Estações');
define('SITE_DESCRIPTION', 'Estações de Festa para Eventos Inesquecíveis');
define('WHATSAPP_NUMBER', '5521981749450');
define('BASE_URL', '/');

// Configurações de contato
define('CONTACT_EMAIL', 'contato@recantoestacoes.com.br');
define('CONTACT_PHONE', '(21) 98174-9450');

// Configurações de preços
define('PROMO_PRICE', 899);
define('PROMO_INSTALLMENTS', 3);
define('PROMO_INSTALLMENT_VALUE', 299.67);

// Timezone
date_default_timezone_set('America/Sao_Paulo');

// Função para incluir arquivos de forma segura
function includeFile($file) {
    $filePath = __DIR__ . '/includes/' . $file . '.php';
    if (file_exists($filePath)) {
        include $filePath;
    }
}

// Função para gerar URLs de assets
function asset($path) {
    return BASE_URL . $path;
}

// Função para gerar mensagens do WhatsApp
function getWhatsAppMessage($type = 'geral') {
    $messages = [
        'geral' => 'Olá! Gostaria de saber mais sobre as estações para festa do Recanto Estações.',
        'megapromocao' => 'Olá! Tenho interesse na MEGA PROMOÇÃO: 4 ESTAÇÕES POR 3 HORAS até 100 convidados por R$ 899. Quero RESERVAR minha data!',
        'promocao' => 'Olá! Tenho interesse na MEGA PROMOÇÃO das 4 estações por R$ 899. Gostaria de mais informações!',
        'estacoes' => 'Olá! Quero contratar todas as 4 estações: Pipoca, Açaí, Crepe e Algodão Doce. Podem me enviar mais detalhes?',
        'reserva' => 'Olá! Quero RESERVAR minha data para as estações de festa. Como posso pagar o sinal de R$ 200?',
        'contato' => 'Olá! Gostaria de falar com um especialista sobre as estações para minha festa.',
        'float' => 'Olá! Vim pelo site e gostaria de saber mais sobre as estações para festa.'
    ];
    
    return isset($messages[$type]) ? $messages[$type] : $messages['geral'];
}

// Função para gerar link do WhatsApp
function getWhatsAppLink($type = 'geral') {
    $message = getWhatsAppMessage($type);
    return 'https://wa.me/' . WHATSAPP_NUMBER . '?text=' . urlencode($message);
}
?>

