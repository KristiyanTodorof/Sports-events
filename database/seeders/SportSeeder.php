<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sport;

class SportSeeder extends Seeder
{
   
    public function run(): void
    {
        $sports = [
            [
                'name' => 'Футбол',
                'description' => 'Най-популярният спорт в света'
            ],
            [
                'name' => 'Баскетбол',
                'description' => 'Отборен спорт с топка'
            ],
            [
                'name' => 'Волейбол',
                'description' => 'Отборен спорт с мрежа'
            ],
            [
                'name' => 'Тенис',
                'description' => 'Индивидуален или отборен спорт с ракета'
            ],
            [
                'name' => 'Плуване',
                'description' => 'Воден спорт'
            ]
        ];

        foreach ($sports as $sport) {
            Sport::create($sport);
        }
    }
}
