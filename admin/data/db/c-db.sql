-- Active: 1666269235716@@127.0.0.1@3306@c-db
CREATE DATABASE klinik_mhs;
use klinik_mhs;
-- Create table for Admin
CREATE TABLE admin (
  username VARCHAR(50) PRIMARY KEY,
  password VARCHAR(50) NOT NULL,
  level ENUM('admin') NOT NULL
);
INSERT INTO admin (username, password, level) VALUES 
    ('admin', 'admin123', 'admin');

drop TABLE admin;

use db_klinik;
-- Create table for mahasiswa
CREATE TABLE mahasiswa (
  username varchar(50) PRIMARY KEY,
  nama VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL,
  level ENUM('mahasiswa') NOT NULL
);

drop table mahasiswa;
INSERT INTO mahasiswa (username, nama, email, password, level) VALUES 
    ('dani', 'dani', 'dani@gmail.com', 'dani123', 'mahasiswa'),
    ('alif', 'alif', 'alif@gmail.com', 'alif123', 'mahasiswa'),
    ('alfa', 'alfa', 'alfa@gmail.com', 'alfa123', 'mahasiswa'),
    ('wahyu', 'wahyu', 'wahyu@gmail.com', 'wahyu123', 'mahasiswa');
-- Create table for dokter
CREATE TABLE dokter (
  id_dokter INT PRIMARY KEY,
  nama VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL,
  level ENUM('dokter') NOT NULL
);

-- Create table for ruangan
CREATE TABLE ruangan (
  id_ruangan INT PRIMARY KEY,
  nama_ruangan VARCHAR(50) NOT NULL
);

-- Create table for pemeriksaan
CREATE TABLE pemeriksaan (
  id_pemeriksaan INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  id_dokter INT NOT NULL,
  tanggal DATE NOT NULL,
  keluhan VARCHAR(100) NOT NULL,
  diagnosa VARCHAR(100) NOT NULL,
  FOREIGN KEY (username) REFERENCES mahasiswa(username),
  FOREIGN KEY (id_dokter) REFERENCES dokter(id_dokter)
);
drop TABLE pemeriksaan;

-- Create table for obat
CREATE TABLE obat (
  id_obat INT PRIMARY KEY,
  nama VARCHAR(50) NOT NULL,
  jenis VARCHAR(50) NOT NULL,
  harga INT NOT NULL
);

-- Create table for resep
CREATE TABLE resep (
  id_resep INT PRIMARY KEY,
  id_pemeriksaan INT NOT NULL,
  id_obat INT NOT NULL,
  jumlah INT NOT NULL,
  FOREIGN KEY (id_pemeriksaan) REFERENCES pemeriksaan(id_pemeriksaan),
  FOREIGN KEY (id_obat) REFERENCES obat(id_obat)
);
drop table resep;

-- Create table for pembayaran
CREATE TABLE pembayaran (
  id_pembayaran INT PRIMARY KEY,
  id_pemeriksaan INT NOT NULL,
  total_harga INT NOT NULL,
  tanggal_bayar DATE NOT NULL,
  FOREIGN KEY (id_pemeriksaan) REFERENCES pemeriksaan(id_pemeriksaan)
);
drop TABLE pembayaran;

-- Create table for jadwal_dokter
CREATE TABLE jadwal_dokter (
  id_jadwal INT PRIMARY KEY,
  id_dokter INT NOT NULL,
  hari VARCHAR(10) NOT NULL,
  jam_mulai TIME NOT NULL,
  jam_selesai TIME NOT NULL,
  FOREIGN KEY (id_dokter) REFERENCES dokter(id_dokter)
);

-- Create table for rekam medis
CREATE TABLE rekam_medis (
  id_rekam_medis INT PRIMARY KEY,
  id_pemeriksaan INT NOT NULL,
  keluhan VARCHAR(100) NOT NULL,
  diagnosa VARCHAR(100) NOT NULL,
  FOREIGN KEY (id_pemeriksaan) REFERENCES pemeriksaan(id_pemeriksaan)
);
drop table jadwal_dokter;
ALTER TABLE dokter
ADD CONSTRAINT unique_nama_dokter UNIQUE (nama);

------------------------------------------------------

ALTER TABLE ruangan
ADD CONSTRAINT unique_nama_ruangan UNIQUE (nama_ruangan);

------------------------------------------------------

CREATE TABLE jadwal_dokter (
  id INT,
  Hari ENUM('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu') NOT NULL,
  nama VARCHAR(50) NOT NULL,
  nama_ruangan VARCHAR(50) NOT NULL,
  jam_mulai TIME,
  jam_selesai TIME,
  PRIMARY KEY (id, Hari),
  FOREIGN KEY (nama) REFERENCES dokter(nama),
  FOREIGN KEY (nama_ruangan) REFERENCES ruangan(nama_ruangan)
);

-----------------------------------------------------


INSERT INTO jadwal_dokter (id, Hari, nama, nama_ruangan, jam_mulai, jam_selesai)
VALUES 
  -- Joko
  (1, 'Senin', 'Joko', 'Mawar', '07:00:00', '10:00:00'),
  (2, 'Selasa', 'Joko', 'Mawar', '09:00:00', '12:00:00'),
  (3, 'Rabu', 'Joko', 'Mawar', '08:30:00', '11:30:00'),
  (4, 'Kamis', 'Joko', 'Mawar', '07:30:00', '10:30:00'),
  (5, 'Jumat', 'Joko', 'Mawar', '09:30:00', '12:30:00'),

  -- Budi
  (6, 'Senin', 'Budi', 'Anggrek', '08:00:00', '11:00:00'),
  (7, 'Selasa', 'Budi', 'Anggrek', '10:00:00', '13:00:00'),
  (8, 'Rabu', 'Budi', 'Anggrek', '09:30:00', '12:30:00'),
  (9, 'Kamis', 'Budi', 'Anggrek', '08:30:00', '11:30:00'),
  (10, 'Jumat', 'Budi', 'Anggrek', '10:30:00', '13:30:00'),

  -- Angga
  (11, 'Senin', 'Angga', 'Melati', '09:00:00', '12:00:00'),
  (12, 'Selasa', 'Angga', 'Melati', '11:00:00', '14:00:00'),
  (13, 'Rabu', 'Angga', 'Melati', '10:30:00', '13:30:00'),
  (14, 'Kamis', 'Angga', 'Melati', '09:30:00', '12:30:00'),
  (15, 'Jumat', 'Angga', 'Melati', '11:30:00', '14:30:00');
  CREATE TRIGGER nama_trigger
AFTER INSERT ON mahasiswa
FOR EACH ROW
BEGIN
    INSERT INTO login ( username, password)
    VALUES ( NEW.username, NEW.password);
END;
