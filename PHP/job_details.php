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

    <!-- JOB DETAILS  -->
    <section class="job-details-section">
      <!-- Job 1 -->
      <div class="job-details-container">
        <!-- Left Side: Job Details -->
        <div class="job-details-inner">
          <div class="job-details-head">
            <!-- Company Logo -->
            <div class="company-logo">
              <a href="#" style="border-radius: 4px; overflow: hidden">
                <img src="../images/company-logo-1.jpeg" alt="Restaurant Logo" />
              </a>
            </div>

            <!-- Job Title & Company -->
            <div class="content">
              <h5 class="title">Restaurant Kitchen Assistant</h5>
              <ul class="meta">
                <li>
                  <strong class="text-primary"
                    ><a href="#">Seoul Garden Restaurant</a></strong
                  >
                </li>
                <li>
                  <i class="lni lni-map-marker"></i> Gangnam-gu, Seoul, South
                  Korea
                </li>
              </ul>
            </div>
            <!-- Salary & Job Type -->
            <div class="salary-type">
              <span class="salary-range">₩1,5M - ₩2M / month</span>
              <span class="badge badge-success">Part Time</span>
            </div>
          </div>

          <!-- Job Details Body -->
          <div class="job-details-body">
            <h6>Job Description</h6>
            <p>
              We are looking for a motivated and reliable Kitchen Assistant to
              join our busy restaurant team. You will help with basic food
              preparation, maintaining cleanliness in the kitchen, and
              supporting chefs to ensure smooth operations.
            </p>

            <h6>Responsibilities</h6>
            <ul>
              <li>Assist chefs with food preparation and plating</li>
              <li>Maintain cleanliness and hygiene in the kitchen</li>
              <li>Wash, peel, chop, and cut ingredients</li>
              <li>Follow food safety and sanitation standards</li>
              <li>Support the kitchen team during peak hours</li>
            </ul>

            <h6>Education + Experience</h6>
            <ul>
              <li>High school diploma or equivalent preferred</li>
              <li>Previous experience in a restaurant or kitchen is a plus</li>
              <li>Basic knowledge of food hygiene and safety</li>
              <li>Ability to work in a fast-paced environment</li>
            </ul>

            <h6>Benefits</h6>
            <ul>
              <li>Staff meals provided</li>
              <li>Overtime pay available</li>
              <li>Weekly rest days</li>
              <li>Friendly and supportive work environment</li>
            </ul>
          </div>
        </div>

        <!-- Right Side: Sidebar -->
        <div class="job-details-sidebar">
          <!-- Apply Buttons -->
          <div class="sidebar-widget">
            <div class="inner">
              <a href="#" class="btn save-btn"
                ><i class="fa fa-heart-o mr-1"></i> Save Job</a
              >
              <a href="#" class="btn apply-now-btn">Apply Now</a>
            </div>
          </div>

          <!-- Job Overview -->
          <div class="sidebar-widget">
            <div class="inner">
              <h6 class="title">Job Overview</h6>
              <ul class="job-overview list-unstyled">
                <li><strong>Published on:</strong> Sept 20, 2025</li>
                <li><strong>Vacancy:</strong> 02</li>
                <li><strong>Employment Status:</strong> Part-time</li>
                <li><strong>Experience:</strong> 1 year preferred</li>
                <li><strong>Job Location:</strong> Gangnam, Seoul</li>
                <li><strong>Salary:</strong> ₩1.5M - ₩2M / month</li>
                <li><strong>Gender:</strong> Any</li>
                <li><strong>Application Deadline:</strong> Oct 15, 2025</li>
              </ul>
            </div>
          </div>

          <!-- Job Location -->
          <div class="sidebar-widget">
            <div class="inner">
              <h6 class="title">Job Location</h6>
              <div class="mapouter">
                <div class="gmap_canvas">
                  <iframe
                    width="100%"
                    height="300"
                    id="gmap_canvas"
                    src="https://maps.google.com/maps?q=Gangnam%20Seoul&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    frameborder="0"
                    scrolling="no"
                    marginheight="0"
                    marginwidth="0"
                  ></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <?php include '../includes/footer.php'; ?>
    <script src="../js/script.js"></script>
  </body>
</html>
