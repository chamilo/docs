# Glossarium

Ontwikkelaarsgerichte termen die in deze gids worden gebruikt.

| Term | Definitie |
|------|-----------|
| **API Platform** | Een PHP-framework voor het bouwen van REST- en GraphQL-API's, geïntegreerd met Symfony. Chamilo gebruikt het om API-eindpunten automatisch te genereren vanuit Doctrine-entiteiten. |
| **Bundle** | Een organisatorische eenheid van Symfony, vergelijkbaar met een plugin of module. Chamilo heeft er drie: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Een Vue 3-patroon voor het extraheren en hergebruiken van reactieve logica. Opgeslagen in `assets/vue/composables/`. |
| **Doctrine ORM** | De PHP object-relational mapper die Chamilo gebruikt. Koppelt PHP-entiteitsklassen aan databasetabellen. |
| **Entity** | Een PHP-klasse geannoteerd met Doctrine-attributen die naar een databasetabel wordt gekoppeld. |
| **Encore** | Symfony Webpack Encore — een wrapper rond Webpack die de configuratie van de frontend-build vereenvoudigt. |
| **Flysystem** | Een PHP-bibliotheek voor abstractie van het bestandssysteem. Chamilo gebruikt het om lokale, S3-, Azure- en GCS-opslag te ondersteunen. |
| **JWT** | JSON Web Token — het authenticatiemechanisme voor de REST API. |
| **Pinia** | De aanbevolen bibliotheek voor state management in Vue 3. Wordt gebruikt voor nieuwe stores in Chamilo; legacy Vuex-stores blijven ernaast bestaan. |
| **PrimeVue** | De Vue 3 UI-componentenbibliotheek die Chamilo gebruikt. Levert knoppen, tabellen, dialogen, enz. |
| **ResourceNode** | De centrale entiteit in het resourcesysteem van Chamilo. Elk stuk cursusinhoud heeft een ResourceNode. |
| **ResourceFile** | Een entiteit die een bestand voorstelt dat aan een ResourceNode is gekoppeld. Opgeslagen via Flysystem. |
| **ResourceLink** | Een entiteit die zichtbaarheid en toegang per cursus-/sessie-/groepcontext beheert. |
| **SCORM** | Sharable Content Object Reference Model. Een e-learningstandaard voor het verpakken van inhoud. |
| **Settings Schema** | Een PHP-klasse die een categorie van platforminstellingen definieert (bijv. SecuritySettingsSchema). |
| **Voter** | Een Symfony-beveiligingscomponent die bepaalt of een gebruiker een actie op een resource mag uitvoeren. |
| **Webpack** | De JavaScript-modulebundler die Vue-componenten, SCSS en TypeScript compileert tot bundels die in de browser kunnen worden gebruikt. |