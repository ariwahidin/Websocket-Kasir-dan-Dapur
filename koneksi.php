<?php
$host = "localhost"; // Sesuaikan dengan host MySQL Anda
$username = "root"; // Sesuaikan dengan username MySQL Anda
$password = ""; // Sesuaikan dengan password MySQL Anda
$database = "kitchen"; // Sesuaikan dengan nama database yang ingin Anda gunakan

// Buat koneksi
$koneksi = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
