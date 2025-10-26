# 🎬 Sistem Koleksi Film
Aplikasi CRUD sederhana berbasis PHP & MySQLi untuk mengelola data koleksi film, dibuat sebagai tugas mata kuliah **Pemrograman Web**.

---

## 📖 Deskripsi
Aplikasi ini digunakan oleh seorang kolektor film untuk mencatat koleksi film pribadinya.  
Fitur yang disediakan:
- Menambah data film baru (Create)
- Melihat daftar film (Read)
- Mengubah data film (Update)
- Menghapus data film (Delete)

Aplikasi menggunakan:
- **PHP (MySQLi)** untuk logika backend  
- **Bootstrap 5** untuk tampilan frontend  
- **MySQL** sebagai sistem basis data  

---

## ⚙️ Persyaratan Sistem
- XAMPP / Laragon / WAMP (dengan PHP ≥ 7.4)
- MySQL / MariaDB
- Web browser modern (Chrome, Edge, Firefox)

---

## 🗄️ Setup Database

1. Buka **phpMyAdmin**
2. Buat database baru bernama:
   ```sql
   CREATE DATABASE db_film;
   ```
3. Buat tabel:
   ```sql
   CREATE TABLE film (
     id INT AUTO_INCREMENT PRIMARY KEY,
     judul VARCHAR(100),
     genre VARCHAR(50),
     sutradara VARCHAR(100),
     tahun INT
   );
   ```
4. (Opsional) Tambahkan data dummy:
   ```sql
   INSERT INTO film (judul, genre, sutradara, tahun) VALUES
   ('The Last Horizon', 'Action', 'Michael Reeves', 2020),
   ('Love in Autumn', 'Romance', 'Sofia Laurent', 2018),
   ('Midnight Terror', 'Horror', 'James Hollow', 2019);
   ```

---

## 🧩 Struktur Folder
```
project/
│
├── connection.php       # Koneksi ke database
├── index.php            # Menampilkan daftar film (Read)
├── tambah.php           # Form tambah data film (Create form)
├── create.php           # Proses simpan data baru (Create action)
├── edit.php             # Form edit data film (Update form)
├── update.php           # Proses update data film (Update action)
├── delete.php           # Hapus data film (Delete action)
│
└── assets/
    ├── css/
    │   └── bootstrap.min.css
    └── js/
        └── bootstrap.bundle.min.js
```

---

## 🚀 Cara Menjalankan Aplikasi
1. Pindahkan folder project ini ke:
   ```
   C:\xampp\htdocs\
   ```
2. Jalankan **XAMPP Control Panel**, aktifkan **Apache** dan **MySQL**.
3. Buka browser, akses:
   ```
   http://localhost/nama_folder_project/
   ```
4. Aplikasi siap digunakan 🎉

---

## 🧠 Fitur Utama
| Fitur | File | Deskripsi |
|-------|------|------------|
| 🔍 Read | `index.php` | Menampilkan daftar semua film |
| ➕ Create | `tambah.php`, `create.php` | Menambah film baru |
| ✏️ Update | `edit.php`, `update.php` | Mengedit data film |
| 🗑️ Delete | `delete.php` | Menghapus data film |
| ⚡ Bonus | JS Confirm | Konfirmasi hapus sebelum eksekusi |
| 🔃 Sort | Header tabel | Klik header untuk `ORDER BY` dinamis |

---

## 🧱 Fitur Tambahan (Opsional)
- Scrollable table view (dengan `overflow-y: auto`)
- Sorting data lewat header tabel (`ORDER BY`)
- Konfirmasi hapus dengan `confirm()`
- Alert + redirect setelah aksi sukses/gagal

---

## 👨‍💻 Pengembang
**Nama:** Indra Prihambada  
**Peran:** Junior Web Developer (Mahasiswa)  
**Mata Kuliah:** Pemrograman Web  
**Dosen Pengampu:** (isi nama dosenmu di sini)

---

## 📄 Lisensi
Proyek ini dibuat untuk tujuan pembelajaran.  
Bebas digunakan dan dimodifikasi untuk kepentingan akademik.
