<?php
session_start();

// DATABASE
define('DATABASE', 'pendaftaran_siswa');
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');

// SERVER

// Nama folder proyek di folder htdocs
define('PROJECT_FOLDER', 'digitalent-jwd/P14_PendaftaranSiswa');
define('ORIGIN', 'localhost');
define('PROTOCOL', 'http');

$mysqli = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
