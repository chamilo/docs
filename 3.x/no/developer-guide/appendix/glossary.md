# Ordliste

Utviklerorienterte termer brukt gjennom hele denne veiledningen.

| Term | Definition |
|------|-----------|
| **API Platform** | Et PHP-rammeverk for å bygge REST- og GraphQL-API-er, integrert med Symfony. Chamilo bruker det til å autogenerere API-endepunkter fra Doctrine-entiteter. |
| **Bundle** | En organisatorisk enhet i Symfony, tilsvarende et plugin eller en modul. Chamilo har tre: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Et Vue 3-mønster for å trekke ut og gjenbruke reaktiv logikk. Lagres i `assets/vue/composables/`. |
| **Doctrine ORM** | Objekt-relasjonskartleggeren (ORM) i PHP som brukes av Chamilo. Kartlegger PHP-entitetsklasser til databasetabeller. |
| **Entity** | En PHP-klasse annotert med Doctrine-attributter som kartlegges til en databasetabell. |
| **Encore** | Symfony Webpack Encore — et lag rundt Webpack som forenkler konfigurasjonen av frontend-bygget. |
| **Flysystem** | Et PHP-bibliotek for filsystemabstraksjon. Chamilo bruker det for å støtte lokal lagring samt S3, Azure og GCS. |
| **JWT** | JSON Web Token — autentiseringsmekanismen for REST-API-et. |
| **Pinia** | Det anbefalte biblioteket for tilstandshåndtering i Vue 3. Brukes til nye stores i Chamilo; eldre Vuex-stores eksisterer parallelt. |
| **PrimeVue** | Vue 3-biblioteket for UI-komponenter som brukes av Chamilo. Tilbyr knapper, tabeller, dialoger m.m. |
| **ResourceNode** | Den sentrale entiteten i Chamilos ressurssystem. Hvert stykke kursinnhold har en ResourceNode. |
| **ResourceFile** | En entitet som representerer en fil knyttet til en ResourceNode. Lagres via Flysystem. |
| **ResourceLink** | En entitet som styrer synlighet og tilgang per kurs-/økt-/gruppekontekst. |
| **SCORM** | Sharable Content Object Reference Model. En e-læringsstandard for pakking av innhold. |
| **Settings Schema** | En PHP-klasse som definerer en kategori av plattforminnstillinger (f.eks. SecuritySettingsSchema). |
| **Voter** | En Symfony-sikkerhetskomponent som avgjør om en bruker kan utføre en handling på en ressurs. |
| **Webpack** | JavaScript-modulbundleren som kompilerer Vue-komponenter, SCSS og TypeScript til nettleserklare bundler. |