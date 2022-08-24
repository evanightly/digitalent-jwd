<?php
session_start();

if (isset($_POST['login'])) {
    extract($_POST);
    if ($email !== "admin@gmail.com" && $password !== "admin") {
        $_SESSION['message'] = "Email atau password salah";
        return header("location: login.php");
    }
    $_SESSION['message'] = "Berhasil Login";
    header("location: index.php");
}
