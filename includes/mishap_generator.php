<?php

declare(strict_types=1);

function rg_mishap_expand_d66_values(string $diceRange): array
{
    if (strpos($diceRange, '-') === false) {
        $single = (int)$diceRange;
        return $single > 0 ? [$single] : [];
    }

    [$start, $end] = explode('-', $diceRange, 2);
    $startValue = (int)trim($start);
    $endValue = (int)trim($end);

    if ($startValue <= 0 || $endValue <= 0 || $endValue < $startValue) {
        return [];
    }

    return range($startValue, $endValue);
}

function rg_get_magic_mishaps(): array
{
    $rows = [
        ['dice' => '11-13', 'result' => 'Witnessed Magic', 'effect' => 'Someone sees your spellcasting and spreads the tale. Increase Reputation by one step.', 'severity' => 'Low'],
        ['dice' => '14-15', 'result' => 'Arcane Hunger', 'effect' => 'Your magic leaves you intensely hungry.', 'severity' => 'Low'],
        ['dice' => '16-21', 'result' => 'Arcane Thirst', 'effect' => 'The spell leaves you painfully thirsty.', 'severity' => 'Low'],
        ['dice' => '22-23', 'result' => 'Sleepless Surge', 'effect' => 'You cannot sleep for D6 days and become increasingly fatigued.', 'severity' => 'Moderate'],
        ['dice' => '24-25', 'result' => 'Drained Agility', 'effect' => 'The spell drains your body. Suffer 1 point of damage to Agility.', 'severity' => 'Moderate'],
        ['dice' => '26-31', 'result' => 'Strained Strength', 'effect' => 'The magic hurts your body. Suffer 1 point of damage to Strength.', 'severity' => 'Moderate'],
        ['dice' => '32-33', 'result' => 'Crushing Ego', 'effect' => 'Power rushes to your head. Suffer 1 point of damage to Empathy.', 'severity' => 'Moderate'],
        ['dice' => '34-35', 'result' => 'Demonic Visions', 'effect' => 'You suffer terrible visions. Take 1 point of damage to Wits.', 'severity' => 'Moderate'],
        ['dice' => '36-41', 'result' => 'Magical Infection', 'effect' => 'A spellborne disease erupts with Virulence 2D6, exposing you and everyone within arm\'s length for a Quarter Day.', 'severity' => 'High'],
        ['dice' => '42-45', 'result' => 'Collateral Target', 'effect' => 'Your spell also affects an unintended nearby target.', 'severity' => 'High'],
        ['dice' => '46', 'result' => 'Twisted Appearance', 'effect' => 'Your appearance changes permanently in a dramatic way.', 'severity' => 'High'],
        ['dice' => '51', 'result' => 'Sudden Blindness', 'effect' => 'You are effectively blind, as if in total darkness, for the next full day.', 'severity' => 'High'],
        ['dice' => '52-55', 'result' => 'Mind Ravaged', 'effect' => 'Your mind is torn apart. Roll immediately for a critical injury (mental trauma).', 'severity' => 'Severe'],
        ['dice' => '56', 'result' => 'Bonebreaker Pulse', 'effect' => 'Arcane force shatters your bones. Roll immediately for a critical injury (blunt force).', 'severity' => 'Severe'],
        ['dice' => '61', 'result' => 'Demon Attention', 'effect' => 'Your magic attracts a demon from another dimension. It manifests within a Quarter Day.', 'severity' => 'Severe'],
        ['dice' => '62-65', 'result' => 'Spell Backfire', 'effect' => 'The spell turns against you or causes a catastrophic inversion of its intended effect.', 'severity' => 'Severe'],
        ['dice' => '66', 'result' => 'Rift Claim', 'effect' => 'A dimensional rift opens and drags you away. Your current character is effectively lost for now.', 'severity' => 'Catastrophic'],
    ];

    return array_map(function (array $row): array {
        $row['values'] = rg_mishap_expand_d66_values($row['dice']);
        return $row;
    }, $rows);
}

function rg_get_leading_the_way_mishaps(): array
{
    $rows = [
        ['dice' => '11-12', 'result' => 'Quicksand', 'effect' => 'The ground gives way under your feet. You have walked into an area of quicksand. You are completely stuck, and you must roll MIGHT to escape. If you fail, you suffer 1 point of damage to Agility and must roll again. Whoever pulls free can help anyone who is still stuck. You also need to go around the treacherous area and won\'t make any progress on the map during this Quarter Day.', 'severity' => 'Moderate'],
        ['dice' => '13-21', 'result' => 'Blocked Terrain', 'effect' => 'The way forward is blocked by rocks, fallen trees, thick shrubbery, or flooding (depending on the terrain type in the hex). You must roll MIGHT or MOVE to be able to move forward. If you fail, you suffer 1 point of damage to Strength and must roll again. Anyone who rolls successfully can help anyone who did not. You won\'t make any progress on the map during this Quarter Day.', 'severity' => 'Moderate'],
        ['dice' => '22-26', 'result' => 'Lost', 'effect' => 'You realize that you have walked in a circle. You are lost and won\'t make any progress on the map during this Quarter Day. Your pathfinder must also roll SURVIVAL successfully to find her way out of the hexagon. One roll can be made per Quarter Day.', 'severity' => 'High'],
        ['dice' => '31-32', 'result' => 'Sprained Ankle', 'effect' => 'Your pathfinder falls or twists her ankle and suffers a critical injury, equivalent to result 25-26 in the table for blunt trauma on page 197.', 'severity' => 'High'],
        ['dice' => '33-34', 'result' => 'Torn Clothes', 'effect' => 'Your clothes are damaged. Your boots break or your robe rips on thorny plants or sharp rocks. You must roll for the effects of cold. Your clothes can be mended by making a successful CRAFTING roll.', 'severity' => 'Low'],
        ['dice' => '35-36', 'result' => 'Landslide', 'effect' => 'You are walking in rough terrain when the ground suddenly opens beneath your feet. You must roll MOVE - if you fail, you suffer an attack with four Base Dice and Weapon Damage 1 (blunt trauma).', 'severity' => 'High'],
        ['dice' => '41-45', 'result' => 'Downpour', 'effect' => 'A massive rainfall or snow storm (depending on the time of year) catches you unawares. You must roll for the effects of cold (page 111). You must also seek shelter until the storm has passed and won\'t make any progress on the map during this Quarter Day.', 'severity' => 'Moderate'],
        ['dice' => '46-52', 'result' => 'Fog', 'effect' => 'You are caught unawares by a thick fog. The distance you cover this Quarter Day is decreased by one hex. In difficult terrain, you\'re stuck in the hex you started in. In addition, each adventurer suffers 1 point of damage to Empathy from the gloomy mist.', 'severity' => 'Moderate'],
        ['dice' => '53-54', 'result' => 'Wasps\' Nest', 'effect' => 'You step right into a nest of wasps. An angry swarm attack the entire group. Each adventurer must make a MOVE roll or suffer an attack with four Base Dice, causing damage to Agility.', 'severity' => 'Moderate'],
        ['dice' => '55-61', 'result' => 'Mosquito Swarm', 'effect' => 'A large swarm of mosquitos or gnats attacks you, driving you crazy with their bites and buzzing. They attack with four Base Dice, causing damage to Empathy.', 'severity' => 'Low'],
        ['dice' => '62-64', 'result' => 'Savage Animal', 'effect' => 'A wolf, bear or other wild animal feels threatened, and attacks you. The GM chooses an animal from the table on page 124 of the Gamemaster\'s Guide.', 'severity' => 'High'],
        ['dice' => '65-66', 'result' => 'Persistent Animal', 'effect' => 'A squirrel, bird or other small animal follows you around and doesn\'t leave you alone. The animal causes trouble, described by the GM - it might make a noise at some inappropriate time, eat your food or steal something.', 'severity' => 'Low'],
    ];

    return array_map(function (array $row): array {
        $row['values'] = rg_mishap_expand_d66_values($row['dice']);
        return $row;
    }, $rows);
}

function rg_get_foraging_mishaps(): array
{
    $rows = [
        ['dice' => '11-13', 'result' => 'Poisonous Gather', 'effect' => 'You gather 1 unit of edible-looking plants, but they are toxic. The poison is discovered at the next meal and has Potency 3.', 'severity' => 'Moderate'],
        ['dice' => '14-16', 'result' => 'Bitter Root Mix-Up', 'effect' => 'You mistake dangerous roots for useful herbs. The meal tastes wrong, and each eater must resist a mild toxin (Potency 2).', 'severity' => 'Low'],
        ['dice' => '21-23', 'result' => 'Leeches', 'effect' => 'Leeches cling to your legs and arms. Suffer 1 Strength damage. A successful HEALING roll removes them safely.', 'severity' => 'Moderate'],
        ['dice' => '24-26', 'result' => 'Thorn Burrow', 'effect' => 'You push through dense thorn growth and get embedded splinters. Suffer 1 Agility damage unless a companion treats you quickly.', 'severity' => 'Moderate'],
        ['dice' => '31-33', 'result' => 'Sprained Ankle', 'effect' => 'You slip on wet ground and twist your ankle. Suffer a critical injury equivalent to result 25-26 in the blunt trauma table.', 'severity' => 'High'],
        ['dice' => '34-36', 'result' => 'Wrenched Knee', 'effect' => 'You step into a hidden hole while foraging. Suffer 1 Agility damage and move at reduced pace for the rest of the Quarter Day.', 'severity' => 'Moderate'],
        ['dice' => '41-43', 'result' => 'Torn Clothes', 'effect' => 'Your clothes are ripped by branches or rock edges. Roll for cold effects until repaired with a successful CRAFTING roll.', 'severity' => 'Low'],
        ['dice' => '44-46', 'result' => 'Ruined Satchel', 'effect' => 'Your foraging bag tears open. Lose the unit you just collected unless someone succeeds on a quick CRAFTING roll to salvage it.', 'severity' => 'Low'],
        ['dice' => '51-53', 'result' => 'Savage Animal', 'effect' => 'A wild predator feels cornered and attacks. The GM chooses an appropriate beast for the terrain.', 'severity' => 'High'],
        ['dice' => '54-56', 'result' => 'Territorial Beast', 'effect' => 'You disturb a den or nest. A protective animal charges and drives you off before you can finish foraging.', 'severity' => 'Moderate'],
        ['dice' => '61-63', 'result' => 'Persistent Animal', 'effect' => 'A small animal follows you, creating noise and unwanted attention. It may interfere with stealthy travel or camp routines.', 'severity' => 'Low'],
        ['dice' => '64-66', 'result' => 'Food Thief', 'effect' => 'A quick critter steals or spoils part of your rations while you forage. Lose 1 ration unless you catch it with a successful MOVE roll.', 'severity' => 'Low'],
    ];

    return array_map(function (array $row): array {
        $row['values'] = rg_mishap_expand_d66_values($row['dice']);
        return $row;
    }, $rows);
}

function rg_get_hunting_mishaps(): array
{
    $rows = [
        ['dice' => '11-13', 'result' => 'Sprained Ankle', 'effect' => 'You fall or twist your ankle and suffer a critical injury equivalent to result 25-26 in the table for blunt trauma on page 197.', 'severity' => 'High'],
        ['dice' => '14-16', 'result' => 'Twisted Knee', 'effect' => 'You lunge after tracks and your knee buckles. Suffer 1 Agility damage and reduce pace for the rest of the Quarter Day.', 'severity' => 'Moderate'],
        ['dice' => '21-23', 'result' => 'Lost Gear', 'effect' => 'You lose a piece of hunting gear or a weapon. The GM decides what is missing.', 'severity' => 'Moderate'],
        ['dice' => '24-26', 'result' => 'Broken Bowstring', 'effect' => 'Your bowstring snaps or your sling strap tears. Your ranged weapon cannot be used until repaired with CRAFTING.', 'severity' => 'Moderate'],
        ['dice' => '31-33', 'result' => 'Torn Clothes', 'effect' => 'Your clothes are damaged on thorny brush or sharp rocks. Roll for cold effects until mended with a successful CRAFTING roll.', 'severity' => 'Low'],
        ['dice' => '34-36', 'result' => 'Ripped Boots', 'effect' => 'Your boots split on hard terrain. You suffer discomfort and risk cold effects until repaired.', 'severity' => 'Low'],
        ['dice' => '41-43', 'result' => 'Trap', 'effect' => 'You stumble into another hunter\'s trap. You suffer 1 Strength damage and must make a MOVE roll to get free.', 'severity' => 'Moderate'],
        ['dice' => '44-46', 'result' => 'Snare Line', 'effect' => 'A hidden snare catches your leg and yanks you down. Suffer 1 Agility damage and lose time freeing yourself.', 'severity' => 'Moderate'],
        ['dice' => '51-53', 'result' => 'Savage Animal', 'effect' => 'A wolf, bear or other wild animal feels threatened and attacks you. The GM chooses an animal from the table on page 124 of the Gamemaster\'s Guide.', 'severity' => 'High'],
        ['dice' => '54-56', 'result' => 'Wounded Predator', 'effect' => 'A wounded predator lashes out in panic. It attacks fiercely before trying to flee.', 'severity' => 'High'],
        ['dice' => '61-63', 'result' => 'Sick Prey', 'effect' => 'You bring down prey that carries disease. Anyone who eats it risks infection with a disease of Virulence 3.', 'severity' => 'High'],
        ['dice' => '64-66', 'result' => 'Spoiled Carcass', 'effect' => 'The animal\'s meat turns out tainted or rotten. The hunt yields no usable rations this Quarter Day.', 'severity' => 'Moderate'],
    ];

    return array_map(function (array $row): array {
        $row['values'] = rg_mishap_expand_d66_values($row['dice']);
        return $row;
    }, $rows);
}

function rg_get_fishing_mishaps(): array
{
    $rows = [
        ['dice' => '11-13', 'result' => 'Snagged Hook/Net', 'effect' => 'Your hook or net snags on the bottom. Make a MIGHT roll to free your fishing gear. If you fail, it is lost.', 'severity' => 'Moderate'],
        ['dice' => '14-16', 'result' => 'Tangled Line', 'effect' => 'Your lines knot into a useless mess. You lose time and must fix the gear with a successful CRAFTING roll.', 'severity' => 'Low'],
        ['dice' => '21-23', 'result' => 'Hook in Finger', 'effect' => 'You pierce your own hand while casting. Suffer 1 Strength damage.', 'severity' => 'Moderate'],
        ['dice' => '24-26', 'result' => 'Deep Hook Wound', 'effect' => 'A barbed hook tears through flesh. Suffer 1 Strength damage and stop fishing until someone succeeds on HEALING.', 'severity' => 'Moderate'],
        ['dice' => '31-33', 'result' => 'Broken Fishing Gear', 'effect' => 'Your fishing gear breaks. You must repair it with CRAFTING or replace it before fishing again.', 'severity' => 'Moderate'],
        ['dice' => '34-36', 'result' => 'Cracked Rod', 'effect' => 'Your rod cracks under tension. It works poorly and breaks completely on the next failed fishing roll.', 'severity' => 'Low'],
        ['dice' => '41-43', 'result' => 'Mosquito Swarm', 'effect' => 'A large swarm of mosquitos or gnats attacks you, causing damage to Empathy with four Base Dice.', 'severity' => 'Low'],
        ['dice' => '44-46', 'result' => 'Biting Flies', 'effect' => 'Aggressive flies and midges overwhelm your camp by the water. Suffer 1 Empathy damage and lose focus.', 'severity' => 'Low'],
        ['dice' => '51-53', 'result' => 'Splash!', 'effect' => 'You lose your balance and fall into the water. Use normal rules for swimming and drowning.', 'severity' => 'High'],
        ['dice' => '54-56', 'result' => 'Swept Away', 'effect' => 'A sudden current drags you from shallow footing. Make an immediate MOVE roll or be carried downstream.', 'severity' => 'High'],
        ['dice' => '61-63', 'result' => 'Attacked', 'effect' => 'A vicious fish or eel attacks you, inflicting a nasty wound. Suffer 1 Strength damage.', 'severity' => 'Moderate'],
        ['dice' => '64-66', 'result' => 'Water Predator', 'effect' => 'A larger water predator is drawn by blood and thrashing. The GM introduces a dangerous encounter near the shore.', 'severity' => 'High'],
    ];

    return array_map(function (array $row): array {
        $row['values'] = rg_mishap_expand_d66_values($row['dice']);
        return $row;
    }, $rows);
}

function rg_get_make_camp_mishaps(): array
{
    $rows = [
        ['dice' => '11-13', 'result' => 'Spoiled Water', 'effect' => 'The water you are carrying has spoiled. Everyone in the group must reduce their Resource Die for water by one step.', 'severity' => 'Moderate'],
        ['dice' => '14-16', 'result' => 'Rotten Food', 'effect' => 'Your food has rotted or been infected by insects. Everyone in the group must reduce their Resource Die for food by one step.', 'severity' => 'Moderate'],
        ['dice' => '21-25', 'result' => 'Bad Campsite', 'effect' => 'Your campsite turns out to be very uncomfortable to sleep in. No one in the group gets any SLEEP at all until you have found a new campsite.', 'severity' => 'High'],
        ['dice' => '26-32', 'result' => 'Downpour', 'effect' => 'A massive rainfall starts in the middle of the night. The camp is flooded and everything gets soaking wet. All adventurers must roll for the effects of cold, and no one gets any SLEEP this night.', 'severity' => 'High'],
        ['dice' => '33-36', 'result' => 'Fire Dies', 'effect' => 'The firewood is wet, and your campfire goes out. Everyone in the group must roll for the effects of cold.', 'severity' => 'Moderate'],
        ['dice' => '41-42', 'result' => 'Fire!', 'effect' => 'Suddenly, the flames from your campfire spread out of control. Your tents, sleeping furs and other gear catch fire. Each adventurer suffers an attack with five Base Dice (Weapon Damage 1). Each adventurer must also make a MOVE roll to save their gear. Failure means that one piece of equipment (the GM decides which) is lost in the fire.', 'severity' => 'Severe'],
        ['dice' => '43-45', 'result' => 'Ants', 'effect' => 'Your camp sits right in the middle of an ant road. You all suffer 1 point of damage to Agility and no one gets any SLEEP here.', 'severity' => 'Moderate'],
        ['dice' => '46-51', 'result' => 'Lice', 'effect' => 'A randomly selected adventurer has caught lice. It itches horribly, and the victim gets a rash all over the body. The victim suffers 1 point of damage to Agility each day and cannot SLEEP. A successful HEALING roll stops the effect.', 'severity' => 'High'],
        ['dice' => '52-54', 'result' => 'Mosquito Swarm', 'effect' => 'A large swarm of mosquitoes or gnats attacks the camp, driving everyone crazy with their bites and buzzing. They attack all adventurers with four Base Dice, causing damage to Empathy.', 'severity' => 'Moderate'],
        ['dice' => '55-56', 'result' => 'Savage Animal', 'effect' => 'A wolf, bear or other wild animal feels threatened, and attacks you. The GM chooses an animal from the table on page 124 of the Gamemaster\'s Guide.', 'severity' => 'High'],
        ['dice' => '61-63', 'result' => 'Lost Gear', 'effect' => 'A randomly selected adventurer has lost a piece of gear. The GM decides what was lost, and if it can be found.', 'severity' => 'Moderate'],
        ['dice' => '64-66', 'result' => 'Broken Gear', 'effect' => 'An item belonging to a randomly selected adventurer is broken. The GM decides what item it is. The item can be repaired with a CRAFTING roll.', 'severity' => 'Moderate'],
    ];

    return array_map(function (array $row): array {
        $row['values'] = rg_mishap_expand_d66_values($row['dice']);
        return $row;
    }, $rows);
}

function rg_get_sea_travel_mishaps(): array
{
    $rows = [
        ['dice' => '11-16', 'result' => 'Navigational Error', 'effect' => 'You sail off course and make no progress on the map during this Quarter Day.', 'severity' => 'Moderate'],
        ['dice' => '21-26', 'result' => 'Sudden Squall', 'effect' => 'A sudden squall makes your boat tilt suddenly. One important item falls into the water. The GM decides what it is.', 'severity' => 'Moderate'],
        ['dice' => '31-36', 'result' => 'Whirlpool', 'effect' => 'Your boat is caught in a whirlpool. The skipper must make a SURVIVAL roll (modified by the SAILOR talent). Failure means the boat runs aground and has to be repaired (a CRAFTING roll) before your journey can continue.', 'severity' => 'Severe'],
        ['dice' => '41-46', 'result' => 'Leak', 'effect' => 'Your boat springs a leak and takes on water. The leak must be repaired (a CRAFTING roll), which takes one turn (15 minutes), but your journey can continue while you do so. If the leak is not repaired, the boat sinks after D6 hours.', 'severity' => 'High'],
        ['dice' => '51-56', 'result' => 'Overboard', 'effect' => 'Someone in the group (GM\'s choice) falls overboard after a large wave hits the boat. See rules for swimming and drowning on page 113.', 'severity' => 'Severe'],
        ['dice' => '61-66', 'result' => 'Grounding', 'effect' => 'Your boat runs aground and must be abandoned or repaired with a CRAFTING roll. The boat must be on the shore to be repaired.', 'severity' => 'Severe'],
    ];

    return array_map(function (array $row): array {
        $row['values'] = rg_mishap_expand_d66_values($row['dice']);
        return $row;
    }, $rows);
}

function rg_get_mishap_tables(): array
{
    return [
        'magic' => [
            'label' => 'Magic Mishaps',
            'rows' => rg_get_magic_mishaps(),
        ],
        'leading_the_way' => [
            'label' => 'Leading the Way Mishaps',
            'rows' => rg_get_leading_the_way_mishaps(),
        ],
        'foraging' => [
            'label' => 'Foraging Mishaps',
            'rows' => rg_get_foraging_mishaps(),
        ],
        'hunting' => [
            'label' => 'Hunting Mishaps',
            'rows' => rg_get_hunting_mishaps(),
        ],
        'fishing' => [
            'label' => 'Fishing Mishaps',
            'rows' => rg_get_fishing_mishaps(),
        ],
        'make_camp' => [
            'label' => 'Make Camp Mishaps',
            'rows' => rg_get_make_camp_mishaps(),
        ],
        'sea_travel' => [
            'label' => 'Sea Travel Mishaps',
            'rows' => rg_get_sea_travel_mishaps(),
        ],
    ];
}

function rg_get_mishap_options(): array
{
    $tables = rg_get_mishap_tables();

    $tableOptions = [];
    foreach ($tables as $tableKey => $tableData) {
        $tableOptions[$tableKey] = (string)($tableData['label'] ?? $tableKey);
    }

    return [
        'tables' => $tableOptions,
    ];
}

function rg_find_mishap_entry(string $table, int $diceValue): ?array
{
    $tables = rg_get_mishap_tables();
    if (!isset($tables[$table])) {
        return null;
    }

    foreach ($tables[$table]['rows'] as $row) {
        if (in_array($diceValue, $row['values'], true)) {
            return $row;
        }
    }

    return null;
}

function rg_generate_mishap(array $options = []): array
{
    $table = isset($options['table']) && is_string($options['table']) ? strtolower(trim($options['table'])) : 'magic';
    $tables = rg_get_mishap_tables();
    if (!isset($tables[$table])) {
        $table = 'magic';
    }

    $dice1 = isset($options['dice1']) ? (int)$options['dice1'] : random_int(1, 6);
    $dice2 = isset($options['dice2']) ? (int)$options['dice2'] : random_int(1, 6);

    if ($dice1 < 1 || $dice1 > 6 || $dice2 < 1 || $dice2 > 6) {
        throw new InvalidArgumentException('dice1 and dice2 must be between 1 and 6.');
    }

    $diceValue = ($dice1 * 10) + $dice2;
    $entry = rg_find_mishap_entry($table, $diceValue);

    if ($entry === null) {
        throw new RuntimeException('No mishap entry found for this D66 roll.');
    }

    return [
        'table' => $table,
        'table_label' => (string)$tables[$table]['label'],
        'dice1' => $dice1,
        'dice2' => $dice2,
        'dice_roll' => $diceValue,
        'entry' => $entry,
    ];
}

function rg_generate_magic_mishap(array $options = []): array
{
    $options['table'] = 'magic';
    return rg_generate_mishap($options);
}
