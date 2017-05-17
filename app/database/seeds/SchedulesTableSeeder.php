<?php

class SchedulesTableSeeder extends Seeder {

    public function run()
    {
        $schedules = [];
        $faker = Faker\Factory::create('es_MX');

        for ($i = 0; $i < ExhibitionsTableSeeder::AMOUNT; $i++) {
            $number = rand(1, 16);
            for ($j = 0; $j < $number; $j++) {
                $schedule = array(
                    'exhibition_id' => $i +1,
                    'auditorium_id' => rand(1, AuditoriumsTableSeeder::NUMBER),
                    'entry' => $faker->dateTimeThisMonth(\Carbon\Carbon::today()->endOfMonth()),
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime()
                    );
                array_push($schedules, $schedule);
            }
        }

        DB::table('schedules')->truncate();
        DB::table('schedules')->insert($schedules);
    }
}
