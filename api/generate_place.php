<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/place_generator.php';

header('Content-Type: application/json; charset=utf-8');

$type = isset($_GET['type']) && is_string($_GET['type']) ? trim($_GET['type']) : '';
$occupants = isset($_GET['occupants']) && is_string($_GET['occupants']) ? trim($_GET['occupants']) : '';

$place = rg_generate_place([
    'type' => $type,
    'occupants' => $occupants,
]);

echo json_encode([
    'ok' => true,
    'place' => $place,
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
