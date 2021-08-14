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
		'kode_barang' => "'".$_POST['txtKode']."'",
		'nama_barang' => "'".$_POST['txtNama']."'",
		'harga_barang' => $_POST['txtHarga'],
		'jumlah_barang' => $_POST['txtJumlah'],
	);
	$key = array_keys($data);
	$val = array_values($data);
	$sql = "INSERT INTO table_barang (".implode(',', $key).") VALUES (".implode(',',$val).")";
	mysqli_query($conn, $sql);
	$info['success'] = true;
	$info['message'] = "Barang berhasil disimpan.";
}
echo json_encode($info);
?>