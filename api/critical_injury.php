<?php

declare(strict_types=1);

header('Content-Type: application/json');

require_once(__DIR__ . '/../includes/critical_injuries.php');

$category = $_GET['category'] ?? '';
$dice1 = (int)($_GET['dice1'] ?? 0);
$dice2 = (int)($_GET['dice2'] ?? 0);

if (empty($category) || $dice1 < 1 || $dice1 > 6 || $dice2 < 1 || $dice2 > 6) {
    http_response_code(400);
    echo json_encode([
        'ok' => false,
        'error' => 'Invalid parameters. Required: category, dice1 (1-6), dice2 (1-6)'
    ]);
    exit;
}

$diceValue = ($dice1 * 10) + $dice2;

$injury = rg_find_critical_injury($category, $diceValue);

if ($injury === null) {
    http_response_code(404);
    echo json_encode([
        'ok' => false,
        'error' => 'No injury found for ' . $category . ' with D66=' . $diceValue
    ]);
    exit;
}

echo json_encode([
    'ok' => true,
    'category' => $category,
    'dice_roll' => $diceValue,
    'injury' => $injury
]);
