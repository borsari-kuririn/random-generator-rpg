<?php

declare(strict_types=1);

function rg_get_buildings(): array
{
    return [
        ['name' => 'Cottage', 'price' => '10 gold', 'raw_materials' => '200 Wood', 'time' => 'One Week', 'talent' => 'Builder', 'tools' => 'Saw and hammer', 'category' => 'residential', 'effect' => ''],
        ['name' => 'Tower', 'price' => '20 gold', 'raw_materials' => '400 Stone or 200 Wood', 'time' => 'Two Weeks', 'talent' => 'Builder', 'tools' => 'Sledgehammer and pickaxe or saw and hammer', 'category' => 'military', 'effect' => ''],
        ['name' => 'Stone House', 'price' => '30 gold', 'raw_materials' => '600 Stone', 'time' => 'One Month', 'talent' => 'Builder', 'tools' => 'Sledgehammer and pickaxe', 'category' => 'residential', 'effect' => ''],
        ['name' => 'Farm', 'price' => '50 gold', 'raw_materials' => '400 Wood', 'time' => 'One Month', 'talent' => 'Builder', 'tools' => 'Saw and hammer', 'category' => 'agricultural', 'effect' => ''],
        ['name' => 'Fort', 'price' => '250 gold', 'raw_materials' => '1,000 Wood and 200 Stone', 'time' => 'Two Months', 'talent' => 'Builder', 'tools' => 'Sledgehammer, pickaxe, saw, hammer', 'category' => 'military', 'effect' => ''],
        ['name' => 'Fortress', 'price' => '1000 gold', 'raw_materials' => '1,000 Wood and 5,000 Stone', 'time' => 'One Year', 'talent' => 'Builder', 'tools' => 'Sledgehammer, pickaxe, saw, hammer', 'category' => 'military', 'effect' => ''],
        ['name' => 'Castle', 'price' => '3000 gold', 'raw_materials' => '1,000 Wood and 20,000 Stone', 'time' => 'Five Years', 'talent' => 'Builder', 'tools' => 'Sledgehammer, pickaxe, saw, hammer', 'category' => 'military', 'effect' => ''],
        ['name' => 'Palace', 'price' => '10000 gold', 'raw_materials' => '2,000 Wood and 50,000 Stone', 'time' => 'Ten Years', 'talent' => 'Builder', 'tools' => 'Sledgehammer, pickaxe, saw, hammer', 'category' => 'residential', 'effect' => ''],
    ];
}

function rg_get_buildings_by_category(string $category): array
{
    return array_filter(rg_get_buildings(), function($item) use ($category) {
        return $item['category'] === $category;
    });
}

function rg_get_buildings_by_price_range(string $minPrice, string $maxPrice): array
{
    $priceToValue = function($price) {
        $price = strtolower(trim($price));
        if (strpos($price, 'gold') !== false) {
            return (int)preg_replace('/[^0-9]/', '', $price) * 10000;
        }
        return (int)preg_replace('/[^0-9]/', '', $price) * 100;
    };
    
    $min = $priceToValue($minPrice);
    $max = $priceToValue($maxPrice);
    
    return array_filter(rg_get_buildings(), function($item) use ($min, $max, $priceToValue) {
        $itemPrice = $priceToValue($item['price']);
        return $itemPrice >= $min && $itemPrice <= $max;
    });
}

function rg_get_all_building_categories(): array
{
    $categories = [];
    foreach (rg_get_buildings() as $building) {
        $categories[$building['category']] = true;
    }
    return array_keys($categories);
}
