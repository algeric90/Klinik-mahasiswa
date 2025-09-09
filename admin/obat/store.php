<?php
session_start();
require_once '../../helper/connection.php';

$id_obat = $_POST['id_obat'];
$nama_obat = $_POST['nama_obat'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];

$query = mysqli_query($connection, "INSERT INTO obat (id_obat, nama_obat, jenis, harga) VALUES ('$id_obat', '$nama_obat', '$jenis', '$harga')");

if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
                                            } else {
                                              $_SESSION['info'] = [
                                                'status' => 'failed',
                                                'message' => mysqli_error($connection)
                                              ];
                                              header('Location: ./index.php');
                                            }
