// Initialize particles
function createParticles() {
    const particlesContainer = document.getElementById('particles');
    for (let i = 0; i < 30; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.animationDelay = Math.random() * 15 + 's';
        particle.style.animationDuration = (Math.random() * 8 + 12) + 's';
        particlesContainer.appendChild(particle);
    }
}

// Mobile menu toggle
const mobileToggle = document.getElementById('mobileToggle');
const navLinks = document.getElementById('navLinks');
const mobileOverlay = document.getElementById('mobileOverlay');

function toggleMobileMenu() {
    navLinks.classList.toggle('active');
    mobileOverlay.classList.toggle('active');
    
    if (navLinks.classList.contains('active')) {
        mobileToggle.innerHTML = '<i class="fas fa-times"></i>';
        document.body.style.overflow = 'hidden';
    } else {
        mobileToggle.innerHTML = '<i class="fas fa-bars"></i>';
        document.body.style.overflow = 'auto';
    }
}

function closeMobileMenu() {
    navLinks.classList.remove('active');
    mobileOverlay.classList.remove('active');
    mobileToggle.innerHTML = '<i class="fas fa-bars"></i>';
    document.body.style.overflow = 'auto';
}

mobileToggle.addEventListener('click', toggleMobileMenu);
mobileOverlay.addEventListener('click', closeMobileMenu);

document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', closeMobileMenu);
});

// Theme Toggle Functionality
const themeToggle = document.getElementById('themeToggle');
const body = document.body;

const currentTheme = localStorage.getItem('theme') || 'light';
body.setAttribute('data-theme', currentTheme);

themeToggle.addEventListener('click', () => {
    const currentTheme = body.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    
    body.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
});

// Navbar scroll effect
window.addEventListener('scroll', () => {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 100) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Enhanced register button click handler
function registerClick() {
    const button = event.target;
    
    // Create ripple effect
    const ripple = document.createElement('span');
    ripple.style.position = 'absolute';
    ripple.style.borderRadius = '50%';
    ripple.style.background = 'rgba(255,255,255,0.5)';
    ripple.style.transform = 'scale(0)';
    ripple.style.animation = 'ripple 0.6s linear';
    ripple.style.left = '50%';
    ripple.style.top = '50%';
    ripple.style.width = '20px';
    ripple.style.height = '20px';
    ripple.style.marginLeft = '-10px';
    ripple.style.marginTop = '-10px';
    
    button.style.position = 'relative';
    button.appendChild(ripple);
    
    setTimeout(() => {
        ripple.remove();
    }, 600);

    // Show animated modal
    showModal();
}

// Animated counter function
function animateCounter(element, target) {
    const numberEl = element.querySelector('.stat-number');
    const increment = target / 100;
    let current = 0;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            numberEl.textContent = target % 1 === 0 ? target : target.toFixed(1);
            clearInterval(timer);
        } else {
            numberEl.textContent = current % 1 === 0 ? Math.floor(current) : current.toFixed(1);
        }
    }, 30);
}

// Show registration modal
function showModal() {
    const modal = document.createElement('div');
    modal.innerHTML = `
        <div style="
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5); display: flex; align-items: center;
            justify-content: center; z-index: 10000; backdrop-filter: blur(5px);
            animation: modalFadeIn 0.3s ease-out;
        ">
            <div style="
                background: var(--bg-card); border: 2px solid var(--primary-color);
                border-radius: 20px; padding: 3rem; max-width: 500px; width: 90%;
                text-align: center; position: relative; overflow: hidden;
                animation: modalSlideIn 0.5s ease-out;
                box-shadow: var(--shadow);
            ">
                <div style="
                    position: absolute; top: 0; left: 0; width: 100%; height: 4px;
                    background: var(--gradient);
                "></div>
                <div style="
                    width: 80px; height: 80px; margin: 0 auto 1.5rem;
                    background: var(--gradient); border-radius: 50%;
                    display: flex; align-items: center; justify-content: center;
                    animation: iconBounce 0.6s ease-out 0.3s both;
                ">
                    <i class="fas fa-calendar-check" style="font-size: 2rem; color: white;"></i>
                </div>
                <h2 style="color: var(--text-primary); margin-bottom: 1rem; font-size: 1.8rem;">
                    🎉 Ready to Register?
                </h2>
                <p style="color: var(--text-secondary); margin-bottom: 2rem; line-height: 1.6;">
                    Join thousands of satisfied patients who trust VaxCare for their vaccination needs.
                    Book your appointment now and take the first step towards better health!
                </p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="register.php" style="
                        display: inline-flex; align-items: center; justify-content: center;
                        background: var(--gradient); color: white; border: none;
                        padding: 1rem 2rem; border-radius: 25px; font-size: 1rem;
                        cursor: pointer; font-weight: 600; transition: all 0.3s ease;
                        min-width: 140px; text-decoration: none;
                    " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 20px rgba(0,174,218,0.3)'" 
                       onmouseout="this.style.transform=''; this.style.boxShadow=''">
                        <i class="fas fa-arrow-right"></i> Continue
                    </a>
                    <button onclick="closeModal(this)" style="
                        background: transparent; color: var(--text-secondary);
                        border: 2px solid var(--border-color); padding: 1rem 2rem;
                        border-radius: 25px; font-size: 1rem; cursor: pointer;
                        transition: all 0.3s ease; min-width: 140px;
                    " onmouseover="this.style.borderColor='var(--primary-color)'; this.style.color='var(--primary-color)'" 
                       onmouseout="this.style.borderColor='var(--border-color)'; this.style.color='var(--text-secondary)'">
                        Close
                    </button>
                </div>
            </div>
        </div>
    `;

    // Add modal animations to head
    const style = document.createElement('style');
    style.textContent = `
        @keyframes modalFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes modalSlideIn {
            from { opacity: 0; transform: translateY(-50px) scale(0.9); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes iconBounce {
            from { opacity: 0; transform: scale(0) rotate(-180deg); }
            to { opacity: 1; transform: scale(1) rotate(0deg); }
        }
        @keyframes ripple {
            to { transform: scale(4); opacity: 0; }
        }
    `;
    document.head.appendChild(style);
    document.body.appendChild(modal);

    // Auto close after 10 seconds
    setTimeout(() => {
        if (document.body.contains(modal)) {
            closeModal(modal.querySelector('button'));
        }
    }, 10000);
}

function closeModal(button) {
    const modal = button.closest('div').parentElement;
    modal.style.animation = 'modalFadeIn 0.3s ease-out reverse';
    setTimeout(() => {
        if (document.body.contains(modal)) {
            document.body.removeChild(modal);
        }
    }, 300);
}

// Auto-animate counters when they come into view
function observeStats() {
    const statItems = document.querySelectorAll('.stat-item');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.hasAttribute('data-animated')) {
                entry.target.setAttribute('data-animated', 'true');
                const target = parseInt(entry.target.querySelector('.stat-number').getAttribute('data-target'));
                setTimeout(() => {
                    animateCounter(entry.target, target);
                }, Math.random() * 500);
            }
        });
    }, { threshold: 0.5 });

    statItems.forEach(item => observer.observe(item));
}

// Enhanced scroll effects
function addScrollEffects() {
    const elements = document.querySelectorAll('.stat-item, .footer-section');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    elements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s ease-out';
        observer.observe(el);
    });
}

// Initialize everything when page loads
window.addEventListener('load', () => {
    // Hide loading overlay
    const loadingOverlay = document.getElementById('loadingOverlay');
    setTimeout(() => {
        loadingOverlay.classList.add('fade-out');
    }, 1000);

    // Initialize features
    createParticles();
    observeStats();
    addScrollEffects();

    // Add welcome animation to hero
    const heroContainer = document.querySelector('.hero-container');
    heroContainer.style.opacity = '0';
    heroContainer.style.transform = 'translateY(30px)';
    
    setTimeout(() => {
        heroContainer.style.transition = 'all 1s ease-out';
        heroContainer.style.opacity = '1';
        heroContainer.style.transform = 'translateY(0)';
    }, 1200);
});

// Add hover effects to navigation links
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('mouseenter', () => {
        link.style.background = `linear-gradient(135deg, ${getComputedStyle(document.documentElement).getPropertyValue('--primary-color')}20, transparent)`;
    });
    
    link.addEventListener('mouseleave', () => {
        link.style.background = '';
    });
});

// Enhanced theme toggle with smooth transition
document.getElementById('themeToggle').addEventListener('click', () => {
    document.body.style.transition = 'all 0.5s ease';
    setTimeout(() => {
        document.body.style.transition = '';
    }, 500);
});

// Add typing effect to subtitle (optional enhancement)
function addTypingEffect() {
    const subtitle = document.querySelector('.hero-subtitle');
    const text = subtitle.textContent;
    subtitle.textContent = '';
    subtitle.style.borderRight = '2px solid var(--primary-color)';
    
    let i = 0;
    const typeTimer = setInterval(() => {
        subtitle.textContent = text.slice(0, i);
        i++;
        if (i > text.length) {
            clearInterval(typeTimer);
            subtitle.style.borderRight = 'none';
        }
    }, 30);
}

// Add smooth scrolling for future internal links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add parallax effect to hero background
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const hero = document.querySelector('.hero');
    if (hero && scrolled < window.innerHeight) {
        hero.style.transform = `translateY(${scrolled * 0.5}px)`;
    }
});

// Add click wave effect to buttons
document.querySelectorAll('button').forEach(button => {
    button.addEventListener('click', function(e) {
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        
        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.classList.add('ripple-effect');
        
        const rippleStyle = document.createElement('style');
        rippleStyle.textContent = `
            .ripple-effect {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.4);
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
            }
        `;
        if (!document.querySelector('style[data-ripple]')) {
            rippleStyle.setAttribute('data-ripple', 'true');
            document.head.appendChild(rippleStyle);
        }
        
        this.appendChild(ripple);
        setTimeout(() => ripple.remove(), 600);
    });
});