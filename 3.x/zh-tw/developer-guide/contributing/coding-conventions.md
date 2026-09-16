# 程式撰寫慣例

## PHP

* **標準**：PSR-12 程式碼風格
* **型別宣告**：使用 PHP 8.3 型別宣告（參數型別、回傳型別、屬性型別）
* **嚴格型別**：所有 PHP 檔案皆應宣告 `strict_types=1`
* **命名空間**：遵循 PSR-4 自動載入（例如 `Chamilo\CoreBundle\Entity\User`）
* **Symfony 標準**：遵循 Symfony 的程式碼標準與最佳實務

## JavaScript/Vue

* **ESLint + Prettier**：程式碼以 ESLint 進行檢查，並以 Prettier 格式化；設定位於專案根目錄的 `eslint.config.mjs`。亦已啟用 `prettier-plugin-tailwindcss`，以自動排序 Tailwind 類別。
* **Composition API**：新元件請使用 Vue 3 的 `<script setup>` 語法
* **TypeScript**：支援 TypeScript；請用於撰寫型別安全的程式碼

## CSS

* **Tailwind CSS**：優先使用工具類別，而非自訂 CSS
* **BEM 命名**：需要自訂 CSS 時，請使用 BEM 命名慣例
* **SCSS**：複雜樣式表請使用 SCSS

## PHP 靜態分析與重構工具

本專案附帶下列三項額外工具的設定：

| 工具 | 設定檔 | 用途 |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | 靜態分析（level 5，掃描 `src/` 與測試目錄） |
| **Psalm** | `psalm.xml` | 第二次靜態分析；於每次推送時在 CI 中執行 |
| **Rector** | `rector.php` | 自動化程式碼轉換與升級 |

請透過 Composer 捷徑執行：`composer phpstan`、`composer psalm`。完整指令請參閱 [測試](../contributing/testing.md)。

## 一般原則

* **英文**：所有程式碼註解、變數名稱與文件皆應使用英文
* **翻譯**：所有面向使用者的文字皆應使用翻譯系統（前端為 Vue I18n，後端為 Symfony Translator）
* **禁止魔術值**：請使用常數或列舉，而非硬編碼數值