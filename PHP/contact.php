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
    <?php include '../includes/header.php'; ?>

    <!-- CONTACT SECTION -->
    <section class="contact-section">
      <div class="contact-container obj-width">
        <div class="student-form">
          <form>
            <input type="text" id="name" placeholder="Your Name" />
            <input type="text" id="subject" placeholder="Your Subject" />
            <input type="email" id="email" placeholder="Your Email" />
            <input type="number" id="phone-number" placeholder="Your Phone" />
            <textarea
              name="message"
              id="message"
              placeholder="Your Message..."
            ></textarea>
            <button type="submit" id="submit">Submit Message</button>
          </form>
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
    <?php include '../includes/footer.php'; ?>
    <script src="../js/script.js"></script>
  </body>
</html>
