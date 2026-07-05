<?php

declare(strict_types=1);

function rg_get_tools(): array
{
    return [
        ['name' => 'Saw', 'price' => '5 silver', 'supply' => 'Uncommon', 'weight' => 'Normal', 'raw_materials' => '1 Iron, 1 Wood', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge'],
        ['name' => 'Hammer', 'price' => '1 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1/2 Iron, 1 Wood', 'time' => 'Quarter Day', 'talent' => 'Smith', 'tools' => 'Fire, 1 Stone'],
        ['name' => 'Sledge Hammer', 'price' => '2 silver', 'supply' => 'Common', 'weight' => 'Heavy', 'raw_materials' => '1 Iron, 2 Wood', 'time' => 'Quarter Day', 'talent' => 'Smith', 'tools' => 'Fire, Hammer'],
        ['name' => 'Pickaxe', 'price' => '15 copper', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1 Iron, 1 Wood', 'time' => 'Quarter Day', 'talent' => 'Smith', 'tools' => 'Forge'],
        ['name' => 'Shovel', 'price' => '2 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1 Iron, 1 Wood', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge'],
        ['name' => 'Timber Axe', 'price' => '2 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1/2 Iron, 1 Wood', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge'],
        ['name' => 'Pliers', 'price' => '2 silver', 'supply' => 'Uncommon', 'weight' => 'Light', 'raw_materials' => '1 Iron', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge'],
        ['name' => 'Needle and Thread', 'price' => '3 copper', 'supply' => 'Common', 'weight' => 'Tiny', 'raw_materials' => '1/10 Iron, 1/10 Cloth', 'time' => 'Quarter Day', 'talent' => 'Smith, Tailor', 'tools' => 'Forge'],
    ];
}

function rg_get_tools_by_supply(string $supply): array
{
    return array_filter(rg_get_tools(), function($item) use ($supply) {
        return $item['supply'] === $supply;
    });
}

function rg_get_tools_by_weight(string $weight): array
{
    return array_filter(rg_get_tools(), function($item) use ($weight) {
        return $item['weight'] === $weight;
    });
}

function rg_get_tools_by_type(string $type): array
{
    $toolTypes = [
        'cutting' => ['Saw', 'Timber Axe'],
        'striking' => ['Hammer', 'Sledge Hammer'],
        'mining' => ['Pickaxe', 'Shovel'],
        'precision' => ['Pliers', 'Needle and Thread'],
    ];
    
    $selectedNames = $toolTypes[$type] ?? [];
    
    return array_filter(rg_get_tools(), function($item) use ($selectedNames) {
        return in_array($item['name'], $selectedNames);
    });
}
