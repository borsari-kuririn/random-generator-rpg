<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/company_generator.php';

header('Content-Type: application/json; charset=utf-8');

$size = isset($_GET['size']) && is_string($_GET['size']) ? trim($_GET['size']) : '';
$kind = isset($_GET['kind']) && is_string($_GET['kind']) ? trim($_GET['kind']) : '';
$focus = isset($_GET['focus']) && is_string($_GET['focus']) ? trim($_GET['focus']) : '';

$company = rg_generate_company([
    'size' => $size,
    'kind' => $kind,
    'focus' => $focus,
]);

echo json_encode([
    'ok' => true,
    'company' => $company,
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
