DROP DATABASE IF EXISTS pendaftaran_siswa;

CREATE DATABASE pendaftaran_siswa;

use pendaftaran_siswa;

CREATE TABLE IF NOT EXISTS siswa (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(50) NOT NULL,
    alamat TEXT NOT NULL,
    jenis_kelamin ENUM('L', 'P') NOT NULL,
    agama CHAR(10) NOT NULL,
    sekolah_asal VARCHAR(30) NOT NULL,
    createdAt DATETIME DEFAULT NOW() NOT NULL
);

INSERT INTO siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal)
VALUES
('Aldi Fahri', 'Lombok', 'L', 'Islam', 'SMPN 7 MALANG'),
('Devi Kurnia', 'Surabaya', 'P', 'Katolik', 'SMPN 2 MALANG'),
('Hari Subagyo', 'Malang', 'L', 'Hindu', 'SMP TELKOM MALANG');
