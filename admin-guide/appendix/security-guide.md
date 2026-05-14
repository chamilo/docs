# セキュリティガイド

このガイドでは、Chamilo 2.0 プラットフォームを本番環境で運用するためのセキュリティのベストプラクティスについて説明します。セキュリティは、プラットフォームソフトウェア、サーバー設定、継続的な運用慣行の間で共有される責任です。

## Chamilo を最新に保つ

最も重要なセキュリティ対策は、Chamilo のインストールを常に最新の状態に保つことです。

* Chamilo セキュリティの X アカウント (@chamilosecurity) をフォローするか、GitHub リポジトリを監視してリリース情報を確認してください。
* セキュリティパッチを迅速に適用してください。2.0 ブランチ内のマイナーアップデートは安全に適用できるように設計されています。
* 各アップデートについては、[アップグレード手順](../installation/upgrading.md) に従ってください。

## HTTPS

本番環境では常に Chamilo を HTTPS で提供してください。

* SSL/TLS 証明書を取得してください（Let's Encrypt は Certbot を通じて無料の証明書を提供しています）。
* ウェブサーバーを設定して、すべての HTTP トラフィックを HTTPS にリダイレクトしてください。
* ダウングレード攻撃を防ぐために HSTS (HTTP Strict Transport Security) ヘッダーを有効にしてください：

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

HTTPS を使用しない場合、ログイン認証情報、セッションクッキー、すべてのユーザーデータが平文で送信され、ネットワーク上で傍受される可能性があります。

## ファイル権限

ファイル権限を必要最低限に制限してください。

| パス | 所有者 | 権限 | 備考 |
|------|-------|-------------|-------|
| アプリケーションファイル（ソースコード） | root またはデプロイユーザー | 755（ディレクトリ）、644（ファイル） | ウェブサーバーは読み取り専用アクセスが必要です。 |
| `var/` | ウェブサーバーユーザー | 775 | Symfony のキャッシュ、ログ、ファイルアップロードのために書き込み可能である必要があります。 |
| `.env` | root またはデプロイユーザー | 640 | 機密情報が含まれています。ウェブサーバーは通常使用時に読み取りアクセスが必要ですが、インストール時には書き込みアクセスが必要です。 |
| `config/` | root またはデプロイユーザー | 750 | 機密情報が含まれています。ウェブサーバーは通常使用時に読み取りアクセスが必要ですが、インストール時には書き込みアクセスが必要です。 |

権限を 777 に設定しないでください。ウェブサーバーを root として実行しないでください。

## パスワードポリシー

[セキュリティ設定](../platform-settings/security-settings.md) で強力なパスワード要件を設定してください：

* 最小文字数を 8 文字（12 文字以上を推奨）に設定。
* 大文字、小文字、数字、特殊文字の混在を必須にする。
* コンプライアンスが求められる環境では、パスワードの有効期限を有効にすることを検討してください。
* ユーザーに対して、強力で一意なパスワードを選択するよう教育してください。

## レート制限とブルートフォース保護

### アプリケーションレベル

* **アカウントブロック前の最大ログイン試行回数** (`login_max_attempt_before_blocking_account`) を小さな値（例：5）に設定してください。
* ログインページで **CAPTCHA** を有効にしてください。CAPTCHA はオン/オフの設定であり、N 回のログイン失敗後に自動的にオンになるものではありません。**CAPTCHA 失敗によるブロック前のミス回数** (`captcha_number_mistakes_to_block_account`) と組み合わせて、CAPTCHA に連続して失敗するアカウントをロックアウトしてください。

### サーバーレベル

**fail2ban** を使用してログイン失敗を監視し、問題のある IP アドレスをブロックしてください：

```ini
# /etc/fail2ban/jail.d/chamilo.conf
[chamilo]
enabled = true
port = http,https
filter = chamilo-auth
logpath = /path/to/chamilo/var/log/prod.log
maxretry = 5
bantime = 900
```

認証失敗のログエントリに一致するフィルターを `/etc/fail2ban/filter.d/chamilo-auth.conf` に作成してください。

## セッション管理

* セキュリティ設定で合理的な **セッション有効期間**（例：3600 秒 / 1 時間）を設定してください。
* Symfony 設定で **セッションクッキーフラグ** を構成してください：

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # HTTPS でのみ送信
          cookie_httponly: true     # JavaScript からアクセス不可
          cookie_samesite: lax     # CSRF 保護
  ```

* 機密性の高いコンテンツを含むプラットフォームでは、「ログイン情報を記憶する」機能を無効にすることを検討してください。

## HTTP セキュリティヘッダー

ウェブサーバーでセキュリティヘッダーを送信するように設定してください：

| ヘッダー | 値 | 目的 |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | MIME タイプのスニッフィングを防ぎます。 |
| `X-Frame-Options` | `SAMEORIGIN` | iframe を介したクリックジャッキングを防ぎます。 |
| `X-XSS-Protection` | `1; mode=block` | 古いブラウザ向けの XSS 保護（レガシー）。 |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | リファラー情報の漏洩を制御します。 |
| `Content-Security-Policy` | 状況による | 読み込み可能なリソースを制御します。Chamilo 向けに慎重な調整が必要です。 |

Apache の例：

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Nginx の例：

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## ファイルアップロードのセキュリティ

* [セキュリティ設定](../platform-settings/security-settings.md)で実行可能なファイル拡張子（exe、bat、sh、php、phtml、cgi）をブロックします。
* ウェブサーバーを設定して、**アップロードされたファイルを実行しない**ようにします。Apacheの場合、var/ディレクトリ全体に以下を追加します：

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* 環境が必要とする場合は、アップロードされたファイルをアンチウイルス（ClamAV）でスキャンします。

## データベースのセキュリティ

* Chamilo専用の**データベースユーザー**を使用し、必要な権限のみを付与します（Chamiloデータベースに対するSELECT、INSERT、UPDATE、DELETE、CREATE、ALTER、DROP、INDEX）。
* rootデータベースアカウントを使用しないでください。
* データベースが公開インターネットからアクセスできないようにします。localhostまたはプライベートネットワークにバインドしてください。
* コンプライアンスが重要な環境では、データベースの監査ログを有効にします。

## バックアップ

* データベースとアップロードされたファイルの両方を**毎日自動バックアップ**するスケジュールを設定します。
* バックアップをサーバーとは別の場所（オフサイトまたはクラウドストレージ）に保存します。
* バックアップが使用可能であることを確認するために、定期的にバックアップの復元をテストします。
* 機密データが含まれる場合は、バックアップを暗号化します。

詳細な手順については、[バックアップ](../maintenance/backups.md)を参照してください。

## モニタリング

* `var/log/prod.log`にあるChamiloのログを監視し、エラーや不審な活動を確認します。
* サーバーのモニタリング（CPU、メモリ、ディスク）を設定して、リソースの枯渇を検出します。
* 繰り返される認証失敗に対するアラートを設定します。
* 不正または休眠中のユーザーアカウントがないか、定期的にユーザーアカウントを確認します。

## チェックリスト

Chamiloのインストール時や監査時に以下のチェックリストを使用してください：

- [ ] HTTPSが有効で有効な証明書が設定されている
- [ ] HTTPからHTTPSへのリダイレクトが設定されている
- [ ] `.env`で`APP_ENV=prod`および`APP_DEBUG=0`が設定されている
- [ ] ユニークな`APP_SECRET`が生成されている
- [ ] ファイル権限が制限されている（777は不可）
- [ ] パスワードポリシーが設定されている
- [ ] 最大ログイン試行回数とCAPTCHAが有効になっている
- [ ] 実行可能なファイル拡張子がブロックされている
- [ ] ウェブサーバーでセキュリティヘッダーが設定されている
- [ ] セッションCookieのフラグが設定されている（secure、httponly、samesite）
- [ ] データベースユーザーに最小限の権限が付与されている
- [ ] 自動バックアップがスケジュールされ、テストされている
- [ ] ログモニタリングが実施されている
- [ ] Chamiloのバージョンが最新である