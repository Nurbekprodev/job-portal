<?php
// demo utility to switch role for guests (not for production)
require_once __DIR__ . '/includes/functions.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf'] ?? '')) {
        set_flash('error', 'Invalid CSRF token');
    } else {
        $r = $_POST['role'] ?? '';
        if (in_array($r, ['employee','employer'])) {
            $_SESSION['role'] = $r;
            set_flash('success', 'Role updated to ' . $r);
        }
    }
}
$back = $_SERVER['HTTP_REFERER'] ?? 'index.php';
header('Location: ' . $back);
exit;
