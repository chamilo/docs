# 課題（Work）設定

**課題（学生提出物）** ツールのデフォルトと動作です。

これらの設定には **管理 > 設定 > 課題（Work）** からアクセスします。このカテゴリには **12 件の設定** が含まれ、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに示します。

> コード上の変数名は等幅で示しています。API 経由でスクリプトする場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルに変更する場合に使用してください。

## 設定

### `allow_compilatio_tool`

**Compilatio を有効にする**

Compilatio は、2 つの提出物のテキストを比較し、内容（通常は課題）が真正でない可能性が高い場合に報告する不正防止サービスです。

*デフォルト: `false`*

### `allow_my_student_publication_page`

**「自分の課題」ページを有効にする**

[推定] 学習者が自身の提出済み課題を閲覧・管理するための専用ページを有効にします。

*デフォルト: `false`*

### `allow_only_one_student_publication_per_user`

**学生は課題を 1 件のみアップロードできる**

[推定] 学習者がアクティビティごとに課題を 1 件のみ提出できるように制限し、複数回の提出を防ぎます。

*デフォルト: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**アップロードまたはコメント後に課題ツールのホームページへリダイレクトする**

課題のアップロードまたはコメント追加後に、課題一覧へリダイレクトします。

*デフォルト: `false`*

### `assignment_prevent_duplicate_upload`

**課題での重複アップロードを防止する**

[推定] 同一の課題提出に対して、学習者が同一ファイルをアップロードすることをブロックします。

*デフォルト: `false`*

### `block_student_publication_add_documents`

**課題へのドキュメント追加を防止する**

[推定] 学習者が課題提出時にドキュメントを追加または添付できないようにします。

*デフォルト: `false`*

### `block_student_publication_edition`

**課題の編集を防止する**

[推定] 初回提出後、学習者が提出済み課題を変更または更新できないようにします。

*デフォルト: `false`*

### `block_student_publication_score_edition`

**教師による課題スコアの変更を防止する**

[推定] 記録後、教員が課題スコアを変更できないようにします。

*デフォルト: `false`*

### `compilatio_tool`

**Compilatio 設定**

ここで Compilatio の接続詳細を設定します。

### `considered_working_time`

**課題の所要時間を有効にする**

教員が課題完了の推定所要時間（hh:mm:ss 形式）を付与できるようになります。課題提出後、教員が承認（課題にスコアが付与）されると、学習者に対応する時間が自動的に割り当てられます。

*デフォルト: `work_time`*

### `force_download_doc_before_upload_work`

**課題アップロード前にドキュメントのダウンロードを強制する**

ユーザーが課題をアップロードする前に、課題定義で提供されたドキュメントをダウンロードすることを強制します。

*デフォルト: `true`*

### `my_courses_show_pending_work`

**「マイコース」ページから「未処理」課題へのリンクを表示する**

[推定] 学習者の「マイコース」ページに、未処理課題へのリンクまたは件数を表示し、すばやくアクセスできるようにします。

*デフォルト: `false`*