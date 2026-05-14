# Sistem Sumber Daya

Sistem sumber daya adalah salah satu konsep arsitektur paling penting di Chamilo 2.0. Sistem ini menyediakan abstraksi terpadu untuk semua konten kursus — dokumen, latihan, jalur pembelajaran, posting di forum, dan banyak lagi.

## Konsep Inti

Setiap bagian dari konten kursus diwakili oleh sebuah **ResourceNode**. Ini memberikan serangkaian kemampuan umum untuk semua jenis konten:

* **Kontrol visibilitas** — Tampilkan/sembunyikan untuk siswa
* **Kontrol akses** — Pemilih keamanan memeriksa izin melalui ResourceNode
* **Penyimpanan berkas** — Berkas yang dilampirkan disimpan melalui ResourceFile
* **Struktur pohon** — ResourceNodes membentuk pohon (hubungan induk-anak)
* **Jejak audit** — Pencipta, tanggal pembuatan, pelacakan modifikasi

## Entitas Utama

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

Entitas pusat. Setiap entitas konten memiliki hubungan satu-ke-satu dengan sebuah ResourceNode.

Kolom utama:

| Kolom | Tipe | Deskripsi |
|-------|------|-----------|
| `id` | integer | Kunci utama |
| `uuid` | UUID v4 | Pengenal unik untuk penggunaan di API |
| `title` | string | Judul yang ditampilkan |
| `creator` | User | Pengguna yang membuat sumber daya ini |
| `resourceFile` | ResourceFile | Berkas yang dilampirkan (jika ada) |
| `resourceType` | ResourceType | Jenis sumber daya (dokumen, kuis, dll.) |
| `parent` | ResourceNode | Induk dalam pohon sumber daya |
| `children` | Collection | ResourceNodes anak |
| `resourceLinks` | Collection | Tautan visibilitas dan akses |

Pohon ini menggunakan strategi **materialized path** dari Gedmo untuk kueri hierarkis yang efisien.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Menyimpan data berkas aktual untuk sebuah sumber daya:

| Kolom | Tipe | Deskripsi |
|-------|------|-----------|
| `id` | integer | Kunci utama |
| `title` | string | Nama asli berkas |
| `mimeType` | string | Tipe MIME |
| `originalName` | string | Nama asli saat diunggah |
| `size` | integer | Ukuran berkas dalam byte |
| `crop` | string | Data pemotongan (untuk gambar) |

Penyimpanan berkas dikelola oleh Flysystem, memungkinkan berkas disimpan di disk lokal, S3, Azure, atau GCS, tergantung pada konfigurasi.

### ResourceLink

Mengontrol visibilitas dan akses berdasarkan konteks. Ada 3 jenis konteks utama:

1. Kursus
2. Sesi
3. Grup (dalam sebuah kursus)

Dengan demikian, entitas ResourceLink mencerminkan kombinasi dari ketiga jenis konteks ini dan menetapkan visibilitas untuk konteks lengkap tersebut:

| Kolom | Tipe | Deskripsi |
|-------|------|-----------|
| `course` | Course | Kursus mana yang menjadi milik sumber daya ini |
| `session` | Session | Sesi mana (kosong untuk kursus dasar) |
| `group` | CGroup | Grup mana (kosong untuk seluruh kursus) |
| `visibility` | integer | Terlihat, tidak terlihat, atau dihapus |

Ini memungkinkan ResourceNode yang sama memiliki visibilitas berbeda di konteks yang berbeda (misalnya, terlihat di satu sesi, tetapi disembunyikan di sesi lain).

Ini ditetapkan secara otomatis saat menggunakan antarmuka dan memutuskan, misalnya, bahwa sebuah sumber daya khusus untuk sebuah sesi, menjadi terlihat untuk semua grup dalam kursus tertentu pada sesi tertentu, tetapi tidak terlihat di kursus dasar atau sesi lain.

Secara default, sumber daya yang terlihat di kursus dasar juga terlihat di semua sesi kursus tersebut, tetapi tutor kursus dapat memutuskan untuk menyembunyikan sumber daya dari sesi tertentu. Dalam kasus ini, kami akan mengambil visibilitas spesifik untuk sumber daya tersebut di sesi ini dan melihat bahwa visibilitasnya adalah 0, sehingga item tersebut tidak akan muncul untuk siswa di sesi ini, sementara kurangnya visibilitas spesifik sesi di sesi lain akan membuat sumber daya menggunakan visibilitas kursus dasar (dan sumber daya akan ditampilkan untuk siswa).

## Integrasi dengan API Platform

ResourceNode diekspos sebagai sumber daya API Platform dengan keamanan:

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

Entitas konten kursus (CDocument, CQuiz, CLp, dll.) memperluas `AbstractResource` atau mengimplementasikan `ResourceInterface`, yang memberikan mereka hubungan `resourceNode`:

```php
// Dalam entitas CDocument:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Ketika Anda membuat sebuah CDocument, sebuah ResourceNode secara otomatis dibuat bersamanya, memberikan pengelolaan sumber daya yang terpadu.

## Implikasi Praktis

Saat bekerja dengan konten kursus:

1. **Pembuatan konten** — Buat baik entitas konten maupun ResourceNode-nya
2. **Pemeriksaan izin** — Gunakan pemilih keamanan dari ResourceNode
3. **Pengelolaan berkas** — Lampirkan berkas melalui ResourceFile
4. **Kontrol visibilitas** — Buat/modifikasi ResourceLinks
5. **Pembangunan struktur pohon** — Gunakan hubungan induk-anak di ResourceNode untuk struktur folder (misalnya, folder dokumen)