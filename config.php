<?php
// Aktifkan error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$config = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',  // Kosong jika pakai XAMPP default
    'db_name' => 'latihan1'  // Nama database Anda
];

// Test koneksi langsung
$test_conn = new mysqli($config['host'], $config['username'], $config['password'], $config['db_name']);
if ($test_conn->connect_error) {
    die("❌ Koneksi database gagal: " . $test_conn->connect_error);
} else {
    // echo "✅ Database connected successfully!<br>";
}
$test_conn->close();
?>