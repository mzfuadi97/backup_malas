<?php
	include "../../config/config.php";
		
	$params = $totalRecords = $data = array();
	$params = $_REQUEST;
			
	$where = $sqlTot = $sqlRec = "";
	
	if( !empty($params['search']['value']) ) {   
		$where .=" WHERE ";
		$where .=" kode LIKE '%".$params['search']['value']."%' ";    
		$where .=" OR nama LIKE '%".$params['search']['value']."%' ";		
	}
		
	$sql = "SELECT pp.kode kode, pp.tanggal, p.nama nama,
	CASE 
    WHEN pp.status = 1 AND pp.posting = 0 THEN 'Unposting'
    WHEN pp.posting = 1 THEN 'Posting'
    ELSE 'Unposting' 
END AS status,

	pp.kode kode FROM ppak pp LEFT JOIN pegawai p ON pp.kode_pegawai = p.kode_pegawai";
	$sqlTot .= $sql;
	$sqlRec .= $sql;
	
	if(isset($where) && $where != '') {

		$sqlTot .= $where;
		$sqlRec .= $where;
	}
	
	$columnIndex = $params['order'][0]['column']; // Mengambil kolom yang dipilih untuk diurutkan
	$columnName = $params['columns'][$columnIndex]['data']; // Menyebutkan nama kolom
	$columnSortOrder = $params['order'][0]['dir']; // Menentukan urutan ASC atau DESC

		if($columnName == 'kode') {
		$columnName = "kode"; // Nama asli kolom yang dipakai untuk sorting
	} else {
		$columnName = "kode"; // Default pengurutan jika kolom lain
	}
	$sqlRec .= " ORDER BY " . $columnName . " " . $columnSortOrder . " LIMIT " . $params['start'] . " , " . $params['length'];

	$queryTot = mysqli_query($koneksi,$sqlTot) or die("database error:". mysqli_error($koneksi));


	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($koneksi,$sqlRec) or die(mysqli_error($koneksi));
	
	while($row=mysqli_fetch_row($queryRecords)) { 
		$data[] = $row;
	}	

	$json_data = array(
		"draw"            => intval( $params['draw'] ),   
		"recordsTotal"    => intval( $totalRecords ),  
		"recordsFiltered" => intval($totalRecords),
		"data"            => $data 
	);

	echo json_encode($json_data); 
?>