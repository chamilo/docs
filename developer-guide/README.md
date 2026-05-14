# Ontwikkelaarsgids

Welkom bij de Chamilo 2.0 Ontwikkelaarsgids. Deze gids is bedoeld voor ontwikkelaars die de Chamilo-architectuur willen begrijpen, het platform willen uitbreiden met plugins, de API willen gebruiken, de interface willen aanpassen of willen bijdragen aan het project.

## Architectuur in een Oogopslag

Chamilo 2.0 is gebouwd op:

* **Backend**: Symfony 6.4 (PHP 8.2+) met Doctrine ORM en API Platform 3.0
* **Frontend**: Vue 3 met PrimeVue, Pinia state management en Vue Router
* **Buildsysteem**: Webpack 5 via Symfony Webpack Encore, met Tailwind CSS
* **Authenticatie**: JWT tokens (lexik/jwt-authentication-bundle)
* **Bestandsopslag**: Flysystem (ondersteunt lokaal, AWS S3, Azure Blob, Google Cloud)

De codebase is georganiseerd in drie Symfony-bundles:

| Bundle | Doel |
|--------|------|
| **CoreBundle** | Kern van het platform: gebruikers, instellingen, bronnen, beheer, AI-providers, beveiliging |
| **CourseBundle** | Cursusspecifieke functies: documenten, oefeningen, leerpaden, forums, enz. |
| **LtiBundle** | LTI 1.3 integratie voor externe leermiddelen |

## Hoe Deze Gids Is Georganiseerd

1. **Aan de Slag** — Technologie-stack, ontwikkelomgeving, projectstructuur
2. **Backend** — Symfony-architectuur, entiteiten, bronnensysteem, controllers, instellingen
3. **API** — REST API via API Platform, JWT-authenticatie, aangepaste acties
4. **Frontend** — Vue-componenten, weergaven, routing, state management, buildsysteem
5. **Thema's** — Kleurenthema's, CSS/Tailwind, Twig-templates
6. **Plugins** — Plugin-architectuur en ontwikkeling
7. **Bijdragen** — Codeerconventies, git-workflow, testen