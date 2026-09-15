# CLAUDE.md

Ce fichier fournit des indications à Claude Code (claude.ai/code) lors du travail sur le code de ce dépôt.

## Nature de ce dépôt

Il s’agit du **site de documentation de Chamilo 3** — un projet Markdown GitBook. Ce n’est *pas* l’application Chamilo. Il n’y a pas d’étape de compilation, pas de suite de tests, pas de `package.json` ni de `composer.json` ici. Le LMS Chamilo lui-même se trouve dans un dépôt distinct ([github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)) ; les pages sous `developer-guide/contributing/` (PHPUnit, PHPStan, commandes Composer, conventions de codage) décrivent **ce** code source et ne sont pas exécutables ici.

GitBook génère le site à partir du Markdown versionné ; le seul code exécutable est constitué des deux scripts PHP dans `scripts/`.

## Organisation

* `SUMMARY.md` — la source unique de vérité pour la table des matières GitBook. Ajouter ou retirer une page exige de modifier ce fichier, sinon la page n’apparaîtra pas dans le livre.
* `teacher-guide/`, `admin-guide/`, `developer-guide/` — les trois guides rédigés, chacun un arbre de répertoires imbriqués de pages `.md` avec des pages d’index `README.md` par section.
* `.gitbook/assets/` — toutes les captures d’écran référencées sous `/.gitbook/assets/<name>.png` (noter la barre oblique initiale, relative à la racine du dépôt).
* `CHANGELOG.md` — une entrée par étiquette de documentation (`2.x-vN`).
* `scripts/` — outillage d’étiquetage des versions et de traduction par IA.
* `translated/` — sortie **ignorée par git** du script de traduction (miroirs par langue de l’arbre source).

## Modèle de branches

* **`3.x`** — la branche *source* anglaise. Toute la rédaction et l’édition s’y font. C’est la branche de travail active.
* **`2.x`** — la précédente branche source anglaise. C’est à partir d’elle que les traductions `2.x-<lang>` ont été extraites. N’y rédigez pas de nouvelles pages.
* **`2.x-<lang>`** — branches de traduction par langue (p. ex. `2.x-fr`, `2.x-es`, `2.x-de`, `2.x-zh_CN`). Elles reflètent le même arbre, traduit. L’état de synchronisation est suivi via des étiquettes correspondantes (`2.x-fr` porte `2.x-fr-vN` pour indiquer le retard). **Aucune branche `3.x-<lang>` n’existe encore**, ni aucune étiquette `3.x-*`.
* **`1.9.x` / `1.10.x` / `1.11.x`** — anciennes séries de documentation Chamilo avec leurs propres branches de traduction. Ne les touchez pas pour le travail 3.0.
* **`master`** — la branche par défaut historique ; le travail 3.0 se fait sur `3.x`.

## Commandes courantes

### Étiqueter une version

À exécuter **uniquement depuis une copie de travail propre de la branche source** (le script vérifie l’absence de modifications non validées). La vérification de branche accepte tout nom `N.x` et en déduit la série d’étiquettes, donc sur `3.x` elle crée la prochaine étiquette `3.x-vN`. Elle ajoute une entrée en tête de `CHANGELOG.md` (pages modifiées + liste des commits), valide, étiquette, puis indique le retard de chaque branche de traduction :

```bash
php scripts/tag-release.php --dry-run   # preview the entry + tag
php scripts/tag-release.php             # apply
```

### Traduire des pages (API Grok)

Traduit des pages Markdown vers une ou plusieurs langues, en écrivant dans `translated/<lang>/`. Nécessite `scripts/config.php` (copier depuis `scripts/config.dist.php` et y ajouter une clé x.ai — **ce fichier est ignoré par git car il contient une clé API active ; ne le validez jamais**).

```bash
# Translate everything that changed since the last tag (incremental)
php scripts/translate-docs.php --from 2.x-v2 fr_FR es

# Smoke-test one file in one language
php scripts/translate-docs.php --test --single-file admin-guide/installation/configuration.md fr_FR

# Re-translate an existing file from scratch
php scripts/translate-docs.php --single-file <path> --force fr_FR

# Repair files the model wrapped in stray "---" lines (GitBook rejects these)
php scripts/translate-docs.php --fix-wrappers fr_FR

# No-arg run auto-detects languages from the 2.x-* branches and translates all .md
php scripts/translate-docs.php --dry-run
```

Application des traductions à une branche (le script l’affiche à la fin) :

```bash
git checkout 2.x-fr && rsync -av translated/fr_FR/ ./ && git add -A -- ':!translated/'
```

Les codes de langue suivent la convention `.po` de Chamilo (`fr_FR`, `es`, `pt_BR`, `zh_CN`, …). Les suffixes courts de branche (`2.x-fr`) sont mappés en interne vers les codes complets.

**Les cibles de traduction sont `3.x-<lang>`, et aucune de ces branches n’existe encore.** `branchForLang()`
dans `scripts/translate-docs.php` renvoie `'3.x-' . $lang`, donc une étape d’application pointe vers une branche
qu’il vous reste à créer. La détection automatique des langues est un autre sujet : sans argument de langue, le
script liste les branches locales `*.x-??`, qui aujourd’hui sont les `2.x-<lang>`, donc il choisirait ces
langues tout en écrivant pour `3.x-<lang>`. Passez les codes de langue explicitement jusqu’à ce que les branches
de traduction `3.x` existent. Plusieurs commentaires dans ce fichier mentionnent encore `2.x` ; le code, lui, non.

## Comment le pipeline de traduction contraint la rédaction

`translate-docs.php` découpe chaque page aux limites de titres en fragments d’environ 5 Ko, les envoie au modèle, puis exécute `checkIntegrity()` en comparant la source et la traduction. Il vérifie que **le nombre de titres, le nombre de blocs de code, le nombre de références d’images et les chemins d’images correspondent exactement**. Pour que les traductions restent propres et que ces contrôles réussissent :

* Conservez des niveaux de titres cohérents et intentionnels — le traducteur a pour consigne de ne jamais ajouter ni rétrograder de titres, et les écarts apparaissent sous forme d’avertissements.
* Conservez les chemins d’images tels quels (`/.gitbook/assets/...`) — les chemins modifiés sont signalés.
* Les blocs de code et le code en ligne sont transmis sans traduction ; ils doivent être équilibrés.

## Messages de commit

Suivez la convention `<Prefix>: <imperative summary>` décrite dans `developer-guide/contributing/git-workflow.md`. Le préfixe est le nom canonique **singulier** de l’outil (par ex. `Exercise:`, `Learnpath:`, `Gradebook:`). Les modifications qui concernent **uniquement ce site de documentation** utilisent le préfixe `Documentation:`. Le tableau complet des préfixes se trouve sur cette page git-workflow.