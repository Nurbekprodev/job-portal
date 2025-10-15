<?php
include '../includes/functions.php';

$user = [
    "name"    => "",
    "subject" => "",
    "email"   => "",
    "phone"   => "",
    "message" => ""
];

$errors = [
    "name"    => "",
    "subject" => "",
    "email"   => "",
    "phone"   => "",
    "message" => ""
];

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['name']) ){
        $user['name'] = $_POST['name'];
    }
    if(isset($_POST['subject']) ){
        $user['subject'] = $_POST['subject'];
    }
    if(isset($_POST['email']) ){
        $user['email'] = $_POST['email'];
    }
    if(isset($_POST['phone']) ){
        $user['phone'] = $_POST['phone'];
    }
    if (isset($_POST['message'])) {
    $user['message'] = $_POST['message'];
    }

    $errors['name'] = isValidName($user['name']);
    $errors['subject'] = isValidSubject($user['subject']);
    $errors['email'] = isValidEmail($user['email']);
    $errors['phone'] = isValidPhone($user['phone']);
    $errors['message'] = isValidMessage($user['message']);
}

$success = "Thanks! Your message is on its way. We'll get back to you as soon as possible.";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    />

    <title>Job Portal</title>
  </head>
  <body>
    <!-- HEADER section -->
  <?php include __DIR__ . '/../includes/header.php'; ?>

    <!-- CONTACT SECTION -->
    <section class="contact-section">
      <div class="contact-container obj-width">
        <div class="student-form">


          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <input type="text" id="name" name="name" placeholder="Your Name" value="<?php echo htmlspecialchars($user['name']); ?>" />
            <input type="text" id="subject" name="subject" placeholder="Your Subject" value="<?php echo htmlspecialchars($user['subject']); ?>" />
            <input type="email" id="email" name="email" placeholder="Your Email" value="<?php echo htmlspecialchars($user['email']); ?>" />
            <input type="tel" id="phone-number" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
            <textarea name="message" id="message" placeholder="Your Message..."><?php echo htmlspecialchars($user['message']); ?></textarea>
            <button type="submit" id="submit">Submit Message</button>
          </form>

          <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !array_filter($errors)): ?>
            <div class="form-success" role="status" aria-live="polite"><?php echo htmlspecialchars($success); ?></div>
          <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && array_filter($errors)): ?>
            <div class="form-errors" role="alert">
              <ul>
                <?php
                  foreach ($errors as $err) {
                    if ($err) {
                      echo '<li>' . htmlspecialchars($err) . '</li>';
                    }
                  }
                ?>
              </ul>
            </div>
          <?php endif; ?>
          

        </div>


        <div class="contact-info">
          <div class="contact-info-header">
            <h2>Contact Information</h2>
            <p>
              We’re here to help — reach out to us anytime and we’ll get back to
              you as soon as possible.
            </p>
          </div>

          <div class="contacts">
            <p><i class="fas fa-phone"></i><span class="contacts-text">+82 010-1234-5678</span></p>
            <p><i class="fas fa-envelope"></i><span class="contacts-text">example@gmail.com</span></p>
            <p>
              <i class="fas fa-map-marker-alt"></i
              ><span class="contacts-text"
                >123 Busan Central Street, Haeundae-gu, Busan, South Korea</span
              >
            </p>
          </div>

          <div class="quick-links">
            <h2>Follow Us on</h2>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i> </a>
            <a href="#"><i class="fab fa-linkedin-in"></i> </a>
            <a href="#"><i class="fab fa-twitter"></i> </a>
            <a href="#"><i class="fab fa-youtube"></i> </a>
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
  <?php include __DIR__ . '/../includes/footer.php'; ?>
  <script src="<?php echo htmlspecialchars((dirname($_SERVER['SCRIPT_NAME']) === '/' ? '' : dirname($_SERVER['SCRIPT_NAME'])) . '/../js/script.js'); ?>"></script>
  </body>
</html>
