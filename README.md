# Sistem Manajemen Inventaris & Penjualan - Lurrr Chicken

Sistem berbasis web yang dirancang untuk mengelola stok bahan baku, transaksi penjualan, dan pelaporan untuk tiga level pengguna: Admin, Owner, dan Petugas Gudang.

## Fitur Utama

- **Dashboard Real-time**: Ringkasan statistik untuk masing-masing role.
- **Monitoring Stok**: Notifikasi otomatis untuk stok yang menipis atau habis.
- **Manajemen Pengguna**: Pengaturan hak akses (Admin, Owner, Gudang).
- **Update Stok**: Pencatatan arus masuk dan keluar bahan baku secara presisi.
- **Pemesanan Bahan**: Sistem pengajuan pesanan bahan ke supplier.
- **Laporan Lengkap**: Laporan penjualan dan stok yang dapat dicetak.
- **Keamanan**: Sistem login terproteksi dengan enkripsi password.

## Persyaratan Sistem

- PHP >= 8.1
- MySQL / MariaDB
- Composer
- Web Server (Apache/Nginx) atau menggunakan fitur bawaan PHP

## Langkah Instalasi

1.  **Ekstrak Project**
    Ekstrak file project ke direktori web server Anda (misal: `htdocs` atau `/var/www/html`).

2.  **Install Dependensi**
    Buka terminal di folder project dan jalankan:
    ```bash
    composer install
    ```

3.  **Konfigurasi Environment**
    Salin file `.env.example` menjadi `.env`:
    ```bash
    cp .env.example .env
    ```
    Buka file `.env` dan sesuaikan konfigurasi database Anda:
    ```env
    database.default.hostname = localhost
    database.default.database = nama_db_anda
    database.default.username = root
    database.default.password = password_db_anda
    ```

4.  **Persiapan Database**
    - Buat database baru di MySQL dengan nama yang sesuai di `.env`.
    - Impor file `skripsi.sql` yang tersedia di root folder ke database tersebut.
    - *Atau*, jalankan migrasi via terminal:
      ```bash
      php spark migrate
      php spark db:seed OwnerSeeder
      ```

5.  **Menjalankan Aplikasi**
    Jalankan perintah berikut:
    ```bash
    php spark serve
    ```
    Akses melalui browser di: `http://localhost:8080`

## Akun Akses Default

| Peran | Username | Password |
| :--- | :--- | :--- |
| **Admin** | `admin` | `admin123` |
| **Owner** | `owner` | `owner123` |
| **Gudang** | `gudang` | `gudang123` |

## Catatan Penting
Pastikan folder `writable` memiliki izin akses tulis (chmod 777) agar sistem dapat menyimpan log dan cache dengan benar.
