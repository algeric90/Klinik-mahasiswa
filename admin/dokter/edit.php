<?php
require_once '../layout/_top.php';
require_once '../../helper/connection.php';

$id_dokter = $_GET['id_dokter'];
$query = mysqli_query($connection, "SELECT * FROM dokter WHERE id_dokter='$id_dokter'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Dokter</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <input type="hidden" name="id_dokter" value="<?= $row['id_dokter'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>id_dokter</td>
                  <td><input class="form-control" type="number" name="id_dokter" size="20" required value="<?= $row['id_dokter'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Nama Dokter</td>
                  <td><input class="form-control" type="text" name="nama" size="20" required value="<?= $row['nama'] ?>"></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><input class="form-control" type="text" name="email" size="20" required value="<?= $row['email'] ?>"></td>
                </tr>

                <tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
                </tr>
              </table>

            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>