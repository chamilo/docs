# プラットフォームツール

このページでは、プラットフォーム管理ブロックに残る、より小規模な項目について説明します。

## Extra Fields

**Platform > Extra fields** はフィールド一覧そのものではなく、種類のセレクターです。カスタムフィールドをサポートするすべてのオブジェクト種類が表示され、いずれかをクリックすると、その種類専用のフィールドエディターに移動します。利用可能な種類には次が含まれます。user、course、session、question、learning path（および learning path item/view）、skill、assignment（work）、career、user certificate、survey、terms and conditions、forum category、forum post、exercise、exercise tracking、course announcement、message、document、attendance calendar、glossary、work correction comment、calendar event、portfolio（該当機能が有効な場合は scheduled announcements も）。

最もよく使われるケースであるカスタムユーザープロフィールフィールドについては、[ユーザープロファイリング](../users/user-profiling.md) を参照してください。同じ基盤機能を、ユーザー管理側から説明しています。

## Mail Templates

**Platform > Mail templates** では、サーバー上のファイルを変更せずに、特定のシステムメール（登録確認、購読通知など）の文言を上書きできます。各テンプレートにはタイトル、上書き対象の組み込みメールに対応する **type**、テンプレート本文そのもの（リッチエディターではなくプレーンテキスト/Twig）、および「デフォルトに設定」フラグがあります。種類ごとにアクティブなデフォルトにできるテンプレートは1つだけです。テンプレートはアクセス URL ごとにスコープされます。言語専用の別フィールドはないため、これらのメールの言語処理は、周囲のコードが既に行っている処理に従います。

テンプレートはセキュリティのため **サンドボックス化された** Twig 環境でレンダリングされます。許可されるタグとフィルターはごく一部で、利用可能なデータは受信者の `User` オブジェクトのみです。`user.getEmail()`、`user.getFirstname()` などのゲッター（`getId`、`getUsername`、`getLastname`、`getStatus`、`getOfficialCode`、`getPhone`）で参照します。許可リスト外のものは大きなエラーにはならず、静かに空としてレンダリングされ、その後元の組み込みテンプレートにフォールバックします。カスタムテンプレートはシンプルに保ち、編集後は（実際の登録や通知トリガーを使って）テストしてください。

## Contact Form Categories

**Platform > Contact form categories** は、ポータルの公開 **Contact us** フォームに表示されるドロップダウンを管理します。各カテゴリはタイトルと宛先メールアドレスだけです。訪問者が選んだカテゴリによって、メッセージの送信先受信箱が決まります。別々のフォームを作らずに、トピック（サポート、営業、入学など）ごとに異なるチームへ振り分けるために使います。

## Settings-Category Shortcuts

一部のブロック項目は、独立したツールではなく、[プラットフォーム設定](../platform-settings/README.md) の特定カテゴリへの直接リンクです。

* **Plugins** と **System templates** は、それらのカテゴリに事前フィルターされた Configuration Settings を開きます
* **Regions** も同様で、プラットフォームのリージョン設定向けです

## Occasionally-Visible Items

関連する設定やプラグインが有効なときだけ表示される項目がいくつかあるため、ご利用のインストールでは見えない場合があります。

* **Terms and Conditions** — **Allow terms and conditions** が有効なときに表示され、ユーザーが同意しなければならないテキストを管理します
* **Notifications** — プラットフォームの通知イベント機能が有効なときに表示されます
* **CMS**、**Dictionary**、**Justification** — それぞれ対応するオプションプラグインがインストールされ有効になっている場合に表示されます