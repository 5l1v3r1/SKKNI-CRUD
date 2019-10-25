<?php

function simpanSiswa($input, $koneksi) {
    if(mysqli_query($koneksi, "insert into siswa values (null, '$input[0]', '$input[1]', '$input[2]', '$input[3]')"))
    {
        return true;
    } else {
        print_r($input);
        echo mysqli_error($koneksi);
        return false;
    }
}

function simpanEditSiswa($input, $koneksi){
    if ($query=mysqli_query($koneksi, "update siswa set nis= '$input[1]', nama= '$input[2]', nohp= '$input[3]', email= '$input[4]' where id=$input[0]")) {
        return $query;
    }else{
        print_r($input);
        echo mysqli_error($koneksi);
        return false;
        }
    }

function dataSiswa($koneksi) {
    if ($query = mysqli_query($koneksi, "select * from siswa")) {
        return $query;
    } else {
        print_r($input);
        echo mysqli_error($koneksi);
        return false;
    }
}

function deleteSiswa($id, $koneksi) {
    if ($query = mysqli_query($koneksi, "delete from siswa where id=$id")) {
        return $query;
    } else {
        print_r($input);
        echo mysqli_error($koneksi);
        return false;
    }
}

function getSiswa($id, $koneksi) {
    if ($query = mysqli_query($koneksi, "select * from siswa where id=$id")) {
        return $query;
    } else {
        print_r($input);
        echo mysqli_error($koneksi);
        return false;
    }
}