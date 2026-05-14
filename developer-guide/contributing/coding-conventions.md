# コーディング規約

## PHP

* **標準**: PSR-12 コーディングスタイル
* **型宣言**: PHP 8.2 の型宣言を使用（パラメータ型、戻り値型、プロパティ型）
* **厳密な型**: すべての PHP ファイルで `strict_types=1` を宣言する
* **名前空間**: PSR-4 オートローディングに従う（例: `Chamilo\CoreBundle\Entity\User`）
* **Symfony 標準**: Symfony のコーディング標準とベストプラクティスに従う

## JavaScript/Vue

* **ESLint + Prettier**: コードは ESLint でリントされ、Prettier でフォーマットされる。設定はプロジェクトルートの `eslint.config.mjs` に記載。`prettier-plugin-tailwindcss` も有効化されており、Tailwind クラスの自動ソートが行われる。
* **Composition API**: 新しいコンポーネントには Vue 3 の `<script setup>` 構文を使用
* **TypeScript**: TypeScript がサポートされており、型安全なコードのために使用する

## CSS

* **Tailwind CSS**: カスタム CSS よりもユーティリティクラスを優先
* **BEM 命名**: カスタム CSS が必要な場合は BEM 命名規則を使用
* **SCSS**: 複雑なスタイルシートには SCSS を使用

## PHP 静的解析およびリファクタリングツール

プロジェクトには以下の 3 つの追加ツールの設定が含まれています：

| ツール | 設定ファイル | 目的 |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | 静的解析（レベル 5、`src/` およびテストディレクトリをスキャン） |
| **Psalm** | `psalm.xml` | 2 回目の静的解析パス。すべてのプッシュ時に CI で実行 |
| **Rector** | `rector.php` | 自動コード変換およびアップグレード |

これらは Composer のショートカットで実行可能：`composer phpstan`、`composer psalm`。完全なコマンドは [Testing](../contributing/testing.md) を参照。

## 一般

* **英語**: すべてのコードコメント、変数名、ドキュメントは英語で記述
* **翻訳**: ユーザー向けのすべてのテキストは翻訳システムを使用（フロントエンドは Vue I18n、バックエンドは Symfony Translator）
* **マジック値の禁止**: ハードコードされた値の代わりに定数または列挙型を使用