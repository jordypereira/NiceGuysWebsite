# The Nice Guys
## Voorstelling Bedrijf 
The Nice Guys is een veelbelovende start-up die ontstaan is uit een project van de Karel de Grote Hogeschool in Antwerpen. We zijn vijf ambitieuze studenten die de toekomst mee vorm wil geven. Door onze stempel te drukken op het sociale aspect van de mensen willen we voor een betere wereld zorgen. 
## Het Project – kort 
Wij als bedrijf willen scholieren er bewust van laten worden dat er vandaag de dag nog steeds veel al dan niet verborgen seksuele intimidatie heerst in de maatschappij waarin we leven. Elke dag worden er wel mensen slachtoffer van betastingen, vunzige opmerkingen, scheldtirades. Dit gebeurt niet enkel op de werkvloer of op school, maar ook in de vrije tijd.
Onze doelstelling is natuurlijk dat er geen slachtoffers meer vallen, elk beetje van sensibilisering helpt en wij dragen graag ons steentje bij. Het is al lang vijf na twaalf wat betreft onvriendelijke beweging van zowel mannen als vrouwen, en niet enkel op het gebied van seksualiteit.

## Install instructions
- git clone https://github.com/perjor/NiceGuysWebsite.git
- cd NiceGuysWebsite
- composer install
- npm install
- copy the env.example to env
- change sqlite path to your absolute path and make the file ./database/database.sqlite
- php artisan key:generate
- php artisan migrate:refresh --seed