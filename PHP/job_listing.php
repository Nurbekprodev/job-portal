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

    <!-- SEARCH BAR section -->
    <section class="search-bar-section">
      <div class="search-bar obj-width">
        <div class="search-bar-title">
          <h2>Find Your Dream Job</h2>
          <p>Browse thousands of opportunities</p>
        </div>

        <div class="search">
          <form action="">
            <input
              type="text"
              id="keyword"
              placeholder="Search by job title, skill, or keyword…"
            />
            <input type="text" id="location" placeholder="City or region…" />
            <select name="job-type" id="job-type">
              <option value="">All Categoties</option>
              <option value="part-time">Part-time</option>
              <option value="internship">Internship</option>
              <option value="full-time">Full-time</option>
              <option value="volunteer">Volunteer</option>
            </select>
            <button id="search-btn">
              <i class="fas fa-search"></i> Search
            </button>
          </form>
        </div>
      </div>
    </section>

    <!-- JOB CARDS section -->
    <section class="job-cards-section">
      <div class="cards-container">
        <!-- card-1 -->
        <div class="card job-card-1">
          <div class="card-icons">
            <i class="fas fa-headset"></i>
            <i class="far fa-bookmark"></i>
          </div>
          <div class="card-content">
            <h2>Customer Support Agent</h2>
            <h3>HelpDesk Pro</h3>
            <div class="job-tags">
              <span>Busan</span>
              <span>Part-Time</span>
              <span>₩11k/hr</span>
            </div>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa
              deserunt hic doloremque, pariatur labore perferendis veritatis
              voluptates totam.
            </p>
          </div>
          <div class="card-buttons">
            <button class="details-btn">Details</button>
            <button class="apply-now-btn">Apply Now</button>
          </div>
        </div>

        <!-- card-2 -->
        <div class="card job-card-2">
          <div class="card-icons">
            <i class="fas fa-truck"></i>
            <i class="far fa-bookmark"></i>
          </div>
          <div class="card-content">
            <h2>Delivery Driver</h2>
            <h3>QuickDrop Logistics</h3>
            <div class="job-tags">
              <span>Busan</span>
              <span>Part-Time</span>
              <span>Entry-Level</span>
            </div>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa
              deserunt hic doloremque, pariatur labore perferendis veritatis
              voluptates totam.
            </p>
          </div>
          <div class="card-buttons">
            <button class="details-btn">Details</button>
            <button class="apply-now-btn">Apply Now</button>
          </div>
        </div>

        <!-- card-3 -->
        <div class="card job-card-3">
          <div class="card-icons">
            <i class="fas fa-store"></i>
            <i class="far fa-bookmark"></i>
          </div>
          <div class="card-content">
            <h2>Retail Sales Associate</h2>
            <h3>CityMart</h3>
            <div class="job-tags">
              <span>Busan</span>
              <span>Part-Time</span>
              <span>Entry-Level</span>
            </div>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa
              deserunt hic doloremque, pariatur labore perferendis veritatis
              voluptates totam.
            </p>
          </div>
          <div class="card-buttons">
            <button class="details-btn">Details</button>
            <button class="apply-now-btn">Apply Now</button>
          </div>
        </div>

        <!-- card-4 -->
        <div class="card job-card-4">
          <div class="card-icons">
            <i class="fas fa-book-open"></i>
            <i class="far fa-bookmark"></i>
          </div>
          <div class="card-content">
            <h2>Tutor (English)</h2>
            <h3>EduPlus Academy</h3>
            <div class="job-tags">
              <span>Busan</span>
              <span>Part-Time</span>
              <span>Entry-Level</span>
            </div>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa
              deserunt hic doloremque, pariatur labore perferendis veritatis
              voluptates totam.
            </p>
          </div>
          <div class="card-buttons">
            <button class="details-btn">Details</button>
            <button class="apply-now-btn">Apply Now</button>
          </div>
        </div>

        <!-- card-5 -->
        <div class="card job-card-5">
          <div class="card-icons">
            <i class="fas fa-hashtag"></i>
            <i class="far fa-bookmark"></i>
          </div>
          <div class="card-content">
            <h2>Social Media Assistant</h2>
            <h3>TrendBuzz</h3>
            <div class="job-tags">
              <span>Busan</span>
              <span>Part-Time</span>
              <span>Junior</span>
            </div>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa
              deserunt hic doloremque, pariatur labore perferendis veritatis
              voluptates totam.
            </p>
          </div>
          <div class="card-buttons">
            <button class="details-btn">Details</button>
            <button class="apply-now-btn">Apply Now</button>
          </div>
        </div>

        <!-- card-6 -->
        <div class="card job-card-6">
          <div class="card-icons">
            <i class="fas fa-utensils"></i>
            <i class="far fa-bookmark"></i>
          </div>
          <div class="card-content">
            <h2>Kitchen Assistant</h2>
            <h3>Moshi</h3>
            <div class="job-tags">
              <span>Busan</span>
              <span>Part-Time</span>
              <span>Entry-Level</span>
            </div>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa
              deserunt hic doloremque, pariatur labore perferendis veritatis
              voluptates totam.
            </p>
          </div>
          <div class="card-buttons">
            <button class="details-btn">Details</button>
            <button class="apply-now-btn">Apply Now</button>
          </div>
        </div>
      </div>
      <!-- Pagination -->
      <div class="pagination">
        <a href="#" class="prev">&laquo; Prev</a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#" class="next">Next &raquo;</a>
      </div>
    </section>

    <!-- FOOTER -->
  <?php include __DIR__ . '/../includes/footer.php'; ?>
    <script src="../js/script.js"></script>
  </body>
</html>
