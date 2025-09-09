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
drop table rekam_medis;