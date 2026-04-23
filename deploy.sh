#!/bin/bash

echo "--- Memulai Proses Deployment ---"

# Masuk ke direktori aplikasi
# Ganti /var/www/kurban-app dengan path aplikasi Anda di VPS
cd /var/www/kurban-app

# Ambil kode terbaru
git pull origin main

# Install dependensi (tanpa dev)
composer install --no-dev --optimize-autoloader

# Jalankan migrasi database
php artisan migrate --force

# Bersihkan & Bangun Ulang Cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimasi Permission
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

echo "--- Deployment Berhasil! ---"
