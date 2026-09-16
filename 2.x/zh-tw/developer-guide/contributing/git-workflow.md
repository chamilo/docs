# Git Workflow

## Repository

Chamilo 原始碼託管於 GitHub：[github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Branching

* **`master`** — 主要開發分支
* 功能分支從 `master` 建立，用於新開發
* 發行分支用於穩定發行而建立

## Contributing a Change

1. 在 GitHub 上 **Fork** 儲存庫
2. **Clone** 您的 fork 到本地
3. **建立分支** 用於您的變更：`git checkout -b feature/my-feature`
4. **進行您的變更**，遵循程式碼規範
5. 使用清晰、描述性的 commit 訊息進行 **Commit**
6. **Push** 到您的 fork：`git push origin feature/my-feature`
7. **建立 pull request** 針對 `master` 分支

## Commit Messages

撰寫清晰的 commit 訊息，解釋**什麼**和**為什麼**：

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### Tool prefix convention

主旨行以變更所影響的**工具或區域**為前綴，後接冒號。我們使用簡短的共享術語，以便變更日誌和 `git log --oneline` 可依工具快速瀏覽。前綴始終為工具規範名稱的**單數**形式。

格式：`<Prefix>: <Imperative summary in the present tense>`

範例：

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

如果變更橫跨多個工具，請選擇受影響最大的那個；僅觸及程式碼結構（無終端使用者工具）的真正跨領域變更歸類於 `Internal`。僅限文件變更（本網站、變更日誌、純作參考的內嵌文件區塊）歸類於 `Documentation`。

---
#### 允許的前綴

| Prefix               | Scope / notes                                                                        |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | 不可用「議程」                                                                       |
| `Career`             |                                                                                      |
| `Catalogue`          | 課程與場次目錄，包括首頁上的「熱門課程」                                            |
| `Chat`               |                                                                                      |
| `CI`                 | 持續整合、自動化測試等                                                              |
| `Course description` |                                                                                      |
| `Course Progress`    | 不可用「主題進度」                                                                   |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | 僅與記錄 Chamilo 或程式碼、更動日誌等相關的事項                                      |
| `Dropbox`            |                                                                                      |
| `Exercise`           | 不可用「測驗」                                                                       |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | 包含證書                                                                              |
| `Group`              | 包含課程群組、全域群組與班級                                                          |
| `Help`               |                                                                                      |
| `Hook`               | 用於內部掛鉤機制                                                                      |
| `Install`            | 包含升級相關事項                                                                      |
| `Internal`           | 用於主要影響程式碼本身或本質上非常全域的變更與修正                                    |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | 用於 LP / 學習路徑                                                                    |
| `Maintenance`        | 課程維護工具：課程複製、備份、還原等                                                  |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | 用於 `tests/scripts/` 中的內容                                                        |
| `Search`             | 全文搜尋                                                                              |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | 社群網路                                                                              |
| `SSO`                | 單一登入方法                                                                          |
| `Survey`             |                                                                                      |
| `System`             | 主要與託管及伺服器層級微調相關的事項                                                  |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

---
## 程式碼審查

拉取請求由維護者團隊審查。請準備好：

* 回應回饋並進行修訂
* 使用 `master` 保持您的分支最新
* 確保測試通過

## 回報問題

請在 GitHub 問題追蹤器上回報錯誤和功能請求。