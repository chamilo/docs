# Ordlista

Utvecklarinriktade termer som används genomgående i den här guiden.

| Term | Definition |
|------|-----------|
| **API Platform** | Ett PHP-ramverk för att bygga REST- och GraphQL-API:er, integrerat med Symfony. Chamilo använder det för att automatiskt generera API-ändpunkter från Doctrine-entiteter. |
| **Bundle** | En organisatorisk enhet i Symfony, liknande ett plugin eller en modul. Chamilo har tre: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Ett Vue 3-mönster för att extrahera och återanvända reaktiv logik. Lagras i `assets/vue/composables/`. |
| **Doctrine ORM** | Den PHP-objektrelationsmappare som används av Chamilo. Mappar PHP-entitetsklasser till databastabeller. |
| **Entity** | En PHP-klass annoterad med Doctrine-attribut som mappar till en databastabell. |
| **Encore** | Symfony Webpack Encore — ett hölje runt Webpack som förenklar konfigurationen av frontend-byggen. |
| **Flysystem** | Ett PHP-bibliotek för filsystemabstraktion. Chamilo använder det för att stödja lokal lagring samt S3, Azure och GCS. |
| **JWT** | JSON Web Token — autentiseringsmekanismen för REST-API:et. |
| **Pinia** | Det rekommenderade biblioteket för tillståndshantering i Vue 3. Används för nya stores i Chamilo; äldre Vuex-stores finns kvar parallellt. |
| **PrimeVue** | Det Vue 3-bibliotek för UI-komponenter som används av Chamilo. Tillhandahåller knappar, tabeller, dialoger m.m. |
| **ResourceNode** | Den centrala entiteten i Chamilos resurssystem. Varje del av kursinnehåll har en ResourceNode. |
| **ResourceFile** | En entitet som representerar en fil kopplad till en ResourceNode. Lagras via Flysystem. |
| **ResourceLink** | En entitet som styr synlighet och åtkomst per kurs-/sessions-/gruppkontext. |
| **SCORM** | Sharable Content Object Reference Model. En e-lärandestandard för paketering av innehåll. |
| **Settings Schema** | En PHP-klass som definierar en kategori av plattformsinställningar (t.ex. SecuritySettingsSchema). |
| **Voter** | En Symfony-säkerhetskomponent som avgör om en användare får utföra en åtgärd på en resurs. |
| **Webpack** | JavaScript-modulbundlaren som kompilerar Vue-komponenter, SCSS och TypeScript till webbläsarklara paket. |