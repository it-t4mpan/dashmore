<img width="416" alt="Screenshot 2024-07-30 at 09 23 03" src="https://github.com/user-attachments/assets/88e7d1e0-a316-40e2-85f3-d59593519940">

# Fungsi Script

1. Monitoring Status Website:
- Script ini digunakan untuk memantau status situs web dengan melakukan permintaan HTTP (melalui cURL) ke daftar situs yang telah ditentukan.
- Untuk setiap situs web, script akan menampilkan status (UP atau DOWN), waktu respons, dan waktu terakhir cek.

2. Penanganan Kesalahan dan Logging:
- Script mengatasi kesalahan yang mungkin terjadi selama permintaan cURL, seperti timeout atau kesalahan koneksi, dan mencatat pesan kesalahan ke dalam file log.
- Log aktivitas mencatat waktu respons, status, dan waktu cek terakhir dari setiap situs yang dipantau.

3. Antarmuka Pengguna Sederhana:
- Script menyediakan antarmuka pengguna sederhana menggunakan HTML dan CSS untuk menampilkan status situs web dalam grid.
- Setiap kotak grid menunjukkan status dan informasi terkait dari setiap situs yang dipantau.

# ---- Deskripsi Fitur Script: ----
- Validasi URL: Sebelum melakukan permintaan cURL, script melakukan validasi URL untuk memastikan URL yang digunakan valid.
- Curl Request Handling: Menggunakan cURL untuk melakukan permintaan HTTP ke setiap situs web yang dipantau dengan mengatur timeout dan penanganan kesalahan yang tepat.
- Logging: Mencatat aktivitas monitor ke dalam file log dengan membatasi ukuran file log agar tidak melebihi batas tertentu (1MB).
- Status Monitoring: Menampilkan status situs web (UP atau DOWN) beserta waktu respons dan waktu cek terakhir di antarmuka pengguna.
- Antarmuka Pengguna: Menampilkan informasi status situs web dalam grid responsif menggunakan HTML dan CSS, dengan tata letak yang menyesuaikan ukuran layar (responsive layout).

# --- Keamanan: ----
- Validasi Data: Menggunakan fungsi htmlspecialchars() untuk mencegah serangan XSS (Cross-Site Scripting) saat menampilkan data dinamis pada halaman HTML.
- Penanganan Kesalahan: Mengelola penanganan kesalahan cURL dengan aman untuk menghindari informasi sensitif yang terungkap kepada pengguna.
- Pengelolaan Log: Mengelola log aktivitas dengan bijaksana, termasuk pengaturan batas ukuran log untuk menjaga integritas dan kinerja aplikasi.

# --- Catatan: ---
- Pastikan script ini digunakan dengan bijaksana dan disesuaikan dengan kebutuhan spesifik Anda, termasuk penyesuaian keamanan tambahan sesuai dengan lingkungan aplikasi web Anda.
- Monitor log secara berkala untuk memastikan bahwa aktivitas monitor situs web berjalan dengan baik dan tidak ada masalah yang tidak terduga.
