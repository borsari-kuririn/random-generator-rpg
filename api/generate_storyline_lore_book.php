<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/storyline_lore_book_generator.php';

header('Content-Type: application/json; charset=utf-8');

$focus = isset($_GET['focus']) && is_string($_GET['focus']) ? trim($_GET['focus']) : '';
$collection = isset($_GET['collection']) && is_string($_GET['collection']) ? trim($_GET['collection']) : '';

$book = rg_generate_storyline_lore_book([
    'focus' => $focus,
    'collection' => $collection,
]);

echo json_encode([
    'ok' => true,
    'book' => $book,
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
