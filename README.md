# Matchplanner

## Wat is het?

MatchPlanner (naam kan nog veranderen) is een set met tools geschreven door Vince van Domburg na de Service Pistool wedstrijden van Schietvereniging SSV Robin Hood te Woerden in maart 2023.

## Wat kan je er mee?

Met de tools kan je:
- data vanuit Baanplanner verrijken met de klasses vanuit KNSA
- data versimpelen voor importeren MatchMaker
- inschrijving versimpelen op dag(en) van de wedstrijd

## Wat kost het?

> 'Cause I got a golden ticket  
> I've got a golden twinkle  
> In my eye

Het gebruik van Matchplanner als open-source kost je (bijna) niets. Echter, ik ben van mening dat de tool je (vrijwilligers) een hoop werk uit handen neemt. Mocht ik (persoonlijk) me aan (willen) melden voor een wedstrijd, zal de vereniging een plek (KKP, SEPL en/of SEPZ) organiseren én daarvoor maximaal 5 euro aan kosten in rekening brengen.

## Hoe gebruik ik het?

Natuurlijk is het handig om te weten hoe je dit kan gebruiken. Je kan dit downloaden (door git of door het downloaden van de bestanden zelf) en deze plaatsen op een webserver met PHP. Daarna zijn de volgende stappen noodzakelijk:
- Hernoemen config_example.php naar config.php en invullen gegevens
- Downloaden csv-bestand (door ; gescheiden) van baanplanner. Sla deze op als baanplanner_export.csv
- Hernoemen checkin_example.log naar checkin.log
- Hernoemen betaald_example.log naar betaald.log
- Tenslotte: stuur me een berichtje dat je het gaat gebruiken of overweegt

## Is het ook hosted beschikbaar?

Zeker! Neem daarvoor contact op met de developer via 088-4004000 of vraag het na bij je eigen (web)hoster, IT-partij of tech-savvy-lid.

## Het ziet er niet heel slick uit he?

Klopt! Maar ik ben backenddeveloper, geen frontendspecialist.

## Minimum systeemeisen

- Linux-webhostingomgeving
- PHP 7.4.33 of hoger
- Toegang tot internet vanaf de webserver (vanwege de KNSA-klassen)

## Aanbevolen tools

- QR-code- of barcodescanner

## Hulp nodig?

Omdat het (semi)gratis code is, is er geen (gegarandeerde) support op de tools, tenzij je gebruik maakt van de door ons gehoste omgeving. Heb je vragen, kan je een bericht achterlaten hier op github, wellicht kunnen we er iets mee.

## Wat komt er nog in?

De volgende feature requests staan nog op de planning:
- Koppeling met een (Dymo) labelwriter voor het printen van kaartstickers
- Versturen van betaallinks (via Mollie)
- Koppeling met een CCV-pinautomaat
- Versturen van mails

## Legal info

- Developer is niet aansprakelijk voor de inzet van dit pakket, noch de gevolgen hiervan
- Developer is niet aansprakelijk voor eventuele AVG-impact
- Het is de verantwoordelijkheid van gebruiker om de software te controleren
- Gebruiker mag de software niet aanpassen, zonder toestemming van de Developer
- Alleen KNSA-geregistreerde verenigingen mogen gebruik maken van deze tools
- Developer houdt zich het recht voor om gebruik door specifieke verenigingen te weigeren
