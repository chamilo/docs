# Glossario

Termini focalizzati sullo sviluppo utilizzati in questa guida.

| Termine | Definizione |
|---------|-------------|
| **API Platform** | Un framework PHP per la creazione di API REST e GraphQL, integrato con Symfony. Chamilo lo utilizza per generare automaticamente endpoint API a partire da entità Doctrine. |
| **Bundle** | Un'unità organizzativa di Symfony simile a un plugin o modulo. Chamilo ne ha tre: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Un pattern di Vue 3 per estrarre e riutilizzare logica reattiva. Memorizzato in `assets/vue/composables/`. |
| **Doctrine ORM** | Il mapper oggetto-relazionale PHP utilizzato da Chamilo. Mappa classi di entità PHP a tabelle di database. |
| **Entity** | Una classe PHP annotata con attributi Doctrine che si mappa a una tabella di database. |
| **Encore** | Symfony Webpack Encore — un wrapper attorno a Webpack che semplifica la configurazione della build frontend. |
| **Flysystem** | Una libreria di astrazione del filesystem PHP. Chamilo la utilizza per supportare storage locale, S3, Azure e GCS. |
| **JWT** | JSON Web Token — il meccanismo di autenticazione per l'API REST. |
| **Pinia** | La libreria di gestione dello stato raccomandata per Vue 3. Utilizzata per nuovi store in Chamilo; gli store legacy di Vuex rimangono alongside. |
| **PrimeVue** | La libreria di componenti UI per Vue 3 utilizzata da Chamilo. Fornisce pulsanti, tabelle, dialoghi, ecc. |
| **ResourceNode** | L'entità centrale nel sistema di risorse di Chamilo. Ogni contenuto del corso ha un ResourceNode. |
| **ResourceFile** | Un'entità che rappresenta un file allegato a un ResourceNode. Memorizzato tramite Flysystem. |
| **ResourceLink** | Un'entità che controlla la visibilità e l'accesso per contesto di corso/sessione/gruppo. |
| **SCORM** | Sharable Content Object Reference Model. Uno standard di e-learning per il confezionamento dei contenuti. |
| **Settings Schema** | Una classe PHP che definisce una categoria di impostazioni della piattaforma (ad esempio, SecuritySettingsSchema). |
| **Voter** | Un componente di sicurezza di Symfony che decide se un utente può eseguire un'azione su una risorsa. |
| **Webpack** | Il bundler di moduli JavaScript che compila componenti Vue, SCSS e TypeScript in bundle pronti per il browser. |