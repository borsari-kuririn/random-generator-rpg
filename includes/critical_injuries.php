<?php

declare(strict_types=1);

function rg_get_critical_injuries_stab(): array
{
    return [
        ['dice' => '11-13', 'values' => [11, 12, 13], 'injury' => 'Pierced ear', 'lethal' => false, 'time_limit' => '-', 'effects' => 'None.', 'healing_time' => '-'],
        ['dice' => '14-16', 'values' => [14, 15, 16], 'injury' => 'Skewered foot', 'lethal' => false, 'time_limit' => '-', 'effects' => 'To RUN becomes a slow action.', 'healing_time' => 'D6'],
        ['dice' => '21-23', 'values' => [21, 22, 23], 'injury' => 'Hand run through', 'lethal' => false, 'time_limit' => '-', 'effects' => 'Two-handed weapons cannot be used.', 'healing_time' => 'D6'],
        ['dice' => '24-26', 'values' => [24, 25, 26], 'injury' => 'Pierced cheek', 'lethal' => false, 'time_limit' => '-', 'effects' => '–1 to MANIPULATE.', 'healing_time' => 'D6'],
        ['dice' => '31-33', 'values' => [31, 32, 33], 'injury' => 'Impaled thigh', 'lethal' => false, 'time_limit' => '-', 'effects' => 'To RUN becomes a slow action.', 'healing_time' => '2D6'],
        ['dice' => '34', 'values' => [34], 'injury' => 'Severed tendon', 'lethal' => false, 'time_limit' => '-', 'effects' => 'To RUN becomes a slow action.', 'healing_time' => '3D6'],
        ['dice' => '35-41', 'values' => [35, 36, 37, 38, 39, 40, 41], 'injury' => 'Impaled shoulder', 'lethal' => false, 'time_limit' => '-', 'effects' => 'Two-handed weapons cannot be used.', 'healing_time' => '2D6'],
        ['dice' => '42-43', 'values' => [42, 43], 'injury' => 'Pierced eye', 'lethal' => false, 'time_limit' => '-', 'effects' => '–2 to MARKSMANSHIP and SCOUTING', 'healing_time' => '2D6'],
        ['dice' => '44-45', 'values' => [44, 45], 'injury' => 'Skewered groin', 'lethal' => false, 'time_limit' => '-', 'effects' => '1 point of damage suffered at every MOVE or MELEE roll.', 'healing_time' => '2D6'],
        ['dice' => '46-51', 'values' => [46, 47, 48, 49, 50, 51], 'injury' => 'Punctured lung', 'lethal' => true, 'time_limit' => 'D6 days', 'effects' => '–2 to ENDURANCE and MOVE', 'healing_time' => 'D6'],
        ['dice' => '52-54', 'values' => [52, 53, 54], 'injury' => 'Bleeding gut', 'lethal' => true, 'time_limit' => 'D6 hours', 'effects' => '1 point of damage at each roll for MIGHT, MOVE and MELEE.', 'healing_time' => 'D6'],
        ['dice' => '55-56', 'values' => [55, 56], 'injury' => 'Ruptured intestines', 'lethal' => true, 'time_limit' => 'D6 hours', 'effects' => 'Disease with Virulence 6.', 'healing_time' => '2D6'],
        ['dice' => '61', 'values' => [61], 'injury' => 'Severed arm artery', 'lethal' => true, 'time_limit' => '–1 minutes', 'effects' => 'Two-handed weapons cannot be used.', 'healing_time' => 'D6'],
        ['dice' => '62', 'values' => [62], 'injury' => 'Severed leg artery', 'lethal' => true, 'time_limit' => '–1 D6 minutes', 'effects' => 'To RUN becomes a slow action.', 'healing_time' => 'D6'],
        ['dice' => '63', 'values' => [63], 'injury' => 'Impaled neck', 'lethal' => true, 'time_limit' => '–1 D6 turns', 'effects' => '–2 to ENDURANCE', 'healing_time' => '2D6'],
        ['dice' => '64', 'values' => [64], 'injury' => 'Skewered skull', 'lethal' => true, 'time_limit' => '-', 'effects' => 'You die at once.', 'healing_time' => '-'],
        ['dice' => '65-66', 'values' => [65, 66], 'injury' => 'Pierced heart', 'lethal' => true, 'time_limit' => '-', 'effects' => 'Your heart beats for the last time.', 'healing_time' => '-'],
    ];
}

function rg_get_critical_injuries_slash(): array
{
    return [
        ['dice' => '11-12', 'values' => [11, 12], 'injury' => 'Bleeding forehead', 'lethal' => false, 'time_limit' => '-', 'effects' => 'None.', 'healing_time' => '-'],
        ['dice' => '13-14', 'values' => [13, 14], 'injury' => 'Severed nose', 'lethal' => false, 'time_limit' => '-', 'effects' => '–1 to MANIPULATE.', 'healing_time' => 'D6'],
        ['dice' => '15-16', 'values' => [15, 16], 'injury' => 'Severed finger', 'lethal' => false, 'time_limit' => '-', 'effects' => 'Two-handed weapons cannot be used.', 'healing_time' => 'D6'],
        ['dice' => '21-22', 'values' => [21, 22], 'injury' => 'Severed toe', 'lethal' => false, 'time_limit' => '-', 'effects' => 'To RUN becomes a slow action.', 'healing_time' => '2D6'],
        ['dice' => '23-24', 'values' => [23, 24], 'injury' => 'Bleeding thigh', 'lethal' => false, 'time_limit' => '-', 'effects' => 'To RUN becomes a slow action.', 'healing_time' => 'D6'],
        ['dice' => '25-26', 'values' => [25, 26], 'injury' => 'Slashed mouth', 'lethal' => false, 'time_limit' => '-', 'effects' => '–2 to MANIPULATE.', 'healing_time' => 'D6'],
        ['dice' => '31-32', 'values' => [31, 32], 'injury' => 'Severed tendon', 'lethal' => false, 'time_limit' => '-', 'effects' => 'To RUN becomes a slow action.', 'healing_time' => '2D6'],
        ['dice' => '33-34', 'values' => [33, 34], 'injury' => 'Wounded shoulder', 'lethal' => false, 'time_limit' => '-', 'effects' => 'Two-handed weapons cannot be used.', 'healing_time' => '2D6'],
        ['dice' => '35-36', 'values' => [35, 36], 'injury' => 'Severed ear', 'lethal' => false, 'time_limit' => '-', 'effects' => '–1 to SCOUTING.', 'healing_time' => 'D6'],
        ['dice' => '41-42', 'values' => [41, 42], 'injury' => 'Slashed eye', 'lethal' => false, 'time_limit' => '-', 'effects' => '–2 to MARKSMANSHIP and SCOUTING', 'healing_time' => '2D6'],
        ['dice' => '43-44', 'values' => [43, 44], 'injury' => 'Punctured lung', 'lethal' => true, 'time_limit' => 'D6 days', 'effects' => '–2 to ENDURANCE and MOVE', 'healing_time' => 'D6'],
        ['dice' => '45-46', 'values' => [45, 46], 'injury' => 'Severed foot', 'lethal' => true, 'time_limit' => 'D6 days', 'effects' => 'To RUN becomes a slow action.', 'healing_time' => 'Permanent'],
        ['dice' => '51-52', 'values' => [51, 52], 'injury' => 'Bleeding gut', 'lethal' => true, 'time_limit' => 'D6 hours', 'effects' => '1 point of damage at each roll for MIGHT, MOVE and MELEE.', 'healing_time' => 'D6'],
        ['dice' => '53-54', 'values' => [53, 54], 'injury' => 'Ruptured intestines', 'lethal' => true, 'time_limit' => 'D6 hours', 'effects' => 'Disease with Virulence 6.', 'healing_time' => '2D6'],
        ['dice' => '55-56', 'values' => [55, 56], 'injury' => 'Severed arm', 'lethal' => true, 'time_limit' => '–1 D6 hours', 'effects' => 'Two-handed weapons cannot be used.', 'healing_time' => 'Permanent'],
        ['dice' => '61-62', 'values' => [61, 62], 'injury' => 'Severed leg', 'lethal' => true, 'time_limit' => '–1 D6 hours', 'effects' => 'To RUN becomes a slow action.', 'healing_time' => 'Permanent'],
        ['dice' => '63-64', 'values' => [63, 64], 'injury' => 'Slit throat', 'lethal' => true, 'time_limit' => '–1 D6 turns', 'effects' => '–2 to ENDURANCE.', 'healing_time' => 'D6'],
        ['dice' => '65', 'values' => [65], 'injury' => 'Cleft skull', 'lethal' => true, 'time_limit' => '-', 'effects' => 'You die immediately.', 'healing_time' => '-'],
        ['dice' => '66', 'values' => [66], 'injury' => 'Decapitation', 'lethal' => true, 'time_limit' => '-', 'effects' => 'Your head leaves your body.', 'healing_time' => '-'],
    ];
}

function rg_get_critical_injuries_blunt(): array
{
    return [
        ['dice' => '11-12', 'values' => [11, 12], 'injury' => 'Stunned', 'lethal' => false, 'time_limit' => '-', 'effects' => 'None', 'healing_time' => '-'],
        ['dice' => '13-14', 'values' => [13, 14], 'injury' => 'Breathless', 'lethal' => false, 'time_limit' => '-', 'effects' => 'None', 'healing_time' => '-'],
        ['dice' => '15-16', 'values' => [15, 16], 'injury' => 'Concussion', 'lethal' => false, 'time_limit' => '-', 'effects' => '–2 to SCOUTING.', 'healing_time' => 'D6'],
        ['dice' => '21-22', 'values' => [21, 22], 'injury' => 'Broken nose', 'lethal' => false, 'time_limit' => '-', 'effects' => '–1 to MANIPULATE.', 'healing_time' => 'D6'],
        ['dice' => '23-24', 'values' => [23, 24], 'injury' => 'Broken fingers', 'lethal' => false, 'time_limit' => '-', 'effects' => 'Two-handed weapons cannot be used.', 'healing_time' => 'D6'],
        ['dice' => '25-26', 'values' => [25, 26], 'injury' => 'Broken toes', 'lethal' => false, 'time_limit' => '-', 'effects' => 'To RUN becomes a slow action.', 'healing_time' => 'D6'],
        ['dice' => '31-33', 'values' => [31, 32, 33], 'injury' => 'Knocked out teeth', 'lethal' => false, 'time_limit' => '-', 'effects' => '–1 to MANIPULATE.', 'healing_time' => 'D6'],
        ['dice' => '34-36', 'values' => [34, 35, 36], 'injury' => 'Groin hit', 'lethal' => false, 'time_limit' => '-', 'effects' => '1 point of damage suffered at every MOVE or MELEE roll.', 'healing_time' => 'D6'],
        ['dice' => '41-43', 'values' => [41, 42, 43], 'injury' => 'Broken ribs', 'lethal' => false, 'time_limit' => '-', 'effects' => '–2 to MOVE and MELEE.', 'healing_time' => '2D6'],
        ['dice' => '44-45', 'values' => [44, 45], 'injury' => 'Broken arm', 'lethal' => false, 'time_limit' => '-', 'effects' => 'Two-handed weapons cannot be used.', 'healing_time' => '2D6'],
        ['dice' => '46-51', 'values' => [46, 47, 48, 49, 50, 51], 'injury' => 'Broken leg', 'lethal' => false, 'time_limit' => '-', 'effects' => 'To RUN becomes a slow action.', 'healing_time' => '2D6'],
        ['dice' => '52-53', 'values' => [52, 53], 'injury' => 'Gouged eye', 'lethal' => false, 'time_limit' => '-', 'effects' => '–2 to MARKSMANSHIP and SCOUTING', 'healing_time' => '2D6'],
        ['dice' => '54-55', 'values' => [54, 55], 'injury' => 'Crushed foot', 'lethal' => true, 'time_limit' => 'D6 days', 'effects' => 'To RUN becomes a slow action.', 'healing_time' => '3D6'],
        ['dice' => '56-61', 'values' => [56, 61], 'injury' => 'Crushed elbow', 'lethal' => true, 'time_limit' => 'D6 days', 'effects' => 'Two-handed weapons cannot be used.', 'healing_time' => 'Permanent'],
        ['dice' => '62-63', 'values' => [62, 63], 'injury' => 'Crushed knee', 'lethal' => true, 'time_limit' => 'D6 days', 'effects' => 'To RUN becomes a slow action.', 'healing_time' => 'Permanent'],
        ['dice' => '64', 'values' => [64], 'injury' => 'Broken neck', 'lethal' => false, 'time_limit' => '-', 'effects' => 'Paralyzed from the neck down. If not HEALED in time, the effect is permanent.', 'healing_time' => '3D6'],
        ['dice' => '65-66', 'values' => [65, 66], 'injury' => 'Crushed skull', 'lethal' => true, 'time_limit' => '-', 'effects' => 'Your adventure and your life end here.', 'healing_time' => '-'],
    ];
}

function rg_get_critical_injuries_others(): array
{
    return [
        ['dice' => '-', 'values' => [], 'injury' => 'Non-typical Damage', 'lethal' => true, 'time_limit' => 'D6 days', 'effects' => 'You remain unconscious until you die or are HEALED.', 'healing_time' => '-'],
        ['dice' => '-', 'values' => [], 'injury' => 'Pushed Damage', 'lethal' => false, 'time_limit' => '-', 'effects' => 'None.', 'healing_time' => '-'],
    ];
}

function rg_get_critical_injuries_horror(): array
{
    return [
        ['dice' => '15-16', 'values' => [15, 16], 'injury' => 'Trembling', 'lethal' => false, 'time_limit' => '-', 'effects' => 'Penalty –1 to all rolls for Agility.', 'healing_time' => 'D6'],
        ['dice' => '21', 'values' => [21], 'injury' => 'White hair', 'lethal' => false, 'time_limit' => '-', 'effects' => 'None.', 'healing_time' => 'Permanent'],
        ['dice' => '22-24', 'values' => [22, 23, 24], 'injury' => 'Anxious', 'lethal' => false, 'time_limit' => '-', 'effects' => 'Penalty –1 to all rolls for Wits.', 'healing_time' => 'D6'],
        ['dice' => '25-31', 'values' => [25, 26, 27, 28, 29, 30, 31], 'injury' => 'Sullen', 'lethal' => false, 'time_limit' => '-', 'effects' => 'Penalty –1 to all rolls for Empathy.', 'healing_time' => 'D6'],
        ['dice' => '32-35', 'values' => [32, 33, 34, 35], 'injury' => 'Nightmares', 'lethal' => false, 'time_limit' => '-', 'effects' => 'Make an INSIGHT roll every Quarter Day spent SLEEPING. Failure means that the SLEEP doesn\'t count.', 'healing_time' => 'D6'],
        ['dice' => '36-41', 'values' => [36, 37, 38, 39, 40, 41], 'injury' => 'Nocturnal', 'lethal' => false, 'time_limit' => '-', 'effects' => 'You can only SLEEP during the light part of the day.', 'healing_time' => '2D6'],
        ['dice' => '42-43', 'values' => [42, 43], 'injury' => 'Phobic', 'lethal' => false, 'time_limit' => '-', 'effects' => 'You are terrified by something related to what Broke you. The GM decides what it is. You suffer 1 point of damage to Wits each round within NEAR range of the object of your phobia.', 'healing_time' => '2D6'],
        ['dice' => '44-45', 'values' => [44, 45], 'injury' => 'Drunkard', 'lethal' => false, 'time_limit' => '-', 'effects' => 'You must drink wine or mead every day, or suffer 1 point of damage to Agility.', 'healing_time' => '3D6'],
        ['dice' => '46-51', 'values' => [46, 47, 48, 49, 50, 51], 'injury' => 'Claustrophobic', 'lethal' => false, 'time_limit' => '-', 'effects' => 'Every turn (15 minutes) in a confined environment, you suffer 1 point of damage to Wits.', 'healing_time' => '2D6'],
        ['dice' => '52', 'values' => [52], 'injury' => 'Mythomania', 'lethal' => false, 'time_limit' => '-', 'effects' => 'You cannot stop yourself from lying. About everything. The effect should be roleplayed.', 'healing_time' => '2D6'],
        ['dice' => '53-54', 'values' => [53, 54], 'injury' => 'Paranoia', 'lethal' => false, 'time_limit' => '-', 'effects' => 'You are certain that someone is out to get you. The effect should be roleplayed.', 'healing_time' => '2D6'],
        ['dice' => '55', 'values' => [55], 'injury' => 'Delusion', 'lethal' => false, 'time_limit' => '-', 'effects' => 'You are totally convinced of something that is totally untrue, for example that a certain kin doesn\'t exist.', 'healing_time' => '3D6'],
        ['dice' => '56', 'values' => [56], 'injury' => 'Hallucinations', 'lethal' => false, 'time_limit' => '-', 'effects' => 'Make an INSIGHT roll every Quarter Day. If you fail, you suffer a powerful hallucination. The GM determines the details.', 'healing_time' => '3D6'],
        ['dice' => '61-62', 'values' => [61, 62], 'injury' => 'Altered personality', 'lethal' => false, 'time_limit' => '-', 'effects' => 'Your personality is altered in a fundamental way. Determine how together with the GM. The effect should be roleplayed.', 'healing_time' => 'Permanent'],
        ['dice' => '63', 'values' => [63], 'injury' => 'Amnesia', 'lethal' => false, 'time_limit' => '-', 'effects' => 'You lose all memory, and cannot recollect who you or the other adventurers are. The effect should be roleplayed.', 'healing_time' => 'D6'],
        ['dice' => '64-65', 'values' => [64, 65], 'injury' => 'Catatonic', 'lethal' => false, 'time_limit' => '-', 'effects' => 'You stare blankly into oblivion, and do not respond to any stimuli.', 'healing_time' => 'D6'],
        ['dice' => '66', 'values' => [66], 'injury' => 'Heart attack', 'lethal' => true, 'time_limit' => '-', 'effects' => 'Your heart stops, and you die of pure fright.', 'healing_time' => '-'],
    ];
}

function rg_find_critical_injury(string $category, int $diceValue): ?array
{
    $functions = [
        'stab' => 'rg_get_critical_injuries_stab',
        'slash' => 'rg_get_critical_injuries_slash',
        'blunt' => 'rg_get_critical_injuries_blunt',
        'horror' => 'rg_get_critical_injuries_horror',
        'others' => 'rg_get_critical_injuries_others',
    ];
    
    if (!isset($functions[$category])) {
        return null;
    }
    
    $injuries = call_user_func($functions[$category]);
    
    foreach ($injuries as $injury) {
        if (in_array($diceValue, $injury['values'])) {
            return $injury;
        }
    }
    
    return null;
}

function rg_get_all_critical_injury_categories(): array
{
    return ['stab', 'slash', 'blunt', 'horror', 'others'];
}
