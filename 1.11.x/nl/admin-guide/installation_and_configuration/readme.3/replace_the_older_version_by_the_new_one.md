# Vervang de oudere versie door de nieuwe

Voordat u een recentere versie toepast "bovenop" uw huidige Chamilo-versie, wilt u misschien een paar wijzigingen aanbrengen in het pakket "voor het geval dat". De volgende mappen kunnen bijvoorbeeld uit het Chamilo-pakket **worden verwijderd voordat** u ze over uw huidige installatie kopieert:

- app/home/
- app/courses/
- app/config/
- app/upload/users/
- main/searchdb/

Deze mappen zouden allemaal ongeveer hetzelfde moeten zijn in de nieuwe versie, en ze zijn mogelijk allemaal gewijzigd door je gebruik van Chamilo via de webinterface, dus om een conflict tussen bestanden te voorkomen, verwijder ze gewoon uit het Chamilo-pakket en ga dan verder. .

Er is voorlopig maar één aanbevolen manier om uw Chamilo-versie bij te werken:

1. Verwijder de vorige map niet, anders gaan de oudere configuratiebestanden verloren.
2. Kopieer gewoon de nieuwe Chamilo-directory over de oude.
    - Als je een GNU/Linux-distributie gebruikt, moet je de hele nieuwe map naar de oude kopiëren, d.w.z .:

user@server$ sudo cp -r chamilo-1.11.12/\* /var/www/chamilo/
:--


1. Doorloop vervolgens de stappen van *«Laatste installatie-instellingen»*.
2. Maak verbinding met uw site en controleer of alles aanwezig is.
