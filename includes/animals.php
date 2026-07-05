<?php

declare(strict_types=1);

function rg_get_animals(): array
{
    return [
        ['name' => 'Riding Horse', 'price' => '2 gold', 'supply' => 'Uncommon', 'category' => 'mount', 'comment' => 'For stats, see page 124 in the Gamemaster\'s Guide.', 'effect' => ''],
        ['name' => 'Combat Trained Horse', 'price' => '8 gold', 'supply' => 'Rare', 'category' => 'mount', 'comment' => 'For stats, see page 124 in the Gamemaster\'s Guide.', 'effect' => ''],
        ['name' => 'Donkey', 'price' => '6 silver', 'supply' => 'Common', 'category' => 'beast_of_burden', 'comment' => 'For stats, see page 124 in the Gamemaster\'s Guide.', 'effect' => ''],
        ['name' => 'Guard Dog', 'price' => '4 silver', 'supply' => 'Common', 'category' => 'companion', 'comment' => 'For stats, see page 125 in the Gamemaster\'s Guide.', 'effect' => ''],
        ['name' => 'Pig', 'price' => '2 silver', 'supply' => 'Common', 'category' => 'livestock', 'comment' => '', 'effect' => 'Gives 6 units of Meat when slaughtered.'],
        ['name' => 'Sheep', 'price' => '3 silver', 'supply' => 'Common', 'category' => 'livestock', 'comment' => '', 'effect' => 'Gives 2 units of Wool when sheared and 5 units of Meat when slaughtered.'],
        ['name' => 'Cow', 'price' => '1 gold', 'supply' => 'Uncommon', 'category' => 'livestock', 'comment' => '', 'effect' => 'Gives 1 unit of Food (milk) when milked, and 6 units of Meat when slaughtered.'],
        ['name' => 'Chicken', 'price' => '4 copper', 'supply' => 'Common', 'category' => 'livestock', 'comment' => '', 'effect' => 'Gives 1 unit of Meat when slaughtered.'],
        ['name' => 'Homing Pigeon in Cage', 'price' => '2 silver', 'supply' => 'Uncommon', 'category' => 'companion', 'comment' => '', 'effect' => 'Flies home to its Dovecote when released.'],
    ];
}

function rg_get_animals_by_supply(string $supply): array
{
    return array_filter(rg_get_animals(), function($item) use ($supply) {
        return $item['supply'] === $supply;
    });
}

function rg_get_animals_by_category(string $category): array
{
    return array_filter(rg_get_animals(), function($item) use ($category) {
        return $item['category'] === $category;
    });
}

function rg_get_animals_by_type(string $type): array
{
    $typeMap = [
        'mounts' => ['Riding Horse', 'Combat Trained Horse'],
        'beasts' => ['Donkey'],
        'companions' => ['Guard Dog', 'Homing Pigeon in Cage'],
        'livestock' => ['Pig', 'Sheep', 'Cow', 'Chicken'],
        'productive' => ['Sheep', 'Cow', 'Chicken', 'Pig'],
    ];
    
    $selectedNames = $typeMap[$type] ?? [];
    
    return array_filter(rg_get_animals(), function($item) use ($selectedNames) {
        return in_array($item['name'], $selectedNames);
    });
}

function rg_get_all_animal_categories(): array
{
    $categories = [];
    foreach (rg_get_animals() as $animal) {
        $categories[$animal['category']] = true;
    }
    return array_keys($categories);
}
