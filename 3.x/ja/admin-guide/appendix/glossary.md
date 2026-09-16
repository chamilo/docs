# 用語集

Chamilo 3.0 の管理で用いられる主な用語。

## プラットフォームの概念

| 用語 | 定義 |
|------|------------|
| **Access URL** | マルチ URL 構成において、各 Access URL は同一の Chamilo インストールおよびデータベースを共有する、独立した仮想ポータルです。各 URL は独自のブランディング、ユーザー、コース、設定を持つことができます。 |
| **Course** | Chamilo における基本的なコンテンツコンテナです。コースは学習教材、演習、フォーラム、その他のツールを保持します。コースは独立して存在することも、セッションに割り当てることもできます。 |
| **Session** | 1 つ以上のコースの、期間が定められたインスタンスです。セッションにより、同一のコースコンテンツを異なる学習者グループに、別々のトラッキングと独立したチューターとともに提供できます。 |
| **Learning path** | 文書、演習、リンク、SCORM モジュールなどのコンテンツ項目を、定められた順序で学習者に案内する構造化されたシーケンスです。 |
| **Gradebook** | 演習、課題、その他の活動の得点を集約し、コースの加重された最終成績とする集計ツールです。 |
| **Skill** | 特定のコースや演習の完了、または Gradebook の閾値達成時に学習者に付与できるコンピテンシーまたはバッジです。 |
| **Extra field** | 組織固有のメタデータを記録するため、管理者がユーザー、コース、またはセッションに追加するカスタムデータフィールドです。 |
| **Plugin** | コアコードを変更せずに Chamilo に機能を追加する拡張です。プラグインはページ、ツール、または連携を追加できます。 |
| **Catalog** | 利用可能なコースの閲覧可能な一覧で、ユーザーは説明を確認し、自己登録できます。 |

## ユーザーロール

| 用語 | 定義 |
|------|------------|
| **Learner (Student)** | 既定のユーザーロールです。コースに登録し、コンテンツを利用できます。 |
| **Teacher (Trainer)** | コースの作成と管理、コンテンツの追加、学習者の採点ができます。 |
| **Session administrator** | セッションと登録の作成・管理ができます。 |
| **Human Resources Manager (HRM)** | 割り当てられたユーザーのトラッキングおよびレポートデータを閲覧できます。 |
| **Portal administrator** | プラットフォーム管理機能すべてへのフルアクセスがあります。 |
| **Global administrator** | マルチ URL 構成において、すべての Access URL にまたがってアクセスできる Portal administrator です。 |
| **Tutor** | セッションレベルのロールです。セッションチューターはセッション内の全コースを監督し、コースチューターはセッション内の特定コースを管理します。Chamilo 3.0 より前のバージョンでは「coach」と呼ばれていました。 |

## 標準とプロトコル

| 用語 | 定義 |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model。コースのインポートとトラッキングを可能にする e ラーニングのパッケージング標準です。Chamilo は SCORM 1.2 および 2004 をサポートします。 |
| **xAPI (Tin Can API)** | 学習体験をトラッキングするための e ラーニング仕様です。SCORM より広範で、LMS の外で発生した活動も記録できます。xAPI ステートメントは Learning Record Store (LRS) に保存されます。 |
| **LTI** | Learning Tools Interoperability。外部ツールやコンテンツを LMS 内に埋め込むための IMS Global 標準です。Chamilo はコンシューマーおよびプロバイダーの両方として LTI 1.1 および 1.3 をサポートします。 |
| **SCIM** | System for Cross-domain Identity Management。アイデンティティプロバイダーとアプリケーション間でユーザーのプロビジョニングおよびデプロビジョニングを自動化するための標準です。 |
| **OAuth2** | パスワードを共有せずに、サードパーティアプリケーションがユーザーに代わって Chamilo にアクセスできるようにする認可フレームワークです。API アクセスおよび SSO 連携に使用されます。 |
| **LDAP** | Lightweight Directory Access Protocol。ディレクトリサービス（例: Active Directory）にアクセスし、ユーザー認証およびアカウントデータの同期を行うプロトコルです。 |
| **CAS** | Central Authentication Service。一度認証すれば複数のアプリケーションにアクセスできるシングルサインオンプロトコルです。 |
| **JWT** | JSON Web Token。API 認証およびセッション管理に用いられる、コンパクトで署名付きのトークン形式です。 |
| **SAML** | Security Assertion Markup Language。アイデンティティプロバイダーとサービスプロバイダー間で認証データを交換するための XML ベースの標準です。 |

## 技術用語

| 用語 | 定義 |
|------|------------|
| **Symfony** | Chamilo 3.0 の基盤となっている PHP フレームワーク。Symfony はルーティング、依存性注入、ORM（Doctrine）、テンプレート処理（Twig）、その他のインフラを提供します。 |
| **Doctrine** | Chamilo がデータベースとのやり取りに使用するオブジェクトリレーショナルマッパー（ORM）。Doctrine は PHP オブジェクトをデータベーステーブルにマッピングします。 |
| **Twig** | Symfony および Chamilo が HTML のレンダリングに使用するテンプレートエンジン。 |
| **Flysystem** | PHP のファイルシステム抽象化レイヤー。Chamilo は Flysystem を用いて、ローカルストレージ、Amazon S3、Azure Blob、Google Cloud Storage を相互に切り替え可能にしています。 |
| **Composer** | PHP の依存関係マネージャー。Chamilo の PHP ライブラリのインストールおよび更新に使用します。 |
| **Mailer DSN** | メール転送用のデータソース名（Data Source Name）。Symfony にメールの送信方法（例: SMTP、Amazon SES、Mailjet）を指示する接続文字列です。 |
| **OPcache** | PHP 組み込みのオペコードキャッシュ。PHP スクリプトをバイトコードにコンパイルしてメモリにキャッシュし、パフォーマンスを大幅に向上させます。 |
| **APCu** | ユーザーレベルのインメモリキャッシュを提供する PHP 拡張。Symfony がメタデータおよび設定のキャッシュに使用します。 |

## 略語

| 略語 | 正式名称 |
|---------|-----------|
| **LMS** | Learning Management System（学習管理システム） |
| **LRS** | Learning Record Store（xAPI ステートメント用） |
| **SSO** | Single Sign-On（シングルサインオン） |
| **CSV** | Comma-Separated Values（ユーザー／コースのインポートに使用） |
| **API** | Application Programming Interface |
| **REST** | Representational State Transfer（API アーキテクチャスタイル） |
| **GDPR** | General Data Protection Regulation（EU のデータプライバシー法） |
| **HSTS** | HTTP Strict Transport Security |
| **CDN** | Content Delivery Network |
| **DNS** | Domain Name System |
| **SPF** | Sender Policy Framework（メール認証） |
| **DKIM** | DomainKeys Identified Mail（メール認証） |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance |