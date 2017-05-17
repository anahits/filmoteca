<?php

class FilmsTableSeeder extends Seeder
{
    const AMOUNT = 40;

    public function run()
    {
        $films = [];
        $faker = Faker\Factory::create('es_MX');

        for ($i = 0; $i < self::AMOUNT; $i++) {
            $film = array();

            $film['title'] = implode(' ', $faker->words(rand(3, 6)));
            $film['slug'] = \Illuminate\Support\Str::slug($film['title']) . '-' . rand(0, 4);
            $film['original_title'] = 'Original' . $film['title'];
            $film['years'] = self::getListOfYears();
            $film['duration'] = $faker->time();
            $film['genre_id'] = rand(0, 10);
            $film['director'] = self::getListOfNames($faker);
            $film['script'] = self::getListOfNames($faker);
            $film['photographic'] = self::getListOfNames($faker);
            $film['music'] = self::getListOfNames($faker);
            $film['edition'] = self::getListOfNames($faker);
            $film['production'] = self::getListOfNames($faker);
            $film['cast'] = self::getListOfNames($faker);
            $film['synopsis'] = $faker->paragraphs(rand(1, 5), true);
            $film['notes'] = $faker->paragraphs(rand(0, 6), true);
            $film['trailer'] = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Gjg_Mi0zLlg" frameborder="0" allowfullscreen></iframe>';
            $film['created_at'] = new DateTime();
            $film['updated_at'] = new DateTime();
            array_push($films, $film);
        }

        DB::table('films')->truncate();

        DB::table('films')->insert($films);
    }

    public static function getListOfNames($faker, $amount = null)
    {
        if ($amount === null) {
            $amount = rand(3, 15);
        }

        $names = [];

        for ($i = 0; $i < $amount; $i++) {
            $names[] = $faker->name;
        }

        return implode(', ', $names);
    }

    public static function getListOfYears($length = null)
    {
        if ($length === null) {
            $length = rand(0, 3);
        }

        $years = [];

        for ($j = 0; $j < $length; $j++) {
            $years[] = rand(1970, 2014);
        }

        return implode(', ', $years);
    }
}
