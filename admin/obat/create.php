<?php
require_once '../layout/_top.php';
require_once '../../helper/connection.php';
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Obat</h1>
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
                <td>ID obat</td>
                <td><input class="form-control" type="text" name="id_obat" size="20" required></td>
              </tr>

              <tr>
                <td>nama</td>
                <td><input class="form-control" type="text" name="nama_obat" size="20" required></td>
              </tr>

              <tr>
                <td>Jenis Obat</td>
                <td><input class="form-control" type="text" name="jenis" size="20" required></td>
              </tr>
              
              <tr>
                <td>Harga</td>
                <td><input class="form-control" type="text" name="harga" size="20" required></td>
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