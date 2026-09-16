# セキュリティ設定

ログイン保護、パスワードポリシー、コンテンツセキュリティヘッダー、2要素認証、軽量な侵入検知システム。

これらの設定には、**管理 > 設定 > セキュリティ** からアクセスできます。このカテゴリには **31の設定** が含まれており、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に記載されているタイトルとコメントを記載しています。

> コード内の変数名は等幅フォントで表示されています。APIを通じてスクリプトを作成する場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してこれらの設定をグローバルレベルで変更する必要がある場合に使用してください。

## 設定

### `2fa_enable`

**2FAの有効化**

パスワード更新ページにフィールドを追加し、TOTP認証アプリを使用して2FAを有効にします。グローバルで無効にすると、ユーザーは2FAフィールドを表示できず、以前に有効にしていた場合でもログイン時に2FAの入力を求められません。

*デフォルト: `false`*

### `access_to_personal_file_for_all`

**すべての個人ファイルへのアクセス**

制限なしですべての個人ファイルへのアクセスを許可します。

*デフォルト: `false`*

### `admins_can_set_users_pass`

**管理者がユーザーパスワードを手動で設定可能**

[推定] 有効にすると、管理者はユーザーがリセットする必要なく、直接ユーザーパスワードを手動で設定できます。

### `allow_captcha`

**CAPTCHA**

ログインフォーム、登録フォーム、紛失パスワードフォームにCAPTCHAを有効にし、パスワードの総当たり攻撃を防ぎます。

*デフォルト: `false`*

### `allow_online_users_by_status`

**オンラインとして表示されるユーザーのフィルタリング**

オンラインのユーザーの可視性を特定のユーザーロールに制限します。

### `allow_strength_pass_checker`

**パスワード強度チェッカー**

このオプションを有効にすると、ユーザーがパスワードを変更する際にパスワード強度の視覚的なインジケーターを追加します。これは弱いパスワードの追加を防ぐものではなく、視覚的な補助としてのみ機能します。

*デフォルト: `true`*

### `anonymous_autoprovisioning`

**匿名ユーザーの自動プロビジョニング**

訪問者トラフィックの多い場合をサポートするために、新しい匿名ユーザーを動的に作成します。

*デフォルト: `false`*

### `captcha_number_mistakes_to_block_account`

**CAPTCHAの誤入力許容回数**

ユーザーがCAPTCHAボックスで間違えることができる回数を超えると、アカウントがロックされます。

### `captcha_time_to_block`

**CAPTCHAアカウントロック時間**

ユーザーがログインエラーの最大許容回数（CAPTCHA使用時）に達した場合、アカウントはこの分数間ロックされます。

### `check_password`

**パスワード要件の確認**

パスワード作成時または更新時に、上記で定義されたパスワード要件の検証を有効にします。

*デフォルト: `false`*

### `filter_terms`

**フィルタリング用語**

ウェブページやメールからフィルタリングする用語を1行ずつリストで指定します。これらの用語は *** に置き換えられます。

### `force_renew_password_at_first_login`

**初回ログイン時のパスワード更新の強制**

ユーザーに即座にパスワードを変更させることで、ポータルのセキュリティを向上させる簡単な手段です。これにより、メールで送信されたパスワードが無効になり、ユーザーが自分で考えた、自身だけが知っているパスワードを使用するようになります。

*デフォルト: `false`*

### `hide_breadcrumb_if_not_allowed`

**許可されていない場合にパンくずリストを非表示**

ユーザーが特定のページにアクセスする権限がない場合、パンくずリストも非表示にします。これにより、不要な情報の表示を避け、セキュリティを向上させます。

*デフォルト: `false`*

### `login_max_attempt_before_blocking_account`

**ロックダウン前の最大ログイン試行回数**

ユーザーアカウントがロックされ、管理者による解除が必要になるまでの、失敗したログイン試行の許容回数。

*デフォルト: `0`*

### `password_requirements`

**最小パスワード構文要件**

ユーザーパスワードに必要な構造を定義します。例: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}。特殊文字を要求する場合は "specials"（複数形）を使用します。

### `password_rotation_days`

**パスワードローテーション間隔（日数）**

ユーザーがパスワードをローテーションする必要があるまでの日数（0 = 無効）。

*デフォルト: `0`*

### `prevent_multiple_simultaneous_login`

**同時ログインの防止**

同じアカウントで複数の接続を防ぎます。これはアクセスごとの支払いポータルでは良いオプションですが、テスト中は制限があるため、1つのブラウザのみが特定のアカウントで接続可能です。

*デフォルト: `false`*

### `proxy_settings`

**プロキシ設定**

Chamiloの一部の機能はサーバーから外部に接続します。たとえば、リンクを作成したり、ラーニングパスに埋め込みページを表示する際に外部コンテンツが存在することを確認するためです。Chamiloサーバーがネットワーク外に出るためにプロキシを使用している場合、ここで設定を行います。

### `security_block_inactive_users_immediately`

**無効化されたユーザーを即座にブロック**

ユーザー管理を通じて管理者が無効化したユーザーを即座にブロックします。無効化されたユーザーは、そうでない場合、ログアウトするまで以前の権限を保持します。

*デフォルト: `false`*

### `security_content_policy`

**コンテンツセキュリティポリシー**

コンテンツセキュリティポリシー（Content Security Policy）は、XSS攻撃からサイトを保護するための効果的な手段です。承認されたコンテンツのソースをホワイトリストに登録することで、ブラウザが悪意のある資産を読み込むのを防ぐことができます。この設定はWYSIWYGエディタを使用する場合には特に複雑ですが、iframeのインクルードを許可したいすべてのドメインをchild-srcステートメントに追加すれば、この例が機能するはずです。'script-src'引数に厳密なリストを使用することで、外部ソース（SVG画像内を含む）からのJavaScriptの実行を防ぐことができます。無効にする場合は空欄のままにしてください。設定例：default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**コンテンツセキュリティポリシーのレポートのみ**

この設定を使用すると、コンテンツセキュリティポリシーを強制せずにレポートすることで実験を行うことができます。

### `security_public_key_pins`

**HTTP公開鍵ピニング**

HTTP公開鍵ピニング（HTTP Public Key Pinning）は、偽のX.509証明書を使用したMiTM攻撃からサイトを保護します。ブラウザが信頼すべきアイデンティティのみをホワイトリストに登録することで、証明機関が侵害された場合でもユーザーを保護することができます。

### `security_public_key_pins_report_only`

**HTTP公開鍵ピニングのレポートのみ**

この設定を使用すると、HTTP公開鍵ピニングを強制せずにレポートすることで実験を行うことができます。

### `security_referrer_policy`

**セキュリティリファラーポリシー**

リファラーポリシー（Referrer Policy）は、サイトがドキュメントから離れる際のナビゲーションにブラウザが含める情報の量を制御できる新しいヘッダーで、すべてのサイトで設定する必要があります。

*デフォルト: `origin-when-cross-origin`*

### `security_session_cookie_samesite_none`

**セッションクッキーのSameSite**

セッションクッキーにSameSite:Noneパラメータを有効にします。詳細情報：https://www.chromium.org/updates/same-site および https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*デフォルト: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Securityは、サイトでサポートすべき優れた機能であり、ユーザーエージェントにHTTPSの使用を強制させることでTLSの実装を強化します。推奨値：'strict-transport-security: max-age=63072000; includeSubDomains'。詳細はhttps://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Securityを参照してください。'preload'サフィックスを含めることができますが、これはトップレベルドメイン（TLD）に影響を及ぼすため、軽々しく行うべきではありません。詳細はhttps://hstspreload.org/を参照してください。無効にする場合は空欄のままにしてください。

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Optionsは、ブラウザがコンテンツタイプをMIMEスニッフィングするのを防ぎ、宣言されたコンテンツタイプに固執するよう強制します。このヘッダーの有効な値は'nosniff'のみです。

*デフォルト: `nosniff`*

### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Optionsは、サイトをフレームに表示するかどうかをブラウザに指示します。サイトをフレームに表示させないことで、クリックジャッキングなどの攻撃から防御することができます。ここでURLを定義する場合、コンテンツが表示されるべきURLを指定し、サイトがコンテンツを受け入れるURLを指定するのではありません。たとえば、メインURL（上記のroot_web）がhttps://11.chamilo.org/の場合、この設定は'ALLOW-FROM https://11.chamilo.org'であるべきです。これらのヘッダーは、ChamiloがHTTPヘッダーの生成を担当するページ（つまり'.php'ファイル）にのみ適用されます。静的ファイルには適用されません。この機能を試す場合は、静的ファイルに対して適切なヘッダーを追加するためにWebサーバーの設定も更新してください。詳細については、上記のCDN設定ドキュメント（'add_header'を検索）を参照してください。この設定を有効にする場合の推奨（厳格な）値：'SAMEORIGIN'。

*デフォルト: `SAMEORIGIN`*

### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protectionは、ほとんどのブラウザに組み込まれているクロスサイトスクリプティングフィルターの設定を行います。推奨値 '1; mode=block'。

*デフォルト: `1; mode=block`*

### `user_reset_password`

**パスワードリセットトークンの有効化**

このオプションを有効にすると、ユーザーがパスワードをリセットするために、期限付きの使い捨てトークンを生成し、メールで送信することができます。

*デフォルト: `false`*

### `user_reset_password_token_limit`

**パスワードリセットトークンの有効期限**

生成されたトークンが自動的に期限切れになり、使用できなくなるまでの秒数（新しいトークンを生成する必要があります）。

*デフォルト: `3600`*