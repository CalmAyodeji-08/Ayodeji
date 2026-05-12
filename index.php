<?php
require_once 'includes/config.php';
$page_title = 'Home';
require_once 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero" id="hero">
  <div class="hero-bg">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>
    <div class="blob blob-4"></div>
    <div class="grid-overlay"></div>
  </div>

  <div class="hero-container">
    <div class="hero-content" data-aos="fade-right" data-aos-duration="900">
      <div class="hero-badge">
        <span class="badge-dot"></span>
        Available for work
      </div>
      <h1 class="hero-title">
        Hi, I'm <span class="gradient-text">Ayodeji</span>
      </h1>
      <h2 class="hero-subtitle">
        <span class="typed-text" id="typedText"></span><span class="cursor">|</span>
      </h2>
      <p class="hero-description">
        I craft clean, performant, and user-centric digital experiences — from pixel-perfect UIs to robust back-end systems.
      </p>
      <div class="hero-cta">
        <a href="pages/projects.php" class="btn btn-primary">
          <i class="fas fa-rocket"></i> View My Work
        </a>
        <a href="pages/contact.php" class="btn btn-outline">
          <i class="fas fa-paper-plane"></i> Get In Touch
        </a>
      </div>
      <div class="hero-stats">
        <div class="stat">
          <span class="stat-number">3+</span>
          <span class="stat-label">Years Exp.</span>
        </div>
        <div class="stat-divider"></div>
        <div class="stat">
          <span class="stat-number">20+</span>
          <span class="stat-label">Projects</span>
        </div>
        <div class="stat-divider"></div>
        <div class="stat">
          <span class="stat-number">15+</span>
          <span class="stat-label">Happy Clients</span>
        </div>
      </div>
    </div>

    <div class="hero-visual" data-aos="fade-left" data-aos-duration="900">
      <div class="avatar-wrapper">
        <div class="avatar-ring"></div>
        <div class="avatar-ring ring-2"></div>
        <div class="avatar-placeholder">
          <i class="fas fa-user"></i>
        </div>
        <div class="floating-badge badge-php">PHP</div>
        <div class="floating-badge badge-js">JS</div>
        <div class="floating-badge badge-react"><i class="fab fa-react"></i></div>
      </div>
    </div>
  </div>

  <div class="scroll-indicator">
    <span>Scroll</span>
    <div class="scroll-line"></div>
  </div>
</section>

<!-- Featured Projects -->
<section class="section featured-projects" id="featured">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <span class="section-tag">Portfolio</span>
      <h2 class="section-title">Featured <span class="gradient-text">Projects</span></h2>
      <p class="section-subtitle">A selection of my recent work</p>
    </div>

    <div class="projects-grid">
      <?php
      $featured = array_filter($projects, fn($p) => $p['featured']);
      foreach ($featured as $project): ?>
        <div class="project-card" data-aos="fade-up" data-aos-delay="<?php echo ($project['id'] - 1) * 100; ?>">
          <div class="project-icon" style="background: <?php echo $project['color']; ?>22; color: <?php echo $project['color']; ?>">
            <i class="fas <?php echo $project['icon']; ?>"></i>
          </div>
          <h3 class="project-title"><?php echo htmlspecialchars($project['title']); ?></h3>
          <p class="project-desc"><?php echo htmlspecialchars($project['description']); ?></p>
          <div class="project-tags">
            <?php foreach ($project['tags'] as $tag): ?>
              <span class="tag"><?php echo htmlspecialchars($tag); ?></span>
            <?php endforeach; ?>
          </div>
          <div class="project-links">
            <a href="<?php echo $project['github']; ?>" class="project-link" target="_blank" aria-label="GitHub">
              <i class="fab fa-github"></i> Code
            </a>
            <a href="<?php echo $project['live']; ?>" class="project-link project-link-live" target="_blank" aria-label="Live Demo">
              <i class="fas fa-arrow-up-right-from-square"></i> Live
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="section-cta" data-aos="fade-up">
      <a href="pages/projects.php" class="btn btn-outline">
        View All Projects <i class="fas fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>

<!-- Skills Snapshot -->
<section class="section skills-snapshot">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <span class="section-tag">Expertise</span>
      <h2 class="section-title">What I <span class="gradient-text">Do</span></h2>
    </div>
    <div class="services-grid">
      <div class="service-card" data-aos="fade-up" data-aos-delay="0">
        <div class="service-icon"><i class="fas fa-laptop-code"></i></div>
        <h3>Web Development</h3>
        <p>Building fast, scalable, and secure web applications using modern PHP, JavaScript, and frameworks.</p>
      </div>
      <div class="service-card" data-aos="fade-up" data-aos-delay="100">
        <div class="service-icon"><i class="fas fa-palette"></i></div>
        <h3>UI/UX Design</h3>
        <p>Designing intuitive interfaces with a focus on user experience, accessibility, and visual aesthetics.</p>
      </div>
      <div class="service-card" data-aos="fade-up" data-aos-delay="200">
        <div class="service-icon"><i class="fas fa-database"></i></div>
        <h3>Database Design</h3>
        <p>Architecting efficient relational and NoSQL databases optimized for performance and scalability.</p>
      </div>
      <div class="service-card" data-aos="fade-up" data-aos-delay="300">
        <div class="service-icon"><i class="fas fa-mobile-screen"></i></div>
        <h3>Responsive Design</h3>
        <p>Ensuring pixel-perfect, mobile-first experiences across all devices and screen sizes.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA Banner -->
<section class="cta-banner" data-aos="fade-up">
  <div class="container">
    <div class="cta-content">
      <h2>Ready to build something <span class="gradient-text">amazing</span>?</h2>
      <p>Let's collaborate and turn your ideas into reality.</p>
      <a href="pages/contact.php" class="btn btn-primary btn-lg">
        <i class="fas fa-paper-plane"></i> Start a Project
      </a>
    </div>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>
