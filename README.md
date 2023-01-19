<h1 align="center">Selamat datang di repository E-Inventory !!!!
</h1>

![screely-1673915818668](https://user-images.githubusercontent.com/59213454/212785383-124795d2-672b-40a0-b408-f1f39f01f394.png)

<p></p>

<h4 align="center">Website penyimpan data barang yang dibuat dengan <a href="https://laravel.com/" target="_blank">Laravel</a>.
</h4>

<p></p>

<p align="center">
	<img src="https://img.shields.io/github/issues/faiznurullah/E-Inventory-laravel?style=flat-square">
	<img src="https://img.shields.io/github/stars/faiznurullah/E-Inventory-laravel?style=flat-square"> 
	<img src="https://img.shields.io/github/forks/faiznurullah/E-Inventory-laravel?style=flat-square">
	<img src="https://img.shields.io/github/license/faiznurullah/E-Inventory-laravel?style=flat-square">
	<img src="https://img.shields.io/badge/maintained%3F-no-red.svg?style=flat-square">
	<img src="https://img.shields.io/github/followers/faiznurullah.svg?style=flat-square&label=followers">
</p>

<p align="center">
  <a href="#fitur">Fitur</a> •
  <a href="#download">Download & Install</a> •
  <a href="#lisensi">Lisensi</a>
</p>

<p></p>


<p></p>

<h2 id="fitur">✨ Fitur Tersedia</h2>

- Autentikasi
  - Autentikasi Menggunakan Laravel Ui
  - Verifikasi Email
- Admin
  - CRUD Jenis barang
  - CRUD data barang
  - Peminjaman barang dan verifikasi peminjaman
  - Pengembalian barang dan verifikasi pengembalian
  - Export data ke file PDF
- User
  - Peminjaman barang
  - Pengembalian barang
 
<p></p>



<h2 id="syarat">💾 Prasyarat yang Diperlukan</h2>

Berikut adalah daftar layanan dan aplikasi yang wajib dan diperlukan selama anda menjalankan aplikasi E-inventory jika anda belum menginstall nya maka disarankan untuk menginstall nya terlebih dahulu

- PHP 8 & Web Server [XAMPP, LAMPP, MAMP]
- Web Browser [Chrome, Firefox, Safari & Opera]
- Internet [Karena menggunakan banyak CDN]

<p></p>

<h2 id="download">🐱‍💻 Panduan Menjalankan & Install Aplikasi</h2>

Untuk menjalankan aplikasi atau web ini kamu harus install XAMPP atau web server lain dan mempunyai setidaknya satu web browser yang terinstall di komputer anda.

```bash
# Clone repository ini atau download di
$ git clone https://github.com/Faiznurullah/E-Inventory-laravel.git

# Kemudian jalankan command composer install, ini akan menginstall resources yang laravel butuhkan
$ composer install

# Lakukan copy .env dengan cara ketik command seperti dibawah 
$ cp .env.example .env

# Membuat database
$ buat database

# Migration
$ php artisan migrate

# Melakukan seeder untuk data admin
$ php artisan db:seed

# Lalu jalankan aplikasi kalian dengan command dibawah
$ php artisan serve

# Selamat aplikasi dapat anda nikmati di local!
```
<p></p>




<h2 id="kontribusi">🤝 Kontribusi</h2>

Contributions, issues and feature requests sangat saya apresiasi karena aplikasi ini jauh dari kata sempurna. Jangan ragu untuk pull request dan membuat perubahan pada project ini.

Berhubung Project ini saya selesaikan sendiri, namun banyak fitur dan banyak hal yang bisa diperbaiki maka bantuan kalian sangat saya apresiasi.

<p></p>

<h2 id="lisensi">📝 Lisensi</h2>

- Copyright © 2022 Faiz Nurullah 
- E-inventory adalah aplikasi web open-source yang berlisensi dibawah lisensi MIT

---

**<p align="center">Made with ❤️ by Faiz Nurullah</p>**
