<?php
    $hostname = "localhost";
    $port = 3306;
    $username = "root";
    $password = "";
    $database = "db_film";

    try{
        $connection = new mysqli($hostname, $username,$password, $database, $port);
    } catch(Exception $e){
        echo "<script>alert('koneksi gagal');</script>";
    }
?>