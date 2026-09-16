# AI Helpers Settings

AIヘルパー（テキスト生成、画像生成、動画生成、AIチューター、AI採点）の設定です。各プロバイダーはタスク種別ごとに有効化できます。あわせて [AI Configuration](../integrations/ai-configuration.md) も参照してください。

これらの設定には **Administration > Configuration settings > AI Helpers** からアクセスします。このカテゴリには **14 件の設定** が含まれ、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに示します。

> コード上の変数名は等幅フォントで示しています。API 経由でスクリプトする場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルに変更する場合に使用してください。

## Settings

### `ai_providers`

**AI providers connection data**

外部 AI サービスに接続するための設定データです。

### `content_analyser`

**Content analyser**

学習教材を分析し、洞察の抽出や品質向上を行います。

*Default: `false`*

### `course_analyser`

**Course analyser**

1 つまたは複数のコース内のすべてのリソースを分析し、当該コースに関する任意の質問に答えられるよう AI モデルを事前学習します（コンテンツが設定済みの AI サービスと共有可能であることを確認してください）。

*Default: `false`*

### `disclose_ai_assistance`

**Disclose AI assistance**

いずれかの AI システムによって生成または共同生成されたコンテンツやフィードバックにタグを表示し、何らかの AI システムの助けを借りて作成されたことを利用者に明示します。どのケースでどの AI システムが使われたかの詳細は監査のためデータベース内に保持されますが、最終利用者からは直接参照できません。

*Default: `true`*

### `enable_ai_helpers`

**Enable the AI helper tool**

プラットフォームで利用可能なすべての AI 機能を有効にします。

*Default: `false`*

### `exercise_generator`

**Exercise generator**

コースコンテンツに基づき、AI でパーソナライズされたテストを生成します。

*Default: `false`*

### `glossary_terms_generator`

**Glossary terms generator**

教師がコース内で AI 生成の用語集項目を依頼できるようにします。コースタイトルとコース説明ツールの概要に基づき 20 件の用語を生成します。複数回使用した場合、その用語集に既にある用語は除外されます（コンテンツが設定済みの AI サービスと共有可能であることを確認してください）。

*Default: `false`*

### `image_generator`

**Image generator**

プロンプトまたはコンテンツに基づき、AI で画像を生成します。

*Default: `false`*

### `learning_path_generator`

**Learning paths generator**

AI の提案を用いてパーソナライズされた学習パスを生成します。

*Default: `false`*

### `open_answers_grader`

**Open answers grader**

記述式の回答を AI で自動採点します。

*Default: `false`*

### `task_grader`

**Assignments grader**

アップロードされた課題を AI で評価・採点します。

*Default: `false`*

### `tutor_chatbot`

**Tutor chatbot energized by AI**

学習者に AI 駆動のチューターアシスタントを提供します。

*Default: `false`*

### `video_generator`

**Video generator**

プロンプトまたはコンテンツに基づき、AI で動画を生成します（トークンを大量に消費する場合があります）。

*Default: `false`*

### `wysiwyg_translation_all_languages` **v3**

**Allow AI translation to all active languages in WYSIWYG editors**

教師が WYSIWYG の 1 操作で、有効なすべてのプラットフォーム言語向けの翻訳を生成できるようにします。AI トークンを大量に消費する場合があります。

*Default: `true`*