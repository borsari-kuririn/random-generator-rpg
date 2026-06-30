<?php

declare(strict_types=1);

require_once __DIR__ . '/npc_generator.php';

function rg_get_loot_options(): array
{
    return [
        'sources' => ['pocket', 'lair'],
        'rarities' => ['common', 'uncommon', 'rare', 'legendary'],
    ];
}

function rg_capitalize_words(string $value): string
{
    return ucwords(str_replace('_', ' ', $value));
}

function rg_choose_item_pool(string $rarity): array
{
    $pool = [
        'common' => [
            ['name' => 'Pocket flint striker', 'type' => 'Tool', 'value' => '4 silver', 'detail' => 'Still throws strong sparks.'],
            ['name' => 'Scratched bronze ring', 'type' => 'Adornment', 'value' => '6 silver', 'detail' => 'Its inner initials are nearly erased.'],
            ['name' => 'Needle and thread kit', 'type' => 'Utility', 'value' => '3 silver', 'detail' => 'Stored in a small bone case.'],
            ['name' => 'Folded street map', 'type' => 'Document', 'value' => '2 silver', 'detail' => 'Marks a hidden shortcut through alleys.'],
            ['name' => 'Herbal salve vial', 'type' => 'Consumable', 'value' => '5 silver', 'detail' => 'Useful for minor cuts and burns.'],
        ],
        'uncommon' => [
            ['name' => 'Waning Moon pendant', 'type' => 'Amulet', 'value' => '18 silver', 'detail' => 'Turns cold when magic is cast nearby.'],
            ['name' => 'Master key scroll', 'type' => 'Arcane', 'value' => '22 silver', 'detail' => 'Grants advantage on one lockpicking attempt.'],
            ['name' => 'Frontier coin pouch', 'type' => 'Treasure', 'value' => '17 silver', 'detail' => 'Contains mixed coinage from several realms.'],
            ['name' => 'Carved bone dagger', 'type' => 'Weapon', 'value' => '21 silver', 'detail' => 'Lightweight, balanced, and leather-gripped.'],
            ['name' => 'Weak alchemical fire ampoule', 'type' => 'Consumable', 'value' => '25 silver', 'detail' => 'Ignites on contact with air for a few seconds.'],
        ],
        'rare' => [
            ['name' => 'Prismatic silver key', 'type' => 'Minor artifact', 'value' => '95 silver', 'detail' => 'Glows near hidden doors.'],
            ['name' => 'Military command rune', 'type' => 'Insignia', 'value' => '82 silver', 'detail' => 'Opens old barracks strongboxes.'],
            ['name' => 'Silent-step ring', 'type' => 'Magical', 'value' => '110 silver', 'detail' => 'Muffles footsteps for a few minutes per day.'],
            ['name' => 'Draconic scale totem', 'type' => 'Reliquary', 'value' => '120 silver', 'detail' => 'Warms up when monsters draw near.'],
            ['name' => 'Bottled mist flask', 'type' => 'Magical consumable', 'value' => '88 silver', 'detail' => 'Creates dense cover in a short corridor.'],
        ],
        'legendary' => [
            ['name' => 'Vitrified wyrm tear', 'type' => 'Relic', 'value' => '1,300 silver', 'detail' => 'Can empower an ancient ritual.'],
            ['name' => 'Sunken Throne seal', 'type' => 'Royal insignia', 'value' => '1,050 silver', 'detail' => 'Recognized by extinct noble houses.'],
            ['name' => 'Star-thread breastplate', 'type' => 'Ritual armor', 'value' => '1,600 silver', 'detail' => 'Reflects light like moving constellations.'],
            ['name' => 'Hourglass of Eternal Watch', 'type' => 'Artifact', 'value' => '1,420 silver', 'detail' => 'Lets you replay the last few seconds of an event.'],
            ['name' => 'Horn of the First Siege', 'type' => 'War instrument', 'value' => '1,200 silver', 'detail' => 'Its call inspires courage in allies.'],
        ],
    ];

    return $pool[$rarity] ?? $pool['common'];
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

    $source = $selectedSource ?? rg_pick($lootOptions['sources']);
    $rarity = $selectedRarity ?? rg_pick($lootOptions['rarities']);

    $itemPool = rg_choose_item_pool($rarity);

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
