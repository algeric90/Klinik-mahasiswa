<?php
session_start();
require_once '../../helper/connection.php';

$id_obat = $_POST['id_obat'];
$nama_obat = $_POST['nama_obat'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];

$query = mysqli_query($connection, "UPDATE obat SET nama_obat = '$nama_obat', jenis = '$jenis', harga = '$harga' WHERE id_obat = '$id_obat'");
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
