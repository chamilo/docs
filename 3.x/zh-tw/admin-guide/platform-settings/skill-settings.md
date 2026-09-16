# 技能設定

**技能**系統的行為——技能樹、授予規則、個人檔案整合。

可於 **管理 > 組態設定 > 技能** 存取這些設定。此類別包含 **13 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需要以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `allow_hr_skills_management`

**允許人資管理技能**

允許人資管理技能

*預設：`true`*


### `allow_private_skills`

**對學習者隱藏技能**

若啟用，技能僅對管理員、教師（透過課程與使用者相關）以及人資管理員（若與使用者相關）可見。

*預設：`false`*


### `allow_skill_rel_items`

**啟用將技能連結至項目**

此選項啟用一項重要功能，使任何項目都能連結至技能（並因此允許取得該技能）。此功能仍需教師確認技能的取得，因此取得並非自動發生。

*預設：`false`*


### `allow_skills_tool`

**允許技能工具**

使用者可在社群網路以及首頁的區塊中查看其技能。

*預設：`true`*

### `allow_teacher_access_student_skills`

**允許教師存取學習者的技能**

[推斷] 允許講師檢視並監控學習者在其課程中取得的技能。

*預設：`false`*


### `badge_assignation_notification`

**學習者取得技能／徽章時傳送通知**

[推斷] 當學習者取得新技能或徽章成就時，向其傳送通知。

*預設：`false`*


### `hide_skill_levels`

**隱藏技能等級功能**

[推斷] 在與技能相關的檢視中隱藏技能等級層級與等級標籤。

*預設：`false`*


### `manual_assignment_subskill_autoload`

**將技能指派給使用者：子技能自動載入**

手動將技能指派給使用者時，表單可設定為自動提供指派子技能，而非您所選的技能。

*預設：`false`*


### `openbadges_backpack`

**OpenBadges backpack URL**

將作為所有想匯出徽章之使用者預設使用的 OpenBadges backpack 伺服器 URL。預設為開放且免費的 Mozilla Foundation backpack 儲存庫：https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**在技能輪盤上顯示完整技能名稱**

在技能輪盤上，當技能具有短代碼時顯示技能名稱。

*預設：`false`*


### `skill_levels_names`

**技能等級名稱**

以 id => name 陣列定義技能等級的名稱。

### `skills_hierarchical_view_in_user_tracking`

**以階層式表格顯示技能**

[推斷] 在進度與報表頁面中，以階層式樹狀結構顯示學習者技能。

*預設：`false`*


### `skills_teachers_can_assign_skills`

**允許教師設定可透過其課程取得哪些技能**

預設僅管理員可決定可透過哪些課程取得哪些技能。

*預設：`false`*