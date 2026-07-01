<?php

declare(strict_types=1);

require_once __DIR__ . '/npc_generator.php';

function rg_get_loot_options(): array
{
    return [
        'sources' => ['pocket', 'lair'],
        'rarities' => ['common', 'uncommon', 'rare', 'legendary'],
    ];
}

function rg_capitalize_words(string $value): string
{
    return ucwords(str_replace('_', ' ', $value));
}

function rg_choose_item_pool(string $rarity): array
{
    $pool = [
        'common' => [
            ['name' => 'Pocket flint striker', 'type' => 'Tool', 'value' => '4 silver', 'detail' => 'Still throws strong sparks.'],
            ['name' => 'Scratched bronze ring', 'type' => 'Adornment', 'value' => '6 silver', 'detail' => 'Its inner initials are nearly erased.'],
            ['name' => 'Needle and thread kit', 'type' => 'Utility', 'value' => '3 silver', 'detail' => 'Stored in a small bone case.'],
            ['name' => 'Folded street map', 'type' => 'Document', 'value' => '2 silver', 'detail' => 'Marks a hidden shortcut through alleys.'],
            ['name' => 'Herbal salve vial', 'type' => 'Consumable', 'value' => '5 silver', 'detail' => 'Useful for minor cuts and burns.'],
            ['name' => 'Tattered leather journal', 'type' => 'Document', 'value' => '3 silver', 'detail' => 'Contains hastily scrawled notes about a journey.'],
            ['name' => 'Iron-banded waterskin', 'type' => 'Container', 'value' => '4 silver', 'detail' => 'Keeps liquids cool for hours.'],
            ['name' => 'Copper compass', 'type' => 'Tool', 'value' => '7 silver', 'detail' => 'Reliable but points slightly northeast.'],
            ['name' => 'Wax-sealed letter', 'type' => 'Document', 'value' => '2 silver', 'detail' => 'Never opened; the seal remains intact.'],
            ['name' => 'Worn prayer beads', 'type' => 'Adornment', 'value' => '5 silver', 'detail' => 'Made from polished stone of unknown origin.'],
            ['name' => 'Grappling hook and rope', 'type' => 'Tool', 'value' => '8 silver', 'detail' => 'Practical and well-maintained.'],
            ['name' => 'Spice pouch', 'type' => 'Consumable', 'value' => '4 silver', 'detail' => 'Contains rare eastern seasonings.'],
            ['name' => 'Chipped drinking horn', 'type' => 'Container', 'value' => '3 silver', 'detail' => 'Still holds its golden sheen.'],
            ['name' => 'Quill and ink bottle', 'type' => 'Utility', 'value' => '4 silver', 'detail' => 'The ink is surprisingly fresh.'],
            ['name' => 'Broken locket', 'type' => 'Adornment', 'value' => '6 silver', 'detail' => 'Contains a faded portrait inside.'],
            ['name' => 'Handkerchief with embroidery', 'type' => 'Clothing', 'value' => '3 silver', 'detail' => 'Decorated with the symbol of a distant house.'],
            ['name' => 'Leather dice pouch', 'type' => 'Game', 'value' => '5 silver', 'detail' => 'Contains slightly worn bone dice.'],
            ['name' => 'Candle stub collection', 'type' => 'Utility', 'value' => '2 silver', 'detail' => 'Seven stubs wrapped in waxed cloth.'],
            ['name' => 'Iron key with worn tag', 'type' => 'Tool', 'value' => '4 silver', 'detail' => 'The tag is illegible with time.'],
            ['name' => 'Cloth pouch of buttons', 'type' => 'Utility', 'value' => '2 silver', 'detail' => 'Buttons of various sizes and materials.'],
            ['name' => 'String of small shells', 'type' => 'Adornment', 'value' => '5 silver', 'detail' => 'Knotted together; smells faintly of brine.'],
            ['name' => 'Merchants\'s tally stick', 'type' => 'Tool', 'value' => '3 silver', 'detail' => 'Notched with counts and marks.'],
            ['name' => 'Dried herbs bundle', 'type' => 'Consumable', 'value' => '4 silver', 'detail' => 'Bound with twine; still aromatic.'],
            ['name' => 'Worn leather work gloves', 'type' => 'Clothing', 'value' => '3 silver', 'detail' => 'Patched multiple times but serviceable.'],
            ['name' => 'Copper trade medallion', 'type' => 'Adornment', 'value' => '7 silver', 'detail' => 'Shows a merchant\'s mark on both sides.'],
            ['name' => 'Knotted counting cord', 'type' => 'Tool', 'value' => '2 silver', 'detail' => 'Used to track inventory or debts.'],
            ['name' => 'Small whetstone', 'type' => 'Tool', 'value' => '6 silver', 'detail' => 'Worn smooth from long use.'],
            ['name' => 'Travelers\' road notes', 'type' => 'Document', 'value' => '3 silver', 'detail' => 'Contains warnings about dangerous paths.'],
            ['name' => 'Tin whistle', 'type' => 'Instrument', 'value' => '5 silver', 'detail' => 'Still holds a clear, bright tone.'],
            ['name' => 'Luck charm wooden pendant', 'type' => 'Adornment', 'value' => '4 silver', 'detail' => 'Carved to resemble a small animal.'],
            ['name' => 'Pouch of salt', 'type' => 'Consumable', 'value' => '2 silver', 'detail' => 'Coarse salt in a sealed cloth bag.'],
            ['name' => 'Bone hairpin set', 'type' => 'Utility', 'value' => '5 silver', 'detail' => 'Carved with delicate patterns.'],
            ['name' => 'Woven grass basket', 'type' => 'Container', 'value' => '3 silver', 'detail' => 'Small but sturdy; sweet-smelling.'],
            ['name' => 'Charcoal stick bundle', 'type' => 'Utility', 'value' => '2 silver', 'detail' => 'Wrapped in cloth; useful for marking.'],
            ['name' => 'Rope with hook attachment', 'type' => 'Tool', 'value' => '6 silver', 'detail' => 'Twenty feet of sturdy rope.'],
            ['name' => 'Clay pipe with herbs', 'type' => 'Consumable', 'value' => '4 silver', 'detail' => 'Still contains fragrant dried leaves.'],
            ['name' => 'Carved wooden token', 'type' => 'Game', 'value' => '3 silver', 'detail' => 'Used as a game piece or marker.'],
            ['name' => 'Silk ribbon collection', 'type' => 'Utility', 'value' => '5 silver', 'detail' => 'Six ribbons in different colors.'],
            ['name' => 'Mirror fragment', 'type' => 'Tool', 'value' => '4 silver', 'detail' => 'Wrapped in cloth to prevent cuts.'],
            ['name' => 'Stone carving of a face', 'type' => 'Curiosity', 'value' => '6 silver', 'detail' => 'Masterfully crafted but unmarked.'],
        ],
        'uncommon' => [
            ['name' => 'Waning Moon pendant', 'type' => 'Amulet', 'value' => '18 silver', 'detail' => 'Turns cold when magic is cast nearby.'],
            ['name' => 'Master key scroll', 'type' => 'Arcane', 'value' => '22 silver', 'detail' => 'Grants advantage on one lockpicking attempt.'],
            ['name' => 'Frontier coin pouch', 'type' => 'Treasure', 'value' => '17 silver', 'detail' => 'Contains mixed coinage from several realms.'],
            ['name' => 'Carved bone dagger', 'type' => 'Weapon', 'value' => '21 silver', 'detail' => 'Lightweight, balanced, and leather-gripped.'],
            ['name' => 'Weak alchemical fire ampoule', 'type' => 'Consumable', 'value' => '25 silver', 'detail' => 'Ignites on contact with air for a few seconds.'],
            ['name' => 'Enchanted silk scarf', 'type' => 'Clothing', 'value' => '19 silver', 'detail' => 'Shimmers faintly in candlelight.'],
            ['name' => 'Silver-traced dagger', 'type' => 'Weapon', 'value' => '28 silver', 'detail' => 'Effective against supernatural creatures.'],
            ['name' => 'Vial of luminous paint', 'type' => 'Utility', 'value' => '16 silver', 'detail' => 'Glows a soft green in darkness.'],
            ['name' => 'Lock of preserved hair', 'type' => 'Curiosity', 'value' => '12 silver', 'detail' => 'Bound with silver thread; smells of lavender.'],
            ['name' => 'Weathered tarot deck', 'type' => 'Game', 'value' => '20 silver', 'detail' => 'Missing only two cards; readings feel uncannily accurate.'],
            ['name' => 'Hollow coin with mechanism', 'type' => 'Tool', 'value' => '24 silver', 'detail' => 'A hidden compartment for secrets.'],
            ['name' => 'Potion of clear sight', 'type' => 'Consumable', 'value' => '26 silver', 'detail' => 'Enhances vision for an hour.'],
            ['name' => 'Runed copper bracelet', 'type' => 'Amulet', 'value' => '23 silver', 'detail' => 'Symbols shift when observed closely.'],
            ['name' => 'Musician\'s lute pick', 'type' => 'Tool', 'value' => '15 silver', 'detail' => 'Carved from pearlescent bone.'],
            ['name' => 'Wax tablet set', 'type' => 'Utility', 'value' => '18 silver', 'detail' => 'Contains secret military garrison layouts.'],
            ['name' => 'Vial of frost essence', 'type' => 'Consumable', 'value' => '27 silver', 'detail' => 'Chills anything it touches for minutes.'],
            ['name' => 'Enchanted chalk', 'type' => 'Utility', 'value' => '14 silver', 'detail' => 'Marks last for weeks without fading.'],
            ['name' => 'Copper wolf pendant', 'type' => 'Amulet', 'value' => '19 silver', 'detail' => 'Hunters claim it guides them true.'],
            ['name' => 'Vial of midnight ink', 'type' => 'Consumable', 'value' => '20 silver', 'detail' => 'Invisible unless viewed by candlelight.'],
            ['name' => 'Stone of memory echo', 'type' => 'Curiosity', 'value' => '16 silver', 'detail' => 'Holders see fleeting images of its past.'],
            ['name' => 'Traveler\'s lodestone', 'type' => 'Navigation', 'value' => '21 silver', 'detail' => 'Always points toward familiar places.'],
            ['name' => 'Whispering feather', 'type' => 'Curiosity', 'value' => '17 silver', 'detail' => 'Seems to hum faintly when held.'],
            ['name' => 'Jar of spring water', 'type' => 'Consumable', 'value' => '13 silver', 'detail' => 'Never stales or spoils; smells fresh.'],
            ['name' => 'Silver clasp brooch', 'type' => 'Adornment', 'value' => '22 silver', 'detail' => 'Bears the crest of a merchant prince.'],
            ['name' => 'Enchanted string', 'type' => 'Utility', 'value' => '15 silver', 'detail' => 'Never tangles no matter how coiled.'],
            ['name' => 'Potion of steady hands', 'type' => 'Consumable', 'value' => '24 silver', 'detail' => 'Prevents tremors and ensures precision.'],
            ['name' => 'Bone charm necklace', 'type' => 'Amulet', 'value' => '18 silver', 'detail' => 'Carved from blessed animal bones.'],
            ['name' => 'Ink and parchment set', 'type' => 'Utility', 'value' => '17 silver', 'detail' => 'Contains a hidden message under the parchment.'],
            ['name' => 'Flask of comfort tea', 'type' => 'Consumable', 'value' => '14 silver', 'detail' => 'Soothes the mind and eases troubled sleep.'],
            ['name' => 'Woven luck bracelet', 'type' => 'Amulet', 'value' => '20 silver', 'detail' => 'Made from threads of seven different colors.'],
            ['name' => 'Potion of nerve steadying', 'type' => 'Consumable', 'value' => '25 silver', 'detail' => 'Bolsters confidence in difficult moments.'],
            ['name' => 'Dragon scale trinket', 'type' => 'Curiosity', 'value' => '26 silver', 'detail' => 'Warm to the touch; genuinely ancient.'],
            ['name' => 'Scribe\'s blessed quill', 'type' => 'Tool', 'value' => '19 silver', 'detail' => 'Never makes errors when truth is written.'],
            ['name' => 'Vial of liquid luck', 'type' => 'Consumable', 'value' => '29 silver', 'detail' => 'Shimmers with iridescent light.'],
            ['name' => 'Sailor\'s protective knot', 'type' => 'Amulet', 'value' => '16 silver', 'detail' => 'Said to protect against drowning.'],
            ['name' => 'Mirror of confidence', 'type' => 'Magical', 'value' => '23 silver', 'detail' => 'Shows the reflection as idealized.'],
            ['name' => 'Scroll of blessings', 'type' => 'Arcane', 'value' => '21 silver', 'detail' => 'Contains protective runes in ancient script.'],
            ['name' => 'Potion of warmth', 'type' => 'Consumable', 'value' => '18 silver', 'detail' => 'Keeps the body comfortable in cold.'],
            ['name' => 'Obsidian ring', 'type' => 'Amulet', 'value' => '24 silver', 'detail' => 'Absorbs hostile intentions of nearby creatures.'],
            ['name' => 'Philosopher\'s stone chip', 'type' => 'Curiosity', 'value' => '27 silver', 'detail' => 'Hinted to have transmutation properties.'],
        ],
        'rare' => [
            ['name' => 'Prismatic silver key', 'type' => 'Minor artifact', 'value' => '95 silver', 'detail' => 'Glows near hidden doors.'],
            ['name' => 'Military command rune', 'type' => 'Insignia', 'value' => '82 silver', 'detail' => 'Opens old barracks strongboxes.'],
            ['name' => 'Silent-step ring', 'type' => 'Magical', 'value' => '110 silver', 'detail' => 'Muffles footsteps for a few minutes per day.'],
            ['name' => 'Draconic scale totem', 'type' => 'Reliquary', 'value' => '120 silver', 'detail' => 'Warms up when monsters draw near.'],
            ['name' => 'Bottled mist flask', 'type' => 'Magical consumable', 'value' => '88 silver', 'detail' => 'Creates dense cover in a short corridor.'],
            ['name' => 'Obsidian blade of night', 'type' => 'Weapon', 'value' => '135 silver', 'detail' => 'Never rusts; seems to absorb light.'],
            ['name' => 'Crown of silver vines', 'type' => 'Headwear', 'value' => '142 silver', 'detail' => 'Wearer feels a faint connection to nature.'],
            ['name' => 'Spellbook of forgotten arts', 'type' => 'Arcane', 'value' => '168 silver', 'detail' => 'Contains three spells; the language is archaic but readable.'],
            ['name' => 'Mirror of true reflection', 'type' => 'Magical', 'value' => '105 silver', 'detail' => 'Shows illusions and disguises cannot hide.'],
            ['name' => 'Seal of the Deep Monarch', 'type' => 'Insignia', 'value' => '118 silver', 'detail' => 'Opens vaults in underwater ruins.'],
            ['name' => 'Cloak of emerald whispers', 'type' => 'Clothing', 'value' => '128 silver', 'detail' => 'Allows communication with natural creatures.'],
            ['name' => 'Vial of temporal essence', 'type' => 'Consumable', 'value' => '155 silver', 'detail' => 'Slows time for a brief moment when consumed.'],
            ['name' => 'Sapphire compass of stars', 'type' => 'Navigation', 'value' => '98 silver', 'detail' => 'Never loses its way, even underground.'],
            ['name' => 'Ring of merchant\'s fortune', 'type' => 'Amulet', 'value' => '112 silver', 'detail' => 'Increases chances of favorable trade.'],
            ['name' => 'Shattered memory crown', 'type' => 'Artifact', 'value' => '176 silver', 'detail' => 'Reveals glimpses of its previous wearer\'s thoughts.'],
            ['name' => 'Staff of the forest guardian', 'type' => 'Weapon', 'value' => '145 silver', 'detail' => 'Wood never decays; leaves sprout from the grip.'],
            ['name' => 'Amulet of shadow stepping', 'type' => 'Magical', 'value' => '138 silver', 'detail' => 'Allows brief teleportation through shadows.'],
            ['name' => 'Scroll of binding', 'type' => 'Arcane', 'value' => '125 silver', 'detail' => 'Magically constrains creatures when read aloud.'],
            ['name' => 'Pendant of the forgotten name', 'type' => 'Mystical', 'value' => '99 silver', 'detail' => 'Protects the wearer from being remembered.'],
            ['name' => 'Crystalline sphere of prophecy', 'type' => 'Divination', 'value' => '162 silver', 'detail' => 'Swirls with visions of possible futures.'],
            ['name' => 'Boots of swift passage', 'type' => 'Clothing', 'value' => '117 silver', 'detail' => 'Doubles travel speed for limited durations.'],
            ['name' => 'Mask of the noble face', 'type' => 'Artifact', 'value' => '131 silver', 'detail' => 'Changes the wearer\'s appearance subtly.'],
            ['name' => 'Vial of phoenix ash', 'type' => 'Consumable', 'value' => '147 silver', 'detail' => 'Grants one resurrection if consumed at death.'],
            ['name' => 'Gauntlets of crushing might', 'type' => 'Armor', 'value' => '156 silver', 'detail' => 'Enhances strength dramatically for brief moments.'],
            ['name' => 'Tome of binding contracts', 'type' => 'Arcane', 'value' => '159 silver', 'detail' => 'Creates unbreakable magical agreements.'],
            ['name' => 'Ring of invisible chains', 'type' => 'Magical', 'value' => '128 silver', 'detail' => 'Binds creatures to a location psychically.'],
            ['name' => 'Whistle of commanding beasts', 'type' => 'Instrument', 'value' => '133 silver', 'detail' => 'Creatures obey the wielder\'s mental commands.'],
            ['name' => 'Charm of the eternal watcher', 'type' => 'Amulet', 'value' => '89 silver', 'detail' => 'Grants awareness of nearby threats.'],
            ['name' => 'Lens of far seeing', 'type' => 'Tool', 'value' => '107 silver', 'detail' => 'Magnifies distant sights with perfect clarity.'],
            ['name' => 'Rope of binding shadows', 'type' => 'Tool', 'value' => '92 silver', 'detail' => 'Ties made with this rope never break.'],
            ['name' => 'Bracelet of healing warmth', 'type' => 'Magical', 'value' => '141 silver', 'detail' => 'Accelerates natural healing of wounds.'],
            ['name' => 'Bottle of captured lightning', 'type' => 'Consumable', 'value' => '163 silver', 'detail' => 'Unleashes a bolt when uncorked.'],
            ['name' => 'Chalice of life restoration', 'type' => 'Artifact', 'value' => '172 silver', 'detail' => 'Any liquid in it becomes restorative.'],
            ['name' => 'Sigil of warding', 'type' => 'Magical', 'value' => '104 silver', 'detail' => 'Creates a protective barrier around the bearer.'],
            ['name' => 'Coat of hidden pockets', 'type' => 'Clothing', 'value' => '123 silver', 'detail' => 'Contains far more than its size allows.'],
        ],
        'legendary' => [
            ['name' => 'Vitrified wyrm tear', 'type' => 'Relic', 'value' => '1,300 silver', 'detail' => 'Can empower an ancient ritual.'],
            ['name' => 'Sunken Throne seal', 'type' => 'Royal insignia', 'value' => '1,050 silver', 'detail' => 'Recognized by extinct noble houses.'],
            ['name' => 'Star-thread breastplate', 'type' => 'Ritual armor', 'value' => '1,600 silver', 'detail' => 'Reflects light like moving constellations.'],
            ['name' => 'Hourglass of Eternal Watch', 'type' => 'Artifact', 'value' => '1,420 silver', 'detail' => 'Lets you replay the last few seconds of an event.'],
            ['name' => 'Horn of the First Siege', 'type' => 'War instrument', 'value' => '1,200 silver', 'detail' => 'Its call inspires courage in allies.'],
            ['name' => 'Scepter of the Undying King', 'type' => 'Royal regalia', 'value' => '2,100 silver', 'detail' => 'Commands authority over spirits and undead.'],
            ['name' => 'Blade of the Fell Architect', 'type' => 'Legendary weapon', 'value' => '2,800 silver', 'detail' => 'Said to cut through any material, living or otherwise.'],
            ['name' => 'Crown of Endless Night', 'type' => 'Headwear', 'value' => '1,950 silver', 'detail' => 'Shadow clings to the wearer; they walk unseen.'],
            ['name' => 'Grimoire of Binding Oaths', 'type' => 'Spellbook', 'value' => '2,350 silver', 'detail' => 'Once bound by oath, none can break the pact.'],
            ['name' => 'Dragon\'s Heart Crystal', 'type' => 'Relic', 'value' => '3,200 silver', 'detail' => 'Pulses with the heartbeat of a dead god.'],
            ['name' => 'Veil of the Three Worlds', 'type' => 'Clothing', 'value' => '2,600 silver', 'detail' => 'Walk between the material and spirit realms.'],
            ['name' => 'Key to the Sunken City', 'type' => 'Artifact', 'value' => '1,800 silver', 'detail' => 'Opens passages to submerged kingdoms.'],
            ['name' => 'Amulet of the First Oath', 'type' => 'Sacred relic', 'value' => '2,200 silver', 'detail' => 'Binds the wearer to the old pacts of creation.'],
            ['name' => 'Crown of the Eternal Court', 'type' => 'Regalia', 'value' => '2,750 silver', 'detail' => 'Summons the presence of the ancient rulers.'],
            ['name' => 'The Silent Blade', 'type' => 'Cursed weapon', 'value' => '2,500 silver', 'detail' => 'Kills silently; victims never cry out.'],
            ['name' => 'Orb of Creation\'s Will', 'type' => 'Relic', 'value' => '3,500 silver', 'detail' => 'Contains the power to reshape reality.'],
            ['name' => 'Cloak of the Wandering Star', 'type' => 'Clothing', 'value' => '2,400 silver', 'detail' => 'Allows travel through the night sky itself.'],
            ['name' => 'Throne of Eternal Dominion', 'type' => 'Artifact', 'value' => '4,200 silver', 'detail' => 'Seated upon it, one rules all kingdoms.'],
            ['name' => 'The Shattered Crown of Ages', 'type' => 'Artifact', 'value' => '3,100 silver', 'detail' => 'Each fragment grants a different immortality.'],
            ['name' => 'Bow of the Starfall', 'type' => 'Legendary weapon', 'value' => '2,900 silver', 'detail' => 'Arrows never miss their intended target.'],
            ['name' => 'Chalice of the Eternal Feast', 'type' => 'Artifact', 'value' => '2,150 silver', 'detail' => 'Provides sustenance that never fails.'],
            ['name' => 'Seal of the Original Pact', 'type' => 'Royal insignia', 'value' => '3,400 silver', 'detail' => 'Binds gods and mortals to treaties.'],
            ['name' => 'Mirror of Absolute Truth', 'type' => 'Magical artifact', 'value' => '2,700 silver', 'detail' => 'Reveals all lies and illusions forever.'],
            ['name' => 'The Codex of Endless Names', 'type' => 'Spellbook', 'value' => '3,850 silver', 'detail' => 'Contains the true name of all things.'],
            ['name' => 'Boots of the Void Strider', 'type' => 'Clothing', 'value' => '2,300 silver', 'detail' => 'Step between moments and places instantly.'],
            ['name' => 'Sword of the Dying Sun', 'type' => 'Legendary weapon', 'value' => '3,600 silver', 'detail' => 'Burns with the last light of the world.'],
            ['name' => 'Mantle of the Titan\'s Flesh', 'type' => 'Armor', 'value' => '2,850 silver', 'detail' => 'Grants size and strength of the ancients.'],
            ['name' => 'The Unending Scroll', 'type' => 'Artifact', 'value' => '3,250 silver', 'detail' => 'Contains all knowledge ever written.'],
            ['name' => 'Ring of the Eternal Flame', 'type' => 'Magical', 'value' => '2,200 silver', 'detail' => 'Burns away all corruption and decay.'],
            ['name' => 'Lance of the First Dawn', 'type' => 'Legendary weapon', 'value' => '3,700 silver', 'detail' => 'Pierces through darkness and despair.'],
            ['name' => 'Crown of the Sleeping God', 'type' => 'Headwear', 'value' => '3,950 silver', 'detail' => 'Wearer gains the wisdom of the cosmos.'],
            ['name' => 'Scythe of Time\'s End', 'type' => 'Legendary weapon', 'value' => '4,100 silver', 'detail' => 'Cuts through fate itself; even the immortal fear it.'],
            ['name' => 'The Thousand-Year Chain', 'type' => 'Artifact', 'value' => '2,600 silver', 'detail' => 'Binds anything; even gods cannot break it.'],
            ['name' => 'Pendant of the First Breath', 'type' => 'Sacred relic', 'value' => '3,150 silver', 'detail' => 'Grants life itself to the dying.'],
            ['name' => 'Armor of the Fallen God', 'type' => 'Legendary armor', 'value' => '4,300 silver', 'detail' => 'Protects the wearer from all harm divine.'],
        ],
    ];

    return $pool[$rarity] ?? $pool['common'];
}

function rg_generate_loot(array $options = []): array
{
    $lootOptions = rg_get_loot_options();

    $selectedSource = isset($options['source']) && is_string($options['source'])
        ? rg_filter_value(trim($options['source']), $lootOptions['sources'])
        : null;
    $selectedRarity = isset($options['rarity']) && is_string($options['rarity'])
        ? rg_filter_value(trim($options['rarity']), $lootOptions['rarities'])
        : null;

    $source = $selectedSource ?? rg_pick($lootOptions['sources']);
    $rarity = $selectedRarity ?? rg_pick($lootOptions['rarities']);

    $itemPool = rg_choose_item_pool($rarity);

    $countMin = $source === 'lair' ? 2 : 1;
    $countMax = $source === 'lair' ? 5 : 3;
    $itemCount = random_int($countMin, $countMax);

    $items = [];
    $usedIndexes = [];

    while (count($items) < $itemCount) {
        $index = array_rand($itemPool);
        if (isset($usedIndexes[$index])) {
            continue;
        }

        $usedIndexes[$index] = true;
        $item = $itemPool[$index];
        $item['condition'] = rg_pick(['Intact', 'Worn', 'Stained', 'Well-preserved', 'Partially broken']);
        $items[] = $item;
    }

    return [
        'source' => rg_capitalize_words($source),
        'rarity' => rg_capitalize_words($rarity),
        'coins' => random_int($source === 'lair' ? 20 : 4, $source === 'lair' ? 180 : 55) . ' silver coins',
        'items' => $items,
        'hook' => $source === 'lair'
            ? rg_pick([
                'One of the items bears the emblem of a forgotten cult.',
                'There are fresh signs of smuggling activity in this lair.',
                'One item points to a buyer in the capital.',
            ])
            : rg_pick([
                'The most valuable item appears to be stolen from a local temple.',
                'An engraved symbol links this loot to an urban gang.',
                'The original owner may still be alive and looking for it.',
            ]),
    ];
}
