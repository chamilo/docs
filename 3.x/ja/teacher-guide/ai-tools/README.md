# AIツール

Chamilo 3.0 では、コンテンツをより迅速に作成し、学習者にパーソナライズされたサポートを提供するためのAI搭載ツールが導入されています。これらの機能は、大規模言語モデル（OpenAIのGPT、Google Gemini、Mistralなど）を使用して、教育コンテンツを生成し、採点を支援します。

> AIツールは、プラットフォーム管理者が設定した後に利用可能になります。セットアップの詳細については、管理ガイドの [AI Configuration](../../admin-guide/integrations/ai-configuration.md) のセクションを参照してください。

## 利用可能なAIツール

* **[AI Tutor](ai-tutor.md)** — 学習者がコース関連の質問について対話できるAIチャットボット
* **[Exercise Generator](exercise-generator.md)** — コースコンテンツまたはトピックの説明からクイズ問題を自動生成します
* **[Learning Path Generator](learning-path-generator.md)** — トピックまたは一連の学習目標から構造化された学習シーケンスを作成します
* **[AI Grading](ai-grading.md)** — 記述式の回答や学生の提出物に対するAI支援の評価を取得します
* **[Glossary Terms Generator](glossary-generator.md)** — コース用語集の用語定義を自動生成します
* **[AI Media Generation](ai-media-generation.md)** — ドキュメント作成時にリッチテキストエディタから画像や短い動画を生成します
* **[Course Picture Generator](course-picture-generator.md)** — コース設定画面からコースのサムネイル画像を直接生成します

## AIツールの仕組み

AIツールが有効になると、関連するコンテキストに表示されます。

* **Exercise Generator** は、演習の作成または編集時に表示され、Documentsツール内のドキュメントに対するクイックアクションとしても表示されます
* **Learning Path Generator** は、ラーニングパスの作成時に表示されます
* **AI Grading** オプションは、課題の採点ワークフローに表示されます
* **AI Tutor** は、コース内で学習者が利用できます
* **Glossary Terms Generator** は、Glossaryツールのツールバーに表示されます
* **AI Media Generation** ダイアログは、ドキュメントの作成または編集時にリッチテキストエディタに表示されます
* **Course Picture Generator** は、Course Settingsのコース画像フィールドの横に表示されます

AIが生成したコンテンツはすべて、公開前に確認、編集、修正できる**提案**として提示されます。学習者に何を見せるかは、常にあなたが最終判断します。