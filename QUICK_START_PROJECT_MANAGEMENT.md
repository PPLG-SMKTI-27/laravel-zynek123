#!/bin/bash
# QUICK START GUIDE - PROJECT MANAGEMENT SYSTEM

## 🚀 LANGKAH-LANGKAH QUICK START

### 1️⃣ SETUP DATABASE
Migration sudah dijalankan. Tabel `projects` sudah ada di database.

### 2️⃣ TESTING FITUR

#### A. Login ke Admin
- URL: http://localhost/your-project/
- Login dengan email & password Anda
- Akan redirect ke /dashboard

#### B. Menambah Project
1. Di dashboard, klik **"➕ Tambah Project Baru"**
2. Isi form:
   - **Title**: Website Portfolio
   - **Description**: Website portfolio pribadi dengan Laravel & CSS
   - **Tags**: Laravel, CSS, JavaScript (pisahkan dengan koma)
   - **Link**: https://example.com (opsional)
   - **Image**: upload gambar (opsional, max 2MB)
3. Klik **"✅ Simpan Project"**

#### C. Mengedit Project
1. Di dashboard, klik **"✏️ Edit"** pada project
2. Ubah data yang ingin diubah
3. Klik **"✅ Update Project"**

#### D. Menghapus Project
1. Di dashboard, klik **"🗑️ Hapus"** pada project
2. Confirm dengan klik **"🗑️ HAPUS!"**
3. Project dan gambarnya terhapus

#### E. Lihat Project Publik
- URL: http://localhost/your-project/project
- Semua projects ditampilkan dengan grid cards
- Bisa lihat gambar, title, description, tags, dan link

---

## 📋 FILE YANG DIBUAT

```
app/
  Models/
    └─ Project.php                          [✅ NEW] Model

database/
  migrations/
    └─ 2026_03_12_000000_create_projects_table.php  [✅ NEW] Migration

app/Http/Controllers/
  └─ ProjectController.php                 [✏️ UPDATED] Controller

resources/views/
  admin/
    ├─ project-create.blade.php            [✅ NEW] Form Tambah
    ├─ project-edit.blade.php              [✅ NEW] Form Edit
    ├─ project-delete.blade.php            [✅ NEW] Confirm Hapus
    └─ dashboard.blade.php                 [✏️ UPDATED] Dashboard
  └─ project.blade.php                     [✏️ UPDATED] Project List

routes/
  └─ web.php                               [✏️ UPDATED] Routes
```

---

## 🔗 ROUTES REFERENCE

```
GET  /project              → Lihat semua project (Public)
GET  /project/create       → Form tambah project (Admin)
POST /project              → Simpan project (Admin)
GET  /project/{id}/edit    → Form edit project (Admin)
PUT  /project/{id}         → Update project (Admin)
DELETE /project/{id}       → Hapus project (Admin)
GET  /dashboard            → Dashboard admin
```

---

## 🎨 THEME & STYLING

Project sudah menggunakan tema **PvZ (Plants vs Zombies)**:

### 🎨 Color Palette:
- `--bg`: #4da528 (Hijau Rumput)
- `--primary`: #ffd800 (Kuning Sunflower)
- `--accent`: #ff5722 (Oranye/Merah)
- `--card`: #8d6e63 (Cokelat Kayu)

### 📝 Fonts:
- "Luckiest Guy" - untuk heading besar
- "Bangers" - untuk sub-heading
- "Montserrat" - untuk body text

### ✨ Effects:
- Border tebal 6px (khas PvZ)
- Shadow 3D dengan offset
- Hover: scale + rotate effect
- Button: 3D click effect

---

## ❓ TROUBLESHOOTING

### Error: "Login dulu!"
- Pastikan sudah login di /
- Check session di browser

### Gambar tidak muncul
- Pastikan folder `public/img/` ada
- Check file permissions

### Database error
- Run: `php artisan migrate`
- Check `.env` database config

### Form validation error
- Follow format yang diminta
- Cek ukuran gambar max 2MB

---

## 💾 BACKUPS & MAINTENANCE

### Backup Database:
```bash
# Export database
mysqldump -u root -p database_name > backup.sql

# Import database
mysql -u root -p database_name < backup.sql
```

### Clear Cache:
```bash
php artisan cache:clear
php artisan config:clear
```

### Optimize:
```bash
php artisan optimize
```

---

## 📞 COMMON ISSUES & SOLUTIONS

| Masalah | Solusi |
|---------|--------|
| PHP not found | Gunakan path lengkap PHP dari Laragon |
| Migration failed | Check database connection di `.env` |
| Image upload fails | Verify `public/img/` folder exists & writable |
| Routes not working | Run `php artisan route:cache` |
| Session issues | Check `config/session.php` |

---

## 🎓 NEXT STEPS

1. ✅ Test semua fitur (create, edit, delete)
2. ✅ Tambahkan sample projects
3. ✅ Customize styling jika diperlukan
4. ✅ Setup backup regular
5. ✅ Monitor file uploads

---

**Ready to go! 🚀**

