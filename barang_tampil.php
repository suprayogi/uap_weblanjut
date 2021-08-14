<?php
require("koneksi.php");
$kode = $_POST['kode'];
$sql = "SELECT * from table_barang WHERE kode_barang='".$kode."'";
$hasil = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($hasil);
echo json_encode($data);
?>