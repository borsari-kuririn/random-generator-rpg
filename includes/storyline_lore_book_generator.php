<?php

declare(strict_types=1);

require_once __DIR__ . '/npc_generator.php';

function rg_get_major_book_collections(): array
{
    return [
        'shattered_crown' => [
            'name' => 'Chronicles of the Shattered Crown',
            'max_volume' => 7,
            'storyline_titles' => [
                'The Oath of Ashfall',
                'Siege at Embergate',
                'The Last Banner of Varn',
                'Whispers Beneath Ironhall',
                'The Regent\'s Broken Seal',
                'Night of the Hollow Court',
                'The Throne Reforged',
            ],
            'lore_titles' => [
                'Lineages of the Crowned Houses',
                'The Six War Decrees',
                'Relics of the Ember Regency',
                'The Cartographer\'s Court Atlas',
                'Treatises on Fealty and Oath',
                'The Bell Archive of Varn',
                'Notes on Royal Succession Rituals',
            ],
            'regions' => ['Embergate', 'Old Varn', 'The Crown Marches', 'Ironhall'],
        ],
        'salt_road_codex' => [
            'name' => 'The Salt Road Codex',
            'max_volume' => 6,
            'storyline_titles' => [
                'Caravan of Black Glass',
                'Raiders at White Dune Pass',
                'The Broker of Saffron Gate',
                'A Ledger in Blood and Sand',
                'Moonlight at the Dry Harbor',
                'The Last Toll of the Salt Road',
            ],
            'lore_titles' => [
                'Guide to Caravan Houses',
                'Tariffs and Ancient Tolls',
                'The Dialect Book of Border Markets',
                'Spice Guild Contracts Explained',
                'Beast Routes Across the Red Waste',
                'Songs of the Caravan Bells',
            ],
            'regions' => ['White Dune Pass', 'Dry Harbor', 'Saffron Gate', 'Red Waste'],
        ],
        'veilwood_annals' => [
            'name' => 'Annals of the Veilwood',
            'max_volume' => 8,
            'storyline_titles' => [
                'The Grovefire Covenant',
                'Hunt of the Silver Hart',
                'Rootbound at Thorn Hollow',
                'The Moon Pool Reckoning',
                'Nightpaths of Hollow Briar',
                'The Last Keeper of Mossgate',
                'Thorns in the Winter Court',
                'The Green Oath Restored',
            ],
            'lore_titles' => [
                'Herbal Almanac of Veilwood',
                'The Old Tongue of Bark-Scribes',
                'Ceremonies of the Moon Pool',
                'Beast Trails and Safe Marks',
                'Woodwarden Laws and Penalties',
                'The Great Seed Chronicle',
                'Treatise on Spirit Groves',
                'The Emberleaf Calendar',
            ],
            'regions' => ['Veilwood', 'Thorn Hollow', 'Mossgate', 'Moon Pool'],
        ],
        'deepforge_ledger' => [
            'name' => 'Deepforge Foundry Ledger',
            'max_volume' => 5,
            'storyline_titles' => [
                'Fire Beneath Blackstone',
                'The Hammer Council Revolt',
                'Ashfall in the Smelter Ward',
                'The Rivet Oath Conspiracy',
                'Vault of the Final Ingot',
            ],
            'lore_titles' => [
                'Metals and Their Tempers',
                'Foundry Marks and Master Seals',
                'Tunnel Maps of Deepforge',
                'Clockwork Principles for Apprentices',
                'The Guild Courts of Blackstone',
            ],
            'regions' => ['Deepforge', 'Blackstone Ward', 'Smelter Ward', 'Rivet Quarter'],
        ],
        'starfall_memoria' => [
            'name' => 'Starfall Memoria',
            'max_volume' => 6,
            'storyline_titles' => [
                'The Night Sky Trial',
                'Vaultbreak at Dawnspire',
                'Echoes of the Fallen Star',
                'The Astronomer\'s Debt',
                'When Comets Cross the Vale',
                'The Seventh Observation',
            ],
            'lore_titles' => [
                'Chart of the Wandering Lights',
                'Ritual Astronomy of Dawnspire',
                'Bestiary of Sky-Bound Omens',
                'The Observatory Rulebook',
                'Meteoric Metals and Uses',
                'Glossary of Celestial Houses',
            ],
            'regions' => ['Dawnspire', 'North Vale', 'Mirror Ridge', 'The Glass Plateau'],
        ],
    ];
}

function rg_get_storyline_lore_book_options(): array
{
    $collections = rg_get_major_book_collections();
    $collectionOptions = [];

    foreach ($collections as $key => $collection) {
        $collectionOptions[$key] = (string)$collection['name'];
    }

    return [
        'focuses' => ['storyline', 'lore'],
        'collections' => $collectionOptions,
    ];
}

function rg_book_focus_label(string $focus): string
{
    return $focus === 'storyline' ? 'Storyline' : 'Lore';
}

function rg_generate_storyline_lore_book(array $options = []): array
{
    $allCollections = rg_get_major_book_collections();
    $collectionKeys = array_keys($allCollections);
    $bookOptions = rg_get_storyline_lore_book_options();

    $selectedFocus = isset($options['focus']) && is_string($options['focus'])
        ? rg_filter_value(trim($options['focus']), $bookOptions['focuses'])
        : null;
    $selectedCollection = isset($options['collection']) && is_string($options['collection'])
        ? rg_filter_value(trim($options['collection']), $collectionKeys)
        : null;

    $focus = $selectedFocus ?? rg_pick($bookOptions['focuses']);
    $collectionKey = $selectedCollection ?? rg_pick($collectionKeys);
    $collection = $allCollections[$collectionKey];

    $titlePool = $focus === 'storyline'
        ? $collection['storyline_titles']
        : $collection['lore_titles'];

    $volume = random_int(1, (int)$collection['max_volume']);
    $title = rg_pick($titlePool);
    $region = rg_pick($collection['regions']);

    $synopsisStarter = $focus === 'storyline'
        ? [
            'Follows a pivotal conflict tied to',
            'Details a dramatic turning point around',
            'Chronicles a dangerous expedition through',
            'Records a betrayal that reshaped',
        ]
        : [
            'Compiles historical records from',
            'Explains old customs and legal rites of',
            'Catalogs oral traditions preserved in',
            'Summarizes disputed academic findings from',
        ];

    $campaignHookStarter = $focus === 'storyline'
        ? [
            'A rival faction is willing to pay in silver for this volume.',
            'An NPC claims this chapter names a living traitor.',
            'The final pages reference a hidden vault key.',
            'A monastery copyist believes one paragraph is forged.',
        ]
        : [
            'A local scholar can decode a map hidden in the margins.',
            'Merchants seek this text to prove a disputed trade claim.',
            'A noble library lists this as a missing restricted volume.',
            'The glossary contains a cipher used by an old guild.',
        ];

    $nextLeadStarter = $focus === 'storyline'
        ? [
            'The next volume was last seen in',
            'A surviving witness points toward',
            'A smuggler ledger ties the sequel to',
            'A half-burned bookmark mentions',
        ]
        : [
            'A scribe note suggests companion notes remain in',
            'A citation references a restricted archive in',
            'An index card points collectors toward',
            'A seal impression matches holdings in',
        ];

    $collectorGoal = 'Collection progress: Volume ' . $volume . ' of ' . $collection['max_volume']
        . '. Recovering all volumes from "' . $collection['name'] . '" grants a complete campaign dossier.';

    return [
        'collection_key' => $collectionKey,
        'collection_name' => (string)$collection['name'],
        'focus' => $focus,
        'focus_label' => rg_book_focus_label($focus),
        'volume' => $volume,
        'max_volume' => (int)$collection['max_volume'],
        'volume_label' => 'Volume ' . $volume . ' of ' . $collection['max_volume'],
        'title' => $title,
        'subtitle' => rg_pick($synopsisStarter) . ' ' . $region . '.',
        'synopsis' => rg_pick($synopsisStarter) . ' ' . $region . ', with clues linked to faction politics and hidden oaths.',
        'campaign_hook' => rg_pick($campaignHookStarter),
        'collector_goal' => $collectorGoal,
        'related_lead' => rg_pick($nextLeadStarter) . ' ' . $region . '.',
    ];
}
