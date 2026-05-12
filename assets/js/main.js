/**
 * Ayodeji Portfolio — main.js
 * Deep Navy Neon Theme — Enhanced Animations
 */

/* ── Loader ─────────────────────────────────────────────────── */
function initLoader() {
  const loader = document.getElementById('loader');
  if (!loader) return;
  setTimeout(() => {
    loader.classList.add('hidden');
    loader.addEventListener('transitionend', () => {
      loader.style.display = 'none';
    }, { once: true });
  }, 900);
}

/* ── Navbar ─────────────────────────────────────────────────── */
function initNavbar() {
  const navbar    = document.querySelector('.navbar');
  const hamburger = document.getElementById('hamburger');
  const navLinks  = document.getElementById('navLinks');
  if (!navbar) return;

  function onScroll() {
    navbar.classList.toggle('scrolled', window.scrollY > 50);
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  if (hamburger && navLinks) {
    hamburger.addEventListener('click', () => {
      navLinks.classList.toggle('open');
      hamburger.classList.toggle('active');
    });
    navLinks.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        navLinks.classList.remove('open');
        hamburger.classList.remove('active');
      });
    });
  }
}

/* ── Typed Text ─────────────────────────────────────────────── */
function initTypedText() {
  const el = document.getElementById('typedText');
  if (!el) return;

  const phrases = [
    'Full-Stack Developer',
    'UI/UX Designer',
    'PHP Expert',
    'JavaScript Enthusiast',
    'React Developer',
  ];

  let phraseIndex = 0;
  let charIndex   = 0;
  let isDeleting  = false;
  let isPaused    = false;

  function tick() {
    if (isPaused) return;
    const current = phrases[phraseIndex];

    if (!isDeleting) {
      el.textContent = current.slice(0, charIndex + 1);
      charIndex++;
      if (charIndex === current.length) {
        isPaused = true;
        setTimeout(() => { isPaused = false; isDeleting = true; loop(); }, 2200);
        return;
      }
      setTimeout(loop, 55);
    } else {
      el.textContent = current.slice(0, charIndex - 1);
      charIndex--;
      if (charIndex === 0) {
        isDeleting  = false;
        phraseIndex = (phraseIndex + 1) % phrases.length;
      }
      setTimeout(loop, 28);
    }
  }

  function loop() { tick(); }
  loop();
}

/* ── Skill Bars ─────────────────────────────────────────────── */
function initSkillBars() {
  const fills = document.querySelectorAll('.skill-fill');
  if (!fills.length) return;

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.3 });

  fills.forEach(fill => observer.observe(fill));
}

/* ── Stat Counter Animation ─────────────────────────────────── */
function initCounters() {
  const stats = document.querySelectorAll('.stat-number');
  if (!stats.length) return;

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const el  = entry.target;
      const raw = el.textContent.replace(/[^0-9]/g, '');
      const end = parseInt(raw, 10);
      if (isNaN(end)) return;

      const suffix = el.textContent.replace(/[0-9]/g, '');
      let start    = 0;
      const dur    = 1800;
      const step   = 16;
      const inc    = end / (dur / step);

      const timer = setInterval(() => {
        start += inc;
        if (start >= end) {
          el.textContent = end + suffix;
          clearInterval(timer);
        } else {
          el.textContent = Math.floor(start) + suffix;
        }
      }, step);

      observer.unobserve(el);
    });
  }, { threshold: 0.5 });

  stats.forEach(s => observer.observe(s));
}

/* ── Filter Buttons ─────────────────────────────────────────── */
function initFilterButtons() {
  const filterBtns = document.querySelectorAll('.filter-btn');
  const cards      = document.querySelectorAll('.filterable');
  const noResults  = document.getElementById('noResults');
  if (!filterBtns.length) return;

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filter = btn.dataset.filter;
      let visible  = 0;

      cards.forEach(card => {
        const tags = (card.dataset.tags || '').split(',').map(t => t.trim());
        const show = filter === 'all' || tags.includes(filter);
        card.style.display = show ? '' : 'none';
        if (show) visible++;
      });

      if (noResults) noResults.style.display = visible === 0 ? 'block' : 'none';
    });
  });
}

/* ── Back to Top ────────────────────────────────────────────── */
function initBackToTop() {
  const btn = document.getElementById('backToTop');
  if (!btn) return;

  window.addEventListener('scroll', () => {
    btn.classList.toggle('visible', window.scrollY > 300);
  }, { passive: true });

  btn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}

/* ── Tilt effect on project cards ───────────────────────────── */
function initCardTilt() {
  const cards = document.querySelectorAll('.project-card, .service-card, .skill-card');
  cards.forEach(card => {
    card.addEventListener('mousemove', e => {
      const rect   = card.getBoundingClientRect();
      const x      = e.clientX - rect.left;
      const y      = e.clientY - rect.top;
      const cx     = rect.width  / 2;
      const cy     = rect.height / 2;
      const rotX   = ((y - cy) / cy) * -6;
      const rotY   = ((x - cx) / cx) *  6;
      card.style.transform = `perspective(800px) rotateX(${rotX}deg) rotateY(${rotY}deg) translateY(-6px)`;
    });
    card.addEventListener('mouseleave', () => {
      card.style.transform = '';
    });
  });
}

/* ── Floating particles on hero ─────────────────────────────── */
function initParticles() {
  const hero = document.querySelector('.hero-bg');
  if (!hero) return;

  const count = 28;
  for (let i = 0; i < count; i++) {
    const p = document.createElement('div');
    p.style.cssText = `
      position: absolute;
      width: ${Math.random() * 3 + 1}px;
      height: ${Math.random() * 3 + 1}px;
      border-radius: 50%;
      background: ${Math.random() > 0.5 ? 'rgba(77,159,255,0.6)' : 'rgba(139,92,246,0.6)'};
      left: ${Math.random() * 100}%;
      top: ${Math.random() * 100}%;
      animation: particleFloat ${Math.random() * 12 + 8}s ease-in-out infinite alternate;
      animation-delay: ${Math.random() * -10}s;
      pointer-events: none;
    `;
    hero.appendChild(p);
  }

  // Inject keyframes if not already present
  if (!document.getElementById('particleStyle')) {
    const style = document.createElement('style');
    style.id = 'particleStyle';
    style.textContent = `
      @keyframes particleFloat {
        0%   { transform: translate(0, 0) scale(1); opacity: 0.4; }
        50%  { opacity: 0.9; }
        100% { transform: translate(${Math.random() > 0.5 ? '' : '-'}${Math.floor(Math.random()*60+20)}px,
                                    ${Math.random() > 0.5 ? '' : '-'}${Math.floor(Math.random()*60+20)}px) scale(1.5); opacity: 0.2; }
      }
    `;
    document.head.appendChild(style);
  }
}

/* ── Cursor glow trail ──────────────────────────────────────── */
function initCursorGlow() {
  const glow = document.createElement('div');
  glow.style.cssText = `
    position: fixed;
    width: 300px; height: 300px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(77,159,255,0.06) 0%, transparent 70%);
    pointer-events: none;
    z-index: 0;
    transform: translate(-50%, -50%);
    transition: left 0.12s ease, top 0.12s ease;
  `;
  document.body.appendChild(glow);

  document.addEventListener('mousemove', e => {
    glow.style.left = e.clientX + 'px';
    glow.style.top  = e.clientY + 'px';
  });
}

/* ── Bootstrap ──────────────────────────────────────────────── */
document.addEventListener('DOMContentLoaded', () => {
  initLoader();
  initNavbar();
  initTypedText();
  initSkillBars();
  initCounters();
  initFilterButtons();
  initBackToTop();
  initCardTilt();
  initParticles();
  initCursorGlow();

  if (typeof AOS !== 'undefined') {
    AOS.init({ duration: 800, once: true, offset: 80, easing: 'ease-out-cubic' });
  }
});
