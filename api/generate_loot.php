<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/loot_generator.php';

header('Content-Type: application/json; charset=utf-8');

$source = isset($_GET['source']) && is_string($_GET['source']) ? trim($_GET['source']) : '';
$rarity = isset($_GET['rarity']) && is_string($_GET['rarity']) ? trim($_GET['rarity']) : '';
$category = isset($_GET['category']) && is_string($_GET['category']) ? trim($_GET['category']) : '';

$loot = rg_generate_loot([
    'source' => $source,
    'rarity' => $rarity,
    'category' => $category,
]);

echo json_encode([
    'ok' => true,
    'loot' => $loot,
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
