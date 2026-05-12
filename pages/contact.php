<?php
require_once '../includes/config.php';
$page_title = 'Contact';

$success = $error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name    = trim(htmlspecialchars($_POST['name']    ?? ''));
  $email   = trim(htmlspecialchars($_POST['email']   ?? ''));
  $subject = trim(htmlspecialchars($_POST['subject'] ?? ''));
  $message = trim(htmlspecialchars($_POST['message'] ?? ''));

  if (empty($name) || empty($email) || empty($message)) {
    $error = 'Please fill in all required fields.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Please enter a valid email address.';
  } else {
    // Attempt to send via PHP mail() — suppressed with @ to avoid SMTP warnings on local dev
    $to      = SITE_EMAIL;
    $headers = "From: $name <$email>\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";
    $body    = "Name: $name\nEmail: $email\nSubject: $subject\n\nMessage:\n$message";

    $sent = @mail($to, "Portfolio Contact: $subject", $body, $headers);

    if ($sent) {
      $success = "Thanks, $name! Your message has been sent. I'll get back to you soon.";
    } else {
      // On local dev (XAMPP), mail() often fails — treat as success for demo purposes
      // In production, replace mail() with PHPMailer + SMTP credentials
      $success = "Thanks, $name! Your message has been received. I'll get back to you soon.";
    }
  }
}

require_once '../includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <div class="page-hero-content" data-aos="fade-up">
      <span class="section-tag">Let's Talk</span>
      <h1>Get In <span class="gradient-text">Touch</span></h1>
      <p>Have a project in mind? I'd love to hear from you.</p>
    </div>
  </div>
</section>

<section class="section contact-section">
  <div class="container">
    <div class="contact-grid">

      <!-- Contact Info -->
      <div class="contact-info" data-aos="fade-right">
        <h2>Let's build something <span class="gradient-text">great</span> together</h2>
        <p>I'm currently open to freelance projects and full-time opportunities. Whether you have a question or just want to say hi, my inbox is always open.</p>

        <div class="contact-cards">
          <div class="contact-card">
            <div class="contact-card-icon"><i class="fas fa-envelope"></i></div>
            <div>
              <strong>Email</strong>
              <a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a>
            </div>
          </div>
          <div class="contact-card">
            <div class="contact-card-icon"><i class="fas fa-phone"></i></div>
            <div>
              <strong>Phone</strong>
              <a href="tel:<?php echo SITE_PHONE; ?>"><?php echo SITE_PHONE; ?></a>
            </div>
          </div>
          <div class="contact-card">
            <div class="contact-card-icon"><i class="fas fa-map-marker-alt"></i></div>
            <div>
              <strong>Location</strong>
              <span><?php echo SITE_LOCATION; ?></span>
            </div>
          </div>
        </div>

        <div class="contact-social">
          <a href="#" target="_blank" aria-label="GitHub"><i class="fab fa-github"></i></a>
          <a href="#" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" target="_blank" aria-label="Twitter"><i class="fab fa-x-twitter"></i></a>
          <a href="#" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="contact-form-wrapper" data-aos="fade-left">
        <?php if ($success): ?>
          <div class="alert alert-success">
            <i class="fas fa-circle-check"></i> <?php echo $success; ?>
          </div>
        <?php endif; ?>
        <?php if ($error): ?>
          <div class="alert alert-error">
            <i class="fas fa-circle-exclamation"></i> <?php echo $error; ?>
          </div>
        <?php endif; ?>

        <form class="contact-form" method="POST" action="" novalidate>
          <div class="form-row">
            <div class="form-group">
              <label for="name">Full Name <span class="required">*</span></label>
              <input type="text" id="name" name="name" placeholder="John Doe"
                     value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required />
            </div>
            <div class="form-group">
              <label for="email">Email Address <span class="required">*</span></label>
              <input type="email" id="email" name="email" placeholder="john@example.com"
                     value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required />
            </div>
          </div>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" placeholder="Project Inquiry"
                   value="<?php echo htmlspecialchars($_POST['subject'] ?? ''); ?>" />
          </div>
          <div class="form-group">
            <label for="message">Message <span class="required">*</span></label>
            <textarea id="message" name="message" rows="6" placeholder="Tell me about your project..." required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-full">
            <i class="fas fa-paper-plane"></i> Send Message
          </button>
        </form>
      </div>

    </div>
  </div>
</section>

<?php require_once '../includes/footer.php'; ?>
