# Manajemen State

Chamilo menggunakan dua pustaka manajemen state secara berdampingan:

* **Pinia** — standar saat ini untuk semua store baru. Sebagian besar basis kode menggunakan Pinia.
* **Vuex** — store warisan, masih ada dan digunakan oleh tampilan yang lebih lama. Kode baru harus menggunakan Pinia.

## Store Pinia

Store Pinia berada langsung di `assets/vue/store/`:

| File store | Composable | Tujuan |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | Pengguna terautentikasi, login/logout, pemeriksaan sesi |
| `cidReq.js` | `useCidReqStore` | Konteks kursus/sesi saat ini (ID kursus, ID sesi) |
| `courseSettingStore.js` | `useCourseSettings` | Cache pengaturan tingkat kursus |
| `enrolledStore.js` | `useEnrolledStore` | Data pendaftaran pengguna |
| `platformConfig.js` | `usePlatformConfig` | Konfigurasi platform, plugin, tema, penyedia OAuth2 |
| `messageRelUserStore.js` | `useMessageRelUserStore` | State perpesanan |
| `socialStore.js` | `useSocialStore` | State jejaring sosial |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### CID Request Store

Melacak konteks kursus/sesi saat ini — diperlukan untuk setiap operasi API yang tercakup pada kursus:

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

Meng-cache pengaturan tingkat kursus untuk menghindari panggilan API berulang:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

Menyimpan konfigurasi seluruh platform yang diambil dari `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Store Vuex (Warisan)

Store Vuex didefinisikan di `assets/vue/store/index.js` dan berisi:

| Modul | Tujuan |
|--------|---------|
| `modules/crud.js` | Factory (`makeCrudModule`) yang menghasilkan modul Vuex CRUD lengkap untuk suatu layanan — digunakan oleh tampilan daftar/buat/perbarui yang lebih lama |
| `modules/notifications.js` | State notifikasi toast (tampilkan, warna, teks, timeout) |
| `modules/ux.js` | State UX (pesan akses terlarang) |
| `security.js` | Modul keamanan Vuex warisan (digantikan oleh `securityStore.js`) |

Hindari menambahkan modul Vuex baru. Gunakan Pinia untuk setiap state baru.

## Composable

Selain store, `assets/vue/composables/` berisi fungsi komposisi bersama. Contoh yang menonjol:

| File | Tujuan |
|------|---------|
| `useFileManager.js` | State dan operasi peramban berkas |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Pengkabelan menu bilah atas |
| `useTopbarTour.js` | Tur terpandu untuk bilah atas |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Pembantu alat dokumen |
| `useCertificateTags.js` | Pembantu tag templat sertifikat |
| `sidebarMenu.js` | Pohon navigasi bilah sisi |
| `theme.js` | Pemuatan dan pergantian tema |
| `pluginRegion.js` | Rendering wilayah UI yang disuntikkan plugin |
| `userPermissions.js` | Pemeriksaan izin untuk pengguna saat ini |
| `notification.js` | Pembantu notifikasi push |
| `locale.js` | Deteksi dan pergantian locale |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Pola CRUD datatable yang dapat digunakan ulang |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Pembantu jejaring sosial |
| `usePushSubscription.js` | Manajemen langganan Web Push |
| `upload.js` | Pembantu unggah berkas |
| `useConfirmation.js` | Pembantu dialog konfirmasi |

Composable juga diorganisasi ke dalam subdirektori fitur (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, dll.). Daftar lengkapnya ada di `assets/vue/composables/`.