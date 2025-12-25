<div style="width: 250px; float: left; padding: 20px; background: #f8f9fa; min-height: 500px;">
    <h3>📂 Menu</h3>
    <ul style="list-style: none; padding: 0;">
        <li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/lab11_php_oop/artikel/index">📋 Data Barang</a></li>
        <li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/lab11_php_oop/artikel/tambah">➕ Tambah Barang</a></li>
        <li style="margin-top: 20px;"><strong>⚙️ Sistem</strong></li>
        <li><a href="http://localhost/phpmyadmin" target="_blank">🗃️ phpMyAdmin</a></li>
        <li><a href="http://localhost" target="_blank">🏠 Localhost</a></li>
    </ul>
    
    <div style="margin-top: 30px; padding: 15px; background: #e9ecef; border-radius: 5px;">
        <h4>📊 Info Database</h4>
        <p style="font-size: 12px; margin: 5px 0;">
            <strong>DB:</strong> latihan1<br>
            <strong>Tabel:</strong> data_barang<br>
            <strong>Records:</strong> <?php 
                $db = new Database();
                $result = $db->query("SELECT COUNT(*) as total FROM data_barang");
                $row = $result->fetch_assoc();
                echo $row['total'];
            ?>
        </p>
    </div>
</div>
<div style="margin-left: 270px; padding: 20px;">