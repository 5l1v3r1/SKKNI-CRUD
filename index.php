<html lang="en">

<head>
    <title>CRUD</title>
</head>

<body>
    <form action="" method="post">
        <fieldset>
            <legend>Form Input Data Siswa</legend>
            <input type="text" placeholder="NIS" name="nis"><br><br>
            <input type="text" placeholder="Nama" name="nama"><br><br>
            <input type="text" placeholder="No Hp" name="nohp"><br><br>
            <input type="email" placeholder="Email" name="email"><br><br>
            <button type="submit">Simpan</button>
        <fieldset>
</form>
    <fieldset>
        <legend>Hasil</legend>
        <?php
        require("config/koneksi.php");
        require("function/siswa.php");
        //require("function/koneksi.php");
        require("function/pesan.php");
        $koneksi = koneksi("localhost", "root", "", "pelatihan");
        if (isset($_POST['nis']) && isset($_POST['nama']) && isset($_POST['nohp']) && isset($_POST['email'])) {
            $input = array(
                $_POST['nis'],
                $_POST['nama'],
                $_POST['nohp'],
                $_POST['email']
            );
            if (simpanSiswa($input, $koneksi)) {
                pesan_sukses("data berhasil disimpan");
            } else {
                pesan_gagal("data gagal disimpan");
            }
        }
        ?>
    </fieldset>
    <fieldset>
        <legend>Data Siswa</legend>
        <?php
        $koneksi = koneksi("localhost", "root", "", "pelatihan");

        ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nama</th>
                    <th>No Hp</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $data = dataSiswa($koneksi);
            $no = 1;
            //var_dump($koneksi);
            while ($hasil = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $hasil['nis']; ?></td>
                    <td><?php echo $hasil['nama']; ?></td>
                    <td><?php echo $hasil['nohp']; ?></td>
                    <td><?php echo $hasil['email']; ?></td>
                    <td>
                        <a href="pages/siswa/edit/?id=<?php echo $hasil['id'] ?>">Edit</a>
                        <a href="pages/siswa/delete/?id=<?php echo $hasil['id'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php }
            ?>
        </table>
    </fieldset>
</body>

</html>
 