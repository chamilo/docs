# Gebruikersprofilering

Chamilo stelt u in staat om aangepaste profielvelden (extra velden) te definiëren om aanvullende informatie over gebruikers vast te leggen, naast de standaard naam, e-mailadres en rol.

## Extra Profielvelden

![De lijst met extra profielvelden toont aangepaste velden met naam, type en zichtbaarheidsinstellingen](/.gitbook/assets/admin-extra-fields-list.png)

Extra velden stellen u in staat om metadata op te slaan die specifiek zijn voor uw organisatie, zoals:

* Werknemer-ID
* Afdeling
* Functietitel
* Locatie/kantoor
* Telefoonnummer
* Aangepaste identificatoren

## Extra Velden Aanmaken

1. Navigeer vanuit het beheerpaneel naar **Extra velden** of **Profielvelden**
2. Klik op **Toevoegen**
3. Configureer het veld:
   * **Naam** — De veldtitel die aan gebruikers wordt getoond
   * **Beschrijving** — Optionele beschrijving
   * **Hulptekst** — Wordt weergegeven onder het veld in elk formulier dat dit veld bevat
   * **Veldtype** — Tekst, dropdown, datum, selectievakje, enz.
   * **Veldlabel** — De interne naam van het veld, voor integratie met plugins
   * **Mogelijke waarden** — Als het veld een selectie tussen deze waarden betreft
   * **Standaardwaarde** — Een optionele standaardwaarde
   * **Zichtbaar voor zichzelf** — Of het veld zichtbaar is op het gebruikersprofiel voor de gebruiker zelf
   * **Zichtbaar voor anderen** — Of het veld zichtbaar is voor andere gebruikers van het platform
   * **Kan wijzigen** — Of de gebruiker zijn eigen veld zelf kan wijzigen (of dat alleen beheerders dit kunnen)
   * **Filter** — Als dit een selectieveld is, of het als filter moet worden opgenomen op administratieve pagina's (bijv. om gebruikers in te schrijven voor cursussen of sessies)
   * **Volgorde** — Als u de weergavevolgorde van de velden wilt beheren, moet u elk veld een numerieke volgorde geven
   * **Verwijderen bij anonimisering** — Belangrijk voor privacyregels en wetten: Als de gebruiker wordt geanonimiseerd maar niet verwijderd, moet dit veld dan worden beschouwd als een mogelijke houder van persoonlijk identificeerbare gegevens?
4. Opslaan

## Veldtypen

De extra-veldengine ondersteunt een breed scala aan invoertypen. Veelvoorkomende typen zijn onder andere:

| Type | Beschrijving |
|------|--------------|
| **Tekst** | Een invoerveld voor één regel tekst |
| **Tekstgebied** | Een invoerveld voor meerdere regels tekst |
| **Radio** | Een groep met keuzerondjes voor één keuze |
| **Dropdown / Dropdown meervoudig** | Een lijst met vooraf gedefinieerde opties (enkele of meervoudige selectie) |
| **Dubbele selectie** | Twee afhankelijke dropdowns (bijv. land → stad) |
| **Selectievakje** | Een ja/nee-schakelaar |
| **Datum / Datum en tijd** | Kiezer voor datum of datum+tijd |
| **Geheel getal** | Een numeriek invoerveld |
| **Tag** | Meerdere vrije tagwaarden |
| **Bestand** | Veld voor het uploaden van bestanden |
| **Video-URL** | Een URL die verwijst naar een video |
| **Mobiel telefoonnummer** | Een geformatteerd veld voor telefoonnummers |
| **Tijdzone** | Een kiezer voor tijdzones |
| **Sociaal profiel** | Een link naar een sociaal netwerkprofiel |
| **Scheidingslijn** | Een visuele scheidingslijn in het formulier (geen waarde) |

De exacte set bruikbare typen hangt af van de Chamilo-versie; de dropdown voor veldtypen op de beheerderspagina **Extra velden** is de bron van waarheid.

## Extra Velden Gebruiken

Extra velden verschijnen:

* In formulieren voor het aanmaken (indien zichtbaar voor zichzelf) en bewerken van gebruikers
* Op gebruikersprofielpagina's (indien zichtbaar voor zichzelf)
* Bij gebruikersimports (u kunt extra veldwaarden opnemen in CSV-imports)
* In exports en rapportages (filteren of groeperen op extra veldwaarden)

## Tips

* **Plan voordat u aanmaakt** — Bepaal welke informatie u nodig heeft voordat u velden aanmaakt, aangezien het wijzigen van veldtypen nadat gegevens zijn ingevoerd problematisch kan zijn
* **Gebruik dropdowns voor consistentie** — Wanneer een veld een bekende set mogelijke waarden heeft, gebruik dan een dropdown in plaats van vrije tekst om gegevensconsistentie te waarborgen
* **Gebruik voor rapportages** — Extra velden zijn nuttig voor het filteren van rapportages (bijv. "toon alle gebruikers in Afdeling X die Training Y hebben voltooid")