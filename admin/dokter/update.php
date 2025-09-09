<?php
session_start();
require_once '../../helper/connection.php';

$id_dokter = $_POST['id_dokter'];
$nama = $_POST['nama'];
$email = $_POST['email'];

$query = mysqli_query($connection, "UPDATE dokter SET nama = '$nama', email = '$email' WHERE id_dokter = '$id_dokter'");
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