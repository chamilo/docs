# Simple IDS

Chamilo bevat een lichtgewicht, in de toepassing ingebouwd intrusion detection system (IDS). Bij elk verzoek scant het de URL-queryparameters, het verzoekpad en een paar headers (`User-Agent`, `Referer`) op veelvoorkomende aanvalssignaturen — bijvoorbeeld XSS-payloads of path-traversalpatronen — en logt het alles wat verdacht is. Op de pagina Simple IDS kunt u bekijken wat er is gemarkeerd.

Verzoek**bodies** worden opzettelijk niet gescand, om valse positieven te vermijden door inhoud van rich-text-editors (cursustekst bevat legitiem HTML/JavaScript-achtige markup).

## Simple IDS openen

Klik in het beheerpaneel op **Beveiliging > Simple IDS**.

## Wat het toont

![De pagina Simple IDS met grafieken voor gebeurtenissen per dag, gebeurtenissen per type en belangrijkste aanvallende IP-adressen, gevolgd door een tabel met gemarkeerde IDS-gebeurtenissen met datum, IP, detectietype, parameter, URI en detail](/.gitbook/assets/admin-security-simple-ids.png)

* **Gebeurtenissen per dag (laatste 7 dagen)**, **Gebeurtenissen per type (laatste 30 dagen)** en **Belangrijkste aanvallende IP-adressen (laatste 30 dagen)** — Samenvattende grafieken
* **Tabel met gemarkeerde IDS-gebeurtenissen** — Elke vermelding toont de datum, het bron-IP, het detectietype (bijvoorbeeld `XSS`), de betreffende parameter, de verzoek-URI en een korte beschrijving van wat is gedetecteerd

Gebruik de filters **IP**, gebeurtenistype en datumbereik boven de grafieken om de resultaten te beperken.

## Hoe het werkt

* Elk verzoek wordt bij binnenkomst gescand; overeenkomsten worden toegevoegd aan `var/logs/ids/ids_events.log`
* Bij uitgaande antwoorden voegt dezelfde subscriber de door OWASP aanbevolen beveiligingsheaders toe aan de response
* Als blokkeren is ingeschakeld, wordt een verzoek dat overeenkomt met een signatuur onmiddellijk gestopt met een HTTP 400-response in plaats van uw applicatiecode te bereiken

## Configuratie

Simple IDS wordt bestuurd via omgevingsvariabelen, ingesteld in `config/packages/chamilo_ids.yaml`:

| Variabele | Doel |
|----------|---------|
| `IDS_ENABLED` | Schakelt het scannen en loggen van verzoeken in of uit |
| `IDS_BLOCK` | Indien ingeschakeld wordt een gedetecteerd verzoek geweigerd (HTTP 400) in plaats van alleen gelogd |
| `IDS_SECURITY_HEADERS` | Bepaalt of de door OWASP aanbevolen responseheaders worden toegevoegd |

Dit is een lichtgewicht detector op best-effortbasis, bedoeld om voor de hand liggende scan- en exploitatiepogingen te onderscheppen — het vervangt geen dedicated web application firewall (WAF) voor risicovolle implementaties.