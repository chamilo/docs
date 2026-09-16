# コーディング規約

## PHP

* **標準**: PSR-12 コーディングスタイル
* **型宣言**: PHP 8.3 の型宣言を使用する（パラメーター型、戻り値の型、プロパティ型）
* **Strict types**: すべての PHP ファイルで `strict_types=1` を宣言する
* **名前空間**: PSR-4 オートローディングに従う（例: `Chamilo\CoreBundle\Entity\User`）
* **Symfony の標準**: Symfony のコーディング標準とベストプラクティスに従う

## JavaScript/Vue

* **ESLint + Prettier**: コードは ESLint でリントし、Prettier でフォーマットする。設定はプロジェクトルートの `eslint.config.mjs` にある。Tailwind クラスの自動ソートのため `prettier-plugin-tailwindcss` も有効になっている。
* **Composition API**: 新規コンポーネントでは Vue 3 の `<script setup>` 構文を使用する
* **TypeScript**: TypeScript に対応している。型安全なコードのために使用する

## CSS

* **Tailwind CSS**: カスタム CSS よりユーティリティクラスを優先する
* **BEM 命名**: カスタム CSS が必要な場合は BEM 命名規則を使用する
* **SCSS**: 複雑なスタイルシートには SCSS を使用する

## PHP 静的解析およびリファクタリングツール

本プロジェクトには、次の 3 つの追加ツール用の設定が同梱されている。

| ツール | 設定ファイル | 目的 |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | 静的解析（レベル 5、`src/` およびテストディレクトリをスキャン） |
| **Psalm** | `psalm.xml` | 2 回目の静的解析パス。すべてのプッシュ時に CI で実行される |
| **Rector** | `rector.php` | コードの自動変換およびアップグレード |

Composer のショートカットで実行する: `composer phpstan`、`composer psalm`。完全なコマンドは [テスト](../contributing/testing.md) を参照。

## 全般

* **英語**: すべてのコードコメント、変数名、ドキュメントは英語とする
* **翻訳**: ユーザー向けのテキストはすべて翻訳システムを使用する（フロントエンドは Vue I18n、バックエンドは Symfony Translator）
* **マジック値の禁止**: ハードコードされた値の代わりに定数または列挙型を使用する