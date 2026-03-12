# 📋 DOKUMENTASI FITUR MANAGE PROJECT

## 🎯 Ringkasan
Fitur ini memungkinkan admin untuk menambahkan, mengedit, dan menghapus project dari dashboard admin dengan desain yang sesuai dengan tema PvZ (Plants vs Zombies).

---

## 📁 File yang Dibuat/Dimodifikasi

### 1. **Models** (app/Models/Project.php)
- Model Eloquent untuk tabel `projects`
- Fillable properties: title, description, tags, link, image
- Tags di-cast sebagai array (JSON)

### 2. **Migrations** (database/migrations/2026_03_12_000000_create_projects_table.php)
- Membuat tabel `projects` dengan field:
  - `id` (Primary Key)
  - `title` (String)
  - `description` (Text)
  - `tags` (JSON)
  - `link` (String - Opsional)
  - `image` (String - Path ke file gambar)
  - `timestamps` (created_at, updated_at)

### 3. **Controllers** (app/Http/Controllers/ProjectController.php)
Fungsi-fungsi utama:
- `index()` - Menampilkan semua project
- `create()` - Tampilkan form tambah project
- `store()` - Simpan project baru
- `edit()` - Tampilkan form edit project
- `update()` - Update project
- `destroy()` - Hapus project

### 4. **Views** (resources/views/admin/)

#### a. **project-create.blade.php**
- Form untuk menambah project baru
- Fields: Title, Description, Tags, Link, Image
- Validation feedback
- Desain sesuai tema PvZ

#### b. **project-edit.blade.php**
- Form untuk edit project
- Menampilkan preview gambar saat ini
- Options untuk update gambar atau biarkan kosong
- Desain consistent dengan create form

#### c. **project-delete.blade.php**
- Modal konfirmasi hapus
- Menampilkan preview project yang akan dihapus
- Warning - aksi tidak bisa dibatalkan

#### d. **dashboard.blade.php** (Updated)
- Menampilkan daftar project dalam tabel
- Tombol: Tambah, Edit, Hapus
- Status message success/error
- Organized dengan sections

#### e. **project.blade.php** (Updated)
- Menampilkan semua project dari database
- Menampilkan gambar, judul, deskripsi
- Tags sebagai badges
- Link ke project (jika ada)

### 5. **Routes** (routes/web.php)
```php
Route::get('/project', [ProjectController::class, 'index']);           // GET all projects
Route::get('/project/create', [ProjectController::class, 'create']);   // SHOW create form
Route::post('/project', [ProjectController::class, 'store']);          // STORE project
Route::get('/project/{id}/edit', [ProjectController::class, 'edit']);  // SHOW edit form
Route::put('/project/{id}', [ProjectController::class, 'update']);     // UPDATE project
Route::delete('/project/{id}', [ProjectController::class, 'destroy']); // DELETE project
```

---

## 🚀 Cara Menggunakan

### 1. **Jalankan Migration**
```bash
php artisan migrate
```

### 2. **Login ke Dashboard Admin**
- Buka `/` dan login
- Akan diarahkan ke `/dashboard`

### 3. **Menambah Project**
- Klik tombol "➕ Tambah Project Baru"
- Isi form dengan detail project
- Upload gambar (opsional)
- Klik "✅ Simpan Project"

### 4. **Mengedit Project**
- Di dashboard, klik "✏️ Edit" pada project
- Ubah data yang diperlukan
- Klik "✅ Update Project"

### 5. **Menghapus Project**
- Di dashboard, klik "🗑️ Hapus" pada project
- Konfirmasi penghapusan
- Project akan terhapus beserta gambarnya

### 6. **Melihat Projects**
- Publik bisa melihat di `/project`
- Projects ditampilkan dalam grid card
- Sesuai tema PvZ

---

## 🎨 Fitur Desain

### Tema PvZ yang Diterapkan:
1. ✅ **Warna**: Hijau rumput (--bg), Kuning Sunflower (--primary), Oranye/Merah (--accent)
2. ✅ **Font**: Luckiest Guy & Bangers untuk heading
3. ✅ **Layout**: Grid card dengan shadow & border tebal
4. ✅ **Animation**: Hover scale & rotation
5. ✅ **Button**: Style PvZ dengan box-shadow 3D effect
6. ✅ **Dark Mode**: Support tema zombie night
7. ✅ **Icons**: Emoji untuk visual appeal

---

## 📝 Validasi

### Create/Update:
- `title` (required, max 255 char)
- `description` (required)
- `tags` (required, format: comma-separated)
- `link` (optional, must be valid URL)
- `image` (optional, jpeg/png/jpg/gif, max 2MB)

### Delete:
- Hanya user yang login bisa delete
- Gambar akan otomatis dihapus dari server

---

## 🔐 Security

- ✅ Semua aksi project memerlukan authentication
- ✅ Session check (`session('login')`)
- ✅ CSRF protection dengan `@csrf`
- ✅ Validation pada server side
- ✅ File upload validation

---

## 💡 Tips

1. **Format Tags**: Gunakan comma-separated, misal: `Laravel, Vue.js, MySQL`
2. **Ukuran Gambar**: Optimal 800x600px, max 2MB
3. **URL Project**: Jika ada demo, sertakan link lengkap
4. **Mobile Responsive**: Form sudah responsive di semua ukuran

---

## 🐛 Troubleshooting

### Migration Error?
```bash
php artisan migrate:refresh
```

### Gambar Tidak Muncul?
- Pastikan folder `public/img` ada
- Jalankan `php artisan storage:link` jika menggunakan storage

### Session Expired?
- Login ulang di `/`

---

## 📞 Support
Jika ada pertanyaan atau error, periksa:
1. File uploads di `public/img`
2. Database connection di `.env`
3. Storage permissions
4. Session configuration

