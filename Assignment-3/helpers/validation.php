<?php

function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

function validate_id($id) {
    if (empty($id)) return false;
    $clean = filter_var($id, FILTER_VALIDATE_INT);
    if ($clean === false || $clean <= 0 || $clean > 1000000) {
        return false;
    }
    return $clean;
}

function validate_text($str, $max_len = 50) {
    $clean = trim($str);
    if (empty($clean) || strlen($clean) > $max_len) {
        return false;
    }
    return $clean;
}

function validate_password($password, $max_len = 100) {
    $clean = trim($password);
    if (empty($clean) || strlen($clean) > $max_len) {
        return false;
    }
    return $clean;
}

function validate_range_number($num, $min = 100, $max = 5000) {
    $clean = filter_var($num, FILTER_VALIDATE_INT);
    if ($clean === false || $clean < $min || $clean > $max) {
        return false;
    }
    return $clean;
}
?>
