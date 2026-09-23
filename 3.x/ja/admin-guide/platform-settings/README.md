# プラットフォーム設定

Chamilo には、カテゴリ別に整理された広範な設定システムがあります。以下のカテゴリ一式は、管理パネルの **設定** ページ、および変数名・タイトル・説明の正本であるソースコード内の `SettingsCurrentFixtures.php` と対応しています。

管理パネルで **設定** をクリックすると、プラットフォーム設定にアクセスできます。

![機能領域ごとに整理された設定カテゴリを示すプラットフォーム設定ページ](../../.gitbook/assets/admin-settings-categories.png)

## すべてのカテゴリ

設定カテゴリは全部で **39** あり、以下にアルファベット順で示します。各リンクの後の数字は、そのカテゴリに含まれる設定の件数です。

### プラットフォーム全体

* **[管理者の識別情報](admin-settings.md)** (12) — プラットフォーム管理者の識別情報と連絡先。
* **[プラットフォーム](platform-settings.md)** (29) — プラットフォームレベルの識別情報、タイムゾーン、登録ポリシー、オンラインユーザー、パフォーマンスフラグ。
* **[表示](display-settings.md)** (24) — ホームページのレイアウト、gravatar、メニュー、ブランディングの挙動。
* **[エディタ](editor-settings.md)** (26) — リッチテキストエディタ（TinyMCE）のツールバー、プラグイン、AI ヘルパー。
* **[言語](language-settings.md)** (12) — 利用可能な言語、既定言語、フォールバック。
* **[メール](mail-settings.md)** (18) — 送信メールのレイアウト、差出人の識別情報、署名。
* **[ワークフロー](workflows-settings.md)** (23) — 横断的なワークフローの切替（コース作成、登録の検証など）。

### 認証、セキュリティ、プライバシー

* **[セキュリティ](security-settings.md)** (31) — ログイン保護、パスワードポリシー、ヘッダー、2FA、IDS。
* **[登録](registration-settings.md)** (20) — 自己登録ポリシーと登録後のリダイレクト。
* **[プライバシー](privacy-settings.md)** (6) — 同意、データエクスポート、アカウント削除リクエスト。
* **[CAS](cas-settings.md)** (7) — 1.x から引き継がれたレガシー CAS 設定。

### コースとセッションのライフサイクル

* **[コース](course-settings.md)** (45) — プラットフォーム全体のコースに適用される既定値とポリシー。
* **[セッション](session-settings.md)** (68) — セッションのライフサイクル、チューターのアクセス期間、可視性。
* **[コースカタログ](catalog-settings.md)** (13) — 公開コースカタログの挙動。
* **[プロフィール](profile-settings.md)** (29) — ユーザープロフィールに表示するフィールド。

### コースツール

* **[アジェンダ](agenda-settings.md)** (11)
* **[お知らせ](announcement-settings.md)** (9)
* **[課題（Work）](work-settings.md)** (12)
* **[出席](attendance-settings.md)** (4)
* **[チャット](chat-settings.md)** (5)
* **[ドキュメント](document-settings.md)** (29)
* **[ドロップボックス](dropbox-settings.md)** (8)
* **[演習（テスト）](exercise-settings.md)** (63)
* **[フォーラム](forum-settings.md)** (9)
* **[用語集](glossary-settings.md)** (3)
* **[グループ](group-settings.md)** (3)
* **[ラーニングパス](lp-settings.md)** (51)
* **[アンケート](survey-settings.md)** (12)

### 評価と認定

* **[成績表（アセスメント）](gradebook-settings.md)** (34) — スコア表示、小数、修了証の閾値。
* **[修了証](certificate-settings.md)** (9) — 学習者が修了証を取得したときに適用される既定値。
* **[スキル](skill-settings.md)** (13) — スキルツリー、付与ルール、プロフィール連携。
* **[トラッキング](tracking-settings.md)** (10) — 記録内容と公開されるレポート。

### コミュニケーションとコミュニティ

* **[メッセージ](message-settings.md)** (7)
* **[ソーシャルネットワーク](social-settings.md)** (7)

### AI

* **[AI ヘルパー](ai-helpers-settings.md)** (13) — タスク種別ごとのプロバイダ（テキスト、画像、動画、チューター、採点）。

### 運用と統合

* **[Cron ジョブ](crons-settings.md)** (3)
* **[検索](search-settings.md)** (3) — Xapian 全文検索の設定。
* **[チケット](ticket-settings.md)** (7) — ヘルプデスクシステム。
* **[Web サービス](webservice-settings.md)** (7) — レガシー SOAP/REST エンドポイント。

## 設定の仕組み

* 設定はデータベース（`settings` テーブル）に保存され、Web インターフェースから管理されます
* 一部の設定はマルチ URL 構成で **URL ロック** されます（値がプラットフォーム全体に適用され、URL ごとに上書きできません。`settings` テーブルの `access_url_locked` および `access_url_changeable` 列を参照）。その他（大半）はアクセス URL ごとに上書きできます
* 変更は直ちに反映されます（サーバーの再起動は不要）。ただし、ユーザーセッションが一部の値をメモリに保持している場合があります。すぐに反映されない場合は、ログアウトして再ログインし、セッションをフラッシュしてください。
* 一部の設定には依存関係があり、1 つを変更すると他の設定の挙動に影響する場合があります
* 各ページに表示される変数名（例: `2fa_enable`）は、`settings` データベーステーブルの行（`variable` 列）および、該当する場合は上書き（`config/settings_overrides.yaml`）で使用されるキーと一致します。

詳細は、Wiki の [Configurations](https://github.com/chamilo/chamilo-lms/wiki/Configurations) を参照してください。

## ヒント

* **設定を文書化する** — デフォルト以外の設定と、変更した理由を記録しておく
* **一度に1つだけ変更する** — トラブルシューティング時は、影響を特定できるよう設定を1つずつ変更する
* **ステージング環境でテストする** — 重要な設定変更は、まずステージングサーバーでテストする