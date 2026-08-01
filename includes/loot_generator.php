<?php

declare(strict_types=1);

require_once __DIR__ . '/npc_generator.php';
require_once __DIR__ . '/trade_goods.php';
require_once __DIR__ . '/tools.php';
require_once __DIR__ . '/weapons.php';
require_once __DIR__ . '/armor.php';
require_once __DIR__ . '/clothes.php';
require_once __DIR__ . '/shields.php';

function rg_get_loot_options(): array
{
    return [
        'sources' => ['pocket', 'lair'],
        'rarities' => ['common', 'uncommon', 'rare', 'legendary'],
        'categories' => ['trade_goods', 'weapons', 'tools', 'armor', 'clothes', 'shields'],
    ];
}

function rg_capitalize_words(string $value): string
{
    return ucwords(str_replace('_', ' ', $value));
}

function rg_get_combined_item_pool(): array
{
    $pool = [];
    
    // Add trade goods
    $tradeGoods = rg_get_trade_goods()['trade_goods'] ?? [];
    foreach ($tradeGoods as $item) {
        $item['category'] = 'Trade Goods';
        $item['type'] = 'Trade Good';
        $item['value'] = $item['value'] ?? 'Unknown value';
        $item['condition'] = 'Average';
        $item['detail'] = ($item['supply'] ?? 'Unknown supply') . ' - ' . ($item['weight'] ?? 'Normal weight');
        $pool[] = $item;
    }
    
    // Add weapons
    $weapons = rg_get_weapons();
    foreach ($weapons as $item) {
        $item['category'] = 'Weapons';
        $item['type'] = $item['type'] ?? 'Weapon';
        $item['value'] = $item['price'] ?? 'Unknown value';
        $item['detail'] = ($item['material'] ?? 'Unknown material') . ' - Damage: ' . ($item['damage'] ?? '1d6');
        $pool[] = $item;
    }
    
    // Add tools
    $tools = rg_get_tools();
    foreach ($tools as $item) {
        $item['category'] = 'Tools';
        $item['type'] = 'Tool';
        $item['value'] = $item['price'] ?? 'Unknown value';
        $item['detail'] = ($item['supply'] ?? 'Unknown') . ' supply - ' . ($item['weight'] ?? 'Normal');
        $pool[] = $item;
    }
    
    // Add armor
    $armor = rg_get_armor();
    foreach ($armor as $item) {
        $item['category'] = 'Armor';
        $item['type'] = $item['type'] ?? 'Armor';
        $item['value'] = $item['price'] ?? 'Unknown value';
        $item['detail'] = 'Protection: ' . ($item['protection'] ?? '+0') . ' - ' . ($item['material'] ?? 'Unknown');
        $pool[] = $item;
    }
    
    // Add clothes
    $clothes = rg_get_clothes();
    foreach ($clothes as $item) {
        $item['category'] = 'Clothes';
        $item['type'] = $item['type'] ?? 'Clothing';v
        $item['value'] = $item['price'] ?? 'Unknown value';
        $item['detail'] = ($item['material'] ?? 'Unknown') . ' - ' . ($item['condition'] ?? 'Average condition');
        $pool[] = $item;
    }
    
    // Add shields
    $shields = rg_get_shields();
    foreach ($shields as $item) {
        $item['category'] = 'Shields';
        $item['type'] = $item['type'] ?? 'Shield';
        $item['value'] = $item['price'] ?? 'Unknown value';
        $item['detail'] = 'Protection: ' . ($item['protection'] ?? '+1') . ' - ' . ($item['material'] ?? 'Wood and Metal');
        $pool[] = $item;
    }
    
    return $pool;
}

function rg_choose_item_pool(string $rarity, string $category = ''): array
{
    // Get the combined pool from all six categories
    $fullPool = rg_get_combined_item_pool();
    
    // Filter by rarity if specified
    if ($rarity !== 'all') {
        $fullPool = array_filter($fullPool, function($item) use ($rarity) {
            $itemRarity = $item['rarity'] ?? 'common';
            return $itemRarity === $rarity;
        });
    }
    
    // Filter by category if specified
    if (!empty($category) && strtolower($category) !== 'any') {
        $fullPool = array_filter($fullPool, function($item) use ($category) {
            $itemCategory = strtolower($item['category'] ?? '');
            $filterCategory = strtolower(str_replace('_', ' ', $category));
            return $itemCategory === $filterCategory;
        });
    }
    
    // If no items match, return full pool as fallback
    return !empty($fullPool) ? $fullPool : rg_get_combined_item_pool();
}

function rg_generate_loot(array $options = []): array
{
    $lootOptions = rg_get_loot_options();

    $selectedSource = isset($options['source']) && is_string($options['source'])
        ? rg_filter_value(trim($options['source']), $lootOptions['sources'])
        : null;
    $selectedRarity = isset($options['rarity']) && is_string($options['rarity'])
        ? rg_filter_value(trim($options['rarity']), $lootOptions['rarities'])
        : null;
    $selectedCategory = isset($options['category']) && is_string($options['category'])
        ? trim($options['category'])
        : '';

    $source = $selectedSource ?? rg_pick($lootOptions['sources']);
    $rarity = $selectedRarity ?? rg_pick($lootOptions['rarities']);

    $itemPool = rg_choose_item_pool($rarity, $selectedCategory);

    $countMin = $source === 'lair' ? 2 : 1;
    $countMax = $source === 'lair' ? 5 : 3;
    $itemCount = random_int($countMin, $countMax);

    $items = [];
    $usedIndexes = [];

    while (count($items) < $itemCount) {
        $index = array_rand($itemPool);
        if (isset($usedIndexes[$index])) {
            continue;
        }

        $usedIndexes[$index] = true;
        $item = $itemPool[$index];
        $item['condition'] = rg_pick(['Intact', 'Worn', 'Stained', 'Well-preserved', 'Partially broken']);
        $items[] = $item;
    }

    return [
        'source' => rg_capitalize_words($source),
        'rarity' => rg_capitalize_words($rarity),
        'coins' => random_int($source === 'lair' ? 20 : 4, $source === 'lair' ? 180 : 55) . ' silver coins',
        'items' => $items,
        'hook' => $source === 'lair'
            ? rg_pick([
                'One of the items bears the emblem of a forgotten cult.',
                'There are fresh signs of smuggling activity in this lair.',
                'One item points to a buyer in the capital.',
            ])
            : rg_pick([
                'The most valuable item appears to be stolen from a local temple.',
                'An engraved symbol links this loot to an urban gang.',
                'The original owner may still be alive and looking for it.',
            ]),
    ];
}
