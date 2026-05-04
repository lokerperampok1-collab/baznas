# Rencana Pengembangan: Admin Page Campaigns

## Tujuan Utama
Membuat halaman admin untuk mengelola (menambahkan) kampanye kurban atau program donasi baru.

## Path yang Diminta
- **URL Path:** `/purno`

## Task List untuk Agent
1. **Pembuatan Route & Controller:**
   - Buat route `GET /purno` untuk menampilkan halaman admin.
   - Buat route `POST /purno` (atau sejenisnya) untuk menangani form submission tambah kampanye.
   - Buat controller khusus (misal: `AdminCampaignController`) jika diperlukan, atau gunakan controller admin yang sudah ada.

2. **Pembuatan Tampilan (View):**
   - Buat view Blade untuk halaman `/purno` (contoh: `resources/views/admin/purno/index.blade.php`).
   - Sediakan antarmuka (UI) yang berisi form untuk **Tambah Campaign / Donate Now**.
   - Input form setidaknya meliputi:
     - Nama Kampanye/Paket
     - Deskripsi
     - Harga/Nominal (jika berupa paket kurban)
     - Upload Gambar/Foto

3. **Logika Penyimpanan (Database):**
   - Pastikan data yang disubmit dari form `/purno` divalidasi dan disimpan ke tabel database yang sesuai (contoh: tabel `qurban_packages` atau tabel `campaigns` yang sudah ada di project ini).

4. **Pengujian & Keamanan:**
   - (Opsional/Sesuai kebutuhan) Tambahkan middleware *auth* jika halaman `/purno` harus dilindungi login.
   - Pastikan kampanye yang baru ditambahkan melalui halaman `/purno` langsung muncul atau terintegrasi dengan halaman donasi publik website.
