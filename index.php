<?php
/**
 * Recanto Estações - Landing Page PHP
 * Conversão exata do site https://matzsrsb.manus.space/
 */

// Configurações do site
$config = [
    'site' => [
        'title' => 'Recanto Estações - Estações de Festa para Eventos Inesquecíveis',
        'description' => 'Torne sua festa inesquecível com nossas 4 estações: Pipoca, Açaí, Crepe e Algodão Doce. Promoção especial R$ 899 - Parcelamos em 3x sem juros!',
        'whatsapp' => '5521981749450',
        'whatsapp_display' => '(21) 98174-9450',
        'pix' => '59.308.447/00017-75'
    ],
    'promocao' => [
        'preco' => '899',
        'parcelamento' => '3x sem juros de R$ 299,67',
        'sinal' => '100'
    ]
];

// Função para gerar links do WhatsApp
function gerarWhatsApp($tipo) {
    global $config;
    $numero = $config['site']['whatsapp'];
    
    $mensagens = [
        'megapromocao' => 'Olá! Tenho interesse na MEGA PROMOÇÃO: 4 ESTAÇÕES POR 3 HORAS até 100 convidados por R$ 899. Quero RESERVAR minha data!',
        'geral' => 'Olá! Gostaria de saber mais sobre as estações para festa do Recanto Estações.',
        'estacoes' => 'Olá! Tenho interesse nas 4 estações para minha festa. Gostaria de mais informações sobre valores e disponibilidade.',
        'promocao' => 'Olá! Vi a MEGA PROMOÇÃO das 4 estações por R$ 899. Como posso garantir essa oferta?',
        'reserva' => 'Olá! Quero RESERVAR minha data para as estações de festa. Como posso pagar o sinal de R$ 100?',
        'contato' => 'Olá! Gostaria de falar com um especialista sobre as estações para festa. Quando podemos conversar?'
    ];
    
    $mensagem = isset($mensagens[$tipo]) ? $mensagens[$tipo] : $mensagens['geral'];
    return 'https://wa.me/' . $numero . '?text=' . urlencode($mensagem);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MVDL9DC9');</script>
<!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($config['site']['title']); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($config['site']['description']); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2SJY3N8L87"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2SJY3N8L87');
</script>
    
    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1356639962093805');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1356639962093805&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
    
    <style>
        /* Reset e Base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        .header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(123, 44, 191, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar {
            padding: 1rem 0;
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            height: 50px;
            width: auto;
            border-radius: 50%;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #E0AAFF;
        }

        .btn-whatsapp-nav {
            background: #25D366;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-whatsapp-nav:hover {
            background: #128C7E;
            transform: translateY(-2px);
        }

        .mobile-menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .mobile-menu-toggle span {
            width: 25px;
            height: 3px;
            background: white;
            margin: 3px 0;
            transition: 0.3s;
        }

        /* Hero Section - 100% ROXO E CONVERSÃO */
        .hero {
            background: linear-gradient(135deg, #4A0E4E 0%, #7B2CBF 30%, #9D4EDD 70%, #C77DFF 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 120px 20px 80px;
            position: relative;
            overflow: hidden;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .confetti {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle, #C77DFF 3px, transparent 3px),
                radial-gradient(circle, #E0AAFF 2px, transparent 2px);
            background-size: 60px 60px, 90px 90px;
            background-position: 0 0, 30px 30px;
            opacity: 0.1;
            animation: float-confetti 20s linear infinite;
        }

        @keyframes float-confetti {
            0% { transform: translateY(-100vh) rotate(0deg); }
            100% { transform: translateY(100vh) rotate(360deg); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
        }

        .hero-badge-purple {
            margin-bottom: 30px;
        }

        .badge-text-purple {
            background: linear-gradient(45deg, #C77DFF, #E0AAFF);
            color: #4A0E4E;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 900;
            font-size: 18px;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 2px;
            box-shadow: 0 8px 30px rgba(199, 125, 255, 0.5);
            animation: pulse-glow 2s infinite;
        }

        @keyframes pulse-glow {
            0%, 100% { transform: scale(1); box-shadow: 0 8px 30px rgba(199, 125, 255, 0.5); }
            50% { transform: scale(1.05); box-shadow: 0 12px 40px rgba(199, 125, 255, 0.7); }
        }

        .hero-title-mega {
            margin-bottom: 40px;
        }

        .title-main-purple {
            display: block;
            font-size: 4rem;
            font-weight: 900;
            color: white;
            line-height: 1;
            text-shadow: 3px 3px 6px rgba(0,0,0,0.5);
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .title-sub-purple {
            display: block;
            font-size: 2.5rem;
            font-weight: 800;
            color: #E0AAFF;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .hero-price-purple {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(20px);
            padding: 40px 30px;
            border-radius: 30px;
            margin-bottom: 40px;
            border: 3px solid rgba(199, 125, 255, 0.5);
            position: relative;
        }

        .hero-price-purple::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #C77DFF, #E0AAFF, #C77DFF);
            border-radius: 30px 30px 0 0;
            animation: shimmer 3s linear infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .price-container {
            margin-bottom: 20px;
        }

        .price-currency-purple {
            font-size: 3rem;
            font-weight: 900;
            color: #E0AAFF;
            text-shadow: 3px 3px 6px rgba(0,0,0,0.5);
            vertical-align: top;
        }

        .price-value-purple {
            font-size: 6rem;
            font-weight: 900;
            color: #E0AAFF;
            text-shadow: 4px 4px 8px rgba(0,0,0,0.5);
            animation: price-pulse 4s ease-in-out infinite;
        }

        @keyframes price-pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }

        .price-details-purple {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .price-installment-purple {
            color: white;
            font-size: 20px;
            font-weight: 700;
        }

        .price-includes-purple {
            color: #25D366;
            font-size: 18px;
            font-weight: 700;
        }

        .social-proof-section {
            margin-bottom: 40px;
        }

        .proof-image {
            position: relative;
            display: inline-block;
        }

        .proof-img {
            width: 100%;
            max-width: 500px;
            height: 250px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.4);
        }

        .proof-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            padding: 20px;
            border-radius: 0 0 20px 20px;
        }

        .proof-text-purple {
            color: #E0AAFF;
            font-size: 16px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
        }

        .hero-stations-purple {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .station-icon-purple {
            background: rgba(199, 125, 255, 0.2);
            padding: 20px 15px;
            border-radius: 20px;
            border: 2px solid rgba(199, 125, 255, 0.5);
            text-align: center;
            transition: all 0.3s ease;
        }

        .station-icon-purple:hover {
            background: rgba(199, 125, 255, 0.3);
            transform: translateY(-5px);
        }

        .station-icon-purple img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            margin-bottom: 15px;
            filter: brightness(1.3);
        }

        .station-icon-purple i {
            font-size: 48px;
            color: #E0AAFF;
            margin-bottom: 15px;
            display: block;
        }

        .station-icon-purple span {
            color: white;
            font-size: 14px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero-buttons-purple {
            text-align: center;
        }

        .btn-mega-purple {
            background: linear-gradient(45deg, #25D366, #128C7E);
            color: white;
            border: none;
            padding: 25px 50px;
            border-radius: 60px;
            font-size: 24px;
            font-weight: 900;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 15px 40px rgba(37, 211, 102, 0.5);
            text-transform: uppercase;
            letter-spacing: 2px;
            border: 3px solid rgba(255,255,255,0.3);
            text-decoration: none;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-mega-purple::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-mega-purple:hover::before {
            left: 100%;
        }

        .btn-mega-purple:hover {
            background: linear-gradient(45deg, #128C7E, #25D366);
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(37, 211, 102, 0.7);
        }

        .urgency-purple {
            color: #E0AAFF;
            font-weight: 800;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
            animation: urgency-blink 2s infinite;
        }

        @keyframes urgency-blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .guarantee-purple {
            color: white;
            font-weight: 700;
            font-size: 16px;
            background: rgba(199, 125, 255, 0.2);
            padding: 15px 30px;
            border-radius: 25px;
            border: 2px solid rgba(199, 125, 255, 0.5);
            display: inline-block;
        }

        /* Seções restantes com estilo original */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1rem;
            color: #7B2CBF;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 3rem;
        }

        /* Estações Section */
        .estacoes {
            padding: 80px 0;
            background: #f8f9fa;
        }

        .estacoes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .estacao-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .estacao-card:hover {
            transform: translateY(-10px);
        }

        .estacao-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #7B2CBF, #9D4EDD);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .estacao-icon i {
            font-size: 2rem;
            color: white;
        }

        .estacao-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #7B2CBF;
        }

        .estacao-card p {
            margin-bottom: 1.5rem;
            color: #666;
        }

        .estacao-features {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .estacao-features span {
            color: #25D366;
            font-weight: 500;
        }

        .estacoes-cta {
            text-align: center;
        }

        .btn-primary {
            background: linear-gradient(45deg, #7B2CBF, #9D4EDD);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #9D4EDD, #C77DFF);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(123, 44, 191, 0.3);
        }

        /* Promoção Section */
        .promocao {
            padding: 80px 0;
            background: linear-gradient(135deg, #7B2CBF, #9D4EDD);
        }

        .promocao-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .promocao-img {
            width: 100%;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        .promocao-title {
            font-size: 3rem;
            font-weight: 900;
            color: white;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
        }

        .promocao-price {
            margin-bottom: 2rem;
        }

        .price-big {
            font-size: 4rem;
            font-weight: 900;
            color: #E0AAFF;
            display: block;
        }

        .price-small {
            font-size: 1.2rem;
            color: white;
            font-weight: 600;
        }

        .promocao-benefits {
            margin-bottom: 2rem;
        }

        .benefit {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            color: white;
            font-weight: 500;
        }

        .benefit i {
            color: #25D366;
            font-size: 1.2rem;
        }

        .promocao-urgency {
            background: rgba(255,255,255,0.1);
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            color: #E0AAFF;
            font-weight: 600;
            text-align: center;
        }

        .btn-large {
            padding: 1.5rem 3rem;
            font-size: 1.3rem;
        }

        /* Galeria Section */
        .galeria {
            padding: 80px 0;
        }

        .galeria-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .galeria-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .galeria-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .galeria-item:hover .galeria-img {
            transform: scale(1.1);
        }

        .galeria-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            color: white;
            padding: 1.5rem;
        }

        .galeria-overlay h4 {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }

        /* Benefícios Section */
        .beneficios {
            padding: 80px 0;
            background: #f8f9fa;
        }

        .beneficios-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .beneficio-item {
            text-align: center;
            padding: 2rem;
        }

        .beneficio-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #7B2CBF, #9D4EDD);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .beneficio-icon i {
            font-size: 2rem;
            color: white;
        }

        .beneficio-item h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: #7B2CBF;
        }

        /* Contato Section */
        .contato {
            padding: 80px 0;
            background: linear-gradient(135deg, #4A0E4E, #7B2CBF);
        }

        .contato-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .contato-info h2 {
            font-size: 2.5rem;
            color: white;
            margin-bottom: 1rem;
        }

        .contato-info p {
            color: #E0AAFF;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .contato-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            color: white;
        }

        .contato-item i {
            font-size: 1.5rem;
            color: #25D366;
            width: 30px;
        }

        .contato-item h4 {
            font-size: 1.1rem;
            margin-bottom: 0.3rem;
        }

        .contato-img {
            width: 100%;
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        .contato-cta {
            text-align: center;
        }

        /* Footer */
        .footer {
            background: #2d1b3d;
            color: white;
            padding: 2rem 0;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 2rem;
            align-items: center;
        }

        .footer-logo {
            height: 60px;
            border-radius: 50%;
            margin-bottom: 1rem;
        }

        .footer-brand p {
            color: #E0AAFF;
            margin-bottom: 1rem;
        }

        .footer-contact h4 {
            margin-bottom: 1rem;
            color: #C77DFF;
        }

        .footer-contact p {
            margin-bottom: 0.5rem;
            color: #E0AAFF;
        }

        .footer-social {
            text-align: center;
        }

        .footer-social h4 {
            margin-bottom: 1rem;
            color: #C77DFF;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: #7B2CBF;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: #9D4EDD;
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #7B2CBF;
            color: #E0AAFF;
        }

        /* WhatsApp Flutuante */
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background: #25D366;
            color: white;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            animation: pulse-float 2s infinite;
        }

        @keyframes pulse-float {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .whatsapp-float:hover {
            background: #128C7E;
            transform: scale(1.1);
        }

        /* Responsivo */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }
            
            .mobile-menu-toggle {
                display: flex;
            }
            
            .title-main-purple {
                font-size: 2.5rem;
                letter-spacing: 2px;
            }
            
            .title-sub-purple {
                font-size: 1.8rem;
                letter-spacing: 1px;
            }
            
            .price-value-purple {
                font-size: 4.5rem;
            }
            
            .price-currency-purple {
                font-size: 2.5rem;
            }
            
            .hero-stations-purple {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
                max-width: 400px;
            }
            
            .station-icon-purple {
                padding: 1rem 0.5rem;
            }
            
            .station-icon-purple img {
                width: 50px;
                height: 50px;
            }
            
            .btn-mega-purple {
                padding: 1.5rem 2.5rem;
                font-size: 1.2rem;
                width: 90%;
                max-width: 400px;
            }
            
            .hero-price-purple {
                padding: 2rem 1.5rem;
                margin-bottom: 2rem;
            }
            
            .proof-img {
                height: 200px;
            }
            
            .hero-content {
                padding: 1rem;
            }
            
            .promocao-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .contato-content {
                grid-template-columns: 1fr;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .title-main-purple {
                font-size: 2rem;
                letter-spacing: 1px;
            }
            
            .title-sub-purple {
                font-size: 1.4rem;
            }
            
            .price-value-purple {
                font-size: 3.5rem;
            }
            
            .price-currency-purple {
                font-size: 2rem;
            }
            
            .hero-stations-purple {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.75rem;
                max-width: 300px;
            }
            
            .station-icon-purple {
                padding: 0.75rem 0.5rem;
            }
            
            .station-icon-purple img {
                width: 40px;
                height: 40px;
            }
            
            .station-icon-purple span {
                font-size: 0.8rem;
            }
            
            .btn-mega-purple {
                padding: 1.25rem 2rem;
                font-size: 1rem;
                letter-spacing: 1px;
            }
            
            .badge-text-purple {
                font-size: 1rem;
                padding: 0.75rem 1.5rem;
                letter-spacing: 1px;
            }
            
            .hero-price-purple {
                padding: 1.5rem 1rem;
            }
            
            .price-installment-purple {
                font-size: 1.1rem;
            }
            
            .price-includes-purple {
                font-size: 1rem;
            }
            
            .proof-text-purple {
                font-size: 1rem;
            }
            
            .urgency-purple {
                font-size: 1rem;
            }
            
            .guarantee-purple {
                font-size: 0.9rem;
                padding: 0.75rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MVDL9DC9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <!-- Header -->
    <header class="header">
        <nav class="navbar">
            <div class="container">
                <div class="nav-brand">
                    <img src="assets/logo.jpg" alt="Recanto Estações" class="logo">
                </div>
                <div class="nav-menu">
                    <a href="#estacoes" class="nav-link">Estações</a>
                    <a href="#promocao" class="nav-link">Promoção</a>
                    <a href="#contato" class="nav-link">Contato</a>
                    <a href="<?php echo gerarWhatsApp('geral'); ?>" class="btn-whatsapp-nav">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                </div>
                <div class="mobile-menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-background">
            <div class="confetti"></div>
        </div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge-purple">
                    <span class="badge-text-purple">🔥 MEGA PROMOÇÃO 🔥</span>
                </div>
                <h1 class="hero-title-mega">
                    <span class="title-main-purple">4 ESTAÇÕES POR 3 HORAS</span>
                    <span class="title-sub-purple">ATÉ 100 CONVIDADOS</span>
                </h1>
                <div class="hero-price-purple">
                    <div class="price-container">
                        <span class="price-currency-purple">R$</span>
                        <span class="price-value-purple"><?php echo $config['promocao']['preco']; ?></span>
                    </div>
                    <div class="price-details-purple">
                        <span class="price-installment-purple">💜 <?php echo $config['promocao']['parcelamento']; ?></span>
                        <span class="price-includes-purple">✅ Equipe e deslocamento inclusos</span>
                    </div>
                </div>
                <div class="social-proof-section">
                    <div class="proof-image">
                        <img src="assets/fila-grande-festa.jpg" alt="Fila Grande - Sucesso Garantido" class="proof-img">
                        <div class="proof-overlay">
                            <span class="proof-text-purple">✨ SUCESSO GARANTIDO EM TODOS OS EVENTOS!</span>
                        </div>
                    </div>
                </div>
               
                </div>
                <div class="hero-buttons-purple">
                    <a href="<?php echo gerarWhatsApp('megapromocao'); ?>" class="btn-mega-purple">
                        <i class="fab fa-whatsapp"></i>
                        RESERVE SUA DATA AGORA!
                    </a>
                    <div class="urgency-purple">
                        <i class="fas fa-clock"></i>
                        <span>⚡ PROMOÇÃO POR TEMPO LIMITADO! ⚡</span>
                    </div>
                    <div class="guarantee-purple">
                        <i class="fas fa-shield-alt"></i>
                        <span>💜 SATISFAÇÃO 100% GARANTIDA</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Estações Section -->
    <section id="estacoes" class="estacoes">
        <div class="container">
            <h2 class="section-title">Nossas Estações</h2>
            <p class="section-subtitle">Diversão garantida para todas as idades</p>
            
            <div class="estacoes-grid">
                <div class="estacao-card">
                    <div class="estacao-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3>Pipoqueira</h3>
                    <p>Pipoca fresquinha e saborosa preparada na hora para seus convidados</p>
                    <div class="estacao-features">
                        <span>✓ Pipoca doce e salgada</span>
                        <span>✓ Operador incluso</span>
                        <span>✓ Embalagens personalizadas</span>
                    </div>
                </div>

                <div class="estacao-card">
                    <div class="estacao-icon">
                        <i class="fas fa-ice-cream"></i>
                    </div>
                    <h3>Estação de Açaí</h3>
                    <p>Açaí cremoso com diversos toppings e acompanhamentos deliciosos</p>
                    <div class="estacao-features">
                        <span>✓ Açaí premium</span>
                        <span>✓ Toppings variados</span>
                        <span>✓ Sorvetes inclusos</span>
                    </div>
                </div>

                <div class="estacao-card">
                    <div class="estacao-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3>Crepeira</h3>
                    <p>Crepes doces e salgados preparados na hora com recheios especiais</p>
                    <div class="estacao-features">
                        <span>✓ Crepes doces e salgados</span>
                        <span>✓ Recheios variados</span>
                        <span>✓ Preparo ao vivo</span>
                    </div>
                </div>

                <div class="estacao-card">
                    <div class="estacao-icon">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <h3>Algodão Doce</h3>
                    <p>Algodão doce colorido e saboroso que encanta crianças e adultos</p>
                    <div class="estacao-features">
                        <span>✓ Sabores variados</span>
                        <span>✓ Cores personalizadas</span>
                        <span>✓ Diversão garantida</span>
                    </div>
                </div>
            </div>

            <div class="estacoes-cta">
                <a href="<?php echo gerarWhatsApp('estacoes'); ?>" class="btn-primary">
                    <i class="fab fa-whatsapp"></i>
                    Quero Todas as Estações!
                </a>
            </div>
        </div>
    </section>

    <!-- Promoção Section -->
    <section id="promocao" class="promocao">
        <div class="container">
            <div class="promocao-content">
                <div class="promocao-image">
                    <img src="assets/criativo-promocao.jpg" alt="Mega Promoção Recanto Estações" class="promocao-img">
                </div>
                <div class="promocao-details">
                    <h2 class="promocao-title">MEGA PROMOÇÃO</h2>
                    <div class="promocao-price">
                        <span class="price-big">R$ <?php echo $config['promocao']['preco']; ?></span>
                        <span class="price-small">4 estações completas</span>
                    </div>
                    <div class="promocao-benefits">
                        <div class="benefit">
                            <i class="fas fa-check-circle"></i>
                            <span>Parcelamos em <?php echo $config['promocao']['parcelamento']; ?></span>
                        </div>
                        <div class="benefit">
                            <i class="fas fa-check-circle"></i>
                            <span>Apenas R$ <?php echo $config['promocao']['sinal']; ?> de sinal</span>
                        </div>
                        <div class="benefit">
                            <i class="fas fa-check-circle"></i>
                            <span>Operadores inclusos</span>
                        </div>
                        <div class="benefit">
                            <i class="fas fa-check-circle"></i>
                            <span>Todos os materiais inclusos</span>
                        </div>
                    </div>
                    <div class="promocao-urgency">
                        <i class="fas fa-clock"></i>
                        <span>Promoção por tempo limitado!</span>
                    </div>
                    <a href="<?php echo gerarWhatsApp('reserva'); ?>" class="btn-primary btn-large">
                        <i class="fab fa-whatsapp"></i>
                        Reserve Sua Data Agora!
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeria Section -->
    <section class="galeria">
        <div class="container">
            <h2 class="section-title">Veja Nosso Trabalho</h2>
            <p class="section-subtitle">Momentos especiais que criamos para nossos clientes</p>
            
            <div class="galeria-grid">
                <div class="galeria-item">
                    <img src="assets/foto-servico.webp" alt="Estação de Açaí em Ação" class="galeria-img">
                    <div class="galeria-overlay">
                        <h4>Estação de Açaí</h4>
                        <p>Diversão e sabor garantidos</p>
                    </div>
                </div>
                <div class="galeria-item">
                    <img src="assets/estacao-pipoca.jpg" alt="Estação de Pipoca" class="galeria-img">
                    <div class="galeria-overlay">
                        <h4>Pipoqueira</h4>
                        <p>Pipoca fresquinha na hora</p>
                    </div>
                </div>
                <div class="galeria-item">
                    <img src="assets/estacao-crepe.jpg" alt="Estação de Crepe" class="galeria-img">
                    <div class="galeria-overlay">
                        <h4>Crepeira</h4>
                        <p>Crepes deliciosos ao vivo</p>
                    </div>
                </div>
                <div class="galeria-item">
                    <img src="assets/estacao-algodao-doce.jpg" alt="Estação de Algodão Doce" class="galeria-img">
                    <div class="galeria-overlay">
                        <h4>Algodão Doce</h4>
                        <p>Magia e doçura</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefícios Section -->
    <section class="beneficios">
        <div class="container">
            <h2 class="section-title">Por que escolher o Recanto Estações?</h2>
            
            <div class="beneficios-grid">
                <div class="beneficio-item">
                    <div class="beneficio-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Qualidade Premium</h3>
                    <p>Ingredientes selecionados e equipamentos de primeira linha para garantir a melhor experiência</p>
                </div>
                
                <div class="beneficio-item">
                    <div class="beneficio-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Equipe Especializada</h3>
                    <p>Operadores treinados e uniformizados para atender seus convidados com excelência</p>
                </div>
                
                <div class="beneficio-item">
                    <div class="beneficio-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Diversão Garantida</h3>
                    <p>Entretenimento para todas as idades, criando momentos inesquecíveis em sua festa</p>
                </div>
                
                <div class="beneficio-item">
                    <div class="beneficio-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Facilidade de Pagamento</h3>
                    <p>Parcelamento sem juros e apenas R$ <?php echo $config['promocao']['sinal']; ?> de sinal para garantir sua data</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contato Section -->
    <section id="contato" class="contato">
        <div class="container">
            <div class="contato-content">
                <div class="contato-info">
                    <h2>Fale Conosco</h2>
                    <p>Entre em contato e garante já sua data!</p>
                    
                    <div class="contato-item">
                        <i class="fab fa-whatsapp"></i>
                        <div>
                            <h4>WhatsApp</h4>
                            <p><?php echo $config['site']['whatsapp_display']; ?></p>
                        </div>
                    </div>
                    
                    <div class="contato-item">
                        <i class="fas fa-credit-card"></i>
                        <div>
                            <h4>PIX para Sinal</h4>
                            <p><?php echo $config['site']['pix']; ?></p>
                        </div>
                    </div>
                    
                    <div class="contato-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Atendimento</h4>
                            <p>Rio de Janeiro e região</p>
                        </div>
                    </div>
                </div>
                
                <div class="contato-cta">
                    <img src="assets/criativo-reserva.jpg" alt="Reserve Agora" class="contato-img">
                    <a href="<?php echo gerarWhatsApp('contato'); ?>" class="btn-primary btn-large">
                        <i class="fab fa-whatsapp"></i>
                        Falar com Especialista
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <img src="assets/logo.jpg" alt="Recanto Estações" class="footer-logo">
                    <p>Tornando suas festas inesquecíveis com nossas estações especiais</p>
                </div>
                
                <div class="footer-contact">
                    <h4>Contato</h4>
                    <p><i class="fab fa-whatsapp"></i> <?php echo $config['site']['whatsapp_display']; ?></p>
                    <p><i class="fas fa-credit-card"></i> PIX: <?php echo $config['site']['pix']; ?></p>
                </div>
                
                <div class="footer-social">
                    <h4>Redes Sociais</h4>
                    <div class="social-links">
                        <a href="<?php echo gerarWhatsApp('geral'); ?>"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2024 Recanto Estações. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Flutuante -->
    <a href="<?php echo gerarWhatsApp('geral'); ?>" class="whatsapp-float" onclick="trackWhatsAppClick('whatsapp_float')">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- JavaScript para eventos do Meta Pixel -->
    <script>
        // Função para rastrear cliques no WhatsApp
        function trackWhatsAppClick(buttonType) {
            if (typeof fbq !== 'undefined') {
                fbq('track', 'Contact', {
                    content_name: 'WhatsApp Click',
                    content_category: buttonType,
                    value: <?php echo $config['promocao']['preco']; ?>,
                    currency: 'BRL'
                });
            }
        }

        // Adicionar eventos aos botões existentes
        document.addEventListener('DOMContentLoaded', function() {
            // Botão principal da mega promoção
            const btnMegaPromocao = document.querySelector('.btn-mega-purple');
            if (btnMegaPromocao) {
                btnMegaPromocao.addEventListener('click', function() {
                    if (typeof fbq !== 'undefined') {
                        fbq('track', 'InitiateCheckout', {
                            content_name: 'Mega Promoção - Reserve Data',
                            content_category: 'mega_promocao',
                            value: <?php echo $config['promocao']['preco']; ?>,
                            currency: 'BRL'
                        });
                    }
                });
            }

            // Botão do header
            const btnHeaderWhatsApp = document.querySelector('.btn-whatsapp-nav');
            if (btnHeaderWhatsApp) {
                btnHeaderWhatsApp.addEventListener('click', function() {
                    if (typeof fbq !== 'undefined') {
                        fbq('track', 'Contact', {
                            content_name: 'Header WhatsApp',
                            content_category: 'header_whatsapp',
                            value: <?php echo $config['promocao']['preco']; ?>,
                            currency: 'BRL'
                        });
                    }
                });
            }

            // Botões das seções
            const btnEstacoes = document.querySelector('.estacoes-cta .btn-primary');
            if (btnEstacoes) {
                btnEstacoes.addEventListener('click', function() {
                    if (typeof fbq !== 'undefined') {
                        fbq('track', 'AddToCart', {
                            content_name: 'Interesse em Todas Estações',
                            content_category: 'estacoes_interesse',
                            value: <?php echo $config['promocao']['preco']; ?>,
                            currency: 'BRL'
                        });
                    }
                });
            }

            // Botão da seção promoção
            const btnPromocao = document.querySelector('.promocao .btn-primary');
            if (btnPromocao) {
                btnPromocao.addEventListener('click', function() {
                    if (typeof fbq !== 'undefined') {
                        fbq('track', 'InitiateCheckout', {
                            content_name: 'Reservar Data - Seção Promoção',
                            content_category: 'promocao_reserva',
                            value: <?php echo $config['promocao']['preco']; ?>,
                            currency: 'BRL'
                        });
                    }
                });
            }

            // Botão de contato
            const btnContato = document.querySelector('.contato .btn-primary');
            if (btnContato) {
                btnContato.addEventListener('click', function() {
                    if (typeof fbq !== 'undefined') {
                        fbq('track', 'Contact', {
                            content_name: 'Falar com Especialista',
                            content_category: 'contato_especialista',
                            value: <?php echo $config['promocao']['preco']; ?>,
                            currency: 'BRL'
                        });
                    }
                });
            }

            // Rastrear scroll para medir engajamento
            let scrollTracked = false;
            window.addEventListener('scroll', function() {
                if (!scrollTracked && window.scrollY > window.innerHeight * 0.5) {
                    scrollTracked = true;
                    if (typeof fbq !== 'undefined') {
                        fbq('track', 'ViewContent', {
                            content_name: 'Scroll 50% da página',
                            content_category: 'engagement'
                        });
                    }
                }
            });

            // Rastrear tempo na página (5 minutos = alta intenção)
            setTimeout(function() {
                if (typeof fbq !== 'undefined') {
                    fbq('track', 'ViewContent', {
                        content_name: 'Tempo na página - 5 minutos',
                        content_category: 'high_engagement'
                    });
                }
            }, 300000); // 5 minutos
        });
    </script>

</body>
</html>

