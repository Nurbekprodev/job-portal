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
