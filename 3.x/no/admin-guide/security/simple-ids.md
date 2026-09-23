# Enkel IDS

Chamilo inkluderer et lettvekts innbruddsdeteksjonssystem (IDS) i applikasjonen. Ved hver forespørsel skanner det URL-spørringsparametere, forespørselsstien og et par hoder (`User-Agent`, `Referer`) etter vanlige angrepssignaturer — for eksempel XSS-nyttelaster eller mønstre for katalogtraversering — og logger alt mistenkelig. Siden Enkel IDS lar deg gjennomgå det som er flagget.

Forespørsels**kropper** skannes med vilje ikke, for å unngå falske positiver fra innhold i riktekstredigerere (kursinnhold inneholder legitimt HTML/JavaScript-lignende merking).

## Tilgang til Enkel IDS

Fra administrasjonspanelet klikker du **Sikkerhet > Enkel IDS**.

## Hva den viser

![Siden Enkel IDS som viser diagrammer for hendelser per dag, hendelser etter type og de mest angripende IP-adressene, etterfulgt av en tabell over flaggede IDS-hendelser med dato, IP, deteksjonstype, parameter, URI og detalj](../../.gitbook/assets/admin-security-simple-ids.png)

* **Hendelser per dag (siste 7 dager)**, **Hendelser etter type (siste 30 dager)** og **Mest angripende IP-adresser (siste 30 dager)** — Sammendragsdiagrammer
* **Tabell over flaggede IDS-hendelser** — Hver oppføring viser dato, kilde-IP, deteksjonstype (for eksempel `XSS`), den berørte parameteren, forespørselens URI og en kort beskrivelse av det som ble oppdaget

Bruk filtrene for **IP**, hendelsestype og datointervall over diagrammene for å avgrense resultatene.

## Slik fungerer det

* Hver forespørsel skannes på vei inn; treff legges til i `var/logs/ids/ids_events.log`
* På vei ut legger den samme abonnenten til OWASP-anbefalte sikkerhetshoder i svaret
* Hvis blokkering er aktivert, stoppes en forespørsel som matcher en signatur umiddelbart med et HTTP 400-svar i stedet for å nå applikasjonskoden din

## Konfigurasjon

Enkel IDS styres av miljøvariabler, satt i `config/packages/chamilo_ids.yaml`:

| Variabel | Formål |
|----------|---------|
| `IDS_ENABLED` | Slår skanning og logging av forespørsler på eller av |
| `IDS_BLOCK` | Når aktivert, avvises en oppdaget forespørsel (HTTP 400) i stedet for bare å logges |
| `IDS_SECURITY_HEADERS` | Styrer om de OWASP-anbefalte svarhodene legges til |

Dette er en lettvektsdetektor etter beste evne, ment å fange opp åpenbare skanne- og utnyttelsesforsøk — den erstatter ikke en dedikert webapplikasjonsbrannmur (WAF) for høyrisikoutrullinger.