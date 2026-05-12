// ===== Mobile Navigation =====
const burger = document.querySelector('.burger');
const navLinks = document.querySelector('.nav-links');

burger.addEventListener('click', () => {
    burger.classList.toggle('active');
    navLinks.classList.toggle('active');
});

// Close nav on link click
document.querySelectorAll('.nav-links a').forEach(link => {
    link.addEventListener('click', () => {
        burger.classList.remove('active');
        navLinks.classList.remove('active');
    });
});

// ===== Navbar Scroll Effect =====
const navbar = document.querySelector('.navbar');
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        navbar.style.padding = '10px 0';
        navbar.style.boxShadow = '0 4px 30px rgba(0,0,0,0.3)';
    } else {
        navbar.style.padding = '16px 0';
        navbar.style.boxShadow = 'none';
    }
});

// ===== Active Nav Link on Scroll =====
const sections = document.querySelectorAll('section[id]');
const navItems = document.querySelectorAll('.nav-links a');

window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop - 100;
        if (window.scrollY >= sectionTop) {
            current = section.getAttribute('id');
        }
    });

    navItems.forEach(item => {
        item.style.color = '';
        item.style.background = '';
        if (item.getAttribute('href') === `#${current}`) {
            item.style.color = '#6c63ff';
            item.style.background = 'rgba(108, 99, 255, 0.1)';
        }
    });
});

// ===== Intersection Observer for Fade-In =====
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, observerOptions);

// Add fade-in class to elements
const animateElements = [
    '.skill-card',
    '.project-card',
    '.stat-item',
    '.contact-item',
    '.about-text',
    '.about-image'
];

animateElements.forEach(selector => {
    document.querySelectorAll(selector).forEach((el, i) => {
        el.classList.add('fade-in');
        el.style.transitionDelay = `${i * 0.1}s`;
        observer.observe(el);
    });
});

// ===== Skill Bar Animation =====
const skillObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const bars = entry.target.querySelectorAll('.skill-progress');
            bars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.width = width;
                }, 200);
            });
            skillObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.3 });

const skillsSection = document.querySelector('.skills');
if (skillsSection) skillObserver.observe(skillsSection);

// ===== Contact Form =====
const form = document.querySelector('.contact-form');
form.addEventListener('submit', (e) => {
    e.preventDefault();
    const btn = form.querySelector('button[type="submit"]');
    const originalText = btn.textContent;

    btn.textContent = 'Sending...';
    btn.disabled = true;

    // Simulate sending
    setTimeout(() => {
        btn.textContent = '✓ Message Sent!';
        btn.style.background = 'linear-gradient(135deg, #43e97b, #38f9d7)';
        form.reset();

        setTimeout(() => {
            btn.textContent = originalText;
            btn.style.background = '';
            btn.disabled = false;
        }, 3000);
    }, 1500);
});

// ===== Smooth Cursor Glow (optional enhancement) =====
const glow = document.createElement('div');
glow.style.cssText = `
    position: fixed;
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255,255,255,0.12) 0%, rgba(255,255,255,0.04) 40%, transparent 70%);
    pointer-events: none;
    z-index: 0;
    transform: translate(-50%, -50%);
    transition: left 0.3s ease, top 0.3s ease;
`;
document.body.appendChild(glow);

document.addEventListener('mousemove', (e) => {
    glow.style.left = e.clientX + 'px';
    glow.style.top = e.clientY + 'px';
});
