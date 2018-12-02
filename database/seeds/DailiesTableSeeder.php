<?php

use Illuminate\Database\Seeder;

class DailiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Daily::class, 50)->create();
    }
}
