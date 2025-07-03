<?php
date_default_timezone_set('Asia/Jakarta');
$tgl1 = date("d-m-Y");
$selisih= date("d-m-Y", strtotime("$tgl1 +30 day"));
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><img src="asset/icon/off.jpg"></i> Form Off Kerja</h1>
          </div>
          <div class="col-sm-6">
            <div class="float-right">
              <button class="btn btn-sm btn-outline-danger" onclick="location.href = './?p=off&aksi=adminunpost_off';"><i class="fa fa-reply"></i> Kembali</button>
             		
          </div>
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	
	<div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
          
    
            </div>
            <!-- /.card-header -->
            <form role="form" action="module/kirim/kirim.php?kirim=tambah&tambah=adminunpost_off" method="post" id="form-off">
    <div class="card-body">

        <div class="row">
            <!-- Hari Kerja Libur Pertama -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label class="control-label">Hari Kerja Libur</label>
                    <input type="date" class="form-control is-warning form-control-sm" name="hari_kerja" id="hari_kerja" required>
                </div>
            </div>
            
            <!-- Hari Kerja Libur Kedua (Jika memang perlu, kalau tidak bisa dihapus) -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label class="control-label">Hari Off</label>
                    <input type="date" class="form-control is-warning form-control-sm" name="hari_off" id="hari_off" required>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Keperluan -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control is-warning form-control-sm" name="keterangan" id="keterangan" rows="3" required></textarea>
                </div>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-outline-primary btn-sm">
            <i class="fa fa-check"></i> Simpan
        </button>
    </div>
</form>


            <!-- /.col-->
    
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	  
      <script>
    $(document).ready(function() {
        // Bind the form submission event
        $('#form-off').on('submit', function(e) {
            e.preventDefault();  // Prevent default form submission

            $.ajax({
                url: $(this).attr('action'), // The URL to submit to
                method: 'POST',
                data: $(this).serialize(),  // Serialize form data
                dataType: 'json', // <-- Tambahkan ini
                success: function(response) {
                    // If the server responds successfully, show the SweetAlert
                    Swal.fire({
                        toast: true,
                        position: 'top-right',
                        icon: 'success',
                        title: 'Data berhasil disimpan', // Success message
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function() {
                        // Redirect to the specified page after the success message
                        window.location.href = '?p=off&aksi=view&idoff=' + response.idoff; // <-- perbaikan + operator
                    });
                },
                error: function() {
                    // If the AJAX request fails, show an error message
                    Swal.fire({
                        toast: true,
                        position: 'top-right',
                        icon: 'error',
                        title: 'Terjadi kesalahan. Silakan coba lagi.', // Error message
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            });
        });
    });
</script>

	

