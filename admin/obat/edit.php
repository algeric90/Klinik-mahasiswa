<?php
require_once '../layout/_top.php';
require_once '../../helper/connection.php';

$id_obat = $_GET['id_obat'];
$query = mysqli_query($connection, "SELECT * FROM obat WHERE id_obat='$id_obat'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Obat</h1>
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
              <input type="hidden" name="id_obat" value="<?= $row['id_obat'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>ID Obat</td>
                  <td><input class="form-control" type="text" name="id_obat" size="20" required value="<?= $row['id_obat'] ?>"></td>
                </tr>
                <tr>
                  <td>nama</td>
                  <td><input class="form-control" type="text" name="nama_obat" size="20" required value="<?= $row['nama_obat'] ?>"></td>
                </tr>
                <tr>
                  <td>jenis</td>
                  <td><input class="form-control" type="text" name="jenis" size="20" required value="<?= $row['jenis'] ?>"></td>
                </tr>
                <tr>
                  <td>harga</td>
                  <td><input class="form-control" type="text" name="harga" size="20" required value="<?= $row['harga'] ?>"></td>
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