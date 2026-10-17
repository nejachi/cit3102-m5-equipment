<?php

// database/seeders/EquipmentSeeder.php
// Run: php artisan make:seeder EquipmentSeeder, paste, then php artisan db:seed --class=EquipmentSeeder

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            // Cooking
            ['Gas Stove (2-burner)',        'cooking',   3,  3500.00, 'good',  'Kitchen'],
            ['Large Stock Pot (40L)',       'cooking',   4,  2800.00, 'good',  'Kitchen'],
            ['Kawa / Wok (large)',          'cooking',   3,  1800.00, 'good',  'Kitchen'],
            ['Rice Cooker (industrial)',    'cooking',   2,  6500.00, 'new',   'Kitchen'],
            ['Frying Pan Set',              'cooking',   6,   950.00, 'fair',  'Kitchen'],
            // Serving
            ['Chafing Dish (full size)',    'serving',  12,  1500.00, 'good',  'Storage Room A'],
            ['Serving Spoon & Tong Set',    'serving',  20,   250.00, 'good',  'Storage Room A'],
            ['Buffet Table (6ft)',          'serving',   8,  2200.00, 'good',  'Storage Room B'],
            // Tableware
            ['Dinner Plate',                'tableware', 200,  45.00, 'good',  'Storage Room A'],
            ['Spoon & Fork Set',            'tableware', 200,  30.00, 'good',  'Storage Room A'],
            ['Drinking Glass',              'tableware', 200,  25.00, 'fair',  'Storage Room A'],
            ['Soup Bowl',                   'tableware', 100,  40.00, 'good',  'Storage Room A'],
            // Drinks
            ['Beverage Dispenser (10L)',    'drinks',    4,  1200.00, 'good',  'Storage Room B'],
            ['Ice Chest / Cooler (100L)',   'drinks',    5,  2500.00, 'good',  'Storage Room B'],
            // Storage & transport
            ['Food Container (insulated)',  'storage',  10,  1800.00, 'good',  'Storage Room A'],
            ['Stackable Crate',             'storage',  15,   350.00, 'fair',  'Storage Room B'],
            // Setup
            ['Monobloc Chair',              'setup',   150,   180.00, 'good',  'Storage Room B'],
            ['Round Table (10-seater)',     'setup',    15,  2800.00, 'good',  'Storage Room B'],
            ['Table Cloth',                 'setup',    30,   220.00, 'fair',  'Storage Room A'],
            ['Tent / Canopy (10x10)',       'setup',     3,  6000.00, 'needs_repair', 'Storage Room B'],
        ];

        foreach ($items as [$name, $category, $qty, $cost, $condition, $location]) {
            Equipment::create([
                'name'             => $name,
                'category'         => $category,
                'quantity'         => $qty,
                'unit_cost'        => $cost,
                'condition'        => $condition,
                'storage_location' => $location,
            ]);
        }
    }
}
