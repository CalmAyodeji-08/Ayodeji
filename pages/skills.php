<?php
require_once '../includes/config.php';
$page_title = 'Skills';
require_once '../includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <div class="page-hero-content" data-aos="fade-up">
      <span class="section-tag">Expertise</span>
      <h1>My <span class="gradient-text">Skills</span></h1>
      <p>Technologies and tools I work with every day.</p>
    </div>
  </div>
</section>

<section class="section skills-section">
  <div class="container">
    <?php foreach ($skills as $category => $items): ?>
      <div class="skills-category" data-aos="fade-up">
        <h2 class="skills-category-title">
          <?php
          $icons = ['Frontend' => 'fa-desktop', 'Backend' => 'fa-server', 'Tools' => 'fa-wrench'];
          ?>
          <i class="fas <?php echo $icons[$category] ?? 'fa-code'; ?>"></i>
          <?php echo htmlspecialchars($category); ?>
        </h2>
        <div class="skills-grid">
          <?php foreach ($items as $i => $skill): ?>
            <div class="skill-card" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
              <div class="skill-header">
                <div class="skill-icon" style="color: <?php echo $skill['color']; ?>">
                  <i class="<?php echo $skill['icon']; ?>"></i>
                </div>
                <div class="skill-info">
                  <span class="skill-name"><?php echo htmlspecialchars($skill['name']); ?></span>
                  <span class="skill-percent"><?php echo $skill['level']; ?>%</span>
                </div>
              </div>
              <div class="skill-bar">
                <div class="skill-fill"
                     style="--target-width: <?php echo $skill['level']; ?>%; background: <?php echo $skill['color']; ?>">
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- Tech Stack Logos -->
<section class="section tech-logos-section">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <span class="section-tag">Stack</span>
      <h2 class="section-title">Tech <span class="gradient-text">Stack</span></h2>
    </div>
    <div class="tech-logos" data-aos="fade-up">
      <?php
      $techs = [
        ['icon' => 'fab fa-html5',    'name' => 'HTML5',      'color' => '#e34f26'],
        ['icon' => 'fab fa-css3-alt', 'name' => 'CSS3',       'color' => '#1572b6'],
        ['icon' => 'fab fa-js',       'name' => 'JavaScript', 'color' => '#f7df1e'],
        ['icon' => 'fab fa-php',      'name' => 'PHP',        'color' => '#777bb4'],
        ['icon' => 'fab fa-react',    'name' => 'React',      'color' => '#61dafb'],
        ['icon' => 'fab fa-vuejs',    'name' => 'Vue.js',     'color' => '#42b883'],
        ['icon' => 'fab fa-node-js',  'name' => 'Node.js',    'color' => '#339933'],
        ['icon' => 'fab fa-git-alt',  'name' => 'Git',        'color' => '#f05032'],
        ['icon' => 'fab fa-docker',   'name' => 'Docker',     'color' => '#2496ed'],
        ['icon' => 'fab fa-linux',    'name' => 'Linux',      'color' => '#fcc624'],
        ['icon' => 'fab fa-figma',    'name' => 'Figma',      'color' => '#f24e1e'],
        ['icon' => 'fas fa-database', 'name' => 'MySQL',      'color' => '#4479a1'],
      ];
      foreach ($techs as $tech): ?>
        <div class="tech-logo-item">
          <i class="<?php echo $tech['icon']; ?>" style="color: <?php echo $tech['color']; ?>"></i>
          <span><?php echo $tech['name']; ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require_once '../includes/footer.php'; ?>
