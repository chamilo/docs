# Coding-Konventionen

## PHP

* **Standard**: PSR-12-Codierungsstil
* **Typdeklarationen**: PHP-8.3-Typdeklarationen verwenden (Parametertypen, Rückgabetypen, Eigenschaftstypen)
* **Strikte Typen**: Alle PHP-Dateien sollten `strict_types=1` deklarieren
* **Namespaces**: PSR-4-Autoloading befolgen (z. B. `Chamilo\CoreBundle\Entity\User`)
* **Symfony-Standards**: Die Coding-Standards und Best Practices von Symfony befolgen

## JavaScript/Vue

* **ESLint + Prettier**: Code wird mit ESLint gelintet und mit Prettier formatiert; die Konfiguration liegt in `eslint.config.mjs` im Projektstamm. `prettier-plugin-tailwindcss` ist ebenfalls aktiviert, um Tailwind-Klassen automatisch zu sortieren.
* **Composition API**: Für neue Komponenten die Vue-3-Syntax `<script setup>` verwenden
* **TypeScript**: TypeScript wird unterstützt; für typsicheren Code verwenden

## CSS

* **Tailwind CSS**: Utility-Klassen gegenüber eigenem CSS bevorzugen
* **BEM-Namensgebung**: Wenn eigenes CSS erforderlich ist, die BEM-Namenskonvention verwenden
* **SCSS**: SCSS für komplexe Stylesheets verwenden

## PHP-Tools für statische Analyse und Refactoring

Das Projekt enthält Konfigurationen für drei weitere Tools:

| Tool | Konfigurationsdatei | Zweck |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | Statische Analyse (Level 5, prüft `src/` und Testdirektories) |
| **Psalm** | `psalm.xml` | Zweiter Durchlauf der statischen Analyse; läuft in der CI bei jedem Push |
| **Rector** | `rector.php` | Automatisierte Code-Transformationen und Upgrades |

Ausführung über Composer-Shortcuts: `composer phpstan`, `composer psalm`. Vollständige Befehle siehe [Testing](../contributing/testing.md).

## Allgemein

* **Englisch**: Alle Code-Kommentare, Variablennamen und die Dokumentation sollten auf Englisch sein
* **Übersetzungen**: Sämtlicher nutzersichtbarer Text sollte das Übersetzungssystem verwenden (Vue I18n für das Frontend, Symfony Translator für das Backend)
* **Keine magischen Werte**: Konstanten oder Enums statt fest kodierter Werte verwenden