<?php

declare(strict_types=1);

function rg_get_vehicles(): array
{
    return [
        ['name' => 'Cart', 'price' => '15 silver', 'supply' => 'Common', 'raw_materials' => '30 Wood', 'time' => 'Two Days', 'talent' => 'Builder', 'tools' => 'Saw and hammer', 'effect' => 'Pulled by one animal. Can carry two people and 50 items.'],
        ['name' => 'Wagon', 'price' => '3 gold', 'supply' => 'Common', 'raw_materials' => '90 Wood', 'time' => 'One Week', 'talent' => 'Builder', 'tools' => 'Saw and hammer', 'effect' => 'Pulled by two animals. Can carry four people and 200 items.'],
        ['name' => 'Canoe', 'price' => '6 silver', 'supply' => 'Common', 'raw_materials' => '10 Wood', 'time' => 'One Day', 'talent' => '-', 'tools' => 'Saw and hammer', 'effect' => 'Can carry two people and 10 items.'],
        ['name' => 'Rowing Boat', 'price' => '15 silver', 'supply' => 'Common', 'raw_materials' => '20 Wood', 'time' => 'Two Days', 'talent' => 'Builder, Sailor', 'tools' => 'Saw and hammer', 'effect' => 'Can carry four people and 50 items.'],
        ['name' => 'Sailing Boat', 'price' => '4 gold', 'supply' => 'Uncommon', 'raw_materials' => '60 Wood, 10 Cloth', 'time' => 'One Week', 'talent' => 'Builder, Sailor', 'tools' => 'Saw and hammer', 'effect' => 'Can carry six people and 200 items.'],
    ];
}

function rg_get_vehicles_by_supply(string $supply): array
{
    return array_filter(rg_get_vehicles(), function($item) use ($supply) {
        return $item['supply'] === $supply;
    });
}

function rg_get_vehicles_by_capacity(string $type): array
{
    $vehicles = rg_get_vehicles();
    
    if ($type === 'small') {
        return array_filter($vehicles, function($item) {
            return in_array($item['name'], ['Canoe']);
        });
    } elseif ($type === 'medium') {
        return array_filter($vehicles, function($item) {
            return in_array($item['name'], ['Cart', 'Rowing Boat']);
        });
    } elseif ($type === 'large') {
        return array_filter($vehicles, function($item) {
            return in_array($item['name'], ['Wagon', 'Sailing Boat']);
        });
    }
    
    return $vehicles;
}
