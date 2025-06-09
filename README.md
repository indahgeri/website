## Docker CLI Commands Documentation

Berikut adalah kumpulan perintah Docker yang sering digunakan untuk mengelola container dan images pada proyek ini.

### Melihat Daftar Images dan Container

```sh
# Melihat daftar images yang tersedia
docker images

# Melihat daftar container yang sedang berjalan
docker ps

# Melihat semua container (termasuk yang sudah berhenti)
docker ps -a
```

### Menjalankan dan Membangun Container

```sh
# Membangun dan menjalankan container secara background (detached)
docker compose up -d --build

# Membangun ulang container tanpa menggunakan cache
docker compose build --no-cache

# Menjalankan container yang sudah dibangun
docker compose up -d
```

### Mengakses Container

```sh
# Masuk ke dalam container bernama 'ci4-app' dengan shell bash
docker exec -it ci4-app bash

# Setelah berada di dalam container, jalankan perintah berikut sesuai kebutuhan:

# Masuk ke direktori aplikasi
cd /var/www/html

# Install semua dependency (termasuk untuk development):
composer install

# Install hanya untuk production (tanpa dependency development, autoloader dioptimasi):
composer install --no-dev --optimize-autoloader

# Install dengan preferensi distribusi (lebih cepat, tanpa clone repo):
composer install --prefer-dist
```

### 🔄 Rebuild Ulang Container dari Awal

Gunakan perintah berikut jika kamu melakukan perubahan pada `Dockerfile`, `composer.json`, atau ingin membersihkan environment Docker secara total:

```bash
# 1. Menghentikan container dan menghapus volume (data lama ikut dihapus)
docker compose down -v

# 2. Membangun ulang image tanpa menggunakan cache
docker compose build --no-cache

# 3. Menjalankan container dalam mode background
docker compose up -d
```

### Menghentikan dan Menghapus Container

```sh
# Menghentikan dan menghapus semua container, network, dan volume yang dibuat oleh compose
docker compose down -v

# Menghentikan dan menghapus container tanpa menghapus volume
docker compose down
```

### Membersihkan Images dan Container

```sh
# Menghapus semua images yang tidak digunakan
docker image prune -f
```

---

**Catatan:**  
Pastikan untuk menjalankan perintah di atas sesuai kebutuhan pengelolaan container dan images pada proyek Anda.