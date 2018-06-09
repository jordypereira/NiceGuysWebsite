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
        'name' => 'Antwerpen',
        'username' => 'antwerpen',
        'email' => 'antwerpen@antwerpen.antwerpen',
        'password' => bcrypt('niceguys123'),
      ]);
      DB::table('pages')->insert([
        'title' => 'Elke vorm van seksuele intimidatie is strafbaar',
        'link' => 'Strafbaarheid',
        'color' => '#b75300',
        'font_color' => 'white',
        'order' => 1,
        'body' => '<p><strong>Sinds 22 mei 2014 wordt elke vorm van seksuele intimidatie in het openbaar gezien als een strafbaar feit. </strong></p>

<p>Vindt u dat u zelf het slachtoffer bent van zulke feiten? Dan is het aangeraden om stappen te ondernemen tegen de dader. Door het probleem niet aan te pakken, wordt voor de dader een gevoel gecre&euml;erd dat deze feiten tolereerbaar zijn en zonder gevolgen kan worden verder gezet.</p>

<p>&nbsp;</p>

<p><strong>De effectieve straffen:</strong></p>

<p>Word er effectief gesproken over een strafbaar feit dan kan hier een straf aan worden toe verbonden. Met gevangenisstraf van een maand tot een jaar en met geldboete van vijftig euro tot duizend euro. Als er sprake is van zwaardere feiten zoals aanranding, verkrachting,&hellip; worden er andere en zwaardere straffen van toestand genomen.</p>

<p>&nbsp;</p>

<hr />
<p>&nbsp;</p>

<h3><strong>Ik wil aangifte doen, hoe doe ik dat?</strong></h3>

<p>&nbsp;</p>

<p>Bij sprake van grensoverschrijdend gedrag kan er een aangifte worden gedaan bij de politie of kan men contact opnemen met hulporganisaties.</p>

<p>&nbsp;</p>

<p><strong>Aangifte doen bij de politie:</strong></p>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px">Bij nietdringende hulp:&nbsp; Bel de blauwe lijn: 0800 123 12. Maak een onlineafspraak: Politie Antwerpen</div>

<p>&nbsp;</p>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px">Bij dringende hulp gelieve het noodnummer 101 te bellen om in contact te komen bij de juiste hulpdiensten.</div>

<p>&nbsp;</p>

<p><strong>Scholieren kunnen altijd terecht bij andere hulporganisaties:</strong></p>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px">Sensoa: Sensoa helpt om te praten over relaties, seksualiteit, grensoverschrijdend gedrag, seksuele diversiteit enzovoort. Ze bieden vormingsmateriaal aan en organiseren interessante opleidingen. <a href="https://www.sensoa.be/">(site)</a></div>

<p>&nbsp;</p>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px">Jong &amp; Van Zin: Organisatie die zorgt voor informatie, participatie en vorming voor kinderen, jongeren en hun begeleiders. Ze hebben een ervaringsgericht vormingsaanbod. <a href="https://www.pimento.be/">(site)</a></div>

<p>&nbsp;</p>

<p><strong>&nbsp;Meerdere hulporganisaties vindt u <a href="http://yves.sterckx.mtantwerp.eu/Contact">hier</a></strong></p>
',
      ]);

      DB::table('pages')->insert([
         'title' => 'Iemand noemt mij een hoer, mag dat?',
         'color' => '#d0003a',
         'font_color' => 'white',
         'link' => 'Wat is seksuele intimidatie',
         'order' => 2,
         'body' => '<h3><strong>Wat valt allemaal onder seksuele intimidatie?</strong></h3>

<p>&nbsp;</p>

<p><strong>Seksuele intimidatie is een niet-dagdagelijks begrip waardoor dezelfde ervaringen tussen jongeren anders beleefd kunnen worden.<br />
Hierdoor beleefd niet iedereen dezelfde uitspraken of handelingen intimiderend. Toch worden steeds meer jongeren het slachtoffer van seksuele intimidatie en is het belangrijk om hier actie in te nemen.</strong></p>

<p>Lees wat andere jongeren verstaan onder seksuele intimidatie:</p>

<p>(nog niet afgewerkt)</p>

<blockquote>
<p>Iemand blijven lastig vallen met intieme vragen - Kaat, 16 jaar</p>
</blockquote>

<blockquote>
<p>Mannen die vrouwen met gebaren lastig vallen. - Joke, 17 jaar</p>
</blockquote>

<p>&nbsp;</p>

<hr />
<h3>&nbsp;</h3>

<h3><strong>Waar ligt de grens?</strong></h3>

<p>&nbsp;</p>

<p><strong>Ondanks het verschil in beleving, zijn er toch grenzen die kunnen worden opgelegd. Deze zaken worden altijd als seksueel intimiderend beschouwd:</strong></p>

<p>(nog niet afgewerkt)</p>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px"><strong>Seksueel getinte scheldwoorden met de bedoeling om iemand te vernederen.</strong></div>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px">Iemand die een vrouw een hoer noemt na afwijzing.</div>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px">Hollebi&rsquo;s benoemen als &lsquo;janet&rsquo;, &lsquo;homo&rsquo;, etc .</div>

<p>&nbsp;</p>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px"><strong>Fysiek (vaak plotse) ongewenste aanrakingen. </strong>Bv. Een onbekende die ongevraagd in de billen van een vrouw knijpt. Bv. Iemand die zijn hand op intieme lichamelijke plaatsen legt.</div>

<p>&nbsp;</p>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px"><strong>De persoonlijke ruimte niet respecteren. Dit zijn gedragingen waarbij er geen respect wordt getoond voor de comfortzone van een persoon.</strong> Bv. Met een groep rond een vrouw gaan staan. Bv. Onbekende vrouwen filmen met een smartphone.</div>

<p>&nbsp;</p>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px"><strong>Gedragingen die niet gekaderd kunnen worden in de context van &lsquo;versieren&rsquo;.</strong> &nbsp;(vooral van toepassing op onbekende personen) Bv. Seksueel getinte berichten sturen via facebook na dat &lsquo;ontvanger&rsquo; de avances duidelijk heeft afgewezen. Bv. Onbekende vrouwen met een vingerteken proberen dichterbij laten komen.</div>

<p>&nbsp;</p>

<div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px"><strong>Ongewenste gedragingen die zich blijven herhalen.</strong></div>

<p>&nbsp;</p>

<hr />
<h3>&nbsp;</h3>

<h3><strong>Strafbaarheid</strong></h3>

<p>&nbsp;</p>

<p><strong>Lees alles over strafbaarheid van seksuele intimidatie <a href="http://yves.sterckx.mtantwerp.eu/Strafbaarheid">hier</a></strong></p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>
'
      ]);

        DB::table('pages')->insert([
            'title' => 'Heeft u nood aan een gesprek?',
            'color' => '#2a293a',
            'font_color' => 'white',
            'link' => 'Contact',
            'order' => 3,
            'body' => '<h2><big>To be continued...</big></h2>' ]);
    }
}
