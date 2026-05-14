# 程式碼規範

## PHP

* **標準**：PSR-12 程式碼風格
* **類型宣告**：使用 PHP 8.2 類型宣告（參數類型、傳回類型、屬性類型）
* **嚴格類型**：所有 PHP 檔案應宣告 `strict_types=1`
* **命名空間**：遵循 PSR-4 自動載入（例如 `Chamilo\CoreBundle\Entity\User`）
* **Symfony 標準**：遵循 Symfony 的程式碼標準與最佳實務

## JavaScript/Vue

* **ESLint + Prettier**：程式碼使用 ESLint 進行 lint，Prettier 進行格式化；設定檔位於專案根目錄的 `eslint.config.mjs`。同時啟用 `prettier-plugin-tailwindcss` 以自動排序 Tailwind 類別。
* **Composition API**：新元件使用 Vue 3 的 `<script setup>` 語法
* **TypeScript**：支援 TypeScript；用於類型安全的程式碼

## CSS

* **Tailwind CSS**：優先使用實用類別而非自訂 CSS
* **BEM 命名**：需要自訂 CSS 時，使用 BEM 命名慣例
* **SCSS**：用於複雜樣式表的 SCSS

## PHP 靜態分析與重構工具

專案提供三個額外工具的設定檔：

| Tool | Config file | Purpose |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | 靜態分析（等級 5，掃描 `src/` 與測試目錄） |
| **Psalm** | `psalm.xml` | 第二階段靜態分析；在每次推送時於 CI 中執行 |
| **Rector** | `rector.php` | 自動程式碼轉換與升級 |

透過 composer 捷徑執行：`composer phpstan`、`composer psalm`。完整指令請參閱 [測試](../contributing/testing.md)。

## 一般規範

* **英文**：所有程式碼註解、變數名稱與文件應使用英文
* **翻譯**：所有使用者介面文字應使用翻譯系統（前端使用 Vue I18n，後端使用 Symfony Translator）
* **無魔術值**：使用常數或枚舉而非硬編碼值