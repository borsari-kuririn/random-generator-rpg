<?php

declare(strict_types=1);

require_once __DIR__ . '/npc_generator.php';

function rg_get_place_options(): array
{
    return [
        'types' => ['castle', 'fortress', 'tower', 'keep', 'sanctum'],
        'occupants' => ['monster', 'remnants', 'mixed'],
    ];
}

function rg_place_label(string $value): string
{
    $labels = [
        'castle' => 'Castelo',
        'fortress' => 'Fortaleza',
        'tower' => 'Torre',
        'keep' => 'Bastiao',
        'sanctum' => 'Santuario',
        'monster' => 'Monstros',
        'remnants' => 'Habitantes remanescentes',
        'mixed' => 'Monstros e remanescentes',
    ];

    return $labels[$value] ?? ucfirst($value);
}

function rg_place_name(string $type): string
{
    $prefixes = ['Pedra', 'Bruma', 'Cinza', 'Ferro', 'Eco', 'Vigia', 'Luar', 'Corvo'];
    $suffixByType = [
        'castle' => ['do Trono Oco', 'de Ravenhall', 'das Bandeiras Quebradas'],
        'fortress' => ['do Dique Negro', 'das Sete Muralhas', 'do Passo Frio'],
        'tower' => ['dos Sinos Mudos', 'da Vigia Perdida', 'da Lua Partida'],
        'keep' => ['de Maralto', 'do Portao Velho', 'do Juramento Caiado'],
        'sanctum' => ['do Coro Silente', 'das Chamas Frias', 'da Rosa de Sal'],
    ];

    $suffixPool = $suffixByType[$type] ?? $suffixByType['castle'];

    return rg_place_label($type) . ' ' . rg_pick($prefixes) . ' ' . rg_pick($suffixPool);
}

function rg_build_place_history(string $type, string $creator, string $age, string $fall): string
{
    $purposeByType = [
        'castle' => 'sede de uma casa nobre fronteirica',
        'fortress' => 'linha defensiva contra invasoes do norte',
        'tower' => 'posto de observacao de rotas comerciais',
        'keep' => 'quartel de elite para proteger uma passagem montanhosa',
        'sanctum' => 'refugio ritual de uma ordem sacerdotal',
    ];

    $purpose = $purposeByType[$type] ?? $purposeByType['castle'];

    return 'Erguido por ' . $creator . ' ha ' . $age . ', o local servia como ' . $purpose . '. '
        . 'A decadencia comecou quando ' . $fall . '.';
}

function rg_generate_place(array $options = []): array
{
    $placeOptions = rg_get_place_options();

    $selectedType = isset($options['type']) && is_string($options['type'])
        ? rg_filter_value(trim($options['type']), $placeOptions['types'])
        : null;
    $selectedOccupants = isset($options['occupants']) && is_string($options['occupants'])
        ? rg_filter_value(trim($options['occupants']), $placeOptions['occupants'])
        : null;

    $type = $selectedType ?? rg_pick($placeOptions['types']);
    $occupants = $selectedOccupants ?? rg_pick($placeOptions['occupants']);

    $creators = [
        'a rainha Isolde de Marfim',
        'o conclave dos Magos de Ferro',
        'o general Torven na ultima guerra de sucessao',
        'monges cartografos da Ordem do Farol',
        'a casa Velkar antes de sua queda',
    ];

    $ages = ['120 anos', '240 anos', '370 anos', '500 anos', 'quase 700 anos'];
    $fallReasons = [
        'um cerco de tres invernos destruiu os celeiros',
        'um pacto arcano saiu do controle no salao central',
        'uma praga levou a maior parte da guarnicao',
        'as minas da regiao secaram e o lugar perdeu importancia',
        'a linhagem governante desapareceu sem herdeiros',
    ];

    $monsterGroups = [
        'ninho de aranhas de tumulo e suas crias albinas',
        'matilha de lobos sombrios guiados por um alfa marcado',
        'tropa de goblins ferreiros comandada por um capataz brutal',
        'espectros de antigos sentinelas presos ao juramento',
        'um ogro erudito que coleciona reliquias roubadas',
    ];

    $remnantGroups = [
        'um pequeno culto de sobreviventes que protege arquivos antigos',
        'desertores que transformaram o patio interno em mercado ilegal',
        'familias de refugiados vivendo nas galerias secas',
        'um punhado de monges que se recusa a abandonar o altar',
        'cacadores de reliquias que ocupam as torres externas',
    ];

    $dangers = [
        'armadilhas antigas ainda ativas nos corredores inferiores',
        'corredores instaveis que podem ceder com peso excessivo',
        'uma fenda arcana que distorce sons e distancia',
        'pocos de agua contaminados por fungos luminosos',
        'portas seladas por runas que disparam alarmes espectrais',
    ];

    $treasures = [
        'um cofre mural com mapas militares intactos',
        'relicarios com selos de uma dinastia extinta',
        'um observatorio com lentes de cristal raro',
        'um arsenal com armamento antigo ainda funcional',
        'um tomo de genealogias que prova antigas reivindicacoes',
    ];

    $creator = rg_pick($creators);
    $age = rg_pick($ages);
    $fall = rg_pick($fallReasons);
    $danger = rg_pick($dangers);

    $occupantSummary = '';
    if ($occupants === 'monster') {
        $occupantSummary = rg_pick($monsterGroups);
    } elseif ($occupants === 'remnants') {
        $occupantSummary = rg_pick($remnantGroups);
    } else {
        $occupantSummary = rg_pick($monsterGroups) . '; alem disso, ' . rg_pick($remnantGroups);
    }

    return [
        'name' => rg_place_name($type),
        'type' => rg_place_label($type),
        'state' => 'Abandonado',
        'occupants' => rg_place_label($occupants),
        'history' => rg_build_place_history($type, $creator, $age, $fall),
        'current_inhabitants' => $occupantSummary,
        'main_danger' => $danger,
        'notable_find' => rg_pick($treasures),
        'adventure_hook' => 'Rumores dizem que ' . rg_pick([
            'o salao principal ecoa vozes de antigos comandantes',
            'uma passagem secreta liga o local a catacumbas proximas',
            'ha um pacto incompleto escondido na sala do trono',
            'o lider atual aceitaria negociar por provisoes e cura',
            'quem controlar esse lugar domina as rotas da regiao',
        ]) . '.',
    ];
}
