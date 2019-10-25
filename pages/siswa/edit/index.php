<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widht-device-width, intial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    
    <title>Edit Data Siswa</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $id = abs($_GET['id']);
        if ($id > 0) {
            require("../../../config/koneksi.php");
            require("../../../function/siswa.php");
            require("../../../function/pesan.php");

            $koneksi = koneksi("localhost", "root", "", "pelatihan");
            ?>
            <a href="../../..">Back To List</a>
            <fieldset>
                <legend>Hasil</legend>
                <?php
                if (isset($_POST['nis']) && isset($_POST['nama']) && isset($_POST['nohp']) && isset($_POST['email'])) {
                    $input = array(
                        $_POST['id'],
                        $_POST['nis'],
                        $_POST['nama'],
                        $_POST['nohp'],
                        $_POST['email']
                    );
                    if (simpanEditSiswa($input, $koneksi)) {
                        pesan_sukses("data berhasil disimpan");
                    } else {
                        pesan_gagal("data gagal disimpan");
                    }
                }
                ?>
            </fieldset>
            <?php
            $data = getSiswa($id, $koneksi);
            $siswa = mysqli_fetch_array($data);

            if ($data->num_rows == 1) {
                ?>
            
            <form action="" method="post">
                <fieldset>
                    <legend>Form Input Data Siswa</legend>
                    <input type="text" placeholder="NIS" name="nis" value="<?php echo  $siswa['nis'] ?>"><br><br>
                    <input type="text" placeholder="Nama" name="nama" value="<?php echo  $siswa['nama'] ?>"><br><br>
                    <input type="text" placeholder="No HP" name="nohp" value="<?php echo  $siswa['nohp'] ?>"><br><br>
                    <input type="text" placeholder="Email" name="email" value="<?php echo  $siswa['email'] ?>"><br><br>
                    <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>">
                    <button type="submit">Simpan</button>
            </form>

            <?php }
        }
    } ?>
</body>
</html>