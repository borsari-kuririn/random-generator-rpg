<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/romance_generator.php';

header('Content-Type: application/json; charset=utf-8');

$tone = isset($_GET['tone']) && is_string($_GET['tone']) ? trim($_GET['tone']) : '';
$drama = isset($_GET['drama']) && is_string($_GET['drama']) ? trim($_GET['drama']) : '';
$genderA = isset($_GET['gender_a']) && is_string($_GET['gender_a']) ? trim($_GET['gender_a']) : '';
$genderB = isset($_GET['gender_b']) && is_string($_GET['gender_b']) ? trim($_GET['gender_b']) : '';

$romance = rg_generate_romantic_pair([
    'tone' => $tone,
    'drama' => $drama,
    'gender_a' => $genderA,
    'gender_b' => $genderB,
]);

echo json_encode([
    'ok' => true,
    'romance' => $romance,
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
