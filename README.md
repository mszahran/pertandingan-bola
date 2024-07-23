# Panduan Penggunaan Proyek Laravel

Proyek ini adalah sebuah aplikasi web yang dibangun menggunakan framework Laravel.

## Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/mszahran/pertandingan-bola.git
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

3. **Set Up Environment**
    - Duplikat file `.env.example` menjadi `.env`.
    - Sesuaikan pengaturan database dalam file `.env`.

4. **Jalankan Migrasi dan Seeder**
   Untuk membuat tabel-tabel database dan mengisi data awal, jalankan perintah berikut:
   ```bash
   php artisan migrate --seed
   ```

## Menjalankan Aplikasi

Setelah selesai melakukan instalasi dan migrasi, jalankan server Laravel untuk menjalankan aplikasi:

```bash
php artisan serve
```

Akses aplikasi melalui browser dengan alamat [http://localhost:8000](http://localhost:8000).

## Struktur Direktori

- `app/` : Direktori utama kode aplikasi.
- `config/` : Konfigurasi aplikasi dan pengaturan lainnya.
- `database/` : Migrasi database dan seeder.
- `public/` : Direktori publik untuk file-file seperti CSS, JavaScript, dan gambar.
- `resources/` : Template Blade, file CSS dan JavaScript.
- `routes/` : Definisi rute aplikasi.
- `tests/` : Unit test dan test fitur.

## Konfigurasi Koneksi Database

Untuk menghubungkan proyek Laravel Anda dengan database, pastikan untuk mengatur file `.env` dengan konfigurasi berikut:

```dotenv
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=pertandingan_bola
DB_USERNAME=postgres
DB_PASSWORD=root
```

## Kontribusi

Silakan ajukan *pull request* jika Anda ingin berkontribusi pada proyek ini.

## Lisensi

Proyek ini dilisensikan di bawah lisensi [MIT License](https://opensource.org/licenses/MIT).
