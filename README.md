# Dokumentasi

Pada projek kali ini menggunakan Laravel Lumen, Lumen sendiri merupakan microframework yang secara khusus digunakan untuk membuat RESTFUL API (Application Programming Interface). Kelebihan menggunakan Lumen sebagai RESTFUL API adalah kecepatan requestnya, dikarenakan terdapat pengurangan fitur pada Laravel utuh.

### Langkah-langkah

1. Clone repository
   ```sh
   git clone [https://github.com/your_username_/Project-Name.git](https://github.com/jonathanorlen/dot.git
   ```
   
2. Melalui terminal masuk ke folder pada repository yang telah di clone, ketikan berikut
   ```sh
   composer install
   ```
   
3. Buat database pada localhost dengan nama 'dot' kemudian sambungkan pada file enviroment di `.env` seperti dibawah ini contohnya
   ```php
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=dot
    DB_USERNAME=root
    DB_PASSWORD=
   ```

4. Jika sudah sesuai dengan database, lakukan migrasi table pada database, dengan mengetikan perintah berikut ini
   ```sh
    php artisan migrate
   ```
   
5. Jika migrasi sudah sukses dijalankan, ketikan perintah pada terminal untuk mengambil data dari API RajaOngkir dan memasukan kedalam database berikut ini
   ```sh
    php artisan fetc:API
   ```
6. Jika data pada API sudah masuk kedalam database jalankan perintah berikut pada terminal anda
   ```sh
    php -S localhost:8000 -t public
   ```
   Perintah di atas digunakan pada Lumen karena tidak terdapat perintah `php artisan serve` pada Laravel full framework
   
7. Pengambilan API dapat dilakukan dengan mengunjungi alamat seperti ini <br>
   `http://localhost:8000/search/city`  => Digunakan untuk mengakses data semua kota<br>
   `http://localhost:8000/search/province` => Digunakan untuk mengakses data semua provinsi<br>
   <br>
   Untuk mengakses data spesifik kota ataupun provinsi sesuai id bisa dilakukan seperti berikut ini : <br>
   `http://localhost:8000/search/city?id={city_id}`  => Digunakan untuk mengakses data kota berdasarkan city_id<br>
   `http://localhost:8000/search/province?id={province_id}` => Digunakan untuk mengakses data provinsi berdasarkan province_id<br>
