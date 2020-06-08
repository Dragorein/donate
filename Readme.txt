1. copy dan rename env.example mjd env, di dalamnya ubah dbnya jadi 'donation'

2. delete folder node_modules

3. git bash di dalam folder projek. lakukan command berikut satu per satu:
'composer install'
'php artisan migrate'
tanpa kutip
(harus udh install composer di pc)

4. buka git bash lagi di dalam folder projek. jalanin command 'npm install && npm run dev' tanpa kutip
(harus udh install npm di pc)

5. kalo mau dipake buka 2 git bash terpisah.
yg satu jalanin 'php artisan serve'
yg satu lagi jalanin 'npm run watch'
tanpa kutip

step 1-4 cuma buat awal clone pertama kali.

Note Migrate DB :

Kalo DB kosong ketik "php artisan migrate" di bash

6. Cron Job (Update Submisi yang telah lewat dari hari ini, Jika ingin Menjalan kan nya di server perlu konfigurasi)
   Jalankan : php artisan Update:Submisi
   Note : Di konfigurasi untuk Setiap Jam bisa diatur ke hari.