<?php
    //Koneksi Database
    $server = "db4free.net";
    $user = "tashya20";
    $pass = "tashyamahoro2008";
    $database = "double_t";

    $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

    //jika tombol simpan diklik
    if(isset($_POST['bSimpan']))
    {
        $simpan = mysqli_query($koneksi,"INSERT INTO tkwp (nik, nama, tanggal_lahir, alamat)
                                        VALUES ('$_POST[tNIK]',
                                               '$_POST[tNama]',
                                               '$_POST[tTanggal_Lahir]',
                                               '$_POST[tAlamat]')
                                        ");
        if($simpan) //jika simpan sukses
        {
            echo "<script>
                    alert('Simpan data sukses!');
                    document.location= 'index.php';
                 </script>";
        }
        else
        {
            echo "<script>
            alert('Simpan data GAGAL!!');
            document.location= 'index.php';
         </script>"; 
        }                       
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>UAS WEB</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <h1 class="text-center">UAS WEB</h1>
    <h2 class="text-center">Tashya Mahoro</h2>


    <div class="card mt-3">
    <div class="card-header bg-primary text-white ">
        Form Input Data Anggota KWP 6
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label>NIK</label>
                <input type="text" name="tNIK" class="form-control" placeholder="Input NIK anda disini!" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="tNama" class="form-control" placeholder="Input Nama anda disini!" required>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="text" name="tTanggal Lahir" class="form-control" placeholder="Input Tanggal Lahir anda disini!" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="tAlamat" placeholder="Input Alamat anda disini!"></textarea>
            </div>

            <button type="submit" class="btn btn-success"name="bSimpan">Simpan</button>
            <button type="reset" class="btn btn-danger"name="bReset">Kosongkan</button>
        </form>
    </div>
    </div>

    <!-- Awal Card Tabel -->
    <div class="card mt-3">
    <div class="card-header bg-success text-white ">
        Daftar Anggota KWP 6
    </div>
    <div class="card-body">

        <table class= "table table-bordered table-striped">
            <tr>
                <th>No.</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php
                $no = 1;
                $tampil = mysqli_query($koneksi,"SELECT * from tkwp order by id_kwp desc");
                while($data = mysqli_fetch_array($tampil)) :
            ?>
            <tr>
                <td><?=$no++;?></td>
                <td><?=$data ['nik']?></td>
                <td><?=$data ['nama']?></td>
                <td><?=$data ['tanggal_lahir']?></td>
                <td><?=$data ['alamat']?></td>
                <td>
                    <a href="#" class="btn btn-warning"> Edit </a>
                    <a href="#" class="btn btn-danger"> Hapus </a>

                </td>
            </tr>
        <?php endwhile; //penutup perulangan while ?>
        </table>
        
    </div>
    </div>
    <!-- Akhir Card Tabel-->

</div>

<script type="text/javascript" scr="js/bootstrap.min.js"></script>
</body>
</html>   