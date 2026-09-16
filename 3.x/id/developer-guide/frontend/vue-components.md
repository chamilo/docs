# Komponen Vue

Chamilo memiliki kumpulan komponen Vue yang besar, diorganisasi berdasarkan area fitur di `assets/vue/components/`.

## Komponen Dasar

Keluarga `Base*` di `assets/vue/components/basecomponents/` membungkus primitif PrimeVue dengan default khusus Chamilo (tata letak FloatLabel, ikon MDI melalui `chamiloIconToClass`, pesan validasi yang konsisten, ukuran Tailwind). Selalu gunakan komponen `Base*` sebelum mengimpor primitif PrimeVue yang mendasarinya — itulah cara UI tetap konsisten di seluruh SPA dan bagaimana perubahan desain dapat diterapkan dari satu tempat.

Komponen **tidak** didaftarkan secara global (satu-satunya primitif PrimeVue yang didaftarkan secara global adalah `Column`, yang digunakan di dalam `BaseTable`). Impor setiap komponen secara eksplisit:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### Input formulir

Sebagian besar menerima nilai melalui `v-model`, mengekspos prop `id` + `label` untuk aksesibilitas/pengikatan floating-label, dan menampilkan validasi melalui pasangan `isInvalid` / `errorText` (atau `messageText`).

| Komponen                         | Membungkus                                           | Tujuan                                                                                                                                                                                             |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Input teks satu baris. Beralih ke label statis untuk input `date`/`time`/`datetime-local` (di mana floating label akan tumpang tindih dengan placeholder native).                                  |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Adapter Vuelidate tipis: meneruskan `$error` ke `isInvalid` dan merender `$errors[].$message` di slot `errors`. Pasangkan dengan objek field Vuelidate.                                            |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Input teks multi-baris.                                                                                                                                                                            |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | Pola adapter Vuelidate yang sama seperti `BaseInputTextWithVuelidate`.                                                                                                                             |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Input numerik dengan `min` / `max` / `step` dan tombol spinner.                                                                                                                                    |
| `BaseInputTags.vue`              | (kustom)                                             | Chip tag teks bebas; tag ditambahkan pada enter/koma dan dihapus pada backspace.                                                                                                                   |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Input teks dipasangkan dengan tombol aksi (gaya pencarian).                                                                                                                                        |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Checkbox biner atau terikat nilai dengan label.                                                                                                                                                    |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Grup tombol radio yang didorong oleh array `options: [{label, value}]`.                                                                                                                            |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Tombol dua keadaan (label dan ikon on / off) terikat melalui `v-model`.                                                                                                                            |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Pemilih tanggal / tanggal-waktu. Menghormati `platform.timepicker_increment` dan locale pengguna melalui `calendarLocales`.                                                                        |
| `BaseColorPicker.vue`            | native `<input type="color">` + `InputText`          | Pemilih warna dengan cadangan teks hex; menggunakan `colorjs.io` untuk memvalidasi input hex manual.                                                                                               |
| `BaseRating.vue`                 | `Rating`                                             | Input penilaian bintang.                                                                                                                                                                           |
| `BaseFileUpload.vue`             | native `<input type="file">` + `BaseButton`          | Pemilih berkas tunggal yang memicu tombol bergaya lampiran.                                                                                                                                        |
| `BaseFileUploadMultiple.vue`     | native `<input type="file" multiple>` + `BaseButton` | Varian multi-berkas dari `BaseFileUpload`.                                                                                                                                                         |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Pengunggah Uppy lengkap (webcam, audio, editor gambar, unggahan XHR) dengan locale terhubung ke `appLocale` saat ini. Gunakan ini untuk unggahan kaya dengan progres; gunakan `BaseFileUpload*` untuk lampiran sederhana. |

### Seleksi & autocomplete

| Komponen               | Membungkus                   | Tujuan                                                                                                                            |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | Dropdown pilihan tunggal dengan tombol hapus opsional.                                                                            |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | Dropdown pilihan ganda yang menampilkan item terpilih sebagai chip.                                                               |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | Dropdown pilihan tunggal dengan kotak pencarian bawaan, virtual scrolling opsional, dan templat opsi dua baris (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | Autocomplete asinkron (minimum 3 karakter). Mendukung seleksi tunggal atau ganda serta slot `chip` untuk menyesuaikan chip.       |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | Tabel pencarian pengguna terpaginasi dengan seleksi baris. Gunakan ketika suatu fitur membutuhkan pemilih pengguna bergaya admin. |

### Tombol & aksi

| Komponen                         | Membungkus          | Tujuan                                                                                                                                                                                                                                                                                                                                                      |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | Tombol standar Chamilo. Menyelesaikan ikon melalui `chamiloIconToClass`, menormalisasi `type` ke `severity`/`variant` PrimeVue, merender `BaseAppLink` internal ketika `route` atau `toUrl` diberikan (sehingga komponen yang sama menangani kasus router-link, anchor, dan tombol biasa). Nilai `type` yang diterima tercantum di `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | Tombol pengungkapan yang mengganti panel "pengaturan lanjutan" yang di-slot melalui `v-model`.                                                                                                                                                                                                                                                              |
| `BaseToolbar.vue`                | `Toolbar`           | Toolbar aksi dengan slot `start` / `end` (atau satu slot default). `showTopBorder` opsional untuk gaya pemisah.                                                                                                                                                                                                                                             |

### Tampilan & data

| Component            | Wraps                       | Purpose                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Tabel data standar Chamilo. Mendukung mode sisi server (`lazy`), pengurutan multi-kolom, filter global, pemilihan baris, dan paginasi. Teruskan kolom sebagai anak `<Column>` (terdaftar secara global). |
| `BaseCard.vue`       | `Card`                      | Pembungkus kartu yang meneruskan slot `header`, `title`, `subtitle`, `footer`, dan default (konten).                                                                                                |
| `BaseChart.vue`      | `Chart`                     | Preset diagram lingkaran. Teruskan objek `data` yang kompatibel dengan Chart.js.                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | Chip yang dirender dari objek `{value, labelField, imageField}`, dengan tombol hapus opsional.                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | Tag label berwarna. Memetakan `warning` Chamilo ke `warn` PrimeVue.                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | Baris avatar dengan penghitung overflow (mis. "+3"); dikendalikan oleh `useAvatarList`.                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | Avatar pengguna dengan cadangan gambar, status pemuatan, dan label yang aksesibel.                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Perender ikon Chamilo. Menambahkan lencana opsional (teks atau ikon), tooltip, dan pengubah ukuran. Selalu teruskan nama semantik Chamilo (mis. `"edit"`), bukan kelas MDI mentah.                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | Input pencarian dengan ikon kaca pembesar di depan.                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | Pembatas horizontal atau vertikal, dengan judul dan perataan opsional.                                                                                                                              |

### Navigasi & menu

| Component                  | Wraps                   | Purpose                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Menu popup yang memahami rute router di dalam item `model[]`.                                                                                                                       |
| `BaseDropdownMenu.vue`     | (custom)                | Pemicu dropdown ringan dengan koordinasi buka-tunggal (membuka satu menutup yang lain).                                                                                             |
| `BaseContextMenu.vue`      | (custom)                | Menu konteks klik kanan / diposisikan, dikendalikan oleh `visible` + `position`.                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Menu navigasi bergaya akordeon yang digunakan di bilah sisi; secara otomatis melacak kunci yang diperluas dari model.                                                                                             |
| `BaseRouteTabs.vue`        | `BaseAppLink` row       | Bilah tab di mana setiap tab adalah tautan router. Tab aktif disorot secara otomatis berdasarkan rute saat ini.                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *or* `<a>` | Tautan cerdas: merender `<a>` ketika `url` diatur (eksternal/warisan), jika tidak merender Vue Router `<RouterLink>`. Gunakan ini alih-alih salah satu primitif agar tautan internal/eksternal tetap seragam. |

### Dialog

`BaseDialog` adalah fondasi; komponen lain disusun di atasnya untuk alur konfirmasi/batal dan penghapusan yang umum.

| Komponen                      | Membungkus                | Tujuan                                                                                                                              |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Dialog modal dengan header berjudul (`headerIcon` opsional) serta body/footer berslot. Status terbuka adalah `defineModel("isVisible")`. |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Modal konfirmasi/batal dengan dua tombol. `type` konfirmasi (severity) dan `icon` dapat dikonfigurasi; mengemisikan `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Modal siap pakai "Apakah Anda yakin ingin menghapus item ini?" dengan tombol konfirmasi bergaya bahaya.                             |

### Editor & konten kaya

| Komponen             | Membungkus                                      | Tujuan                                                                                                                                                               |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via `components/Editor` proyek)        | Editor teks kaya dengan `FloatLabel`, pelacakan status fokus/kosong, dan integrasi dengan konteks kursus saat ini (`cidReq`). Gunakan untuk setiap field HTML yang ditulis pengguna. |

### Helper

| File              | Tujuan                                                                                                                                                                                                                                                           |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Memetakan nama ikon semantik (`edit`, `delete`, `eye-on`, `courses`, …) ke kelas CSS MDI. ~127 entri. Telusuri di `/admin/list-icons` pada instance yang sedang berjalan.                                                                                         |
| `validators.js`   | Validator prop bersama: `iconValidator` (harus nama ikon Chamilo yang dikenal), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (tipe `BaseButton` yang diizinkan). Impor saat mendefinisikan komponen `Base*` baru yang mengikuti konvensi ini. |

### Konvensi di seluruh komponen Base

* **v-model via `defineModel()`** — value (dan sering kali `isVisible`, `filters`, `selectedItems`) diekspos sebagai model; teruskan dengan `v-model[:name]` daripada `:prop` + `@update:prop`.
* **Label mengambang** — sebagian besar field formulir membungkus inputnya dalam PrimeVue `FloatLabel variant="on"`. Sediakan `label` (teks yang ditampilkan) dan `id` (digunakan untuk mengikat `<label for>`).
* **Pesan validasi** — field mengekspos `isInvalid` dan pesan kecil di bawah input (`errorText`, `messageText`, atau `smallText` tergantung komponen). Varian yang sadar Vuelidate tersedia untuk yang paling umum.
* **Ikon** — teruskan nama semantik Chamilo, bukan kelas MDI mentah. Komponen menyelesaikannya melalui `chamiloIconToClass`.
* **Ukuran** — `size="normal" | "small" | "large"` adalah prop ukuran konvensional (lihat `sizeValidator`).
* **Komposisi daripada duplikasi** — `BaseDialogDelete` membungkus `BaseDialogConfirmCancel`, yang membungkus `BaseDialog`; `BaseToggleButton` dan `BaseAdvancedSettingsButton` membungkus `BaseButton`. Ketika Anda membutuhkan varian berulang dari komponen yang sudah ada, lebih baik menyusun `Base*` baru di atasnya daripada mengimplementasikannya ulang di folder fitur.

## Komponen Tata Letak

Berada di `components/layout/`:

| Komponen | Tujuan |
|-----------|---------|
| `DashboardLayout.vue` | Tata letak utama: topbar + sidebar + area konten |
| `Sidebar.vue` | Panel navigasi kiri (dapat dilipat) |
| `TopbarLoggedIn.vue` | Bilah atas dengan logo, kotak masuk, avatar |

## Komponen Area Fitur

| Direktori | Komponen | Tujuan |
|-----------|-----------|---------|
| `course/` | Kartu kursus, filter katalog, formulir kursus | Daftar dan pengelolaan kursus |
| `session/` | Kartu sesi, katalog | Daftar sesi |
| `assignments/` | Daftar pengumpulan, modal penilaian, formulir | Alur kerja tugas |
| `chat/` | DockedChat, pesan obrolan | Obrolan waktu nyata dan tutor AI |
| `filemanager/` | CourseDocuments, PersonalFiles | Penjelajah dan pengelolaan berkas |
| `installer/` | Step1-Step7, EmailSettings | Wizard instalasi |
| `social/` | GroupInfoCard, unggahan sosial | Fitur jejaring sosial |
| `attendance/` | AttendanceTable | Pelacakan kehadiran |
| `usergroup/` | GroupMembers | Pengelolaan kelompok pengguna |

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

Komponen menggunakan `BaseIcon` atau merujuk `chamiloIconToClass` untuk merender ikon secara konsisten.

Referensi yang dapat dijelajahi untuk semua ikon yang tersedia di platform dapat ditemukan di `/admin/list-icons` pada setiap instans Chamilo yang sedang berjalan.

## Pola Komponen

* **Composition API** — Komponen menggunakan sintaks `<script setup>` Vue 3
* **Integrasi PrimeVue** — Penggunaan intensif komponen PrimeVue (Button, DataTable, Dialog, Menu, dll.)
* **Axios untuk panggilan API** — Permintaan HTTP ke API backend
* **Vue I18n** — Semua teks yang dihadapi pengguna menggunakan kunci terjemahan