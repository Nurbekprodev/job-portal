<?php
require_once __DIR__ . '/../includes/functions.php';
if (session_status() === PHP_SESSION_NONE) session_start();
logout_user();
header('Location: ../index.php');
exit;
