# 議程

議程工具可讓您在課程中排程活動與截止日期。活動會顯示在學習者可檢視的日曆上。

## 檢視議程

從課程首頁開啟 **議程** <img src="/.gitbook/assets/icons/mdi-calendar-text.svg" alt="議程" data-size="line"> 工具。您可以三種模式檢視活動：

![日曆檢視中的議程，顯示課程活動與截止日期](/.gitbook/assets/agenda-calendar-view.png)

* **日曆檢視** — 以視覺化的月／週／日日曆呈現
* **清單檢視** — 以時間順序列出活動
* **個人活動** — 篩選僅顯示與您相關的活動

## 建立活動

1. 點選 **新增活動** <img src="/.gitbook/assets/icons/mdi-calendar-plus.svg" alt="新增活動" data-size="line">
2. 填寫活動詳細資料：
   * **標題** — 活動的簡短名稱
   * **開始日期與時間**
   * **結束日期與時間**
   * **說明** — 補充細節（支援富文本）
3. 選擇 **對象**：
   * **所有學習者** — 課程中所有已註冊者
   * **特定使用者或群組** — 選取個別學習者或群組
4. 可選擇設定 **提醒** <img src="/.gitbook/assets/icons/mdi-alarm.svg" alt="提醒" data-size="line">，於活動前傳送電子郵件通知（入口網站需由管理員完成 *cron* 設定）
5. 點選色票為活動挑選 **顏色**。此顏色會用於在日曆各處（月、週與日檢視）突顯該活動，便於一眼區分不同活動——例如區分截止日期與一般時段，或在個人議程中區分不同課程的活動。

   ![活動建立表單中的顏色選擇器](/.gitbook/assets/agenda-event-color-picker.png)
6. 儲存

所選顏色會反映在該活動於日曆中出現的所有位置：

![週檢視中以所選顏色顯示的活動](/.gitbook/assets/agenda-event-color-result.png)

預設情況下，新活動會依其脈絡（課程、session、個人或全域）取得顏色，但您可以覆寫為任何喜歡的顏色。

## 管理活動

* **編輯** <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="編輯" data-size="line"> — 點選活動以修改其詳細資料
* **刪除** <img src="/.gitbook/assets/icons/mdi-delete.svg" alt="刪除" data-size="line"> — 從日曆移除活動
* **拖放** — 在日曆檢視中，拖曳活動以重新排程

## 個人議程

您也可從側邊欄存取 **個人議程**。個人議程會將您所有課程的活動彙整為單一檢視。學習者可在此看到其已註冊之所有課程的合併時程。

## 提示

* **設定截止日期** — 為作業繳交日期與測驗截止時間建立活動，讓學習者能在日曆中看到
* **使用提醒** — 為重要活動啟用電子郵件提醒，協助學習者掌握進度
* **與 session 協調** — 若您在多個 session 授課，每個 session 各有其活動，且僅該 session 的學習者可見。教師可檢視其 session 中其他課程的活動（作業、校外教學等），以免造成學生負擔過重。