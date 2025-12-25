        </div>
        
        <footer>
            <p>&copy; <?= date('Y') ?> - Sistem Data Barang | PHP OOP Modular | Database: latihan1</p>
            <p style="font-size: 14px; margin-top: 5px; color: #888;">
                Tabel: data_barang | Field: id_barang, nama, kategori, harga_beli, harga_jual, stok, gambar
            </p>
        </footer>
    </div>
    
    <script>
    // Konfirmasi sebelum hapus
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus data ini?');
    }
    
    // Notifikasi
    if (window.location.search.includes('success')) {
        setTimeout(function() {
            alert('Operasi berhasil!');
        }, 300);
    }
    </script>
</body>
</html>