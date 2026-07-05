<?php

declare(strict_types=1);

function rg_get_common_services(): array
{
    return [
        [
            'name' => 'Bath at an Inn',
            'price' => '3 copper',
            'supply' => 'Common',
            'comment' => '',
        ],
        [
            'name' => 'Haircut',
            'price' => '5 copper',
            'supply' => 'Common',
            'comment' => '',
        ],
        [
            'name' => 'Healing',
            'price' => '5 silver',
            'supply' => 'Uncommon',
            'comment' => 'A typical village healer has Wits 4 and skill level 2 in Healing.',
        ],
        [
            'name' => 'Bodyguard',
            'price' => '1 silver per day',
            'supply' => 'Uncommon',
            'comment' => '',
        ],
        [
            'name' => 'Clothes Washed',
            'price' => '5 copper',
            'supply' => 'Common',
            'comment' => '',
        ],
        [
            'name' => 'Courier',
            'price' => '1 silver per hexagon',
            'supply' => 'Common',
            'comment' => '',
        ],
        [
            'name' => 'Road Toll',
            'price' => '2 copper',
            'supply' => 'Common',
            'comment' => '',
        ],
        [
            'name' => 'Lodging at Inn, Dormitory',
            'price' => '2 copper',
            'supply' => 'Common',
            'comment' => '',
        ],
        [
            'name' => 'Lodging at Inn, Separate Room',
            'price' => '5 copper',
            'supply' => 'Common',
            'comment' => '',
        ],
        [
            'name' => 'Fine Dwelling',
            'price' => '2 silver',
            'supply' => 'Uncommon',
            'comment' => '',
        ],
        [
            'name' => 'Bowl of Stew',
            'price' => '3 copper',
            'supply' => 'Common',
            'comment' => 'Covers the daily need of Food.',
        ],
        [
            'name' => 'Hearty Meal',
            'price' => '1 silver',
            'supply' => 'Common',
            'comment' => 'Covers the daily need of Food and Water.',
        ],
        [
            'name' => 'Feast',
            'price' => '1 gold',
            'supply' => 'Uncommon',
            'comment' => 'Covers the daily need of Food and Water.',
        ],
        [
            'name' => 'Flagon of Ale',
            'price' => '2 copper',
            'supply' => 'Common',
            'comment' => 'Covers the daily need of Water.',
        ],
        [
            'name' => 'Chalice of Wine',
            'price' => '4 copper',
            'supply' => 'Uncommon',
            'comment' => 'Covers the daily need of Water.',
        ],
        [
            'name' => 'Teacher',
            'price' => '1 silver per day or more',
            'supply' => 'Uncommon',
            'comment' => 'Read more about teachers on page 40.',
        ],
    ];
}

function rg_get_services_by_supply(string $supply): array
{
    $services = rg_get_common_services();
    return array_filter($services, function($service) use ($supply) {
        return $service['supply'] === $supply;
    });
}

function rg_get_services_by_category(string $category): array
{
    $services = rg_get_common_services();
    $categories = [
        'accommodations' => ['Lodging at Inn, Dormitory', 'Lodging at Inn, Separate Room', 'Fine Dwelling'],
        'food' => ['Bowl of Stew', 'Hearty Meal', 'Feast'],
        'beverages' => ['Flagon of Ale', 'Chalice of Wine'],
        'personal_care' => ['Bath at an Inn', 'Haircut', 'Clothes Washed'],
        'utility' => ['Healing', 'Bodyguard', 'Courier', 'Road Toll', 'Teacher'],
    ];

    if (!isset($categories[$category])) {
        return [];
    }

    return array_filter($services, function($service) use ($categories, $category) {
        return in_array($service['name'], $categories[$category]);
    });
}
