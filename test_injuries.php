<?php
declare(strict_types=1);

require_once(__DIR__ . '/includes/critical_injuries.php');

// Test the lookup function
echo "Testing Critical Injuries Lookup:\n";
echo "=================================\n\n";

// Test stab wounds
$injury = rg_find_critical_injury('stab', 11);
echo "Stab D66=11:\n";
var_dump($injury);
echo "\n";

// Test slash wounds
$injury = rg_find_critical_injury('slash', 23);
echo "Slash D66=23:\n";
var_dump($injury);
echo "\n";

// Test blunt force
$injury = rg_find_critical_injury('blunt', 45);
echo "Blunt D66=45:\n";
var_dump($injury);
echo "\n";

// Test horror
$injury = rg_find_critical_injury('horror', 52);
echo "Horror D66=52:\n";
var_dump($injury);
echo "\n";

// Test all categories
echo "All categories:\n";
$categories = rg_get_all_critical_injury_categories();
var_dump($categories);
