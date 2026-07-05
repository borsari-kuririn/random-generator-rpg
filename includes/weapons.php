<?php

declare(strict_types=1);

function rg_get_weapons(): array
{
    return [
        ['name' => 'Sword', 'price' => '2 gold', 'type' => 'Blade', 'weight' => 'Normal', 'damage' => '1d8', 'material' => 'Iron', 'rarity' => 'common'],
        ['name' => 'Axe', 'price' => '1 gold', 'type' => 'Blade', 'weight' => 'Normal', 'damage' => '1d8', 'material' => 'Iron', 'rarity' => 'common'],
        ['name' => 'Spear', 'price' => '1 gold 5 silver', 'type' => 'Polearm', 'weight' => 'Normal', 'damage' => '1d8', 'material' => 'Iron and Wood', 'rarity' => 'common'],
        ['name' => 'Dagger', 'price' => '3 silver', 'type' => 'Blade', 'weight' => 'Light', 'damage' => '1d6', 'material' => 'Iron', 'rarity' => 'common'],
        ['name' => 'Mace', 'price' => '1 gold', 'type' => 'Blunt', 'weight' => 'Normal', 'damage' => '1d8', 'material' => 'Iron and Wood', 'rarity' => 'common'],
        ['name' => 'Flail', 'price' => '1 gold 5 silver', 'type' => 'Blunt', 'weight' => 'Normal', 'damage' => '1d8', 'material' => 'Iron, Chain, and Wood', 'rarity' => 'uncommon'],
        ['name' => 'Bow', 'price' => '2 gold', 'type' => 'Ranged', 'weight' => 'Normal', 'damage' => '1d6', 'material' => 'Wood and String', 'rarity' => 'common'],
        ['name' => 'Crossbow', 'price' => '3 gold', 'type' => 'Ranged', 'weight' => 'Heavy', 'damage' => '1d8', 'material' => 'Wood and Iron', 'rarity' => 'uncommon'],
        ['name' => 'Throwing Knife', 'price' => '2 silver', 'type' => 'Ranged', 'weight' => 'Light', 'damage' => '1d4', 'material' => 'Iron', 'rarity' => 'common'],
        ['name' => 'War Hammer', 'price' => '2 gold', 'type' => 'Blunt', 'weight' => 'Heavy', 'damage' => '1d10', 'material' => 'Iron and Wood', 'rarity' => 'uncommon'],
        ['name' => 'Halberd', 'price' => '2 gold 5 silver', 'type' => 'Polearm', 'weight' => 'Heavy', 'damage' => '1d10', 'material' => 'Iron and Wood', 'rarity' => 'uncommon'],
        ['name' => 'Claymore', 'price' => '4 gold', 'type' => 'Blade', 'weight' => 'Heavy', 'damage' => '1d10', 'material' => 'Iron', 'rarity' => 'rare'],
        ['name' => 'Scimitar', 'price' => '2 gold 5 silver', 'type' => 'Blade', 'weight' => 'Normal', 'damage' => '1d8', 'material' => 'Steel', 'rarity' => 'uncommon'],
        ['name' => 'Battle Axe', 'price' => '2 gold', 'type' => 'Blade', 'weight' => 'Heavy', 'damage' => '1d10', 'material' => 'Iron and Wood', 'rarity' => 'uncommon'],
        ['name' => 'Pike', 'price' => '5 silver', 'type' => 'Polearm', 'weight' => 'Heavy', 'damage' => '1d8', 'material' => 'Iron and Wood', 'rarity' => 'common'],
        ['name' => 'Warhammer', 'price' => '2 gold', 'type' => 'Blunt', 'weight' => 'Heavy', 'damage' => '1d10', 'material' => 'Iron and Wood', 'rarity' => 'uncommon'],
        ['name' => 'Sling', 'price' => '6 copper', 'type' => 'Ranged', 'weight' => 'Light', 'damage' => '1d4', 'material' => 'Cloth and Leather', 'rarity' => 'common'],
        ['name' => 'Rapier', 'price' => '3 gold', 'type' => 'Blade', 'weight' => 'Light', 'damage' => '1d6', 'material' => 'Steel', 'rarity' => 'uncommon'],
        ['name' => 'Sabre', 'price' => '2 gold', 'type' => 'Blade', 'weight' => 'Normal', 'damage' => '1d8', 'material' => 'Iron', 'rarity' => 'uncommon'],
        ['name' => 'Maul', 'price' => '3 gold', 'type' => 'Blunt', 'weight' => 'Heavy', 'damage' => '1d12', 'material' => 'Wood and Iron', 'rarity' => 'rare'],
    ];
}

function rg_get_weapons_by_type(string $type): array
{
    return array_filter(rg_get_weapons(), function($item) use ($type) {
        return $item['type'] === $type;
    });
}

function rg_get_weapons_by_rarity(string $rarity): array
{
    return array_filter(rg_get_weapons(), function($item) use ($rarity) {
        return $item['rarity'] === $rarity;
    });
}
