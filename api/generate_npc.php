<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/npc_generator.php';

header('Content-Type: application/json; charset=utf-8');

$min = isset($_GET['level_min']) ? (int)$_GET['level_min'] : 1;
$max = isset($_GET['level_max']) ? (int)$_GET['level_max'] : 12;
$race = isset($_GET['race']) && is_string($_GET['race']) ? trim($_GET['race']) : '';
$class = isset($_GET['class']) && is_string($_GET['class']) ? trim($_GET['class']) : '';
$culture = isset($_GET['culture']) && is_string($_GET['culture']) ? trim($_GET['culture']) : '';

if ($min < 1) {
    $min = 1;
}
if ($max < $min) {
    $max = $min;
}

$npc = rg_generate_npc([
    'min_level' => $min,
    'max_level' => $max,
    'race' => $race,
    'class' => $class,
    'culture' => $culture,
]);

echo json_encode([
    'ok' => true,
    'npc' => $npc,
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
