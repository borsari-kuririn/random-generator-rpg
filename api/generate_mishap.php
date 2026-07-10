<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/mishap_generator.php';

header('Content-Type: application/json; charset=utf-8');

$table = isset($_GET['table']) && is_string($_GET['table']) ? trim($_GET['table']) : 'magic';
$dice1Raw = isset($_GET['dice1']) ? trim((string)$_GET['dice1']) : '';
$dice2Raw = isset($_GET['dice2']) ? trim((string)$_GET['dice2']) : '';

$options = [
    'table' => $table,
];

if ($dice1Raw !== '' || $dice2Raw !== '') {
    $dice1 = (int)$dice1Raw;
    $dice2 = (int)$dice2Raw;

    if ($dice1 < 1 || $dice1 > 6 || $dice2 < 1 || $dice2 > 6) {
        http_response_code(400);
        echo json_encode([
            'ok' => false,
            'error' => 'dice1 and dice2 must both be between 1 and 6.',
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        exit;
    }

    $options['dice1'] = $dice1;
    $options['dice2'] = $dice2;
}

try {
    $mishap = rg_generate_mishap($options);
} catch (Throwable $exception) {
    http_response_code(500);
    echo json_encode([
        'ok' => false,
        'error' => $exception->getMessage(),
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

echo json_encode([
    'ok' => true,
    'mishap' => $mishap,
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
