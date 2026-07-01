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
        'roles' => [
            'Guard Captain', 'Herbalist', 'Innkeeper', 'Treasure Hunter', 'Temple Scribe', 'Mercenary', 'Smuggler', 'Court Mage',
            'Blacksmith', 'Alchemist', 'Tavern Keeper', 'Town Guard', 'Ranger Scout', 'Merchant', 'Caravan Master', 'Street Urchin',
            'Noble Advisor', 'Tax Collector', 'Fisherman', 'Miller', 'Baker', 'Tailor', 'Weaver', 'Carpenter',
            'Stoneworker', 'Bookbinder', 'Scribe', 'Undertaker', 'Gravedigger', 'Apothecary', 'Healer', 'Midwife',
            'Butcher', 'Leather Worker', 'Dyer', 'Potter', 'Metalsmith', 'Jeweler', 'Cartographer', 'Cartwright',
            'Stable Master', 'Groom', 'Farrier', 'Horseman', 'Coachman', 'Teamster', 'Debt Collector', 'Fence',
            'Pick Pocket', 'Locksmith', 'Forger', 'Counterfeiter', 'Spy', 'Assassin', 'Thief', 'Fence Master',
            'Street Performer', 'Musician', 'Dancer', 'Minstrel', 'Storyteller', 'Beggar', 'Vagrant', 'Vagabond',
        ],
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
            'Lars', 'Marta', 'Nikolai', 'Olga', 'Peer', 'Ragnar', 'Sigrid', 'Torsten', 'Ulf', 'Vigga',
            'Wulfric', 'Ylva', 'Zephyr', 'Astrid', 'Bjorn', 'Cinna', 'Dietrich', 'Elsa', 'Fridrik', 'Greta',
            'Harald', 'Ingrid', 'Jotun', 'Kolstad', 'Leif', 'Magnus', 'Norbert', 'Oskar', 'Petra', 'Quentyn',
            'Rune', 'Soren', 'Torsten', 'Ulf', 'Veera', 'Waldemar', 'Xander', 'Ygritte', 'Zarek',
        ],
        'imperial' => [
            'Cassian', 'Doria', 'Lucan', 'Mira', 'Octavian', 'Petra', 'Silvan', 'Talia', 'Valen', 'Rhea',
            'Aurelius', 'Beatrice', 'Castor', 'Desdemona', 'Emilia', 'Fabius', 'Galatea', 'Hadrian', 'Iris', 'Julius',
            'Karina', 'Livia', 'Marcius', 'Nero', 'Ophelia', 'Pallas', 'Quintilian', 'Rosalind', 'Scipio', 'Tertius',
            'Urbanus', 'Vespera', 'Wavin', 'Xenia', 'Yara', 'Zephyra', 'Aeneas', 'Belladonna', 'Cornelius', 'Diana',
            'Eudora', 'Florian', 'Galen', 'Hercules', 'Idonia', 'Justinian', 'Kalista', 'Lucretius', 'Marcella', 'Nathaniel',
        ],
        'desert' => [
            'Azar', 'Bashira', 'Farid', 'Jamal', 'Khalida', 'Nadir', 'Rashida', 'Samir', 'Tariq', 'Zahara',
            'Amal', 'Basma', 'Casim', 'Dalia', 'Ezra', 'Fatima', 'Galib', 'Hana', 'Iman', 'Javid',
            'Karim', 'Layla', 'Mahmoud', 'Nizar', 'Orhan', 'Pasha', 'Qais', 'Rania', 'Saidah', 'Tarek',
            'Usama', 'Vada', 'Walid', 'Yasmin', 'Zainab', 'Adil', 'Burhan', 'Chahine', 'Darshan', 'Emira',
            'Firdaus', 'Gamal', 'Habib', 'Ibrahim', 'Jamila', 'Kaida', 'Leila', 'Malik', 'Nadia', 'Osman',
        ],
        'wild' => [
            'Ash', 'Briar', 'Corin', 'Dove', 'Ember', 'Fen', 'Hollis', 'Lark', 'Moss', 'Rowan',
            'Sage', 'Thorne', 'Violet', 'Willow', 'Yarrow', 'Zephyr', 'Alder', 'Birch', 'Cedar', 'Fir',
            'Hazel', 'Ivy', 'Juniper', 'Kelp', 'Laurel', 'Maple', 'Nettle', 'Oak', 'Pine', 'Raven',
            'Stone', 'Talon', 'Vale', 'Wolf', 'Yew', 'Ash', 'Berry', 'Crow', 'Elm', 'Fawn',
            'Granite', 'Heron', 'Iron', 'Junco', 'Kestrel', 'Linden', 'Moor', 'Newt', 'Oak', 'Poppy',
        ],
    ];

    $suffixes = [
        ' of Blackmarsh', ' the Quiet', ' Ironhand', ' of the Lantern', ' Ravensong', ' Flintvein', ' Stormwalker', ' Briarborn',
        ' the Bold', ' Swiftfoot', ' Deepdwell', ' of the Moor', ' Cloudborne', ' Stoneheart', ' Wildborn', ' the Wise',
        ' Sharpeye', ' Faithkeeper', ' Duskward', ' Dayrunner', ' Shadowstep', ' Brightforge', ' Baneborn', ' Soulkeeper',
        ' the Fearless', ' Speedborn', ' Truthseeker', ' Doomcaller', ' Starborn', ' Fireborn', ' Iceborn', '',
    ];

    $pool = $namePools[$culture] ?? $namePools['imperial'];

    return rg_pick($pool) . rg_pick($suffixes);
}

function rg_generate_npc(array $options = []): array
{
    $minLevel = (int)($options['min_level'] ?? 1);
    $maxLevel = (int)($options['max_level'] ?? 20);

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
        'Constantly fidgets with a worn coin.',
        'Never makes eye contact when lying.',
        'Always smells faintly of smoke and whiskey.',
        'Touches their left ear before making decisions.',
        'Speaks in riddles when nervous.',
        'Never drinks from the same glass twice.',
        'Reads lips during conversations.',
        'Hums an old lullaby when thinking.',
        'Refuses to enter rooms through main doors.',
        'Counts every coin given to them twice.',
        'Writes everything important down immediately.',
        'Never trusts anyone who looks them directly in the eye.',
        'Collects small stones from every town.',
        'Moves with the grace of a dancer.',
    ];

    $goalOptions = [
        'Recover a relic stolen by river bandits.',
        'Find a missing apprentice before moonrise.',
        'Pay off an old blood debt without violence.',
        'Secure a marriage alliance for their family.',
        'Expose corruption in the local watch.',
        'Reach an abandoned observatory in the hills.',
        'Locate their estranged sibling in a distant city.',
        'Break a family curse before the next full moon.',
        'Become acknowledged as the rightful heir.',
        'Gather rare ingredients for a mysterious ritual.',
        'Escape an arranged marriage they did not consent to.',
        'Prove their innocence in a crime they did not commit.',
        'Save enough coin to start a new life elsewhere.',
        'Avenge the death of a beloved mentor.',
        'Retrieve a love letter before it reaches the wrong person.',
        'Learn the true identity of their birth parents.',
        'Stop a plague before it spreads to the next kingdom.',
        'Broker peace between two warring families.',
        'Discover what happened to their lost memories.',
        'Retrieve their family heirloom from a dangerous rival.',
    ];

    $secretOptions = [
        'Is the last heir of a fallen house.',
        'Can read a forbidden script by touch alone.',
        'Works as a double agent for a rival guild.',
        'Has made a pact with an unknown spirit.',
        'Was present on the night of a royal murder.',
        'Carries a counterfeit seal of the crown.',
        'Is secretly a member of an underground resistance.',
        'Has been cursed by a dying enemy to wander.',
        'Once sacrificed an innocent to escape certain death.',
        'Is slowly turning into something not quite human.',
        'Embezzles coin from their employer to feed a secret family.',
        'Murdered someone and made it look like an accident.',
        'Is being blackmailed by someone they once trusted.',
        'Serves as an informant for the city guard in secret.',
        'Has read the forbidden texts and cannot unsee the truth.',
        'Is the bastard child of a famous noble.',
        'Caused the fire that destroyed their childhood home.',
        'Knows the location of a hidden treasure vault.',
        'Has been prophesied to cause great harm or great good.',
        'Once saved the life of someone now considered an enemy.',
    ];

    $quirkOptions = [
        'Collects teeth from defeated monsters.',
        'Always smells faintly of cedar smoke.',
        'Writes every promise on scraps of cloth.',
        'Eats only food cut into perfect squares.',
        'Refuses to cross bridges after sunset.',
        'Hums old battlefield marches while working.',
        'Keeps a jar of preserved eyes from defeated enemies.',
        'Refuses to enter rooms where candles are lit.',
        'Only sleeps sitting upright against walls.',
        'Insists on drinking from their own personal cup.',
        'Collects the last words spoken by dying people.',
        'Carries a doll made of straw and twine everywhere.',
        'Speaks to their own shadow as if it were a person.',
        'Eats insects if offered them, without hesitation.',
        'Never wears the same clothes twice.',
        'Spends hours arranging objects in perfect symmetry.',
        'Whispers apologies to every plant they pass.',
        'Only eats food that is a specific shade of brown.',
        'Refuses to use money, preferring to barter.',
        'Talks to weapons and armor as though they have feelings.',
    ];

    $hookOptions = [
        'Offers coin if the party escorts a wagon through cursed marshland.',
        'Needs discreet help breaking into a noble archive.',
        'Asks the party to identify a shard from a dragon idol.',
        'Wants protection during a tense market negotiation.',
        'Promises rare spell ink in exchange for a favor.',
        'Requests aid investigating a silent village bell tower.',
        'Hires them to retrieve something from a sealed tomb.',
        'Needs someone to deliver a message to an enemy.',
        'Wants to hire them to steal from a wealthy rival.',
        'Asks them to investigate a series of strange disappearances.',
        'Offers shelter and supplies if they agree to a mysterious task.',
        'Requests they spy on someone and report back daily.',
        'Wants them to pose as mercenaries for hire.',
        'Asks them to retrieve a stolen child from kidnappers.',
        'Needs someone to forge documents for them.',
        'Wants them to sabotage a competitor\'s business.',
        'Offers them information in exchange for protection.',
        'Needs them to retrieve a specific book from a library.',
        'Requests their aid in faking their own death.',
        'Wants to hire them as bodyguards for a secret meeting.',
    ];

    $appearanceOptions = [
        'Weather-worn cloak with stitched sigils.',
        'Bronze rings stacked on every finger.',
        'Fine coat patched at elbows with sailcloth.',
        'Ash-grey braids tied with copper thread.',
        'Scar over one eye and ink-stained gloves.',
        'Traveler boots with mirrored buckles.',
        'Tattoos that seem to move in candlelight.',
        'Mismatched eyes, one grey and one amber.',
        'Fingers missing on their left hand.',
        'Elaborate scars forming patterns across their neck.',
        'Ornate jewelry with strange symbols.',
        'Clothes layered in several different styles.',
        'A mask covering half their face.',
        'Hair dyed with unnatural colors.',
        'Bandages wrapped around forearms and wrists.',
        'Luxurious fabrics mixed with ragged patches.',
        'A collection of charms hanging from their belt.',
        'Teeth filed to sharp points.',
        'Eyes that reflect light like a cat\'s.',
        'Ceremonial robes with ceremonial weapons.',
    ];

    $itemOptions = [
        'Broken astrolabe',
        'Silver prayer chain',
        'Lockbox with three keyholes',
        'Vial of phosphorescent moss',
        'Folded war map from a forgotten campaign',
        'Ceramic whistle shaped like a wyvern',
        'A leather-bound journal filled with cipher text.',
        'Dried herbs bundled with silk ribbon.',
        'A pair of spectacles with one lens missing.',
        'A small carved figurine with no obvious purpose.',
        'A locket containing a portrait of an unknown person.',
        'A pouch of coins from a foreign kingdom.',
        'A chess piece made of ivory and obsidian.',
        'A bone flute that plays no melody.',
        'A sealed letter with wax bearing an unfamiliar seal.',
        'A collection of pressed flowers between parchment.',
        'A die that always lands on six.',
        'A small mirror with an ornate silver frame.',
        'A ring of keys to doors that no longer exist.',
        'A stone that hums faintly when held.',
    ];

    $voiceOptions = [
        'low and measured',
        'quick, theatrical, and bright',
        'raspy, with careful pauses',
        'warm and formal',
        'soft but commanding',
        'dry, almost amused',
        'high-pitched and nervous',
        'gravelly and ancient',
        'melodic and soothing',
        'sharp and piercing',
        'slow and deliberate',
        'breathless and urgent',
        'smooth as silk but with an edge',
        'scratchy like untuned strings',
        'musical and lyrical',
        'harsh and grating',
        'whispered and conspiratorial',
        'booming and authoritative',
        'gentle and apologetic',
        'cold and clinical',
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
