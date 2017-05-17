<?php

class BillboardsTableSeeder extends Seeder
{
    const NUMBER = 6;

    public function run()
    {
        $billboards= [];

        $createdAt = \Carbon\Carbon::today()->subMonths(self::NUMBER);

        for ($i = 0; $i < self::NUMBER; $i++) {
            $date =  $createdAt->addMonth()->copy();
            $billboard = [
                'online_version_url' => 'https://issuu.com/filmotecaunam/docs/cartelera.digital.abril__1_',
                'created_at' => $date,
                'updated_at' => $date
            ];

            $billboards[] = $billboard;
        }

        DB::table('billboards')->truncate();
        DB::table('billboards')->insert($billboards);
    }
}
