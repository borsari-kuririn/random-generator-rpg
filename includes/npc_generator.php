<?php

declare(strict_types=1);

function rg_pick(array $items)
{
    return $items[array_rand($items)];
}

function rg_get_generator_options(): array
{
    return [
        'cultures' => ['north', 'imperial', 'desert', 'wild'],
        'races' => ['Human', 'Elf', 'Dwarf', 'Halfling', 'Tiefling', 'Half-Orc'],
        'classes' => ['Warrior', 'Rogue', 'Mage', 'Cleric', 'Ranger', 'Bard', 'Paladin', 'Druid'],
        'roles' => ['Guard Captain', 'Herbalist', 'Innkeeper', 'Treasure Hunter', 'Temple Scribe', 'Mercenary', 'Smuggler', 'Court Mage'],
    ];
}

function rg_filter_value(string $value, array $allowed): ?string
{
    foreach ($allowed as $item) {
        if (strcasecmp($item, $value) === 0) {
            return $item;
        }
    }

    return null;
}

function rg_generate_name(string $culture): string
{
    $namePools = [
        'north' => [
            'Aldric', 'Brenna', 'Cedric', 'Dagmar', 'Eira', 'Falk', 'Gunnar', 'Hilda', 'Ivor', 'Kara',
        ],
        'imperial' => [
            'Cassian', 'Doria', 'Lucan', 'Mira', 'Octavian', 'Petra', 'Silvan', 'Talia', 'Valen', 'Rhea',
        ],
        'desert' => [
            'Azar', 'Bashira', 'Farid', 'Jamal', 'Khalida', 'Nadir', 'Rashida', 'Samir', 'Tariq', 'Zahara',
        ],
        'wild' => [
            'Ash', 'Briar', 'Corin', 'Dove', 'Ember', 'Fen', 'Hollis', 'Lark', 'Moss', 'Rowan',
        ],
    ];

    $suffixes = [' of Blackmarsh', ' the Quiet', ' Ironhand', ' of the Lantern', ' Ravensong', ' Flintvein', ' Stormwalker', ' Briarborn', ''];

    $pool = $namePools[$culture] ?? $namePools['imperial'];

    return rg_pick($pool) . rg_pick($suffixes);
}

function rg_generate_npc(array $options = []): array
{
    $minLevel = (int)($options['min_level'] ?? 1);
    $maxLevel = (int)($options['max_level'] ?? 12);

    if ($minLevel < 1) {
        $minLevel = 1;
    }
    if ($maxLevel < $minLevel) {
        $maxLevel = $minLevel;
    }

    $generatorOptions = rg_get_generator_options();
    $cultureOptions = $generatorOptions['cultures'];
    $raceOptions = $generatorOptions['races'];
    $classOptions = $generatorOptions['classes'];
    $roleOptions = $generatorOptions['roles'];

    $traitOptions = [
        'Polite but unblinking in conversation.',
        'Laughs in dangerous moments.',
        'Obsessed with maps and hidden paths.',
        'Never sits with their back to a door.',
        'Speaks in short military commands.',
        'Keeps a prayer tally carved on bone.',
    ];

    $goalOptions = [
        'Recover a relic stolen by river bandits.',
        'Find a missing apprentice before moonrise.',
        'Pay off an old blood debt without violence.',
        'Secure a marriage alliance for their family.',
        'Expose corruption in the local watch.',
        'Reach an abandoned observatory in the hills.',
    ];

    $secretOptions = [
        'Is the last heir of a fallen house.',
        'Can read a forbidden script by touch alone.',
        'Works as a double agent for a rival guild.',
        'Has made a pact with an unknown spirit.',
        'Was present on the night of a royal murder.',
        'Carries a counterfeit seal of the crown.',
    ];

    $quirkOptions = [
        'Collects teeth from defeated monsters.',
        'Always smells faintly of cedar smoke.',
        'Writes every promise on scraps of cloth.',
        'Eats only food cut into perfect squares.',
        'Refuses to cross bridges after sunset.',
        'Hums old battlefield marches while working.',
    ];

    $hookOptions = [
        'Offers coin if the party escorts a wagon through cursed marshland.',
        'Needs discreet help breaking into a noble archive.',
        'Asks the party to identify a shard from a dragon idol.',
        'Wants protection during a tense market negotiation.',
        'Promises rare spell ink in exchange for a favor.',
        'Requests aid investigating a silent village bell tower.',
    ];

    $appearanceOptions = [
        'Weather-worn cloak with stitched sigils.',
        'Bronze rings stacked on every finger.',
        'Fine coat patched at elbows with sailcloth.',
        'Ash-grey braids tied with copper thread.',
        'Scar over one eye and ink-stained gloves.',
        'Traveler boots with mirrored buckles.',
    ];

    $itemOptions = [
        'Broken astrolabe',
        'Silver prayer chain',
        'Lockbox with three keyholes',
        'Vial of phosphorescent moss',
        'Folded war map from a forgotten campaign',
        'Ceramic whistle shaped like a wyvern',
    ];

    $voiceOptions = [
        'low and measured',
        'quick, theatrical, and bright',
        'raspy, with careful pauses',
        'warm and formal',
        'soft but commanding',
        'dry, almost amused',
    ];

    $selectedCulture = isset($options['culture']) && is_string($options['culture'])
        ? rg_filter_value(trim($options['culture']), $cultureOptions)
        : null;
    $selectedRace = isset($options['race']) && is_string($options['race'])
        ? rg_filter_value(trim($options['race']), $raceOptions)
        : null;
    $selectedClass = isset($options['class']) && is_string($options['class'])
        ? rg_filter_value(trim($options['class']), $classOptions)
        : null;

    $culture = $selectedCulture ?? rg_pick($cultureOptions);
    $race = $selectedRace ?? rg_pick($raceOptions);
    $class = $selectedClass ?? rg_pick($classOptions);

    return [
        'name' => rg_generate_name($culture),
        'culture' => ucfirst($culture),
        'race' => $race,
        'class' => $class,
        'role' => rg_pick($roleOptions),
        'level' => random_int($minLevel, $maxLevel),
        'trait' => rg_pick($traitOptions),
        'goal' => rg_pick($goalOptions),
        'secret' => rg_pick($secretOptions),
        'quirk' => rg_pick($quirkOptions),
        'hook' => rg_pick($hookOptions),
        'appearance' => rg_pick($appearanceOptions),
        'signature_item' => rg_pick($itemOptions),
        'voice' => rg_pick($voiceOptions),
    ];
}
