# WEB GALLERY

## Tentang Website

Simpelnya ini hanyalah Web yang saya buat dengan mengikuti style instagram, facebook dan twitter namun versi low budget yang sangat minim. meskipun tidak terlalu mirip, tapi fungsi yang ditonjolkan dari web ini adalah mampu memuat gallery dan user lain bisa melihat gambar apa yang kita posting.

## Fitur

Untuk Fitur masih minim:
- sign up
- log in
- log out
- multiuser
- add poto
- add album
- edit profile
- add comment
- edit comment
- delete comment
- like
- dll

## Tampilan Website

![Screenshot (9)](https://github.com/hasbiez45/Gallery-Hasbi/assets/110511061/711b928a-f351-4c10-a318-aff1e0f40117)

![Screenshot (8)](https://github.com/hasbiez45/Gallery-Hasbi/assets/110511061/9645b750-a193-4a06-9274-3ff7e523df12)

## ERD, Relasi dan UML Use Case

- ERD

![ERD](https://github.com/hasbiez45/Gallery-Hasbi/assets/110511061/9b1e9a32-e474-4b0a-8fb8-a98c7b75040b)

- Relasi

![relasi](https://github.com/hasbiez45/Gallery-Hasbi/assets/110511061/cf59cdcc-2111-4104-80e7-9dd529c74e38)

- UML

![UML](https://github.com/hasbiez45/Gallery-Hasbi/assets/110511061/95f955c4-df4b-4d77-ab10-7fb9fc5337c3)

## Prasyaratan

- PHP 8.2.8 & Web Server (Apache, Lighttpd, atau Nginx)
- Database (MariaDB dengan v11.0.3 atau PostgreSQL)
- Web Browser (Firefox, Safari, Opera, Microsoft Edge dll)

## Instalasi
1. Clone Repository
```
https://github.com/hasbiez45/Gallery-Hasbi
```

2. Install Composer
```
composer install
```
atau
```
composer update
```

3. Copy .Env
```
copy .env.example .env
```

4. Setting database di .env
```
DB_PORT=3306
DB_DATABASE=laravel_gallery
DB_USERNAME=root
DB_PASSWORD=
```

5. Generate key
```
php artisan key:generate
```

6. Jalankan migrate dan seeder
```
php artisan migrate --seed
```

7. Buat Storage Link
```
php artisan storage:link
```

8. jangan lupa menginstall NPM
```
npm install
```
lalu jalankan
```
npm run dev
```

8. Jalankan Serve
```
php artisan serve
```
