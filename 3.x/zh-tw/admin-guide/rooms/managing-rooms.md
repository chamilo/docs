# 管理教室

Chamilo 中的教室依分校（branch）組織：分校代表實體據點，且每間教室恰好隸屬於一個分校。

## 分校

**Rooms > Branches** 用來管理貴機構的實體據點——例如一棟建築、校區或辦公室。分校可以巢狀（一個分校可以有子分校），因此可建立如「總校區 > A 棟」的結構。

可為分校設定的欄位：

* **Title** 與 **Description**
* **Parent branch** — 用於以階層方式組織分校
* **IP address** — 選填，用於依網路識別
* **Latitude / Longitude** — 用於地圖標示
* **Download / Upload speed** 與 **Delay** — 選填的網路品質中繼資料
* **Administrator e-mail, name, and phone** — 該據點管理者的聯絡資訊

## 教室

**Rooms > Rooms** 用來管理分校內實際可預約的空間——通常是教室或訓練室。每間教室都必須隸屬於一個分校。

可為教室設定的欄位：

* **Title** 與 **Description**
* **Branch** — 此教室所屬的分校（必填）
* **Floor number**
* **Capacity** — 必須為正數
* **Geolocation**、**IP address** 與 **IP mask** — 選填的進階欄位

每間教室另有「Occupation」日曆檢視，顯示其預約狀況，以及使用該教室的課程數量。

## 相關內容

若要針對特定時段尋找空閒教室，而非瀏覽清單，請參閱 [教室可用性查詢](room-availability-finder.md)。