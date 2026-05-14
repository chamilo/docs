# Convenzioni di Codifica

## PHP

* **Standard**: Stile di codifica PSR-12
* **Dichiarazioni di tipo**: Utilizzare le dichiarazioni di tipo di PHP 8.2 (tipi di parametri, tipi di ritorno, tipi di proprietà)
* **Tipi rigorosi**: Tutti i file PHP devono dichiarare `strict_types=1`
* **Namespace**: Seguire l'autoloading PSR-4 (ad esempio, `Chamilo\CoreBundle\Entity\User`)
* **Standard Symfony**: Seguire gli standard di codifica e le migliori pratiche di Symfony

## JavaScript/Vue

* **ESLint + Prettier**: Il codice è controllato con ESLint e formattato con Prettier; la configurazione si trova in `eslint.config.mjs` alla radice del progetto. È abilitato anche `prettier-plugin-tailwindcss` per l'ordinamento automatico delle classi Tailwind.
* **Composition API**: Utilizzare la sintassi `<script setup>` di Vue 3 per i nuovi componenti
* **TypeScript**: TypeScript è supportato; utilizzarlo per codice sicuro dal punto di vista dei tipi

## CSS

* **Tailwind CSS**: Preferire le classi di utilità rispetto al CSS personalizzato
* **Nomenclatura BEM**: Quando è necessario CSS personalizzato, utilizzare la convenzione di nomenclatura BEM
* **SCSS**: Utilizzare SCSS per fogli di stile complessi

## Strumenti di Analisi Statica e Refactoring per PHP

Il progetto include configurazioni per tre strumenti aggiuntivi:

| Strumento | File di configurazione | Scopo |
|-----------|-----------------------|-------|
| **PHPStan** | `phpstan.neon` | Analisi statica (livello 5, analizza le directory `src/` e test) |
| **Psalm** | `psalm.xml` | Seconda passata di analisi statica; eseguito in CI ad ogni push |
| **Rector** | `rector.php` | Trasformazioni e aggiornamenti automatici del codice |

Esegui questi strumenti tramite scorciatoie di Composer: `composer phpstan`, `composer psalm`. Consulta [Testing](../contributing/testing.md) per i comandi completi.

## Generale

* **Inglese**: Tutti i commenti nel codice, i nomi delle variabili e la documentazione devono essere in inglese
* **Traduzioni**: Tutto il testo visibile agli utenti deve utilizzare il sistema di traduzione (Vue I18n per il frontend, Symfony Translator per il backend)
* **Niente valori magici**: Utilizzare costanti o enum invece di valori hardcoded