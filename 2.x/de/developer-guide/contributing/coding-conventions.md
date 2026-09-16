# Kodierungsrichtlinien

## PHP

* **Standard**: PSR-12 Kodierungsstil
* **Typdeklarationen**: Verwenden Sie PHP 8.2 Typdeklarationen (Parametertypen, Rückgabewerte, Eigenschaftstypen)
* **Strikte Typen**: Alle PHP-Dateien sollten `strict_types=1` deklarieren
* **Namespaces**: Folgen Sie der PSR-4 Autoloading-Struktur (z. B. `Chamilo\CoreBundle\Entity\User`)
* **Symfony-Standards**: Befolgen Sie die Kodierungsstandards und Best Practices von Symfony

## JavaScript/Vue

* **ESLint + Prettier**: Der Code wird mit ESLint überprüft und mit Prettier formatiert; die Konfiguration befindet sich in `eslint.config.mjs` im Projektstammverzeichnis. `prettier-plugin-tailwindcss` ist ebenfalls aktiviert für die automatische Sortierung von Tailwind-Klassen.
* **Composition API**: Verwenden Sie die `<script setup>`-Syntax von Vue 3 für neue Komponenten
* **TypeScript**: TypeScript wird unterstützt; verwenden Sie es für typsicheren Code

## CSS

* **Tailwind CSS**: Bevorzugen Sie Utility-Klassen gegenüber benutzerdefiniertem CSS
* **BEM-Benennung**: Wenn benutzerdefiniertes CSS benötigt wird, verwenden Sie die BEM-Benennungskonvention
* **SCSS**: Verwenden Sie SCSS für komplexe Stylesheets

## PHP-Statische Analyse- und Refactoring-Tools

Das Projekt enthält Konfigurationen für drei zusätzliche Tools:

| Tool | Konfigurationsdatei | Zweck |
|------|---------------------|-------|
| **PHPStan** | `phpstan.neon` | Statische Analyse (Level 5, scannt `src/` und Testverzeichnisse) |
| **Psalm** | `psalm.xml` | Zweiter Durchgang der statischen Analyse; wird bei jedem Push in der CI ausgeführt |
| **Rector** | `rector.php` | Automatisierte Code-Transformationen und Upgrades |

Führen Sie diese über Composer-Kurzbefehle aus: `composer phpstan`, `composer psalm`. Vollständige Befehle finden Sie unter [Testing](../contributing/testing.md).

## Allgemein

* **Englisch**: Alle Code-Kommentare, Variablennamen und Dokumentationen sollten auf Englisch sein
* **Übersetzungen**: Alle benutzerorientierten Texte sollten das Übersetzungssystem verwenden (Vue I18n für das Frontend, Symfony Translator für das Backend)
* **Keine magischen Werte**: Verwenden Sie Konstanten oder Enums anstelle von fest codierten Werten