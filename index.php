<?php
session_start();
if(isset($_SESSION['login'])){
  $level = $_SESSION['login']['level']; // Mengambil nilai level dari session

  if($level == '1') {
    header('Location: admin/index_admin.php'); // Pengalihan header untuk admin
  } elseif($level == '2') {
    header('Location: user/index_user.php'); // Pengalihan header untuk user
  } else {
    header('Location: ./login.php'); // Jika level tidak dikenali, kembali ke halaman login
  }
} else {
  header('Location: ./login.php'); // Jika tidak ada session login, kembali ke halaman login
}
?>


