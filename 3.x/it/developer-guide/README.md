# Guida per sviluppatori

Benvenuti nella Guida per sviluppatori di Chamilo 3.0. Questa guida è destinata agli sviluppatori che desiderano comprendere l'architettura di Chamilo, estendere la piattaforma con plugin, utilizzare l'API, personalizzare l'interfaccia o contribuire al progetto.

## Architettura in sintesi

Chamilo 3.0 è basato su:

* **Backend**: Symfony 7.4 (PHP 8.3–8.5) con Doctrine ORM e API Platform 4
* **Frontend**: Vue 3 con PrimeVue, gestione dello stato Pinia e Vue Router
* **Sistema di build**: Webpack 5 tramite Symfony Webpack Encore, con Tailwind CSS
* **Autenticazione**: token JWT (lexik/jwt-authentication-bundle)
* **Archiviazione file**: Flysystem (supporta locale, AWS S3, Azure Blob, Google Cloud)

Il codice è organizzato in tre bundle Symfony:

| Bundle | Scopo |
|--------|---------|
| **CoreBundle** | Nucleo della piattaforma: utenti, impostazioni, risorse, amministrazione, provider di IA, sicurezza |
| **CourseBundle** | Funzionalità specifiche dei corsi: documenti, esercizi, percorsi di apprendimento, forum, ecc. |
| **LtiBundle** | Integrazione LTI 1.3 per strumenti di apprendimento esterni |

## Come è organizzata questa guida

1. **Per iniziare** — Stack tecnologico, ambiente di sviluppo, struttura del progetto
2. **Backend** — Architettura Symfony, entità, sistema delle risorse, controller, impostazioni
3. **API** — REST API tramite API Platform, autenticazione JWT, azioni personalizzate
4. **Frontend** — Componenti Vue, viste, routing, gestione dello stato, sistema di build
5. **Temi** — Temi di colore, CSS/Tailwind, template Twig
6. **Plugin** — Architettura e sviluppo dei plugin
7. **Contribuire** — Convenzioni di codice, flusso di lavoro git, test