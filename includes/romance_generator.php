<?php

declare(strict_types=1);

require_once __DIR__ . '/npc_generator.php';

function rg_get_romance_options(): array
{
    return [
        'tones' => ['sweet', 'tragic', 'forbidden', 'chaotic'],
        'drama_levels' => ['low', 'medium', 'high'],
        'genders' => ['Woman', 'Man', 'Non-binary'],
    ];
}

function rg_romance_label(string $value): string
{
    $labels = [
        'sweet' => 'Sweet',
        'tragic' => 'Tragic',
        'forbidden' => 'Forbidden',
        'chaotic' => 'Chaotic',
        'low' => 'Low',
        'medium' => 'Medium',
        'high' => 'High',
    ];

    return $labels[$value] ?? ucfirst($value);
}

function rg_romance_name_pool(string $gender): array
{
    $pool = [
        'Woman' => ['Lysandra', 'Mirela', 'Talia', 'Serena', 'Iria', 'Calista', 'Ysolda'],
        'Man' => ['Darian', 'Kael', 'Lucien', 'Rhydan', 'Alaric', 'Marek', 'Silas'],
        'Non-binary' => ['Ari', 'Ren', 'Sage', 'Korin', 'Vale', 'Lior', 'Cyan'],
    ];

    return $pool[$gender] ?? $pool['Non-binary'];
}

function rg_romance_preference_options_for_target(string $targetGender): array
{
    if ($targetGender === 'Woman') {
        return ['Women', 'Women and non-binary people', 'Multiple genders'];
    }

    if ($targetGender === 'Man') {
        return ['Men', 'Men and non-binary people', 'Multiple genders'];
    }

    return ['Non-binary people', 'Non-binary people and women', 'Non-binary people and men', 'Multiple genders'];
}

function rg_generate_partner(string $gender, string $preference): array
{
    $styles = [
        'long coats with silver details and dark leather',
        'refitted noble attire patched for travel',
        'light road clothes with weatherproof cloaks',
        'subtle ritual garments with old embroidery',
        'partial armor over elegant fabric',
        'refined urban clothing in deep tones',
    ];

    return [
        'name' => rg_pick(rg_romance_name_pool($gender)) . ' ' . rg_pick(['Voss', 'Dorn', 'Belmont', 'Ravenor', 'Mourn', 'Aster']),
        'gender' => $gender,
        'preference' => $preference,
        'style' => rg_pick($styles),
    ];
}

function rg_generate_romantic_pair(array $options = []): array
{
    $romanceOptions = rg_get_romance_options();

    $selectedTone = isset($options['tone']) && is_string($options['tone'])
        ? rg_filter_value(trim($options['tone']), $romanceOptions['tones'])
        : null;
    $selectedDrama = isset($options['drama']) && is_string($options['drama'])
        ? rg_filter_value(trim($options['drama']), $romanceOptions['drama_levels'])
        : null;
    $selectedGenderA = isset($options['gender_a']) && is_string($options['gender_a'])
        ? rg_filter_value(trim($options['gender_a']), $romanceOptions['genders'])
        : null;
    $selectedGenderB = isset($options['gender_b']) && is_string($options['gender_b'])
        ? rg_filter_value(trim($options['gender_b']), $romanceOptions['genders'])
        : null;

    $tone = $selectedTone ?? rg_pick($romanceOptions['tones']);
    $drama = $selectedDrama ?? rg_pick($romanceOptions['drama_levels']);

    $pairTemplates = [
        [
            'a' => ['gender' => 'Woman'],
            'b' => ['gender' => 'Woman'],
        ],
        [
            'a' => ['gender' => 'Man'],
            'b' => ['gender' => 'Man'],
        ],
        [
            'a' => ['gender' => 'Woman'],
            'b' => ['gender' => 'Man'],
        ],
        [
            'a' => ['gender' => 'Non-binary'],
            'b' => ['gender' => 'Woman'],
        ],
        [
            'a' => ['gender' => 'Non-binary'],
            'b' => ['gender' => 'Man'],
        ],
    ];

    $template = rg_pick($pairTemplates);
    $partnerAGender = $selectedGenderA ?? $template['a']['gender'];
    $partnerBGender = $selectedGenderB ?? $template['b']['gender'];

    $partnerAPreference = rg_pick(rg_romance_preference_options_for_target($partnerBGender));
    $partnerBPreference = rg_pick(rg_romance_preference_options_for_target($partnerAGender));

    $partnerA = rg_generate_partner($partnerAGender, $partnerAPreference);
    $partnerB = rg_generate_partner($partnerBGender, $partnerBPreference);

    $relationStage = rg_pick([
        'Secretly in love for several moons.',
        'Engaged under political pressure from two rival houses.',
        'Former lovers trying to rebuild trust during a war.',
        'Travel companions who found love in chaos.',
        'A recent, intense romance full of reckless promises.',
    ]);

    $history = rg_pick([
        'They met when one saved the other during an ambush on the imperial road.',
        'The couple were born in opposing factions and fled together after a broken pact.',
        'An old winter ball bound them with an oath that was never undone.',
        'Their bond grew while translating a forbidden grimoire together.',
        'They were rivals in lance tournaments until a truce became romance.',
    ]);

    $meetingHook = rg_pick([
        'The heroes are hired to protect the couple\'s first public meeting.',
        'A messenger asks for help delivering secret letters between the lovers.',
        'The couple offers a reward to escape pursuers before dawn.',
        'One of them vanishes the night before their planned reunion.',
        'The party gets caught in the middle of a romantic escape across borders.',
    ]);

    $likes = rg_pick([
        'rare winter flowers, antique jewelry, and hand-copied poetry',
        'handmade blades, dark chocolate, and custom-drawn maps',
        'live music, cedar perfume, and books about lost history',
        'silver charms, spiced wine, and well-written letters',
        'fine fabrics, miniature ships, and travel seals',
    ]);

    $dislikes = rg_pick([
        'overly expensive gifts used for manipulation',
        'taxidermy, hunting trophies, and overly sweet perfumes',
        'public empty promises and items tied to rival families',
        'gifts stolen from temples and desecrated relics',
        'anything that recalls old forced engagements',
    ]);

    $deathScenes = [
        'During the final siege, one sacrifices themselves to close the gate and save the other.',
        'A ritual duel demands blood: the survivor carries the couple\'s ring as an oath.',
        'While stopping a demon summoning, one lover falls into the tower abyss.',
        'A magical illness spreads fast, and there is only enough cure for one person.',
        'During an escape through collapsing tunnels, one stays behind to hold the debris.',
    ];

    $deathChanceByDrama = [
        'low' => '25%',
        'medium' => '50%',
        'high' => '80%',
    ];

    return [
        'title' => 'Romantic Pair: ' . $partnerA['name'] . ' and ' . $partnerB['name'],
        'tone' => rg_romance_label($tone),
        'drama' => rg_romance_label($drama),
        'history' => $history,
        'relationship_stage' => $relationStage,
        'meeting_hook' => $meetingHook,
        'gift_likes' => $likes,
        'gift_dislikes' => $dislikes,
        'possible_death' => rg_pick($deathScenes),
        'death_chance' => $deathChanceByDrama[$drama] ?? '50%',
        'partners' => [$partnerA, $partnerB],
    ];
}
