<?php

function koneksi ($host, $user, $pass, $db) {
    $koneksi = new mysqli($host, $user, $pass, $db);
    if($koneksi->connect_errno) {
        echo "Failed to connect to MYSQL: (" . $koneksi->connect_errno . ") " . $koneksi->connect_errno;
    }
    return $koneksi;
}

// add call function
koneksi("localhost", "root", "", "warifp");
?>