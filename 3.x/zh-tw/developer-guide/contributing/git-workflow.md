# Git 工作流程

## 儲存庫

Chamilo 原始碼託管於 GitHub：[github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## 分支策略

* **`master`** — 主要開發分支
* 功能分支自 `master` 建立，用於新功能開發
* 發行分支用於穩定版本發行

## 貢獻變更

1. 在 GitHub 上 **Fork** 儲存庫
2. 將您的 fork **Clone** 到本機
3. 為您的變更 **建立分支**：`git checkout -b feature/my-feature`
4. 依編碼慣例 **進行變更**
5. 以清楚、具描述性的訊息進行 **Commit**
6. **Push** 至您的 fork：`git push origin feature/my-feature`
7. 針對 `master` 分支 **建立 pull request**

## Commit 訊息

撰寫清楚的 commit 訊息，說明 **做了什麼** 以及 **為什麼**：

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### 工具前綴慣例

主旨列以該變更所涉及的 **工具或領域** 為前綴，後接冒號。我們使用簡短且共用的術語，以便依工具快速瀏覽 changelog 與 `git log --oneline`。前綴一律使用該工具正式名稱的 **單數** 形式。

格式：`<Prefix>: <Imperative summary in the present tense>`

範例：

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

若變更橫跨多個工具，請選擇受影響最大者；真正跨切、僅涉及程式結構（不影響終端使用者工具）的變更歸於 `Internal`。僅文件相關的變更（本站、changelog、純粹作為參考的行內 docblock）歸於 `Documentation`。

#### 允許的前綴

| 前綴                 | 範圍／備註                                                                             |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | 非「Agenda」                                                                         |
| `Career`             |                                                                                      |
| `Catalogue`          | 課程與工作階段目錄，包含首頁上的「熱門課程」                                         |
| `Chat`               |                                                                                      |
| `CI`                 | 持續整合、自動化測試等                                                               |
| `Course description` |                                                                                      |
| `Course Progress`    | 非「Thematic advance」                                                               |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | 僅與 Chamilo 或程式碼文件、變更日誌等相關的內容                                      |
| `Dropbox`            |                                                                                      |
| `Exercise`           | 非「Quiz」                                                                           |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | 包含證書                                                                             |
| `Group`              | 包含課程群組、全域群組與班級                                                         |
| `Help`               |                                                                                      |
| `Hook`               | 用於內部 hook 機制                                                                   |
| `Install`            | 包含升級相關內容                                                                     |
| `Internal`           | 用於主要影響程式碼本身或本質上非常全域的變更與修正                                   |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | 用於 LP／學習路徑                                                                    |
| `Maintenance`        | 課程維護工具：課程複製、備份、還原等                                                 |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | 用於位於 `tests/scripts/` 的內容                                                     |
| `Search`             | 全文搜尋                                                                             |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | 社交網路                                                                             |
| `SSO`                | 單一登入方法                                                                         |
| `Survey`             |                                                                                      |
| `System`             | 主要與主機託管及伺服器層級微調相關的事項                                             |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

## 程式碼審查

Pull request 由維護團隊進行審查。請準備好：

* 回應回饋並進行修訂
* 讓您的分支與 `master` 保持同步
* 確保測試通過

## 回報問題

請在 GitHub 的 issue tracker 上回報錯誤與功能請求。