# Administration af rum

Rum i Chamilo er organiseret under afdelinger: en afdeling er et fysisk sted, og hvert rum tilhører præcis én afdeling.

## Afdelinger

**Rooms > Branches** administrerer din organisations fysiske steder — en bygning, et campus eller et kontor. Afdelinger kan indlejres (en afdeling kan have underafdelinger), så du kan modellere noget som "Hovedcampus > Bygning A."

Felter, du kan angive for en afdeling:

* **Title** og **Description**
* **Parent branch** — Til hierarkisk organisering af afdelinger
* **IP address** — Valgfrit, til netværksbaseret identifikation
* **Latitude / Longitude** — Til kortlægning
* **Download / Upload speed** og **Delay** — Valgfri metadata om netværkskvalitet
* **Administrator e-mail, name, and phone** — Kontaktoplysninger for den, der administrerer det pågældende sted

## Rum

**Rooms > Rooms** administrerer de egentlige bookbare rum inden for en afdeling — typisk et klasseværelse eller et undervisningslokale. Hvert rum skal tilhøre en afdeling.

Felter, du kan angive for et rum:

* **Title** og **Description**
* **Branch** — Hvilken afdeling dette rum tilhører (påkrævet)
* **Floor number**
* **Capacity** — Skal være et positivt tal
* **Geolocation**, **IP address** og **IP mask** — Valgfrie avancerede felter

Hvert rum har desuden en kalendervisning for "Occupation", der viser dets bookinger, samt et antal af de kurser, der bruger det.

## Relateret

For at finde et ledigt rum til et bestemt tidsrum i stedet for at gennemse listen, se [Finder til rumtilgængelighed](room-availability-finder.md).