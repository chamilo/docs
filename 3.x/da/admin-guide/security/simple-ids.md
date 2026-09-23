# Simpel IDS

Chamilo indeholder et letvægts, applikationsinternt intrusion detection-system (IDS). Ved hver forespørgsel scanner det URL-forespørgselsparametre, forespørgselsstien og et par headere (`User-Agent`, `Referer`) for almindelige angrebssignaturer — for eksempel XSS-payloads eller path-traversal-mønstre — og logger alt mistænkeligt. Siden Simpel IDS lader dig gennemgå, hvad der er blevet markeret.

Forespørgsels**bodies** scannes bevidst ikke, for at undgå falske positiver fra indhold i rich-text-editorer (kursustekst indeholder legitimt HTML/JavaScript-lignende markup).

## Adgang til Simpel IDS

Fra administrationspanelet skal du klikke på **Sikkerhed > Simpel IDS**.

## Hvad den viser

![Siden Simpel IDS, der viser diagrammer for hændelser pr. dag, hændelser efter type og de mest angribende IP-adresser, efterfulgt af en tabel over markerede IDS-hændelser med dato, IP, detektionstype, parameter, URI og detalje](/.gitbook/assets/admin-security-simple-ids.png)

* **Hændelser pr. dag (sidste 7 dage)**, **Hændelser efter type (sidste 30 dage)** og **Mest angribende IP-adresser (sidste 30 dage)** — Oversigtsdiagrammer
* **Tabel over markerede IDS-hændelser** — Hver post viser dato, kilde-IP, detektionstype (for eksempel `XSS`), den berørte parameter, forespørgslens URI og en kort beskrivelse af, hvad der blev detekteret

Brug filtrene **IP**, hændelsestype og datointerval over diagrammerne til at indsnævre resultaterne.

## Sådan virker det

* Hver forespørgsel scannes på vej ind; matches tilføjes til `var/logs/ids/ids_events.log`
* På vej ud tilføjer den samme subscriber OWASP-anbefalede sikkerhedsheadere til svaret
* Hvis blokering er aktiveret, stoppes en forespørgsel, der matcher en signatur, øjeblikkeligt med et HTTP 400-svar i stedet for at nå din applikationskode

## Konfiguration

Simpel IDS styres af miljøvariabler, der sættes i `config/packages/chamilo_ids.yaml`:

| Variabel | Formål |
|----------|---------|
| `IDS_ENABLED` | Slår scanning og logning af forespørgsler til eller fra |
| `IDS_BLOCK` | Når den er aktiveret, afvises en detekteret forespørgsel (HTTP 400) i stedet for kun at blive logget |
| `IDS_SECURITY_HEADERS` | Styrer, om de OWASP-anbefalede svarheadere tilføjes |

Dette er en letvægtsdetektor efter bedste evne, der er beregnet til at fange åbenlyse scannings- og udnyttelsesforsøg — den erstatter ikke en dedikeret web application firewall (WAF) til højrisikoudrulninger.