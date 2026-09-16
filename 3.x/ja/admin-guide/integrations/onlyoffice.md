# OnlyOffice

**OnlyOffice** 連携により、ユーザーはドキュメント（Word、Excel、PowerPoint）をダウンロードせずに、Chamilo 内のブラウザー上で直接編集できます。

## OnlyOffice が提供するもの

* **ドキュメント編集** — ブラウザー上で .docx、.xlsx、.pptx ファイルを編集
* **形式の互換性** — Microsoft Office 形式との完全な互換性
* **デスクトップソフトウェア不要** — すべてがブラウザー上で動作

> リアルタイム共同編集は OnlyOffice Document Server 自体に依存します。Chamilo のプラグインはサーバー経由でドキュメントを開いて保存しますが、その機能を追加したり制限したりはしません。

## 設定

1. サーバーに **OnlyOffice Document Server** をインストールする（または OnlyOffice クラウドサービスを利用する）
2. Chamilo のプラットフォーム設定で、次を構成する:
   * **OnlyOffice Document Server URL** — OnlyOffice サーバーのアドレス
   * **Secret key** — Chamilo と OnlyOffice 間の安全な通信用
3. 連携を有効にする

## 仕組み

設定が完了すると、ドキュメントツールで対応するドキュメント種別を表示した際に、ユーザーには **Edit with OnlyOffice** オプションが表示されます。クリックすると、Chamilo のインターフェース内で OnlyOffice エディターが開き、ドキュメントが開きます。

変更は Chamilo のドキュメントストレージに自動的に保存されます。

## ヒント

* **別サーバーを推奨** — BigBlueButton と同様、最高のパフォーマンスを得るには OnlyOffice Document Server を専用サーバーで稼働させるべきです
* **HTTPS が必須** — 連携が機能するには、Chamilo と OnlyOffice の両方を HTTPS で提供する必要があります
* **形式を確認** — OnlyOffice は Office 形式（.docx、.xlsx、.pptx）で最もよく動作します。その他の形式では編集サポートが限定される場合があります。