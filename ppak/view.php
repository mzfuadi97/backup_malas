<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'hapus_item') {
    include_once '../../config/koneksi.php';
    header('Content-Type: application/json');
    if (ob_get_length()) ob_clean();
    $id = $_POST['id'] ?? '';
    if (empty($id) || !is_numeric($id)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'ID item tidak valid'
        ]);
        exit;
    }
    $stmt = $koneksi->prepare("DELETE FROM ppak_detail WHERE id = ?");
    $stmt->bind_param("i", $id);
    $success = $stmt->execute();
    if ($success && $stmt->affected_rows > 0) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Item berhasil dihapus'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Gagal menghapus item atau item tidak ditemukan.'
        ]);
    }
    $stmt->close();
    exit;
}


?>

<script src="asset/AdminLTE-3.0.2/plugins/jquery/jquery.min.js"></script>
<script src="asset/theme/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
	
$(document).ready(function(e){
	// $("#noper").focus();
	$('#btn-download').click(function () {
        var docId = "<?php echo isset($_GET['idppak']) ? $_GET['idppak'] : ''; ?>"; // Get the document ID from PHP
        window.location.href = 'cetak/rptppak.php?idppak=' + docId; // Redirect to the download URL
    });

$(document).on('click', '#btn-kirimbrk', function(e) {
    e.preventDefault();
    var idppak = "<?php echo isset($_GET['idppak']) ? $_GET['idppak'] : ''; ?>";
    var idUser = $("#idUser").val();
    Swal.fire({
        title: 'Apakah dokumen sudah benar ?',
        text: "Dokumen akan dikirim ke Manager dengan email : johndoe@gmail.com .",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, kirim!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'module/ppak/update_status_adminunpost_ppak.php',
                type: 'POST',
                data: {
                    idppak: idppak,
                    idUser: idUser
                },
                success: function(response) {
                    if (response.trim() === "success") {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Dokumen berhasil dikirim',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        setTimeout(function() {
                            window.location.href = '?p=ppak&aksi=adminunpost_ppak';
                        }, 1200);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: response
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Ajax error:', error);
                    Swal.fire('Request Failed', 'Terjadi masalah dalam mengirim permintaan.', 'error');
                }
            });
        }
    });
});


// Editable Cells Logic with Event Delegation
    $(document).on("click", ".editable", function() {
        const currentValue = this.innerText;
        const field = this.getAttribute("data-field");
        const row = this.closest("tr");
        const id = row.getAttribute("data-id");

        // Prevent multiple inputs in the same cell
        if (this.querySelector("input")) return;

        // Create input field for editing
        const input = document.createElement("input");
        input.type = "text";
        input.value = currentValue;
        this.innerHTML = "";
        this.appendChild(input);
        input.focus();

        // Create Save button
        const saveButton = document.createElement("button");
        saveButton.textContent = "Saved";
        saveButton.classList.add("btn", "btn-success", "btn-sm", "save-button");
        this.appendChild(saveButton);

        // Handle save button click
        saveButton.addEventListener("click", function() {
            const newValue = input.value;
            saveEdit(id, field, newValue, saveButton);
        });
    });

    // Function to save the edited value
    function saveEdit(id, field, newValue, saveButton) {
        const data = new FormData();
        data.append('id', id);
        data.append('field', field);
        data.append('value', newValue);

        fetch('module/ppak/update_item.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.json())
        .then(response => {
            if (response.status === 'success') {
                const cell = document.querySelector(`tr[data-id="${id}"] td[data-field="${field}"]`);
                cell.innerText = newValue;

                // Remove the "Saved" button after saving
                saveButton.remove();
            } else {
                alert('Error saving the data: ' + response.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

	});		
		
		</script>
 <?php

    $id_ppak = $_GET['idppak'];
	
	// Query untuk mengambil data header berdasarkan ID ppak
    $sql_header = mysqli_query($koneksi, "SELECT pp.kode, pp.tanggal, pp.kode_divisi, p.nama FROM ppak pp LEFT JOIN pegawai p ON pp.kode_pegawai = p.kode_pegawai WHERE pp.id = '$id_ppak' ");
    $data = mysqli_fetch_array($sql_header);
	
	// Query untuk mengambil detail items
	$sql_details = mysqli_query($koneksi, "SELECT pd.id, pd.qty, pd.id_atk, atk.nama as nama_item, atk.spesifikasi FROM ppak_detail pd LEFT JOIN atk ON pd.id_atk = atk.id WHERE pd.id_parent = '$id_ppak' ");

// Prepare items data for JavaScript
$items = [];
$sql_items = mysqli_query($koneksi, "SELECT id, nama, spesifikasi FROM atk ORDER BY nama ASC");
while ($data1 = mysqli_fetch_array($sql_items)) {
    $items[] = [
        'id' => $data1['id'],
        'nama' => $data1['nama'],
        'spesifikasi' => $data1['spesifikasi']
    ];
}

// Convert PHP array to JavaScript array
$items_json = json_encode($items);

// Debug: Check if items data is loaded
if (empty($items)) {
    error_log("Warning: No items found in ATK table");
}
 ?>
 <style>
#nocustomers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size:14px;  
}
#nocustomers td, #nocustomers th {
  border-bottom: 1px solid #ddd;
  padding: 2px;
  font-size:14px; 
}
#nocustomers th {
  padding-top: 2px;
  padding-bottom: 2px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  border-top: 1px solid #ddd;  
}
#nocustomers td {
  padding-top: 2px;
  padding-bottom: 2px;
  text-align: left;  
 
}
</style> 
   
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> <img src="asset/icon/ppak.png"></i> Permintaan ATK</h1>
          </div>
		  <div class="col-sm-6">
          <div class="float-right">
            <button class="btn btn-sm btn-outline-danger" onclick="location.href = './?p=ppak&aksi=adminunpost_ppak';"><i class="fa fa-reply"></i> Kembali </button>
			
			</div>
		  </div>				  
        </div>
      </div><!-- /.container-fluid -->
    </section>
	
	<input type='hidden' id='idUser' value='<?php echo isset($idUser) ? $idUser : ''; ?>'>
	<div class="card">
	<div class="row">
    <div class="col-12">  
	<div class="card-body">
	<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Perhatian!</strong><small> Apabila Item Tidak Ada Maka Dapat Langsung Menghubungi Team Purchase.</small>
</div>
	<div class="row">
	  <div class="col-2">

	 
	  <button class="btn btn-sm btn-outline-success btn-block" id="btn-kirimbrk"> <i class="fas fa-paper-plane"></i> Approve </button>
	  <button class="btn btn-sm btn-outline-warning btn-block" id="btn-download"><i class="fas fa-download"></i> Download Dokumen</button>
			
	  </div>
	  <div class="col-10">
	  <table id="nocustomers" class="table table-striped">
		 <tbody style="font-size: 20px; line-height: 2.5; padding: 18px;">
  <tr>
    <td width="30%"><b>No. Dokumen</b></td>
    <td>: <?php echo isset($data['kode']) ? $data['kode'] : '-'; ?></td>
    <td width="30%"><b>Nama</b></td>
    <td>: <?php echo isset($data['nama']) ? $data['nama'] : '-'; ?></td>
  </tr>
  <tr>
    <td width="30%"><b>Tanggal Pengajuan</b></td>
    <td>: <?php echo isset($data['tanggal']) ? date("d-M-Y", strtotime($data['tanggal'])) : '-'; ?></td>
    <td width="30%"><b>Divisi</b></td>
    <td>: <?php echo isset($data['kode_divisi']) ? getDivisi('divisi', $data['kode_divisi']) : '-'; ?></td>
  </tr>
</table>

	  </div>
	  
	  </div>

	  <table class="items table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Item</th>
                            <th>Spesifikasi</th>
                            <th>Qty</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(mysqli_num_rows($sql_details) > 0) {
                            while($row = mysqli_fetch_assoc($sql_details)) {
                                echo "<tr data-id='".$row['id']."'>";
                                echo "<td data-field='nama_item'>" . htmlspecialchars($row['nama_item']) . "</td>";
                                echo "<td data-field='spesifikasi'>" . htmlspecialchars($row['spesifikasi']) . "</td>";
                                echo "<td class='editable' data-field='qty'>" . htmlspecialchars($row['qty']) . "</td>";
                                echo "<td><button class='btn btn-danger btn-sm delete-item-btn' data-id='".$row['id']."'><i class='fa fa-trash'></i></button></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo '<tr><td colspan="4" class="empty"><span class="empty">Tidak ada data ditemukan.</span></td></tr>';
                        }
                        ?>
                    </tbody>
                </table>



<div class="row mt-3">
    <div class="col-12 text-left">
        <button class="btn btn-primary" data-toggle="modal" data-target="#itemModal">
    <i class="fa fa-search text-white"></i> Cari Item
</button>
    </div>
</div>

<!-- Item Search Modal -->
<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel">Daftar Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Search Box Inside Modal -->
                <div class="mb-3">
                    <input type="text" id="modalItemSearchBox" class="form-control form-control-sm float-right" style="width: 200px;" placeholder="Search by Name or Specification">
                </div>

                <div id="itemResultCount" class="mb-3" style="font-size: 0.9rem; color: #555;">
                    Displaying 1-10 of <span id="itemTotalResults">0</span> results
                </div>

                <!-- Table of items -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Item</th>
                            <th>Spesifikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="itemList">
                        <!-- Items will be populated here dynamically -->
                    </tbody>
                </table>
                <div id="itemPagination" class="text-center"></div> <!-- Pagination buttons will be displayed here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Input fields to display selected item -->
<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            <label for="itemName">Nama Item</label>
            <input type="text" id="itemName" class="form-control" >
        </div>
        <div class="col-md-6">
            <label for="itemSpesifikasi">Spesifikasi</label>
            <input type="text" id="itemSpesifikasi" class="form-control" >
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <label for="itemJumlah">Jumlah</label>
            <input type="number" id="itemJumlah" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="itemKeperluan">Keperluan</label>
            <input type="text" id="itemKeperluan" class="form-control">
        </div>
    </div>
    <input type="hidden" id="itemId">
<div class="row mt-3">
        <div class="col-12">
            <button type="button" class="btn btn-primary" id="addItemButton">Tambah </button>
        </div>
    </div>

	</div>
	</div>
	</div>
	</div>
	


<script>
$(document).ready(function() {
    let currentPage = 1;
    const itemsPerPage = 10;
    
    // Get items data from PHP
    const items = <?php echo $items_json; ?>;
    
    console.log('Items loaded from PHP:', items);

    // Function to filter items based on search query
    function filterItems(searchQuery) {
        return items.filter(item =>
            item.nama.toLowerCase().includes(searchQuery) ||
            item.spesifikasi.toLowerCase().includes(searchQuery)
        );
    }

    // Function to load and render the items in the modal
    function loadItems(page = 1) {
        const searchQuery = $('#modalItemSearchBox').val().toLowerCase();
        const filteredItems = filterItems(searchQuery);
        const totalItems = filteredItems.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage);

        console.log('Loading items:', {
            searchQuery: searchQuery,
            totalItems: totalItems,
            filteredItems: filteredItems.length,
            page: page
        });

        // Set the current page
        currentPage = page;

        // Calculate the items to be displayed on the current page
        const startIndex = (currentPage - 1) * itemsPerPage;
        const paginatedItems = filteredItems.slice(startIndex, startIndex + itemsPerPage);

        // Render the item list in the modal
        let itemListHtml = '';
        paginatedItems.forEach((item, index) => {
            itemListHtml += `
                <tr>
                    <td>${startIndex + index + 1}</td>
                    <td>${item.nama || ''}</td>
                    <td>${item.spesifikasi || ''}</td>
                    <td><button class="btn btn-success select-item-btn" data-id="${item.id}" data-nama="${item.nama}" data-spesifikasi="${item.spesifikasi}">Pilih</button></td>
                </tr>
            `;
        });
        $('#itemList').html(itemListHtml);  // Update item table

        // Update total results count
        $('#itemTotalResults').text(totalItems);

        // Render pagination buttons
        updatePagination(totalItems, currentPage, 'item');
    }

    // Function to update pagination based on the filtered items and current page
    function updatePagination(totalItems, currentPage, type) {
        const totalPages = Math.ceil(totalItems / itemsPerPage);
        const paginationContainer = $('#itemPagination');
        paginationContainer.empty();

        // Calculate the start and end pages for the current group of 5 pages
        const startPage = Math.max(1, Math.floor((currentPage - 1) / 5) * 5 + 1);
        const endPage = Math.min(startPage + 4, totalPages);

        // Add the "Previous" button
        if (currentPage > 1) {
            paginationContainer.append(`<button class="btn btn-sm btn-outline-primary" id="prevPage">Previous</button>`);
        }

        // Add page numbers dynamically
        for (let i = startPage; i <= endPage; i++) {
            paginationContainer.append(`<button class="btn btn-sm btn-outline-secondary page-btn" data-page="${i}" id="page${i}">${i}</button>`);
        }

        // Add the "Next" button
        if (currentPage < totalPages) {
            paginationContainer.append(`<button class="btn btn-sm btn-outline-primary" id="nextPage">Next</button>`);
        }

        // Handle page button click
        $('#itemPagination').on('click', '.page-btn', function () {
            const clickedPage = $(this).data('page');
            if (clickedPage) {
                currentPage = clickedPage;
                loadItems(currentPage);  // Reload items for the selected page
            }
        });

        // Handle previous and next page buttons
        $('#prevPage').on('click', function () {
            if (currentPage > 1) {
                currentPage--;
                loadItems(currentPage);  // Reload items for the previous page
            }
        });

        $('#nextPage').on('click', function () {
            if (currentPage < totalPages) {
                currentPage++;
                loadItems(currentPage);  // Reload items for the next page
            }
        });
    }

    // Initialize loading items when modal is shown
    $('#itemModal').on('shown.bs.modal', function () {
        console.log('Modal opened, items count:', items.length);
        loadItems(1);  // Load the first page of items when modal opens
    });

    // Filter items as user types in the search box
    $('#modalItemSearchBox').on('input', function() {
        loadItems(1);  // Reload items for the first page with the updated search term
    });

    // Handle item selection from the modal
    $(document).on('click', '.select-item-btn', function() {
        const itemId = $(this).data('id');
        const itemNama = $(this).data('nama');
        const itemSpesifikasi = $(this).data('spesifikasi');

        $('#itemName').val(itemNama);
        $('#itemSpesifikasi').val(itemSpesifikasi);
        $('#itemId').val(itemId);

        $('#itemModal').modal('hide');
    });

    // Handle delete item button click
    $(document).on('click', '.delete-item-btn', function() {
        const itemId = $(this).data('id');
        const row = $(this).closest('tr');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Item akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'module/ppak/view.php',
                    type: 'POST',
                    data: {
                        id: itemId,
                        action: 'hapus_item'
                    },
                    success: function(response) {
                        try {
                            const jsonResponse = typeof response === 'string' ? JSON.parse(response) : response;
                            if (jsonResponse.status === 'success') {
                                Swal.fire({
                                    toast: true,
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Item berhasil dihapus',
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                                row.remove();
                            } else {
                                Swal.fire('Gagal menghapus item', jsonResponse.message || 'Terjadi kesalahan.', 'error');
                            }
                        } catch (e) {
                            console.error('Response parsing error:', e, response);
                            Swal.fire('Error', 'Terjadi kesalahan dalam memproses respons.', 'error');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Ajax error:', error);
                        Swal.fire('Request Failed', 'Terjadi masalah dalam mengirim permintaan.', 'error');
                    }
                });
            }
        });
    });

    // Handle Add to Tabel Permintaan Detail Button Click
     $('#addItemButton').on('click', function() {
    const idppakdetail = "<?php echo $id_ppak; ?>";
    const id_atk = $('#itemId').val();
    const nama_item = $('#itemName').val();
    const itemJumlah = $('#itemJumlah').val();
    const keperluan = $('#itemKeperluan').val();
    // Ambil kode_divisi dan kode_cabang dari data header jika ada
    const kode_divisi = "<?php echo isset($data['kode_divisi']) ? $data['kode_divisi'] : ''; ?>";
    const kode_cabang = ""; // Jika ada, ambil dari data header

    if (id_atk && itemJumlah) {
        $.ajax({
            url: 'module/kirim/kirim.php?kirim=tambah&tambah=ppak_detail',  
            type: 'POST',
            data: {
                idppakdetail: idppakdetail,
                id_atk: id_atk,
                nama_item: nama_item,
                qty: itemJumlah,
                keperluan: keperluan,
                kode_divisi: kode_divisi,
                kode_cabang: kode_cabang
            },
            success: function(response) {
                try {
                    const jsonResponse = JSON.parse(response);
                    if (jsonResponse.status === 'success') {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Item berhasil ditambahkan',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1200);
                    } else {
                        Swal.fire('Gagal menambahkan item', jsonResponse.message || 'Terjadi kesalahan.', 'error');
                    }
                } catch (e) {
                    console.error('Response parsing error:', e);
                    Swal.fire('Error', 'Terjadi kesalahan dalam memproses respons.', 'error');
                }
            },
            error: function(xhr, status, error) {
                console.error('Ajax error:', error);
                Swal.fire('Request Failed', 'Terjadi masalah dalam mengirim permintaan.', 'error');
            }
        });
    } else {
        Swal.fire('Field Kosong', 'Silakan pilih item dan isi jumlah.', 'warning');
    }
});

});

</script>
 
	