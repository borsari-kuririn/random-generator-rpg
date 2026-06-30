<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/npc_generator.php';
require_once __DIR__ . '/includes/loot_generator.php';
require_once __DIR__ . '/includes/place_generator.php';
require_once __DIR__ . '/includes/romance_generator.php';
require_once __DIR__ . '/includes/company_generator.php';

$generatorOptions = rg_get_generator_options();
$lootOptions = rg_get_loot_options();
$placeOptions = rg_get_place_options();
$romanceOptions = rg_get_romance_options();
$companyOptions = rg_get_company_options();
$npc = rg_generate_npc();
$loot = rg_generate_loot();
$place = rg_generate_place();
$romance = rg_generate_romantic_pair();
$company = rg_generate_company();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wyrm Ledger | RPG Generators</title>
    <meta name="description" content="NPC, loot, abandoned place, romantic pair, and company generators for fantasy campaigns.">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main class="page">
        <header class="hero">
            <p class="kicker">Chronicles Workshop</p>
            <h1>Wyrm Ledger Generators</h1>
            <p class="subtitle">
                Switch between NPC, loot, place, romantic pair, and company generators to build fantasy encounters faster.
            </p>
        </header>

        <nav class="generator-menu" aria-label="Generator menu">
            <button type="button" class="menu-button is-active" data-menu-target="npc" aria-pressed="true">NPC Generator</button>
            <button type="button" class="menu-button" data-menu-target="loot" aria-pressed="false">Loot Generator</button>
            <button type="button" class="menu-button" data-menu-target="place" aria-pressed="false">Place Generator</button>
            <button type="button" class="menu-button" data-menu-target="romance" aria-pressed="false">Romantic Pair Generator</button>
            <button type="button" class="menu-button" data-menu-target="company" aria-pressed="false">Company Generator</button>
        </nav>

        <section class="panel" data-generator-panel="npc" aria-live="polite">
            <div class="controls">
                <div class="levels">
                    <label class="field">
                        <span>Minimum level</span>
                        <input type="number" min="1" max="20" value="1" data-level-min>
                    </label>
                    <label class="field">
                        <span>Maximum level</span>
                        <input type="number" min="1" max="20" value="12" data-level-max>
                    </label>
                </div>

                <div class="filters">
                    <label class="field">
                        <span>Race</span>
                        <select data-filter-race>
                            <option value="">Any</option>
                            <?php foreach ($generatorOptions['races'] as $raceOption): ?>
                                <option value="<?php echo htmlspecialchars($raceOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($raceOption, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="field">
                        <span>Class</span>
                        <select data-filter-class>
                            <option value="">Any</option>
                            <?php foreach ($generatorOptions['classes'] as $classOption): ?>
                                <option value="<?php echo htmlspecialchars($classOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($classOption, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="field">
                        <span>Culture</span>
                        <select data-filter-culture>
                            <option value="">Any</option>
                            <?php foreach ($generatorOptions['cultures'] as $cultureOption): ?>
                                <option value="<?php echo htmlspecialchars($cultureOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(ucfirst($cultureOption), ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>

                <div class="actions">
                    <button type="button" data-npc-generate-button>Generate NPC</button>
                    <p class="status" data-npc-status>Ready for a new adventure contact.</p>
                </div>
            </div>

            <article class="card">
                <h2 class="card-title" data-npc-field="name"><?php echo htmlspecialchars($npc['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <div class="grid">
                    <div class="item">
                        <strong>Race</strong>
                        <p class="value" data-npc-field="race"><?php echo htmlspecialchars($npc['race'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Culture</strong>
                        <p class="value" data-npc-field="culture"><?php echo htmlspecialchars($npc['culture'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Class</strong>
                        <p class="value" data-npc-field="class"><?php echo htmlspecialchars($npc['class'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Role</strong>
                        <p class="value" data-npc-field="role"><?php echo htmlspecialchars($npc['role'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Level</strong>
                        <p class="value" data-npc-field="level"><?php echo htmlspecialchars((string)$npc['level'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Trait</strong>
                        <p class="value" data-npc-field="trait"><?php echo htmlspecialchars($npc['trait'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Voice</strong>
                        <p class="value" data-npc-field="voice"><?php echo htmlspecialchars($npc['voice'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Appearance</strong>
                        <p class="value" data-npc-field="appearance"><?php echo htmlspecialchars($npc['appearance'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Signature item</strong>
                        <p class="value" data-npc-field="signature_item"><?php echo htmlspecialchars($npc['signature_item'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Goal</strong>
                        <p class="value" data-npc-field="goal"><?php echo htmlspecialchars($npc['goal'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Secret</strong>
                        <p class="value" data-npc-field="secret"><?php echo htmlspecialchars($npc['secret'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Quirk</strong>
                        <p class="value" data-npc-field="quirk"><?php echo htmlspecialchars($npc['quirk'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Party hook</strong>
                        <p class="value" data-npc-field="hook"><?php echo htmlspecialchars($npc['hook'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            </article>
        </section>

        <section class="panel is-hidden" data-generator-panel="loot" aria-live="polite">
            <div class="controls">
                <div class="filters filters-two">
                    <label class="field">
                        <span>Loot source</span>
                        <select data-loot-source>
                            <option value="">Any</option>
                            <?php foreach ($lootOptions['sources'] as $sourceOption): ?>
                                <option value="<?php echo htmlspecialchars($sourceOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($sourceOption === 'pocket' ? 'Pocket' : 'Lair', ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="field">
                        <span>Rarity</span>
                        <select data-loot-rarity>
                            <option value="">Any</option>
                            <?php foreach ($lootOptions['rarities'] as $rarityOption): ?>
                                <option value="<?php echo htmlspecialchars($rarityOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(ucfirst($rarityOption), ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>

                <div class="actions">
                    <button type="button" data-loot-generate-button>Generate Loot</button>
                    <p class="status" data-loot-status>Ready to search pockets and lairs.</p>
                </div>
            </div>

            <article class="card">
                <h2 class="card-title">Loot Bundle</h2>
                <div class="grid">
                    <div class="item">
                        <strong>Source</strong>
                        <p class="value" data-loot-field="source"><?php echo htmlspecialchars($loot['source'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Rarity</strong>
                        <p class="value" data-loot-field="rarity"><?php echo htmlspecialchars($loot['rarity'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Coins</strong>
                        <p class="value" data-loot-field="coins"><?php echo htmlspecialchars($loot['coins'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Narrative hook</strong>
                        <p class="value" data-loot-field="hook"><?php echo htmlspecialchars($loot['hook'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>

                <h3 class="loot-subtitle">Found items</h3>
                <ul class="loot-list" data-loot-items>
                    <?php foreach ($loot['items'] as $item): ?>
                        <li>
                            <strong><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></strong>
                            <span><?php echo htmlspecialchars($item['type'], ENT_QUOTES, 'UTF-8'); ?> | <?php echo htmlspecialchars($item['condition'], ENT_QUOTES, 'UTF-8'); ?> | <?php echo htmlspecialchars($item['value'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <p><?php echo htmlspecialchars($item['detail'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>
        </section>

        <section class="panel is-hidden" data-generator-panel="place" aria-live="polite">
            <div class="controls">
                <div class="filters filters-two">
                    <label class="field">
                        <span>Place type</span>
                        <select data-place-type>
                            <option value="">Any</option>
                            <?php foreach ($placeOptions['types'] as $typeOption): ?>
                                <option value="<?php echo htmlspecialchars($typeOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(rg_place_label($typeOption), ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="field">
                        <span>Current occupants</span>
                        <select data-place-occupants>
                            <option value="">Any</option>
                            <?php foreach ($placeOptions['occupants'] as $occupantOption): ?>
                                <option value="<?php echo htmlspecialchars($occupantOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(rg_place_label($occupantOption), ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>

                <div class="actions">
                    <button type="button" data-place-generate-button>Generate Place</button>
                    <p class="status" data-place-status>Ready to reveal forgotten ruins.</p>
                </div>
            </div>

            <article class="card">
                <h2 class="card-title" data-place-field="name"><?php echo htmlspecialchars($place['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <div class="grid">
                    <div class="item">
                        <strong>Type</strong>
                        <p class="value" data-place-field="type"><?php echo htmlspecialchars($place['type'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>State</strong>
                        <p class="value" data-place-field="state"><?php echo htmlspecialchars($place['state'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Occupants</strong>
                        <p class="value" data-place-field="occupants"><?php echo htmlspecialchars($place['occupants'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Main danger</strong>
                        <p class="value" data-place-field="main_danger"><?php echo htmlspecialchars($place['main_danger'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Creation history</strong>
                        <p class="value" data-place-field="history"><?php echo htmlspecialchars($place['history'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Who remained there</strong>
                        <p class="value" data-place-field="current_inhabitants"><?php echo htmlspecialchars($place['current_inhabitants'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Notable find</strong>
                        <p class="value" data-place-field="notable_find"><?php echo htmlspecialchars($place['notable_find'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Adventure hook</strong>
                        <p class="value" data-place-field="adventure_hook"><?php echo htmlspecialchars($place['adventure_hook'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            </article>
        </section>

        <section class="panel is-hidden" data-generator-panel="romance" aria-live="polite">
            <div class="controls">
                <div class="filters filters-two">
                    <label class="field">
                        <span>Romance tone</span>
                        <select data-romance-tone>
                            <option value="">Any</option>
                            <?php foreach ($romanceOptions['tones'] as $toneOption): ?>
                                <option value="<?php echo htmlspecialchars($toneOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(rg_romance_label($toneOption), ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="field">
                        <span>Drama level</span>
                        <select data-romance-drama>
                            <option value="">Any</option>
                            <?php foreach ($romanceOptions['drama_levels'] as $dramaOption): ?>
                                <option value="<?php echo htmlspecialchars($dramaOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(rg_romance_label($dramaOption), ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="field">
                        <span>Partner A gender</span>
                        <select data-romance-gender-a>
                            <option value="">Any</option>
                            <?php foreach ($romanceOptions['genders'] as $genderOption): ?>
                                <option value="<?php echo htmlspecialchars($genderOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($genderOption, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="field">
                        <span>Partner B gender</span>
                        <select data-romance-gender-b>
                            <option value="">Any</option>
                            <?php foreach ($romanceOptions['genders'] as $genderOption): ?>
                                <option value="<?php echo htmlspecialchars($genderOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($genderOption, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>

                <div class="actions">
                    <button type="button" data-romance-generate-button>Generate Romantic Pair</button>
                    <p class="status" data-romance-status>Ready to craft an unforgettable couple.</p>
                </div>
            </div>

            <article class="card">
                <h2 class="card-title" data-romance-field="title"><?php echo htmlspecialchars($romance['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <div class="grid">
                    <div class="item">
                        <strong>Tone</strong>
                        <p class="value" data-romance-field="tone"><?php echo htmlspecialchars($romance['tone'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Drama level</strong>
                        <p class="value" data-romance-field="drama"><?php echo htmlspecialchars($romance['drama'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>History</strong>
                        <p class="value" data-romance-field="history"><?php echo htmlspecialchars($romance['history'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Relationship stage</strong>
                        <p class="value" data-romance-field="relationship_stage"><?php echo htmlspecialchars($romance['relationship_stage'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Meeting hook</strong>
                        <p class="value" data-romance-field="meeting_hook"><?php echo htmlspecialchars($romance['meeting_hook'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Liked gifts</strong>
                        <p class="value" data-romance-field="gift_likes"><?php echo htmlspecialchars($romance['gift_likes'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Disliked gifts</strong>
                        <p class="value" data-romance-field="gift_dislikes"><?php echo htmlspecialchars($romance['gift_dislikes'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Possible dramatic death</strong>
                        <p class="value" data-romance-field="possible_death"><?php echo htmlspecialchars($romance['possible_death'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Dramatic chance</strong>
                        <p class="value" data-romance-field="death_chance"><?php echo htmlspecialchars($romance['death_chance'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>

                <h3 class="loot-subtitle">Romantic pair</h3>
                <ul class="loot-list" data-romance-partners>
                    <?php foreach ($romance['partners'] as $partner): ?>
                        <li>
                            <strong><?php echo htmlspecialchars($partner['name'], ENT_QUOTES, 'UTF-8'); ?></strong>
                            <span><?php echo htmlspecialchars($partner['gender'], ENT_QUOTES, 'UTF-8'); ?> | prefers: <?php echo htmlspecialchars($partner['preference'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <p>Clothing style: <?php echo htmlspecialchars($partner['style'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>
        </section>

        <section class="panel is-hidden" data-generator-panel="company" aria-live="polite">
            <div class="controls">
                <div class="filters">
                    <label class="field">
                        <span>Size</span>
                        <select data-company-size>
                            <option value="">Any</option>
                            <?php foreach ($companyOptions['sizes'] as $sizeOption): ?>
                                <option value="<?php echo htmlspecialchars($sizeOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(rg_company_label($sizeOption), ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="field">
                        <span>Company type</span>
                        <select data-company-kind>
                            <option value="">Any</option>
                            <?php foreach ($companyOptions['kinds'] as $kindOption): ?>
                                <option value="<?php echo htmlspecialchars($kindOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(rg_company_label($kindOption), ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="field">
                        <span>Sphere focus</span>
                        <select data-company-focus>
                            <option value="">Any</option>
                            <?php foreach ($companyOptions['spheres'] as $sphereOption): ?>
                                <option value="<?php echo htmlspecialchars($sphereOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(rg_company_label($sphereOption), ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>

                <div class="actions">
                    <button type="button" data-company-generate-button>Generate Company</button>
                    <p class="status" data-company-status>Ready to establish a new company.</p>
                </div>
            </div>

            <article class="card">
                <h2 class="card-title" data-company-field="name"><?php echo htmlspecialchars($company['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <div class="grid">
                    <div class="item">
                        <strong>Type</strong>
                        <p class="value" data-company-field="kind"><?php echo htmlspecialchars($company['kind'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Size</strong>
                        <p class="value" data-company-field="size"><?php echo htmlspecialchars($company['size'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Multiplier</strong>
                        <p class="value" data-company-field="multiplier"><?php echo htmlspecialchars($company['multiplier'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Stability (4d6)</strong>
                        <p class="value" data-company-field="stability"><?php echo htmlspecialchars($company['stability'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Structure (1d6-1)</strong>
                        <p class="value" data-company-field="structure"><?php echo htmlspecialchars($company['structure'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Wealth</strong>
                        <p class="value" data-company-field="wealth"><?php echo htmlspecialchars($company['wealth'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Power</strong>
                        <p class="value" data-company-field="power"><?php echo htmlspecialchars($company['power'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Influence</strong>
                        <p class="value" data-company-field="influence"><?php echo htmlspecialchars($company['influence'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Intrigue</strong>
                        <p class="value" data-company-field="intrigue"><?php echo htmlspecialchars($company['intrigue'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Magic</strong>
                        <p class="value" data-company-field="magic"><?php echo htmlspecialchars($company['magic'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Production</strong>
                        <p class="value" data-company-field="production"><?php echo htmlspecialchars($company['production'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Specialization</strong>
                        <p class="value" data-company-field="specialization"><?php echo htmlspecialchars($company['specialization'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Resource projection</strong>
                        <p class="value" data-company-field="resource_projection"><?php echo htmlspecialchars($company['resource_projection'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Growth roll</strong>
                        <p class="value" data-company-field="event_rule"><?php echo htmlspecialchars($company['event_rule'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>ENGODO roll</strong>
                        <p class="value" data-company-field="engodo_rule"><?php echo htmlspecialchars($company['engodo_rule'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Adventure hook</strong>
                        <p class="value" data-company-field="hook"><?php echo htmlspecialchars($company['hook'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            </article>
        </section>

        <p class="footer">Original material inspired by classic fantasy. No official content was copied.</p>
    </main>

    <script src="assets/js/app.js" defer></script>
</body>
</html>
