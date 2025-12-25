<?php
$db = new Database();

// Ambil ID dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id == 0) {
    echo '<div class="alert alert-danger">❌ ID tidak valid!</div>';
    echo '<a href="http://' . $_SERVER['HTTP_HOST'] . '/lab11_php_oop/artikel/index" class="btn btn-primary">Kembali</a>';
    exit;
}

// Ambil data yang akan diubah
$data_barang = $db->get('data_barang', "id_barang = $id");

if (!$data_barang) {
    echo '<div class="alert alert-danger">❌ Data tidak ditemukan! ID: ' . $id . '</div>';
    echo '<a href="http://' . $_SERVER['HTTP_HOST'] . '/lab11_php_oop/artikel/index" class="btn btn-primary">Kembali ke Daftar</a>';
    exit;
}

// Proses update data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'nama' => $_POST['nama'],
        'kategori' => $_POST['kategori'],
        'harga_beli' => $_POST['harga_beli'],
        'harga_jual' => $_POST['harga_jual'],
        'stok' => $_POST['stok']
    ];
    
    // Upload gambar baru jika ada
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $gambar_name = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', basename($_FILES['gambar']['name']));
        $target_dir = __DIR__ . "/../../gambar/";
        $target_file = $target_dir . $gambar_name;
        
        // Cek tipe file
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
                // Hapus gambar lama jika ada
                if (!empty($data_barang['gambar'])) {
                    $old_file = $target_dir . $data_barang['gambar'];
                    if (file_exists($old_file)) {
                        unlink($old_file);
                    }
                }
                $data['gambar'] = $gambar_name;
            }
        }
    }
    
    $result = $db->update('data_barang', $data, "id_barang = $id");
    
    if ($result) {
        echo '<div class="alert alert-success">';
        echo '✅ Data berhasil diperbarui! ID: ' . $id;
        echo '</div>';
        
        // Refresh data
        $data_barang = $db->get