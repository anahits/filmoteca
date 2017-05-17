<?php

class AuditoriumsTableSeeder extends Seeder
{
    const NUMBER = 6;

    public function run()
    {
        $auditoriums = [];
        $faker = Faker\Factory::create('es_MX');

        for ($i = 0; $i < self::NUMBER; $i++) {
            $name = $faker->name;
            $price = $faker->randomNumber(2);

            $auditorium = [
                'name' => $name,
                'slug' => \Illuminate\Support\Str::slug($name),
                'address' => $faker->address,
                'telephone' => implode(',', [$faker->phoneNumber, $faker->phoneNumber]),
                'schedule' => 'De 9 de la noche a 10 de la mañana.',
                'general_cost' => $price,
                'special_cost' => $price + 50,
                'map' => 'https://www.google.com/maps/@19.3304256,-99.274622,14z',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ];

            if (rand(0, 1) == 1 && $i > 1) {
                array_add($auditoriums, 'venue', 1);
            }

            array_push($auditoriums, $auditorium);
        }



        DB::table('auditoriums')->truncate();
        DB::table('auditoriums')->insert($auditoriums);
    }

}
