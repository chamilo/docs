# サーバー要件

Chamilo 3.0 をインストールする前に、サーバーが次の要件を満たしていることを確認してください。

## ソフトウェア要件

### PHP

| Requirement | Minimum | Recommended |
|-------------|---------|-------------|
| **PHP version** | 8.3 | 8.5 |

### 必須 PHP 拡張

| Extension | Purpose |
|-----------|---------|
| **bcmath** | 任意精度演算 |
| **ctype** | 文字種の検査 |
| **curl** | HTTP リクエスト（API 連携、外部サービス） |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | XML の解析と DOM 処理（SCORM、RSS、SOAP、LTI） |
| **exif** | 画像メタデータの読み取り（例: アップロード写真の自動回転） |
| **fileinfo** | アップロードファイルの MIME タイプ検出 |
| **gd** | 画像処理（サムネイル、CAPTCHA） |
| **iconv** | 文字セット変換 |
| **intl** | 国際化（日付、数値、文字列の書式設定） |
| **json** | JSON のエンコード／デコード |
| **ldap** | LDAP コネクタ。LDAP を使わない場合でも、Chamilo では必須です |
| **mbstring** | マルチバイト文字列処理（UTF-8 対応） |
| **openssl** | 暗号処理（HTTPS、パスワードハッシュ、JWT トークン） |
| **pdo**, plus **pdo_mysql** or **pdo_pgsql** | データベース接続（使用するデータベースに合わせたドライバをインストール） |
| **soap** | SOAP Web サービスの処理 |
| **zip** | ZIP アーカイブの処理（SCORM パッケージ、一括インポート／エクスポート） |
| **zlib** | 複数の依存関係が内部で使用する圧縮 |
| **apcu** | ユーザーレベルキャッシュ（推奨。インストーラは確認するが強制はしない） |
| **opcache** | オペコードキャッシュ（パフォーマンス向上のため強く推奨。インストーラは確認するが強制はしない） |
| **xapian** | 全文検索（任意。検索機能を使う場合のみ） |

### データベース

| Database | Minimum Version | Recommended |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 or higher |
| **MySQL** | 5.7 | 8.0 or higher |

MariaDB 10.2.2 より前のバージョン（および MySQL 5.7 より前のバージョン）では、Chamilo をインストールする前に、サーバー設定で大きなインデックス／プレフィックスのサポートを手動で有効にする必要があります。

### Web サーバー

| Server | Notes |
|--------|-------|
| **Apache** | `mod_rewrite`（および `ssl`、`headers`、`expires`）の有効化が必要です。Chamilo はサンプル vhost を `public/main/install/apache.dist.conf` に同梱しています。 |
| **Nginx** | URL リライトのための手動設定が必要です。Chamilo は Nginx のサンプル設定を同梱していません。参考設定は Symfony の Nginx ドキュメントを参照してください。 |

### ビルドツール

| Tool | Purpose |
|------|---------|
| **Composer** (^2.8) | PHP 依存関係の管理。Chamilo の PHP ライブラリのインストールに必要です。 |
| **Node.js** (20+ LTS) | JavaScript ランタイム。フロントエンドアセットのビルドに必要です。 |
| **Yarn** (^4, via Corepack) | フロントエンドアセットのビルドに使用する JavaScript パッケージマネージャ（`yarn install`、`yarn encore production`）。 |

## ハードウェア要件

| Resource | Minimum | Recommended |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB or more (building frontend assets from source needs at least 4 GB on its own) |
| **CPU** | 2 vCPUs | 2+ cores |
| **Disk space** | 4 GB (application only) | 20+ GB (including uploaded content); building from source needs ~10 GB free during the build |
| **Disk type** | HDD | SSD (significantly improves database and cache performance) |

これらは Chamilo 公式インストールガイドに基づく基準値です。実際の要件は同時接続ユーザー数とホストするコンテンツ量によって異なります。

## オペレーティングシステム

| OS | Notes |
|----|-------|
| **Linux** | 推奨。Ubuntu 24.04 LTS 以降、Debian 12 以降、AlmaLinux 9 以降、または同等のディストリビューション。 |
| **Windows** | 利用可能ですが、十分にテストされていません。開発には WSL2 を使用してください。 |
| **macOS** | 開発用途のみ／未テスト。 |

## ネットワーク要件

* サーバーを指すドメイン名。
* HTTPS 用の SSL/TLS 証明書（Let's Encrypt は無料の証明書を提供します）。
* メールを直接送信する場合の送信 SMTP アクセス（またはサードパーティのメールサービスを利用）。
* ポート 443（HTTPS）および任意でポート 80（HTTP、HTTPS へのリダイレクト用）。

## 要件の確認

サーバーに Chamilo のソースを配置したあと、PHP の設定を直接確認できます。

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## ヒント

* **PHP-FPM を使用する** — Apache または Nginx と組み合わせると、mod_php より高いパフォーマンスが得られます。
* **データベースを分離する** — 同時接続ユーザーが 500 人を超えることが見込まれるプラットフォームでは、専用サーバーにデータベースを置いてください。
* **SSD ストレージを使用する** — Chamilo のようなデータベース負荷の高いアプリケーションは、高速なディスク I/O から大きな恩恵を受けます。