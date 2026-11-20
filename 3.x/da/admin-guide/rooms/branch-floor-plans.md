# Etageplaner for afdelinger og lokalekort

Chamilo 3.1 kan knytte et etageplanbillede til en afdeling og markere lokalers placering på billedet med interaktive polygoner. Funktionen hjælper kursister med at finde tildelte lokaler; det er **ikke** et geografisk GPS-kort.

## Tilknyt en etageplan til en afdeling

1. Åbn administrationsområdet for **Afdelinger**, og rediger den ønskede afdeling.
2. Find panelet **Etageplan**.
3. Vælg eller upload billedet, og vælg **Tilknyt etageplan** (eller **Skift etageplan**, hvis der allerede findes en).
4. Gem eller bekræft afdelingsændringerne efter behov, og kontrollér derefter, at etageplanbilledet indlæses.

Hvis en plan ikke længere er gyldig, skal du bruge **Fjern etageplan**, efter at du har kontrolleret, hvilke lokaler der henviser til den. Upload kun betroet indhold, og følg tilladelserne på administrationsskærmen for afdelinger.

## Marker lokaler

1. Rediger et lokale, der er tildelt den pågældende afdeling.
2. Find **Lokale på etageplan** i lokaleformularen.
3. Brug polygonværktøjet til at tegne lokalets afgrænsning. Brug **Rediger** til at justere hjørnepunkter; alle punkter skal forblive inden for billedet.
4. Vælg **Gem lokaleområde**, og gem derefter lokaleformularen for at bevare ændringerne.
5. Åbn en lokalevisning for at bekræfte den korrekte placering. Brug **Ryd lokaleområde**, hvis tilknytningen skal fjernes.

Et lokale har én redigerbar polygon ad gangen. Lokaletilknytningen er adskilt fra billedet på afdelingsniveau, så en opdatering af billedet kan kræve, at eksisterende lokaleafgrænsninger kontrolleres.

## Hvor kort vises

Autoriserede brugere kan se lokalers etageplaner, når lokaler vælges eller vises i kursusinformation, kalenderbegivenheder og fremmøderelaterede forløb. Kontrollér synligheden med de roller, der faktisk skal se oplysningerne, især studerende og sessionsdeltagere.

Adgangstilladelser for afdelinger og lokaler gælder også for etageplanressourcer. I installationer med flere URL'er skal du kontrollere den korrekte portal-/afdelingsisolation, før kort offentliggøres.

Se [Administration af lokaler](managing-rooms.md) og [Søgning efter ledige lokaler](room-availability-finder.md). Implementeringer: [PR #9321](https://github.com/chamilo/chamilo-lms/pull/9321), [PR #9451](https://github.com/chamilo/chamilo-lms/pull/9451).