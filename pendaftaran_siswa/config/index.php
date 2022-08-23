<?php
session_start();

// DATABASE
define('DATABASE', 'pendaftaran_siswa');
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');

// SERVER
define('PROJECT_FOLDER', 'pendaftaran_siswa');
define('ORIGIN', 'localhost');
define('PROTOCOL', 'http');

$mysqli = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
