# 修復與轉換指令

> **破壞性變更。** 下列維護指令以往一執行即會寫入資料庫。現在預設為**唯讀（dry-run）**，僅在指定 `--apply` 時才會寫入，模式與 `chamilo:migration:repair-quiz-relations-from-legacy` 相同。

| 指令 | 說明 |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | 沒有 `--expected-count`（單一全有或全無操作） |

## 對管理員的變更

1. 不帶選項執行指令：它會報告將執行的動作、不寫入任何資料，並印出應使用的精確
   `--apply --expected-count=N` 列。
2. 若要寫入，請再次執行並加上 `--apply --expected-count=N`，其中 N 為唯讀執行所報告的數量。
   若將被變更的列數與 N 不同（期間資料已變更），指令會拒絕執行
   且不寫入任何資料。
3. `--dry-run` 仍可接受（現在為預設值，且不執行任何動作）；與 `--apply` 併用則為錯誤。
4. 以往不帶引數執行這些指令並依賴其寫入的指令碼與 cron 工作，現在必須傳入
   `--apply --expected-count=N`。結束代碼不變（0 成功、1 失敗、2 用法無效）。

範例：

```bash
php bin/console chamilo:migration:repair-translatehtml-language-blocks
# ... "To write, re-run with --apply --expected-count=12"
php bin/console chamilo:migration:repair-translatehtml-language-blocks --apply --expected-count=12
```

```bash
php bin/console app:multi-url:convert "https://admin.example.com/"          # plan only
php bin/console app:multi-url:convert "https://admin.example.com/" --apply  # convert
```

## 新指令：`app:repair-user-tag-counters`

根據使用標籤的關聯列（使用者標籤、額外欄位
標籤、作品集標籤）重新計算標籤的使用計數器（`tag.count`）。較舊版本會讓計數器逐漸偏差。模式相同：不帶選項執行以列出偏差的
標籤並取得 `--apply --expected-count=N` 列，再執行該列以寫入。不涉及 migration：當您希望
計數器重新同步時再執行即可。