# ルームの管理

Chamilo のルームはブランチの下に整理されます。ブランチは物理的な拠点であり、各ルームは必ず 1 つのブランチに属します。

## ブランチ

**Rooms > Branches** では、組織の物理的な拠点（建物、キャンパス、オフィスなど）を管理します。ブランチは入れ子にできるため（ブランチは子ブランチを持てます）、「Main Campus > Building A」のような構成をモデル化できます。

ブランチに設定できるフィールド:

* **Title** および **Description**
* **Parent branch** — ブランチを階層的に整理するため
* **IP address** — 任意。ネットワークに基づく識別用
* **Latitude / Longitude** — 地図表示用
* **Download / Upload speed** および **Delay** — 任意。ネットワーク品質のメタデータ
* **Administrator e-mail, name, and phone** — その拠点を管理する担当者の連絡先

## ルーム

**Rooms > Rooms** では、ブランチ内の実際に予約可能なスペース（通常は教室や研修室）を管理します。すべてのルームはブランチに属している必要があります。

ルームに設定できるフィールド:

* **Title** および **Description**
* **Branch** — このルームが属するブランチ（必須）
* **Floor number**
* **Capacity** — 正の数である必要があります
* **Geolocation**、**IP address**、および **IP mask** — 任意の詳細フィールド

各ルームには、予約状況を示す「Occupation」カレンダービューと、そのルームを使用しているコース数も表示されます。

## 関連

一覧を閲覧するのではなく、特定の時間帯で空いているルームを探す場合は、[ルーム空き状況ファインダー](room-availability-finder.md) を参照してください。