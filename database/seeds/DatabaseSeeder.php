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
        'username' => 'yves',
        'email' => 'yves@yves.yves',
        'password' => bcrypt('yves12'),
      ]);
      DB::table('pages')->insert([
        'title' => 'Een pagina met een veel te lange titel',
        'link' => 'Pagina',
        'body' => '<p>Titel</p>',
      ]);
      DB::table('home_blocks')->insert([
          'title' => 'Wist u dat..',
          'text' => '
                <ul>
                    <li> Ruim een op drie (31,3%) werd al eens uitgescholden
                        voor slet, hoer, janet… op (weg naar/van) school of in
                        zijn/haar vrije tijd.
                    </li>
                    <li>Bijna een op drie (28,9%) kreeg al eens seksueel
                        getinte opmerkingen over borsten, billen,
                        geslachtsdelen op (weg naar/van) school of in
                        zijn/haar vrije tijd.
                    </li>
                    <li>Ruim een op drie (31,3%) werd al eens uitgescholden
                        voor slet, hoer, janet… op (weg naar/van) school of in
                        zijn/haar vrije tijd.
                    </li>
                    <li>Bijna een op drie (28,9%) kreeg al eens seksueel
                        getinte opmerkingen over borsten, billen,
                        geslachtsdelen op (weg naar/van) school of in
                        zijn/haar vrije tijd.
                    </li>
                </ul>',
          'image' => 'diagram-example.png'
      ]);
      DB::table('home_blocks')->insert([
          'title' => 'Lorem Ipsum',
          'text' => '
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum. </p>',
          'image' => 'picture.png'
      ]);
      DB::table('images')->insert([
          'filename' => 'picture.png',
          'type' => 'home'
      ]);
      DB::table('images')->insert([
          'filename' => 'diagram-example.png',
          'type' => 'home'
      ]);

    }
}
