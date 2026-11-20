# Open Badges 2.0 的核發與驗證

Chamilo 3.1 可為已習得的技能發布 **Open Badges 2.0** 憑證，其中包括一張在 PNG 中繼資料中內嵌已烘焙 assertion 的徽章圖像。徽章驗證使用公開的徽章、assertion 與發行者端點。

## 設定發行者與技能

1. 設定平台的**機構名稱**以及有效的**管理員聯絡電子郵件**；兩者皆為發行者設定檔所必需。
2. 設定技能的標題、說明與徽章準則。
3. 在適當情況下附加有效的 PNG 徽章圖像。若技能沒有自訂素材，Chamilo 亦可使用其預設徽章圖像。
4. 透過一般技能工作流程，為學習者授予或驗證該技能的習得。

憑證取決於已習得技能的關聯。已撤銷或不再視為已習得的技能 assertion 會被回報為已撤銷。技能與徽章資源的範圍限定於適當的存取 URL。

## 公開驗證資料

每次核發都有一個託管的 assertion。相關 URL 由應用程式的公開根路徑衍生而來，包括：

- `main/skills/assertion.php?issue=<issue-id>` — 特定技能核發的 JSON assertion。
- `main/skills/class.php?id=<skill-id>` — 徽章類別中繼資料，包括準則與發行者參照。
- `main/skills/issuer.php` — 發行機構設定檔。
- `main/skills/image.php?id=<skill-id>` — 徽章圖像資源。

實際產生的 URL 取決於安裝的公開基底路徑。assertion 包含收件者電子郵件的加鹽雜湊，而非公開明文電子郵件地址，並識別發行者與已習得的技能。徽章 PNG 可在 `openbadges` iTXt 區塊中包含該 assertion。

## 驗證已核發的徽章

在未登入的工作階段中開啟託管的 assertion、徽章類別與發行者端點。它們應回傳一致且相互連結的憑證。透過技能所支援的匯出流程下載已核發的 PNG，並驗證其內嵌 assertion 與託管表示相符。若技能已撤銷，請確認驗證結果反映其已撤銷狀態。

僅含視覺徽章圖樣的 PNG **並不能**證明憑證有效。請勿將 Open Badges 2.0 核發與無關的證書或已簽署 PDF 功能混淆。

請參閱[管理技能](managing-skills.md)與[已簽署證書驗證](../maintenance/signed-certificate-verification.md)。實作：[PR #9346](https://github.com/chamilo/chamilo-lms/pull/9346)。