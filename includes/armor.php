<?php

declare(strict_types=1);

function rg_get_armor(): array
{
    return [
        ['name' => 'Leather Armor', 'price' => '5 silver', 'type' => 'Light', 'protection' => '+1', 'weight' => 'Light', 'material' => 'Leather', 'rarity' => 'common'],
        ['name' => 'Studded Leather Armor', 'price' => '10 silver', 'type' => 'Light', 'protection' => '+2', 'weight' => 'Light', 'material' => 'Leather and Iron', 'rarity' => 'common'],
        ['name' => 'Chain Mail', 'price' => '5 gold', 'type' => 'Medium', 'protection' => '+3', 'weight' => 'Normal', 'material' => 'Iron', 'rarity' => 'uncommon'],
        ['name' => 'Plate Armor', 'price' => '10 gold', 'type' => 'Heavy', 'protection' => '+4', 'weight' => 'Heavy', 'material' => 'Iron', 'rarity' => 'uncommon'],
        ['name' => 'Scale Armor', 'price' => '8 gold', 'type' => 'Medium', 'protection' => '+3', 'weight' => 'Normal', 'material' => 'Metal Scales and Leather', 'rarity' => 'uncommon'],
        ['name' => 'Half Plate', 'price' => '7 gold', 'type' => 'Medium', 'protection' => '+3', 'weight' => 'Normal', 'material' => 'Iron and Leather', 'rarity' => 'uncommon'],
        ['name' => 'Cloth Armor', 'price' => '1 silver', 'type' => 'Light', 'protection' => '+0', 'weight' => 'Light', 'material' => 'Cloth', 'rarity' => 'common'],
        ['name' => 'Hide Armor', 'price' => '10 silver', 'type' => 'Light', 'protection' => '+2', 'weight' => 'Light', 'material' => 'Animal Hide', 'rarity' => 'common'],
        ['name' => 'Ring Mail', 'price' => '3 gold', 'type' => 'Medium', 'protection' => '+2', 'weight' => 'Normal', 'material' => 'Iron Rings and Leather', 'rarity' => 'common'],
        ['name' => 'Splint Armor', 'price' => '6 gold', 'type' => 'Heavy', 'protection' => '+4', 'weight' => 'Heavy', 'material' => 'Metal Splints and Leather', 'rarity' => 'uncommon'],
        ['name' => 'Padded Armor', 'price' => '5 silver', 'type' => 'Light', 'protection' => '+1', 'weight' => 'Light', 'material' => 'Padded Cloth', 'rarity' => 'common'],
        ['name' => 'Brigandine', 'price' => '4 gold', 'type' => 'Medium', 'protection' => '+3', 'weight' => 'Normal', 'material' => 'Metal Plates and Cloth', 'rarity' => 'uncommon'],
        ['name' => 'Leather Jacket', 'price' => '3 silver', 'type' => 'Light', 'protection' => '+1', 'weight' => 'Light', 'material' => 'Leather', 'rarity' => 'common'],
        ['name' => 'Mithral Armor', 'price' => '20 gold', 'type' => 'Heavy', 'protection' => '+5', 'weight' => 'Light', 'material' => 'Mithral', 'rarity' => 'rare'],
        ['name' => 'Dragon Scale Armor', 'price' => '25 gold', 'type' => 'Heavy', 'protection' => '+6', 'weight' => 'Heavy', 'material' => 'Dragon Scales', 'rarity' => 'rare'],
        ['name' => 'Woven Chain', 'price' => '8 silver', 'type' => 'Light', 'protection' => '+2', 'weight' => 'Light', 'material' => 'Thin Iron Chain', 'rarity' => 'common'],
    ];
}

function rg_get_armor_by_type(string $type): array
{
    return array_filter(rg_get_armor(), function($item) use ($type) {
        return $item['type'] === $type;
    });
}

function rg_get_armor_by_rarity(string $rarity): array
{
    return array_filter(rg_get_armor(), function($item) use ($rarity) {
        return $item['rarity'] === $rarity;
    });
}
