<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            [
                'user_id' => 1,
                'language' => 'icelandic',
                'abbreviation' => 'IS',
                'ruby' => false
            ], [
                'user_id' => 1,
                'language' => 'japanese',
                'abbreviation' => 'JP',
                'ruby' => true
            ]
        ]);
    }
}
