# Glossario

Termini orientati agli sviluppatori utilizzati in questa guida.

| Termine | Definizione |
|------|-----------|
| **API Platform** | Un framework PHP per la creazione di API REST e GraphQL, integrato con Symfony. Chamilo lo utilizza per generare automaticamente gli endpoint API a partire dalle entità Doctrine. |
| **Bundle** | Un'unità organizzativa di Symfony analoga a un plugin o a un modulo. Chamilo ne ha tre: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Un pattern di Vue 3 per estrarre e riutilizzare la logica reattiva. Conservati in `assets/vue/composables/`. |
| **Doctrine ORM** | L'object-relational mapper PHP utilizzato da Chamilo. Mappa le classi entità PHP sulle tabelle del database. |
| **Entity** | Una classe PHP annotata con attributi Doctrine che corrisponde a una tabella del database. |
| **Encore** | Symfony Webpack Encore — un wrapper intorno a Webpack che semplifica la configurazione della build frontend. |
| **Flysystem** | Una libreria PHP di astrazione del filesystem. Chamilo la utilizza per supportare lo storage locale, S3, Azure e GCS. |
| **JWT** | JSON Web Token — il meccanismo di autenticazione per l'API REST. |
| **Pinia** | La libreria di gestione dello stato raccomandata per Vue 3. Utilizzata per i nuovi store in Chamilo; gli store Vuex legacy restano affiancati. |
| **PrimeVue** | La libreria di componenti UI Vue 3 utilizzata da Chamilo. Fornisce pulsanti, tabelle, finestre di dialogo, ecc. |
| **ResourceNode** | L'entità centrale nel sistema delle risorse di Chamilo. Ogni elemento di contenuto di un corso possiede un ResourceNode. |
| **ResourceFile** | Un'entità che rappresenta un file associato a un ResourceNode. Archiviato tramite Flysystem. |
| **ResourceLink** | Un'entità che controlla visibilità e accesso per contesto di corso/sessione/gruppo. |
| **SCORM** | Sharable Content Object Reference Model. Uno standard e-learning per il confezionamento dei contenuti. |
| **Settings Schema** | Una classe PHP che definisce una categoria di impostazioni della piattaforma (ad es. SecuritySettingsSchema). |
| **Voter** | Un componente di sicurezza di Symfony che decide se un utente può eseguire un'azione su una risorsa. |
| **Webpack** | Il module bundler JavaScript che compila componenti Vue, SCSS e TypeScript in bundle pronti per il browser. |