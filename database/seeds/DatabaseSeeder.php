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
        'title' => 'Wat is strafbaar?',
        'link' => 'Strafbaarheid',
        'body' => '<p>In belgi&euml; deelt men de strafbare feiten op in verschillende gebieden. Als dit gedrag wordt gesteld ten opzichte van minderjarigen, geldt dat als verzwarende omstandigheid en zijn ook de straffen zwaarder.</p>

<hr />
<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px"><strong>Aanranding: </strong>Gedwongen seks zonder penetratie: tegen je wil worden betast of de ander moeten aanraken, gedwongen worden om je uit te kleden, jezelf of de ander moet mastruberen, ...</div>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px"><strong>Verkrachting:</strong> Gedwongen seks met penetratie. Volgens de strafwet: &#39;Elke daad van penetratie van welke aard en met welk middel ook, gepleegd op een persoon die daar niet in toestemt&#39;.</div>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px"><strong>Incest: </strong>Seksueel misbruik door een bloedverwant of door iemand die bij het gezin woont.</div>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px"><strong>Seksisme:</strong> Gedrag dat bedoeld is om andere mensen te vernederen op basis van zijn/haar geslacht.</div>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px"><strong>Prostitutie: </strong>Iemand aanzetten tot prostitutie en het uitbaten van zulke zaken.</div>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px"><strong>Grooming:</strong> Als volwassene contact opnemen met een minderjarige om een &#39;vertrouwensband&#39; op te bouwen met het oog op seksueel misbruik.</div>

<p>&nbsp;</p>

<hr />
<p><strong><big>Dit zegt het wetboek over de strafbaarheid omtrent seksuele intimidatie:</big></strong></p>

<ul>
    <li>
    <p><cite><em><strong>Belaging(Strafwetboek Art.442 bis): </strong>Alle gedrag dat de rust van de getroffen persoon ernstig verstoort zoals bijvoorbeeld achternalopen, omringen, intimiderende of beledigende sms-en of berichten op facebook sturen enzovoort.</em></cite></p>
    </li>
    <li>
    <p><cite><em><strong>Voyeurisme (Strafwetboek Art.371): </strong>Personen observeren of doen observeren, maar ook beelden of geluidsopnamen van iemand maken, zonder dat hij/zij dat weet of daarvoor toestemming heeft gegeven.</em></cite></p>
    </li>
</ul>

<p>&nbsp;</p>

<hr />
<p><strong>Extra info:</strong></p>

<p>Voor meer informatie omtrent wat wel en niet mag volgens de wet kan men altijd terecht op de pagina van Sensoa: <a href="https://www.allesoverseks.be/themas/seks-grenzen/seks-de-wet">Seks en de wet.</a></p>

<p>Informatie over <a href="http://www.elfri.be/aanranding-van-de-eerbaarheid">schending van de eerbaarheid</a> (volgens het wetboek).</p>',
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
                </ul>'
      ]);
      DB::table('home_blocks')->insert([
          'title' => 'Lorem Ipsum',
          'text' => '
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum. </p>'
      ]);
    }
}
