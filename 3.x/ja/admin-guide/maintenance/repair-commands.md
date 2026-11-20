# 修復および変換コマンド

> **破壊的変更。** 以下のメンテナンスコマンドは、以前は実行と同時にデータベースへ書き込んでいました。現在は **既定で読み取り専用（dry-run）** となり、`--apply` を指定した場合にのみ書き込みます。これは `chamilo:migration:repair-quiz-relations-from-legacy` のモデルに従っています。

| コマンド | 注記 |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | `--expected-count` なし（単一の全か無かの操作） |

## 管理者向けの変更点

1. オプションなしでコマンドを実行します。実行内容の報告のみを行い、何も書き込まず、使用すべき正確な
   `--apply --expected-count=N` の行を表示します。
2. 書き込むには、`--apply --expected-count=N` を付けて再度実行します。N は読み取り専用の実行で報告された件数です。
   変更対象となる行数が N と異なる場合（その間にデータが変化した場合）、コマンドは拒否し、
   何も書き込みません。
3. `--dry-run` は引き続き受け付けられます（現在は既定であり、何もしません）。`--apply` と組み合わせるとエラーになります。
4. 引数なしでこれらのコマンドを実行し、書き込みに依存していたスクリプトおよび cron ジョブは、今後
   `--apply --expected-count=N` を渡す必要があります。終了コードは変更されていません（0 成功、1 失敗、2 不正な使用法）。

例:

```bash
php bin/console chamilo:migration:repair-translatehtml-language-blocks
# ... "To write, re-run with --apply --expected-count=12"
php bin/console chamilo:migration:repair-translatehtml-language-blocks --apply --expected-count=12
```

```bash
php bin/console app:multi-url:convert "https://admin.example.com/"          # plan only
php bin/console app:multi-url:convert "https://admin.example.com/" --apply  # convert
```

## 新しいコマンド: `app:repair-user-tag-counters`

タグを使用する関連行（ユーザータグ、追加フィールドの
タグ、ポートフォリオタグ）から、タグの使用回数カウンター（`tag.count`）を再計算します。以前のバージョンではカウンターがずれていました。同じモデルです。オプションなしで実行してずれた
タグを一覧し、`--apply --expected-count=N` の行を取得してから、その行を実行して書き込みます。マイグレーションは関与しません。カウンターを再同期したいときに
実行してください。