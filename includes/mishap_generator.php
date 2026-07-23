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

function rg_get_performance_mishaps(): array
{
    $rows = [
        ['dice' => '11-13', 'result' => 'Nervous Opening', 'effect' => 'Your first notes are shaky and the crowd notices. The scene starts poorly, and any recovery attempt from this performance is spoiled.', 'severity' => 'Low'],
        ['dice' => '14-16', 'result' => 'Forgotten Words', 'effect' => 'You forget lyrics, cues, or lines. The performance stalls as you scramble to recover your place.', 'severity' => 'Low'],
        ['dice' => '21-23', 'result' => 'Hoarse Voice', 'effect' => 'Your throat gives out or your breath runs short. Suffer 1 point of damage to Empathy.', 'severity' => 'Moderate'],
        ['dice' => '24-26', 'result' => 'Broken Prop', 'effect' => 'A string snaps, a drum tears, or a costume piece fails. The act cannot continue until you repair or replace the prop.', 'severity' => 'Low'],
        ['dice' => '31-33', 'result' => 'Misread Audience', 'effect' => 'You read the room wrong and play the wrong mood. The audience grows cold, and their attitude drops one step.', 'severity' => 'Moderate'],
        ['dice' => '34-36', 'result' => 'Offensive Verse', 'effect' => 'You sing or play something taboo, insulting, or politically dangerous. Someone in the crowd takes offense and may confront you.', 'severity' => 'High'],
        ['dice' => '41-43', 'result' => 'Stage Fright', 'effect' => 'Panic hits mid-performance. Suffer 1 point of damage to Empathy and lose your nerve before the next scene.', 'severity' => 'Moderate'],
        ['dice' => '44-46', 'result' => 'Rival Interruption', 'effect' => 'A rival performer, heckler, or loud patron cuts in and steals the spotlight. You lose control of the moment and the performance ends early.', 'severity' => 'Moderate'],
        ['dice' => '51-53', 'result' => 'Thrown Objects', 'effect' => 'The crowd turns hostile and throws bottles, fruit, or worse. Suffer an attack with four Base Dice, causing damage to Empathy.', 'severity' => 'High'],
        ['dice' => '54-56', 'result' => 'False Blasphemy', 'effect' => 'Your song is mistaken for mockery or sacrilege. Guards, zealots, or angry villagers demand answers or force you out.', 'severity' => 'High'],
        ['dice' => '61-63', 'result' => 'Crushing Crowd', 'effect' => 'The audience surges forward, trampling props and jostling you hard. Suffer 1 point of damage to Strength or Agility, GM\'s choice.', 'severity' => 'Severe'],
        ['dice' => '64-66', 'result' => 'Riot Spark', 'effect' => 'Your performance ignites panic or violence in the crowd. A riot or brawl breaks out, and you are caught in the center of it.', 'severity' => 'Catastrophic'],
    ];

    return array_map(function (array $row): array {
        $row['values'] = rg_mishap_expand_d66_values($row['dice']);
        return $row;
    }, $rows);
}

function rg_get_animal_handling_mishaps(): array
{
    $rows = [
        ['dice' => '11-13', 'result' => 'Skittish Start', 'effect' => 'The animal bolts or refuses to settle. The attempt begins badly, and the creature will not cooperate until the situation changes.', 'severity' => 'Low'],
        ['dice' => '14-16', 'result' => 'Startled Beast', 'effect' => 'You move too fast or speak at the wrong moment. The animal panics and the attempt must be made again later.', 'severity' => 'Low'],
        ['dice' => '21-23', 'result' => 'Bite or Claw', 'effect' => 'The animal lashes out in fear. Suffer 1 point of damage to Empathy or Agility, GM\'s choice.', 'severity' => 'Moderate'],
        ['dice' => '24-26', 'result' => 'Broken Lead', 'effect' => 'A lead, rope, or rein snaps. The animal breaks free and must be caught again before you can continue.', 'severity' => 'Moderate'],
        ['dice' => '31-33', 'result' => 'Wrong Signal', 'effect' => 'You misread the animal\'s behavior and push too hard. The attempt fails, and the animal becomes more difficult to calm.', 'severity' => 'Moderate'],
        ['dice' => '34-36', 'result' => 'Exhausted Mount', 'effect' => 'You push the mount too far and tire it out. The animal is exhausted and cannot be ridden or trained further until it rests.', 'severity' => 'High'],
        ['dice' => '41-43', 'result' => 'Unwanted Attention', 'effect' => 'Your efforts draw the notice of nearby predators or people. A hostile or curious presence approaches the scene.', 'severity' => 'Moderate'],
        ['dice' => '44-46', 'result' => 'Mud and Panic', 'effect' => 'The animal thrashes into mud, brush, or equipment and throws the whole attempt into chaos. You lose time and must start over later.', 'severity' => 'Moderate'],
        ['dice' => '51-53', 'result' => 'Escape Attempt', 'effect' => 'The animal slips its bonds and runs. You must recover it before the work can continue.', 'severity' => 'High'],
        ['dice' => '54-56', 'result' => 'Dangerous Kick', 'effect' => 'A mount or large beast lashes out hard. Suffer an attack with four Base Dice, causing damage to Agility or Strength.', 'severity' => 'High'],
        ['dice' => '61-63', 'result' => 'Training Setback', 'effect' => 'The animal remembers the stress of the encounter and resists you afterward. Any future attempt to handle it becomes harder until it is calmed or rested.', 'severity' => 'Severe'],
        ['dice' => '64-66', 'result' => 'Fatal Fright', 'effect' => 'The animal bolts into danger, wrecks gear, or injures someone nearby before you can stop it. The situation spirals into a severe mishap.', 'severity' => 'Catastrophic'],
    ];

    return array_map(function (array $row): array {
        $row['values'] = rg_mishap_expand_d66_values($row['dice']);
        return $row;
    }, $rows);
}

function rg_get_healing_mishaps(): array
{
    $rows = [
        ['dice' => '11-13', 'result' => 'Clumsy Bandage', 'effect' => 'Your first aid is awkward and ineffective. The patient gains no immediate benefit from your treatment.', 'severity' => 'Low'],
        ['dice' => '14-16', 'result' => 'Poorly Cleaned Wound', 'effect' => 'You fail to clean the injury properly. The wound remains vulnerable, and infection risk increases at the GM\'s discretion.', 'severity' => 'Moderate'],
        ['dice' => '21-23', 'result' => 'Panic at Blood', 'effect' => 'The sight of the injury shakes you. Suffer 1 point of damage to Empathy, and the treatment stalls.', 'severity' => 'Moderate'],
        ['dice' => '24-26', 'result' => 'Worsened Pain', 'effect' => 'You touch a sensitive injury the wrong way. The patient suffers additional pain and may refuse further treatment for a while.', 'severity' => 'Moderate'],
        ['dice' => '31-33', 'result' => 'Wrong Remedy', 'effect' => 'You use the wrong herbs, splints, or method. The recovery attempt fails, and the patient must wait before trying again.', 'severity' => 'Moderate'],
        ['dice' => '34-36', 'result' => 'Opened Wound', 'effect' => 'Your work reopens the injury. The patient bleeds again and the original wound becomes harder to treat.', 'severity' => 'High'],
        ['dice' => '41-43', 'result' => 'Wasted Supplies', 'effect' => 'Bandages, herbs, or other medicine are used up with little effect. Lose one relevant item or supply, GM\'s choice.', 'severity' => 'Low'],
        ['dice' => '44-46', 'result' => 'Shaken Patient', 'effect' => 'The patient loses confidence and becomes difficult to treat. Any further healing attempt on that patient suffers a setback until calmed.', 'severity' => 'Moderate'],
        ['dice' => '51-53', 'result' => 'Hidden Complication', 'effect' => 'You miss a deeper injury or illness. The patient appears stable, but a serious problem remains untreated.', 'severity' => 'High'],
        ['dice' => '54-56', 'result' => 'Fever Breaks Out', 'effect' => 'The wound or illness worsens into fever or infection. The patient takes a severe turn for the worse unless treated quickly.', 'severity' => 'High'],
        ['dice' => '61-63', 'result' => 'Failed Save', 'effect' => 'The patient slips from your care at the worst moment. A critical injury or broken condition remains unresolved, and time is lost.', 'severity' => 'Severe'],
        ['dice' => '64-66', 'result' => 'Life on the Brink', 'effect' => 'Your attempt goes disastrously wrong and the patient is left in immediate danger. Another intervention is needed at once or the outcome may become fatal.', 'severity' => 'Catastrophic'],
    ];

    return array_map(function (array $row): array {
        $row['values'] = rg_mishap_expand_d66_values($row['dice']);
        return $row;
    }, $rows);
}

function rg_get_survival_mishaps(): array
{
    $rows = [
        ['dice' => '11-13', 'result' => 'False Trail', 'effect' => 'You mistake an animal track or wash for the true path. The group wastes a Quarter Day following the wrong route.', 'severity' => 'Moderate'],
        ['dice' => '14-16', 'result' => 'Bad Water', 'effect' => 'You choose a tainted spring, muddy pool, or stagnant runoff as a safe source. Everyone who drinks risks sickness at the GM\'s discretion.', 'severity' => 'High'],
        ['dice' => '21-23', 'result' => 'Cold Camp March', 'effect' => 'You press on through bad ground without proper shelter or pacing. Suffer 1 point of damage to Strength from fatigue and exposure.', 'severity' => 'Moderate'],
        ['dice' => '24-26', 'result' => 'Lost Bearings', 'effect' => 'You lose your sense of direction among trees, hills, or mist. The group makes no progress this Quarter Day.', 'severity' => 'High'],
        ['dice' => '31-33', 'result' => 'Spoiled Supplies', 'effect' => 'Your travel methods ruin or spill essential rations or water. Reduce one relevant Resource Die by one step for the group.', 'severity' => 'Moderate'],
        ['dice' => '34-36', 'result' => 'Exhausting Detour', 'effect' => 'You choose terrain that is passable but brutally inefficient. Everyone in the group suffers 1 point of damage to Agility or Strength, GM\'s choice.', 'severity' => 'High'],
        ['dice' => '41-43', 'result' => 'Predator Sign Missed', 'effect' => 'You fail to read the signs of a nearby predator. A dangerous beast finds your group before you are ready.', 'severity' => 'High'],
        ['dice' => '44-46', 'result' => 'Unsafe Crossing', 'effect' => 'You lead the group across unstable ground, thin ice, or a bad ford. Each adventurer must make a MOVE roll or suffer an attack with four Base Dice.', 'severity' => 'High'],
        ['dice' => '51-53', 'result' => 'Night Without Rest', 'effect' => 'Your chosen resting place offers no real shelter from damp, wind, or insects. No one in the group gets any SLEEP until a better camp is found.', 'severity' => 'Severe'],
        ['dice' => '54-56', 'result' => 'Poison Growth', 'effect' => 'You guide the group toward edible-looking plants or fungi that are actually dangerous. A meal prepared from them carries a poison of Potency 3.', 'severity' => 'High'],
        ['dice' => '61-63', 'result' => 'Dead End Country', 'effect' => 'You lead the group into terrain that cannot be crossed without climbing back out, circling wide, or abandoning gear. Lose a Quarter Day and one useful item, GM\'s choice.', 'severity' => 'Severe'],
        ['dice' => '64-66', 'result' => 'Wilderness Claim', 'effect' => 'Your error leaves the group stranded in deadly country with failing supplies and danger closing in. The GM introduces an immediate survival crisis.', 'severity' => 'Catastrophic'],
    ];

    return array_map(function (array $row): array {
        $row['values'] = rg_mishap_expand_d66_values($row['dice']);
        return $row;
    }, $rows);
}

function rg_get_insight_mishaps(): array
{
    $rows = [
        ['dice' => '11-13', 'result' => 'Wrong Read', 'effect' => 'You mistake nerves, grief, or fear for deception. Your next social move with this NPC starts from a false assumption.', 'severity' => 'Low'],
        ['dice' => '14-16', 'result' => 'Visible Suspicion', 'effect' => 'Your scrutiny is obvious. The other person notices and becomes guarded or offended.', 'severity' => 'Low'],
        ['dice' => '21-23', 'result' => 'Played for a Fool', 'effect' => 'A liar feeds you exactly the tells you expect. You believe a falsehood until contradictory evidence appears.', 'severity' => 'Moderate'],
        ['dice' => '24-26', 'result' => 'Emotional Spill', 'effect' => 'You push too hard while studying someone. Their strongest emotion erupts openly and the scene grows tense.', 'severity' => 'Moderate'],
        ['dice' => '31-33', 'result' => 'Misread Motive', 'effect' => 'You confuse hate for fear, love for guilt, or loyalty for greed. Any decision based on this read leads you in the wrong direction.', 'severity' => 'Moderate'],
        ['dice' => '34-36', 'result' => 'Insulting Probe', 'effect' => 'Your questions or stare come off as accusatory. The NPC\'s attitude drops one step.', 'severity' => 'Moderate'],
        ['dice' => '41-43', 'result' => 'Turned Against You', 'effect' => 'The target realizes you are weighing every word and starts manipulating you instead. They gain the upper hand in the conversation.', 'severity' => 'High'],
        ['dice' => '44-46', 'result' => 'False Confidence', 'effect' => 'You become certain you understand the person when you do not. The GM may give you one misleading but plausible conclusion.', 'severity' => 'High'],
        ['dice' => '51-53', 'result' => 'Public Misjudgment', 'effect' => 'You call out a lie, hidden motive, or emotion in front of others and get it wrong. Your reputation in this scene suffers immediately.', 'severity' => 'High'],
        ['dice' => '54-56', 'result' => 'Dangerous Truth', 'effect' => 'You do read a strong emotion correctly, but revealing it at the wrong moment provokes panic, rage, or despair. The NPC reacts dramatically.', 'severity' => 'High'],
        ['dice' => '61-63', 'result' => 'Trap of Trust', 'effect' => 'You trust someone who means you harm or reject someone who was honest. The consequences hit before you can correct the mistake.', 'severity' => 'Severe'],
        ['dice' => '64-66', 'result' => 'Fatal Misread', 'effect' => 'You completely misunderstand the intent in front of you and trigger betrayal, violence, or flight at the worst possible moment.', 'severity' => 'Catastrophic'],
    ];

    return array_map(function (array $row): array {
        $row['values'] = rg_mishap_expand_d66_values($row['dice']);
        return $row;
    }, $rows);
}

function rg_get_scouting_mishaps(): array
{
    $rows = [
        ['dice' => '11-13', 'result' => 'False Alarm', 'effect' => 'You mistake shadows, birds, or brush movement for a threat. The group loses time reacting to nothing.', 'severity' => 'Low'],
        ['dice' => '14-16', 'result' => 'Distant Blur', 'effect' => 'You spot something far away but cannot tell what it is. You gain only confusion, not clarity.', 'severity' => 'Low'],
        ['dice' => '21-23', 'result' => 'Eyestrain', 'effect' => 'You stare too long into glare, fog, or dimness. Suffer 1 point of damage to Wits from strain and frustration.', 'severity' => 'Moderate'],
        ['dice' => '24-26', 'result' => 'Missed Approach', 'effect' => 'You are watching the wrong direction. An enemy or beast closes distance before the group is warned.', 'severity' => 'High'],
        ['dice' => '31-33', 'result' => 'Bad Signal', 'effect' => 'You warn your allies too late or too unclearly. They are disorganized when danger arrives.', 'severity' => 'Moderate'],
        ['dice' => '34-36', 'result' => 'Silhouette Error', 'effect' => 'You mistake a harmless traveler, patrol, or animal for a deadly threat. A tense encounter begins on the wrong footing.', 'severity' => 'Moderate'],
        ['dice' => '41-43', 'result' => 'Exposed Position', 'effect' => 'While trying for a better look, you reveal yourself on a ridge, roof, or treeline. Anyone out there can now spot you as well.', 'severity' => 'High'],
        ['dice' => '44-46', 'result' => 'Chasing Movement', 'effect' => 'You fixate on one suspicious sight and miss the real danger elsewhere. The GM introduces a second threat at close range.', 'severity' => 'High'],
        ['dice' => '51-53', 'result' => 'Ambush Walk-In', 'effect' => 'You fail to recognize the signs of an ambush until it is sprung. Opponents gain the initiative.', 'severity' => 'Severe'],
        ['dice' => '54-56', 'result' => 'Friendly Misfire', 'effect' => 'Your report identifies the wrong target or threat. Allies act on faulty information and create immediate complications.', 'severity' => 'High'],
        ['dice' => '61-63', 'result' => 'Panic Warning', 'effect' => 'You announce danger with such certainty that the group bolts, scatters, or gives away its location. Everyone loses position.', 'severity' => 'Severe'],
        ['dice' => '64-66', 'result' => 'Blind to the Kill', 'effect' => 'You fail at the one warning that mattered. A hidden or distant threat strikes decisively before anyone can prepare.', 'severity' => 'Catastrophic'],
    ];

    return array_map(function (array $row): array {
        $row['values'] = rg_mishap_expand_d66_values($row['dice']);
        return $row;
    }, $rows);
}

function rg_get_marksmanship_mishaps(): array
{
    $rows = [
        ['dice' => '11-13', 'result' => 'Wild Shot', 'effect' => 'Your missile goes wide and is lost or lodged somewhere useless. Recovering it is impossible in the moment.', 'severity' => 'Low'],
        ['dice' => '14-16', 'result' => 'Poor Draw', 'effect' => 'Your grip, draw, or throw is off from the start. The attack leaves you off-balance and exposed.', 'severity' => 'Low'],
        ['dice' => '21-23', 'result' => 'Snapped String', 'effect' => 'Your bowstring frays or snaps under strain. The weapon cannot be used again until repaired.', 'severity' => 'Moderate'],
        ['dice' => '24-26', 'result' => 'Slipped Missile', 'effect' => 'An arrow, stone, or knife slips from your hand at the wrong instant. Your attack fails and you lose your next opening.', 'severity' => 'Moderate'],
        ['dice' => '31-33', 'result' => 'Exposed Shooter', 'effect' => 'Your shot reveals your exact position. Enemies immediately know where you are.', 'severity' => 'Moderate'],
        ['dice' => '34-36', 'result' => 'Glancing Self-Injury', 'effect' => 'The draw, release, or throw tears skin or wrenches a joint. Suffer 1 point of damage to Agility.', 'severity' => 'Moderate'],
        ['dice' => '41-43', 'result' => 'Broken Ammunition', 'effect' => 'You ruin or scatter part of your ammunition supply. Reduce one relevant ammo resource or lose D6 shots, GM\'s choice.', 'severity' => 'Moderate'],
        ['dice' => '44-46', 'result' => 'Obstructed Line', 'effect' => 'You fire through brush, cover, or a moving gap and your shot ricochets or shatters. A nearby ally or object is put at risk.', 'severity' => 'High'],
        ['dice' => '51-53', 'result' => 'Weapon Dropped', 'effect' => 'In the rush of combat, you drop your ranged weapon into mud, water, or hard ground. Recovering it costs your next fast action or more.', 'severity' => 'High'],
        ['dice' => '54-56', 'result' => 'Friendly Close Call', 'effect' => 'Your attack nearly hits an ally or mount. The ally must react at once or suffer an attack with three Base Dice.', 'severity' => 'High'],
        ['dice' => '61-63', 'result' => 'Backlash Shot', 'effect' => 'The shot goes disastrously wrong and leaves you open to a charge, fall, or counterattack. An enemy immediately closes with you.', 'severity' => 'Severe'],
        ['dice' => '64-66', 'result' => 'Devastating Misfire', 'effect' => 'Your missile strikes the wrong target, triggers a dangerous chain of events, or turns the battle against your side.', 'severity' => 'Catastrophic'],
    ];

    return array_map(function (array $row): array {
        $row['values'] = rg_mishap_expand_d66_values($row['dice']);
        return $row;
    }, $rows);
}

function rg_get_lore_mishaps(): array
{
    $rows = [
        ['dice' => '11-13', 'result' => 'Half-Remembered Tale', 'effect' => 'You recall only fragments of the legend. The information is incomplete and easy to misapply.', 'severity' => 'Low'],
        ['dice' => '14-16', 'result' => 'Wrong Source', 'effect' => 'You mix up two stories, dynasties, or sacred names. Your explanation sounds plausible but is incorrect.', 'severity' => 'Low'],
        ['dice' => '21-23', 'result' => 'Old Superstition', 'effect' => 'You repeat a village rumor as if it were fact. The group prepares for the wrong danger.', 'severity' => 'Moderate'],
        ['dice' => '24-26', 'result' => 'Misnamed Relic', 'effect' => 'You identify an artifact or site incorrectly. Anyone acting on that claim takes the wrong approach.', 'severity' => 'Moderate'],
        ['dice' => '31-33', 'result' => 'Taboo Knowledge', 'effect' => 'You speak aloud a name, oath, or legend that should have been treated carefully. Someone nearby is alarmed or offended.', 'severity' => 'Moderate'],
        ['dice' => '34-36', 'result' => 'False Confidence', 'effect' => 'You are certain the old stories support your conclusion when they do not. The GM may offer a misleading historical detail.', 'severity' => 'Moderate'],
        ['dice' => '41-43', 'result' => 'Dangerous Curiosity', 'effect' => 'Your explanation encourages someone to touch, open, or disturb something best left alone. Trouble follows immediately.', 'severity' => 'High'],
        ['dice' => '44-46', 'result' => 'Rival Memory', 'effect' => 'Your display of knowledge attracts the notice of a scholar, cultist, or treasure-seeker with competing aims.', 'severity' => 'Moderate'],
        ['dice' => '51-53', 'result' => 'Cursed Clue', 'effect' => 'The truth you uncover points straight toward a curse, feud, or ancient threat that now notices your interest.', 'severity' => 'High'],
        ['dice' => '54-56', 'result' => 'Mistaken Weakness', 'effect' => 'You recall the wrong way to ward, appease, or defeat an old danger. The first attempt to deal with it fails badly.', 'severity' => 'High'],
        ['dice' => '61-63', 'result' => 'Forbidden Revelation', 'effect' => 'You uncover a truth that destabilizes loyalties, faith, or local peace. The knowledge itself creates immediate conflict.', 'severity' => 'Severe'],
        ['dice' => '64-66', 'result' => 'Legend Awakens', 'effect' => 'Your meddling with old lore stirs an artifact, guardian, or ancient enemy that should have remained forgotten.', 'severity' => 'Catastrophic'],
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
        'performance' => [
            'label' => 'Performance Mishaps',
            'rows' => rg_get_performance_mishaps(),
        ],
        'animal_handling' => [
            'label' => 'Animal Handling Mishaps',
            'rows' => rg_get_animal_handling_mishaps(),
        ],
        'healing' => [
            'label' => 'Healing Mishaps',
            'rows' => rg_get_healing_mishaps(),
        ],
        'survival' => [
            'label' => 'Survival Mishaps',
            'rows' => rg_get_survival_mishaps(),
        ],
        'insight' => [
            'label' => 'Insight Mishaps',
            'rows' => rg_get_insight_mishaps(),
        ],
        'scouting' => [
            'label' => 'Scouting Mishaps',
            'rows' => rg_get_scouting_mishaps(),
        ],
        'marksmanship' => [
            'label' => 'Marksmanship Mishaps',
            'rows' => rg_get_marksmanship_mishaps(),
        ],
        'lore' => [
            'label' => 'Lore Mishaps',
            'rows' => rg_get_lore_mishaps(),
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
