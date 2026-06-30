<?php

declare(strict_types=1);

require_once __DIR__ . '/npc_generator.php';

function rg_get_place_options(): array
{
    return [
        'types' => ['castle', 'fortress', 'tower', 'keep', 'sanctum'],
        'occupants' => ['monster', 'remnants', 'mixed'],
    ];
}

function rg_place_label(string $value): string
{
    $labels = [
        'castle' => 'Castle',
        'fortress' => 'Fortress',
        'tower' => 'Tower',
        'keep' => 'Keep',
        'sanctum' => 'Sanctum',
        'monster' => 'Monsters',
        'remnants' => 'Remaining inhabitants',
        'mixed' => 'Monsters and remnants',
    ];

    return $labels[$value] ?? ucfirst($value);
}

function rg_place_name(string $type): string
{
    $prefixes = ['Stone', 'Mist', 'Ash', 'Iron', 'Echo', 'Watch', 'Moon', 'Raven'];
    $suffixByType = [
        'castle' => ['of the Hollow Throne', 'of Ravenhall', 'of Broken Banners'],
        'fortress' => ['of Black Dike', 'of the Seven Walls', 'of the Cold Pass'],
        'tower' => ['of Silent Bells', 'of the Lost Watch', 'of the Broken Moon'],
        'keep' => ['of High Tide', 'of the Old Gate', 'of the Chalk Oath'],
        'sanctum' => ['of the Silent Choir', 'of Cold Flames', 'of the Salt Rose'],
    ];

    $suffixPool = $suffixByType[$type] ?? $suffixByType['castle'];

    return rg_place_label($type) . ' ' . rg_pick($prefixes) . ' ' . rg_pick($suffixPool);
}

function rg_build_place_history(string $type, string $creator, string $age, string $fall): string
{
    $purposeByType = [
        'castle' => 'seat of a frontier noble house',
        'fortress' => 'defensive line against northern invasions',
        'tower' => 'observation post over trade routes',
        'keep' => 'elite garrison built to guard a mountain pass',
        'sanctum' => 'ritual refuge of a priestly order',
    ];

    $purpose = $purposeByType[$type] ?? $purposeByType['castle'];

    return 'Built by ' . $creator . ' around ' . $age . ' ago, this place served as a ' . $purpose . '. '
        . 'Its decline began when ' . $fall . '.';
}

function rg_generate_place(array $options = []): array
{
    $placeOptions = rg_get_place_options();

    $selectedType = isset($options['type']) && is_string($options['type'])
        ? rg_filter_value(trim($options['type']), $placeOptions['types'])
        : null;
    $selectedOccupants = isset($options['occupants']) && is_string($options['occupants'])
        ? rg_filter_value(trim($options['occupants']), $placeOptions['occupants'])
        : null;

    $type = $selectedType ?? rg_pick($placeOptions['types']);
    $occupants = $selectedOccupants ?? rg_pick($placeOptions['occupants']);

    $creators = [
        'Queen Isolde of Ivory',
        'the Conclave of Iron Mages',
        'General Torven during the last succession war',
        'map-making monks of the Lighthouse Order',
        'House Velkar before its fall',
    ];

    $ages = ['120 years', '240 years', '370 years', '500 years', 'nearly 700 years'];
    $fallReasons = [
        'a three-winter siege destroyed the granaries',
        'an arcane pact spiraled out of control in the great hall',
        'a plague wiped out most of the garrison',
        'the region\'s mines dried up and the site lost strategic value',
        'the ruling bloodline vanished without heirs',
    ];

    $monsterGroups = [
        'a nest of tomb spiders and their albino brood',
        'a pack of shadow wolves led by a scarred alpha',
        'a troop of forge-goblins ruled by a brutal foreman',
        'specters of old sentinels bound by oath',
        'a scholarly ogre collecting stolen relics',
    ];

    $remnantGroups = [
        'a small survivor cult guarding old archives',
        'deserters who turned the inner yard into a black market',
        'refugee families living in the dry galleries',
        'a handful of monks refusing to abandon the altar',
        'relic hunters occupying the outer towers',
    ];

    $dangers = [
        'ancient traps still active in the lower corridors',
        'unstable hallways that may collapse under heavy weight',
        'an arcane rift that distorts sound and distance',
        'water pits contaminated by luminous fungi',
        'rune-sealed doors that trigger spectral alarms',
    ];

    $treasures = [
        'a wall-safe containing intact military maps',
        'reliquaries bearing seals of an extinct dynasty',
        'an observatory with rare crystal lenses',
        'an arsenal with old but functional weapons',
        'a genealogy tome proving ancient claims',
    ];

    $creator = rg_pick($creators);
    $age = rg_pick($ages);
    $fall = rg_pick($fallReasons);
    $danger = rg_pick($dangers);

    $occupantSummary = '';
    if ($occupants === 'monster') {
        $occupantSummary = rg_pick($monsterGroups);
    } elseif ($occupants === 'remnants') {
        $occupantSummary = rg_pick($remnantGroups);
    } else {
        $occupantSummary = rg_pick($monsterGroups) . '; in addition, ' . rg_pick($remnantGroups);
    }

    return [
        'name' => rg_place_name($type),
        'type' => rg_place_label($type),
        'state' => 'Abandoned',
        'occupants' => rg_place_label($occupants),
        'history' => rg_build_place_history($type, $creator, $age, $fall),
        'current_inhabitants' => $occupantSummary,
        'main_danger' => $danger,
        'notable_find' => rg_pick($treasures),
        'adventure_hook' => 'Rumors say that ' . rg_pick([
            'the main hall echoes with voices of long-dead commanders',
            'a hidden passage links the site to nearby catacombs',
            'an unfinished pact is hidden inside the throne room',
            'the current leader might negotiate for supplies and healing',
            'whoever controls this place controls the region\'s routes',
        ]) . '.',
    ];
}
