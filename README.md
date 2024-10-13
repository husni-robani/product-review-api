
# Product Review API

Product Review API merupakan API services yang terdiri dari 11 endpoint untuk mengelola data Product dan Review yang saling berhubungan. Hampir keseluruhan endpoint memerlukan API token yang didapatkan melalui authentication endpoint.Meskipun inti dari project ini merupakan API services, namun terdapat admin panel juga yang memberikan gambaran secara langsung mengenai Data yang terdapat di dalam database.
## Database Design
![image](https://github.com/user-attachments/assets/8b717d14-cca2-403d-9469-82ca0e1d4962)
1. Table users
- id: tipe data int, berfungsi sebagai primary key yang unik untuk setiap user.
- name: tipe data string, menyimpan nama user.
- password: tipe data string, berfungsi sebagai kata sandi ketika login atau mendaptakan API Token
- email: tipe data string, menyimpan email user.
- createdAt: tipe data timestamp, menyimpan waktu kapan user tersebut dibuat.
- updatedAt: tipe data timestamp, menyimpan waktu kapan user tersebut terakhir diperbarui.
2. Tabel products 
Tabel ini menyimpan informasi mengenai produk. Kolom-kolom dalam tabel ini meliputi:
- id: tipe data int, berfungsi sebagai primary key yang unik untuk setiap produk.
- name: tipe data string, menyimpan nama produk.
- price: tipe data string, menyimpan harga produk.
- createdAt: tipe data timestamp, menyimpan waktu kapan produk tersebut dibuat.
- updatedAt: tipe data timestamp, menyimpan waktu kapan produk tersebut terakhir diperbarui.
3. Tabel reviews 
Tabel ini menyimpan informasi mengenai ulasan produk. Kolom-kolom dalam tabel ini meliputi:
- id: tipe data int, berfungsi sebagai primary key yang unik untuk setiap ulasan.
- review_text: tipe data text, menyimpan teks ulasan.
- rate: tipe data enum, menyimpan nilai rating untuk produk (biasanya dalam bentuk angka atau kategori tertentu).
- product_id: tipe data int, foreign key yang menghubungkan ulasan dengan produk terkait.
- createdAt: tipe data timestamp, menyimpan waktu kapan ulasan tersebut dibuat.
- updatedAt: tipe data timestamp, menyimpan waktu kapan ulasan tersebut terakhir diperbarui.
## API Documentation

[API Documentation](https://giant-limpet-9b8.notion.site/Product-Review-API-11db98cf902d80ca8b65efcd0af3cd52)


## Screenshots
<!-- Screen shoots -->
## Dependencies

### Backend Dependencies
- **Laravel** | [Documentation](https://laravel.com/docs)
- **Sanctum** | [Documentation](https://laravel.com/docs)
- **PHP** | [Documentation](https://www.php.net/docs.php)
- **MySQL** | [Documentation](https://dev.mysql.com/doc/)
- **Composer** | [Documentation](https://getcomposer.org/doc/)

### Frontend Dependencies
- **NPM** | [Documentation](https://docs.npmjs.com/)
- **Tailwind CSS** | [Documentation](https://tailwindcss.com/docs/installation)
- **Blade Template Engine** | [Documentation](https://tailwindcss.com/docs/installation)


## Installation
### Prerequisites
Pastikan anda sudah install beberapa persyaratan berikut
- PHP >= 8.0
- Composer
- MySQL
- Node.js & NPM
- webpack
### Step by step
1. Clone repository

```bash
git clone https://github.com/husni-robani/product-review-api.git
cd my-project
```
2. Install Composer Dependencies
```bash
composer install
```
3. Install NPM Dependencies
```bash
npm install
```
4. copy env.example pada file .env untuk konfigurasi environtment
```bash
cp .env.example .env
```
5. Generate application key
```bash
php artisan key:generate
```
6. Setup Database pada file .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```
7. Jalankan migration dan seeder
```bash
php artisan migrate --seed
```
8. Build frontend assets
```bash
npm run dev
```
9. Jalankan aplikasi
```bash
php artisan serve
```
