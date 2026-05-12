<?php
require_once '../includes/config.php';
$page_title = 'Projects';
require_once '../includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <div class="page-hero-content" data-aos="fade-up">
      <span class="section-tag">My Work</span>
      <h1>All <span class="gradient-text">Projects</span></h1>
      <p>A showcase of things I've built with passion and purpose.</p>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">

    <!-- Filter Buttons -->
    <div class="filter-bar" data-aos="fade-up">
      <button class="filter-btn active" data-filter="all">All</button>
      <button class="filter-btn" data-filter="PHP">PHP</button>
      <button class="filter-btn" data-filter="JavaScript">JavaScript</button>
      <button class="filter-btn" data-filter="React">React</button>
      <button class="filter-btn" data-filter="MySQL">MySQL</button>
    </div>

    <!-- Projects Grid -->
    <div class="projects-grid all-projects" id="projectsGrid">
      <?php foreach ($projects as $i => $project): ?>
        <div class="project-card filterable"
             data-tags="<?php echo implode(',', $project['tags']); ?>"
             data-aos="fade-up"
             data-aos-delay="<?php echo ($i % 3) * 100; ?>">
          <div class="project-icon" style="background: <?php echo $project['color']; ?>22; color: <?php echo $project['color']; ?>">
            <i class="fas <?php echo $project['icon']; ?>"></i>
          </div>
          <?php if ($project['featured']): ?>
            <span class="featured-badge">Featured</span>
          <?php endif; ?>
          <h3 class="project-title"><?php echo htmlspecialchars($project['title']); ?></h3>
          <p class="project-desc"><?php echo htmlspecialchars($project['description']); ?></p>
          <div class="project-tags">
            <?php foreach ($project['tags'] as $tag): ?>
              <span class="tag"><?php echo htmlspecialchars($tag); ?></span>
            <?php endforeach; ?>
          </div>
          <div class="project-links">
            <a href="<?php echo $project['github']; ?>" class="project-link" target="_blank">
              <i class="fab fa-github"></i> Code
            </a>
            <a href="<?php echo $project['live']; ?>" class="project-link project-link-live" target="_blank">
              <i class="fas fa-arrow-up-right-from-square"></i> Live
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div id="noResults" class="no-results" style="display:none;">
      <i class="fas fa-search"></i>
      <p>No projects found for this filter.</p>
    </div>
  </div>
</section>

<?php require_once '../includes/footer.php'; ?>
