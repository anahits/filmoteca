<?php

class TypesTableSeeder extends Seeder
{
    const AMOUNT = 15;

    public function run()
    {
        $faker = Faker\Factory::create('es_MX');
        $types = [];

        for ($i = 0; $i < self::AMOUNT; $i++) {
            $name = $faker->sentence(rand(2, 6));
            $since = \Carbon\Carbon::today()->startOfMonth()->addDays(rand(0, 16));
            $until = \Carbon\Carbon::today()->startOfMonth()->addDays(rand(20, 35));

            $type = [
                'name' => $name,
                'description' => $faker->text(600),
                'slug' => \Illuminate\Support\Str::slug($name),
                'since' => $since,
                'until' => $until,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ];

            $types[] = $type;
        }

        DB::table('exhibition_types')->truncate();
        DB::table('exhibition_types')->insert($types);
    }

}
