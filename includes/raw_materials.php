<?php

declare(strict_types=1);

function rg_get_raw_materials(): array
{
    return [
        // Metals
        ['name' => 'Iron Ore', 'price' => '4 copper', 'shelf_life' => '-', 'raw_materials' => '-', 'talent' => '-', 'tools' => 'Mine', 'category' => 'metals', 'effect' => ''],
        ['name' => 'Iron', 'price' => '1 silver', 'shelf_life' => '-', 'raw_materials' => 'Iron Ore', 'talent' => 'Smith', 'tools' => 'Forge', 'category' => 'metals', 'effect' => 'It\'s possible to produce Iron without a Forge, but only 1 unit per Quarter Day. It requires a unit of Iron Ore and a Crafting roll.'],
        ['name' => 'Silver', 'price' => '1 gold', 'shelf_life' => '-', 'raw_materials' => '-', 'talent' => '-', 'tools' => '-', 'category' => 'metals', 'effect' => ''],
        ['name' => 'Gold', 'price' => '10 gold', 'shelf_life' => '-', 'raw_materials' => '-', 'talent' => '-', 'tools' => '-', 'category' => 'metals', 'effect' => ''],
        
        // Stone & Glass
        ['name' => 'Stone', 'price' => '2 copper', 'shelf_life' => '-', 'raw_materials' => '-', 'talent' => '-', 'tools' => 'Quarry', 'category' => 'stone', 'effect' => ''],
        ['name' => 'Glass', 'price' => '8 silver', 'shelf_life' => '-', 'raw_materials' => 'Stone', 'talent' => 'Smith', 'tools' => 'Forge', 'category' => 'stone', 'effect' => 'One unit of Glass can be produced per Quarter Day. It requires a difficult (-2) Crafting roll.'],
        
        // Wood
        ['name' => 'Wood', 'price' => '3 copper', 'shelf_life' => '-', 'raw_materials' => '-', 'talent' => '-', 'tools' => 'Axe', 'category' => 'wood', 'effect' => 'A Quarter Day\'s work in a Forest or Dark Forest, and a successful Crafting roll, gives a number of units of Wood equal to the number of rolled X doubled.'],
        
        // Leather & Textiles
        ['name' => 'Leather', 'price' => '12 copper', 'shelf_life' => '-', 'raw_materials' => 'Pelt', 'talent' => 'Tanner', 'tools' => 'Tannery', 'category' => 'textiles', 'effect' => ''],
        ['name' => 'Cloth, Wool', 'price' => '8 copper', 'shelf_life' => '-', 'raw_materials' => 'Wool', 'talent' => 'Tailor', 'tools' => 'Tailor Shop', 'category' => 'textiles', 'effect' => ''],
        ['name' => 'Cloth, Silk', 'price' => '1 gold', 'shelf_life' => '-', 'raw_materials' => 'Can\'t be found in the Forbidden Lands', 'talent' => 'Tailor', 'tools' => 'Tailor Shop', 'category' => 'textiles', 'effect' => ''],
        ['name' => 'Wool', 'price' => '4 copper', 'shelf_life' => 'One Month', 'raw_materials' => '-', 'talent' => '-', 'tools' => 'Sheepfold', 'category' => 'textiles', 'effect' => ''],
        
        // Food & Agriculture
        ['name' => 'Grain', 'price' => '3 copper', 'shelf_life' => 'One Month', 'raw_materials' => '-', 'talent' => '-', 'tools' => 'Field', 'category' => 'food', 'effect' => ''],
        ['name' => 'Meat', 'price' => '6 copper', 'shelf_life' => 'One Day', 'raw_materials' => '-', 'talent' => '-', 'tools' => 'Pasture, Pigsty, or Sheepfold', 'category' => 'food', 'effect' => ''],
        ['name' => 'Pelt', 'price' => '8 copper', 'shelf_life' => 'One Week', 'raw_materials' => '-', 'talent' => '-', 'tools' => 'Hunting', 'category' => 'food', 'effect' => 'Read more about hunting on page 151.'],
        ['name' => 'Flour', 'price' => '6 copper', 'shelf_life' => 'One Month', 'raw_materials' => 'Grain', 'talent' => '-', 'tools' => 'Mill', 'category' => 'food', 'effect' => ''],
        ['name' => 'Vegetables', 'price' => '4 copper', 'shelf_life' => 'One Day', 'raw_materials' => '-', 'talent' => '-', 'tools' => 'Garden', 'category' => 'food', 'effect' => ''],
        ['name' => 'Fish', 'price' => '5 copper', 'shelf_life' => 'One Day', 'raw_materials' => '-', 'talent' => '-', 'tools' => 'Net or hook and line', 'category' => 'food', 'effect' => 'Read more about fishing on page 153.'],
        ['name' => 'Bread', 'price' => '1 silver', 'shelf_life' => 'One Week', 'raw_materials' => 'Flour', 'talent' => '-', 'tools' => 'Bakery', 'category' => 'food', 'effect' => ''],
        ['name' => 'Tallow', 'price' => '6 copper', 'shelf_life' => '-', 'raw_materials' => '-', 'talent' => 'Tanner', 'tools' => 'Slaughterhouse', 'category' => 'food', 'effect' => 'A killed or slaughtered animal gives a number of units of Tallow equal to half the number of units of Meat (round down).'],
        ['name' => 'Herbs', 'price' => '2 silver', 'shelf_life' => 'One Week', 'raw_materials' => '-', 'talent' => '-', 'tools' => 'Garden', 'category' => 'food', 'effect' => ''],
    ];
}

function rg_get_raw_materials_by_category(string $category): array
{
    return array_filter(rg_get_raw_materials(), function($item) use ($category) {
        return $item['category'] === $category;
    });
}

function rg_get_raw_materials_by_shelf_life(string $shelf_life): array
{
    return array_filter(rg_get_raw_materials(), function($item) use ($shelf_life) {
        return $item['shelf_life'] === $shelf_life;
    });
}

function rg_get_raw_materials_by_name(string $name): ?array
{
    $materials = rg_get_raw_materials();
    foreach ($materials as $material) {
        if ($material['name'] === $name) {
            return $material;
        }
    }
    return null;
}

function rg_get_all_categories(): array
{
    $categories = [];
    foreach (rg_get_raw_materials() as $material) {
        $categories[$material['category']] = true;
    }
    return array_keys($categories);
}
