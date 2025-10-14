<?php
require_once __DIR__ . '/../includes/functions.php';

if (session_status() === PHP_SESSION_NONE) session_start();

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf'] ?? '')) {
        $errors[] = 'Invalid CSRF token.';
    } else {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $user = verify_user_credentials($email, $password);
        if ($user) {
            login_user($user);
            set_flash('success', 'Login successful');
            header('Location: index.php');
            exit;
        } else {
            $errors[] = 'Invalid email or password.';
        }
    }
}

?><!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(dirname($_SERVER['SCRIPT_NAME']) . '/../css/style.css'); ?>">
  <title>Login - JobPortal</title>
</head>
<body>
<?php include __DIR__ . '/../includes/header.php'; ?>
<main class="obj-width">
  <div class="auth-card">
    <h1 class="auth-title">Welcome back</h1>

    <?php if ($msg = get_flash('success')): ?>
      <div class="form-success"><?php echo htmlspecialchars($msg); ?></div>
    <?php endif; ?>
    <?php if ($errors): ?>
      <div class="form-errors"><ul><?php foreach ($errors as $e) echo '<li>' . htmlspecialchars($e) . '</li>'; ?></ul></div>
    <?php endif; ?>

    <form method="post" action="" class="auth-form">
      <input type="hidden" name="csrf" value="<?php echo htmlspecialchars(csrf_token()); ?>">
      <label>Email
        <input type="email" name="email" required>
      </label>
      <label>Password
        <input type="password" name="password" required>
      </label>

      <button type="submit" class="primary">Login</button>
    </form>

    <p class="muted">Don't have an account? <a href="register.php">Create one</a></p>
  </div>
</main>
<?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
