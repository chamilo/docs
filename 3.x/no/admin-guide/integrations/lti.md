# LTI 1.3

**LTI** (Learning Tools Interoperability) er en standard som gjør det mulig å bygge inn eksterne læringsverktøy i Chamilo. Versjon 1.3 er den nyeste og mest sikre versjonen av standarden.

Dette verktøyet er også tilgjengelig fra administrasjonspanelets [Plattform](../platform/README.md)-blokk, som **Eksterne verktøy (LTI)**.

## Hva LTI gjør mulig

Med LTI kan du bygge inn eksterne verktøy i Chamilo-kurs. Eksempler:

* Interaktive simuleringer
* Spesialiserte vurderingsverktøy
* Verktøy for innholdsproduksjon
* Virtuelle laboratorier
* Tredjeparts innholdsbiblioteker

Det eksterne verktøyet vises sømløst i Chamilo-grensesnittet.

## Konfigurere et LTI-verktøy

### Som administrator

1. Gå til LTI-innstillingene i administrasjonspanelet
2. **Registrer det eksterne verktøyet** ved å oppgi:
   * **Verktøynavn** — Et beskrivende navn
   * **Login URL** — OIDC-URL-en for innloggingsinitiering hos det eksterne verktøyet
   * **Redirect URL** — Start-URL-en verktøyet returnerer til etter innlogging
   * **Client ID** — Oppgis av verktøyleverandøren
   * **Public keyset URL (JWKS URL)** — Verktøyets JWKS-endepunkt for utveksling av sikkerhetsnøkler
3. Konfigurer **grade passback** — Om verktøyet kan sende karakterer tilbake til Chamilo
4. Lagre

### Som lærer

Når et LTI-verktøy er registrert av administratoren, kan lærere legge det til i kursene sine:

1. I kurset, se etter muligheten til å legge til et eksternt verktøy
2. Velg blant de registrerte LTI-verktøyene
3. Verktøyet vises som et kursverktøy på startsiden

## Sikkerhet

LTI 1.3 bruker:

* **OAuth 2.0** for autentisering
* **JSON Web Tokens (JWT)** for meldingssignering
* **Offentlige/private nøkkelpar** for verifisering

Dette betyr at legitimasjon aldri deles direkte mellom Chamilo og det eksterne verktøyet.

## Grade passback

LTI-verktøy kan sende karakterer tilbake til Chamilo, som kan integreres i kursets karakterbok. Dette konfigureres per verktøy under registreringen.

## Tips

* **Kontroller verktøykompatibilitet** — Sørg for at det eksterne verktøyet støtter LTI 1.3 (ikke bare eldre versjoner)
* **Test i et sandkassemiljø** — Test LTI-integrasjonen i et testkurs før den tas i bruk i produksjon
* **Overvåk ytelse** — Eksterne verktøy introduserer nettverksavhengigheter. Sørg for at verktøyet er responsivt og pålitelig.