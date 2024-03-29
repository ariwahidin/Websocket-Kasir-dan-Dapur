<?php
// Include file koneksi
include 'koneksi.php';

// CREATE ORDERS

// function createOrder()
// {
//     $sql_create = "INSERT INTO nama_tabel (kolom1, kolom2, kolom3) VALUES ('nilai1', 'nilai2', 'nilai3')";
//     if ($koneksi->query($sql_create) === TRUE) {
//         return true;
//     } else {
//         echo "Error: " . $sql_create . "<br>" . $koneksi->error;
//         return false;
//     }
// }



// READ
// $sql_read = "SELECT * FROM nama_tabel";
// $result = $koneksi->query($sql_read);
// if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//         echo "Kolom1: " . $row["kolom1"]. " - Kolom2: " . $row["kolom2"]. " - Kolom3: " . $row["kolom3"]. "<br>";
//     }
// } else {
//     echo "Tidak ada data.";
// }

// // UPDATE
// $sql_update = "UPDATE nama_tabel SET kolom1='nilai_baru' WHERE kondisi='sesuai'";
// if ($koneksi->query($sql_update) === TRUE) {
//     echo "Data berhasil diperbarui.";
// } else {
//     echo "Error updating record: " . $koneksi->error;
// }

// // DELETE
// $sql_delete = "DELETE FROM nama_tabel WHERE kondisi='sesuai'";
// if ($koneksi->query($sql_delete) === TRUE) {
//     echo "Data berhasil dihapus.";
// } else {
//     echo "Error deleting record: " . $koneksi->error;
// }

// Tutup koneksi
$koneksi->close();
