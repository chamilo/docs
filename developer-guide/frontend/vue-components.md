# Komponen Vue

Chamilo memiliki sejumlah besar komponen Vue yang diorganisasi berdasarkan area fungsionalitas di `assets/vue/components/`.

## Komponen Dasar

Keluarga `Base*` di `assets/vue/components/basecomponents/` mengenkapsulasi primitif PrimeVue dengan standar khusus Chamilo (tata letak FloatLabel, ikon MDI melalui `chamiloIconToClass`, pesan validasi yang konsisten, penskalaan Tailwind). Selalu pilih komponen `Base*` sebelum mengimpor komponen dasar dari PrimeVue — inilah cara antarmuka pengguna tetap konsisten di seluruh SPA dan bagaimana perubahan desain dapat diimplementasikan dari satu lokasi pusat.

Komponen **tidak** didaftarkan secara global (satu-satunya primitif PrimeVue yang didaftarkan secara global adalah `Column`, yang digunakan di dalam `BaseTable`). Impor masing-masing secara eksplisit:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### Bidang Formulir

Sebagian besar menerima nilai melalui `v-model`, mengekspos properti `id` + `label` untuk aksesibilitas/pengikatan label mengambang, dan menampilkan validasi melalui pasangan `isInvalid` / `errorText` (atau `messageText`).

| Komponen                          | Melibatkan                                           | Tujuan                                                                                                                                                                                                |
|-----------------------------------|------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`               | `InputText` + `FloatLabel`                           | Bidang teks satu baris. Berubah menjadi label statis pada bidang input `date`/`time`/`datetime-local` (di mana label mengambang akan menutupi placeholder bawaan).                                  |
| `BaseInputTextWithVuelidate.vue`  | `BaseInputText`                                      | Adaptor tipis untuk Vuelidate: meneruskan `$error` ke `isInvalid` dan merender `$errors[].$message` pada slot `errors`. Gabungkan dengan objek bidang Vuelidate.                                      |
| `BaseTextArea.vue`                | `Textarea` + `FloatLabel`                            | Bidang teks multiline.                                                                                                                                                                                |
| `BaseTextAreaWithVuelidate.vue`   | `BaseTextArea`                                       | Pola adaptor Vuelidate yang sama seperti `BaseInputTextWithVuelidate`.                                                                                                                                |
| `BaseInputNumber.vue`             | `InputNumber`                                        | Bidang numerik dengan `min` / `max` / `step` dan tombol peningkatan/penurunan.                                                                                                                        |
| `BaseInputTags.vue`               | (kustom)                                             | Tag teks bebas; tag ditambahkan dengan menekan enter/koma dan dihapus dengan menekan backspace.                                                                                                      |
| `BaseInputGroup.vue`              | `InputGroup` + `BaseButton`                          | Bidang teks yang dikombinasikan dengan tombol aksi (gaya pencarian).                                                                                                                                  |
| `BaseCheckbox.vue`                | `Checkbox`                                           | Kotak centang biner atau terikat pada nilai dengan label.                                                                                                                                             |
| `BaseRadioButtons.vue`            | `RadioButton`                                        | Grup tombol radio yang dikontrol oleh array `options: [{label, value}]`.                                                                                                                              |
| `BaseToggleButton.vue`            | `BaseButton`                                         | Tombol dua keadaan (label dan ikon hidup/mati) yang terikat melalui `v-model`.                                                                                                                         |
| `BaseCalendar.vue`                | `DatePicker` + `FloatLabel`                          | Pemilih tanggal/waktu. Menghormati `platform.timepicker_increment` dan lokalitas pengguna melalui `calendarLocales`.                                                                                 |
| `BaseColorPicker.vue`             | asli `<input type="color">` + `InputText`            | Pemilih warna dengan fallback ke teks heksadesimal; menggunakan `colorjs.io` untuk memvalidasi input heksadesimal manual.                                                                            |
| `BaseRating.vue`                  | `Rating`                                             | Bidang penilaian berdasarkan bintang.                                                                                                                                                                 |
| `BaseFileUpload.vue`              | asli `<input type="file">` + `BaseButton`            | Pemilih file tunggal yang memicu tombol bergaya lampiran.                                                                                                                                             |
| `BaseFileUploadMultiple.vue`      | asli `<input type="file" multiple>` + `BaseButton`   | Varian multi-file dari `BaseFileUpload`.                                                                                                                                                              |
| `BaseUploader.vue`                | Uppy `Dashboard`                                     | Pengunggah lengkap Uppy (webcam, audio, editor gambar, unggah XHR) dengan lokalisasi yang terikat pada `appLocale` saat ini. Gunakan ini untuk unggahan kaya dengan progres; gunakan `BaseFileUpload*` untuk lampiran sederhana. |

### Seleksi dan Pelengkapan Otomatis

| Komponen                | Melibatkan                    | Tujuan                                                                                                                               |
|-------------------------|-------------------------------|-----------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`        | `Dropdown` + `FloatLabel`     | Menu tarik-turun untuk pilihan tunggal dengan tombol hapus opsional.                                                        |
| `BaseMultiSelect.vue`   | `MultiSelect` + `FloatLabel`  | Menu tarik-turun untuk pilihan ganda yang menampilkan item terpilih sebagai chip.                                           |
| `BaseSearchSelect.vue`  | `Dropdown` dengan `filter`    | Menu tarik-turun untuk pilihan tunggal dengan kotak pencarian terintegrasi, pengguliran virtual opsional, dan templat opsi dua baris (`label` + `sublabel`). |
| `BaseAutocomplete.vue`  | `AutoComplete`                | Pelengkapan otomatis asinkron (minimal 3 karakter). Mendukung pilihan tunggal atau ganda dan slot `chip` untuk menyesuaikan chip. |
| `BaseUserFinder.vue`    | `BaseTable` + `userService`   | Tabel pencarian pengguna yang dipaginasi dengan seleksi baris. Gunakan ketika fungsionalitas memerlukan pemilih pengguna bergaya admin. |

### Tombol dan Aksi

| Komponen                          | Melibatkan            | Tujuan                                                                                                                                                                                                                                                                                                                                                     |
|-----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                  | `Button` (PrimeVue) | Tombol standar Chamilo. Menyelesaikan ikon melalui `chamiloIconToClass`, menormalkan `type` menjadi `severity`/`variant` dari PrimeVue, merender `BaseAppLink` internal ketika `route` atau `toUrl` disediakan (sehingga komponen yang sama menangani kasus router-link, anchor, dan tombol sederhana). Nilai yang diterima untuk `type` tercantum di `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue`  | `BaseButton`        | Tombol pengungkapan yang mengalihkan panel "pengaturan lanjutan" yang dimasukkan melalui `v-model`.                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                 | `Toolbar`           | Bilah alat aksi dengan slot `start` / `end` (atau satu slot default). `showTopBorder` opsional untuk penataan pemisah.                                                                                                                                                                                                                                       |

---
### Tampilan dan Data

| Komponen              | Melibatkan                  | Tujuan                                                                                                                                                                                         |
|-----------------------|-----------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`       | `DataTable` (PrimeVue)      | Tabel data standar Chamilo. Mendukung mode server-side (`lazy`), pengurutan berdasarkan beberapa kolom, filter global, pemilihan baris, dan paginasi. Masukkan kolom sebagai anak `<Column>` (terdaftar secara global). |
| `BaseCard.vue`        | `Card`                      | Pembungkus kartu yang meneruskan slot `header`, `title`, `subtitle`, `footer`, dan default (konten).                                                                                          |
| `BaseChart.vue`       | `Chart`                     | Preset grafik pie. Masukkan objek `data` yang kompatibel dengan Chart.js.                                                                                                                     |
| `BaseChip.vue`        | `Chip`                      | Chip yang dirender dari objek `{value, labelField, imageField}`, dengan tombol hapus opsional.                                                                                               |
| `BaseTag.vue`         | `Tag`                       | Label berwarna. Memetakan `warning` dari Chamilo ke `warn` di PrimeVue.                                                                                                                      |
| `BaseAvatarList.vue`  | `Avatar` + `BaseUserAvatar` | Baris avatar dengan penghitung kelebihan (misalnya, "+3"); dikontrol oleh `useAvatarList`.                                                                                                   |
| `BaseUserAvatar.vue`  | `Avatar`                    | Avatar pengguna dengan fallback gambar, status pemuatan, dan label yang dapat diakses.                                                                                                       |
| `BaseIcon.vue`        | `<i class="mdi …">`         | Renderer ikon Chamilo. Menambahkan lencana opsional (teks atau ikon), tooltip, dan pengubah ukuran. Selalu masukkan nama semantik Chamilo (misalnya, `"edit"`), bukan kelas MDI mentah.       |
| `BaseIconField.vue`   | `IconField` + `InputText`   | Bidang input pencarian dengan ikon kaca pembesar di sebelah kiri.                                                                                                                             |
| `BaseDivider.vue`     | `Divider`                   | Pembatas horizontal atau vertikal, dengan judul dan penyelarasan opsional.                                                                                                                    |

---
### Navigasi dan Menu

| Komponen                   | Melibatkan              | Tujuan                                                                                                                                                                                 |
|----------------------------|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Menu popup yang memahami rute router di dalam item `model[]`.                                                                                                                         |
| `BaseDropdownMenu.vue`     | (kustom)                | Pemicu dropdown ringan dengan koordinasi pembukaan tunggal (membuka satu menutup yang lain).                                                                                                   |
| `BaseContextMenu.vue`      | (kustom)                | Menu konteks klik kanan / diposisikan, dikontrol oleh `visible` + `position`.                                                                                                 |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Menu navigasi gaya akordeon yang digunakan di bilah sisi; secara otomatis melacak kunci yang diperluas dari model.                                                                 |
| `BaseRouteTabs.vue`        | Baris dari `BaseAppLink` | Bilah tab di mana setiap tab adalah tautan router. Tab aktif secara otomatis disorot berdasarkan rute saat ini.                                                                         |
| `BaseAppLink.vue`          | `RouterLink` *atau* `<a>` | Tautan cerdas: merender `<a>` ketika `url` ditentukan (eksternal/legacy), jika tidak, maka `<RouterLink>` dari Vue Router. Gunakan ini sebagai pengganti primitif apa pun untuk menjaga keseragaman antara tautan internal dan eksternal. |

---
### Dialog

`BaseDialog` adalah dasarnya; yang lain dibangun di atasnya untuk alur umum konfirmasi/batal dan penghapusan.

| Komponen                      | Melibatkan                | Tujuan                                                                                                                             |
|-------------------------------|---------------------------|---------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Dialog modal dengan header bertitel (opsional `headerIcon`) dan tubuh/footer dengan slot. Status terbuka adalah `defineModel("isVisible")`. |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Modal konfirmasi/batal dengan dua tombol. Tipe konfirmasi dapat dikonfigurasi (`type`) (keparahan) dan `icon`; mengeluarkan `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Modal pra-dibangun "Apakah Anda yakin ingin menghapus item ini?" dengan tombol konfirmasi yang ditata sebagai bahaya.              |

### Editor dan Konten Kaya

| Komponen             | Melibatkan                                       | Tujuan                                                                                                                                                              |
|----------------------|-------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (melalui `components/Editor` proyek)    | Editor teks kaya dengan `FloatLabel`, pelacakan status fokus/kosong, dan integrasi dengan konteks kursus saat ini (`cidReq`). Gunakan ini untuk setiap bidang HTML yang dibuat pengguna. |

---
### Pembantu

| Berkas               | Tujuan                                                                                                                                                                                                                                                          |
|----------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js`    | Memetakan nama ikon semantik (`edit`, `delete`, `eye-on`, `courses`, …) ke kelas CSS MDI. Sekitar 127 entri. Jelajahi di `/admin/list-icons` pada instansi yang sedang berjalan.                                                                 |
| `validators.js`      | Validator properti bersama: `iconValidator` (harus merupakan nama ikon yang dikenal di Chamilo), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (tipe yang diizinkan dari `BaseButton`). Impor ini saat mendefinisikan komponen `Base*` baru yang mengikuti konvensi ini. |

### Konvensi pada Komponen Base

* **v-model melalui `defineModel()`** — nilai (dan sering kali `isVisible`, `filters`, `selectedItems`) diekspos sebagai model; gunakan `v-model[:name]` alih-alih `:prop` + `@update:prop`.
* **Label Mengambang** — sebagian besar bidang formulir membungkus input mereka dalam PrimeVue `FloatLabel variant="on"`. Sediakan `label` (teks yang ditampilkan) dan `id` (digunakan untuk mengikat `<label for>`).
* **Pesan Validasi** — bidang mengekspos `isInvalid` dan pesan kecil di bawah input (`errorText`, `messageText`, atau `smallText`, tergantung pada komponen). Varian yang kompatibel dengan Vuelidate tersedia untuk yang paling umum.
* **Ikon** — gunakan nama semantik Chamilo, bukan kelas MDI mentah. Komponen menyelesaikannya melalui `chamiloIconToClass`.
* **Pengukuran** — `size="normal" | "small" | "large"` adalah properti pengukuran konvensional (lihat `sizeValidator`).
* **Komposisi daripada Duplikasi** — `BaseDialogDelete` membungkus `BaseDialogConfirmCancel`, yang membungkus `BaseDialog`; `BaseToggleButton` dan `BaseAdvancedSettingsButton` membungkus `BaseButton`. Ketika Anda membutuhkan varian berulang dari komponen yang ada, lebih baik mengkomposisi `Base*` baru di atasnya daripada mengimplementasikannya ulang di folder fungsionalitas.

## Komponen Tata Letak

Terletak di `components/layout/`:

| Komponen | Tujuan |
|-----------|------------|
| `DashboardLayout.vue` | Tata letak utama: bilah atas + bilah samping + area konten |
| `Sidebar.vue` | Panel navigasi kiri (dapat dilipat) |
| `TopbarLoggedIn.vue` | Bilah atas dengan logo, kotak masuk, avatar |

---
## Komponen Area Fungsionalitas

| Direktori | Komponen | Tujuan |
|-----------|-----------|---------|
| `course/` | Kartu kursus, filter katalog, formulir kursus | Daftar dan pengelolaan kursus |
| `session/` | Kartu sesi, katalog | Daftar sesi |
| `assignments/` | Daftar pengumpulan, modal penilaian, formulir | Alur kerja tugas |
| `chat/` | DockedChat, pesan obrolan | Obrolan waktu nyata dan tutor AI |
| `filemanager/` | CourseDocuments, PersonalFiles | Penjelajah dan pengelolaan berkas |
| `installer/` | Step1-Step7, EmailSettings | Asisten instalasi |
| `social/` | GroupInfoCard, posting sosial | Fitur jejaring sosial |
| `attendance/` | AttendanceTable | Pelacakan kehadiran |
| `usergroup/` | GroupMembers | Pengelolaan grup pengguna |

## Sistem Ikon

Ikon menggunakan **Material Design Icons (MDI)** sebagai satu-satunya pustaka ikon: `<i class="mdi mdi-pencil"></i>`

Berkas `ChamiloIcons.js` menyediakan pemetaan semantik:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Komponen menggunakan `BaseIcon` atau merujuk ke `chamiloIconToClass` untuk merender ikon secara konsisten.

Referensi yang dapat dijelajahi dari semua ikon yang tersedia di platform dapat ditemukan di `/admin/list-icons` pada instansi Chamilo yang sedang berjalan.

## Standar Komponen

* **Composition API** — Komponen menggunakan sintaks `<script setup>` dari Vue 3
* **Integrasi dengan PrimeVue** — Penggunaan intensif komponen PrimeVue (Button, DataTable, Dialog, Menu, dll.)
* **Axios untuk Panggilan API** — Permintaan HTTP ke API backend
* **Vue I18n** — Semua teks yang ditujukan untuk pengguna menggunakan kunci terjemahan