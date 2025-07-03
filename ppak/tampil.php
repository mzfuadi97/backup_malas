<script src="asset/AdminLTE-3.0.2/plugins/jquery/jquery.min.js"></script>
 
 
   
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> <img src="asset/icon/Ppak.png"></i> Permintaan ATK</h1>
          </div>				  
        </div>
      </div><!-- /.container-fluid -->
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
                <a class="nav-link" href="./?p=ppak&aksi=adminpost" ><i class='fas fa-envelope'></i> Purchasing</a>
              </li>
			  <li class="nav-item">
                <a class="nav-link active " href="?p=ppak"><i class='fas fa-star'></i> Progress</a>
              </li>                      
            </ul>        
	
			<div class="card-body">
				<div class="alert alert-danger alert-dismissible">
  <h4>Keterangan Status</h4>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p><strong>Unposting</strong> : Permintaan ATK belum diproses</p>
  <p><strong>Ready</strong> : Permintaan ATK sudah bisa diambil</p>
  <p><strong>Posting</strong> : Permintaan ATK telah diambil</p>
</div>

			<table id="example" class="table table-bordered table-striped" style = "width : 100%;">
						<thead>
							<tr>
								<th>Kode</th>
								<th>Tanggal</th>
								<th>Karyawan</th>
								<th>Status</th>
								<th>Action</th>																														
							</tr>
						</thead>
					</table>
	</div>
	</div>
	</div>
	</div>
	<script>
$(document).ready(function(){
     $('#example').on('draw.dt', function () {
                    $('[data-bs-toggle="tooltip"]').tooltip();
                });
});
</script>
<script>
	$(document).ready(function(){
		$('#example').DataTable({
			"bProcessing": true,
			"serverSide": true,
			 "responsive": true,	
			 "scrollX": true,	
			 "order": [[0, "desc"]],		 
			"ajax":{
				url :"module/ppak/dt.php",
				type: "post",				
			},
			'columnDefs': [
				
				
				{
					'targets': 4,
					'searchable': false,
					 'width':80,
					'orderable': false,
					'className': 'text-center',
					'render': function (data, type, full, meta,){						
						return '<a  title="Cetak Dokumen" type=\"button\" class=\"tooltiptext btn btn-xs btn-outline-primary\" href="cetak/rptppak_.php?idppak='+data+'"><i class="fas fa-print"></i></a>  <a  title="Download Lampiran" type=\"button\" class=\"btn btn-xs btn-outline-danger\" href="cetak/rptppak_.php?idppak='+data+'"><i class="fas fa-download"></i></a>';
					}
				}
				
				
			],
        });  
	} );
</script>
  

 
	