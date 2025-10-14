<?php
require_once __DIR__ . '/../includes/functions.php';
if (session_status() === PHP_SESSION_NONE) session_start();

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf'] ?? '')) {
        $errors[] = 'Invalid CSRF token.';
    } else {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $role = in_array($_POST['role'] ?? '', ['employee','employer']) ? $_POST['role'] : 'employee';

        // basic validation
        if (isValidName($name)) $errors[] = isValidName($name);
        if (isValidEmail($email)) $errors[] = isValidEmail($email);
        if (strlen($password) < 6) $errors[] = 'Password must be at least 6 characters.';

        if (empty($errors)) {
            $res = register_user($name, $email, $password, $role);
            if (isset($res['error'])) {
                $errors[] = $res['error'];
            } else {
                set_flash('success', 'Registration successful. You can now log in.');
                header('Location: login.php');
                exit;
            }
        }
    }
}

?><!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(dirname($_SERVER['SCRIPT_NAME']) . '/../css/style.css'); ?>">
  <title>Register - JobPortal</title>
</head>
<body>
<?php include __DIR__ . '/../includes/header.php'; ?>
<main class="obj-width">
  <div class="auth-card">
    <h1 class="auth-title">Create an account</h1>
    <?php if ($errors): ?>
      <div class="form-errors"><ul><?php foreach ($errors as $e) echo '<li>' . htmlspecialchars($e) . '</li>'; ?></ul></div>
    <?php endif; ?>

    <form method="post" action="" class="auth-form">
      <input type="hidden" name="csrf" value="<?php echo htmlspecialchars(csrf_token()); ?>">
      <label>Name
        <input type="text" name="name" required>
      </label>
      <label>Email
        <input type="email" name="email" required>
      </label>
      <label>Password
        <input type="password" name="password" required>
      </label>
      <label>Role
        <select name="role">
          <option value="employee">Employee</option>
          <option value="employer">Employer</option>
        </select>
      </label>

      <button type="submit" class="primary">Register</button>
    </form>

    <p class="muted">Already have an account? <a href="login.php">Login</a></p>
  </div>
</main>
<?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
