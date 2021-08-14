<?php
require('Koneksi.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Barang Masuk</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/starter-template.css">
</head>
<body>
    <?php
    //require('nav.php');
    ?>
    <main class="container" role="main">
        <div class="md-12">
            <h1>INPUT BARANG MASUK</h1>
            <form method="POST" id="form_barang" action="">
                <label for="">Kode Barang Masuk</label>
                <input type="text" id="txtKodeMsk" name="txtKodeMsk" class="form-control" placeholder="Kode Barang Masuk">
                <label for="">Kode Barang</label>
                <select id="txtKode" name="txtKode" class="form-control" onchange="ganti()">
                    <option value="">Pilih Kode Barang</option>
                    <?php
                    $sqlkategori = "SELECT * FROM table_barang ORDER BY kode_barang";
                    $kategori = mysqli_query($conn, $sqlkategori);
                    foreach ($kategori as $key => $value) {
                        echo "<option value='".$value['kode_barang']."'>".$value['kode_barang']."</option>";
                    }
                    ?>
                </select>
                <label for="">Nama Barang</label>
                <input type="text" id="txtNama" name="txtNama" class="form-control" readonly>
                <label for="">Jumlah Barang Masuk</label>
                <input type="number" id="txtJumlahMsk" name="txtJumlahMsk" class="form-control">
                <br>
                <input type="submit" id="btnsimpan" name="btnsimpan" class="btn btn-primary" onclick="simpan();" value="Simpan">
            </form>
        </div>
        <hr>
        <div class="md-12">
            <?php
            if(isset($_POST['btnsimpan'])){
                if($_POST['txtKodeMsk']<>"" && $_POST['txtKode']<>"" && $_POST['txtNama']<>"" && $_POST['txtJumlahMsk']<>"" ){
                    echo "<h1>DATA BARANG MASUK</h1>";
                    $data = array(
                        'kode_barang_masuk' => "'".$_POST['txtKodeMsk']."'",
                        'kode_barang' => "'".$_POST['txtKode']."'",
                        'nama_barang' => "'".$_POST['txtNama']."'",
                        'jumlah_barang_masuk' => $_POST['txtJumlahMsk'],
                    );
                    $key = array_keys($data);
                    $val = array_values($data);
                    $sql = "INSERT INTO table_barang_masuk (".implode(',', $key).") VALUES (".implode(',',$val).")";
                    if(mysqli_query($conn, $sql)){
                        echo '<label for="">Kode Barang Masuk : '.$_POST['txtKodeMsk'].'</label><br>';
                        echo '<label for="">Kode Barang : '.$_POST['txtKode'].'</label><br>';
                        echo '<label for="">Nama Barang : '.$_POST['txtNama'].'</label><br>';
                        echo '<label for="">Jumlah Barang Masuk : '.$_POST['txtJumlahMsk'].'</label><br>';
                    }else{
                        echo "Gagal Input Barang Masuk !";
                    }
                }else{
                    echo "Silakan isi semua field pada Form Input Barang Masuk !";
                }
            }
            ?>
        </div>
    </main>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function ganti(){
            var kode = $("#txtKode").val();
            $.ajax({
                url : 'barangmasuk_tampil.php',
                type : 'POST',
                dataType : 'json',
                data : { kode : kode },
                success : function(data){
                    $('input[name="txtNama"]').val(data.nama_barang);
                }
            });
        }
    </script>
</body>
</html>