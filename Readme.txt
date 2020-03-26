1. git bash di dalam folder projek. lakukan command berikut satu per satu:
'composer install'
'php artisan migrate'
tanpa kutip
(harus udh install composer di pc)

2. rename env.example mjd env, di dalamnya ubah dbnya jadi 'donation'

3. delete folder node_modules

4. buka git bash lagi di dalam folder projek. jalanin command 'npm install && npm run dev' tanpa kutip
(harus udh install npm di pc)

5. kalo mau dipake buka 2 git bash terpisah.
yg satu jalanin 'php artisan serve'
yg satu lagi jalanin 'npm run watch'
tanpa kutip

step 1-4 cuma buat awal clone pertama kali.

Note Migrate DB :

Kalo blm ada DB nya ketik "php artisan migrate" di cmd