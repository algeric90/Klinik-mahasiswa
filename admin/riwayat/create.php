<?php
require_once '../layout/_top.php';
require_once '../../helper/connection.php';
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Rekam Medis</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./store.php" method="POST">
            <table cellpadding="8" class="w-100">

              <tr>
                <td>Username Mahasiswa</td>
                <td><input class="form-control" type="text" name="username" size="20" required></td>
              </tr>

              <tr>
                <td>ID Dokter</td>
                <td><input class="form-control" type="number" name="id_dokter" size="20" required></td>
              </tr>

              <tr>
                <td>ID Obat</td>
                <td><input class="form-control" type="number" name="id_obat" size="20" required></td>
              </tr>

              <tr>
                <td>ID Ruangan</td>
                <td><input class="form-control" type="number" name="id_ruangan" size="20" required></td>
              </tr>

              <tr>
                <td>Tanggal</td>
                <td><input class="form-control" type="date" name="tanggal" size="20" required></td>
              </tr>

              <tr>
                <td>Keluhan</td>
                <td><input class="form-control" type="text" name="keluhan" size="20" required></td>
              </tr>

              <tr>
                <td>Diagnosa</td>
                <td><input class="form-control" type="text" name="diagnosa" size="20" required></td>
              </tr>
              
              <tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                  <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan"></td>
              </tr>

            </table>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>