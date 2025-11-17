# Lege Symfony repository - Pas deze Readme aan!

Deze repo is leeg zodat je zelf snel met een repository kan werken. 

Zorg ervoor dat je deze Readme aanpast.

## Benodigdheden - Wat heb je geinstalleerd
* Composer
* Scoop
* Symfony-CLI

## Installatie
Clone de repository naar jouw computer/ laptop/ device

Open Powershell en ga naar de map van de repository

Kopieer het ```.env``` bestand naar ```.env.local```

Pas de juiste DATABASE_URL regel toe (en haal het # teken ervoor weg)

Maak de database aan die je gekozen hebt in de vorige regel (PHPMyAdmin of via symfony commando)

Type het commando ``composer install``

Type het commando ``symfony server:start``

### Happy Hunting!


## Om te openen

Open Xampp

Zet Apache 2 en MySql aan

Klik bij MySql op admin

Maak een nieuwe database aan met de naam herdb

Importeer nu de sql van de /asset/backup directory

De database word nu gevuld met al de informatie

Open de terminal en type het commando ``` composer install```

Type nu het commando ```symfony serve```

Het project staat nu klaar


