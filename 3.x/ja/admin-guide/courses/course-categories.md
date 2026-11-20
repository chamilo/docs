# コースカテゴリ

コースカテゴリはコースカタログを整理し、学習者が関連するコースを見つけやすくします。

## カテゴリの作成

1. 管理パネルから **Course categories** に移動します
2. **Add category** をクリックします
3. 次の項目を入力します:
   * **Category code** — 短い一意の識別子
   * **Category name** — 表示名（例: 「Information Technology」「Management Skills」）
   * **Allow adding courses in this category?** — コースがこのカテゴリを設定できるか、階層の中間レベルとしてのみ機能するか
   * **Parent category** — （任意）このカテゴリを別のカテゴリの下に配置して階層を作成します
   * **Description** — （任意）
   * **Image** — （任意）このカテゴリを表しますが、ほとんどどこにも表示されません
4. *Add category* を押します

Chamilo は既定で 3 つのカテゴリを作成します: *Language skills*、*PC Skills*、*Projects*。これらは必要に応じて名前の変更、削除、またはそのまま利用できます。

## カテゴリ階層

![入れ子になったカテゴリツリーを示すコースカテゴリ管理ページ](/.gitbook/assets/admin-course-categories.png)

カテゴリは入れ子にしてツリー構造を作成できます:

* Business
  * Management
  * Marketing
  * Finance
* Technology
  * Programming
  * Networking
  * Cybersecurity

コースカタログを閲覧する学習者は、この階層をたどってコースを探せます。

## カテゴリの管理

* **Edit** — カテゴリ名、コード、または親を変更します
* **Move** — リスト内のカテゴリの位置を変更します
* **Delete** — カテゴリを削除します。削除されたカテゴリ内のコースは「uncategorized」に移動されます。

## ヒント

* **Keep it simple** — 学習者が一目で理解できる幅広いカテゴリを使用します
* **Limit depth** — 深く入れ子にしたカテゴリは避けます。通常は 2 または 3 レベルで十分です。
* **Assign categories during course creation** — コース作成時に教師がカテゴリを選択するよう促し、カタログの整理を維持します