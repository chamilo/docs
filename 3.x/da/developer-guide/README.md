# Udviklervejledning

Velkommen til udviklervejledningen til Chamilo 3.0. Denne vejledning er til udviklere, der ønsker at forstå Chamilo-arkitekturen, udvide platformen med plugins, bruge API'et, tilpasse grænsefladen eller bidrage til projektet.

## Arkitektur i overblik

Chamilo 3.0 er bygget på:

* **Backend**: Symfony 7.4 (PHP 8.3–8.5) med Doctrine ORM og API Platform 4
* **Frontend**: Vue 3 med PrimeVue, Pinia-tilstandsstyring og Vue Router
* **Byggesystem**: Webpack 5 via Symfony Webpack Encore, med Tailwind CSS
* **Autentificering**: JWT-tokens (lexik/jwt-authentication-bundle)
* **Fillagring**: Flysystem (understøtter lokal, AWS S3, Azure Blob, Google Cloud)

Kodebasen er organiseret i tre Symfony-bundles:

| Bundle | Formål |
|--------|---------|
| **CoreBundle** | Platformkerne: brugere, indstillinger, ressourcer, administration, AI-udbydere, sikkerhed |
| **CourseBundle** | Kursusspecifikke funktioner: dokumenter, øvelser, læringsstier, fora m.m. |
| **LtiBundle** | LTI 1.3-integration til eksterne læringsværktøjer |

## Sådan er denne vejledning opbygget

1. **Kom godt i gang** — Teknologistak, udviklingsopsætning, projektstruktur
2. **Backend** — Symfony-arkitektur, entiteter, ressourcesystem, controllere, indstillinger
3. **API** — REST API via API Platform, JWT-autentificering, tilpassede handlinger
4. **Frontend** — Vue-komponenter, visninger, routing, tilstandsstyring, byggesystem
5. **Temaer** — Farvetemaer, CSS/Tailwind, Twig-skabeloner
6. **Plugins** — Plugin-arkitektur og -udvikling
7. **Bidrag** — Kodningskonventioner, git-arbejdsgang, test