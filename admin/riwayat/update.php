<?php
session_start();
require_once '../../helper/connection.php';

$id_pemeriksaan = $_POST['id_pemeriksaan'];
$username = $_POST['username'];
$id_dokter= $_POST['id_dokter'];
$id_obat = $_POST['id_obat'];
$id_ruangan = $_POST['id_ruangan'];
$tanggal = $_POST['tanggal'];
$keluhan = $_POST['keluhan'];
$diagnosa = $_POST['diagnosa'];

$result = mysqli_query($connection, "UPDATE pemeriksaan
SET username = '$username', id_dokter = '$id_dokter', id_obat = '$id_obat', id_ruangan = '$id_ruangan', tanggal = '$tanggal', keluhan = '$keluhan', diagnosa = '$diagnosa'
WHERE id_pemeriksaan = $id_pemeriksaan");

if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}