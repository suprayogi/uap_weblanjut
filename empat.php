<?php
require('koneksi.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
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
            <h1>Barang</h1>
            <div class="mb-3">
                <button type="button" id="#btnTambah" class="btn btn-primary" data-toggle="modal" data-target="#barang">Tambah</button>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM table_barang";
                    $data = mysqli_query($conn, $sql);
                    $no = (int) 1;
                    foreach ($data as $key => $row) {
                    ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $row['kode_barang'];?></td>
                        <td><?php echo $row['nama_barang'];?></td>
                        <td><?php echo $row['harga_barang'];?></td>
                        <td><?php echo $row['jumlah_barang'];?></td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-warning btn-sm" onclick="ganti('<?php echo $row['kode_barang'];?>')">Edit</a>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="hapus('<?php echo $row['kode_barang'];?>')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <div class="modal fade" id="barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" id="form_barang">
                <label for="">Kode Barang</label>
                <input type="text" id="txtKode" name="txtKode" class="form-control" placeholder="Kode Barang">
                <label for="">Nama Barang</label>
                <input type="text" id="txtNama" name="txtNama" class="form-control" placeholder="Nama Barang">
                <label for="">Harga</label>
                <input type="text" id="txtHarga" name="txtHarga" class="form-control" placeholder="Harga Barang">
                <label for="">Jumlah</label>
                <input type="number" id="txtJumlah" name="txtJumlah" class="form-control" placeholder="Jumlah Barang">
                <input type="hidden" name="txtId">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnsimpan" class="btn btn-primary" onclick="simpan();">Simpan</button>
            <button type="button" id="btnubah"class="btn btn-warning" disabled="disabled" onclick="ubah();">Ubah</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function simpan(){
            $.ajax({
                url : 'barang_simpan.php',
                type : 'POST',
                dataType : 'json',
                data : $('#form_barang').serialize(),
                success : function(data){
                    if(!data.success){
                        alert(data.errors.nama);
                        $("#txtKode").focus();
                        return false;
                    }else{
                        alert(data.message);
                        window.location.reload();
                    }
                }
            });
        }
        function ganti(kode){
            $("#barang").modal('show');
            $.ajax({
                url : 'barang_tampil.php',
                type : 'POST',
                dataType : 'json',
                data : { kode : kode },
                success : function(data){
                    $("#btnsimpan").attr('disabled','disabled');
                    $("#btnubah").removeAttr('disabled');
                    $('input[name="txtKode"]').val(data.kode_barang);
                    $('input[name="txtNama"]').val(data.nama_barang);
                    $('input[name="txtJumlah"]').val(data.jumlah_barang);
                    $('input[name="txtHarga"]').val(data.harga_barang);
                }
            });
        }
        function ubah(){
            $.ajax({
                url : 'barang_ubah.php',
                type : 'POST',
                dataType : 'json',
                data : $('#form_barang').serialize(),
                success : function(data){
                    if(!data.success){
                        alert(data.errors.nama);
                        $("#txtKode").focus();
                        return false;
                    }else{
                        alert(data.message);
                        window.location.reload();
                    }
                }
            });
        }
        function hapus(kode){
            if(confirm("Anda yakin menghapus data?")){
                $.ajax({
                    url : 'barang_hapus.php',
                    type : 'POST',
                    dataType : 'json',
                    data : { kode : kode },
                    success : function(data){
                        if(!data.success){
                            alert(data.errors.nama);
                            return false;
                        }else{
                            alert(data.message);
                            window.location.reload();
                        }
                    }
                });
            }
        }
    </script>
</body>
</html>