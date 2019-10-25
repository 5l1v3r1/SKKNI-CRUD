<?php
if (isset($_GET['id'])) {
    $id = abs($_GET['id']);
    if ($id > 0) {
        require("../../../config/koneksi.php");
        require("../../../function/siswa.php");
        require("../../../function/pesan.php");

        $koneksi = koneksi("localhost", "root", "", "pelatihan");
        deleteSiswa($id, $koneksi);
        header("location:../../../");
    }
}