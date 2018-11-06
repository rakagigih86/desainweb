<?php

    $conn=mysqli_connect("localhost","root","","phpdatabase");

    if(!$conn){
        die('Koneksi Error : '.mysqli_connect_errno()
        .' - '.mysqli_connect_error());
    }

    $result=mysqli_query($conn,"SELECT * FROM mahasiswa");


    function query($query_kedua)
    {
        
        global $conn;
        $result=mysqli_query($conn,$query_kedua);

        $rows = [];
        while ( $row = mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }

    function tambah ($data)
    {
        global $conn;

        $nama=$data["Nama"];
        $nim=$data["Nim"];
        $email=$data["Email"];
        $jurusan=$data["Jurusan"];
        $gambar=$data["Gambar"];

        $query= " INSERT INTO mahasiswa
                    VALUES
                    ('','$nama','$nim','$email','$jurusan','$gambar')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);

    }

    function hapus ($id){
        global $conn;
        mysqli_query($conn,"DELETE FROM mahasiswa WHERE id =$id ");
        return mysqli_affected_rows($conn);
    }
?>