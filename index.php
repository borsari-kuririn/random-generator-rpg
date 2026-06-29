<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/npc_generator.php';
require_once __DIR__ . '/includes/loot_generator.php';
require_once __DIR__ . '/includes/place_generator.php';
require_once __DIR__ . '/includes/romance_generator.php';

$generatorOptions = rg_get_generator_options();
$lootOptions = rg_get_loot_options();
$placeOptions = rg_get_place_options();
$romanceOptions = rg_get_romance_options();
$npc = rg_generate_npc();
$loot = rg_generate_loot();
$place = rg_generate_place();
$romance = rg_generate_romantic_pair();
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wyrm Ledger | Geradores de RPG</title>
    <meta name="description" content="Geradores de NPC, loot, lugares abandonados e pares romanticos para campanhas de fantasia.">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main class="page">
        <header class="hero">
            <p class="kicker">Chronicles Workshop</p>
            <h1>Wyrm Ledger Generators</h1>
            <p class="subtitle">
                Troque entre geradores de NPC, loot, lugares e pares romanticos para montar encontros de fantasia com mais velocidade.
            </p>
        </header>

        <nav class="generator-menu" aria-label="Menu de geradores">
            <button type="button" class="menu-button is-active" data-menu-target="npc" aria-pressed="true">Gerador de NPC</button>
            <button type="button" class="menu-button" data-menu-target="loot" aria-pressed="false">Gerador de Loot</button>
            <button type="button" class="menu-button" data-menu-target="place" aria-pressed="false">Gerador de Lugares</button>
            <button type="button" class="menu-button" data-menu-target="romance" aria-pressed="false">Gerador de Pares Romanticos</button>
        </nav>

        <section class="panel" data-generator-panel="npc" aria-live="polite">
            <div class="controls">
                <div class="levels">
                    <label class="field">
                        <span>Nivel minimo</span>
                        <input type="number" min="1" max="20" value="1" data-level-min>
                    </label>
                    <label class="field">
                        <span>Nivel maximo</span>
                        <input type="number" min="1" max="20" value="12" data-level-max>
                    </label>
                </div>

                <div class="filters">
                    <label class="field">
                        <span>Raca</span>
                        <select data-filter-race>
                            <option value="">Todas</option>
                            <?php foreach ($generatorOptions['races'] as $raceOption): ?>
                                <option value="<?php echo htmlspecialchars($raceOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($raceOption, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="field">
                        <span>Classe</span>
                        <select data-filter-class>
                            <option value="">Todas</option>
                            <?php foreach ($generatorOptions['classes'] as $classOption): ?>
                                <option value="<?php echo htmlspecialchars($classOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($classOption, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="field">
                        <span>Cultura</span>
                        <select data-filter-culture>
                            <option value="">Todas</option>
                            <?php foreach ($generatorOptions['cultures'] as $cultureOption): ?>
                                <option value="<?php echo htmlspecialchars($cultureOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(ucfirst($cultureOption), ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>

                <div class="actions">
                    <button type="button" data-npc-generate-button>Gerar NPC</button>
                    <p class="status" data-npc-status>Pronto para um novo contato de aventura.</p>
                </div>
            </div>

            <article class="card">
                <h2 class="card-title" data-npc-field="name"><?php echo htmlspecialchars($npc['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <div class="grid">
                    <div class="item">
                        <strong>Raca</strong>
                        <p class="value" data-npc-field="race"><?php echo htmlspecialchars($npc['race'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Cultura</strong>
                        <p class="value" data-npc-field="culture"><?php echo htmlspecialchars($npc['culture'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Classe</strong>
                        <p class="value" data-npc-field="class"><?php echo htmlspecialchars($npc['class'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Papel</strong>
                        <p class="value" data-npc-field="role"><?php echo htmlspecialchars($npc['role'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Nivel</strong>
                        <p class="value" data-npc-field="level"><?php echo htmlspecialchars((string)$npc['level'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Traco</strong>
                        <p class="value" data-npc-field="trait"><?php echo htmlspecialchars($npc['trait'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Voz</strong>
                        <p class="value" data-npc-field="voice"><?php echo htmlspecialchars($npc['voice'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Aparencia</strong>
                        <p class="value" data-npc-field="appearance"><?php echo htmlspecialchars($npc['appearance'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Item assinatura</strong>
                        <p class="value" data-npc-field="signature_item"><?php echo htmlspecialchars($npc['signature_item'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Objetivo</strong>
                        <p class="value" data-npc-field="goal"><?php echo htmlspecialchars($npc['goal'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Segredo</strong>
                        <p class="value" data-npc-field="secret"><?php echo htmlspecialchars($npc['secret'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Mania</strong>
                        <p class="value" data-npc-field="quirk"><?php echo htmlspecialchars($npc['quirk'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Gancho para o grupo</strong>
                        <p class="value" data-npc-field="hook"><?php echo htmlspecialchars($npc['hook'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            </article>
        </section>

        <section class="panel is-hidden" data-generator-panel="loot" aria-live="polite">
            <div class="controls">
                <div class="filters filters-two">
                    <label class="field">
                        <span>Origem do loot</span>
                        <select data-loot-source>
                            <option value="">Ambas</option>
                            <?php foreach ($lootOptions['sources'] as $sourceOption): ?>
                                <option value="<?php echo htmlspecialchars($sourceOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($sourceOption === 'pocket' ? 'Bolso' : 'Covil', ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="field">
                        <span>Raridade</span>
                        <select data-loot-rarity>
                            <option value="">Qualquer</option>
                            <?php foreach ($lootOptions['rarities'] as $rarityOption): ?>
                                <option value="<?php echo htmlspecialchars($rarityOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(ucfirst($rarityOption), ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>

                <div class="actions">
                    <button type="button" data-loot-generate-button>Gerar Loot</button>
                    <p class="status" data-loot-status>Pronto para vasculhar bolsos e covis.</p>
                </div>
            </div>

            <article class="card">
                <h2 class="card-title">Pacote de Loot</h2>
                <div class="grid">
                    <div class="item">
                        <strong>Origem</strong>
                        <p class="value" data-loot-field="source"><?php echo htmlspecialchars($loot['source'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Raridade</strong>
                        <p class="value" data-loot-field="rarity"><?php echo htmlspecialchars($loot['rarity'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Moedas</strong>
                        <p class="value" data-loot-field="coins"><?php echo htmlspecialchars($loot['coins'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Gancho narrativo</strong>
                        <p class="value" data-loot-field="hook"><?php echo htmlspecialchars($loot['hook'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>

                <h3 class="loot-subtitle">Itens encontrados</h3>
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
                        <span>Tipo de lugar</span>
                        <select data-place-type>
                            <option value="">Qualquer</option>
                            <?php foreach ($placeOptions['types'] as $typeOption): ?>
                                <option value="<?php echo htmlspecialchars($typeOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(rg_place_label($typeOption), ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="field">
                        <span>Ocupacao atual</span>
                        <select data-place-occupants>
                            <option value="">Qualquer</option>
                            <?php foreach ($placeOptions['occupants'] as $occupantOption): ?>
                                <option value="<?php echo htmlspecialchars($occupantOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(rg_place_label($occupantOption), ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>

                <div class="actions">
                    <button type="button" data-place-generate-button>Gerar Lugar</button>
                    <p class="status" data-place-status>Pronto para revelar ruinas esquecidas.</p>
                </div>
            </div>

            <article class="card">
                <h2 class="card-title" data-place-field="name"><?php echo htmlspecialchars($place['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <div class="grid">
                    <div class="item">
                        <strong>Tipo</strong>
                        <p class="value" data-place-field="type"><?php echo htmlspecialchars($place['type'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Estado</strong>
                        <p class="value" data-place-field="state"><?php echo htmlspecialchars($place['state'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Habitacao</strong>
                        <p class="value" data-place-field="occupants"><?php echo htmlspecialchars($place['occupants'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Perigo principal</strong>
                        <p class="value" data-place-field="main_danger"><?php echo htmlspecialchars($place['main_danger'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Historia de criacao</strong>
                        <p class="value" data-place-field="history"><?php echo htmlspecialchars($place['history'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Quem ficou no lugar</strong>
                        <p class="value" data-place-field="current_inhabitants"><?php echo htmlspecialchars($place['current_inhabitants'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Achado notavel</strong>
                        <p class="value" data-place-field="notable_find"><?php echo htmlspecialchars($place['notable_find'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Gancho de aventura</strong>
                        <p class="value" data-place-field="adventure_hook"><?php echo htmlspecialchars($place['adventure_hook'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            </article>
        </section>

        <section class="panel is-hidden" data-generator-panel="romance" aria-live="polite">
            <div class="controls">
                <div class="filters filters-two">
                    <label class="field">
                        <span>Tom do romance</span>
                        <select data-romance-tone>
                            <option value="">Qualquer</option>
                            <?php foreach ($romanceOptions['tones'] as $toneOption): ?>
                                <option value="<?php echo htmlspecialchars($toneOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(rg_romance_label($toneOption), ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="field">
                        <span>Risco dramatico</span>
                        <select data-romance-drama>
                            <option value="">Qualquer</option>
                            <?php foreach ($romanceOptions['drama_levels'] as $dramaOption): ?>
                                <option value="<?php echo htmlspecialchars($dramaOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(rg_romance_label($dramaOption), ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="field">
                        <span>Genero da pessoa A</span>
                        <select data-romance-gender-a>
                            <option value="">Qualquer</option>
                            <?php foreach ($romanceOptions['genders'] as $genderOption): ?>
                                <option value="<?php echo htmlspecialchars($genderOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($genderOption, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="field">
                        <span>Genero da pessoa B</span>
                        <select data-romance-gender-b>
                            <option value="">Qualquer</option>
                            <?php foreach ($romanceOptions['genders'] as $genderOption): ?>
                                <option value="<?php echo htmlspecialchars($genderOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($genderOption, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>

                <div class="actions">
                    <button type="button" data-romance-generate-button>Gerar Par Romantico</button>
                    <p class="status" data-romance-status>Pronto para criar um casal inesquecivel.</p>
                </div>
            </div>

            <article class="card">
                <h2 class="card-title" data-romance-field="title"><?php echo htmlspecialchars($romance['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <div class="grid">
                    <div class="item">
                        <strong>Tom</strong>
                        <p class="value" data-romance-field="tone"><?php echo htmlspecialchars($romance['tone'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Risco dramatico</strong>
                        <p class="value" data-romance-field="drama"><?php echo htmlspecialchars($romance['drama'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Historia</strong>
                        <p class="value" data-romance-field="history"><?php echo htmlspecialchars($romance['history'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Fase da relacao</strong>
                        <p class="value" data-romance-field="relationship_stage"><?php echo htmlspecialchars($romance['relationship_stage'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Gancho de encontro</strong>
                        <p class="value" data-romance-field="meeting_hook"><?php echo htmlspecialchars($romance['meeting_hook'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Presentes que gostam</strong>
                        <p class="value" data-romance-field="gift_likes"><?php echo htmlspecialchars($romance['gift_likes'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Presentes que nao gostam</strong>
                        <p class="value" data-romance-field="gift_dislikes"><?php echo htmlspecialchars($romance['gift_dislikes'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Morte possivel para drama</strong>
                        <p class="value" data-romance-field="possible_death"><?php echo htmlspecialchars($romance['possible_death'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="item">
                        <strong>Chance dramatica</strong>
                        <p class="value" data-romance-field="death_chance"><?php echo htmlspecialchars($romance['death_chance'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>

                <h3 class="loot-subtitle">Par romantico</h3>
                <ul class="loot-list" data-romance-partners>
                    <?php foreach ($romance['partners'] as $partner): ?>
                        <li>
                            <strong><?php echo htmlspecialchars($partner['name'], ENT_QUOTES, 'UTF-8'); ?></strong>
                            <span><?php echo htmlspecialchars($partner['gender'], ENT_QUOTES, 'UTF-8'); ?> | prefere: <?php echo htmlspecialchars($partner['preference'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <p>Estilo de roupa: <?php echo htmlspecialchars($partner['style'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>
        </section>

        <p class="footer">Material original inspirado em fantasia classica. Nenhum conteudo oficial foi copiado.</p>
    </main>

    <script src="assets/js/app.js" defer></script>
</body>
</html>
