# Sistem Resource

Sistem resource adalah salah satu konsep arsitektur terpenting dalam Chamilo 3.0. Sistem ini menyediakan abstraksi terpadu untuk semua konten kursus — dokumen, latihan, learning path, posting forum, dan lainnya.

## Konsep Inti

Setiap potongan konten kursus direpresentasikan oleh sebuah **ResourceNode**. Hal ini memberikan semua jenis konten seperangkat kemampuan yang sama:

* **Kontrol visibilitas** — Tampilkan/sembunyikan dari peserta didik
* **Kontrol akses** — Security voter memeriksa izin melalui ResourceNode
* **Penyimpanan berkas** — Berkas terlampir disimpan melalui ResourceFile
* **Struktur pohon** — ResourceNode membentuk pohon (hubungan induk-anak)
* **Jejak audit** — Pembuat, tanggal pembuatan, pelacakan modifikasi

## Entitas Utama

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

Entitas pusat. Setiap entitas konten memiliki hubungan one-to-one dengan sebuah ResourceNode.

Kolom utama:

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | Primary key |
| `uuid` | UUID v4 | Unique identifier for API use |
| `title` | string | Display title |
| `creator` | User | The user who created this resource |
| `resourceFile` | ResourceFile | The attached file (if any) |
| `resourceType` | ResourceType | The type of resource (document, quiz, etc.) |
| `parent` | ResourceNode | Parent in the resource tree |
| `children` | Collection | Child ResourceNodes |
| `resourceLinks` | Collection | Visibility and access links |

Pohon menggunakan strategi **materialized path** dari Gedmo untuk kueri hierarkis yang efisien.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Menyimpan data berkas aktual untuk sebuah resource:

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | Primary key |
| `title` | string | Original filename |
| `mimeType` | string | MIME type |
| `originalName` | string | Original upload name |
| `size` | integer | File size in bytes |
| `crop` | string | Crop data (for images) |

Penyimpanan berkas ditangani oleh Flysystem, sehingga berkas dapat berada di disk lokal, S3, Azure, atau GCS tergantung konfigurasi.

### ResourceLink

Mengontrol visibilitas dan akses per konteks. Terdapat 3 jenis konteks utama:

1. Course
2. Session
3. Group (dalam sebuah course)

Jadi entitas ResourceLink merefleksikan kombinasi dari 3 jenis konteks tersebut dan menetapkan visibilitas untuk konteks lengkap itu:

| Field | Type | Description |
|-------|------|-------------|
| `course` | Course | Which course the resource belongs to |
| `session` | Session | Which session (null for base course) |
| `group` | CGroup | Which group (null for whole course) |
| `visibility` | integer | Visible, invisible, or deleted |

Hal ini memungkinkan ResourceNode yang sama memiliki visibilitas berbeda dalam konteks yang berbeda (misalnya, terlihat dalam satu session tetapi tersembunyi di session lain).

Ini diatur secara otomatis saat menggunakan antarmuka dan memutuskan, misalnya, bahwa suatu resource adalah resource spesifik session yang akan terlihat untuk semua group dalam suatu course pada session tertentu, tetapi tidak terlihat di course dasar atau di session lain.

Secara default, resource yang terlihat di course dasar juga terlihat di semua session course tersebut, tetapi tutor course dapat memutuskan untuk menyembunyikan suatu resource dari session tertentu. Dalam kasus ini, kita akan mengambil visibilitas spesifik untuk resource ini pada session tersebut dan melihat bahwa visibilitasnya adalah 0, sehingga item tidak akan muncul bagi peserta didik di session ini, sementara ketiadaan visibilitas spesifik session di session lain akan membuat resource menggunakan visibilitas course dasar (dan resource akan ditampilkan kepada peserta didik).

## Integrasi API Platform

ResourceNode diekspos sebagai resource API Platform dengan keamanan:

```php
#[ApiResource(
    operations: [
        new Get(security: "is_granted('VIEW', object)"),
        new Put(security: "is_granted('EDIT', object)"),
        new Delete(security: "is_granted('DELETE', object)"),
        new GetCollection(security: "is_granted('ROLE_USER')"),
    ]
)]
```

## Bagaimana Entitas Konten Terhubung

Entitas konten kursus (CDocument, CQuiz, CLp, dll.) memperluas `AbstractResource` atau mengimplementasikan `ResourceInterface`, yang memberi mereka hubungan `resourceNode`:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Ketika Anda membuat CDocument, sebuah ResourceNode secara otomatis dibuat bersamanya, menyediakan pengelolaan resource yang terpadu.

## Implikasi Praktis

Saat bekerja dengan konten kursus:

1. **Membuat konten** — Buat entitas konten DAN ResourceNode-nya
2. **Memeriksa izin** — Gunakan security voter pada ResourceNode
3. **Mengelola berkas** — Lampirkan berkas melalui ResourceFile
4. **Mengontrol visibilitas** — Buat/ubah ResourceLink
5. **Membangun pohon** — Gunakan hubungan induk-anak pada ResourceNode untuk struktur folder (misalnya, folder dokumen)