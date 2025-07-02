<?php
$idpurchase = $_GET['idpurchase'];
$adminid = getUser("username", $idUser);

// Ambil data supplier
$sqlSupplier = mysqli_query($koneksi, "SELECT nama FROM suplier ORDER BY nama ASC");
$suppliers = [];
while($row = mysqli_fetch_assoc($sqlSupplier)) {
    $suppliers[] = $row;
}

// Proses pencarian
$kode = isset($_POST['kode']) ? trim($_POST['kode']) : '';
$results = [];
if (isset($_POST['btnCari'])) {
    $where = '';
    if ($kode !== '') {
        $where = "WHERE kode LIKE '%" . mysqli_real_escape_string($koneksi, $kode) . "%'";
    }
    $sql = mysqli_query($koneksi, "SELECT * FROM permintaan $where");
    while($row = mysqli_fetch_assoc($sql)) {
        $results[] = $row;
    }
}
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><img src="asset/icon/Permintaan.png"> Revisi </h1>
      </div>
      <div class="col-sm-6">
        <div class="float-right">
          <!-- Tombol kembali dihapus -->
        </div>
      </div>                  
    </div>
  </div>
</section>

<div class="card">
  <div class="row">
    <div class="col-12">
      <div class="card-body">
        <input type='hidden' id='adminid' value="<?= $adminid ?>">
        <div class="row">
          <form id="searchForm" class="form-inline mb-3" method="post">
            <input type="text" class="form-control mr-2" id="searchKode" name="kode" placeholder="kode" value="<?= htmlspecialchars($kode) ?>">
            <button type="submit" class="btn btn-primary" name="btnCari">Cari</button>
          </form>
          <div id="resultTable">
            <?php if (isset($_POST['btnCari']) && $kode !== '' && count($results) > 0): ?>
              <table class="table table-condensed table-hover">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th width="250px">Nama</th>
                    <th>Jenis Barang</th>
                    <th>Supplier</th>
                    <th width="50px"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (count($results) > 0): ?>
                    <?php foreach ($results as $row): ?>
                      <tr>
                        <td><?= htmlspecialchars($row['kode']) ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td>
                          <select class="form-control id_jenis_select" id="id_jenis_<?= $row['id'] ?>" name="id_jenis_<?= $row['id'] ?>" data-id="<?= $row['id'] ?>">
                            <option value="1" <?php echo ($row['id_jenis'] == 1) ? 'selected' : ''; ?>>Office Supply</option>
                            <option value="2" <?php echo ($row['id_jenis'] == 2) ? 'selected' : ''; ?>>Non Office Supply</option>
                          </select>
                        </td>
                        <td>
                          <select class="form-control kode_suplier_select" id="kode_suplier_<?= $row['id'] ?>" name="kode_suplier_<?= $row['id'] ?>" data-id="<?= $row['id'] ?>">
                            <option value="">Select an Option</option>
                            <?php foreach ($suppliers as $sup): ?>
                              <option value="<?= htmlspecialchars($sup['nama']) ?>" <?= (isset($row['suplier']) && $row['suplier'] == $sup['nama']) ? 'selected' : '' ?>><?= htmlspecialchars($sup['nama']) ?></option>
                            <?php endforeach; ?>
                          </select>
                        </td>
                        <td>
                          <form id="form-update-<?= $row['id'] ?>" action="module/kirim/kirim.php?kirim=edit&edit=permintaan" method="POST">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="hidden" name="id_jenis" id="id_jenis_hidden_<?= $row['id'] ?>" value="<?= $row['id_jenis'] ?>">
                            <input type="hidden" name="kode_suplier" id="kode_suplier_hidden_<?= $row['id'] ?>" value="<?= $row['suplier'] ?>">
                            <button type="submit" class="btn btn-sm btn-outline-success btn-block">
                              <i class="fas fa-paper-plane"></i> Send Dokumen
                            </button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr><td colspan="5">Tidak ada data ditemukan.</td></tr>
                  <?php endif; ?>
                </tbody>
              </table>
            <?php elseif (isset($_POST['btnCari']) && $kode === ''): ?>
              <script>
                alert('Input wajib diisi! Harap isi kode sebelum melakukan pencarian.');
              </script>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script>
$(document).ready(function() {
    // Update hidden inputs whenever dropdown values change
    $(document).on('change', '.id_jenis_select, .kode_suplier_select', function() {
        var id = $(this).data('id');
        
        // Update hidden input fields with the current dropdown values
        $('#id_jenis_hidden_' + id).val($('#id_jenis_' + id).val());
        $('#kode_suplier_hidden_' + id).val($('#kode_suplier_' + id).val());
    });

    // Handle form submission
    $(document).on('submit', 'form', function(e) {
        e.preventDefault();  // Prevent form submission to validate

        var form = $(this);
        var id = form.find('input[name="id"]').val();
        var idJenis = form.find('input[name="id_jenis"]').val();
        var kodeSuplier = form.find('input[name="kode_suplier"]').val();

        // Check if supplier is selected
        if (!kodeSuplier) {
            alert('Supplier wajib dipilih! Silakan pilih supplier sebelum update data.');
            return false;
        }

        // Confirmation dialog before submitting the form
        var confirmUpdate = confirm('Apakah data sudah benar?\nData permintaan akan diupdate.');
        if (confirmUpdate) {
            // Submit the form after confirmation
            form[0].submit();
        }
    });
});


</script>