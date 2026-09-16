# Guida per Sviluppatori

Benvenuti alla Guida per Sviluppatori di Chamilo 2.0. Questa guida è rivolta agli sviluppatori che desiderano comprendere l'architettura di Chamilo, estendere la piattaforma con plugin, utilizzare l'API, personalizzare l'interfaccia o contribuire al progetto.

## Architettura in Breve

Chamilo 2.0 è costruito su:

* **Backend**: Symfony 6.4 (PHP 8.2+) con Doctrine ORM e API Platform 3.0
* **Frontend**: Vue 3 con PrimeVue, gestione dello stato con Pinia e Vue Router
* **Sistema di build**: Webpack 5 tramite Symfony Webpack Encore, con Tailwind CSS
* **Autenticazione**: Token JWT (lexik/jwt-authentication-bundle)
* **Archiviazione file**: Flysystem (supporta locale, AWS S3, Azure Blob, Google Cloud)

Il codice sorgente è organizzato in tre bundle Symfony:

| Bundle | Scopo |
|--------|-------|
| **CoreBundle** | Nucleo della piattaforma: utenti, impostazioni, risorse, amministrazione, provider AI, sicurezza |
| **CourseBundle** | Funzionalità specifiche dei corsi: documenti, esercizi, percorsi di apprendimento, forum, ecc. |
| **LtiBundle** | Integrazione LTI 1.3 per strumenti di apprendimento esterni |

## Organizzazione di Questa Guida

1. **Primi Passi** — Stack tecnologico, configurazione per lo sviluppo, struttura del progetto
2. **Backend** — Architettura Symfony, entità, sistema di risorse, controller, impostazioni
3. **API** — API REST tramite API Platform, autenticazione JWT, azioni personalizzate
4. **Frontend** — Componenti Vue, viste, routing, gestione dello stato, sistema di build
5. **Temi** — Temi di colore, CSS/Tailwind, template Twig
6. **Plugin** — Architettura e sviluppo dei plugin
7. **Contribuire** — Convenzioni di codifica, flusso di lavoro con git, test