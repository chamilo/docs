# 技能設定

**Skills** 系統的行為 — 技能樹、頒發規則、個人檔案整合。

在 **Administration > Configuration settings > Skills** 下存取這些設定。此類別包含 **13 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫腳本或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `allow_hr_skills_management`

**允許 HR 管理技能**

允許 HR 管理技能

*預設值：`true`*


### `allow_private_skills`

**從學習者隱藏技能**

若啟用，技能僅對管理員、教師（透過課程與使用者相關聯）以及 HRM 使用者（若與使用者相關聯）可見。

*預設值：`false`*


### `allow_skill_rel_items`

**啟用將技能連結至項目**

此功能啟用將任何項目連結至技能（因此允許取得技能）的主要功能。此功能仍需教師確認技能的取得，因此取得並非自動的。

*預設值：`false`*


### `allow_skills_tool`

**允許技能工具**

使用者可在社群網路中查看其技能，並在首頁區塊中顯示。

*預設值：`true`*

### `allow_teacher_access_student_skills`

**允許教師存取學習者的技能**

[inferred] 允許教師查看並監控學習者在課程中取得的技能。

*預設值：`false`*


### `badge_assignation_notification`

**當技能/徽章被取得時向學習者發送通知**

[inferred] 當學習者取得新技能或徽章成就時，向學習者發送通知。

*預設值：`false`*


### `hide_skill_levels`

**隱藏技能等級功能**

[inferred] 在技能相關檢視中隱藏技能等級階層與等級標籤。

*預設值：`false`*


### `manual_assignment_subskill_autoload`

**將技能指派給使用者：子技能自動載入**

在手動將技能指派給使用者時，表單可設定為自動提供指派您所選技能的子技能，而非該技能本身。

*預設值：`false`*


### `openbadges_backpack`

**OpenBadges 背包 URL**

所有希望匯出徽章的使用者預設使用的 OpenBadges 背包伺服器 URL。此預設為 Mozilla Foundation 的開放免費背包儲存庫：https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**在技能輪盤上顯示完整技能名稱**

在技能輪盤上，當技能具有簡短代碼時顯示技能名稱。

*預設值：`false`*


### `skill_levels_names`

**技能等級名稱**

以 id => name 的陣列定義技能等級的名稱。

### `skills_hierarchical_view_in_user_tracking`

**以階層式表格顯示技能**

[inferred] 在進度與報告頁面中，將學習者技能顯示為階層式樹狀結構。

*預設值：`false`*


### `skills_teachers_can_assign_skills`

**允許教師設定透過其課程取得的技能**

預設僅管理員可決定哪些技能可透過哪些課程取得。

*預設值：`false`*