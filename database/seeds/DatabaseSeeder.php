<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'Yves',
        'email' => 'yves@yves.yves',
        'password' => bcrypt('yves12'),
      ]);
      DB::table('pages')->insert([
        'title' => 'Een pagina met een veel te lange titel',
        'link' => 'Pagina',
        'body' => '<p>Titel</p>',
      ]);
    }
}
