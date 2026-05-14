# バックエンド

Chamilo 2.0 のバックエンドは、Symfony 6.4 を基盤とし、Doctrine ORM と API Platform を使用して構築されています。

* **[Symfony アーキテクチャ](symfony-architecture.md)** — バンドル、サービス、および全体的なバックエンド構造
* **[エンティティと Doctrine](entities-and-doctrine.md)** — Doctrine エンティティクラスとその関連性
* **[リソースシステム](resource-system.md)** — ResourceNode/ResourceFile の抽象化（主要なアーキテクチャ概念）
* **[コントローラ](controllers.md)** — コントローラの構成とルーティングパターン
* **[イベントとリスナー](events-and-listeners.md)** — Chamilo が Symfony イベントシステムをどのように使用するか
* **[設定システム](settings-system.md)** — `src/CoreBundle/Settings/` 内の設定スキーマとプラットフォーム設定の仕組み