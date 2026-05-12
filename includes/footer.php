<!-- Footer -->
<footer class="footer">
  <div class="footer-container">
    <div class="footer-brand">
      <a href="../index.php" class="nav-logo">
        <span class="logo-bracket">&lt;</span>UA<span class="logo-bracket">/&gt;</span>
      </a>
      <p>Building digital experiences that matter.</p>
    </div>

    <div class="footer-links">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../pages/about.php">About</a></li>
        <li><a href="../pages/projects.php">Projects</a></li>
        <li><a href="../pages/skills.php">Skills</a></li>
        <li><a href="../pages/contact.php">Contact</a></li>
      </ul>
    </div>

    <div class="footer-social">
      <h4>Connect</h4>
      <div class="social-icons">
        <a href="#" aria-label="GitHub" target="_blank"><i class="fab fa-github"></i></a>
        <a href="#" aria-label="LinkedIn" target="_blank"><i class="fab fa-linkedin-in"></i></a>
        <a href="#" aria-label="Twitter" target="_blank"><i class="fab fa-x-twitter"></i></a>
        <a href="#" aria-label="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="#" aria-label="Dribbble" target="_blank"><i class="fab fa-dribbble"></i></a>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy; <?php echo date('Y'); ?> <strong>Ayodeji</strong>. All rights reserved.</p>
    <p>Crafted with <i class="fas fa-heart" style="color:#e74c3c;"></i> &amp; PHP</p>
  </div>
</footer>

<!-- Back to Top -->
<button class="back-to-top" id="backToTop" aria-label="Back to top">
  <i class="fas fa-arrow-up"></i>
</button>

<!-- AOS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<!-- Main JS -->
<script src="<?php echo str_repeat('../', substr_count($_SERVER['PHP_SELF'], '/') - 2); ?>assets/js/main.js"></script>
</body>
</html>
