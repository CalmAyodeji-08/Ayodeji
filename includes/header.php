<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Usman Ayodeji – Full-Stack Developer & UI/UX Designer Portfolio" />
  <title><?php echo isset($page_title) ? $page_title . ' | Usman Ayodeji' : 'Usman Ayodeji | Portfolio'; ?></title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <!-- AOS Animation -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="<?php echo str_repeat('../', substr_count($_SERVER['PHP_SELF'], '/') - 2); ?>assets/css/style.css" />
</head>
<body>

<!-- Loader -->
<div id="loader">
  <div class="loader-ring"></div>
</div>

<!-- Navbar -->
<nav class="navbar" id="navbar">
  <div class="nav-container">
    <a href="<?php echo str_repeat('../', substr_count($_SERVER['PHP_SELF'], '/') - 2); ?>index.php" class="nav-logo">
      <span class="logo-bracket">&lt;</span>UA<span class="logo-bracket">/&gt;</span>
    </a>

    <ul class="nav-links" id="navLinks">
      <li><a href="<?php echo str_repeat('../', substr_count($_SERVER['PHP_SELF'], '/') - 2); ?>index.php" class="<?php echo $current_page === 'index.php' ? 'active' : ''; ?>">Home</a></li>
      <li><a href="<?php echo str_repeat('../', substr_count($_SERVER['PHP_SELF'], '/') - 2); ?>pages/about.php" class="<?php echo $current_page === 'about.php' ? 'active' : ''; ?>">About</a></li>
      <li><a href="<?php echo str_repeat('../', substr_count($_SERVER['PHP_SELF'], '/') - 2); ?>pages/projects.php" class="<?php echo $current_page === 'projects.php' ? 'active' : ''; ?>">Projects</a></li>
      <li><a href="<?php echo str_repeat('../', substr_count($_SERVER['PHP_SELF'], '/') - 2); ?>pages/skills.php" class="<?php echo $current_page === 'skills.php' ? 'active' : ''; ?>">Skills</a></li>
      <li><a href="<?php echo str_repeat('../', substr_count($_SERVER['PHP_SELF'], '/') - 2); ?>pages/contact.php" class="<?php echo $current_page === 'contact.php' ? 'active' : ''; ?>">Contact</a></li>
    </ul>

    <div class="nav-actions">
      <button class="hamburger" id="hamburger" aria-label="Toggle menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</nav>
