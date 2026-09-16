# Developergids

Welkom bij de Chamilo 3.0 Developergids. Deze gids is bedoeld voor ontwikkelaars die de Chamilo-architectuur willen begrijpen, het platform willen uitbreiden met plugins, de API willen gebruiken, de interface willen aanpassen of willen bijdragen aan het project.

## Architectuur in het kort

Chamilo 3.0 is gebouwd op:

* **Backend**: Symfony 7.4 (PHP 8.3–8.5) met Doctrine ORM en API Platform 4
* **Frontend**: Vue 3 met PrimeVue, Pinia-statebeheer en Vue Router
* **Bouwsysteem**: Webpack 5 via Symfony Webpack Encore, met Tailwind CSS
* **Authenticatie**: JWT-tokens (lexik/jwt-authentication-bundle)
* **Bestandsopslag**: Flysystem (ondersteunt lokaal, AWS S3, Azure Blob, Google Cloud)

De codebase is georganiseerd in drie Symfony-bundles:

| Bundle | Doel |
|--------|---------|
| **CoreBundle** | Platformkern: gebruikers, instellingen, resources, beheer, AI-providers, beveiliging |
| **CourseBundle** | Cursusspecifieke functies: documenten, oefeningen, leerpaden, forums, enz. |
| **LtiBundle** | LTI 1.3-integratie voor externe leermiddelen |

## Hoe deze gids is ingedeeld

1. **Aan de slag** — Technologiestack, ontwikkelomgeving, projectstructuur
2. **Backend** — Symfony-architectuur, entiteiten, resourcesysteem, controllers, instellingen
3. **API** — REST API via API Platform, JWT-authenticatie, aangepaste acties
4. **Frontend** — Vue-componenten, views, routing, statebeheer, bouwsysteem
5. **Theming** — Kleurthema's, CSS/Tailwind, Twig-templates
6. **Plugins** — Pluginarchitectuur en -ontwikkeling
7. **Bijdragen** — Codeerconventies, git-workflow, testen