# struktur
lab11_php_oop/
├── .htaccess          # Konfigurasi URL Rewrite
├── config.php         # Konfigurasi Database
├── index.php          # Gerbang Utama / Routing
├── class/             # Library Class
│   ├── Database.php   # Class untuk operasi database
│   └── Form.php       # Class untuk form dinamis
├── module/            # Modul-modul website
│   └── artikel/
│       ├── index.php   # Menampilkan data (CRUD - Read)
│       ├── tambah.php  # Form tambah data (CRUD - Create)
│       ├── ubah.php    # Form edit data (CRUD - Update)
│       └── hapus.php   # Hapus data (CRUD - Delete)
├── template/          # Layout website
│   ├── header.php     # Template header
│   ├── sidebar.php    # Template sidebar menu
│   └── footer.php     # Template footer
└── gambar/            # Folder untuk upload gambar




# Halaman Utama (Dashboard)
Menampilkan daftar data barang dari database latihan1
Tabel data_barang dengan 3 record
Fitur: Edit dan Hapus data
Informasi database ditampilkan di bagian bawah

<img width="1734" height="799" alt="Screenshot 2025-12-25 235244" src="https://github.com/user-attachments/assets/4cf4ca8c-edaf-4f4b-a12e-7ccd6ba0eddb" />


<img width="1685" height="657" alt="Screenshot 2025-12-25 235256" src="https://github.com/user-attachments/assets/3d8e442e-20cb-4f7d-8c55-081976e322d3" />




# Form Tambah Data Barang
Form input menggunakan Class Form yang dinamis
Field: Nama Barang, Kategori (dropdown), Harga Beli, Harga Jual, Stok, Upload Gambar
Data disimpan ke tabel data_barang


<img width="1271" height="809" alt="Screenshot 2025-12-26 000244" src="https://github.com/user-attachments/assets/2c488e9b-192f-48af-a7b0-36e8b6a06242" />




# Data Setelah Ditambahkan
Data "Iphone 16 pro" berhasil ditambahkan
Total data menjadi 4 barang
Format harga sudah benar: Rp 16.000.000 dan Rp 17.000.000
Tombol Edit dan Hapus berfungsi


<img width="1726" height="776" alt="Screenshot 2025-12-26 000258" src="https://github.com/user-attachments/assets/6e7bff57-4371-4d1a-9234-318dae9b1bee" />




# Detail Data Barang
Menampilkan data HP, Xiaomi, Samsung
Setiap data memiliki aksi Edit dan Hapus
Informasi struktur database lengkap


<img width="1700" height="790" alt="Screenshot 2025-12-26 001518" src="https://github.com/user-attachments/assets/fa5d842d-157d-466f-a252-87ee7c5a850f" />


