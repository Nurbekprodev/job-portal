<?php
function isValidName($name){
    $name = trim($name);
    if ($name === '') {
        return "Name is required.";
    }
    // allow letters (unicode), spaces, hyphen and apostrophe
    if (!preg_match("/^[\\p{L}'\\- ]+$/u", $name)) {
        return "Name can contain only letters, spaces, hyphens or apostrophes.";
    }
    $len = mb_strlen($name);
    if ($len < 2 || $len > 50) {
        return "Name must be between 2 and 50 characters.";
    }
    return "";
}

function isValidSubject($subject){
    $subject = trim($subject);
    if ($subject === '') {
        return "Subject is required.";
    }
    // allow a broader set: letters, numbers, punctuation (but limit length)
    if (mb_strlen($subject) < 2 || mb_strlen($subject) > 100) {
        return "Subject must be between 2 and 100 characters.";
    }
    return "";
}

function isValidEmail($email){
    $email = trim($email);
    if ($email === '') {
        return "Email is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format.";
    }
    return "";
}

function isValidPhone($phone){
    $phone = trim($phone);
    if ($phone === '') {
        return "Phone is required.";
    }
    $digits = preg_replace('/\D+/', '', $phone);
    if ($digits === '') {
        return "Phone must contain only numbers.";
    }
    if (strlen($digits) < 7 || strlen($digits) > 15) {
        return "Phone must contain 7–15 digits.";
    }
    return "";
}

function isValidMessage($message) {
    $message = trim($message);
    if ($message === '') {
        return "Message is required.";
    }
    if (mb_strlen($message) < 5) {
        return "Message is too short.";
    }
    return "";
}

// -------------------------
// Authentication & helpers
// File-based demo user store (replace with DB in production)
// -------------------------

function dataFilePath() {
    // store user data outside web root if possible; here we use project/data
    return __DIR__ . '/../data/users.json';
}

function load_users() {
    $path = dataFilePath();
    if (!file_exists($path)) return [];
    $json = file_get_contents($path);
    $arr = json_decode($json, true);
    return is_array($arr) ? $arr : [];
}

function save_users(array $users) {
    $path = dataFilePath();
    $dir = dirname($path);
    if (!is_dir($dir)) mkdir($dir, 0755, true);
    $json = json_encode(array_values($users), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    // write atomically
    $tmp = $path . '.tmp';
    file_put_contents($tmp, $json, LOCK_EX);
    rename($tmp, $path);
}

function find_user_by_email($email) {
    $users = load_users();
    foreach ($users as $u) {
        if (isset($u['email']) && strtolower($u['email']) === strtolower($email)) return $u;
    }
    return null;
}

function register_user($name, $email, $password, $role = 'employee') {
    $name = trim($name);
    $email = trim($email);
    $role = $role === 'employer' ? 'employer' : 'employee';

    if (find_user_by_email($email)) {
        return ['error' => 'A user with that email already exists.'];
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $users = load_users();
    $users[] = [
        'id' => bin2hex(random_bytes(8)),
        'name' => $name,
        'email' => $email,
        'password' => $hash,
        'role' => $role,
        'created_at' => date('c')
    ];
    save_users($users);
    return ['success' => true];
}

function verify_user_credentials($email, $password) {
    $user = find_user_by_email($email);
    if (!$user) return null;
    if (!isset($user['password'])) return null;
    if (password_verify($password, $user['password'])) {
        // password_verify successful
        // optionally rehash if algorithm changed
        if (password_needs_rehash($user['password'], PASSWORD_DEFAULT)) {
            $users = load_users();
            foreach ($users as &$u) {
                if ($u['email'] === $user['email']) {
                    $u['password'] = password_hash($password, PASSWORD_DEFAULT);
                    break;
                }
            }
            save_users($users);
        }
        return $user;
    }
    return null;
}

// Session / auth helpers
function login_user(array $user) {
    if (session_status() === PHP_SESSION_NONE) session_start();
    // remove sensitive fields before storing
    $safe = $user;
    unset($safe['password']);
    $_SESSION['user'] = $safe;
    $_SESSION['role'] = $safe['role'] ?? null;
    session_regenerate_id(true);
}

function logout_user() {
    if (session_status() === PHP_SESSION_NONE) session_start();
    // clear session and destroy
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params['path'], $params['domain'], $params['secure'], $params['httponly']
        );
    }
    session_destroy();
}

function current_user() {
    if (session_status() === PHP_SESSION_NONE) session_start();
    return $_SESSION['user'] ?? null;
}

function current_user_role() {
    if (session_status() === PHP_SESSION_NONE) session_start();
    return $_SESSION['role'] ?? null;
}

function isEmployer(): bool { return current_user_role() === 'employer'; }
function isEmployee(): bool { return current_user_role() === 'employee'; }

function requireRole(string $role, string $redirect = '/PHP/login.php') {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== $role) {
        header('Location: ' . $redirect);
        exit;
    }
}

// Flash helpers
function set_flash($key, $value) {
    if (session_status() === PHP_SESSION_NONE) session_start();
    $_SESSION['flash'][$key] = $value;
}

function get_flash($key) {
    if (session_status() === PHP_SESSION_NONE) session_start();
    $val = $_SESSION['flash'][$key] ?? null;
    if (isset($_SESSION['flash'][$key])) unset($_SESSION['flash'][$key]);
    return $val;
}

// CSRF token helpers
function csrf_token() {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_token($token) {
    if (session_status() === PHP_SESSION_NONE) session_start();
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], (string)$token);
}

?>
?>