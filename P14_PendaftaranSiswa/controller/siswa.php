<?php

include_once "../config/index.php";

if (isset($_POST['delete'])) {
    $statement = $mysqli->prepare("DELETE FROM siswa WHERE id = ?");
    $statement->bind_param("i", $_POST['delete']);
    $statement->execute();
    $statement->close();

    $_SESSION['message'] = ["type" => "Success", "body" => "Data berhasil dihapus"];
    header(sprintf("location: %s://%s/%s/pendaftar.php", PROTOCOL, ORIGIN, PROJECT_FOLDER));
}

if (isset($_POST['create'])) {
    extract($_POST['siswa']);
    $statement = $mysqli->prepare("INSERT INTO siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal) VALUES(?, ?, ?, ?, ?)");
    $statement->bind_param("sssss", $nama, $alamat, $jenis_kelamin, $agama, $sekolah_asal);
    $statement->execute();
    $statement->close();

    $_SESSION['message'] = ["type" => "Success", "body" => "Berhasil terdaftar"];
    header(sprintf("location: %s://%s/%s/pendaftar.php", PROTOCOL, ORIGIN, PROJECT_FOLDER));
}

if (isset($_POST['update'])) {
    var_dump($_POST);
    extract($_POST['siswa']);
    $statement = $mysqli->prepare("UPDATE siswa SET nama = ?, alamat = ?, jenis_kelamin = ?, agama = ?, sekolah_asal = ? WHERE id = ?");
    $statement->bind_param("ssssss", $nama, $alamat, $jenis_kelamin, $agama, $sekolah_asal, $id);
    $statement->execute();
    $statement->close();

    $_SESSION['message'] = ["type" => "Success", "body" => "Berhasil diperbarui"];
    header(sprintf("location: %s://%s/%s/pendaftar.php", PROTOCOL, ORIGIN, PROJECT_FOLDER));
}
