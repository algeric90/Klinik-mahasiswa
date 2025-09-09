<?php
session_start();
require_once '../../helper/connection.php';

$username = $_POST['username'];
$id_dokter= $_POST['id_dokter'];
$id_obat = $_POST['id_obat'];
$id_ruangan = $_POST['id_ruangan'];
$tanggal = $_POST['tanggal'];
$keluhan = $_POST['keluhan'];
$diagnosa = $_POST['diagnosa'];

$query = mysqli_query($connection, "INSERT INTO pemeriksaan (username, id_dokter, id_obat, id_ruangan, tanggal, keluhan, diagnosa) VALUES ('$username', '$id_dokter', '$id_obat', '$id_ruangan', '$tanggal', '$keluhan', '$diagnosa')");
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

