<?php
require_once '../../admin/layout/_top.php';
require_once '../../helper/connection.php';

$result = mysqli_query($connection, "SELECT p.*, m.nama AS nama_mahasiswa, d.nama AS nama_dokter FROM pemeriksaan p
    INNER JOIN mahasiswa m ON p.username = m.username
    INNER JOIN dokter d ON p.id_dokter = d.id_dokter
    ORDER BY p.id_pemeriksaan ASC");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Rekam Medis</h1>
    <a href="./create.php" class="btn btn-primary">Tambah Data</a>
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
                  <th style="width: 150px;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) :
                ?>

                  <tr>
                    <td><?= $data['id_pemeriksaan'] ?></td>
                    <td><?= $data['nama_mahasiswa'] ?></td>
                    <td><?= $data['nama_dokter'] ?></td>
                    <td><?= $data['tanggal'] ?></td>
                    <td><?= $data['keluhan'] ?></td>
                    <td><?= $data['diagnosa'] ?></td>
                    <td>
                      <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?id=<?= $data['id_pemeriksaan'] ?>">
                        <i class="fas fa-trash fa-fw"></i>
                      </a>
                      <a class="btn btn-sm btn-info" href="edit.php?id=<?= $data['id_pemeriksaan'] ?>">
                        <i class="fas fa-edit fa-fw"></i>
                      </a>
                    </td>
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
if (isset($_SESSION['info'])) :
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
        title: 'sukses',
        message: `<?= $_SESSION['info']['message'] ?>`,
        timeout: 5000,
        position: 'topCenter'
      });
    </script>
<?php
  }

  unset($_SESSION['info']);
  $_SESSION['info'] = null;
endif;
?>
<script src="../../admin/assets/js/page/modules-datatables.js"></script>
