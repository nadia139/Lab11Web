<?php
$db = new Database();

// Proses tambah data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'nama' => $_POST['nama'],
        'kategori' => $_POST['kategori'],
        'harga_beli' => $_POST['harga_beli'],
        'harga_jual' => $_POST['harga_jual'],
        'stok' => $_POST['stok'],
        'gambar' => ''
    ];
    
    // Upload gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $gambar_name = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', basename($_FILES['gambar']['name']));
        $target_dir = __DIR__ . "/../../gambar/";
        
        // Buat folder gambar jika belum ada
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $target_file = $target_dir . $gambar_name;
        
        // Cek tipe file
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
                $data['gambar'] = $gambar_name;
            } else {
                echo '<div class="alert alert-danger">❌ Gagal upload gambar!</div>';
            }
        } else {
            echo '<div class="alert alert-danger">❌ Format file tidak didukung! Gunakan: ' . implode(', ', $allowed_types) . '</div>';
        }
    }
    
    // Simpan ke database
    $result = $db->insert('data_barang', $data);
    
    if ($result) {
        echo '<div class="alert alert-success">';
        echo '✅ Data berhasil ditambahkan! ID: ' . $result;
        echo '</div>';
        
        // Redirect setelah 2 detik
        echo '<script>
        setTimeout(function() {
            window.location.href = "http://' . $_SERVER['HTTP_HOST'] . '/lab11_php_oop/artikel/index";
        }, 2000);
        </script>';
        
        // Tampilkan data yang baru ditambahkan
        echo '<div class="alert alert-info">';
        echo '<strong>Data yang disimpan:</strong><br>';
        echo 'Nama: ' . htmlspecialchars($data['nama']) . '<br>';
        echo 'Kategori: ' . htmlspecialchars($data['kategori']) . '<br>';
        echo 'Harga Beli: Rp ' . number_format($data['harga_beli'], 0, ',', '.') . '<br>';
        echo 'Harga Jual: Rp ' . number_format($data['harga_jual'], 0, ',', '.') . '<br>';
        echo 'Stok: ' . $data['stok'] . '<br>';
        echo 'Gambar: ' . ($data['gambar'] ?: '(tidak ada)');
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger">❌ Gagal menambahkan data!</div>';
    }
}
?>

<h2>➕ Tambah Data Barang Baru</h2>
<p style="color: #666; margin-bottom: 20px;">Isi form berikut untuk menambahkan data barang ke database <strong>latihan1</strong></p>

<?php
$form = new Form("", "💾 Simpan Data Barang");
$form->addField("nama", "Nama Barang", "text");
$form->addField("kategori", "Kategori", "select", [
    'Elektronik' => 'Elektronik',
    'Pakaian' => 'Pakaian',
    'Makanan' => 'Makanan',
    'Minuman' => 'Minuman',
    'Alat Tulis' => 'Alat Tulis',
    'Olahraga' => 'Olahraga',
    'Lainnya' => 'Lainnya'
]);
$form->addField("harga_beli", "Harga Beli (Rp)", "number");
$form->addField("harga_jual", "Harga Jual (Rp)", "number");
$form->addField("stok", "Stok (unit)", "number");
$form->addField("gambar", "Upload Gambar", "file");

$form->displayForm();
?>

<div style="margin-top: 30px; padding: 15px; background: #e9ecef; border-radius: 5px;">
    <h4>📝 Catatan:</h4>
    <ul style="margin: 10px 0 0 20px;">
        <li>Data akan disimpan ke tabel <code>data_barang</code> di database <code>latihan1</code></li>
        <li>Primary key: <code>id_barang</code> (auto increment)</li>
        <li>Gambar akan disimpan di folder <code>gambar/</code></li>
        <li>Format gambar: JPG, PNG, GIF, WebP</li>
    </ul>
</div>