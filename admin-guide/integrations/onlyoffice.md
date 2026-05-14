# OnlyOffice

**OnlyOffice** の統合により、ユーザーはChamilo内でブラウザ上で直接ドキュメント（Word、Excel、PowerPoint）をダウンロードせずに編集することができます。

## OnlyOfficeが提供する機能

* **ドキュメント編集** — ブラウザ内で.docx、.xlsx、.pptxファイルを編集可能
* **フォーマットの互換性** — Microsoft Officeフォーマットとの完全な互換性
* **デスクトップソフトウェア不要** — すべてがブラウザ内で動作

> リアルタイムの共同編集はOnlyOffice Document Server自体に依存します。Chamiloのプラグインはサーバーを通じてドキュメントを開き保存しますが、その機能を追加したり制限したりするものではありません。

## 設定方法

1. サーバーに **OnlyOffice Document Server** をインストールする（またはOnlyOfficeクラウドサービスを利用する）
2. Chamiloのプラットフォーム設定で以下を構成する：
   * **OnlyOffice Document Server URL** — OnlyOfficeサーバーのアドレス
   * **Secret key** — ChamiloとOnlyOffice間の安全な通信のためのキー
3. 統合を有効にする

## 動作の仕組み

設定が完了すると、ユーザーはドキュメントツールでサポートされているドキュメントタイプを表示する際に **OnlyOfficeで編集** というオプションを見ることができます。これをクリックすると、Chamiloのインターフェース内でOnlyOfficeエディターがドキュメントを開きます。

変更内容はChamiloのドキュメントストレージに自動的に保存されます。

## ヒント

* **別サーバーの利用を推奨** — BigBlueButtonと同様に、OnlyOffice Document Serverは最適なパフォーマンスを得るために独自のサーバーで実行することをお勧めします
* **HTTPSが必要** — 統合が機能するためには、ChamiloとOnlyOfficeの両方がHTTPS経由で提供されている必要があります
* **フォーマットの確認** — OnlyOfficeはOfficeフォーマット（.docx、.xlsx、.pptx）で最適に動作します。その他のフォーマットでは編集サポートが制限される場合があります。