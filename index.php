<?php
$db = new Database();

// Query data barang dari tabel data_barang (sesuai database Anda)
$data_barang = $db->query("SELECT * FROM data_barang ORDER BY id_barang DESC");

// Hitung total data
$total_data = $data_barang ? $data_barang->num_rows : 0;
?>

<h2>📋 Daftar Data Barang</h2>

<div class="alert alert-info">
    Total Data: <strong><?= $total_data ?></strong> barang | 
    Database: <strong>latihan1</strong> | 
    Tabel: <strong>data_barang</strong>
</div>

<?php if($data_barang && $data_barang->num_rows > 0): ?>
<table>
    <thead>
        <tr>
            <th width="50">No</th>
            <th width="120">Gambar</th>
            <th>Kategori</th>
            <th>Nama Barang</th>
            <th width="120">Harga Beli</th>
            <th width="120">Harga Jual</th>
            <th width="80">Stok</th>
            <th width="180">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        while($row = $data_barang->fetch_assoc()): 
            // Tentukan gambar
            $gambar_path = __DIR__ . "/../../gambar/" . $row['gambar'];
            $gambar_url = "http://" . $_SERVER['HTTP_HOST'] . "/lab11_php_oop/gambar/" . $row['gambar'];
        ?>
        <tr>
            <td align="center"><?= $no++; ?></td>
            <td align="center">
                <?php if(!empty($row['gambar']) && file_exists($gambar_path)): ?>
                    <img src="<?= $gambar_url ?>" alt="<?= htmlspecialchars($row['nama']) ?>" 
                         title="<?= htmlspecialchars($row['nama']) ?>">
                <?php else: ?>
                    <img src="https://via.placeholder.com/100x100/e9ecef/495057?text=No+Image" 
                         alt="No Image" title="Gambar tidak ditemukan">
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($row['kategori']) ?></td>
            <td><strong><?= htmlspecialchars($row['nama']) ?></strong></td>
            <td style="color: #dc3545; font-weight: bold;">
                Rp <?= number_format($row['harga_beli'], 0, ',', '.') ?>
            </td>
            <td style="color: #28a745; font-weight: bold;">
                Rp <?= number_format($row['harga_jual'], 0, ',', '.') ?>
            </td>
            <td align="center">
                <span style="display:inline-block; padding:5px 10px; background:#e9ecef; border-radius:20px; font-weight:bold;">
                    <?= $row['stok'] ?>
                </span>
            </td>
            <td>
                <div class="action-buttons">
                    <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/lab11_php_oop/artikel/ubah?id=<?= $row['id_barang'] ?>" 
                       class="btn btn-warning">✏️ Edit</a>
                    <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/lab11_php_oop/artikel/hapus?id=<?= $row['id_barang'] ?>" 
                       class="btn btn-danger" onclick="return confirmDelete()">🗑️ Hapus</a>
                </div>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php else: ?>
    <div class="no-data">
        <p style="font-size: 24px; margin-bottom: 10px;">📭</p>
        <h3 style="color: #6c757d;">Belum ada data barang</h3>
        <p style="margin: 15px 0;">Database 'latihan1' tabel 'data_barang' kosong.</p>
        <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/lab11_php_oop/artikel/tambah" 
           class="btn btn-primary" style="padding: 12px 25px; font-size: 16px;">
           ➕ Tambah Data Pertama
        </a>
    </div>
<?php endif; ?>

<div style="margin-top: 30px; padding: 15px; background: #f8f9fa; border-radius: 5px; border-left: 4px solid #007bff;">
    <h4>ℹ️ Informasi Database:</h4>
    <ul style="margin: 10px 0 0 20px;">
        <li>Database: <code>latihan1</code></li>
        <li>Tabel: <code>data_barang</code></li>
        <li>Primary Key: <code>id_barang</code></li>
        <li>Field: id_barang, nama, kategori, harga_beli, harga_jual, stok, gambar</li>
        <li>Path Gambar: <code>C:\xampp\htdocs\lab11_php_oop\gambar\</code></li>
    </ul>
</div>