# Helsesjekk

Helsesjekk er en liten blokk på administrasjonsoversikten som kjører noen få sanntidssjekker av installasjonen din og flagger alt som trenger oppmerksomhet — uten at du trenger å grave i konfigurasjonsfiler for å oppdage vanlige feilkonfigurasjoner.

![Helsesjekk-blokken på administrasjonsoversikten, som viser bestått/ikke bestått-status for e-postinnstillinger, tildeling av admin-URL og sjekker av filrettigheter](/.gitbook/assets/admin-health-check-block.png)

## Tilgang til Helsesjekk

Fra administrasjonspanelet vises **Helsesjekk**-blokken sammen med de andre oversiktsblokkene — ingen klikk er nødvendig, resultatene vises direkte.

## Sjekkene

* **E-postinnstillinger** — Kontrollerer at en mailer-tilkoblingsstreng og en «fra»-e-post/navn er konfigurert. Hvis ikke, lenkes det til Mail-innstillinger for å rette det.
* **Alle URL-er har minst én admin tildelt** — På en installasjon med flere URL-er sjekkes det at hver tilgangs-URL har minst én administrator som kan administrere den. Hvis én mangler det, lenkes det til siden for tildeling av tilgangs-URL/bruker.
* **`.env` er ikke skrivbar** — `.env` inneholder hemmeligheter og skal ikke være skrivbar for webserveren etter installasjon. Flagges som en feil hvis den er det; lenker til Security Guide.
* **`config/` er ikke skrivbar** — Samme begrunnelse som `.env`: denne katalogen skal ikke være skrivbar via web i normal drift. Lenker til Security Guide.
* **`var/cache` er skrivbar** — Den motsatte sjekken: Symfony må kunne skrive til cache-katalogen sin, så denne flagges som en feil hvis den *ikke* er skrivbar. Lenker til guiden for ytelsesjustering / optimalisering.
* **Installasjonsmappen er ikke til stede** — Mappen `public/main/install` trengs bare under installasjon og bør fjernes etterpå. Dette flagges som en advarsel (ikke en hard feil) hvis den fortsatt finnes, siden det er en lavere alvorlighetsgrad enn de to skrivbarhetssjekkene over. Lenker til Security Guide.

## Hva du bør gjøre

Hver sjekk lenker direkte til der du retter det underliggende problemet — enten en innstillingsside eller den relevante guiden. Gå gjennom denne listen rett etter installasjon, og periodisk etterpå (for eksempel etter en manuell filoverføring eller endring av rettigheter), siden en sjekk som består i dag ikke garanterer at den forblir slik. For en bredere sjekkliste for produksjonsherding utover disse seks sjekkene, se [Security Guide](appendix/security-guide.md).