<?php

declare(strict_types=1);

require_once __DIR__ . '/trade_goods.php';
require_once __DIR__ . '/weapons.php';
require_once __DIR__ . '/armor.php';

function rg_scarcity_label(string $value): string
{
    return ucwords(str_replace('_', ' ', $value));
}

function rg_get_scarcity_events(): array
{
    return [
        'severe_winter' => [
            'label' => 'Severe Winter',
            'description' => 'Food, fuel, and winter gear become scarce while luxury demand weakens.',
            'hot_tags' => ['ration', 'food', 'fish', 'meat', 'vegetable', 'fur', 'blanket', 'tallow', 'lamp oil', 'wood'],
            'boost_min' => 20,
            'boost_max' => 50,
            'rest_min' => -25,
            'rest_max' => 10,
        ],
        'blight_harvest_failure' => [
            'label' => 'Crop Blight and Harvest Failure',
            'description' => 'Food stores collapse and preserving materials become expensive.',
            'hot_tags' => ['food', 'ration', 'grain', 'meat', 'fish', 'vegetable', 'cauldron', 'salt', 'barrel'],
            'boost_min' => 18,
            'boost_max' => 45,
            'rest_min' => -20,
            'rest_max' => 8,
        ],
        'iron_mine_raided' => [
            'label' => 'Bandits Raiding the Iron Mine',
            'description' => 'Iron, steel, weapons, and armor surge in price, while unrelated goods become cheaper.',
            'hot_tags' => ['iron', 'steel', 'metal', 'chain', 'plate', 'sword', 'axe', 'spear', 'armor', 'shield', 'forge'],
            'boost_min' => 20,
            'boost_max' => 50,
            'rest_min' => -40,
            'rest_max' => -5,
        ],
        'bridge_collapse' => [
            'label' => 'Great Bridge Collapse',
            'description' => 'Transport costs explode, making heavy goods and bulk supplies pricier.',
            'hot_tags' => ['heavy', 'barrel', 'tent', 'cauldron', 'armor', 'wood', 'iron', 'wagon'],
            'boost_min' => 10,
            'boost_max' => 35,
            'rest_min' => -18,
            'rest_max' => 10,
        ],
        'river_trade_open' => [
            'label' => 'River Trade Route Reopened',
            'description' => 'General supply improves and most goods become cheaper.',
            'hot_tags' => ['boat', 'rope', 'barrel', 'fish'],
            'boost_min' => -10,
            'boost_max' => 5,
            'rest_min' => -35,
            'rest_max' => -5,
        ],
        'merchant_fleet_arrives' => [
            'label' => 'Merchant Fleet Arrival',
            'description' => 'Imported wares flood markets, reducing prices on crafted and luxury goods.',
            'hot_tags' => ['fine', 'silk', 'spyglass', 'map', 'crystal', 'silver', 'garment'],
            'boost_min' => -15,
            'boost_max' => 8,
            'rest_min' => -30,
            'rest_max' => -2,
        ],
        'noble_war_mobilization' => [
            'label' => 'Noble War Mobilization',
            'description' => 'War demand drives up military equipment while civilian goods fluctuate.',
            'hot_tags' => ['weapon', 'sword', 'axe', 'spear', 'armor', 'shield', 'helmet', 'crossbow', 'bow'],
            'boost_min' => 15,
            'boost_max' => 45,
            'rest_min' => -20,
            'rest_max' => 15,
        ],
        'guild_strike' => [
            'label' => 'Blacksmith Guild Strike',
            'description' => 'Finished metal goods become scarce as forges sit cold.',
            'hot_tags' => ['iron', 'steel', 'forge', 'weapon', 'armor', 'helmet', 'shield', 'chain'],
            'boost_min' => 20,
            'boost_max' => 48,
            'rest_min' => -25,
            'rest_max' => 12,
        ],
        'temple_festival' => [
            'label' => 'Grand Temple Festival',
            'description' => 'Ceremonial garments, symbols, and crafted accessories are heavily demanded.',
            'hot_tags' => ['holy', 'symbol', 'garment', 'clothes', 'silver', 'flute', 'lyre', 'harp'],
            'boost_min' => 12,
            'boost_max' => 38,
            'rest_min' => -18,
            'rest_max' => 10,
        ],
        'refugee_wave' => [
            'label' => 'Refugee Wave',
            'description' => 'Basic survival gear surges while specialty goods soften.',
            'hot_tags' => ['blanket', 'tent', 'ration', 'waterskin', 'rope', 'sack', 'clothes', 'boots'],
            'boost_min' => 10,
            'boost_max' => 40,
            'rest_min' => -22,
            'rest_max' => 8,
        ],
        'forest_fire_season' => [
            'label' => 'Forest Fire Season',
            'description' => 'Wood and leather supplies tighten, while some metal goods stabilize.',
            'hot_tags' => ['wood', 'leather', 'bow', 'club', 'staff', 'quiver', 'shield'],
            'boost_min' => 8,
            'boost_max' => 36,
            'rest_min' => -20,
            'rest_max' => 10,
        ],
    ];
}

function rg_get_scarcity_levels(): array
{
    return [
        'low' => ['label' => 'Low', 'multiplier' => 0.6],
        'high' => ['label' => 'High', 'multiplier' => 1.0],
        'very_high' => ['label' => 'Very High', 'multiplier' => 1.4],
    ];
}

function rg_normalize_scarcity_level(string $level): string
{
    $normalized = strtolower(trim($level));
    $legacyMap = [
        'baixa' => 'low',
        'alta' => 'high',
        'altissima' => 'very_high',
    ];

    return $legacyMap[$normalized] ?? $normalized;
}

function rg_scarcity_level_label(string $level): string
{
    $levels = rg_get_scarcity_levels();
    return $levels[$level]['label'] ?? $levels['high']['label'];
}

function rg_scale_percent_by_scarcity_level(int $percent, string $level): int
{
    $levels = rg_get_scarcity_levels();
    $multiplier = (float)($levels[$level]['multiplier'] ?? $levels['high']['multiplier']);
    $scaled = (int)round($percent * $multiplier);

    if ($scaled === 0 && $percent !== 0) {
        $scaled = $percent > 0 ? 1 : -1;
    }

    return max(-50, min(50, $scaled));
}

function rg_get_scarcity_options(): array
{
    return [
        'events' => rg_get_scarcity_events(),
        'levels' => rg_get_scarcity_levels(),
        'categories' => ['Any', 'Trade Goods', 'Melee Weapons', 'Ranged Weapons', 'Armor', 'Weapons', 'Armor Table', 'Clothes'],
    ];
}

function rg_price_to_copper(string $price): int
{
    $value = strtolower(trim($price));
    if ($value === '') {
        return 0;
    }

    preg_match_all('/(\d+)\s*(gold|silver|copper)/i', $value, $matches, PREG_SET_ORDER);
    if (empty($matches)) {
        return 0;
    }

    $totalCopper = 0;
    foreach ($matches as $match) {
        $amount = (int)$match[1];
        $unit = strtolower($match[2]);

        if ($unit === 'gold') {
            $totalCopper += $amount * 100;
        } elseif ($unit === 'silver') {
            $totalCopper += $amount * 10;
        } elseif ($unit === 'copper') {
            $totalCopper += $amount;
        }
    }

    return $totalCopper;
}

function rg_copper_to_price(int $copper): string
{
    $copper = max(0, $copper);
    $gold = intdiv($copper, 100);
    $remainder = $copper % 100;
    $silver = intdiv($remainder, 10);
    $copperLeft = $remainder % 10;

    $parts = [];
    if ($gold > 0) {
        $parts[] = $gold . ' gold';
    }
    if ($silver > 0) {
        $parts[] = $silver . ' silver';
    }
    if ($copperLeft > 0 || empty($parts)) {
        $parts[] = $copperLeft . ' copper';
    }

    return implode(' ', $parts);
}

function rg_collect_scarcity_items(): array
{
    $items = [];

    $tradeTables = rg_get_trade_goods();
    foreach ($tradeTables as $table => $entryList) {
        foreach ($entryList as $entry) {
            $items[] = [
                'name' => $entry['name'] ?? 'Unknown',
                'category' => rg_scarcity_label($table),
                'price' => $entry['price'] ?? '0 copper',
                'material' => ($entry['raw_materials'] ?? '') . ' ' . ($entry['effect'] ?? ''),
            ];
        }
    }

    foreach (rg_get_weapons() as $entry) {
        $items[] = [
            'name' => $entry['name'] ?? 'Unknown',
            'category' => 'Weapons',
            'price' => $entry['price'] ?? '0 copper',
            'material' => ($entry['material'] ?? '') . ' ' . ($entry['type'] ?? ''),
        ];
    }

    foreach (rg_get_armor() as $entry) {
        $items[] = [
            'name' => $entry['name'] ?? 'Unknown',
            'category' => 'Armor Table',
            'price' => $entry['price'] ?? '0 copper',
            'material' => ($entry['material'] ?? '') . ' ' . ($entry['type'] ?? ''),
        ];
    }

    return $items;
}

function rg_scarcity_match_event(array $item, array $event): bool
{
    $haystack = strtolower(
        ($item['name'] ?? '') . ' ' .
        ($item['category'] ?? '') . ' ' .
        ($item['material'] ?? '')
    );

    foreach ($event['hot_tags'] as $tag) {
        if (strpos($haystack, strtolower($tag)) !== false) {
            return true;
        }
    }

    return false;
}

function rg_scarcity_pick_event(?string $requestedEvent): array
{
    $events = rg_get_scarcity_events();
    if ($requestedEvent !== null && isset($events[$requestedEvent])) {
        return [$requestedEvent, $events[$requestedEvent]];
    }

    $eventKey = array_rand($events);
    return [$eventKey, $events[$eventKey]];
}

function rg_generate_scarcity(array $options = []): array
{
    $requestedEvent = isset($options['event']) && is_string($options['event'])
        ? trim($options['event'])
        : null;

    $categoryFilter = isset($options['category']) && is_string($options['category'])
        ? trim($options['category'])
        : '';

    $requestedLevel = isset($options['scarcity_level']) && is_string($options['scarcity_level'])
        ? rg_normalize_scarcity_level((string)$options['scarcity_level'])
        : 'high';

    $levels = rg_get_scarcity_levels();
    $scarcityLevel = array_key_exists($requestedLevel, $levels) ? $requestedLevel : 'high';

    [$eventKey, $event] = rg_scarcity_pick_event($requestedEvent);
    $items = rg_collect_scarcity_items();

    if ($categoryFilter !== '' && strtolower($categoryFilter) !== 'any') {
        $items = array_values(array_filter($items, function (array $item) use ($categoryFilter): bool {
            return strcasecmp($item['category'] ?? '', $categoryFilter) === 0;
        }));
    }

    $adjustedItems = [];
    foreach ($items as $item) {
        $baseCopper = rg_price_to_copper((string)($item['price'] ?? '0 copper'));
        if ($baseCopper <= 0) {
            continue;
        }

        $isAffected = rg_scarcity_match_event($item, $event);
        $basePercent = $isAffected
            ? random_int((int)$event['boost_min'], (int)$event['boost_max'])
            : random_int((int)$event['rest_min'], (int)$event['rest_max']);
        $percent = rg_scale_percent_by_scarcity_level($basePercent, $scarcityLevel);

        $adjustedCopper = (int)max(1, round($baseCopper * (1 + ($percent / 100))));

        $adjustedItems[] = [
            'name' => $item['name'],
            'category' => $item['category'],
            'base_price' => rg_copper_to_price($baseCopper),
            'adjusted_price' => rg_copper_to_price($adjustedCopper),
            'change_percent' => $percent,
            'trend' => $percent >= 0 ? 'up' : 'down',
            'reason' => $isAffected ? 'Directly affected by this event' : 'Indirect market reaction',
        ];
    }

    usort($adjustedItems, function (array $a, array $b): int {
        return abs($b['change_percent']) <=> abs($a['change_percent']);
    });

    $avg = 0.0;
    if (!empty($adjustedItems)) {
        $avg = array_sum(array_column($adjustedItems, 'change_percent')) / count($adjustedItems);
    }

    return [
        'event_key' => $eventKey,
        'event_name' => $event['label'],
        'event_description' => $event['description'],
        'scarcity_level' => rg_scarcity_level_label($scarcityLevel),
        'scarcity_level_key' => $scarcityLevel,
        'category_filter' => $categoryFilter === '' ? 'Any' : $categoryFilter,
        'average_change' => round($avg, 1),
        'items' => $adjustedItems,
    ];
}
