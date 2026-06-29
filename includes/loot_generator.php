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
            ['name' => 'Pederneira de bolso', 'type' => 'Ferramenta', 'value' => '4 pratas', 'detail' => 'Ainda solta faiscas fortes.'],
            ['name' => 'Anel de bronze riscado', 'type' => 'Adorno', 'value' => '6 pratas', 'detail' => 'Tem iniciais apagadas por dentro.'],
            ['name' => 'Kit de agulha e linha', 'type' => 'Utilidade', 'value' => '3 pratas', 'detail' => 'Guardado em um estojo de osso.'],
            ['name' => 'Mapa de rua dobrado', 'type' => 'Documento', 'value' => '2 pratas', 'detail' => 'Marca uma passagem curta entre becos.'],
            ['name' => 'Frasco de pomada herbal', 'type' => 'Consumivel', 'value' => '5 pratas', 'detail' => 'Ajuda em cortes leves e queimaduras.'],
        ],
        'uncommon' => [
            ['name' => 'Pingente da Lua Vaga', 'type' => 'Amuleto', 'value' => '18 pratas', 'detail' => 'Esfria quando magia e conjurada perto.'],
            ['name' => 'Pergaminho de chave mestra', 'type' => 'Arcano', 'value' => '22 pratas', 'detail' => 'Concede vantagem em uma abertura de fechadura.'],
            ['name' => 'Bolsa de moedas de fronteira', 'type' => 'Tesouro', 'value' => '17 pratas', 'detail' => 'Mistura de cunhagens de varios reinos.'],
            ['name' => 'Adaga de osso entalhado', 'type' => 'Arma', 'value' => '21 pratas', 'detail' => 'Leve, equilibrada e com cabo de couro.'],
            ['name' => 'Ampola de fogo alquimico fraco', 'type' => 'Consumivel', 'value' => '25 pratas', 'detail' => 'Inflama em contato com ar por alguns segundos.'],
        ],
        'rare' => [
            ['name' => 'Chave prismatica de prata', 'type' => 'Artefato menor', 'value' => '95 pratas', 'detail' => 'Brilha perto de portas secretas.'],
            ['name' => 'Runa de comando militar', 'type' => 'Insignia', 'value' => '82 pratas', 'detail' => 'Abre cofres de quartel antigo.'],
            ['name' => 'Anel de passo silencioso', 'type' => 'Magico', 'value' => '110 pratas', 'detail' => 'Abafa passos por alguns minutos por dia.'],
            ['name' => 'Totem de escama draconica', 'type' => 'Relicario', 'value' => '120 pratas', 'detail' => 'Reage com calor quando monstros se aproximam.'],
            ['name' => 'Frasco de nevoa engarrafada', 'type' => 'Consumivel magico', 'value' => '88 pratas', 'detail' => 'Cria cobertura espessa em um corredor curto.'],
        ],
        'legendary' => [
            ['name' => 'Lagrima de Wyrm vitrificada', 'type' => 'Reliquia', 'value' => '1.300 pratas', 'detail' => 'Pode energizar um ritual ancestral.'],
            ['name' => 'Selo do Trono Naufrago', 'type' => 'Insignia real', 'value' => '1.050 pratas', 'detail' => 'Reconhecido por casas nobres extintas.'],
            ['name' => 'Peitoral de fio estelar', 'type' => 'Armadura ritual', 'value' => '1.600 pratas', 'detail' => 'Reflete luz como constelacoes em movimento.'],
            ['name' => 'Ampulheta da Vigilia Eterna', 'type' => 'Artefato', 'value' => '1.420 pratas', 'detail' => 'Permite rever os ultimos segundos de um evento.'],
            ['name' => 'Corneta do Primeiro Cerco', 'type' => 'Instrumento de guerra', 'value' => '1.200 pratas', 'detail' => 'Seu toque impone coragem em aliados.'],
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
        $item['condition'] = rg_pick(['Intacto', 'Gasto', 'Manchado', 'Bem preservado', 'Parcialmente quebrado']);
        $items[] = $item;
    }

    return [
        'source' => rg_capitalize_words($source),
        'rarity' => rg_capitalize_words($rarity),
        'coins' => random_int($source === 'lair' ? 20 : 4, $source === 'lair' ? 180 : 55) . ' moedas de prata',
        'items' => $items,
        'hook' => $source === 'lair'
            ? rg_pick([
                'Uma das pecas traz o emblema de um culto esquecido.',
                'Ha marcas recentes de troca de mercadoria no cova.',
                'Um item aponta para um comprador na capital.',
            ])
            : rg_pick([
                'O item mais valioso parece roubado de um templo local.',
                'Um simbolo gravado conecta este saque a uma gangue urbana.',
                'O dono original pode estar vivo e procurando por isso.',
            ]),
    ];
}
