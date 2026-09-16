# セキュリティガイド

本ガイドでは、本番環境で Chamilo 3.0 プラットフォームを運用するためのセキュリティのベストプラクティスを扱います。セキュリティは、プラットフォームのソフトウェア、サーバー設定、および継続的な運用慣行の間で共有される責任です。

本ガイド全体で参照する組み込みの監視・監査ツール（ログイン試行ログ、侵入検知、パスワード強度スキャン、ファイル整合性チェック）については、[セキュリティ](../security/README.md) の章を参照してください。

## Chamilo を最新の状態に保つ

最も重要なセキュリティ対策は、Chamilo のインストールを最新の状態に保つことです。

* Chamilo セキュリティの X アカウント（@chamilosecurity）を購読するか、GitHub リポジトリでリリース告知を監視してください。
* セキュリティパッチは速やかに適用してください。3.0 ブランチ内のマイナーアップデートは、安全に適用できるよう設計されています。
* 各アップデートでは [アップグレード手順](../installation/upgrading.md) に従ってください。

## HTTPS

本番環境では、常に HTTPS 経由で Chamilo を提供してください。

* SSL/TLS 証明書を取得してください（Let's Encrypt は Certbot 経由で無料の証明書を提供します）。
* Web サーバーを設定し、すべての HTTP トラフィックを HTTPS にリダイレクトしてください。
* ダウングレード攻撃を防ぐため、HSTS（HTTP Strict Transport Security）ヘッダーを有効にしてください:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

HTTPS がない場合、ログイン認証情報、セッション Cookie、およびすべてのユーザーデータが平文で送信され、ネットワーク上で傍受される可能性があります。

## ファイル権限

ファイル権限は必要最小限に制限してください。

| パス | 所有者 | 権限 | 備考 |
|------|-------|-------------|-------|
| アプリケーションファイル（ソースコード） | root またはデプロイユーザー | 755（ディレクトリ）、644（ファイル） | Web サーバーは読み取り専用アクセスが必要です。 |
| `var/` | Web サーバーユーザー | 775 | Symfony のキャッシュ、ログ、ファイルアップロードのために書き込み可能である必要があります |
| `.env` | root またはデプロイユーザー | 640 | シークレットを含みます。通常運用時、Web サーバーは読み取りアクセスのみ必要ですが、インストール時には書き込みアクセスが必要です。 |
| `config/` | root またはデプロイユーザー | 750 | シークレットを含みます。通常運用時、Web サーバーは読み取りアクセスのみ必要ですが、インストール時には書き込みアクセスが必要です。 |

権限を 777 に設定しないでください。Web サーバーを root として実行しないでください。

## パスワードポリシー

[セキュリティ設定](../platform-settings/security-settings.md) で強力なパスワード要件を設定してください:

* 最小文字数は 8 文字（12 文字以上を推奨）。
* 大文字、小文字、数字、特殊文字の組み合わせを必須にする。
* コンプライアンスが求められる環境では、パスワードの有効期限を有効にすることを検討してください。
* 強力で一意なパスワードの選択についてユーザーを教育してください。

## レート制限とブルートフォース対策

### アプリケーションレベル

* **アカウントをブロックするまでの最大ログイン試行回数**（`login_max_attempt_before_blocking_account`）を小さな値（例: 5）に設定してください。
* ログインページで **CAPTCHA** を有効にしてください。CAPTCHA はオン/オフです。N 回のログイン失敗後に自動でオンになるわけではありません。CAPTCHA に失敗し続けるアカウントをロックアウトするため、**アカウントをブロックするまでの CAPTCHA 誤り回数**（`captcha_number_mistakes_to_block_account`）と組み合わせてください。
* ブルートフォースのパターンを見つけるため、[ログイン試行](../security/login-attempts.md) レポートを定期的に確認し、その他のフラグ付きリクエスト（XSS 試行、パストラバーサルなど）については [Simple IDS](../security/simple-ids.md) レポートを確認してください。

### サーバーレベル

**fail2ban** を使用してログイン失敗を監視し、問題のある IP アドレスをブロックしてください:

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

* セキュリティ設定で妥当な **セッション有効期間**（例: 3600 秒 / 1 時間）を設定してください。
* Symfony の設定で **セッション Cookie フラグ** を構成してください:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Only send over HTTPS
          cookie_httponly: true     # Not accessible via JavaScript
          cookie_samesite: lax     # CSRF protection
  ```

* 機密性の高いコンテンツを扱うプラットフォームでは、「Remember me」を無効にすることを検討してください。

## HTTP セキュリティヘッダー

Web サーバーがセキュリティヘッダーを送信するよう設定します。

| Header | Value | Purpose |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | MIME タイプのスニッフィングを防止します。 |
| `X-Frame-Options` | `SAMEORIGIN` | iframe によるクリックジャッキングを防止します。 |
| `X-XSS-Protection` | `1; mode=block` | 古いブラウザー向けのレガシー XSS 保護です。 |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | リファラー情報の漏洩を制御します。 |
| `Content-Security-Policy` | Varies | 読み込み可能なリソースを制御します。Chamilo では慎重な調整が必要です。 |

Apache の例:

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Nginx の例:

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## ファイルアップロードのセキュリティ

* [セキュリティ設定](../platform-settings/security-settings.md) で実行可能ファイルの拡張子（exe、bat、sh、php、phtml、cgi）をブロックします。
* Web サーバーが **アップロードされたファイルを決して実行しない** よう設定します。Apache の場合、var/ ディレクトリ全体に次を追加します。

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* 環境上必要な場合は、アップロードされたファイルをアンチウイルス（ClamAV）でスキャンします。

## データベースのセキュリティ

* Chamilo には **専用のデータベースユーザー** を使用し、必要な権限のみを付与します（Chamilo データベースに対する SELECT、INSERT、UPDATE、DELETE、CREATE、ALTER、DROP、INDEX）。
* データベースの root アカウントは使用しないでください。
* データベースがパブリックインターネットからアクセスできないようにします。localhost またはプライベートネットワークにバインドします。
* コンプライアンスが重要な環境では、データベースの監査ログを有効にします。

## バックアップ

* データベースとアップロードファイルの両方について、**毎日の自動バックアップ** をスケジュールします。
* バックアップはサーバーとは別の場所（オフサイトまたはクラウドストレージ）に保管します。
* バックアップが利用可能であることを確認するため、復元を定期的にテストします。
* 機密データを含む場合はバックアップを暗号化します。

詳細な手順は [バックアップ](../maintenance/backups.md) を参照してください。

## 監視

* エラーや不審な活動について、`var/log/prod.log` の Chamilo ログを監視します。
* リソース枯渇を検出するため、サーバー監視（CPU、メモリ、ディスク）を設定します。
* 認証失敗の繰り返しに対するアラートを設定します。
* 不正または休眠アカウントがないか、ユーザーアカウントを定期的に確認します。
* インストール済みファイルが予期せず変更されたときに通知を受けられるよう、cron で [ファイル整合性](../security/file-integrity.md) チェック（Chamilo 3.0 以降）をスケジュールし、特にユーザーの一括インポート後は [パスワード強度チェッカー](../security/password-strength-checker.md) を定期的に実行します。

## チェックリスト

Chamilo の導入または監査時に、このチェックリストを使用してください。

- [ ] 有効な証明書で HTTPS が有効になっている
- [ ] HTTP から HTTPS へのリダイレクトが設定されている
- [ ] `.env` で `APP_ENV=prod` および `APP_DEBUG=0` が設定されている
- [ ] 一意の `APP_SECRET` が生成されている
- [ ] ファイル権限が制限されている（777 なし）
- [ ] パスワードポリシーが設定されている
- [ ] 最大ログイン試行回数と CAPTCHA が有効になっている
- [ ] 実行可能ファイルの拡張子がブロックされている
- [ ] Web サーバーにセキュリティヘッダーが設定されている
- [ ] セッション Cookie のフラグが設定されている（secure、httponly、samesite）
- [ ] データベースユーザーの権限が最小限である
- [ ] 自動バックアップがスケジュールされ、テストされている
- [ ] ファイル整合性のベースラインが確立され、cron でスキャンがスケジュールされている（Chamilo 3.0 以降）
- [ ] ログ監視が実施されている
- [ ] Chamilo のバージョンが最新である