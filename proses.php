<?php
include 'koneksi.php';

$nama_brg = $_POST['nama_brg'];
$jumlah_brg = $_POST['jumlah_brg'];
$supplier = $_POST['supplier'];

$sql = "SELECT COUNT(*) AS total FROM barang";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
    
$kode_brg = "BRG" . str_pad($row['total'] + 1, 3, '0', STR_PAD_LEFT);

$sql = "INSERT INTO barang (kode_brg, nama_brg, jumlah_brg, supplier) VALUES ('$kode_brg', '$nama_brg', $jumlah_brg, '$supplier')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['message'] = "Input data berhasil!";
} else {
    $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: index.php");
exit();
?>