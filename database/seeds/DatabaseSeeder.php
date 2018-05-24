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

      DB::table('pages')->insert([
         'title' => 'Wat kan je zelf doen?',
         'link' => 'Zelf doen',
         'body' => '<p>Steeds meer en meer scholieren krijgen te maken met grensoverschrijdend gedrag. Inplaats van deze feiten te vedringen is het verstanding om zelf stappen te kunnen ondernemen.</p>

<p><strong>Hoe?</strong></p>

<p>Aangifte doen bij de politie:</p>

<ul>
    <li>Bij dringende hulp gelieve het noodnummer <strong>101</strong> te bellen om in contact te komen bij de juiste hulpdiensten.</li>
    <li>Bij niet-dringende hulp:&nbsp; Bel de blauwe lijn: <a href="https://www.politieantwerpen.be/">0800 123 12</a>. Maak een online-afspraak: <a href="https://www.politieantwerpen.be/">Politie Antwerpen</a></li>
</ul>

<hr />
<p>Scholieren kunnen altijd terecht bij andere hulporganisaties:</p>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px">Jong &amp; Van Zin: Organisatie die zorgt voor informatie, participatie en vorming voor kinderen, jongeren en hun begeleiders. Ze hebben een ervaringsgericht vormingsaanbod. <a href="https://www.pimento.be/">(site)</a></div>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px">Sensoa: Sensoa helpt om te praten over relaties, seksualiteit, grensoverschrijdend gedrag, seksuele diversiteit enzovoort. Ze bieden vormingsmateriaal aan en organiseren interessante opleidingen. <a href="https://www.sensoa.be/">(site)</a></div>

<p>&nbsp;</p>'
      ]);
      DB::table('home_blocks')->insert([
          'title' => 'Strafbaarheid',
          'order' => '1',
          'text' => '
                <p>In belgi&euml; deelt men de strafbare feiten op in verschillende gebieden. Als dit gedrag wordt gesteld ten opzichte van minderjarigen, geldt dat als verzwarende omstandigheid en zijn ook de straffen zwaarder.</p>

<p>Klik&nbsp;<a href="/Strafbaarheid">hier</a></p>
'
      ]);
      DB::table('home_blocks')->insert([
          'title' => 'Wat kan je zelf doen?',
          'order' => '2',
          'text' => '
                <p>Steeds meer en meer scholieren krijgen te maken met grensoverschrijdend gedrag. Inplaats van deze feiten te vedringen is het verstanding om zelf stappen te kunnen ondernemen.</p>

<p>Klik&nbsp;<a href="/Zelf-doen">hier</a></p>
'
      ]);
      DB::table('home_blocks')->insert([
          'order' => '3',
          'video' => 'https://www.youtube.com/embed/HWJLiDkvgQ8'
      ]);
    }
}
