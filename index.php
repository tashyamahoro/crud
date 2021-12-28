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

</div>

<script type="text/javascript" scr="js/bootstrap.min.js"></script>
</body>
</html>   