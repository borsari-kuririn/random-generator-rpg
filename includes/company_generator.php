<?php

declare(strict_types=1);

function rg_company_pick(array $items)
{
    return $items[array_rand($items)];
}

function rg_company_roll_sum(int $dice, int $sides): int
{
    $total = 0;
    for ($i = 0; $i < $dice; $i++) {
        $total += random_int(1, $sides);
    }

    return $total;
}

function rg_company_filter_value(string $value, array $allowed): ?string
{
    foreach ($allowed as $item) {
        if (strcasecmp($item, $value) === 0) {
            return $item;
        }
    }

    return null;
}

function rg_company_label(string $value): string
{
    $labels = [
        'local' => 'Local',
        'regional' => 'Regional',
        'national' => 'National',
        'worldwide' => 'Worldwide',
        'wealth' => 'Wealth',
        'power' => 'Power',
        'influence' => 'Influence',
        'intrigue' => 'Intrigue',
        'magic' => 'Magic',
        'production' => 'Production',
        'guild' => 'Guild',
        'noble_house' => 'Noble House',
        'church_order' => 'Church Order',
        'mercantile_league' => 'Mercantile League',
        'arcane_circle' => 'Arcane Circle',
        'industrial_consortium' => 'Industrial Consortium',
        'shadow_network' => 'Shadow Network',
    ];

    return $labels[$value] ?? ucfirst($value);
}

function rg_get_company_options(): array
{
    return [
        'sizes' => ['local', 'regional', 'national', 'worldwide'],
        'kinds' => ['guild', 'noble_house', 'church_order', 'mercantile_league', 'arcane_circle', 'industrial_consortium', 'shadow_network'],
        'spheres' => ['wealth', 'power', 'influence', 'intrigue', 'magic', 'production'],
    ];
}

function rg_company_size_multiplier(string $size): int
{
    $multipliers = [
        'local' => 1,
        'regional' => 4,
        'national' => 8,
        'worldwide' => 16,
    ];

    return $multipliers[$size] ?? 1;
}

function rg_company_name(string $kind): string
{
    $prefixes = ['Iron', 'Golden', 'Silent', 'Ivory', 'Obsidian', 'Verdant', 'Crimson', 'Silver'];

    $suffixByKind = [
        'guild' => ['Trade Guild', 'Craft Union', 'Free Guild'],
        'noble_house' => ['House', 'Dynasty', 'Banner'],
        'church_order' => ['Order', 'Conclave', 'Sanctum'],
        'mercantile_league' => ['League', 'Consortium', 'Exchange'],
        'arcane_circle' => ['Circle', 'Athenaeum', 'Covenant'],
        'industrial_consortium' => ['Foundry Syndicate', 'Works Consortium', 'Steel Trust'],
        'shadow_network' => ['Whisper Ring', 'Night Compact', 'Veiled Network'],
    ];

    $suffixPool = $suffixByKind[$kind] ?? $suffixByKind['guild'];

    return rg_company_pick($prefixes) . ' ' . rg_company_pick($suffixPool);
}

function rg_company_distribute_spheres(int $totalPoints, ?string $focusSphere = null): array
{
    $spheres = [
        'wealth' => 0,
        'power' => 0,
        'influence' => 0,
        'intrigue' => 0,
        'magic' => 0,
        'production' => 0,
    ];

    $keys = array_keys($spheres);

    for ($i = 0; $i < $totalPoints; $i++) {
        $target = rg_company_pick($keys);

        if ($focusSphere !== null && isset($spheres[$focusSphere]) && random_int(1, 100) <= 55) {
            $target = $focusSphere;
        }

        $spheres[$target]++;
    }

    return $spheres;
}

function rg_company_specialization_pool(string $sphere): array
{
    $pool = [
        'wealth' => ['Goods', 'Services', 'Treasury'],
        'power' => ['Siege', 'Garrison', 'Raiders', 'Specialized Troops'],
        'influence' => ['Nobility', 'Churches', 'Guilds', 'Political Organizations'],
        'intrigue' => ['Espionage', 'Blackmail', 'Sabotage'],
        'magic' => ['Artifacts', 'Specialized Arcanists', 'Alchemy'],
        'production' => ['Metallurgy', 'Mining', 'Specialized Industrialization'],
    ];

    return $pool[$sphere] ?? ['General Operations'];
}

function rg_company_effect_band(int $value): string
{
    if ($value <= 0) {
        return 'none';
    }
    if ($value <= 2) {
        return 'basic';
    }
    if ($value <= 4) {
        return 'advanced';
    }

    return 'elite';
}

function rg_company_resource_projection(string $sphere, int $sphereValue, int $multiplier): string
{
    $band = rg_company_effect_band($sphereValue);

    if ($band === 'none') {
        return 'No significant deployable resources in this sphere yet.';
    }

    if ($sphere === 'wealth') {
        $base = $band === 'basic' ? 1000 : ($band === 'advanced' ? 3000 : 5000);
        $goodsValue = $base * $multiplier;
        $liquidValue = intdiv($goodsValue, 4);

        return 'Estimated wealth output: up to ' . number_format($goodsValue) . ' in goods or around ' . number_format($liquidValue) . ' in liquid coin.';
    }

    $baseUnits = $band === 'basic' ? 2 : ($band === 'advanced' ? 4 : 6);
    $unitValue = $baseUnits * $multiplier;

    $unitBySphere = [
        'power' => 'soldier squads (manual baseline often scales to larger military counts)',
        'influence' => 'agents or voting blocs',
        'intrigue' => 'spy cells or high-value secrets',
        'magic' => 'arcanists/alchemists',
        'production' => 'artisan teams',
    ];

    $unitLabel = $unitBySphere[$sphere] ?? 'operational assets';

    return 'Estimated deployable resources: up to ' . number_format($unitValue) . ' ' . $unitLabel . '.';
}

function rg_generate_company(array $options = []): array
{
    $companyOptions = rg_get_company_options();

    $sizeInput = isset($options['size']) && is_string($options['size']) ? trim($options['size']) : '';
    $kindInput = isset($options['kind']) && is_string($options['kind']) ? trim($options['kind']) : '';
    $focusInput = isset($options['focus']) && is_string($options['focus']) ? trim($options['focus']) : '';

    $size = rg_company_filter_value($sizeInput, $companyOptions['sizes']) ?? rg_company_pick($companyOptions['sizes']);
    $kind = rg_company_filter_value($kindInput, $companyOptions['kinds']) ?? rg_company_pick($companyOptions['kinds']);
    $focusSphere = rg_company_filter_value($focusInput, $companyOptions['spheres']);

    $spheres = rg_company_distribute_spheres(3, $focusSphere);

    $dominantSphere = array_key_first($spheres);
    $dominantValue = $spheres[$dominantSphere];
    foreach ($spheres as $sphereKey => $sphereValue) {
        if ($sphereValue > $dominantValue) {
            $dominantSphere = $sphereKey;
            $dominantValue = $sphereValue;
        }
    }

    $specializationSphere = $focusSphere ?? $dominantSphere;
    $specialization = rg_company_pick(rg_company_specialization_pool($specializationSphere));

    $stability = rg_company_roll_sum(4, 6);
    $structure = random_int(1, 6) - 1;
    $multiplier = rg_company_size_multiplier($size);

    $hooks = [
        'A rival company is spreading false rumors to trigger an ENGODO strike against this organization.',
        'A growth opportunity emerged: if one sphere reaches 6, the company can attempt a size upgrade event.',
        'A high-ranking contact asks for a covert favor in exchange for Influence support.',
        'Production is stable, but a resource bottleneck may force a risky restructuring soon.',
        'A neighboring faction offers an acquisition deal with hidden costs in Stability.',
    ];

    return [
        'name' => rg_company_name($kind),
        'kind' => rg_company_label($kind),
        'size' => rg_company_label($size),
        'multiplier' => 'x' . (string)$multiplier,
        'stability' => (string)$stability,
        'structure' => (string)$structure,
        'wealth' => (string)$spheres['wealth'],
        'power' => (string)$spheres['power'],
        'influence' => (string)$spheres['influence'],
        'intrigue' => (string)$spheres['intrigue'],
        'magic' => (string)$spheres['magic'],
        'production' => (string)$spheres['production'],
        'specialization' => rg_company_label($specializationSphere) . ': ' . $specialization . ' (+2 when applicable)',
        'event_rule' => 'Growth action baseline: 3d6 + chosen sphere +2 from specialization (if applicable), target above 12.',
        'engodo_rule' => 'ENGODO baseline: 2d6 + chosen sphere +2 from specialization (if applicable), then pressure Structure before Stability.',
        'resource_projection' => rg_company_resource_projection($specializationSphere, $spheres[$specializationSphere], $multiplier),
        'hook' => rg_company_pick($hooks),
    ];
}
