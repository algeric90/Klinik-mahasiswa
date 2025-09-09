<?php
require_once '../layout/_top.php';
require_once '../../helper/connection.php';

$id_pemeriksaan = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM pemeriksaan WHERE id_pemeriksaan='$id_pemeriksaan'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Rekam Medis</h1>
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
              <input type="hidden" name="id_pemeriksaan" value="<?= $row['id_pemeriksaan'] ?>">
              <table cellpadding="8" class="w-100">
              
              <tr>
                <td>ID Pemeriksaan</td>
                <td><input class="form-control" type="text" name="id_pemeriksaan" size="20" required value="<?= $row['id_pemeriksaan'] ?>"></td>
              </tr>

              <tr>
                <td>Username Mahasiswa</td>
                <td><input class="form-control" type="text" name="username" size="20" required value="<?= $row['username'] ?>"></td>
              </tr>

              <tr>
                <td>ID Dokter</td>
                <td><input class="form-control" type="number" name="id_dokter" size="20" required value="<?= $row['id_dokter'] ?>"></td>
              </tr>

              <tr>
                <td>ID Obat</td>
                <td><input class="form-control" type="number" name="id_obat" size="20" required value="<?= $row['id_obat'] ?>"></td>
              </tr>

              <tr>
                <td>ID Ruangan</td>
                <td><input class="form-control" type="number" name="id_ruangan" size="20" required value="<?= $row['id_ruangan'] ?>"></td>
              </tr>

              <tr>
                <td>Tanggal</td>
                <td><input class="form-control" type="date" name="tanggal" size="20" required value="<?= $row['tanggal'] ?>"></td>
              </tr>

              <tr>
                <td>Keluhan</td>
                <td><input class="form-control" type="text" name="keluhan" size="20" required value="<?= $row['keluhan'] ?>"></td>
              </tr>

              <tr>
                <td>Diagnosa</td>
                <td><input class="form-control" type="text" name="diagnosa" size="20" required value="<?= $row['diagnosa'] ?>"></td>
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