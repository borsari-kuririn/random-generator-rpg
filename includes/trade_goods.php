<?php

declare(strict_types=1);

function rg_get_trade_goods(): array
{
    return [
        'trade_goods' => [
            ['name' => 'Arrows, Iron Head', 'price' => '12 copper', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1/2 Iron, 1 Wood', 'time' => 'Quarter Day', 'talent' => 'Smith, Bowyer', 'tools' => 'Forge, knife', 'effect' => 'Increases the Arrows Resource Die by one step.'],
            ['name' => 'Arrows, Wooden Head', 'price' => '6 copper', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1 Wood', 'time' => 'Quarter Day', 'talent' => 'Bowyer', 'tools' => 'Knife', 'effect' => 'Increases the Arrows Resource Die by one step. Armor counts double.'],
            ['name' => 'Quiver', 'price' => '8 copper', 'supply' => 'Common', 'weight' => '-', 'raw_materials' => '1/2 Leather', 'time' => 'Quarter Day', 'talent' => 'Tanner', 'tools' => 'Knife', 'effect' => 'Does not encumber the wearer.'],
            ['name' => 'Grappling Hook', 'price' => '3 silver', 'supply' => 'Uncommon', 'weight' => 'Normal', 'raw_materials' => '1 Iron', 'time' => 'Quarter Day', 'talent' => 'Smith', 'tools' => 'Forge', 'effect' => 'Gear Bonus +1 when climbing.'],
            ['name' => 'Rope, 10 Meters', 'price' => '2 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1 Cloth', 'time' => 'Quarter Day', 'talent' => 'Tailor', 'tools' => 'Knife', 'effect' => 'Gear Bonus +1 when climbing.'],
            ['name' => 'Tallow Candle', 'price' => '6 copper', 'supply' => 'Common', 'weight' => 'Tiny', 'raw_materials' => '1/10 Cloth, 1/4 Tallow', 'time' => 'Quarter Day', 'talent' => '-', 'tools' => 'Fire', 'effect' => 'Illuminates within Arm\'s Length for a Quarter Day.'],
            ['name' => 'Oil Lamp', 'price' => '5 copper', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '1 Stone', 'time' => 'One Day', 'talent' => '-', 'tools' => 'Fire', 'effect' => 'Illuminates within Near range. Can only be used indoors. Requires lamp oil.'],
            ['name' => 'Lantern', 'price' => '2 silver', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '1 Iron', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge', 'effect' => 'Illuminates within Near range. Requires lamp oil.'],
            ['name' => 'Torches', 'price' => '5 copper', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1 Wood', 'time' => 'Quarter Day', 'talent' => '-', 'tools' => 'Knife or axe', 'effect' => 'Increases the Torches Resource Die one step. Illuminates within Near range. Roll the Resource Die each Turn (15 minutes).'],
            ['name' => 'Sack', 'price' => '8 copper', 'supply' => 'Common', 'weight' => '-', 'raw_materials' => '1 Cloth', 'time' => 'Quarter Day', 'talent' => 'Tailor', 'tools' => 'Knife', 'effect' => 'Does not encumber the wearer.'],
            ['name' => 'Backpack', 'price' => '4 silver', 'supply' => 'Common', 'weight' => '-', 'raw_materials' => '2 Cloth', 'time' => 'Quarter Day', 'talent' => 'Tailor', 'tools' => 'Knife, needle and thread', 'effect' => 'Does not encumber the wearer.'],
            ['name' => 'Waterskin', 'price' => '3 silver', 'supply' => 'Common', 'weight' => '-', 'raw_materials' => '1 Leather', 'time' => 'Quarter Day', 'talent' => 'Tanner', 'tools' => 'Needle and thread', 'effect' => 'Needed to carry Water. Does not encumber.'],
            ['name' => 'Bandages', 'price' => '6 copper', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '1/2 Cloth', 'time' => 'Quarter Day', 'talent' => 'Tailor', 'tools' => 'Knife', 'effect' => 'Gear Bonus +1 to Healing.'],
            ['name' => 'Lamp Oil', 'price' => '2 copper', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '1/4 Tallow', 'time' => 'Quarter Day', 'talent' => 'Tanner', 'tools' => 'Fire', 'effect' => 'Lasts a Quarter Day.'],
            ['name' => 'Ink and Quill', 'price' => '2 silver', 'supply' => 'Uncommon', 'weight' => 'Tiny', 'raw_materials' => 'Feather, 1/10 Iron', 'time' => 'Quarter Day', 'talent' => 'Tanner', 'tools' => 'Knife, fire', 'effect' => 'Can be used to write down spells.'],
            ['name' => 'Parchment', 'price' => '6 copper', 'supply' => 'Uncommon', 'weight' => 'Tiny', 'raw_materials' => '1/4 Leather', 'time' => 'Quarter Day', 'talent' => 'Tanner', 'tools' => 'Knife', 'effect' => 'Can be used to write down spells.'],
            ['name' => 'Blanket', 'price' => '7 copper', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '1/2 Cloth', 'time' => 'Quarter Day', 'talent' => 'Tailor', 'tools' => 'Knife', 'effect' => 'Gear Bonus +1 against cold.'],
            ['name' => 'Sleeping Fur', 'price' => '3 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '2 Pelt', 'time' => 'Quarter Day', 'talent' => 'Tanner', 'tools' => 'Knife', 'effect' => 'Gear Bonus +2 against cold.'],
            ['name' => 'Flint and Steel', 'price' => '2 copper', 'supply' => 'Common', 'weight' => 'Tiny', 'raw_materials' => '1/10 Iron, 1/4 Stone', 'time' => 'Quarter Day', 'talent' => '-', 'tools' => '-', 'effect' => 'Gear Bonus +1 to Making Camp during journeys.'],
            ['name' => 'Lockpicks', 'price' => '1 gold', 'supply' => 'Uncommon', 'weight' => 'Tiny', 'raw_materials' => '1/4 Iron', 'time' => 'One Day', 'talent' => 'Smith, Lockpicker', 'tools' => 'Forge', 'effect' => 'Gear Bonus +1 to Sleight of Hand when picking locks.'],
            ['name' => 'Field Rations', 'price' => '1 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1 Meat, Fish or Vegetables', 'time' => 'Quarter Day', 'talent' => 'Chef', 'tools' => 'Fire', 'effect' => 'One unit of Food. Increases the Food Resource Die one step.'],
            ['name' => 'Field Kitchen', 'price' => '4 silver', 'supply' => 'Uncommon', 'weight' => 'Heavy', 'raw_materials' => '2 Iron', 'time' => 'One Day', 'talent' => 'Chef, Smith', 'tools' => 'Forge', 'effect' => 'Makes it possible to cook 2D6 units of Food in a Quarter Day.'],
            ['name' => 'Cauldron', 'price' => '18 copper', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1 Iron', 'time' => 'One Day', 'talent' => 'Chef, Smith', 'tools' => 'Forge', 'effect' => 'Gear Bonus +1 when cooking Food.'],
            ['name' => 'Metal Chalice', 'price' => '7 copper', 'supply' => 'Uncommon', 'weight' => 'Light', 'raw_materials' => '1/2 Iron', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge', 'effect' => '-'],
            ['name' => 'Tankard', 'price' => '2 copper', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '1/2 Wood', 'time' => 'Quarter Day', 'talent' => '-', 'tools' => '-', 'effect' => '-'],
            ['name' => 'Metal Plate', 'price' => '8 copper', 'supply' => 'Uncommon', 'weight' => 'Light', 'raw_materials' => '1/2 Iron', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge', 'effect' => '-'],
            ['name' => 'Food Knife', 'price' => '6 copper', 'supply' => 'Common', 'weight' => 'Tiny', 'raw_materials' => '1/4 Iron', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge', 'effect' => '-'],
            ['name' => 'Spoon', 'price' => '8 copper', 'supply' => 'Uncommon', 'weight' => 'Tiny', 'raw_materials' => '1/4 Iron', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge', 'effect' => '-'],
            ['name' => 'Bear Trap', 'price' => '5 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1 Iron', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge', 'effect' => 'Gear Bonus +2 to Hunting during journeys.'],
            ['name' => 'Snares', 'price' => '1 silver', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '1/2 Cloth or Leather', 'time' => 'Quarter Day', 'talent' => 'Master of the Hunt', 'tools' => 'Knife', 'effect' => 'Gear Bonus +1 to Hunting during journeys.'],
            ['name' => 'Barrel', 'price' => '8 copper', 'supply' => 'Common', 'weight' => 'Heavy', 'raw_materials' => '2 Wood', 'time' => 'One Day', 'talent' => '-', 'tools' => 'Saw, hammer', 'effect' => 'Contains 10 units of Water or other liquid.'],
            ['name' => 'Clay Jug', 'price' => '5 copper', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '1 Stone', 'time' => 'One Day', 'talent' => '-', 'tools' => 'Fire', 'effect' => 'Contains one unit of Water or other liquid.'],
            ['name' => 'Small Tent', 'price' => '2 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1 Cloth or Leather', 'time' => 'Quarter Day', 'talent' => 'Tailor or Tanner', 'tools' => 'Knife, needle and thread', 'effect' => 'Room for two. Gear Bonus +2 to Making Camp during journeys.'],
            ['name' => 'Large Tent', 'price' => '5 silver', 'supply' => 'Uncommon', 'weight' => 'Heavy', 'raw_materials' => '2 Cloth or Leather', 'time' => 'One Day', 'talent' => 'Tailor or Tanner', 'tools' => 'Knife, needle and thread', 'effect' => 'Room for six. Gear Bonus +2 to Making Camp during journeys.'],
            ['name' => 'Fishing Hook and Line', 'price' => '4 copper', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '1/10 Iron, 1/10 Cloth', 'time' => 'Quarter Day', 'talent' => 'Smith, Tailor', 'tools' => 'Hammer, Forge', 'effect' => 'Gear Bonus +1 to Fishing during journeys.'],
            ['name' => 'Fishing Net', 'price' => '1 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1 Cloth', 'time' => 'One Day', 'talent' => 'Tailor', 'tools' => 'Knife', 'effect' => 'Gear Bonus +2 to Fishing during journeys.'],
            ['name' => 'Magnifying Glass', 'price' => '3 gold', 'supply' => 'Rare', 'weight' => 'Tiny', 'raw_materials' => '1/4 Iron, 1/2 Glass', 'time' => 'One Week', 'talent' => 'Smith, Builder', 'tools' => 'Forge', 'effect' => 'Can be used as ingredient in spells.'],
            ['name' => 'Holy Symbol', 'price' => '1 silver', 'supply' => 'Uncommon', 'weight' => 'Tiny', 'raw_materials' => '1/2 Iron', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge', 'effect' => 'Can be used as ingredient in spells.'],
            ['name' => 'Chalk', 'price' => '2 copper', 'supply' => 'Common', 'weight' => 'Tiny', 'raw_materials' => '1/4 Stone', 'time' => 'Quarter Day', 'talent' => '-', 'tools' => '-', 'effect' => 'Can be used by Symbolists.'],
            ['name' => 'Map', 'price' => '4 silver', 'supply' => 'Uncommon', 'weight' => 'Tiny', 'raw_materials' => 'Parchment', 'time' => 'One Day', 'talent' => 'Pathfinder', 'tools' => 'Ink and Quill', 'effect' => 'Can be used as ingredient in spells.'],
            ['name' => 'Spyglass', 'price' => '3 gold', 'supply' => 'Rare', 'weight' => 'Normal', 'raw_materials' => '1 Iron, 1 Glass', 'time' => 'Two Weeks', 'talent' => 'Smith, Builder', 'tools' => 'Forge', 'effect' => 'Gear Bonus +2 to Scouting at Long range.'],
            ['name' => 'Crystal Ball', 'price' => '6 silver', 'supply' => 'Uncommon', 'weight' => 'Light', 'raw_materials' => '1 Glass', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge', 'effect' => 'Can be used as ingredient in spells.'],
            ['name' => 'Hourglass', 'price' => '12 silver', 'supply' => 'Rare', 'weight' => 'Light', 'raw_materials' => '1 Stone', 'time' => 'One Week', 'talent' => 'Builder', 'tools' => 'Forge', 'effect' => 'Can be used as ingredient in spells.'],
            ['name' => 'Scales', 'price' => '3 silver', 'supply' => 'Uncommon', 'weight' => 'Normal', 'raw_materials' => '1/2 Iron', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge', 'effect' => 'Can be used as ingredient in spells.'],
            ['name' => 'Flute', 'price' => '15 copper', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '1/2 Wood', 'time' => 'One Day', 'talent' => 'Path of the Song', 'tools' => 'Knife', 'effect' => 'Gear Bonus +1 to Performance.'],
            ['name' => 'Horn', 'price' => '3 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1 Wood or animal horn', 'time' => 'One Day', 'talent' => 'Path of the Song', 'tools' => 'Knife', 'effect' => 'Gear Bonus +1 to Performance.'],
            ['name' => 'Lyre', 'price' => '5 silver', 'supply' => 'Uncommon', 'weight' => 'Normal', 'raw_materials' => '1 Wood, 1/4 Cloth', 'time' => 'One Week', 'talent' => 'Path of the Song', 'tools' => 'Knife', 'effect' => 'Gear Bonus +1 to Performance.'],
            ['name' => 'Harp', 'price' => '8 silver', 'supply' => 'Rare', 'weight' => 'Heavy', 'raw_materials' => '2 Wood, 1/2 Cloth', 'time' => 'Two Weeks', 'talent' => 'Path of the Song', 'tools' => 'Knife', 'effect' => 'Gear Bonus +2 to Performance.'],
            ['name' => 'Drum', 'price' => '18 copper', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1 Wood, 1/2 Leather', 'time' => 'One Day', 'talent' => 'Path of the Song', 'tools' => 'Knife', 'effect' => 'Gear Bonus +1 to Performance.'],
            ['name' => 'Lethal Poison', 'price' => '5 silver', 'supply' => 'Rare', 'weight' => 'Tiny', 'raw_materials' => '1 Herbs', 'time' => 'Quarter Day', 'talent' => 'Poisoner', 'tools' => 'Cauldron, fire', 'effect' => 'Potency 3. Each increase in Potency doubles the price.'],
            ['name' => 'Paralyzing Poison', 'price' => '4 silver', 'supply' => 'Rare', 'weight' => 'Tiny', 'raw_materials' => '1 Herbs', 'time' => 'Quarter Day', 'talent' => 'Poisoner', 'tools' => 'Cauldron, fire', 'effect' => 'Potency 3. Each increase in Potency doubles the price.'],
            ['name' => 'Sleeping Poison', 'price' => '3 silver', 'supply' => 'Rare', 'weight' => 'Tiny', 'raw_materials' => '1 Herbs', 'time' => 'Quarter Day', 'talent' => 'Poisoner', 'tools' => 'Cauldron, fire', 'effect' => 'Potency 3. Each increase in Potency doubles the price.'],
            ['name' => 'Hallucinogenic Poison', 'price' => '4 silver', 'supply' => 'Rare', 'weight' => 'Tiny', 'raw_materials' => '1 Herbs', 'time' => 'Quarter Day', 'talent' => 'Poisoner', 'tools' => 'Cauldron, fire', 'effect' => 'Potency 3. Each increase in Potency doubles the price.'],
        ],
        'melee_weapons' => [
            ['name' => 'Knife', 'price' => '1 silver', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '1/2 Iron, 1/2 Wood', 'time' => 'Quarter Day', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Dagger', 'price' => '2 silver', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '1/2 Iron, 1/2 Leather', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Falchion', 'price' => '4 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1 Iron, 1/2 Leather', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Shortsword', 'price' => '6 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1 Iron, 1/2 Leather', 'time' => 'Two Days', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Broadsword', 'price' => '10 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '2 Iron, 1/2 Leather', 'time' => 'One Week', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Longsword', 'price' => '18 silver', 'supply' => 'Uncommon', 'weight' => 'Heavy', 'raw_materials' => '3 Iron, 1/2 Leather', 'time' => 'One Week', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Two-Handed Sword', 'price' => '4 gold', 'supply' => 'Rare', 'weight' => 'Heavy', 'raw_materials' => '4 Iron, 1 Leather', 'time' => 'Two Weeks', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Scimitar', 'price' => '8 silver', 'supply' => 'Uncommon', 'weight' => 'Normal', 'raw_materials' => '1 Iron, 1/2 Leather', 'time' => 'One Week', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Handaxe', 'price' => '2 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1/2 Iron, 1 Wood', 'time' => 'Quarter Day', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Battleaxe', 'price' => '6 silver', 'supply' => 'Uncommon', 'weight' => 'Heavy', 'raw_materials' => '1 Iron, 1 Wood', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Two-Handed Axe', 'price' => '24 silver', 'supply' => 'Uncommon', 'weight' => 'Heavy', 'raw_materials' => '2 Iron, 2 Wood', 'time' => 'One Week', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Mace', 'price' => '4 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1 Iron, 1 Wood', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Morningstar', 'price' => '8 silver', 'supply' => 'Uncommon', 'weight' => 'Normal', 'raw_materials' => '1 Iron, 1 Wood', 'time' => 'Two Days', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Warhammer', 'price' => '12 silver', 'supply' => 'Uncommon', 'weight' => 'Normal', 'raw_materials' => '1 Iron, 1 Wood', 'time' => 'Two Days', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Flail', 'price' => '16 silver', 'supply' => 'Uncommon', 'weight' => 'Normal', 'raw_materials' => '2 Iron, 1 Wood', 'time' => 'One Week', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Wooden Club', 'price' => '1 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1 Wood', 'time' => 'Quarter Day', 'talent' => '-', 'tools' => '-'],
            ['name' => 'Large Wooden Club', 'price' => '2 silver', 'supply' => 'Common', 'weight' => 'Heavy', 'raw_materials' => '2 Wood', 'time' => 'Quarter Day', 'talent' => '-', 'tools' => '-'],
            ['name' => 'Heavy Warhammer', 'price' => '22 silver', 'supply' => 'Uncommon', 'weight' => 'Heavy', 'raw_materials' => '3 Iron, 2 Wood', 'time' => 'One Week', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Staff', 'price' => '1 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '2 Wood', 'time' => 'Quarter Day', 'talent' => '-', 'tools' => '-'],
            ['name' => 'Short Spear', 'price' => '2 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1/2 Iron, 1 Wood', 'time' => 'Quarter Day', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Long Spear', 'price' => '4 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1/2 Iron, 2 Wood', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Pike', 'price' => '12 silver', 'supply' => 'Uncommon', 'weight' => 'Heavy', 'raw_materials' => '1/2 Iron, 2 Wood', 'time' => 'Two Days', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Halberd', 'price' => '3 gold', 'supply' => 'Rare', 'weight' => 'Heavy', 'raw_materials' => '1 Iron, 2 Wood', 'time' => 'One Week', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Trident', 'price' => '6 silver', 'supply' => 'Rare', 'weight' => 'Normal', 'raw_materials' => '1 Iron, 1 Wood', 'time' => 'Two Days', 'talent' => 'Smith', 'tools' => 'Forge'],
        ],
        'ranged_weapons' => [
            ['name' => 'Throwing Knife', 'price' => '1 silver', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '1/2 Iron, 1/2 Wood', 'time' => 'Quarter Day', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Throwing Axe', 'price' => '2 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1/2 Iron, 1 Wood', 'time' => 'Quarter Day', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Throwing Spear', 'price' => '2 silver', 'supply' => 'Common', 'weight' => 'Normal', 'raw_materials' => '1/2 Iron, 1 Wood', 'time' => 'Quarter Day', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Sling', 'price' => '1 silver', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '1/2 Leather', 'time' => 'Quarter Day', 'talent' => 'Bowyer', 'tools' => 'Knife'],
            ['name' => 'Short Bow', 'price' => '6 silver', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '1 Wood, 1/4 Leather', 'time' => 'One Day', 'talent' => 'Bowyer', 'tools' => 'Knife'],
            ['name' => 'Longbow', 'price' => '12 silver', 'supply' => 'Uncommon', 'weight' => 'Normal', 'raw_materials' => '2 Wood, 1/4 Leather', 'time' => 'Two Days', 'talent' => 'Bowyer', 'tools' => 'Knife'],
            ['name' => 'Light Crossbow', 'price' => '24 silver', 'supply' => 'Uncommon', 'weight' => 'Normal', 'raw_materials' => '1/2 Iron, 1 Wood, 1 Leather', 'time' => 'One Week', 'talent' => 'Smith, Bowyer', 'tools' => 'Forge'],
            ['name' => 'Heavy Crossbow', 'price' => '4 gold', 'supply' => 'Rare', 'weight' => 'Heavy', 'raw_materials' => '1 Iron, 2 Wood, 1 Leather', 'time' => 'Two Weeks', 'talent' => 'Smith, Bowyer', 'tools' => 'Forge'],
        ],
        'armor' => [
            ['name' => 'Small Shield', 'price' => '6 silver', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '1/2 Iron, 1/2 Wood, 1 Leather', 'time' => 'Quarter Day', 'talent' => 'Smith, Tanner', 'tools' => 'Forge'],
            ['name' => 'Large Shield', 'price' => '15 silver', 'supply' => 'Uncommon', 'weight' => 'Normal', 'raw_materials' => '1 Iron, 1 Wood, 2 Leather', 'time' => 'One Day', 'talent' => 'Smith, Tanner', 'tools' => 'Forge'],
            ['name' => 'Leather', 'price' => '4 silver', 'supply' => 'Common', 'weight' => 'Light', 'raw_materials' => '2 Leather', 'time' => 'One Day', 'talent' => 'Tanner', 'tools' => 'Knife, needle and thread'],
            ['name' => 'Studded Leather', 'price' => '6 silver', 'supply' => 'Uncommon', 'weight' => 'Normal', 'raw_materials' => '1/2 Iron, 2 Leather', 'time' => 'Two Days', 'talent' => 'Smith, Tanner', 'tools' => 'Forge, knife, needle and thread'],
            ['name' => 'Chainmail', 'price' => '24 silver', 'supply' => 'Uncommon', 'weight' => 'Heavy', 'raw_materials' => '3 Iron', 'time' => 'One Week', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Plate Armor', 'price' => '8 gold', 'supply' => 'Rare', 'weight' => 'Heavy', 'raw_materials' => '6 Iron', 'time' => 'Two Weeks', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Studded Leather Cap', 'price' => '3 silver', 'supply' => 'Uncommon', 'weight' => 'Light', 'raw_materials' => '1/2 Iron, 1 Leather', 'time' => 'One Day', 'talent' => 'Smith, Tanner', 'tools' => 'Forge, knife, needle and thread'],
            ['name' => 'Open Helmet', 'price' => '8 silver', 'supply' => 'Uncommon', 'weight' => 'Light', 'raw_materials' => '1 Iron, 1 Leather', 'time' => 'Two Days', 'talent' => 'Smith, Tanner', 'tools' => 'Forge, knife, needle and thread'],
            ['name' => 'Closed Helmet', 'price' => '18 silver', 'supply' => 'Uncommon', 'weight' => 'Normal', 'raw_materials' => '2 Iron', 'time' => 'Two Days', 'talent' => 'Smith', 'tools' => 'Forge'],
            ['name' => 'Great Helm', 'price' => '3 gold', 'supply' => 'Rare', 'weight' => 'Normal', 'raw_materials' => '3 Iron', 'time' => 'One Week', 'talent' => 'Smith', 'tools' => 'Forge'],
        ],
        'clothes' => [
            ['name' => 'Rags', 'price' => '5 copper', 'supply' => 'Common', 'weight' => '-', 'raw_materials' => '1/2 Cloth (wool)', 'time' => 'Quarter Day', 'talent' => '-', 'tools' => '-', 'effect' => 'Penalty –2 to Manipulation.'],
            ['name' => 'Simple Clothes', 'price' => '15 copper', 'supply' => 'Common', 'weight' => '-', 'raw_materials' => '1 Cloth (wool)', 'time' => 'One Day', 'talent' => 'Tailor', 'tools' => 'Needle and thread', 'effect' => ''],
            ['name' => 'Fine Garments', 'price' => '4 gold', 'supply' => 'Rare', 'weight' => '-', 'raw_materials' => '2 Cloth (silk)', 'time' => 'One Week', 'talent' => 'Tailor', 'tools' => 'Needle and thread', 'effect' => 'Gear Bonus +2 to Manipulation.'],
            ['name' => 'Great Fur', 'price' => '3 silver', 'supply' => 'Uncommon', 'weight' => '-', 'raw_materials' => '2 Pelts', 'time' => 'Quarter Day', 'talent' => 'Tailor', 'tools' => 'Needle and thread', 'effect' => 'Gear Bonus +2 against cold.'],
            ['name' => 'Tunic', 'price' => '1 silver', 'supply' => 'Common', 'weight' => '-', 'raw_materials' => '1 Cloth (wool)', 'time' => 'Quarter Day', 'talent' => 'Tailor', 'tools' => 'Needle and thread', 'effect' => ''],
            ['name' => 'Cloak', 'price' => '2 silver', 'supply' => 'Uncommon', 'weight' => '-', 'raw_materials' => '2 Cloth (wool)', 'time' => 'Quarter Day', 'talent' => 'Tailor', 'tools' => 'Needle and thread', 'effect' => ''],
            ['name' => 'Boots', 'price' => '3 silver', 'supply' => 'Uncommon', 'weight' => '-', 'raw_materials' => '2 Leather', 'time' => 'One Day', 'talent' => 'Tanner', 'tools' => 'Needle and thread', 'effect' => 'Gear Bonus +1 to Hiking.'],
            ['name' => 'Silver Buckle', 'price' => '8 silver', 'supply' => 'Uncommon', 'weight' => '-', 'raw_materials' => '1/2 Silver', 'time' => 'One Day', 'talent' => 'Smith', 'tools' => 'Forge', 'effect' => 'Gear Bonus +1 to Manipulation.'],
        ],
    ];
}

function rg_get_trade_goods_by_category(string $category): array
{
    $allGoods = rg_get_trade_goods();
    return $allGoods[$category] ?? [];
}

function rg_get_trade_goods_by_supply(string $supply, string $category = ''): array
{
    $allGoods = rg_get_trade_goods();
    $categoryGoods = $category && isset($allGoods[$category]) 
        ? $allGoods[$category] 
        : array_merge(...array_values($allGoods));
    
    return array_filter($categoryGoods, function($item) use ($supply) {
        return $item['supply'] === $supply;
    });
}

function rg_get_trade_goods_by_weight(string $weight, string $category = ''): array
{
    $allGoods = rg_get_trade_goods();
    $categoryGoods = $category && isset($allGoods[$category]) 
        ? $allGoods[$category] 
        : array_merge(...array_values($allGoods));
    
    return array_filter($categoryGoods, function($item) use ($weight) {
        return $item['weight'] === $weight;
    });
}
