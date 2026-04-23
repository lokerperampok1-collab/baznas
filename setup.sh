#!/bin/bash

# Pastikan dijalankan sebagai root
if [ "$EUID" -ne 0 ]; then
  echo "Silakan jalankan sebagai root (gunakan sudo)"
  exit
fi

echo "--- Memulai Setup Server untuk Laravel (PHP 8.3) ---"

# Update System
apt update && apt upgrade -y

# Install Tools Dasar
apt install -y nginx zip unzip curl git supervisor software-properties-common

# Install PHP 8.3 & Extensions
add-apt-repository ppa:ondrej/php -y
apt update
apt install -y php8.3-fpm php8.3-cli php8.3-mysql php8.3-gd php8.3-curl php8.3-xml php8.3-mbstring php8.3-bcmath php8.3-zip php8.3-intl php8.3-sqlite3

# Install Composer
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# Install MySQL
apt install -y mysql-server

# Optimasi Permission Nginx
usermod -a -G www-data root

echo "--- Setup Selesai! ---"
echo "Langkah selanjutnya: Konfigurasi Database MySQL."

