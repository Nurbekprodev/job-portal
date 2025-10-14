<!-- HEADER section -->
<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/functions.php';

// Compute base URL for the project so links work from pages in root and in subfolders like /PHP
$script = $_SERVER['SCRIPT_NAME'] ?? '';
$root = dirname($script);
$baseName = basename($root);
if (in_array($baseName, ['PHP', 'includes'])) {
  $root = dirname($root);
}
$rootUrl = rtrim($root, '/'); // e.g. /PROJECT/job-portal
?>
<header>
  <div class="container obj-width">
  <!-- Logo -->
  <a href="<?php echo htmlspecialchars($rootUrl . '/index.php'); ?>" id="text-logo">JobPortal</a>

    <nav id="navbar">
      <ul id="nav-links">
        <li class="nav-item"><a href="<?php echo htmlspecialchars($rootUrl . '/index.php'); ?>">Home</a></li>

        <?php if (isEmployee()): ?>
          <li class="nav-item">
            <a href="#">Candidates ▾</a>
            <ul class="dropdown">
              <li><a href="<?php echo htmlspecialchars($rootUrl . '/candidate_resume.php'); ?>">Resume</a></li>
              <li><a href="<?php echo htmlspecialchars($rootUrl . '/job_listing.php'); ?>">Job List</a></li>
              <li><a href="<?php echo htmlspecialchars($rootUrl . '/candidate_profile.php'); ?>">Profile</a></li>
            </ul>
          </li>
        <?php elseif (isEmployer()): ?>
          <li class="nav-item">
            <a href="#">Employers ▾</a>
            <ul class="dropdown">
              <li><a href="<?php echo htmlspecialchars($rootUrl . '/employer_dashboard.php'); ?>">Dashboard</a></li>
              <li><a href="<?php echo htmlspecialchars($rootUrl . '/employer_post_job.php'); ?>">Post Job</a></li>
              <li><a href="<?php echo htmlspecialchars($rootUrl . '/employer_candidates.php'); ?>">Candidates</a></li>
              <li><a href="<?php echo htmlspecialchars($rootUrl . '/job_details.php'); ?>">Job Details</a></li>
            </ul>
          </li>
        <?php else: /* guest: show both categories with dropdowns */ ?>
          <li class="nav-item">
            <a href="#">Candidates ▾</a>
            <ul class="dropdown">
              <li><a href="<?php echo htmlspecialchars($rootUrl . '/candidate_resume.php'); ?>">Resume</a></li>
              <li><a href="<?php echo htmlspecialchars($rootUrl . '/job_listing.php'); ?>">Job List</a></li>
              <li><a href="<?php echo htmlspecialchars($rootUrl . '/candidate_profile.php'); ?>">Profile</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#">Employers ▾</a>
            <ul class="dropdown">
              <li><a href="<?php echo htmlspecialchars($rootUrl . '/employer_dashboard.php'); ?>">Dashboard</a></li>
              <li><a href="<?php echo htmlspecialchars($rootUrl . '/employer_post_job.php'); ?>">Post Job</a></li>
              <li><a href="<?php echo htmlspecialchars($rootUrl . '/employer_candidates.php'); ?>">Candidates</a></li>
              <li><a href="<?php echo htmlspecialchars($rootUrl . '/job_details.php'); ?>">Job Details</a></li>
            </ul>
          </li>
        <?php endif; ?>

        <li class="nav-item"><a href="<?php echo htmlspecialchars($rootUrl . '/PHP/contact.php') ; ?>">Contact</a></li>
      </ul>
      </ul>

      <!-- Hamburger -->
      <div id="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </nav>

    <!-- Login/Register & user -->
    <div id="login-register">
      <?php if (current_user()): ?>
        <span class="user-badge">Hello, <?php echo htmlspecialchars(current_user()['name'] ?? 'User'); ?> (<?php echo htmlspecialchars(current_user_role() ?? 'guest'); ?>)</span>
        <a href="<?php echo htmlspecialchars($rootUrl . '/PHP/logout.php'); ?>">Logout</a>
      <?php else: ?>
        <a href="<?php echo htmlspecialchars($rootUrl . '/PHP/login.php'); ?>">Login/Register</a>
      <?php endif; ?>
    </div>
  </div>
</header>
