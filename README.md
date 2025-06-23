# Site Recanto Estações - Versão PHP

## Descrição
Site completo em PHP para o Recanto Estações, empresa especializada em estações de festa para eventos. O site foi convertido do HTML estático original para uma versão dinâmica em PHP com funcionalidades avançadas.

## Funcionalidades Implementadas

### 🎯 Funcionalidades Principais
- **Site responsivo** com design moderno e atrativo
- **Integração completa com WhatsApp** para diferentes tipos de contato
- **Formulário de captura de leads** com validação
- **Sistema de gerenciamento de dados** dos clientes
- **Dashboard administrativo** para acompanhar estatísticas
- **Contador de visitas** automático
- **SEO otimizado** com meta tags completas

### 📱 Seções do Site
1. **Hero Section** - Apresentação da mega promoção
2. **Estações** - Detalhes das 4 estações (Pipoca, Açaí, Crepe, Algodão Doce)
3. **Promoção** - Destaque da oferta especial
4. **Galeria** - Fotos dos eventos realizados
5. **Formulário** - Captura de leads com dados do evento
6. **Contato** - Informações de contato e processo de reserva

### 🛠 Tecnologias Utilizadas
- **PHP 8.1** - Backend e lógica do servidor
- **HTML5** - Estrutura semântica
- **CSS3** - Estilização responsiva com Flexbox e Grid
- **JavaScript** - Interatividade e validações
- **Font Awesome** - Ícones
- **Google Fonts** - Tipografia (Poppins)

### 📊 Sistema de Leads
- **Captura automática** de dados dos interessados
- **Validação** de campos obrigatórios
- **Armazenamento** em arquivo CSV
- **Integração** com WhatsApp para contato direto
- **Dashboard** para visualização de estatísticas

## Estrutura de Arquivos

```
recanto-php/
├── index.php              # Página principal
├── dashboard.php           # Painel administrativo
├── process.php            # Processamento de formulários
├── config.php             # Configurações gerais
├── css/
│   └── style.css          # Estilos CSS
├── js/
│   └── script.js          # JavaScript
├── images/                # Imagens do site
├── includes/              # Arquivos PHP modulares
│   ├── header.php
│   ├── navigation.php
│   ├── footer.php
│   ├── estacoes-section.php
│   ├── promocao-section.php
│   ├── galeria-section.php
│   ├── formulario-section.php
│   └── contato-section.php
└── data/                  # Dados gerados
    ├── leads.csv          # Leads capturados
    └── visits.txt         # Contador de visitas
```

## Como Usar

### 1. Configuração do Servidor
```bash
# Navegar para o diretório
cd /home/ubuntu/recanto-php

# Iniciar servidor PHP
php -S 0.0.0.0:8080
```

### 2. Acessar o Site
- **Site principal**: http://localhost:8080
- **Dashboard**: http://localhost:8080/dashboard.php

### 3. Configurações
Edite o arquivo `config.php` para personalizar:
- Número do WhatsApp
- Preços e promoções
- Informações de contato
- Configurações gerais

## Funcionalidades do Dashboard

### 📈 Estatísticas Disponíveis
- **Total de leads** capturados
- **Número de visitas** ao site
- **Taxa de conversão** (leads/visitas)
- **Leads com WhatsApp** para contato direto

### 📋 Gestão de Leads
- **Visualização** dos leads mais recentes
- **Dados completos** de cada interessado
- **Link direto** para WhatsApp de cada lead
- **Exportação** em formato CSV

## Integração WhatsApp

### 🎯 Mensagens Personalizadas
O site gera mensagens específicas para cada tipo de interação:
- **Geral** - Interesse básico
- **Mega Promoção** - Interesse na oferta especial
- **Estações** - Interesse nas 4 estações
- **Reserva** - Processo de reserva
- **Contato** - Falar com especialista

### 📱 Botões de Ação
- **Botão flutuante** sempre visível
- **Botões específicos** em cada seção
- **Links diretos** no formulário de contato

## Responsividade

### 📱 Design Mobile-First
- **Layout adaptativo** para todos os dispositivos
- **Menu mobile** com hamburger
- **Formulário otimizado** para touch
- **Imagens responsivas** com carregamento otimizado

### 🖥 Compatibilidade
- **Desktop** - Experiência completa
- **Tablet** - Layout adaptado
- **Mobile** - Interface otimizada para toque

## SEO e Performance

### 🔍 Otimizações SEO
- **Meta tags** completas
- **Open Graph** para redes sociais
- **Twitter Cards** configuradas
- **URLs amigáveis**
- **Estrutura semântica** HTML5

### ⚡ Performance
- **CSS minificado** e otimizado
- **JavaScript** carregado de forma assíncrona
- **Imagens otimizadas** para web
- **Carregamento rápido** do servidor PHP

## Segurança

### 🔒 Medidas Implementadas
- **Sanitização** de dados de entrada
- **Validação** de formulários
- **Proteção** contra XSS
- **Validação** de tipos de arquivo
- **Logs** de acesso e erros

## Manutenção

### 📝 Logs e Monitoramento
- **Arquivo de leads** em CSV para backup
- **Contador de visitas** persistente
- **Logs do servidor** para debugging

### 🔄 Atualizações
- **Configurações centralizadas** em config.php
- **Código modular** para fácil manutenção
- **Comentários** detalhados no código

## Suporte

Para dúvidas ou suporte técnico:
- **WhatsApp**: (21) 98174-9450
- **Email**: contato@recantoestacoes.com.br

---

**Desenvolvido com ❤️ para o Recanto Estações**
*Transformando festas em momentos inesquecíveis!*

