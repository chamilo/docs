# 平台工具

本頁說明「平台管理」區塊中其餘較小的項目。

## Extra Fields

**Platform > Extra fields** 是類型選擇器，本身並非欄位清單 — 它會顯示所有支援自訂欄位的物件類型，點選其中一項即進入該類型專屬的欄位編輯器。可用類型包括：user、course、session、question、learning path（以及 learning path item/view）、skill、assignment（work）、career、user certificate、survey、terms and conditions、forum category、forum post、exercise、exercise tracking、course announcement、message、document、attendance calendar、glossary、work correction comment、calendar event，以及 portfolio（若已啟用該功能，另含 scheduled announcements）。

最常見的用途 — 自訂使用者個人資料欄位 — 請參閱 [使用者剖析](../users/user-profiling.md)，該頁從使用者管理的角度說明同一底層功能。

## Mail Templates

**Platform > Mail templates** 可讓您覆寫特定系統電子郵件（註冊確認、訂閱通知等）的文案，而無須修改伺服器檔案。每個範本包含標題、對應所覆寫內建電子郵件的 **type**、範本本文本身（純文字／Twig，非富文本編輯器），以及「設為預設」旗標 — 每種類型只能有一個作用中的預設範本。範本依存取 URL 範圍區分；沒有獨立的語言欄位，因此這些電子郵件的語言處理方式取決於周圍程式碼既有的行為。

範本透過**沙箱化**的 Twig 環境轉譯以確保安全：僅允許一小組標籤與篩選器，且唯一可用的資料是收件者的 `User` 物件，以 `user.getEmail()`、`user.getFirstname()` 及類似 getter（`getId`、`getUsername`、`getLastname`、`getStatus`、`getOfficialCode`、`getPhone`）參照。允許清單以外的內容不會大聲報錯 — 會靜默轉譯為空白，接著回退到原始內建範本。請保持自訂範本簡潔，並在編輯後（以實際註冊或通知觸發）進行測試。

## Contact Form Categories

**Platform > Contact form categories** 管理入口網站公開 **Contact us** 表單上顯示的下拉選單。每個類別僅包含標題與目的地電子郵件地址 — 訪客選擇的類別決定訊息會送往哪個收件匣。可用此功能將不同主題（支援、業務、招生）轉送到不同團隊，而無須建立多份表單。

## Settings-Category Shortcuts

部分區塊項目只是直接連到 [平台設定](../platform-settings/README.md) 中特定類別的捷徑，而非獨立工具：

* **Plugins** 與 **System templates** 會開啟已預先篩選至該類別的 Configuration Settings
* **Regions** 同樣如此，對應平台 region 設定

## Occasionally-Visible Items

少數項目僅在相關設定或外掛啟用時才會出現，因此您的安裝環境中可能看不到：

* **Terms and Conditions** — 當 **Allow terms and conditions** 啟用時出現，用於管理使用者必須接受的文字
* **Notifications** — 當平台 notification-events 功能啟用時出現
* **CMS**、**Dictionary**、**Justification** — 各自對應其選用外掛已安裝並啟用