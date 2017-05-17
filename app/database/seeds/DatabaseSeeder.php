<?php

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        DB::statement('SET foreign_key_checks = 0');

        $this->call('FilmsTableSeeder');
        $this->call('TypesTableSeeder');
        $this->call('ExhibitionsTableSeeder');
        $this->call('BillboardsTableSeeder');
        $this->call('SchedulesTableSeeder');
        $this->call('AuditoriumsTableSeeder');
        $this->call('GenresTableSeeder');
        $this->call('CountriesTableSeeder');
        $this->call('FilmotecaMedalsTableSeeder');

        DB::statement('SET foreign_key_checks = 1');

    }
}
