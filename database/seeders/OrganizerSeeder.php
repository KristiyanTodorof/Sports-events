<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organizer;

class OrganizerSeeder extends Seeder
{
    public function run(): void
    {
        $organizers = [
            [
                'name' => 'Спортна Федерация България',
                'email' => 'contact@sportfed.bg',
                'phone' => '0888123456',
                'description' => 'Основна спортна организация в България'
            ],
            [
                'name' => 'Младежки Спортен Клуб',
                'email' => 'youth@sports.bg',
                'phone' => '0899234567',
                'description' => 'Организация за младежки спорт'
            ],
            [
                'name' => 'Общински Спортен Център',
                'email' => 'info@sportscentre.bg',
                'phone' => '0877345678',
                'description' => 'Общински център за спортни събития'
            ],
            [
                'name' => 'Спортна Академия',
                'email' => 'academy@sports.bg',
                'phone' => '0866456789',
                'description' => 'Академия за спортно развитие'
            ]
        ];

        foreach ($organizers as $organizer) {
            Organizer::create($organizer);
        }
    }
}
