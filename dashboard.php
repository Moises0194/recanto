<?php
require_once 'config.php';

// Verificar se existe arquivo de leads
$leads_file = 'data/leads.csv';
$visits_file = 'data/visits.txt';

$total_leads = 0;
$total_visits = 0;
$recent_leads = [];

if (file_exists($leads_file)) {
    $leads = array_map('str_getcsv', file($leads_file));
    $total_leads = count($leads) - 1; // Subtrair cabeçalho
    
    // Pegar os 10 leads mais recentes
    if ($total_leads > 0) {
        $recent_leads = array_slice(array_reverse($leads), 0, 11); // +1 para o cabeçalho
        array_shift($recent_leads); // Remover cabeçalho
    }
}

if (file_exists($visits_file)) {
    $total_visits = (int)file_get_contents($visits_file);
}

$page_title = 'Dashboard - Administração';
include 'includes/header.php';
?>

<style>
body {
    background: #f8f9fa;
    font-family: 'Poppins', sans-serif;
}

.dashboard {
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
}

.dashboard-header {
    background: linear-gradient(135deg, #7b2cbf 0%, #9c4dcc 100%);
    color: white;
    padding: 30px;
    border-radius: 15px;
    margin-bottom: 30px;
    text-align: center;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: white;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    text-align: center;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: #7b2cbf;
    margin-bottom: 10px;
}

.stat-label {
    color: #666;
    font-size: 1.1rem;
}

.leads-table {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th,
.table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #eee;
}

.table th {
    background: #f8f9fa;
    font-weight: 600;
    color: #333;
}

.table tr:hover {
    background: #f8f9fa;
}

.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: #7b2cbf;
    color: white;
    text-decoration: none;
    padding: 12px 24px;
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.3s ease;
    margin-bottom: 20px;
}

.btn-back:hover {
    background: #9c4dcc;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .dashboard {
        margin: 20px;
        padding: 10px;
    }
    
    .table {
        font-size: 0.9rem;
    }
    
    .table th,
    .table td {
        padding: 8px 4px;
    }
}
</style>

<div class="dashboard">
    <a href="index.php" class="btn-back">
        <i class="fas fa-arrow-left"></i>
        Voltar ao Site
    </a>
    
    <div class="dashboard-header">
        <h1>Dashboard - Recanto Estações</h1>
        <p>Painel de controle e estatísticas do site</p>
    </div>
    
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number"><?php echo $total_leads; ?></div>
            <div class="stat-label">Total de Leads</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number"><?php echo $total_visits; ?></div>
            <div class="stat-label">Visitas ao Site</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number"><?php echo $total_leads > 0 ? number_format(($total_leads / $total_visits) * 100, 1) : 0; ?>%</div>
            <div class="stat-label">Taxa de Conversão</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number"><?php echo count(array_filter($recent_leads, function($lead) { return isset($lead[2]) && !empty($lead[2]); })); ?></div>
            <div class="stat-label">Leads com WhatsApp</div>
        </div>
    </div>
    
    <?php if (!empty($recent_leads)): ?>
    <div class="leads-table">
        <h2>Leads Recentes</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Data/Hora</th>
                    <th>Nome</th>
                    <th>WhatsApp</th>
                    <th>Email</th>
                    <th>Data Evento</th>
                    <th>Convidados</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recent_leads as $lead): ?>
                <tr>
                    <td><?php echo isset($lead[0]) ? date('d/m/Y H:i', strtotime($lead[0])) : '-'; ?></td>
                    <td><?php echo isset($lead[1]) ? htmlspecialchars($lead[1]) : '-'; ?></td>
                    <td><?php echo isset($lead[2]) ? htmlspecialchars($lead[2]) : '-'; ?></td>
                    <td><?php echo isset($lead[3]) ? htmlspecialchars($lead[3]) : '-'; ?></td>
                    <td><?php echo isset($lead[4]) && !empty($lead[4]) ? date('d/m/Y', strtotime($lead[4])) : '-'; ?></td>
                    <td><?php echo isset($lead[6]) ? htmlspecialchars($lead[6]) : '-'; ?></td>
                    <td>
                        <?php if (isset($lead[2]) && !empty($lead[2])): ?>
                        <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $lead[2]); ?>" target="_blank" style="color: #25d366;">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <div class="leads-table">
        <h2>Leads Recentes</h2>
        <p>Nenhum lead cadastrado ainda.</p>
    </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>

