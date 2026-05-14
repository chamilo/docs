# 課題（ワーク）設定

**課題（学生の公開物）** ツールのデフォルト設定と動作について。

これらの設定には、**管理 > 設定 > 課題（ワーク）** からアクセスできます。このカテゴリには **12の設定** が含まれており、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に記載されているタイトルとコメントを記載しています。

> コード内の変数名は等幅フォントで表示されています。APIを通じてスクリプトを作成する場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してこれらの設定をグローバルレベルで変更する際に使用してください。

## 設定

### `allow_compilatio_tool`

**Compilatioを有効にする**

Compilatioは、2つの提出物間のテキストを比較し、内容（通常は課題）が本物でない可能性が高い場合に報告する不正防止サービスです。

*デフォルト: `false`*

### `allow_my_student_publication_page`

**マイ課題ページを有効にする**

[推定] 学習者が自分の提出した課題を表示および管理するための専用ページを有効にします。

*デフォルト: `false`*

### `allow_only_one_student_publication_per_user`

**学生は1つの課題のみアップロード可能**

[推定] 学習者が1つの活動に対して1つの課題のみ提出できるように制限し、複数回の提出を防ぎます。

*デフォルト: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**アップロードまたはコメント後に課題ツールのホームページにリダイレクト**

課題をアップロードした後やコメントを追加した後に課題リストにリダイレクトします。

*デフォルト: `false`*

### `assignment_prevent_duplicate_upload`

**課題での重複アップロードを防止**

[推定] 学習者が同じ課題提出に対して同一のファイルをアップロードすることを防ぎます。

*デフォルト: `false`*

### `block_student_publication_add_documents`

**課題へのドキュメント追加を防止**

[推定] 学習者が課題を提出する際にドキュメントを追加または添付することを防ぎます。

*デフォルト: `false`*

### `block_student_publication_edition`

**課題の編集を防止**

[推定] 学習者が初回提出後に提出した課題を修正または更新することを防ぎます。

*デフォルト: `false`*

### `block_student_publication_score_edition`

**教師による課題スコアの変更を防止**

[推定] インストラクターが記録した課題スコアを後から変更することを防ぎます。

*デフォルト: `false`*

### `compilatio_tool`

**Compilatio設定**

ここでCompilatioの接続情報を設定します。

### `considered_working_time`

**課題の所要時間を有効にする**

これにより、教師が課題を完了するのに必要な推定所要時間（hh:mm:ss形式）を設定できるようになります。課題が提出され、教師によって承認（課題にスコアが与えられる）されると、学習者に自動的に対応する時間が割り当てられます。

*デフォルト: `work_time`*

### `force_download_doc_before_upload_work`

**課題アップロード前にドキュメントのダウンロードを強制**

課題定義に提供されているドキュメントをダウンロードするまで、ユーザーが課題をアップロードできないようにします。

*デフォルト: `true`*

### `my_courses_show_pending_work`

**マイコースページから「保留中」の課題へのリンクを表示**

[推定] 学習者のマイコースページに保留中の課題へのリンクまたは数を表示し、迅速にアクセスできるようにします。

*デフォルト: `false`*