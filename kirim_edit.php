<?php 
$create_by=getUser("username",$userID);
$date_create=date("Y-m-d H:i:s");

	switch ($_GET['edit']) {			
		case 'user':
			$iduser=$_POST['iduser'];
			$username=$_POST['username'];
			$nama=$_POST['nama'];					
			$alamat=$_POST['alamat'];					
			$role=$_POST['role'];					
			$jabatan=$_POST['jabatan'];					
			mysqli_query($koneksi,"UPDATE user SET jabatan='$jabatan',alamat='$alamat',role='$role',username='$username',nama='$nama',diupdate='$create_by',tgl_diupdate='$date_create' WHERE id='$iduser'");
			header("Location: ../../?p=user");
		break;
		
		case 'update':
			$id=$_POST['id'];			
			$password=password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12,]);	
			mysqli_query($koneksi,"UPDATE user SET password='$password',diupdate='$create_by',tgl_diupdate='$date_create' WHERE id='$id'");
			header("Location: ../../?p=index");			
			break;
			
		case 'cabang':
			$kode=$_POST['kode'];
			$nama=$_POST['nama'];
			$sn=$_POST['sn'];
			$kode_perusahaan=$_POST['kode_perusahaan'];
			mysqli_query($koneksi,"UPDATE cabang SET nama='$nama',sn='$sn',kode_perusahaan='$kode_perusahaan',diupdate='$create_by',tgl_update='$date_create' WHERE kode='$kode'");
			header("Location: ../../?p=cabang");
		break;
		
		case 'jabatan':
			$kode=$_POST['kode'];
			$nama=$_POST['nama'];
			mysqli_query($koneksi,"UPDATE jabatan SET nama='$nama',diupdate='$create_by',tgl_update='$date_create' WHERE kode='$kode'");
			header("Location: ../../?p=jabatan");
		break;
		

		case 'adminunpost_nota':
			$keterangan=$_POST['keterangan'];
			$idnota = $_POST['id']; 
			mysqli_query($koneksi,"UPDATE nota SET keterangan='$keterangan',diupdate='$create_by',tgl_update='$date_create' WHERE id='$idnota'");
			header("Content-Type: application/json");
			echo json_encode(['status' => 'success', 'idnota' => $idnota]);
			exit();
		break;

		case 'permintaan_revisi':
			// Get POST data
			$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
			$id_jenis = isset($_POST['id_jenis']) ? $_POST['id_jenis'] : '';
			$kode_suplier = isset($_POST['kode_suplier']) ? $_POST['kode_suplier'] : '';
	
			// Perform basic validation
			if ($id > 0 && !empty($id_jenis) && !empty($kode_suplier)) {
				// Prepare SQL query using a prepared statement to avoid SQL injection
				$sql = "UPDATE permintaan SET id_jenis = ?, suplier = ? WHERE id = ?";
				
				if ($stmt = mysqli_prepare($koneksi, $sql)) {
					// Bind the parameters to the SQL statement
					mysqli_stmt_bind_param($stmt, 'ssi', $id_jenis, $kode_suplier, $id);
	
					// Execute the query
					if (mysqli_stmt_execute($stmt)) {
						// If the query is successful, return a success response
						header("Content-Type: application/json");
						echo json_encode(['status' => 'success', 'id' => $id]);
					} else {
						// If the query fails to execute, return an error response
						header("Content-Type: application/json");
						echo json_encode(['status' => 'error', 'message' => 'Failed to update data']);
					}
	
					// Close the statement
					mysqli_stmt_close($stmt);
				} else {
					// If the prepared statement fails
					header("Content-Type: application/json");
					echo json_encode(['status' => 'error', 'message' => 'Failed to prepare query']);
				}
			} else {
				// If data is invalid or missing, return an error response
				header("Content-Type: application/json");
				echo json_encode(['status' => 'error', 'message' => 'Invalid data provided']);
			}
			exit();
			break;
	

		case 'adminunpost_off':
			$keterangan=$_POST['keterangan'];
			$idoff = $_POST['id']; 
			$hari_kerja=$_POST['hari_kerja'];
			$hari_off=$_POST['hari_off'];
			mysqli_query($koneksi,"UPDATE off SET hari_kerja='$hari_kerja', hari_off='$hari_off', keterangan='$keterangan',diupdate='$create_by',tgl_update='$date_create' WHERE id='$idoff'");
			header("Content-Type: application/json");
			echo json_encode(['status' => 'success', 'idoff' => $idoff]);
			exit();
		break;
		
		case 'sisacutiTSE':
			$id=$_POST['id'];						
			$kode_pegawai=$_POST['kode'];						
			$nik=$_POST['nik'];						
			$nama=$_POST['nama'];						
			$cabang=$_POST['cabang'];						
			$periode=$_POST['periode'];						
			$sisa=$_POST['sisa'];						
			$hak=$_POST['hak'];		
			mysqli_query($koneksi,"UPDATE sisacuti SET kode_pegawai='$kode_pegawai',nama='$nama',cabang='$cabang',
			periode='$periode',sisa='$sisa',hak='$hak',diupdate='$create_by',tgl_update='$date_create' WHERE id='$id'");
			header("Location: ../../?p=sisacuti");
		break;
		case 'pegawai':			
			$kode_pegawai=$_POST['kode_pegawai'];						
			$nik=$_POST['nik'];						
			$nama=$_POST['nama'];						
			$jk=$_POST['jk'];						
			$jabatan=$_POST['jabatan'];						
			$kode_jabatan=$_POST['kode_jabatan'];						
			$divisi=$_POST['divisi'];						
			$kode_divisi=$_POST['kode_divisi'];						
			$tgl_aktif=$_POST['tgl_aktif'];						
			$status_nikah=$_POST['status_nikah'];						
			$pendidikan=$_POST['pendidikan'];						
			$tempat_lahir=$_POST['tempat_lahir'];						
			$tgl_lahir=$_POST['tgl_lahir'];						
			$umur=$_POST['umur'];						
			$agama=$_POST['agama'];						
			$gol_darah=$_POST['gol_darah'];						
			$tinggi=$_POST['tinggi'];						
			$berat=$_POST['berat'];						
			$alamat=$_POST['alamat'];						
			$alamat_domisili=$_POST['alamat_domisili'];						
			$no_telp=$_POST['no_telp'];						
			$no_wa=$_POST['no_wa'];						
			$identitas=$_POST['identitas'];						
			$no_identitas=$_POST['no_identitas'];						
			$npwp=$_POST['npwp'];						
			$bpjs_kes=$_POST['bpjs_kes'];						
			$bpjs_ket=$_POST['bpjs_ket'];						
			$no_rekening=$_POST['no_rekening'];						
			$cabang=$_POST['cabang'];						
			$kode_cabang=$_POST['kode_cabang'];						
			$kode_perusahaan=$_POST['kode_perusahaan'];						
			$status=$_POST['status'];						
			$tgl_status=$_POST['tgl_status'];						
			$alasan_status=$_POST['alasan_status'];						
			$dibuat=$_POST['dibuat'];						
			$tgl_buat=$_POST['tgl_buat'];
			$id_finger=$_POST['id_finger'];						
			$userid=$_POST['userid'];						
			$shift=$_POST['shift'];						
			$shift2=$_POST['shift2'];						
			$sn=$_POST['sn'];						
			$stkaryawan=$_POST['stkaryawan'];						
			$email=$_POST['email'];						
			$makan=$_POST['makan'];						
			$photo='no.jpg';						
			$atasan=$_POST['atasan'];								
			$nama_spv=$_POST['nama_spv'];						
			$sect=$_POST['sect'];						
			$subsect=$_POST['subsect'];						
			$atasan_purchase=$_POST['atasan_purchase'];						
			$pkk_level=$_POST['pkk_level'];						
			$kampus=$_POST['kampus'];						
			$kampus_jurusan=$_POST['kampus_jurusan'];						
			$parent=$_POST['parent'];						
			$kk=$_POST['kk'];						
			$atasan_spd=$_POST['atasan_spd'];			
			mysqli_query($koneksi,"UPDATE pegawai SET nik='$nik',
			nama='$nama',jk='$jk',jabatan='$jabatan',kode_jabatan='$kode_jabatan',divisi='$divisi',kode_divisi='$kode_divisi',tgl_aktif='$tgl_aktif',
			status_nikah='$status_nikah',pendidikan='$pendidikan',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',umur='$umur',agama='$agama',gol_darah='$gol_darah',tinggi='$tinggi',berat='$berat',alamat='$alamat',alamat_domisili='$alamat_domisili',no_telp='$no_telp',no_wa='$no_wa',
			identitas='$identitas',no_identitas='$no_identitas',npwp='$npwp',bpjs_kes='$bpjs_kes',bpjs_ket='$bpjs_ket',no_rekening='$no_rekening',cabang='$cabang',kode_cabang='$kode_cabang',kode_perusahaan='$kode_perusahaan',status='$status',tgl_status='$tgl_status',alasan_status='$alasan_status',
			id_finger='$id_finger',userid='$userid',shift='$shift',shift2='$shift2',sn='$sn',stkaryawan='$stkaryawan',email='$email',makan='$makan',atasan='$atasan',nama_spv='$nama_spv',sect='$sect',subsect='$subsect',atasan_purchase='$atasan_purchase',pkk_level='$pkk_level',kampus='$kampus',kampus_jurusan='$kampus_jurusan',parent='$parent',atasan_spd='$atasan_spd',
			kk='$kk',diupdate='$create_by',tgl_update='$date_create' WHERE kode_pegawai='$kode_pegawai'");
			header("Location: ../../?p=pegawai");
		break;
		
		case 'family':
			$kode=$_POST['kode'];
			$kode_pegawai=$_POST['kode_pegawai'];			
			$id_relation=$_POST['id_relation'];						
			$nama=$_POST['nama'];						
			$pekerjaan=$_POST['pekerjaan'];						
			$tempat=$_POST['tempat'];						
			$tanggal=$_POST['tanggal'];						
			$id_jk=$_POST['id_jk'];						
			$keterangan=$_POST['keterangan'];						
			$noktp=$_POST['noktp'];	
			mysqli_query($koneksi,"UPDATE family SET id_relation='$id_relation',nama='$nama',pekerjaan='$pekerjaan',tempat='$tempat',tanggal='$tanggal',id_jk='$id_jk',keterangan='$keterangan',noktp='$noktp' WHERE kode='$kode'");
			header("Location: ../../?p=pegawai&aksi=view&idpegawai=$kode_pegawai");
		break;
		case 'kontak':
			$kode=$_POST['kode'];
			$kode_pegawai=$_POST['kode_pegawai'];			
			$id_relation=$_POST['id_relation'];						
			$nama=$_POST['nama'];						
			$hubungan=$_POST['hubungan'];						
			$alamat=$_POST['alamat'];						
			$telepon=$_POST['telepon'];
			mysqli_query($koneksi,"UPDATE kontak SET id_relation='$id_relation',nama='$nama',hubungan='$hubungan',alamat='$alamat',telepon='$telepon' WHERE kode='$kode'");
			header("Location: ../../?p=pegawai&aksi=view&idpegawai=$kode_pegawai");
		break;
		case 'kontrak':
			$kode=$_POST['kode'];
			$kode_pegawai=$_POST['kode_pegawai'];						
			$tgl_aktif=$_POST['tgl_aktif'];						
			$tgl_kontrak=$_POST['tgl_kontrak'];						
			$keterangan=$_POST['keterangan'];						
			$proses=$_POST['proses'];
			mysqli_query($koneksi,"UPDATE kontrak SET tgl_aktif='$tgl_aktif',tgl_kontrak='$tgl_kontrak',keterangan='$keterangan',proses='$proses' WHERE kode='$kode'");
			header("Location: ../../?p=pegawai&aksi=view&idpegawai=$kode_pegawai");
		break;
		case 'pengalaman':
			$kode=$_POST['kode'];
			$kode_pegawai=$_POST['kode_pegawai'];						
			$jabatan=$_POST['jabatan'];						
			$perusahaan=$_POST['perusahaan'];						
			$periode=$_POST['periode'];
			mysqli_query($koneksi,"UPDATE pengalaman SET jabatan='$jabatan',perusahaan='$perusahaan',periode='$periode' WHERE kode='$kode'");
			header("Location: ../../?p=pegawai&aksi=view&idpegawai=$kode_pegawai");
		break;
		case 'unit':
			$id=$_POST['id'];
			$tgl_masuk=$_POST['tgl_masuk'];						
			$tgl_stnk=$_POST['tgl_stnk'];						
			$reminder=$_POST['reminder'];						
			$merk=$_POST['merk'];
			$type=$_POST['type'];
			$no_mesin=$_POST['no_mesin'];
			$warna=$_POST['warna'];
			$no_polisi=$_POST['no_polisi'];
			$tahun=$_POST['tahun'];
			$pemilik=$_POST['pemilik'];
			$lokasi=$_POST['lokasi'];
			$pemakai=$_POST['pemakai'];
			$keterangan=$_POST['keterangan'];
			$email1=$_POST['email1'];
			$email2=$_POST['email2'];
			$email3=$_POST['email3'];
			$email4=$_POST['email4'];
			mysqli_query($koneksi,"UPDATE unit SET tgl_masuk = '$tgl_masuk', tgl_stnk = '$tgl_stnk', reminder = '$reminder', merk = '$merk',type = '$type',no_mesin = '$no_mesin',warna = '$warna',no_polisi = '$no_polisi',tahun = '$tahun',pemilik = '$pemilik',lokasi = '$lokasi',pemakai = '$pemakai',keterangan = '$keterangan',email1 = '$email1',email2 = '$email2',email3 = '$email3',email4 = '$email4' WHERE id='$id'");
			header("Location: ../../?p=unit&aksi=view_admin&idunit=$id");
		break;
		case 'sewa':
			$id=$_POST['id'];
			$nama_pengguna=$_POST['nama_pengguna'];						
			$objek=$_POST['objek'];						
			$lama=$_POST['lama'];						
			$mulai=$_POST['mulai'];
			$akhir=$_POST['akhir'];
			$kontrak=$_POST['kontrak'];
			$sewa=$_POST['sewa'];
			$pph_sewa=$_POST['pph_sewa'];
			$keterangan_pph=$_POST['keterangan_pph'];
			$nama_pic=$_POST['nama_pic'];
			$nama_pemilik=$_POST['nama_pemilik'];
			$no_telp=$_POST['no_telp'];
			$keterangan=$_POST['keterangan'];
			$email1=$_POST['email1'];
			$email2=$_POST['email2'];
			$email3=$_POST['email3'];
			$email4=$_POST['email4'];
			$email5=$_POST['email5'];
			mysqli_query($koneksi,"UPDATE sewa SET nama_pengguna = '$nama_pengguna', objek = '$objek', lama = '$lama', mulai = '$mulai',akhir = '$akhir',kontrak = '$kontrak',sewa = '$sewa',pph_sewa = '$pph_sewa',keterangan_pph = '$keterangan_pph',nama_pic = '$nama_pic',nama_pemilik = '$nama_pemilik',no_telp = '$no_telp',keterangan = '$keterangan',email1 = '$email1',email2 = '$email2',email3 = '$email3',email4 = '$email4', email5 = '$email5' WHERE id='$id'");
			header("Location: ../../?p=sewa&aksi=view_admin&idsewa=$id");
		break;
		case 'izin':
			$id=$_POST['id'];
			$jenis=$_POST['jenis'];						
			$lokasi=$_POST['lokasi'];											
			$tgl_mulai=$_POST['tgl_mulai'];
			$tgl_akhir=$_POST['tgl_akhir'];
			$email1=$_POST['email1'];
			$email2=$_POST['email2'];
			$email3=$_POST['email3'];
			$email4=$_POST['email4'];
			$email5=$_POST['email5'];
			$email6=$_POST['email6'];
			$email7=$_POST['email7'];
			mysqli_query($koneksi,"UPDATE izin SET jenis = '$jenis', lokasi = '$lokasi',  tgl_mulai = '$tgl_mulai',tgl_akhir = '$tgl_akhir', email1 = '$email1',email2 = '$email2',email3 = '$email3',email4 = '$email4', email5 = '$email5', email6 = '$email6', email7 = '$email7' WHERE id='$id'");
			header("Location: ../../?p=izin&aksi=view_admin&idizin=$id");
		break;
		case 'pelatihan':
			$kode=$_POST['kode'];
			$kode_pegawai=$_POST['kode_pegawai'];						
			$tanggal=$_POST['tanggal'];						
			$jenis=$_POST['jenis'];						
			$tempat=$_POST['tempat'];
			$keterangan=$_POST['keterangan'];
			mysqli_query($koneksi,"UPDATE pelatihan SET tanggal='$tanggal',jenis='$jenis',tempat='$tempat',keterangan='$keterangan' WHERE kode='$kode'");
			header("Location: ../../?p=pegawai&aksi=view&idpegawai=$kode_pegawai");
		break;
		case 'karir':
			$kode=$_POST['kode'];
			$kode_pegawai=$_POST['kode_pegawai'];						
			$no_dokumen=$_POST['no_dokumen'];						
			$tgl_efektif=$_POST['tgl_efektif'];						
			$jenis=$_POST['jenis'];						
			$kode_jabatan=$_POST['kode_jabatan'];						
			$kode_divisi=$_POST['kode_divisi'];						
			$kode_jabatan2=$_POST['kode_jabatan2'];						
			$kode_divisi2=$_POST['kode_divisi2'];						
			$sect=$_POST['sect'];						
			$sect2=$_POST['sect2'];						
			$kode_cabang=$_POST['kode_cabang'];						
			$kode_cabang2=$_POST['kode_cabang2'];
			$stkaryawan=$_POST['stkaryawan'];
			
			mysqli_query($koneksi,"UPDATE karir SET no_dokumen='$no_dokumen',tgl_efektif='$tgl_efektif',jenis='$jenis',kode_jabatan='$kode_jabatan', 
			kode_divisi='$kode_divisi',kode_jabatan2='$kode_jabatan2',kode_divisi2='$kode_divisi2',sect='$sect',sect2='$sect2',kode_cabang='$kode_cabang',kode_cabang2='$kode_cabang2'
			WHERE kode='$kode'");
			
			mysqli_query($koneksi,"UPDATE pegawai SET stkaryawan='$stkaryawan',diupdate='$create_by',tgl_update='$date_create' WHERE kode_pegawai='$kode_pegawai'");
			
			header("Location: ../../?p=pegawai&aksi=view&idpegawai=$kode_pegawai");
		break;
		case 'section':
		$kdsect = $_POST['kdsect'];
		$nama = $_POST['nama'];
		$kode = $_POST['kode'];
		mysqli_query($koneksi, "UPDATE subsect SET nama='$nama',kdsect='$kdsect', kode='$kode',diupdate='$create_by',tgl_update='$date_create' WHERE kode='$kode'");
		header("Location: ../../?p=section");
		break;

		case 'status':
			$kode = $_POST['kode'];
			$nama = $_POST['nama'];
			$status_nikah = $_POST['status_nikah'];
			mysqli_query($koneksi, "UPDATE statusnikah SET nama='$nama',status_nikah='$status_nikah',diupdate='$create_by',tgl_update='$date_create' WHERE kode='$kode'");
			header("Location: ../../?p=status");
			break;

			case 'item':
				$id = $_POST['id'];
				$jenis = $_POST['jenis'];
				$nama_item = $_POST['nama_item'];
				$spesifikasi = $_POST['spesifikasi'];
				$satuan = $_POST['satuan'];
				$harga = $_POST['harga'];
				mysqli_query($koneksi, "UPDATE item SET jenis='$jenis', 
				nama_item='$nama_item', spesifikasi='$spesifikasi', 
				satuan='$satuan', harga='$harga',
				diupdate='$create_by',tgl_update='$date_create'
				WHERE id='$id'");
				header("Location: ../../?p=item");
				break;

				case 'atk':
					$id = $_POST['id'];
					$nama = $_POST['nama'];
					$spesifikasi = $_POST['spesifikasi'];
					$stok = $_POST['stok'];
					$harga = $_POST['harga'];
					mysqli_query($koneksi, "UPDATE atk SET nama='$nama', spesifikasi='$spesifikasi', stok='$stok', harga='$harga' WHERE id='$id'");
					header("Location: ../../?p=atk");
					break;

					case 'suplier':
						$id = $_POST['id'];
						$nama = $_POST['nama'];
						$alamat = $_POST['alamat'];
						$telp = $_POST['telp'];
						$fax = $_POST['fax'];
						mysqli_query($koneksi, "UPDATE suplier SET nama='$nama', alamat='$alamat', telp='$telp', fax='$fax', diupdate='$create_by',tgl_update='$date_create' WHERE id='$id'");
						header("Location: ../../?p=suplier");
						break;
		case 'divisi':
			$kode = $_POST['kode'];
			$divisi = $_POST['divisi'];
			$manajer = $_POST['manajer'];
			$jabatan = $_POST['jabatan'];
			$email = $_POST['email'];
			$supervisor = $_POST['supervisor'];
			$jabatan_spv = $_POST['jabatan_spv'];
			$email_spv = $_POST['email_spv'];
		
			mysqli_query($koneksi, "UPDATE divisi SET 
				divisi = '$divisi', 
				manajer = '$manajer', 
				jabatan = '$jabatan', 
				email = '$email', 
				supervisor = '$supervisor', 
				jabatan_spv = '$jabatan_spv', 
				email_spv = '$email_spv', 
				diupdate = '$create_by', 
				tgl_update = '$date_create' 
				WHERE kode = '$kode'");
				
			header("Location: ../../?p=divisi");
		break;

		case 'sect':
			$kode = $_POST['kode'];
			$nama = $_POST['nama'];
			
			mysqli_query($koneksi, "UPDATE sect SET 
				nama = '$nama',				
				diupdate = '$create_by',
				tgl_update = '$date_create'
				WHERE kode = '$kode'");
			
			header("Location: ../../?p=departemen");
		break;	
		
		case 'barang':
			$id_barang = $_POST['id_barang'];
			$nama_barang = $_POST['nama_barang'];
			
			mysqli_query($koneksi, "UPDATE barang SET 
				nama = '$nama_barang' 
				WHERE id = '$id_barang'");
			
			header("Location: ../../?p=barang");
		break;	
		case 'spd':
			$idspd = $_POST['idspd'];
			$kode_kota = $_POST['kode_kota'];
			$jarak = $_POST['jarak'];
			$jabatan = $_POST['jabatan'];
			$keterangan = $_POST['keterangan'];
			$biaya = $_POST['biaya'];
			mysqli_query($koneksi, "UPDATE spd SET 
				kode_kota = '$kode_kota',
				jarak = '$jarak',
				jabatan = '$jabatan',
				keterangan = '$keterangan',
				biaya = '$biaya'
				WHERE kode = '$idspd'");
			header("Location: ../../?p=spd");
		break;	
		case 'nota_subdetail':
			$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
		
			if ($id <= 0) {
				echo json_encode(['status' => 'error', 'message' => 'ID tidak valid']);
				exit;
			}
		
			// Field yang diperbolehkan untuk diupdate
			$allowed_fields = ['biaya', 'jumlah', 'keterangan'];
		
			foreach ($allowed_fields as $field) {
				if (isset($_POST[$field])) {
					// Perlakuan berbeda untuk keterangan (string), lainnya integer
					$value = $field === 'keterangan'
						? mysqli_real_escape_string($koneksi, $_POST[$field])
						: intval($_POST[$field]);
		
					// Jalankan update
					$query = "UPDATE nota_subdetail SET $field = '$value' WHERE id = '$id'";
					$result = mysqli_query($koneksi, $query);
		
					if ($result) {
						echo json_encode(['status' => 'success']);
					} else {
						echo json_encode(['status' => 'error', 'message' => mysqli_error($koneksi)]);
					}
					exit;
				}
			}
		
			// Jika tidak ada field valid
			echo json_encode(['status' => 'error', 'message' => 'Field tidak dikenali']);
			exit;
		break;
		
		case 'permintaan_detail':
			$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

			if ($id <= 0) {
				echo json_encode(['status' => 'error', 'message' => 'ID tidak valid']);
				exit;
			}

			// List of allowed fields to update
			$allowed_fields = [
						'nama_item', 
						'spesifikasi', 
						'keperluan', 
						'jumlah', 
						'harga', 
						'diskon', 
						'harga2',
						'nama1',   // Menambahkan variabel nama1
						'nama2',   // Menambahkan variabel nama2
						'hargasp2', // Menambahkan variabel hargasp2
						'diskonsp2', // Menambahkan variabel diskonsp2
						'topsp2',    // Menambahkan variabel topsp2
						'ketsp2',    // Menambahkan variabel ketsp2
						'namasp3',   // Menambahkan variabel namasp3
						'hargasp3',  // Menambahkan variabel hargasp3
						'diskonsp3', // Menambahkan variabel diskonsp3
						'topsp3',    // Menambahkan variabel topsp3
						'ketsp3',    // Menambahkan variabel ketsp3
						'rekomendasi', // Menambahkan variabel rekomendasi
						'alasan'      // Menambahkan variabel atasan
					];


			if (isset($_POST['field']) && in_array($_POST['field'], $allowed_fields)) {
				$field = $_POST['field'];
				$value = mysqli_real_escape_string($koneksi, $_POST['value']); // Sanitize the input value

				// Prepare and execute the update query
				$query = "UPDATE permintaan_detail SET $field = ? WHERE id = ?";
				if ($stmt = mysqli_prepare($koneksi, $query)) {
					mysqli_stmt_bind_param($stmt, "si", $value, $id);
					$result = mysqli_stmt_execute($stmt);
					mysqli_stmt_close($stmt);

					if ($result) {
						echo json_encode(['status' => 'success']);
					} else {
						echo json_encode(['status' => 'error', 'message' => 'Failed to execute query']);
					}
				} else {
					echo json_encode(['status' => 'error', 'message' => 'Failed to prepare query']);
				}
			} else {
				echo json_encode(['status' => 'error', 'message' => 'Field tidak dikenali']);
			}
			exit;
		break;

		case 'permintaan':
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    if ($id <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'ID tidak valid']);
        exit;
    }
    
    // Define the allowed fields for updating
    $allowed_fields = ['noref', 'ppn', 'keterangan', 'total_harga', 'id_jenis', 'kode_suplier'];
    $updates = [];
    $params = [];
    $types = '';

    // Loop through allowed fields and add them to update query if they are set
    foreach ($allowed_fields as $field) {
        if (isset($_POST[$field])) {
            $updates[] = "$field = ?";
            $params[] = $_POST[$field];
            $types .= 's'; // Assume all fields are strings, you may change this based on field types
        }
    }

    // If no valid fields to update
    if (empty($updates)) {
        echo json_encode(['status' => 'error', 'message' => 'No valid fields to update']);
        exit;
    }

    // Prepare and execute query if there are fields to update
    $query = "UPDATE permintaan SET " . implode(', ', $updates) . " WHERE id = ?";
    $params[] = $id;
    $types .= 'i'; // Add type for ID (integer)

    if ($stmt = mysqli_prepare($koneksi, $query)) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to execute query: ' . mysqli_error($koneksi)]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to prepare query']);
    }
    exit;
break;


		case 'permintaan_':
    // Ambil idpurchase dari POST
    $idpurchase = isset($_POST['idpurchase']) ? intval($_POST['idpurchase']) : 0;

    if ($idpurchase <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'ID tidak valid']);
        exit;
    }

    // List of allowed fields to update
    $allowed_fields = ['total_harga'];

    // Periksa apakah field yang dikirim ada dalam list allowed_fields
    if (isset($_POST['field']) && in_array($_POST['field'], $allowed_fields)) {
        // Ambil nama field dan nilai yang akan diupdate
        $field = $_POST['field'];
        $value = $_POST['value']; // Mengambil nilai total_harga yang dikirim

        // Pastikan nilai total_harga adalah numerik
        if (!is_numeric($value)) {
            echo json_encode(['status' => 'error', 'message' => 'Total harga harus berupa angka']);
            exit;
        }

        $value = floatval($value); // Pastikan value adalah angka (float)

        // Siapkan query untuk melakukan update pada tabel permintaan
        $query = "UPDATE permintaan SET $field = ? WHERE id = ?";
        
        // Jalankan query menggunakan prepared statement
        if ($stmt = mysqli_prepare($koneksi, $query)) {
            // Binding parameter, "di" untuk double dan integer
            mysqli_stmt_bind_param($stmt, "di", $value, $idpurchase);
            
            // Eksekusi query
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($result) {
                // Kirimkan response sukses jika update berhasil
                echo json_encode(['status' => 'success']);
            } else {
                // Kirimkan response error jika eksekusi query gagal
                echo json_encode(['status' => 'error', 'message' => 'Failed to execute query']);
            }
        } else {
            // Kirimkan response error jika query tidak bisa disiapkan
            echo json_encode(['status' => 'error', 'message' => 'Failed to prepare query']);
        }
    } else {
        // Kirimkan response error jika field tidak dikenal
        echo json_encode(['status' => 'error', 'message' => 'Field tidak dikenali']);
    }

    exit;
    break;


		case 'adminunpost':					
			$no_id=$_POST['no_id'];						
			$divisi=$_POST['divisi'];						
			$jabatan=$_POST['jabatan'];						
			$sesuai=$_POST['sesuai'];						
			$pendidikan=$_POST['pendidikan'];
			$jurusan=$_POST['jurusan'];
			$jenis=$_POST['jenis'];
			$perkawinan=$_POST['perkawinan'];
			$pribadi=$_POST['pribadi'];
			$pengalaman=$_POST['pengalaman'];
			$keahlian=$_POST['keahlian'];
			$pendukung=$_POST['pendukung'];
			$status_kerja=$_POST['status_kerja'];
			$tugas=$_POST['tugas'];
			$bertanggung_jawab=$_POST['bertanggung_jawab'];
			$nama_pengganti=$_POST['nama_pengganti'];
			$golongan_ganti=$_POST['golongan_ganti'];
			$jabatan_ganti=$_POST['jabatan_ganti'];			
			$tgl_phk=$_POST['tgl_phk'];
			$alasan_phk=$_POST['alasan_phk'];
			$penjelasan_pergantian=$_POST['penjelasan_pergantian'];
			$penjelasan_penambahan=$_POST['penjelasan_penambahan'];
			$perlu=$_POST['perlu'];
			$diminta=$create_by;
			$disetujui=getNik('nama',$create_by);
			//--->Perhitungan tgl diminta 1 Bulan setalah pengajuan
			date_default_timezone_set('Asia/Jakarta');
			$tgl1 = date("d-m-Y");
			$selisih= date("d-m-Y", strtotime("$tgl1 +30 day"));
			$tgl_permintaan=$selisih;
			//--->end perhitungan
			$usia=$_POST['usia'];
			$usia2=$_POST['usia2'];
			$p=getNik('kode_perusahaan',$create_by);
			
			mysqli_query($koneksi, "UPDATE request SET			
			divisi='$divisi',jabatan='$jabatan',sesuai='$sesuai',
			pendidikan='$pendidikan',jurusan='$jurusan',
			jenis='$jenis',perkawinan='$perkawinan',
			pribadi='$pribadi',pengalaman='$pengalaman',
			keahlian='$keahlian',pendukung='$pendukung',
			status_kerja='$status_kerja',tugas='$tugas',
			bertanggung_jawab='$bertanggung_jawab',
			nama_pengganti='$nama_pengganti',
			golongan_ganti='$golongan_ganti',
			jabatan_ganti='$jabatan_ganti',tgl_phk='$tgl_phk',
			alasan_phk='$alasan_phk',penjelasan_pergantian='$penjelasan_pergantian',
			penjelasan_penambahan='$penjelasan_penambahan',
			perlu='$perlu',diminta='$diminta',disetujui='$disetujui',
			diupdate='$create_by',tgl_update='$date_create',
			tgl_permintaan='$tgl_permintaan',
			usia='$usia',usia2='$usia2',status='$status',p='$p'
			WHERE no_id = '$no_id'");
			header("Location: ../../?p=request&aksi=view&idrequest=$no_id");
		break;
		case 'adminunpost_tr':
			$id_training = $_POST['no_id'];
			$nik = $_POST['nik'];
			$tdk_langsung = $_POST['tdk_langsung'];
			
			// Get employee data based on NIK
			$nama = getNik('nama', $nik);
			$jabatan = getNik('kode_jabatan', $nik);
			$divisi = getNik('kode_divisi', $nik);
			$atasan = getNik('atasan', $nik);
			$kode_pegawai = getNik('kode_pegawai', $nik);
			$username = $create_by;
			
			mysqli_query($koneksi, "UPDATE training SET 
					nik = '$nik',
					nama = '$nama',
					jabatan = '$jabatan',
					divisi = '$divisi',
					atasan = '$atasan',
					tdk_langsung = '$tdk_langsung',
					kode_pegawai = '$kode_pegawai',
					tgl_update = NOW(),
					diupdate = '$username'
					WHERE no_id = '$id_training'");
			
			header("Location: ../../?p=training&aksi=view&idtraining=$id_training");
		break;	
		case 'adminunpost_trncuti':
			
			$tgl_cuti = $_POST['tgl_cuti'];
			$akhir_cuti = $_POST['akhir_cuti'];
			$keperluan = $_POST['keperluan'];
			$lama = $_POST['lama'];
			$tipe = $_POST['tipe'];

			// Check if the selected type is "Cuti Khusus"
			if ($tipe === 'Cuti Khusus') {
				$tipeValue = 1; // If "Cuti Khusus", set to 1
			} else {
				$tipeValue = 0; // For other types, set to 0
			}

			$tgl_masuk = $_POST['tgl_masuk'];
			$periode_cuti = $_POST['periode_cuti'];
			$alamat = $_POST['Alamat'];

			// Assuming the ID of the record to update is passed as 'idcuti'
			$idcuti = $_POST['id'];  // Get the ID for the record to update

			// Update query to update data in the table
			mysqli_query($koneksi, "UPDATE trncuti 
				SET tgl_cuti='$tgl_cuti',
					akhir_cuti='$akhir_cuti',
					keperluan='$keperluan',
					lama='$lama',
					tipe='$tipeValue',
					tgl_masuk='$tgl_masuk',
					periode_cuti='$periode_cuti',
					alamat='$alamat',
					diupdate='$create_by',
					tgl_update='$date_create'
				WHERE id='$idcuti'"); 
			
			header("Location: ../../?p=trncuti&aksi=view&idtrncuti=$idcuti");
		break;	
		default:
			# code...
			break;
	}
?>