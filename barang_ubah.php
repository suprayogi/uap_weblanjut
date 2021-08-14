<?php
require("koneksi.php");
$errors = array();
$info = array();

if(empty($_POST['txtKode']))
	$errors['nama'] = 'Kode barang harus diisi!';

if(empty($_POST['txtNama']))
	$errors['nama'] = 'Nama barang harus diisi!';

if(empty($_POST['txtHarga']))
	$errors['nama'] = 'Harga harus dipilih!';

if(empty($_POST['txtJumlah']))
	$errors['nama'] = 'Jumlah harus diisi!';

if(!empty($errors)){
	$info['success'] = false;
	$info['errors'] = $errors;
}else{
	$data = array(
		'nama_barang' => $_POST['txtNama'],
		'harga_barang' => $_POST['txtHarga'],
		'jumlah_barang' => $_POST['txtJumlah'],
	);
	$where = $_POST['txtKode'];
	$cols = array();
	foreach ($data as $key => $value) {
		$cols[] = "$key = '$value'";
	}
	$sql = "UPDATE table_barang SET ".implode(',',$cols)." WHERE kode_barang='".$where."'";
	mysqli_query($conn, $sql);
	$info['success'] = true;
	$info['message'] = "Barang berhasil dirubah.";
}
echo json_encode($info);
?>