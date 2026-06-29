<?php

declare(strict_types=1);

require_once __DIR__ . '/npc_generator.php';

function rg_get_romance_options(): array
{
    return [
        'tones' => ['sweet', 'tragic', 'forbidden', 'chaotic'],
        'drama_levels' => ['low', 'medium', 'high'],
        'genders' => ['Mulher', 'Homem', 'Nao-binario'],
    ];
}

function rg_romance_label(string $value): string
{
    $labels = [
        'sweet' => 'Doce',
        'tragic' => 'Tragico',
        'forbidden' => 'Proibido',
        'chaotic' => 'Caotico',
        'low' => 'Baixo',
        'medium' => 'Medio',
        'high' => 'Alto',
    ];

    return $labels[$value] ?? ucfirst($value);
}

function rg_romance_name_pool(string $gender): array
{
    $pool = [
        'Mulher' => ['Lysandra', 'Mirela', 'Talia', 'Serena', 'Iria', 'Calista', 'Ysolda'],
        'Homem' => ['Darian', 'Kael', 'Lucien', 'Rhydan', 'Alaric', 'Marek', 'Silas'],
        'Nao-binario' => ['Ari', 'Ren', 'Sage', 'Korin', 'Vale', 'Lior', 'Cyan'],
    ];

    return $pool[$gender] ?? $pool['Nao-binario'];
}

function rg_romance_preference_options_for_target(string $targetGender): array
{
    if ($targetGender === 'Mulher') {
        return ['Mulheres', 'Mulheres e nao-binarios', 'Multiplos generos'];
    }

    if ($targetGender === 'Homem') {
        return ['Homens', 'Homens e nao-binarios', 'Multiplos generos'];
    }

    return ['Nao-binarios', 'Nao-binarios e mulheres', 'Nao-binarios e homens', 'Multiplos generos'];
}

function rg_generate_partner(string $gender, string $preference): array
{
    $styles = [
        'casacos longos com detalhes de prata e couro escuro',
        'trajes nobres reformados com remendos de viagem',
        'roupas leves de estrada com capas impermeaveis',
        'vestes rituais discretas com bordados antigos',
        'armadura parcial sobre tecido elegante',
        'roupas urbanas de corte refinado e cores profundas',
    ];

    return [
        'name' => rg_pick(rg_romance_name_pool($gender)) . ' ' . rg_pick(['Voss', 'Dorn', 'Belmont', 'Ravenor', 'Mourn', 'Aster']),
        'gender' => $gender,
        'preference' => $preference,
        'style' => rg_pick($styles),
    ];
}

function rg_generate_romantic_pair(array $options = []): array
{
    $romanceOptions = rg_get_romance_options();

    $selectedTone = isset($options['tone']) && is_string($options['tone'])
        ? rg_filter_value(trim($options['tone']), $romanceOptions['tones'])
        : null;
    $selectedDrama = isset($options['drama']) && is_string($options['drama'])
        ? rg_filter_value(trim($options['drama']), $romanceOptions['drama_levels'])
        : null;
    $selectedGenderA = isset($options['gender_a']) && is_string($options['gender_a'])
        ? rg_filter_value(trim($options['gender_a']), $romanceOptions['genders'])
        : null;
    $selectedGenderB = isset($options['gender_b']) && is_string($options['gender_b'])
        ? rg_filter_value(trim($options['gender_b']), $romanceOptions['genders'])
        : null;

    $tone = $selectedTone ?? rg_pick($romanceOptions['tones']);
    $drama = $selectedDrama ?? rg_pick($romanceOptions['drama_levels']);

    $pairTemplates = [
        [
            'a' => ['gender' => 'Mulher'],
            'b' => ['gender' => 'Mulher'],
        ],
        [
            'a' => ['gender' => 'Homem'],
            'b' => ['gender' => 'Homem'],
        ],
        [
            'a' => ['gender' => 'Mulher'],
            'b' => ['gender' => 'Homem'],
        ],
        [
            'a' => ['gender' => 'Nao-binario'],
            'b' => ['gender' => 'Mulher'],
        ],
        [
            'a' => ['gender' => 'Nao-binario'],
            'b' => ['gender' => 'Homem'],
        ],
    ];

    $template = rg_pick($pairTemplates);
    $partnerAGender = $selectedGenderA ?? $template['a']['gender'];
    $partnerBGender = $selectedGenderB ?? $template['b']['gender'];

    $partnerAPreference = rg_pick(rg_romance_preference_options_for_target($partnerBGender));
    $partnerBPreference = rg_pick(rg_romance_preference_options_for_target($partnerAGender));

    $partnerA = rg_generate_partner($partnerAGender, $partnerAPreference);
    $partnerB = rg_generate_partner($partnerBGender, $partnerBPreference);

    $relationStage = rg_pick([
        'Apaixonados em segredo ha algumas luas.',
        'Noivos sob pressao politica de duas casas rivais.',
        'Ex-amantes tentando reconstruir confianca durante uma guerra.',
        'Companheiros de jornada que descobriram o amor no caos.',
        'Amor recente, intenso e cheio de promessas imprudentes.',
    ]);

    $history = rg_pick([
        'Eles se conheceram quando um salvou o outro durante uma emboscada na estrada imperial.',
        'O casal nasceu em faccoes opostas e fugiu junto apos um acordo quebrado.',
        'Um antigo baile de inverno uniu os dois por um juramento que nunca foi desfeito.',
        'A relacao cresceu enquanto traduziam juntos um grimorio proibido.',
        'Eles eram rivais em torneios de lancas ate uma tregua virar romance.',
    ]);

    $meetingHook = rg_pick([
        'Os herois sao contratados para proteger o primeiro encontro publico do casal.',
        'Um mensageiro pede ajuda para entregar cartas secretas entre os amantes.',
        'O casal oferece recompensa para escapar de perseguidores antes do amanhecer.',
        'Uma das partes desaparece na noite anterior ao reencontro marcado.',
        'Os personagens entram no meio de uma fuga romantica atravessando fronteiras.',
    ]);

    $likes = rg_pick([
        'flores raras de inverno, joias antigas e poesias copiadas a mao',
        'facas artesanais, chocolate amargo e mapas desenhados sob medida',
        'musica ao vivo, perfumes de cedro e livros de historia perdida',
        'amuleto de prata, vinho de especiarias e cartas bem escritas',
        'tecidos finos, miniaturas de navios e selos de viagem',
    ]);

    $dislikes = rg_pick([
        'presentes muito caros usados para manipulacao',
        'animais empalhados, trofeus de cacada e perfumes muito doces',
        'promessas vazias em publico e objetos ligados a familias rivais',
        'presentes roubados de templos e reliquias profanadas',
        'qualquer item que lembre antigos noivados forcados',
    ]);

    $deathScenes = [
        'Durante o cerco final, um deles se sacrifica para fechar o portao e salvar o outro.',
        'Um duelo ritual exige sangue: o sobrevivente carrega o anel do casal como juramento.',
        'Ao impedir a invocacao de um demonio, um amante cai no abismo da torre.',
        'Uma doenca magica avanca rapido e so ha cura para uma pessoa.',
        'Na fuga por tuneis em colapso, um decide ficar para segurar os escombros.',
    ];

    $deathChanceByDrama = [
        'low' => '25%',
        'medium' => '50%',
        'high' => '80%',
    ];

    return [
        'title' => 'Par romantico: ' . $partnerA['name'] . ' e ' . $partnerB['name'],
        'tone' => rg_romance_label($tone),
        'drama' => rg_romance_label($drama),
        'history' => $history,
        'relationship_stage' => $relationStage,
        'meeting_hook' => $meetingHook,
        'gift_likes' => $likes,
        'gift_dislikes' => $dislikes,
        'possible_death' => rg_pick($deathScenes),
        'death_chance' => $deathChanceByDrama[$drama] ?? '50%',
        'partners' => [$partnerA, $partnerB],
    ];
}
