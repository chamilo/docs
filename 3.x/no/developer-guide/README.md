# Utviklerhåndbok

Velkommen til utviklerhåndboken for Chamilo 3.0. Denne håndboken er for utviklere som ønsker å forstå Chamilo-arkitekturen, utvide plattformen med plugins, bruke API-et, tilpasse grensesnittet eller bidra til prosjektet.

## Arkitektur i korte trekk

Chamilo 3.0 er bygget på:

* **Backend**: Symfony 7.4 (PHP 8.3–8.5) med Doctrine ORM og API Platform 4
* **Frontend**: Vue 3 med PrimeVue, Pinia-tilstandsstyring og Vue Router
* **Byggsystem**: Webpack 5 via Symfony Webpack Encore, med Tailwind CSS
* **Autentisering**: JWT-tokens (lexik/jwt-authentication-bundle)
* **Fillagring**: Flysystem (støtter lokal lagring, AWS S3, Azure Blob, Google Cloud)

Kodebasen er organisert i tre Symfony-bundles:

| Bundle | Formål |
|--------|---------|
| **CoreBundle** | Plattformkjerne: brukere, innstillinger, ressurser, administrasjon, AI-leverandører, sikkerhet |
| **CourseBundle** | Kurs-spesifikke funksjoner: dokumenter, øvelser, læringsstier, forum, osv. |
| **LtiBundle** | LTI 1.3-integrasjon for eksterne læringsverktøy |

## Hvordan denne håndboken er organisert

1. **Komme i gang** — Teknologistakk, utviklingsoppsett, prosjektstruktur
2. **Backend** — Symfony-arkitektur, entiteter, ressurssystem, kontrollere, innstillinger
3. **API** — REST API via API Platform, JWT-autentisering, egendefinerte handlinger
4. **Frontend** — Vue-komponenter, visninger, ruting, tilstandsstyring, byggsystem
5. **Tematisering** — Fargetemaer, CSS/Tailwind, Twig-maler
6. **Plugins** — Plugin-arkitektur og utvikling
7. **Bidrag** — Kodestandarder, git-arbeidsflyt, testing