CREATE DATABASE db_quiz_pweb;

USE db_quiz_pweb;

-- Karyawan
CREATE TABLE karyawan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nik VARCHAR(16) NOT NULL UNIQUE,
    nama VARCHAR(30) NOT NULL,
    jk ENUM('L', 'P') NOT NULL,
    departemen ENUM('IT', 'HR', 'Marketing', 'Operations') NOT NULL,
    status ENUM('Tetap', 'Kontrak') NOT NULL,
    tgl_masuk DATE NOT NULL
);

-- Pasien
CREATE TABLE pasien (
    id INT AUTO_INCREMENT PRIMARY KEY,
    no_ktp VARCHAR(16) NOT NULL UNIQUE,
    nama_pasien VARCHAR(30) NOT NULL,
    jk ENUM('L', 'P') NOT NULL,
    tgl_lahir DATE NOT NULL,
    alamat TEXT NOT NULL
);

-- Calon Mahasiswa
CREATE TABLE calon_mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomor_registrasi VARCHAR(16) NOT NULL UNIQUE,
    nama VARCHAR(30) NOT NULL,
    jk ENUM('L', 'P') NOT NULL,
    tgl_lahir DATE NOT NULL,
    sekolah_asal VARCHAR(60) NOT NULL,
    jurusan VARCHAR(30) NOT NULL,
    lulusan_tahun YEAR NOT NULL
);

INSERT INTO karyawan (nik, nama, jk, departemen, status, tgl_masuk)
VALUES
('K001', 'Andi Setiawan', 'L', 'IT', 'Tetap', '2022-01-15'),
('K002', 'Rina Puspita', 'P', 'HR', 'Kontrak', '2024-03-01'),
('K003', 'Budi Santoso', 'L', 'Marketing', 'Tetap', '2023-11-20');

INSERT INTO pasien (no_ktp, nama_pasien, jk, tgl_lahir, alamat)
VALUES
('3201012345678901', 'Siti Aminah', 'P', '1990-05-12', 'Jl. Merdeka No. 10, Jakarta'),
('3202012345678902', 'Ahmad Yusuf', 'L', '1985-08-20', 'Jl. Sudirman No. 20, Bandung'),
('3203012345678903', 'Maria Simanjuntak', 'P', '1992-12-05', 'Jl. Diponegoro No. 30, Medan');

INSERT INTO calon_mahasiswa (nomor_registrasi, nama, jk, tgl_lahir, sekolah_asal, jurusan, lulusan_tahun)
VALUES
('REG001', 'Agus Saputra', 'L', '2002-04-15', 'SMA Negeri 1 Jakarta', 'Teknik Informatika', 2020),
('REG002', 'Dewi Lestari', 'P', '2001-11-30', 'SMA Negeri 5 Bandung', 'Manajemen', 2019),
('REG003', 'Yudi Pratama', 'L', '2003-06-25', 'SMA Negeri 2 Surabaya', 'Ekonomi', 2021);

SELECT * FROM karyawan;
SELECT * FROM pasien;
SELECT * FROM calon_mahasiswa;


