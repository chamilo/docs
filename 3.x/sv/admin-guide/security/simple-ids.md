# Enkel IDS

Chamilo innehåller ett lättviktigt, inbyggt system för intrångsdetektering (IDS). Vid varje begäran skannas URL-frågeparametrar, sökvägen och ett par headers (`User-Agent`, `Referer`) efter vanliga attacksignaturer — till exempel XSS-payloads eller mönster för path traversal — och allt misstänkt loggas. Sidan Enkel IDS låter dig granska vad som har flaggats.

Begärans **bodies** skannas avsiktligt inte, för att undvika falska positiva träffar från innehåll i rich-text-redigerare (kursinnehåll innehåller legitimt HTML/JavaScript-liknande märkning).

## Åtkomst till Enkel IDS

Från administrationspanelen klickar du på **Säkerhet > Enkel IDS**.

## Vad den visar

![Sidan Enkel IDS som visar diagram för händelser per dag, händelser per typ och de mest attackerande IP-adresserna, följt av en tabell med flaggade IDS-händelser med datum, IP, detektionstyp, parameter, URI och detalj](../../.gitbook/assets/admin-security-simple-ids.png)

* **Händelser per dag (senaste 7 dagarna)**, **Händelser per typ (senaste 30 dagarna)** och **Mest attackerande IP-adresser (senaste 30 dagarna)** — Sammanfattande diagram
* **Tabell över flaggade IDS-händelser** — Varje post visar datum, käll-IP, detektionstyp (till exempel `XSS`), den berörda parametern, begärans URI och en kort beskrivning av vad som detekterades

Använd filtren för **IP**, händelsetyp och datumintervall ovanför diagrammen för att begränsa resultaten.

## Så fungerar det

* Varje begäran skannas på vägen in; träffar läggs till i `var/logs/ids/ids_events.log`
* På vägen ut lägger samma subscriber till OWASP-rekommenderade säkerhetsheaders i svaret
* Om blockering är aktiverad stoppas en begäran som matchar en signatur omedelbart med ett HTTP 400-svar i stället för att nå din applikationskod

## Konfiguration

Enkel IDS styrs av miljövariabler, som anges i `config/packages/chamilo_ids.yaml`:

| Variable | Purpose |
|----------|---------|
| `IDS_ENABLED` | Turns request scanning and logging on or off |
| `IDS_BLOCK` | When enabled, a detected request is rejected (HTTP 400) instead of only logged |
| `IDS_SECURITY_HEADERS` | Controls whether the OWASP-recommended response headers are added |

Detta är en lättviktig detektor enligt bästa förmåga, avsedd att fånga uppenbara skannings- och exploateringsförsök — den ersätter inte en dedikerad webbapplikationsbrandvägg (WAF) för högriskmiljöer.