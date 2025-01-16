<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Sport;
use App\Models\Organizer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class EventSeeder extends Seeder
{
    public function run()
    {
        $events = [
            // Януари 2025
            [
                'name' => 'Зимен футболен турнир',
                'start_time' => '2025-01-15 14:00:00',
                'duration' => 180,
                'description' => 'Зимен футболен турнир на закрито',
                'sport_name' => 'Футбол'
            ],
            [
                'name' => 'Баскетболен турнир за купата',
                'start_time' => '2025-01-20 10:00:00',
                'duration' => 240,
                'description' => 'Градски баскетболен турнир',
                'sport_name' => 'Баскетбол'
            ],

            // Февруари 2025
            [
                'name' => 'Волейболна лига София',
                'start_time' => '2025-02-05 15:00:00',
                'duration' => 300,
                'description' => 'Градска волейболна лига',
                'sport_name' => 'Волейбол'
            ],
            [
                'name' => 'Тенис турнир в зала',
                'start_time' => '2025-02-15 09:00:00',
                'duration' => 360,
                'description' => 'Закрит тенис турнир',
                'sport_name' => 'Тенис'
            ],

            // Март 2025
            [
                'name' => 'Пролетен маратон',
                'start_time' => '2025-03-10 11:00:00',
                'duration' => 120,
                'description' => 'Плувен маратон на закрито',
                'sport_name' => 'Плуване'
            ],
            [
                'name' => 'Футболен турнир за младежи',
                'start_time' => '2025-03-20 14:00:00',
                'duration' => 180,
                'description' => 'Младежки футболен турнир',
                'sport_name' => 'Футбол'
            ],

            // Април 2025
            [
                'name' => 'Великденски баскетболен турнир',
                'start_time' => '2025-04-05 10:00:00',
                'duration' => 240,
                'description' => 'Традиционен великденски турнир',
                'sport_name' => 'Баскетбол'
            ],
            [
                'name' => 'Волейболен турнир за купата',
                'start_time' => '2025-04-15 15:00:00',
                'duration' => 300,
                'description' => 'Градски волейболен турнир',
                'sport_name' => 'Волейбол'
            ],

            // Май 2025
            [
                'name' => 'Тенис на открито',
                'start_time' => '2025-05-01 09:00:00',
                'duration' => 360,
                'description' => 'Пролетен тенис турнир',
                'sport_name' => 'Тенис'
            ],
            [
                'name' => 'Плувен фестивал',
                'start_time' => '2025-05-20 11:00:00',
                'duration' => 120,
                'description' => 'Плувен фестивал на открито',
                'sport_name' => 'Плуване'
            ],

            // Юни 2025
            [
                'name' => 'Летен футболен къп',
                'start_time' => '2025-06-10 16:00:00',
                'duration' => 180,
                'description' => 'Летен футболен турнир',
                'sport_name' => 'Футбол'
            ],
            [
                'name' => 'Стрийтбол турнир',
                'start_time' => '2025-06-25 10:00:00',
                'duration' => 240,
                'description' => 'Турнир по стрийтбол',
                'sport_name' => 'Баскетбол'
            ],

            // Юли 2025
            [
                'name' => 'Плажен волейбол',
                'start_time' => '2025-07-05 15:00:00',
                'duration' => 300,
                'description' => 'Турнир по плажен волейбол',
                'sport_name' => 'Волейбол'
            ],
            [
                'name' => 'Тенис мастърс',
                'start_time' => '2025-07-20 09:00:00',
                'duration' => 360,
                'description' => 'Летен тенис мастърс',
                'sport_name' => 'Тенис'
            ],

            // Август 2025
            [
                'name' => 'Летен плувен маратон',
                'start_time' => '2025-08-01 11:00:00',
                'duration' => 120,
                'description' => 'Маратон по плуване',
                'sport_name' => 'Плуване'
            ],
            [
                'name' => 'Футболен турнир за аматьори',
                'start_time' => '2025-08-15 14:00:00',
                'duration' => 180,
                'description' => 'Аматьорски футболен турнир',
                'sport_name' => 'Футбол'
            ],

            // Септември 2025
            [
                'name' => 'Баскетбол 3х3',
                'start_time' => '2025-09-05 10:00:00',
                'duration' => 240,
                'description' => 'Турнир по баскетбол 3х3',
                'sport_name' => 'Баскетбол'
            ],
            [
                'name' => 'Волейболна купа София',
                'start_time' => '2025-09-20 15:00:00',
                'duration' => 300,
                'description' => 'Турнир за купата на София',
                'sport_name' => 'Волейбол'
            ],

            // Октомври 2025
            [
                'name' => 'Есенен тенис турнир',
                'start_time' => '2025-10-01 09:00:00',
                'duration' => 360,
                'description' => 'Есенен тенис турнир',
                'sport_name' => 'Тенис'
            ],
            [
                'name' => 'Плувен шампионат',
                'start_time' => '2025-10-15 11:00:00',
                'duration' => 120,
                'description' => 'Градски плувен шампионат',
                'sport_name' => 'Плуване'
            ],

            // Ноември 2025
            [
                'name' => 'Футболен шампионат',
                'start_time' => '2025-11-05 14:00:00',
                'duration' => 180,
                'description' => 'Градски футболен шампионат',
                'sport_name' => 'Футбол'
            ],
            [
                'name' => 'Баскетболна лига',
                'start_time' => '2025-11-20 10:00:00',
                'duration' => 240,
                'description' => 'Градска баскетболна лига',
                'sport_name' => 'Баскетбол'
            ],

            // Декември 2025
            [
                'name' => 'Коледен волейболен турнир',
                'start_time' => '2025-12-05 15:00:00',
                'duration' => 300,
                'description' => 'Коледен волейболен турнир',
                'sport_name' => 'Волейбол'
            ],
            [
                'name' => 'Новогодишен тенис турнир',
                'start_time' => '2025-12-20 09:00:00',
                'duration' => 360,
                'description' => 'Новогодишен тенис турнир',
                'sport_name' => 'Тенис'
            ]
        ];

        foreach ($events as $eventData) {
            $sport = Sport::where('name', $eventData['sport_name'])->first();
            
            if (!$sport) {
                continue;
            }

            Event::create([
                'name' => $eventData['name'],
                'start_time' => $eventData['start_time'],
                'duration' => $eventData['duration'],
                'sport_id' => $sport->id,
                'organizer_id' => Organizer::inRandomOrder()->first()->id,
                'description' => $eventData['description']
            ]);
        }
    }
}