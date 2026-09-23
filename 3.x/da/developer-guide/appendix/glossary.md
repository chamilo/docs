# Ordliste

Udviklerorienterede termer, der anvendes i hele denne vejledning.

| Term | Definition |
|------|-----------|
| **API Platform** | Et PHP-framework til at bygge REST- og GraphQL-API'er, integreret med Symfony. Chamilo bruger det til automatisk at generere API-endepunkter ud fra Doctrine-entiteter. |
| **Bundle** | En organisatorisk enhed i Symfony, der svarer til et plugin eller et modul. Chamilo har tre: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Et Vue 3-mønster til at udtrække og genbruge reaktiv logik. Gemmes i `assets/vue/composables/`. |
| **Doctrine ORM** | Den PHP object-relational mapper, som Chamilo anvender. Mapper PHP-entitetsklasser til databasetabeller. |
| **Entity** | En PHP-klasse annoteret med Doctrine-attributter, som mapper til en databasetabel. |
| **Encore** | Symfony Webpack Encore — en wrapper omkring Webpack, der forenkler konfigurationen af frontend-builds. |
| **Flysystem** | Et PHP-bibliotek til abstraktion af filsystemer. Chamilo bruger det til at understøtte lokal, S3-, Azure- og GCS-lagring. |
| **JWT** | JSON Web Token — autentificeringsmekanismen for REST API. |
| **Pinia** | Det anbefalede bibliotek til tilstandsstyring i Vue 3. Bruges til nye stores i Chamilo; ældre Vuex-stores findes fortsat ved siden af. |
| **PrimeVue** | Vue 3-biblioteket til UI-komponenter, som Chamilo anvender. Leverer knapper, tabeller, dialoger m.m. |
| **ResourceNode** | Den centrale entitet i Chamilos ressourcesystem. Hvert stykke kursusindhold har en ResourceNode. |
| **ResourceFile** | En entitet, der repræsenterer en fil knyttet til en ResourceNode. Lagres via Flysystem. |
| **ResourceLink** | En entitet, der styrer synlighed og adgang pr. kursus-/session-/gruppekontekst. |
| **SCORM** | Sharable Content Object Reference Model. En e-læringsstandard til pakning af indhold. |
| **Settings Schema** | En PHP-klasse, der definerer en kategori af platformindstillinger (f.eks. SecuritySettingsSchema). |
| **Voter** | En Symfony-sikkerhedskomponent, der afgør, om en bruger må udføre en handling på en ressource. |
| **Webpack** | JavaScript-modulbundteren, der kompilerer Vue-komponenter, SCSS og TypeScript til browserklare bundles. |