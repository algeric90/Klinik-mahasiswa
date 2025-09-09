<?php
require_once '../../admin/layout/_top.php';
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Jadwal Operasional</h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>Hari</th>
                  <th>Jam Operasional</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Senin</td>
                  <td>07:00 - 12:00</td>
                </tr>
                <tr>
                  <td>Selasa</td>
                  <td>09:00 - 14:00</td>
                </tr>
                <tr>
                  <td>Rabu</td>
                  <td>08:30 - 13:30</td>
                </tr>
                <tr>
                  <td>Kamis</td>
                  <td>07:30 - 12:30</td>
                </tr>
                <tr>
                  <td>Jumat</td>
                  <td>09:30 - 14:30</td>
                </tr>
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
