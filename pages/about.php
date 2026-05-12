<?php
require_once '../includes/config.php';
$page_title = 'About';
require_once '../includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <div class="page-hero-content" data-aos="fade-up">
      <span class="section-tag">Get to know me</span>
      <h1>About <span class="gradient-text">Me</span></h1>
      <p>Passionate developer. Creative thinker. Problem solver.</p>
    </div>
  </div>
</section>

<section class="section about-section">
  <div class="container">
    <div class="about-grid">
      <!-- Avatar -->
      <div class="about-visual" data-aos="fade-right">
        <div class="about-avatar">
          <div class="avatar-placeholder large">
            <i class="fas fa-user"></i>
          </div>
          <div class="about-badge">
            <i class="fas fa-code"></i>
            <span>Full-Stack Dev</span>
          </div>
        </div>
        <div class="about-info-cards">
          <div class="info-card">
            <i class="fas fa-map-marker-alt"></i>
            <span><?php echo SITE_LOCATION; ?></span>
          </div>
          <div class="info-card">
            <i class="fas fa-envelope"></i>
            <span><?php echo SITE_EMAIL; ?></span>
          </div>
          <div class="info-card">
            <i class="fas fa-phone"></i>
            <span><?php echo SITE_PHONE; ?></span>
          </div>
        </div>
      </div>

      <!-- Bio -->
      <div class="about-text" data-aos="fade-left">
        <h2>Hello! I'm <span class="gradient-text">Ayodeji</span></h2>
        <p class="about-lead">
          A passionate Full-Stack Developer based in Lagos, Nigeria, with over 3 years of experience building modern web applications that are fast, accessible, and user-friendly.
        </p>
        <p>
          I specialize in PHP back-end development paired with modern JavaScript frameworks on the front end. I love turning complex problems into simple, beautiful, and intuitive solutions. When I'm not coding, you'll find me exploring new technologies, contributing to open source, or mentoring aspiring developers.
        </p>
        <p>
          My approach combines technical excellence with creative design thinking — I believe great software is both functional and beautiful.
        </p>

        <div class="about-highlights">
          <div class="highlight">
            <i class="fas fa-graduation-cap"></i>
            <div>
              <strong>B.Sc. Computer Science</strong>
              <span>University of Lagos, 2021</span>
            </div>
          </div>
          <div class="highlight">
            <i class="fas fa-briefcase"></i>
            <div>
              <strong>Senior Developer</strong>
              <span>TechCorp Nigeria, 2022–Present</span>
            </div>
          </div>
          <div class="highlight">
            <i class="fas fa-certificate"></i>
            <div>
              <strong>AWS Certified Developer</strong>
              <span>Amazon Web Services, 2023</span>
            </div>
          </div>
        </div>

        <div class="about-cta">
          <a href="../pages/contact.php" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> Hire Me
          </a>
          <a href="#" class="btn btn-outline" download>
            <i class="fas fa-download"></i> Download CV
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Timeline -->
<section class="section timeline-section">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <span class="section-tag">Journey</span>
      <h2 class="section-title">My <span class="gradient-text">Timeline</span></h2>
    </div>
    <div class="timeline">
      <?php
      $timeline = [
        ['year' => '2024', 'title' => 'Lead Developer', 'org' => 'StartupHub Lagos', 'desc' => 'Leading a team of 5 developers building SaaS products for African markets.', 'icon' => 'fa-star'],
        ['year' => '2022', 'title' => 'Full-Stack Developer', 'org' => 'TechCorp Nigeria', 'desc' => 'Developed and maintained enterprise web applications serving 50k+ users.', 'icon' => 'fa-briefcase'],
        ['year' => '2021', 'title' => 'Junior Developer', 'org' => 'FreelanceHub', 'desc' => 'Delivered 10+ client projects ranging from e-commerce to portfolio sites.', 'icon' => 'fa-laptop-code'],
        ['year' => '2021', 'title' => 'B.Sc. Computer Science', 'org' => 'University of Lagos', 'desc' => 'Graduated with Second Class Upper Honours. Final project: AI-powered web scraper.', 'icon' => 'fa-graduation-cap'],
        ['year' => '2019', 'title' => 'Started Coding', 'org' => 'Self-taught', 'desc' => 'Fell in love with web development through HTML, CSS, and PHP tutorials.', 'icon' => 'fa-rocket'],
      ];
      foreach ($timeline as $i => $item): ?>
        <div class="timeline-item <?php echo $i % 2 === 0 ? 'left' : 'right'; ?>" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
          <div class="timeline-content">
            <div class="timeline-icon"><i class="fas <?php echo $item['icon']; ?>"></i></div>
            <span class="timeline-year"><?php echo $item['year']; ?></span>
            <h3><?php echo htmlspecialchars($item['title']); ?></h3>
            <span class="timeline-org"><?php echo htmlspecialchars($item['org']); ?></span>
            <p><?php echo htmlspecialchars($item['desc']); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="timeline-line"></div>
    </div>
  </div>
</section>

<?php require_once '../includes/footer.php'; ?>
