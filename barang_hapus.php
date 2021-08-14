<?php
require("koneksi.php");
$errors = array();
$info = array();

if(empty($_POST['kode']))
	$errors['nama'] = 'Silakan pilih Barang untuk dihapus!';

if(!empty($errors)){
	$info['success'] = false;
	$info['errors'] = $errors;
}else{
	$where = $_POST['kode'];
	$sql = "DELETE FROM table_barang WHERE kode_barang='".$where."'";
	mysqli_query($conn, $sql);
	$info['success'] = true;
	$info['message'] = "Barang berhasil dihapus";
}
echo json_encode($info);
?>