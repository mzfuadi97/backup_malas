<script src="asset/AdminLTE-3.0.2/plugins/jquery/jquery.min.js"></script>
<script src="asset/theme/jquery-3.1.1.min.js"></script>
 <!-- 
 Rule : 
 1. Tabel ppak, Status = 0
 2. Level Admin bisa lihat semua
 3. Dluar level admin hanya pengajuannya saja (Table Reques (diminta))
 -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> <img src="asset/icon/Ppak.png"></i> Permintaan ATK </h1>
          </div>
		<div class="col-sm-6">
            <div class="float-right">
            
              <button type="button" id="btnTambahPpak" class="btn btn-sm btn-outline-primary"> <i class="fa fa-plus"></i> Tambah</button>                  
				
          </div>
        </div>		  
        </div>
      </div>
    </section>
	
	   
    <div class="card">
	<div class="row"> 
    <div class="col-12">
	<br>
  <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
  <li class="nav-item">
  <a class="nav-link  " href="./?p=ppak&aksi=adminunpost_ppak"><i class='fas fa-book'></i> Add New</a>
                </li>     
			  <li class="nav-item">
                <a class="nav-link active" href="./?p=ppak&aksi=adminpost" ><i class='fas fa-envelope'></i> Manager</a>
              </li>
			  <li class="nav-item">
                <a class="nav-link  " href="?p=ppak"><i class='fas fa-star'></i> Progress</a>
              </li>                      
            </ul>         
	
            <div class="card-body">
            <table id="example" class="table table-bordered table-striped" style = "width : 100%;">
						<thead>
							<tr>
              <th>Kode</th>
								<th>Tgl. Pengajuan</th>
								<th>Karyawan</th>
                                <th>Status</th>
								<th>Action</th>
								</tr>
						</thead>
						<tbody>
						<?php
						$checkAccess=getUser("level",$idUser);
						$username=getUser("username",$idUser);
						if ($checkAccess=='ADMIN' OR $checkAccess=='MANAGER'){
              $sql1=mysqli_query($koneksi,"select * from ppak  o LEFT JOIN pegawai p ON o.kode_pegawai = p.kode_pegawai  where o.status=1");
              while($data=mysqli_fetch_array($sql1)){
                echo "<tr>
                <td>$data[kode]</td>
                <td>".date("d-m-Y",strtotime($data['tanggal']))."</td>
               <td>$data[nama]</td>
                               <td>".($data['posting'] == 1 ? 'Posting' : 'Unposting')."</td>
                <td>
                  <!-- View Data Button -->
                  <a title='View Data' type='button' class='btn btn-xs btn-outline-success' href='?p=ppak&aksi=view&idppak=$data[id]'>
                      <i class='fas fa-eye'></i>
                  </a> 
  
                  <!-- Download Lampiran Button -->
                  <a title='Download Lampiran' type='button' class='btn btn-xs btn-outline-warning' href='cetak/rptppak.php?idppak=$data[id]'>
                      <i class='fas fa-download'></i>
                  </a>
              </td>
              </tr>";
						}
						} 
						else 
						{
						$sql1=mysqli_query($koneksi,"select * from ppak where status=0 and diminta='$username'");
						while($data=mysqli_fetch_array($sql1)){
							echo "<tr>
							<td>$data[kode]</td>
							<td>".date("d-m-Y",strtotime($data['tanggal']))."</td>
							<td>$data[nik]</td>
              <td>$data[nama]</td>
							<td>".getJabatan('nama',$data['jabatan'])."</td>
							<td><a type='button' class='btn btn-xs btn-outline-success' href='?p=view&aksi=edit&idppak=$data[id]'><i class='fas fa-eye'></i></a></td>
							<a  title='Download Lampiran' type='button' class='btn btn-xs btn-outline-danger' href='cetak/rptppak.php?idppak='+data+''><i class='fas fa-download'></i></a>
              </tr>";
						}	
						}
						?>
						</tbody>
					</table>
	</div>
	</div>
	</div>
	</div>
	<script>
$(document).ready(function () {
    // Initialize tooltips for DataTables after each draw event
    $('#example').on('draw.dt', function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });

    // Handle delete button click
    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();

        // Get the ID from the href attribute and prepare the delete URL
        var id = $(this).attr('href').split('idppak=')[1];
        var deleteUrl = `module/ppak/hapus.php?idppak=${id}`;

        // Show confirmation dialog before deletion
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform the deletion via AJAX
                $.ajax({
                    url: deleteUrl,
                    type: 'GET', // Use GET or POST depending on your backend requirements
                    success: function (response) {
                        // Show success notification after successful deletion
                        Swal.fire({
                            toast: true,
                            position: 'top-right',
                            icon: 'success',
                            title: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 3000
                        }).then(function () {
                            // Redirect to the specified page after 3 seconds
                            window.location.href = '?p=ppak&aksi=adminunpost_ppak'; // Adjust the redirect URL as needed
                        });
                    },
                    error: function () {
                        // Show error notification if there was an issue with the deletion
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan saat menghapus data!',
                        });
                    }
                });
            }
        });
    });

    // Initialize DataTable with horizontal scroll
    $('#example').DataTable({
        "scrollX": true,
        "order": [[0, 'desc']]
    });

    // Tambah konfirmasi untuk tombol Tambah
    $('#btnTambahPpak').on('click', function() {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda akan melakukan permintaan ATK?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim permintaan tambah dokumen
                $.ajax({
                    url: 'module/kirim/kirim.php?kirim=tambah&tambah=adminunpost_ppak',
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success' && response.idppak) {
                            window.location.href = '?p=ppak&aksi=view&idppak=' + response.idppak;
                        } else {
                            Swal.fire('Gagal', response.message || 'Gagal membuat permintaan ATK.', 'error');
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire('Error', 'Terjadi kesalahan pada server.', 'error');
                    }
                });
            }
        });
    });
});

</script>