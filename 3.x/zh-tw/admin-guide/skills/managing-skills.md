# 管理技能

本頁說明用來建立平台技能目錄的三個儀表板項目：批次匯入技能、管理技能定義本身，以及將每項技能指派至等級量表。

## Skills Import

**Skills > Skills import** 可讓您從 CSV 或 XML 檔批次建立技能階層，而不必逐一建立技能。每一列至少需要 `id`、`parent_id`（用以建立樹狀結構）以及 `title`。系統提供範本檔可供您據以編製檔案。

## Manage Skills

**Skills > Manage skills** 是主要的技能目錄：可建立、編輯、啟用／停用及刪除技能。每項技能包含標題、簡碼、說明、圖示，以及選用的準則說明（學習者需完成哪些事項才能獲得該技能）。技能可以巢狀結構——一項技能可以擁有子技能——這正是 [Skills Wheel](skills-wheel.md) 所視覺化呈現的內容。

## Manage Skills Levels

**Skills > Manage skills levels** 是獨立且較精簡的畫面：列出既有技能，並可將每一項指派至 **level profile**——一組具名稱、有順序的等級（例如 Bronze/Silver/Gold），作為該技能的衡量依據。簡言之：使用 **Manage skills** 定義技能*是什麼*，使用 **Manage skills levels** 定義以何種量表衡量該技能。

## 技能如何頒發

技能會透過下列幾種途徑頒發給使用者（記錄為已核發技能，並附日期）：

* 自動頒發：當學習者達到成績簿類別門檻時——於 [Skills and Assessments](skills-assessments.md) 頁面設定
* 自動頒發：完成該技能所連結的特定課程時
* 手動頒發：由教師（若已啟用 **Teachers can assign skills**）或管理員執行