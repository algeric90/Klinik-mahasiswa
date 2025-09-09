<?php
require_once '../../user/layout/_top.php';
require_once '../../helper/connection.php';

$result = null; // Inisialisasi variabel $result
$username = $_SESSION['login']['username'];
$result = mysqli_query($connection, "SELECT * FROM pemeriksaan WHERE username='$username'");

?>
<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Rekam Medis</h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>ID Pemeriksaan</th>
                  <th>Nama Mahasiswa</th>
                  <th>Nama Dokter</th>
                  <th>Tanggal</th>
                  <th>Keluhan</th>
                  <th>Diagnosa</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                  while ($data = mysqli_fetch_array($result)) {
                    $id_pemeriksaan = $data['id_pemeriksaan'];
                    $id_dokter = $data['id_dokter'];

                    // Mendapatkan data mahasiswa
                    $mahasiswa_result = mysqli_query($connection, "SELECT username FROM mahasiswa WHERE username='" . $data['username'] . "'");
                    $mahasiswa_data = mysqli_fetch_array($mahasiswa_result);
                    $nama_mahasiswa = $mahasiswa_data['username'];

                    // Mendapatkan data dokter
                    $dokter_result = mysqli_query($connection, "SELECT nama FROM dokter WHERE id_dokter='$id_dokter'");
                    $dokter_data = mysqli_fetch_array($dokter_result);
                    $nama_dokter = $dokter_data['nama'];
                ?>
                    <tr>
                      <td><?= $id_pemeriksaan ?></td>
                      <td><?= $nama_mahasiswa ?></td>
                      <td><?= $nama_dokter ?></td>
                      <td><?= $data['tanggal'] ?></td>
                      <td><?= $data['keluhan'] ?></td>
                      <td><?= $data['diagnosa'] ?></td>
                    </tr>
                <?php
                  }
                } else {
                ?>
                  <tr>
                    <td colspan="6">Tidak ada rekam medis yang ditemukan.</td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once '../../user/layout/_bottom.php'; ?>

<!-- Page Specific JS File -->
<?php
if (isset($_SESSION['info'])) {
  if ($_SESSION['info']['status'] == 'success') {
?>
    <script>
      iziToast.success({
        title: 'Sukses',
        message: `<?= $_SESSION['info']['message'] ?>`,
        position: 'topCenter',
        timeout: 5000
      });
    </script>
  <?php
  } else {
  ?>
    <script>
      iziToast.success({
        title: 'Sukses',
        message: `<?= $_SESSION['info']['message'] ?>`,
        timeout: 5000,
        position: 'topCenter'
      });
    </script>
<?php
  }

  unset($_SESSION['info']);
  $_SESSION['info'] = null;
}
?>
<script src="../../user/assets/js/page/modules-datatables.js"></script>
