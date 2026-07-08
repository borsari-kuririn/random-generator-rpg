<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/scarcity_generator.php';

header('Content-Type: application/json; charset=utf-8');

$event = isset($_GET['event']) && is_string($_GET['event']) ? trim($_GET['event']) : '';
$category = isset($_GET['category']) && is_string($_GET['category']) ? trim($_GET['category']) : '';
$scarcityLevel = isset($_GET['scarcity_level']) && is_string($_GET['scarcity_level']) ? trim($_GET['scarcity_level']) : '';

$scarcity = rg_generate_scarcity([
    'event' => $event,
    'category' => $category,
    'scarcity_level' => $scarcityLevel,
]);

echo json_encode([
    'ok' => true,
    'scarcity' => $scarcity,
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
