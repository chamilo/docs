# 管理インターフェースの概要

管理パネルは、Chamilo プラットフォームを管理するための司令塔です。サイドバーの **Administration** <img src="../../.gitbook/assets/icons/mdi-cogs.svg" alt="管理" data-size="line"> をクリックしてアクセスします。

## 管理ダッシュボード

![ユーザー、コース、セッション、設定の機能ブロックを示す管理ダッシュボード](../../.gitbook/assets/admin-dashboard-overview.png)

管理ダッシュボードは機能ブロックに整理されています。各ブロックは関連する管理ツールをまとめています。

### Users

* **User list** — プラットフォーム上の全ユーザーの表示、検索、編集、管理
* **Add a user** — 個別のユーザーアカウントの作成
* **Classes** — 一括セッション登録のためのユーザークラスの管理

詳細は [Users](../users/README.md) の章を参照してください。

### Courses

* **Course list** — プラットフォーム上の全コースの表示と管理
* **Create a course** — 新しいコースの作成
* **Course categories** — カタログ用にコースをカテゴリへ整理

詳細は [Courses](../courses/README.md) の章を参照してください。

### Sessions

* **Session list** — トレーニングセッションの表示と管理
* **Create a session** — コースと登録を含む新しいセッションの設定
* **Session categories** — セッションをカテゴリへ整理
* **Careers and promotions** — キャリアパスとプロモーションワークフローの管理

詳細は [Sessions](../sessions/README.md) の章を参照してください。

### Platform

* **Configuration settings**、**Languages**、**Portal news**、**Global agenda**、**Pages**、**Extra fields**、**Mail templates**、**Contact form categories** など — 詳細は [Platform](../platform/README.md) の章を参照してください。「Configuration settings」リンクは、別章 [Platform Settings](../platform-settings/README.md) への入口です。

### Analytics

* **Global statistics**、**Reports catalog**、**Learning analytics**、**Quarterly report**、**Teachers time report**、**Corporate report**、**Special exports**、**Tickets** — プラットフォームの統計とレポート。詳細は [Analytics](../analytics/README.md) の章を参照してください

### Skills

* **Skills wheel**、**Skills import**、**Manage skills**、**Manage skills levels**、**Skills ranking**、**Skills and assessments** — 成績表の結果に紐づくコンピテンシーバッジ。詳細は [Skills](../skills/README.md) の章を参照してください

### System

* **Clean temporary files**、**System status**、**System update**、**Colors**、**File info**、**Resources by type**、**List icons** — サーバー保守、自己更新、ブランディング。詳細は [System](../system/README.md) の章を参照してください

### Rooms

* **Branches**、**Rooms**、**Room availability finder** — 物理拠点と予約可能なトレーニングルーム。詳細は [Rooms](../rooms/README.md) の章を参照してください

### Security

* **Activities audit**、**Login attempts**、**Simple IDS**、**Password strength checker**、**File integrity** — セキュリティ監視と監査ツール。詳細は [Security](../security/README.md) の章を参照してください

### Plugins

* 管理メニューページを宣言するインストール済みプラグインへのショートカット、および一般的なプラグイン管理 — 詳細は [Plugins](../plugins/README.md) の章を参照してください

### Health Check

* ライブの合否チェック（メール設定、管理 URL の割り当て、ファイル権限） — 詳細は [Health Check](../health-check.md) のページを参照してください

### Other Blocks

* **Chamilo.org**、**Version check**、**Professional support**、**News from Chamilo** — Chamilo プロジェクトからコンテンツを取得するリンクとステータスパネル。詳細は [Other Admin Blocks](../other-admin-blocks/README.md) を参照してください

各セクションは、本ガイドの対応する章で詳しく説明されています。

OAuth2、LDAP、CAS、その他の外部認証プロバイダーなどの認証方式は、管理ダッシュボードではなく `config/authentication.yaml` で設定します。