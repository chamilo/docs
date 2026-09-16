# セキュリティ設定

ログイン保護、パスワードポリシー、コンテンツセキュリティヘッダー、二要素認証、および軽量な侵入検知システム。

このページではセキュリティの*ポリシー*を扱います。このポリシーを用いてプラットフォームを監視するツール（ログイン試行ログ、侵入検知イベント、パスワード強度スキャン、ファイル整合性チェック）については、[セキュリティ](../security/README.md) を参照してください。

これらの設定には **管理 > 設定 > セキュリティ** からアクセスします。このカテゴリには **32 件の設定** があり、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに掲載します。

> コード上の変数名は等幅で示します。API 経由でスクリプトする場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルに変更する場合に使用してください。

## 設定

### `2fa_enable`

**2FA を有効にする**

パスワード更新ページにフィールドを追加し、TOTP 認証アプリによる 2FA を有効にします。グローバルに無効にすると、ユーザーは 2FA フィールドを表示せず、以前に有効にしていてもログイン時に 2FA を求められません。

*デフォルト: `false`*

### `access_to_personal_file_for_all`

**全員の個人ファイルへのアクセス**

制限なくすべての個人ファイルへのアクセスを許可します

*デフォルト: `false`*


### `admins_can_set_users_pass`

**管理者がユーザーのパスワードを手動で設定できる**

[推定] 有効にすると、管理者はユーザーにリセットを求めずに、直接パスワードを手動設定できます。

### `allow_captcha`

**CAPTCHA**

ログインフォーム、登録フォーム、パスワード紛失フォームに CAPTCHA を有効にし、パスワードの総当たりを防ぎます

*デフォルト: `false`*

### `allow_online_users_by_status`

**オンラインとして表示できるユーザーをフィルタする**

オンラインユーザーの可視性を特定のユーザーロールに制限します。

### `allow_strength_pass_checker`

**パスワード強度チェッカー**

ユーザーがパスワードを変更する際、パスワード強度の視覚的インジケーターを追加します。弱いパスワードの登録を防ぐものではなく、視覚的な補助のみです。

*デフォルト: `true`*


### `anonymous_autoprovisioning`

**匿名ユーザーを自動プロビジョニングする**

訪問者トラフィックが多い場合に、新しい匿名ユーザーを動的に作成します。

*デフォルト: `false`*


### `captcha_number_mistakes_to_block_account`

**CAPTCHA の許容誤り回数**

アカウントがロックされるまでに、ユーザーが CAPTCHA ボックスで誤りを許容される回数です。

### `captcha_time_to_block`

**CAPTCHA によるアカウントロック時間**

（CAPTCHA 使用時に）ログイン誤りの最大許容回数に達した場合、アカウントはこの分数だけロックされます。

### `check_password`

**パスワード要件を確認する**

パスワードの作成または更新時に、上記で定義したパスワード要件の検証を有効にします。

*デフォルト: `false`*


### `file_integrity_check_notify_admins` **v3**

**ファイル整合性チェックの通知先**

ファイル整合性スキャンが変更を検出したときに通知するメールアドレスのカンマ区切りリスト。空の場合は、代わりにすべてのグローバル管理者に通知します。

### `filter_terms`

**フィルタ用語**

Web ページおよびメールから除外する用語を 1 行に 1 つずつ指定します。これらの用語は *** に置換されます。

### `force_renew_password_at_first_login`

**初回ログイン時にパスワード更新を強制する**

ポータルのセキュリティを高める簡単な対策の一つです。ユーザーに直ちにパスワード変更を求め、メールで伝達されたパスワードを無効にし、本人だけが知るパスワードを使うようにします。

*デフォルト: `false`*


### `hide_breadcrumb_if_not_allowed`

**「許可されていない」場合にパンくずを隠す**

ユーザーが特定のページにアクセスできない場合、パンくずも非表示にします。不要な情報の表示を避け、セキュリティを高めます。

*デフォルト: `false`*


### `login_max_attempt_before_blocking_account`

**ロックダウンまでの最大ログイン試行回数**

ユーザーアカウントがロックされ、管理者が解除するまで許容する失敗ログイン試行回数です。

*デフォルト: `0`*

### `password_requirements`

**パスワード構文の最小要件**

ユーザーパスワードに必要な構造を定義します。例: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}。特殊文字を必須にするには "specials"（複数形）を使用します。

### `password_rotation_days`

**パスワードローテーション間隔（日）**

ユーザーがパスワードをローテーションしなければならないまでの日数（0 = 無効）。

*デフォルト: `0`*


### `prevent_multiple_simultaneous_login`

**同時ログインを防止する**

同一アカウントでの複数接続を防ぎます。従量課金ポータルでは有効ですが、テスト時は 1 つのブラウザしか接続できないため制約になる場合があります。

*デフォルト: `false`*

### `proxy_settings`

**プロキシ設定**

Chamilo の一部の機能は、サーバーから外部へ接続します。たとえば、リンク作成時に外部コンテンツの存在を確認する場合や、学習パス内で埋め込みページを表示する場合などです。Chamilo サーバーがネットワーク外へ出るためにプロキシを使用している場合は、ここで設定します。

### `security_block_inactive_users_immediately`

**無効化されたユーザーを直ちにブロックする**

管理者がユーザー管理から無効化したユーザーを直ちにブロックします。無効化しない場合、無効化されたユーザーはログアウトするまで以前の権限を保持します。

*デフォルト: `false`*


### `security_content_policy`

**Content Security Policy**

Content Security Policy は、サイトを XSS 攻撃から保護する効果的な手段です。承認されたコンテンツのソースをホワイトリスト化することで、ブラウザーが悪意のあるアセットを読み込むのを防げます。この設定は WYSIWYG エディターとの組み合わせでは特に複雑ですが、iframe の埋め込みを許可したいすべてのドメインを child-src ステートメントに追加すれば、次の例が機能するはずです。外部ソース（SVG 画像内を含む）からの JavaScript 実行を防ぐには、'script-src' 引数に厳格なリストを使用します。無効にする場合は空のままにします。設定例: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy のレポートのみ**

この設定では、一部の Content Security Policy を強制せずに報告のみ行い、試験できます。

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning は、不正な X.509 証明書を用いた MiTM 攻撃からサイトを保護します。ブラウザーが信頼すべき識別情報のみをホワイトリスト化することで、認証局が侵害された場合でもユーザーを保護できます。

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning のレポートのみ**

この設定では、一部の HTTP Public Key Pinning を強制せずに報告のみ行い、試験できます。

### `security_referrer_policy`

**Security Referrer Policy**

Referrer Policy は、ドキュメントから離れるナビゲーション時にブラウザーが含める情報量をサイト側で制御できる新しいヘッダーであり、すべてのサイトで設定すべきです。

*デフォルト: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**セッション Cookie の samesite**

セッション Cookie に samesite:None パラメーターを有効にします。詳細: https://www.chromium.org/updates/same-site および https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*デフォルト: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security はサイトでサポートすべき優れた機能であり、ユーザーエージェントに HTTPS の使用を強制させることで TLS の実装を強化します。推奨値: 'strict-transport-security: max-age=63072000; includeSubDomains'。https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security を参照してください。'preload' サフィックスを含めることもできますが、トップレベルドメイン（TLD）に影響するため、安易に行うべきではありません。https://hstspreload.org/ を参照してください。無効にする場合は空のままにします。

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options は、ブラウザーがコンテンツタイプを MIME スニッフィングしようとすることを止め、宣言された content-type に従わせます。このヘッダーの有効な値は 'nosniff' のみです。

*デフォルト: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options は、サイトをフレームに入れることを許可するかどうかをブラウザーに伝えます。ブラウザーがサイトをフレームに入れるのを防ぐことで、クリックジャッキングなどの攻撃から防御できます。ここに URL を定義する場合は、サイトがコンテンツを受け入れる URL ではなく、コンテンツを表示すべき URL を定義します。たとえば、メイン URL（上記の root_web）が https://11.chamilo.org/ の場合、この設定は 'ALLOW-FROM https://11.chamilo.org' であるべきです。これらのヘッダーは、Chamilo が HTTP ヘッダー生成を担当するページ（すなわち '.php' ファイル）にのみ適用されます。静的ファイルには適用されません。この機能を試す場合は、静的ファイル用の適切なヘッダーを追加するよう Web サーバー設定も更新してください。詳細は上記の CDN 設定ドキュメント（'add_header' を検索）を参照してください。有効にする場合の推奨（厳格な）値: 'SAMEORIGIN'。

*デフォルト: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection は、ほとんどのブラウザーに組み込まれたクロスサイトスクリプティングフィルターの設定を行います。推奨値は '1; mode=block' です。

*デフォルト: `1; mode=block`*


### `user_reset_password`

**パスワードリセットトークンを有効にする**

このオプションにより、ユーザーのパスワードをリセットするための有効期限付き単回使用トークンを生成し、電子メールで送信できます。

*デフォルト: `false`*

### `user_reset_password_token_limit`

**パスワードリセットトークンの有効期限**

生成されたトークンが自動的に期限切れとなり、使用できなくなるまでの秒数です（新しいトークンを生成する必要があります）。

*デフォルト: `3600`*