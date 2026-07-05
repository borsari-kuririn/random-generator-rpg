<?php

declare(strict_types=1);

function rg_get_shields(): array
{
    return [
        ['name' => 'Wooden Shield', 'price' => '1 silver', 'type' => 'Round', 'protection' => '+1', 'weight' => 'Light', 'material' => 'Wood', 'rarity' => 'common'],
        ['name' => 'Kite Shield', 'price' => '3 silver', 'type' => 'Kite', 'protection' => '+2', 'weight' => 'Normal', 'material' => 'Wood and Iron', 'rarity' => 'common'],
        ['name' => 'Tower Shield', 'price' => '4 silver', 'type' => 'Tower', 'protection' => '+3', 'weight' => 'Heavy', 'material' => 'Wood and Iron', 'rarity' => 'uncommon'],
        ['name' => 'Iron-banded Shield', 'price' => '3 silver', 'type' => 'Round', 'protection' => '+2', 'weight' => 'Normal', 'material' => 'Wood and Iron', 'rarity' => 'common'],
        ['name' => 'Leather-faced Shield', 'price' => '2 silver', 'type' => 'Round', 'protection' => '+1', 'weight' => 'Light', 'material' => 'Wood and Leather', 'rarity' => 'common'],
        ['name' => 'Steel-plated Shield', 'price' => '5 silver', 'type' => 'Heater', 'protection' => '+2', 'weight' => 'Normal', 'material' => 'Steel and Wood', 'rarity' => 'uncommon'],
        ['name' => 'Buckler', 'price' => '1 silver', 'type' => 'Buckler', 'protection' => '+1', 'weight' => 'Light', 'material' => 'Metal', 'rarity' => 'common'],
        ['name' => 'Heater Shield', 'price' => '4 silver', 'type' => 'Heater', 'protection' => '+2', 'weight' => 'Normal', 'material' => 'Wood and Iron', 'rarity' => 'common'],
        ['name' => 'Embossed Shield', 'price' => '6 silver', 'type' => 'Round', 'protection' => '+2', 'weight' => 'Normal', 'material' => 'Metal and Wood', 'rarity' => 'uncommon'],
        ['name' => 'Ceremonial Shield', 'price' => '2 gold', 'type' => 'Round', 'protection' => '+1', 'weight' => 'Light', 'material' => 'Gold-plated Wood', 'rarity' => 'rare'],
        ['name' => 'Banded Shield', 'price' => '3 silver', 'type' => 'Round', 'protection' => '+2', 'weight' => 'Normal', 'material' => 'Wood and Leather Bands', 'rarity' => 'common'],
        ['name' => 'Dragon-hide Shield', 'price' => '3 gold', 'type' => 'Kite', 'protection' => '+3', 'weight' => 'Normal', 'material' => 'Dragon Hide', 'rarity' => 'rare'],
        ['name' => 'Reinforced Shield', 'price' => '4 silver', 'type' => 'Round', 'protection' => '+2', 'weight' => 'Normal', 'material' => 'Wood with Iron Studs', 'rarity' => 'common'],
        ['name' => 'Ornate Shield', 'price' => '8 silver', 'type' => 'Heater', 'protection' => '+2', 'weight' => 'Normal', 'material' => 'Engraved Metal and Wood', 'rarity' => 'uncommon'],
        ['name' => 'Spiked Shield', 'price' => '5 silver', 'type' => 'Round', 'protection' => '+2', 'weight' => 'Normal', 'material' => 'Wood with Iron Spikes', 'rarity' => 'uncommon'],
        ['name' => 'Mirrored Shield', 'price' => '2 gold', 'type' => 'Round', 'protection' => '+2', 'weight' => 'Normal', 'material' => 'Polished Metal', 'rarity' => 'rare'],
    ];
}

function rg_get_shields_by_type(string $type): array
{
    return array_filter(rg_get_shields(), function($item) use ($type) {
        return $item['type'] === $type;
    });
}

function rg_get_shields_by_rarity(string $rarity): array
{
    return array_filter(rg_get_shields(), function($item) use ($rarity) {
        return $item['rarity'] === $rarity;
    });
}
