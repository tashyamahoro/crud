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
        //Pengujian Apakah data akan diedit atau disimpan baru
        if($_GET['hal'] == "edit")
        {
            //Data akan diedit
            $edit = mysqli_query($koneksi,"UPDATE tkwp set
                                               nik = '$_POST[tNIK]',
                                               nama = '$_POST[tNama]',
                                               tanggal_lahir = '$_POST[tTanggal_Lahir]',
                                               alamat = '$_POST[tAlamat]'
                                            WHERE id_kwp = '$_GET[id]'
                                          ");
            if($edit) //jika edit sukses
            {
                echo "<script>
                        alert('Edit data sukses!');
                        document.location= 'index.php';
                    </script>";
            }
            else
            {
                echo "<script>
                        alert('Edit data GAGAL!!');
                        sdocument.location= 'index.php';
                    </script>"; 
            }
        }
        else 
        {
            //Data akan disimpan baru
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

                               
    }

    //Pengujuian jika tombol edit atau hapus diklik
    if(isset($_GET['hal']))
    {
        //Pengujian jika edit data
        if($_GET['hal'] == "edit")
        {
            //Tampilkan Data yang akan diedit
            $tampil = mysqli_query($koneksi,"SELECT * FROM tkwp WHERE id_kwp ='$_GET[id]' ");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //Jika data ditemukan, maka data ditampung dulu ke dalam variabel
                $vnik =$data['nik'];
                $vnama =$data['nama'];
                $vtanggal_lahir =$data['tanggal_lahir'];
                $valamat =$data['alamat'];
            }
        }
        else if ($_GET['hal'] == "hapus")
        {
            //Persiapan hapus data
            $hapus = mysqli_query($koneksi, "DELETE  FROM  tkwp WHERE id_kwp = '$_GET[id]' ");
            if($hapus){
                echo "<script>
                        alert('Hapus Data Suksess!!');
                        document.location='index.php';
                    </script>";   
            }
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
                <input type="text" name="tNIK" value= "<?=@$vnik?>" class="form-control" placeholder="Input NIK anda disini!" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="tNama" value= "<?=@$vnama?>" class="form-control" placeholder="Input Nama anda disini!" required>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="text" name="tTanggal Lahir"  value= "<?=@$vtanggal_lahir?>" class="form-control" placeholder="Input Tanggal Lahir anda disini!" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="tAlamat" placeholder="Input Alamat anda disini!"><?=@$valamat?></textarea>
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
                    <a href="index.php?hal=edit&id=<?=$data['id_kwp']?>" class="btn btn-warning"> Edit </a>
                    <a href="index.php?hal=hapus&id=<?=$data['id_kwp']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>

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