# Utvecklarguide

Välkommen till Chamilo 3.0 Utvecklarguide. Den här guiden är avsedd för utvecklare som vill förstå Chamilos arkitektur, utöka plattformen med plugins, använda API:et, anpassa gränssnittet eller bidra till projektet.

## Arkitektur i korthet

Chamilo 3.0 är byggt på:

* **Backend**: Symfony 7.4 (PHP 8.3–8.5) med Doctrine ORM och API Platform 4
* **Frontend**: Vue 3 med PrimeVue, Pinia state management och Vue Router
* **Byggsystem**: Webpack 5 via Symfony Webpack Encore, med Tailwind CSS
* **Autentisering**: JWT-token (lexik/jwt-authentication-bundle)
* **Fillagring**: Flysystem (stödjer lokal lagring, AWS S3, Azure Blob, Google Cloud)

Kodbasen är organiserad i tre Symfony-bundles:

| Bundle | Syfte |
|--------|---------|
| **CoreBundle** | Plattformskärna: användare, inställningar, resurser, administration, AI-leverantörer, säkerhet |
| **CourseBundle** | Kursspecifika funktioner: dokument, övningar, lärstigar, forum m.m. |
| **LtiBundle** | LTI 1.3-integration för externa lärverktyg |

## Hur den här guiden är organiserad

1. **Komma igång** — Teknikstack, utvecklingsmiljö, projektstruktur
2. **Backend** — Symfony-arkitektur, entiteter, resurssystem, controllers, inställningar
3. **API** — REST API via API Platform, JWT-autentisering, anpassade actions
4. **Frontend** — Vue-komponenter, vyer, routing, state management, byggsystem
5. **Teman** — Färgteman, CSS/Tailwind, Twig-mallar
6. **Plugins** — Pluginarkitektur och utveckling
7. **Bidra** — Kodkonventioner, git-arbetsflöde, testning