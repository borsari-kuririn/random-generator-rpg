<?php

declare(strict_types=1);

function rg_get_clothes(): array
{
    return [
        ['name' => 'Simple Tunic', 'price' => '6 copper', 'type' => 'Common', 'material' => 'Cloth', 'condition' => 'Worn', 'rarity' => 'common'],
        ['name' => 'Wool Cloak', 'price' => '2 silver', 'type' => 'Outerwear', 'material' => 'Wool', 'condition' => 'Worn', 'rarity' => 'common'],
        ['name' => 'Leather Boots', 'price' => '1 silver', 'type' => 'Footwear', 'material' => 'Leather', 'condition' => 'Well-used', 'rarity' => 'common'],
        ['name' => 'Traveling Coat', 'price' => '3 silver', 'type' => 'Outerwear', 'material' => 'Heavy Cloth', 'condition' => 'Worn', 'rarity' => 'common'],
        ['name' => 'Linen Shirt', 'price' => '4 copper', 'type' => 'Common', 'material' => 'Linen', 'condition' => 'Clean', 'rarity' => 'common'],
        ['name' => 'Wool Trousers', 'price' => '8 copper', 'type' => 'Common', 'material' => 'Wool', 'condition' => 'Worn', 'rarity' => 'common'],
        ['name' => 'Silk Scarf', 'price' => '1 gold', 'type' => 'Accessory', 'material' => 'Silk', 'condition' => 'Pristine', 'rarity' => 'uncommon'],
        ['name' => 'Fur Mantle', 'price' => '5 silver', 'type' => 'Outerwear', 'material' => 'Animal Fur', 'condition' => 'Well-preserved', 'rarity' => 'uncommon'],
        ['name' => 'Worker\'s Apron', 'price' => '3 copper', 'type' => 'Common', 'material' => 'Cloth', 'condition' => 'Stained', 'rarity' => 'common'],
        ['name' => 'Hooded Cloak', 'price' => '4 silver', 'type' => 'Outerwear', 'material' => 'Heavy Cloth', 'condition' => 'Well-maintained', 'rarity' => 'uncommon'],
        ['name' => 'Merchant\'s Vest', 'price' => '2 silver', 'type' => 'Common', 'material' => 'Cloth', 'condition' => 'Fine', 'rarity' => 'uncommon'],
        ['name' => 'Knit Gloves', 'price' => '5 copper', 'type' => 'Accessory', 'material' => 'Wool', 'condition' => 'Worn', 'rarity' => 'common'],
        ['name' => 'Fur Boots', 'price' => '3 silver', 'type' => 'Footwear', 'material' => 'Leather and Fur', 'condition' => 'Sturdy', 'rarity' => 'uncommon'],
        ['name' => 'Linen Breeches', 'price' => '6 copper', 'type' => 'Common', 'material' => 'Linen', 'condition' => 'Clean', 'rarity' => 'common'],
        ['name' => 'Leather Belt', 'price' => '8 copper', 'type' => 'Accessory', 'material' => 'Leather', 'condition' => 'Serviceable', 'rarity' => 'common'],
        ['name' => 'Formal Doublet', 'price' => '6 silver', 'type' => 'Fine', 'material' => 'Cloth', 'condition' => 'Pristine', 'rarity' => 'uncommon'],
        ['name' => 'Peasant Smock', 'price' => '2 copper', 'type' => 'Common', 'material' => 'Cloth', 'condition' => 'Well-worn', 'rarity' => 'common'],
        ['name' => 'Woolen Socks', 'price' => '2 copper', 'type' => 'Accessory', 'material' => 'Wool', 'condition' => 'Good', 'rarity' => 'common'],
        ['name' => 'Silk Undertunic', 'price' => '5 silver', 'type' => 'Common', 'material' => 'Silk', 'condition' => 'Delicate', 'rarity' => 'uncommon'],
        ['name' => 'Leather Duster', 'price' => '4 silver', 'type' => 'Outerwear', 'material' => 'Leather', 'condition' => 'Weathered', 'rarity' => 'uncommon'],
    ];
}

function rg_get_clothes_by_type(string $type): array
{
    return array_filter(rg_get_clothes(), function($item) use ($type) {
        return $item['type'] === $type;
    });
}

function rg_get_clothes_by_material(string $material): array
{
    return array_filter(rg_get_clothes(), function($item) use ($material) {
        return $item['material'] === $material;
    });
}
