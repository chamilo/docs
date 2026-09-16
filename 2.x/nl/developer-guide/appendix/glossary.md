# Woordenlijst

Ontwikkelaarsgerichte termen die in deze handleiding worden gebruikt.

| Term | Definitie |
|------|-----------|
| **API Platform** | Een PHP-framework voor het bouwen van REST- en GraphQL-API's, geïntegreerd met Symfony. Chamilo gebruikt het om automatisch API-eindpunten te genereren vanuit Doctrine-entiteiten. |
| **Bundle** | Een organisatorische eenheid in Symfony, vergelijkbaar met een plugin of module. Chamilo heeft er drie: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Een Vue 3-patroon voor het extraheren en hergebruiken van reactieve logica. Opgeslagen in `assets/vue/composables/`. |
| **Doctrine ORM** | De PHP object-relationele mapper die door Chamilo wordt gebruikt. Koppelt PHP-entiteitsklassen aan databasetabellen. |
| **Entity** | Een PHP-klasse met Doctrine-attributen die aan een databasetabel is gekoppeld. |
| **Encore** | Symfony Webpack Encore — een wrapper rond Webpack die de configuratie van frontend-builds vereenvoudigt. |
| **Flysystem** | Een PHP-bestandssysteemabstractiebibliotheek. Chamilo gebruikt het om lokale opslag, S3, Azure en GCS te ondersteunen. |
| **JWT** | JSON Web Token — het authenticatiemechanisme voor de REST API. |
| **Pinia** | De aanbevolen bibliotheek voor statusbeheer in Vue 3. Gebruikt voor nieuwe stores in Chamilo; oudere Vuex-stores blijven ernaast bestaan. |
| **PrimeVue** | De Vue 3 UI-componentbibliotheek die door Chamilo wordt gebruikt. Biedt knoppen, tabellen, dialogen, enz. |
| **ResourceNode** | De centrale entiteit in het resource-systeem van Chamilo. Elk stuk cursusinhoud heeft een ResourceNode. |
| **ResourceFile** | Een entiteit die een bestand vertegenwoordigt dat aan een ResourceNode is gekoppeld. Opgeslagen via Flysystem. |
| **ResourceLink** | Een entiteit die zichtbaarheid en toegang regelt per cursus/sessie/groep-context. |
| **SCORM** | Sharable Content Object Reference Model. Een e-learningstandaard voor het verpakken van inhoud. |
| **Settings Schema** | Een PHP-klasse die een categorie van platforminstellingen definieert (bijv. SecuritySettingsSchema). |
| **Voter** | Een Symfony-beveiligingscomponent die bepaalt of een gebruiker een actie op een resource mag uitvoeren. |
| **Webpack** | De JavaScript-modulebundelaar die Vue-componenten, SCSS en TypeScript compileert naar browserklare bundels. |