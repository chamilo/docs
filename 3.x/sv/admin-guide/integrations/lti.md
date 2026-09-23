# LTI 1.3

**LTI** (Learning Tools Interoperability) är en standard som gör det möjligt att bädda in externa lärverktyg i Chamilo. Version 1.3 är den senaste och mest säkra versionen av standarden.

Verktyget nås även från administrationspanelens block [Plattform](../platform/README.md), som **Externa verktyg (LTI)**.

## Vad LTI möjliggör

Med LTI kan du bädda in externa verktyg i Chamilo-kurser. Exempel:

* Interaktiva simuleringar
* Specialiserade bedömningsverktyg
* Verktyg för innehållsproduktion
* Virtuella laboratorier
* Tredjepartsbibliotek med innehåll

Det externa verktyget visas sömlöst i Chamilo-gränssnittet.

## Konfigurera ett LTI-verktyg

### Som administratör

1. Gå till LTI-inställningarna i administrationspanelen
2. **Registrera det externa verktyget** genom att ange:
   * **Verktygsnamn** — Ett beskrivande namn
   * **Login URL** — Verktygets OIDC-URL för inloggningsinitiering
   * **Redirect URL** — Start-URL som verktyget återgår till efter inloggning
   * **Client ID** — Tillhandahålls av verktygsleverantören
   * **Public keyset URL (JWKS URL)** — Verktygets JWKS-slutpunkt för utbyte av säkerhetsnycklar
3. Konfigurera **grade passback** — Om verktyget får skicka betyg tillbaka till Chamilo
4. Spara

### Som lärare

När ett LTI-verktyg har registrerats av administratören kan lärare lägga till det i sina kurser:

1. I kursen, sök efter alternativet att lägga till ett externt verktyg
2. Välj bland de registrerade LTI-verktygen
3. Verktyget visas som ett kursverktyg på startsidan

## Säkerhet

LTI 1.3 använder:

* **OAuth 2.0** för autentisering
* **JSON Web Tokens (JWT)** för meddelandesignering
* **Nyckelpar med publik/privat nyckel** för verifiering

Det innebär att inloggningsuppgifter aldrig delas direkt mellan Chamilo och det externa verktyget.

## Grade Passback

LTI-verktyg kan skicka betyg tillbaka till Chamilo, som kan integreras i kursens betygsbok. Detta konfigureras per verktyg vid registreringen.

## Tips

* **Kontrollera verktygskompatibilitet** — Säkerställ att det externa verktyget stöder LTI 1.3 (inte bara äldre versioner)
* **Testa i en sandlåda** — Testa LTI-integrationen i en testkurs innan den används i produktion
* **Övervaka prestanda** — Externa verktyg medför nätverksberoenden. Säkerställ att verktyget är responsivt och tillförlitligt.