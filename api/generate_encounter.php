<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/encounter_generator.php';

header('Content-Type: application/json; charset=utf-8');

$category = isset($_GET['category']) && is_string($_GET['category']) ? trim($_GET['category']) : '';

$encounter = rg_generate_encounter([
    'category' => $category,
]);

echo json_encode([
    'ok' => true,
    'encounter' => $encounter,
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
