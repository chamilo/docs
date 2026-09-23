# LTI 1.3

**LTI** (Learning Tools Interoperability) er en standard, der gør det muligt at indlejre eksterne læringsværktøjer i Chamilo. Version 1.3 er den nyeste og mest sikre version af standarden.

Dette værktøj kan også nås fra administrationsdashboardets blok [Platform](../platform/README.md) som **Eksterne værktøjer (LTI)**.

## Hvad LTI muliggør

Med LTI kan du indlejre eksterne værktøjer i Chamilo-kurser. Eksempler:

* Interaktive simulationer
* Specialiserede vurderingsværktøjer
* Værktøjer til indholdsforfatterskab
* Virtuelle laboratorier
* Tredjepartsindholdsbiblioteker

Det eksterne værktøj vises sømløst i Chamilo-grænsefladen.

## Konfiguration af et LTI-værktøj

### Som administrator

1. Gå til LTI-indstillingerne i administrationspanelet
2. **Registrér det eksterne værktøj** ved at angive:
   * **Værktøjsnavn** — Et beskrivende navn
   * **Login URL** — Det eksterne værktøjs OIDC-logininitierings-URL
   * **Redirect URL** — Launch-URL'en, som værktøjet vender tilbage til efter login
   * **Client ID** — Leveret af værktøjsleverandøren
   * **Public keyset URL (JWKS URL)** — Værktøjets JWKS-endepunkt til udveksling af sikkerhedsnøgler
3. Konfigurér **grade passback** — Om værktøjet kan sende karakterer tilbage til Chamilo
4. Gem

### Som underviser

Når et LTI-værktøj er registreret af administratoren, kan undervisere tilføje det til deres kurser:

1. I kurset skal du finde indstillingen til at tilføje et eksternt værktøj
2. Vælg blandt de registrerede LTI-værktøjer
3. Værktøjet vises som et kursusværktøj på startsiden

## Sikkerhed

LTI 1.3 anvender:

* **OAuth 2.0** til autentificering
* **JSON Web Tokens (JWT)** til signering af meddelelser
* **Offentlige/private nøglepar** til verifikation

Det betyder, at legitimationsoplysninger aldrig deles direkte mellem Chamilo og det eksterne værktøj.

## Grade Passback

LTI-værktøjer kan sende karakterer tilbage til Chamilo, som kan integreres i kursets karakterbog. Dette konfigureres pr. værktøj under registreringen.

## Tips

* **Verificér værktøjskompatibilitet** — Sørg for, at det eksterne værktøj understøtter LTI 1.3 (ikke kun ældre versioner)
* **Test i et sandkassemiljø** — Test LTI-integrationen i et testkursus, før den bruges i produktion
* **Overvåg ydeevne** — Eksterne værktøjer tilføjer netværksafhængigheder. Sørg for, at værktøjet er responsivt og pålideligt.