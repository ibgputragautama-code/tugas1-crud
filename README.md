
# Aplikasi CRUD Produk (PHP OOP + PDO)

## Deskripsi
Aplikasi ini adalah implementasi CRUD sederhana untuk entitas **Produk** menggunakan PHP OOP dan PDO. Fitur:
- Tambah produk (Create)
- Tampilkan daftar produk (Read)
- Edit produk (Update)
- Hapus produk (Delete)
- Upload gambar produk
- Flash message dan prefill form

## Cara Menjalankan
1. Import database:
```bash
mysql -u root -p < schema.sql
```
2. jalankan server PHP :
```bash
php -S localhost:8000
```
3. Akses :
```bash
http://localhost:8000/index.php
```
## Struktur Folder
class/      # Kelas PHP
inc/        # Konfigurasi
css/        # Style
uploads/    # Upload gambar


