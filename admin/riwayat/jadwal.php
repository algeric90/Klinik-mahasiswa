<?php
require_once '../../admin/layout/_top.php';
require_once '../../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM jadwal_dokter");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Jadwal Dokter</h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>ID Dokter</th>
                  <th>Hari</th>
                  <th>Nama Dokter</th>
                  <th>Nama Ruangan</th>
                  <th>Jam Mulai</th>
                  <th>Jam Selesai</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) :
                ?>

                  <tr>
                    <td><?= $data['id'] ?></td>
                    <td><?= $data['Hari'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['nama_ruangan'] ?></td>
                    <td><?= $data['jam_mulai'] ?></td>
                    <td><?= $data['jam_selesai'] ?></td>
                  </tr>

                <?php
                endwhile;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once '../../admin/layout/_bottom.php';
?>
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
      iziToast.error({
        title: 'Gagal',
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
<script src="../../admin/assets/js/page/modules-datatables.js"></script>
