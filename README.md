Setelah Clone repo, 
1. lakukan migrasi
2. penambahan user untuk login secara manual dengan sintaks php artisan make:filament-user
3. jika fillament tidak bisa maka install fillament dengan sintaks dibawah ini

    composer require filament/filament:"^3.2" -W
 
    php artisan filament:install --panels
