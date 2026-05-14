# Manajemen Status

Chamilo menggunakan dua pustaka manajemen status secara berdampingan:

- **Pinia** — standar saat ini untuk semua store baru. Sebagian besar basis kode menggunakan Pinia.
- **Vuex** — store lama, masih ada dan digunakan oleh tampilan yang lebih lama. Kode baru harus menggunakan Pinia.

## Store Pinia

Store Pinia terletak langsung di `assets/vue/store/`:

| File Store | Composable | Tujuan |
|------------|------------|--------|
| `securityStore.js` | `useSecurityStore` | Pengguna yang terautentikasi, login/logout, verifikasi sesi |
| `cidReq.js` | `useCidReqStore` | Konteks kursus/sesi saat ini (ID kursus, ID sesi) |
| `courseSettingStore.js` | `useCourseSettings` | Cache pengaturan di tingkat kursus |
| `enrolledStore.js` | `useEnrolledStore` | Data pendaftaran pengguna |
| `platformConfig.js` | `usePlatformConfig` | Konfigurasi platform, plugin, tema, penyedia OAuth2 |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Status pesan |
| `socialStore.js` | `useSocialStore` | Status jejaring sosial |

### Store Keamanan

```javascript
const securityStore = useSecurityStore()

// Memeriksa apakah pengguna sudah login
if (securityStore.isAuthenticated) { ... }

// Mengakses objek pengguna saat ini
const user = securityStore.user
```

### Store Permintaan CID

Melacak konteks kursus/sesi saat ini — diperlukan untuk setiap operasi API dalam lingkup kursus:

```javascript
const cidReqStore = useCidReqStore()

// Objek kursus dan sesi saat ini
const course = cidReqStore.course
const session = cidReqStore.session
```

### Store Pengaturan Kursus

Menyimpan cache pengaturan di tingkat kursus untuk menghindari panggilan API berulang:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Store Konfigurasi Platform

Berisi konfigurasi umum platform yang diperoleh dari `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Array pengaturan yang dimuat, tema aktif, plugin yang diaktifkan, penyedia OAuth2
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Store Vuex (Warisan)

Store Vuex didefinisikan di `assets/vue/store/index.js` dan berisi:

| Modul | Tujuan |
|-------|--------|
| `modules/crud.js` | Pabrik (`makeCrudModule`) yang menghasilkan modul Vuex CRUD lengkap untuk layanan tertentu — digunakan oleh tampilan lama untuk daftar/pembuatan/pembaruan |
| `modules/notifications.js` | Status notifikasi toast (tampilan, warna, teks, batas waktu) |
| `modules/ux.js` | Status UX (pesan akses dilarang) |
| `security.js` | Modul keamanan Vuex lama (digantikan oleh `securityStore.js`) |

Hindari menambahkan modul Vuex baru. Gunakan Pinia untuk status baru apa pun.

## Composable

Selain store, `assets/vue/composables/` berisi fungsi komposisi yang dibagikan. Contoh yang menonjol:

| File | Tujuan |
|------|--------|
| `useFileManager.js` | Status dan operasi penjelajah berkas |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Koneksi menu bilah atas |
| `useTopbarTour.js` | Tur panduan untuk bilah atas |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Pembantu alat dokumen |
| `useCertificateTags.js` | Pembantu tag templat sertifikat |
| `sidebarMenu.js` | Pohon navigasi bilah samping |
| `theme.js` | Pemuatan dan pergantian tema |
| `pluginRegion.js` | Rendering wilayah UI yang disuntikkan oleh plugin |
| `userPermissions.js` | Pemeriksaan izin untuk pengguna saat ini |
| `notification.js` | Pembantu notifikasi push |
| `locale.js` | Deteksi dan pergantian lokalitas |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Pola CRUD yang dapat digunakan kembali untuk datatable |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Pembantu jejaring sosial |
| `usePushSubscription.js` | Manajemen langganan Web Push |
| `upload.js` | Pembantu unggah berkas |
| `useConfirmation.js` | Pembantu dialog konfirmasi |

Composable juga diorganisasi dalam subdirektori fungsionalitas (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, dll.). Daftar lengkapnya ada di `assets/vue/composables/`.