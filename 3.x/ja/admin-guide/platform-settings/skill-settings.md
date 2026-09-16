# スキル設定

**スキル**システムの動作 — スキルツリー、付与ルール、プロフィール連携。

これらの設定には **管理 > 設定 > スキル** からアクセスします。このカテゴリには **13 件の設定** があり、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに示します。

> コード上の変数名は等幅フォントで示しています。API 経由でスクリプトする場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルに変更する場合に使用してください。

## 設定

### `allow_hr_skills_management`

**HR によるスキル管理を許可**

HR がスキルを管理できるようにします

*デフォルト: `true`*


### `allow_private_skills`

**学習者からスキルを非表示**

有効にすると、スキルは管理者、教師（コースを通じてユーザーに関連付けられている場合）、および HRM ユーザー（ユーザーに関連付けられている場合）にのみ表示されます。

*デフォルト: `false`*


### `allow_skill_rel_items`

**アイテムへのスキル連携を有効化**

任意のアイテムをスキルに連携し（それによりスキルの習得を可能にする）主要な機能を有効にします。この機能では、教師がスキルの習得を確認する必要があり、習得は自動ではありません。

*デフォルト: `false`*


### `allow_skills_tool`

**スキルツールを許可**

ユーザーはソーシャルネットワークおよびホームページのブロックで自分のスキルを確認できます。

*デフォルト: `true`*

### `allow_teacher_access_student_skills`

**教師が学習者のスキルにアクセスすることを許可**

[推定] 講師が担当コースの学習者が習得したスキルを閲覧・監視できるようにします。

*デフォルト: `false`*


### `badge_assignation_notification`

**スキル／バッジ習得時に学習者へ通知を送信**

[推定] 学習者が新しいスキルまたはバッジを習得したときに通知を送信します。

*デフォルト: `false`*


### `hide_skill_levels`

**スキルレベル機能を非表示**

[推定] スキル関連の画面でスキルレベルの階層およびレベルラベルを隠します。

*デフォルト: `false`*


### `manual_assignment_subskill_autoload`

**ユーザーへのスキル割り当て: サブスキルの自動読み込み**

ユーザーにスキルを手動で割り当てる際、選択したスキルではなくサブスキルの割り当てを自動的に提案するようフォームを設定できます。

*デフォルト: `false`*


### `openbadges_backpack`

**OpenBadges backpack の URL**

バッジをエクスポートしたいすべてのユーザーに既定で使用される OpenBadges backpack サーバーの URL です。既定値は、オープンで無料の Mozilla Foundation backpack リポジトリです: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**スキルホイールにスキルのフルネームを表示**

スキルホイール上で、短いコードがある場合にスキル名を表示します。

*デフォルト: `false`*


### `skill_levels_names`

**スキルレベル名**

スキルレベルの名前を id => name の配列として定義します。

### `skills_hierarchical_view_in_user_tracking`

**スキルを階層テーブルとして表示**

[推定] 進捗およびレポート画面で学習者のスキルを階層ツリー構造として表示します。

*デフォルト: `false`*


### `skills_teachers_can_assign_skills`

**教師がコースを通じて習得されるスキルを設定することを許可**

既定では、どのコースでどのスキルを習得できるかを決定できるのは管理者のみです。

*デフォルト: `false`*