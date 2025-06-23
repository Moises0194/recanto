// Função para abrir WhatsApp com mensagens personalizadas
function abrirWhatsApp(tipo) {
    const telefone = '5521981749450'; // Número do WhatsApp
    let mensagem = '';
    
    switch(tipo) {
        case 'geral':
            mensagem = 'Olá! Gostaria de saber mais sobre as estações para festa do Recanto Estações.';
            break;
        case 'megapromocao':
            mensagem = 'Olá! Tenho interesse na MEGA PROMOÇÃO: 4 ESTAÇÕES POR 3 HORAS até 100 convidados por R$ 899. Quero RESERVAR minha data!';
            break;
        case 'promocao':
            mensagem = 'Olá! Tenho interesse na MEGA PROMOÇÃO das 4 estações por R$ 899. Gostaria de mais informações!';
            break;
        case 'estacoes':
            mensagem = 'Olá! Quero contratar todas as 4 estações: Pipoca, Açaí, Crepe e Algodão Doce. Podem me enviar mais detalhes?';
            break;
        case 'reserva':
            mensagem = 'Olá! Quero RESERVAR minha data para as estações de festa. Como posso pagar o sinal de R$ 100?';
            break;
        case 'contato':
            mensagem = 'Olá! Gostaria de falar com um especialista sobre as estações para minha festa.';
            break;
        case 'float':
            mensagem = 'Olá! Vim pelo site e gostaria de saber mais sobre as estações para festa.';
            break;
        default:
            mensagem = 'Olá! Gostaria de saber mais sobre as estações para festa.';
    }
    
    const url = `https://wa.me/${telefone}?text=${encodeURIComponent(mensagem)}`;
    window.open(url, '_blank');
}

// Função para scroll suave para seções
function scrollToSection(sectionId) {
    const element = document.getElementById(sectionId);
    if (element) {
        element.scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
        });
    }
}

// Animações ao scroll
function animateOnScroll() {
    const elements = document.querySelectorAll('.estacao-card, .beneficio-item, .galeria-item');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-up');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    elements.forEach(element => {
        observer.observe(element);
    });
}

// Menu mobile
function initMobileMenu() {
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (mobileToggle && navMenu) {
        mobileToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            mobileToggle.classList.toggle('active');
        });
        
        // Fechar menu ao clicar em um link
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('active');
                mobileToggle.classList.remove('active');
            });
        });
    }
}

// Efeito parallax no hero
function initParallax() {
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallax = document.querySelector('.hero-background');
        
        if (parallax) {
            const speed = scrolled * 0.5;
            parallax.style.transform = `translateY(${speed}px)`;
        }
    });
}

// Header transparente/sólido baseado no scroll
function initHeaderScroll() {
    const header = document.querySelector('.header');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 100) {
            header.style.background = 'rgba(123, 44, 191, 0.95)';
        } else {
            header.style.background = 'rgba(123, 44, 191, 0.95)';
        }
    });
}

// Contador animado para preços
function animateCounters() {
    const priceElement = document.querySelector('.price-value');
    
    if (priceElement) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animatePrice(priceElement, 899);
                    observer.unobserve(entry.target);
                }
            });
        });
        
        observer.observe(priceElement);
    }
}

function animatePrice(element, targetValue) {
    let currentValue = 0;
    const increment = targetValue / 50;
    const timer = setInterval(() => {
        currentValue += increment;
        if (currentValue >= targetValue) {
            currentValue = targetValue;
            clearInterval(timer);
        }
        element.textContent = `R$ ${Math.floor(currentValue)}`;
    }, 30);
}

// Efeito de digitação no título
function typeWriter() {
    const titleElement = document.querySelector('.hero-title');
    if (!titleElement) return;
    
    const text = titleElement.textContent;
    titleElement.textContent = '';
    titleElement.style.opacity = '1';
    
    let i = 0;
    const timer = setInterval(() => {
        if (i < text.length) {
            titleElement.textContent += text.charAt(i);
            i++;
        } else {
            clearInterval(timer);
        }
    }, 50);
}

// Lazy loading para imagens
function initLazyLoading() {
    const images = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
}

// Validação de formulário (se houver)
function initFormValidation() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const inputs = form.querySelectorAll('input[required], textarea[required]');
            let isValid = true;
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('error');
                } else {
                    input.classList.remove('error');
                }
            });
            
            if (isValid) {
                // Processar formulário ou redirecionar para WhatsApp
                abrirWhatsApp('contato');
            }
        });
    });
}

// Smooth reveal para elementos
function initSmoothReveal() {
    const reveals = document.querySelectorAll('.reveal');
    
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
            }
        });
    }, {
        threshold: 0.15
    });
    
    reveals.forEach(reveal => revealObserver.observe(reveal));
}

// Preloader
function initPreloader() {
    window.addEventListener('load', () => {
        const preloader = document.querySelector('.preloader');
        if (preloader) {
            preloader.style.opacity = '0';
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 500);
        }
    });
}

// Botão de voltar ao topo
function initBackToTop() {
    const backToTopBtn = document.createElement('div');
    backToTopBtn.className = 'back-to-top';
    backToTopBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
    backToTopBtn.style.cssText = `
        position: fixed;
        bottom: 90px;
        right: 20px;
        width: 50px;
        height: 50px;
        background: #7B2CBF;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        cursor: pointer;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 999;
    `;
    
    document.body.appendChild(backToTopBtn);
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 500) {
            backToTopBtn.style.opacity = '1';
            backToTopBtn.style.visibility = 'visible';
        } else {
            backToTopBtn.style.opacity = '0';
            backToTopBtn.style.visibility = 'hidden';
        }
    });
    
    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// Inicialização quando o DOM estiver carregado
document.addEventListener('DOMContentLoaded', () => {
    initMobileMenu();
    initParallax();
    initHeaderScroll();
    animateOnScroll();
    animateCounters();
    initLazyLoading();
    initFormValidation();
    initSmoothReveal();
    initPreloader();
    initBackToTop();
    
    // Pequeno delay para o efeito de digitação
    setTimeout(typeWriter, 1000);
});

// Otimização de performance
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Aplicar debounce aos eventos de scroll
const debouncedScroll = debounce(() => {
    // Funções de scroll otimizadas
}, 10);

window.addEventListener('scroll', debouncedScroll);

// Analytics e tracking (opcional)
function trackEvent(eventName, eventData = {}) {
    // Implementar tracking de eventos
    console.log(`Event: ${eventName}`, eventData);
    
    // Exemplo para Google Analytics
    if (typeof gtag !== 'undefined') {
        gtag('event', eventName, eventData);
    }
}

// Rastrear cliques nos botões do WhatsApp
document.addEventListener('click', (e) => {
    if (e.target.closest('[onclick*="abrirWhatsApp"]')) {
        const buttonType = e.target.closest('[onclick*="abrirWhatsApp"]').getAttribute('onclick').match(/abrirWhatsApp\('(.+?)'\)/)[1];
        trackEvent('whatsapp_click', { button_type: buttonType });
    }
});

// Service Worker para cache (PWA)
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js')
            .then(registration => {
                console.log('SW registered: ', registration);
            })
            .catch(registrationError => {
                console.log('SW registration failed: ', registrationError);
            });
    });
}

