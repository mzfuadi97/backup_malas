<?php
switch ($_GET['p']) {
case 'update':     
            $user=$idUser;
            $menu="update";
            $cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
            if($cekmenu==1){        
                include "module/user/update.php";
            }
            else{
                include "noakses.php";
            }               
break;	
case 'user':  
	$user=$idUser;
	$menu="user";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/user/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/user/tambah.php";
		}
		else{
			include "module/user/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;		
case 'hakakses':
            $user=$idUser;
            $menu="hakakses";
            $cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
            if($cekmenu==1){  
                include "module/hakakses/tampil.php";
            }
            else{
                include "noakses.php";
            }  
            break;

case 'laporan_peg':  
	$user=$idUser;
	$menu="laporan_peg";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if ($cekmenu == 1) {
        include "module/laporan_peg/karyawan1.php";
    } else {
        include "noakses.php";
    }
break;


case 'laporan_purc':  
	$user=$idUser;
	$menu="laporan_purc";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if ($cekmenu == 1) {
        include "module/laporan_purc/purchase.php";
    } else {
        include "noakses.php";
    }
break;

case 'purchase_revisi':  
	$user=$idUser;
	$menu="purchase_revisi";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if ($cekmenu == 1) {
        include "module/purchase_revisi/view.php";
    } else {
        include "noakses.php";
    }
break;

case 'exportppak':  
	$user=$idUser;
	$menu="exportppak";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if ($cekmenu == 1) {
        include "module/exportppak/purchase.php";
    } else {
        include "noakses.php";
    }
break;
		

case 'histori':  
	$user=$idUser;
	$menu="histori";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if ($cekmenu == 1) {
        include "module/histori/tampil.php";
    } else {
        include "noakses.php";
    }
break;
//TAMBAH AKSES MENU 
case 'cabang':  
	$user=$idUser;
	$menu="cabang";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/cabang/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/cabang/tambah.php";
		}		
		else{
			include "module/cabang/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	

case 'purchase':  
	$user=$idUser;
	$menu="purchase";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/purchase/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/purchase/tambah.php";
		}
		else if($_GET['aksi']=='tambah_manual'){
			include "module/purchase/tambah_manual.php";
		}
		else if($_GET['aksi']=='adminunpost_purchase'){
			include "module/purchase/adminunpost_purchase.php";
		}	
		else if($_GET['aksi']=='view'){
			include "module/purchase/view.php";
		}	
		else if($_GET['aksi']=='adminpost'){
			include "module/purchase/adminpost.php";
		}	
		else if($_GET['aksi']=='adminpost_'){
			include "module/purchase/adminpost_.php";
		}
		else if($_GET['aksi']=='ga'){
			include "module/purchase/ga.php";
		}	
		else if($_GET['aksi']=='view_ga'){
			include "module/purchase/view_ga.php";
		}
		else if($_GET['aksi']=='view_banding'){
			include "module/purchase/view_banding.php";
		}
		else if($_GET['aksi']=='view_purc'){
			include "module/purchase/view_purc.php";
		}
		else if($_GET['aksi']=='view_purc_app'){
			include "module/purchase/view_purc_app.php";
		}
		else if($_GET['aksi']=='verifikasi_ga'){
			include "module/purchase/verifikasi_ga.php";
		}
		else if($_GET['aksi']=='stat_ga'){
			include "module/purchase/stat_ga.php";
		}	
		else if($_GET['aksi']=='view_update'){
			include "module/purchase/view_update.php";
		}	
		else if($_GET['aksi']=='atasan'){
			include "module/purchase/atasan.php";
		}
		else if($_GET['aksi']=='verifikasi_atasan'){
			include "module/purchase/verifikasi_atasan.php";
		}
		else if($_GET['aksi']=='stat_atasan'){
			include "module/purchase/stat_atasan.php";
		}
		else if($_GET['aksi']=='om'){
			include "module/purchase/om.php";
		}
		else if($_GET['aksi']=='view_om'){
			include "module/purchase/view_om.php";
		}
		else if($_GET['aksi']=='stat_om'){
			include "module/purchase/stat_om.php";
		}
		else if($_GET['aksi']=='verifikasi_om'){
			include "module/purchase/verifikasi_om.php";
		}
		else if($_GET['aksi']=='verifikasi_om_all'){
			include "module/purchase/verifikasi_om_all.php";
		}
		else if($_GET['aksi']=='stat_om_all'){
			include "module/purchase/stat_om_all.php";
		}
		else if($_GET['aksi']=='verifikasi_direksi_all'){
			include "module/purchase/verifikasi_direksi_all.php";
		}
		else if($_GET['aksi']=='stat_direksi_all'){
			include "module/purchase/stat_direksi_all.php";
		}
		else if($_GET['aksi']=='view_atasan'){
			include "module/purchase/view_atasan.php";
		}
		else if($_GET['aksi']=='direksi'){
			include "module/purchase/direksi.php";
		}			
		else{
			include "module/purchase/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	

case 'purchase_non':  
	$user=$idUser;
	$menu="purchase_non";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/purchase_non/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/purchase_non/tambah.php";
		}
		else if($_GET['aksi']=='tambah_manual'){
			include "module/purchase_non/tambah_manual.php";
		}
		else if($_GET['aksi']=='adminunpost_purchase'){
			include "module/purchase_non/adminunpost_purchase.php";
		}	
		else if($_GET['aksi']=='view'){
			include "module/purchase_non/view.php";
		}	
		else if($_GET['aksi']=='adminpost'){
			include "module/purchase_non/adminpost.php";
		}	
		else if($_GET['aksi']=='adminpost_'){
			include "module/purchase_non/adminpost_.php";
		}
		else if($_GET['aksi']=='view_banding'){
			include "module/purchase_non/view_banding.php";
		}
		else if($_GET['aksi']=='view_purc'){
			include "module/purchase_non/view_purc.php";
		}
		else if($_GET['aksi']=='view_purc_app'){
			include "module/purchase_non/view_purc_app.php";
		}
		else if($_GET['aksi']=='view_update'){
			include "module/purchase_non/view_update.php";
		}	
		else if($_GET['aksi']=='atasan'){
			include "module/purchase_non/atasan.php";
		}
		else if($_GET['aksi']=='verifikasi_atasan'){
			include "module/purchase_non/verifikasi_atasan.php";
		}
		else if($_GET['aksi']=='stat_atasan'){
			include "module/purchase_non/stat_atasan.php";
		}
		else if($_GET['aksi']=='om'){
			include "module/purchase_non/om.php";
		}
		else if($_GET['aksi']=='view_om'){
			include "module/purchase_non/view_om.php";
		}
		else if($_GET['aksi']=='stat_om'){
			include "module/purchase_non/stat_om.php";
		}
		else if($_GET['aksi']=='verifikasi_om'){
			include "module/purchase_non/verifikasi_om.php";
		}
		else if($_GET['aksi']=='verifikasi_om_all'){
			include "module/purchase_non/verifikasi_om_all.php";
		}
		else if($_GET['aksi']=='stat_om_all'){
			include "module/purchase_non/stat_om_all.php";
		}
		else if($_GET['aksi']=='verifikasi_direksi_all'){
			include "module/purchase_non/verifikasi_direksi_all.php";
		}
		else if($_GET['aksi']=='stat_direksi_all'){
			include "module/purchase_non/stat_direksi_all.php";
		}
		else if($_GET['aksi']=='view_atasan'){
			include "module/purchase_non/view_atasan.php";
		}
		else if($_GET['aksi']=='direksi'){
			include "module/purchase_non/direksi.php";
		}			
		else{
			include "module/purchase_non/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;		                    

case 'att_finger':  
	$user=$idUser;
	$menu="att_finger";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if ($cekmenu == 1) {
        include "module/att_finger/tampil.php";
    } else {
        include "noakses.php";
    }
break;

case 'att_cuti':  
	$user=$idUser;
	$menu="att_cuti";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if ($cekmenu == 1) {
        include "module/att_cuti/tampil.php";
    } else {
        include "noakses.php";
    }
break;

case 'att_spd':  
	$user=$idUser;
	$menu="att_spd";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if ($cekmenu == 1) {
        include "module/att_spd/tampil.php";
    } else {
        include "noakses.php";
    }
break;

case 'att_telat':  
	$user=$idUser;
	$menu="att_telat";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='view'){
			include "module/att_telat/view.php";
		}
		else if($_GET['aksi']=='view_'){
			include "module/att_telat/view_.php";
		}
		else if($_GET['aksi']=='tampild'){
			include "module/att_telat/tampild.php";
		}			
		else{
			include "module/att_telat/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	

case 'att_hari':  
	$user=$idUser;
	$menu="att_hari";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='tampil_tdk'){
			include "module/att_hari/tampil_tdk.php";
		}			
		else{
			include "module/att_hari/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;

case 'att_cabang':  
	$user=$idUser;
	$menu="att_cabang";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='tampil_tdk'){
			include "module/att_cabang/tampil_tdk.php";
		}			
		else{
			include "module/att_cabang/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;


case 'att_divisi':  
	$user=$idUser;
	$menu="att_divisi";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if ($cekmenu == 1) {
        include "module/att_divisi/tampil.php";
    } else {
        include "noakses.php";
    }
break;

case 'att_pegawai':  
	$user=$idUser;
	$menu="att_pegawai";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if ($cekmenu == 1) {
        include "module/att_pegawai/tampil.php";
    } else {
        include "noakses.php";
    }
break;
case 'ppak':  
	$user=$idUser;
	$menu="ppak";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/ppak/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/ppak/tambah.php";
		}		
		else if($_GET['aksi']=='view'){
			include "module/ppak/view.php";
		}	
		else if($_GET['aksi']=='adminunpost_ppak'){
			include "module/ppak/adminunpost_ppak.php";
		}	
		else if($_GET['aksi']=='adminpost'){
			include "module/ppak/adminpost.php";
		}		
		else{
			include "module/ppak/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	
//TAMBAH TABEL FORM JABATAN
case 'jabatan':  
	$user=$idUser;
	$menu="jabatan";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/jabatan/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/jabatan/tambah.php";
		}		
		else{
			include "module/jabatan/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	
case 'sisacuti':  
	$user=$idUser;
	$menu="sisacuti";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/sisacuti/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/sisacuti/tambah.php";
		}
		else if($_GET['aksi']=='tambahTSE'){
			include "module/sisacuti/tambahTSE.php";
		}
		else if($_GET['aksi']=='tambahTSA'){
			include "module/sisacuti/tambahTSA.php";
		}		
		else{
			include "module/sisacuti/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;
case 'pegawai':  
	$user=$idUser;
	$menu="pegawai";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/pegawai/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/pegawai/tambah.php";
		}
		else if($_GET['aksi']=='view'){
			include "module/pegawai/view.php";
		}
		//else if($_GET['aksi']=='manage'){
		//	include "module/pegawai/tampil.php";
		//}		
		else{
			include "module/pegawai/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;
case 'request':  
	$user=$idUser;
	$menu="request";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/request/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/request/tambah.php";
		}
		else if($_GET['aksi']=='adminunpost'){
			include "module/request/adminunpost.php";
		}
		else if($_GET['aksi']=='view'){
			include "module/request/view.php";
		}
		else if($_GET['aksi']=='view_admin'){
			include "module/request/view_admin.php";
		}
		else if($_GET['aksi']=='view_admin4'){
			include "module/request/view_admin4.php";
		}
		else if($_GET['aksi']=='view_admin2'){
			include "module/request/view_admin2.php";
		}
		else if($_GET['aksi']=='view_admin5'){
			include "module/request/view_admin5.php";
		}
		else if($_GET['aksi']=='update_status_admin_verif'){
			include "module/request/update_status_admin_verif.php";
		}
		else if($_GET['aksi']=='admin'){
			include "module/request/admin.php";
		}
		else if($_GET['aksi']=='admin4'){
			include "module/request/admin4.php";
		}
		else if($_GET['aksi']=='admin2'){
			include "module/request/admin2.php";
		}
		else if($_GET['aksi']=='admin5'){
			include "module/request/admin5.php";
		}
		else if($_POST['aksi']=='hapus'){
			include "module/request/hapus.php";
		}
		else if($_GET['aksi']=='verifikasi'){
			include "module/request/verifikasi.php";
		}
		else if($_GET['aksi']=='update_status_admin_verif'){
			include "module/request/update_status_admin_verif.php";
		}
		else if($_GET['aksi']=='stat_admin'){
			include "module/request/stat_admin.php";
		}
		else if($_GET['aksi']=='verifikasi4'){
			include "module/request/verifikasi4.php";
		}
		else if($_GET['aksi']=='stat_admin4'){
			include "module/request/stat_admin4.php";
		}
		else if($_GET['aksi']=='verifikasi4_all'){
			include "module/request/verifikasi4_all.php";
		}
		else if($_GET['aksi']=='stat_admin4_all'){
			include "module/request/stat_admin4_all.php";
		}
		else if($_GET['aksi']=='verifikasi2'){
			include "module/request/verifikasi2.php";
		}
		else if($_GET['aksi']=='stat_admin2'){
			include "module/request/stat_admin2.php";
		}
		else if($_GET['aksi']=='verifikasi5'){
			include "module/request/verifikasi5.php";
		}
		else if($_GET['aksi']=='stat_admin5_view'){
			include "module/request/stat_admin5_view.php";
		}
		else if($_GET['aksi']=='verifikasi5_all'){
			include "module/request/verifikasi5_all.php";
		}
		else if($_GET['aksi']=='stat_admin5_all'){
			include "module/request/stat_admin5_all.php";
		}
		else{
			include "module/request/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	
case 'training':  
	$user=$idUser;
	$menu="training";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/training/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/training/tambah.php";
		}
		else if($_GET['aksi']=='view'){
			include "module/training/view.php";
		}
		else if($_GET['aksi']=='adminunpost_tr'){
			include "module/training/adminunpost.php";
		}
		else if($_GET['aksi']=='admin'){
			include "module/training/admin.php";
		}
		else if($_GET['aksi']=='admin3'){
			include "module/training/admin3.php";
		}
		else if($_GET['aksi']=='admin4'){
			include "module/training/admin4.php";
		}
		else if($_GET['aksi']=='admin2'){
			include "module/training/admin2.php";
		}
		else if($_GET['aksi']=='admin5'){
			include "module/training/admin5.php";
		}
		else if($_POST['aksi']=='hapus'){
			include "module/training/hapus.php";
		}
		else if($_GET['aksi']=='view'){
			include "module/training/view.php";
		}
		else if($_GET['aksi']=='view_tidak'){
			include "module/training/view_tidak.php";
		}
		else if($_GET['aksi']=='view_admin'){
			include "module/training/view_admin.php";
		}
		else if($_GET['aksi']=='view_admin4'){
			include "module/training/view_admin4.php";
		}
		else if($_GET['aksi']=='view_admin2'){
			include "module/training/view_admin2.php";
		}
		else if($_GET['aksi']=='view_admin5'){
			include "module/training/view_admin5.php";
		}
		else if($_GET['aksi']=='verifikasi'){
			include "module/training/verifikasi.php";
		}
		else if($_GET['aksi']=='verifikasi_admin'){
			include "module/training/verifikasi_admin.php";
		}
		else if($_GET['aksi']=='verifikasi_admin4'){
			include "module/training/verifikasi_admin4.php";
		}
		else if($_GET['aksi']=='verifikasi_admin2'){
			include "module/training/verifikasi_admin2.php";
		}
		else if($_GET['aksi']=='verifikasi_admin5'){
			include "module/training/verifikasi_admin5.php";
		}
		else if($_GET['aksi']=='verifikasi_admin4_all'){
			include "module/training/verifikasi_admin4_all.php";
		}
		else if($_GET['aksi']=='verifikasi_adminunpost'){
			include "module/training/verifikasi_adminunpost.php";
		}
		else if($_GET['aksi']=='verifikasi_admin3'){
			include "module/training/verifikasi_admin3.php";
		}
		else if($_GET['aksi']=='stat_admin4_all'){
			include "module/training/stat_admin4_all.php";
		}
		else if($_GET['aksi']=='stat_admin3'){
			include "module/training/stat_admin3.php";
		}
		else if($_GET['aksi']=='stat_admin'){
			include "module/training/stat_admin.php";
		}
		else if($_GET['aksi']=='stat_admin2'){
			include "module/training/stat_admin2.php";
		}
		else if($_GET['aksi']=='stat_admin5'){
			include "module/training/stat_admin5.php";
		}
		//else if($_GET['aksi']=='manage'){
		//	include "module/training/tampil.php";
		//}		
		else{
			include "module/training/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	
case 'trncuti':  
	$user=$idUser;
	$menu="trncuti";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/trncuti/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/trncuti/tambah.php";
		}
		else if($_GET['aksi']=='direksi2'){
			include "module/trncuti/direksi2.php";
		}
		else if($_GET['aksi']=='admin2trncuti'){
			include "module/trncuti/admin2trncuti.php";
		}	
		else if($_GET['aksi']=='admin5trncuti'){
			include "module/trncuti/admin5trncuti.php";
		}	
		else if($_GET['aksi']=='adminunpost_trncuti'){
			include "module/trncuti/adminunpost_trncuti.php";
		}
		else if($_GET['aksi']=='view'){
			include "module/trncuti/view.php";
		}	
		else if($_GET['aksi']=='view_spv'){
			include "module/trncuti/view_spv.php";
		}	
		else if($_GET['aksi']=='view_admin2'){
			include "module/trncuti/view_admin2.php";
		}
		else if($_GET['aksi']=='view_admin4'){
			include "module/trncuti/view_admin4.php";
		}
		else if($_GET['aksi']=='view_admin5'){
			include "module/trncuti/view_admin5.php";
		}
		else if($_GET['aksi']=='view_direksi2'){
			include "module/trncuti/view_direksi2.php";
		}
		else if($_GET['aksi']=='admin4trncuti'){
			include "module/trncuti/admin4trncuti.php";
		}		
		else if($_GET['aksi']=='verifikasi_spv'){
			include "module/trncuti/verifikasi_spv.php";
		}	
		else if($_GET['aksi']=='verifikasi_admin2'){
			include "module/trncuti/verifikasi_admin2.php";
		}
		else if($_GET['aksi']=='verifikasi_admin4'){
			include "module/trncuti/verifikasi_admin4.php";
		}
		else if($_GET['aksi']=='verifikasi_admin5'){
			include "module/trncuti/verifikasi_admin5.php";
		}
		else if($_GET['aksi']=='stat_spv'){
			include "module/trncuti/stat_spv.php";
		}	
		else if($_GET['aksi']=='stat_admin2'){
			include "module/trncuti/stat_admin2.php";
		}
		else if($_GET['aksi']=='stat_admin4'){
			include "module/trncuti/stat_admin4.php";
		}	
		else if($_GET['aksi']=='stat_admin5'){
			include "module/trncuti/stat_admin5.php";
		}				
		else if($_POST['aksi']=='hapus'){
			include "module/trncuti/hapus.php";
		}		
		else{
			include "module/trncuti/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	
case 'nota':  
	$user=$idUser;
	$menu="nota";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/nota/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/nota/tambah.php";
		}	
		else if($_GET['aksi']=='adminunpost_nota'){
			include "module/nota/adminunpost_nota.php";
		}	
		else if($_GET['aksi']=='view'){
			include "module/nota/view.php";
		}
		else if($_GET['aksi']=='adminhcd'){
			include "module/nota/adminhcd.php";
		}
		else if($_GET['aksi']=='admin'){
			include "module/nota/admin.php";
		}
		else if($_GET['aksi']=='admin2spd'){
			include "module/nota/admin2spd.php";
		}
		else if($_GET['aksi']=='adminfad'){
			include "module/nota/adminfad.php";
		}
		else if($_GET['aksi']=='view_adminhcd'){
			include "module/nota/view_adminhcd.php";
		}
		else if($_GET['aksi']=='view_admin'){
			include "module/nota/view_admin.php";
		}
		else if($_GET['aksi']=='view_notadetail'){
			include "module/nota/view_notadetail.php";
		}
		else if($_GET['aksi']=='stat_adminhcd'){
			include "module/nota/stat_adminhcd.php";
		}
		else if($_GET['aksi']=='stat_admin'){
			include "module/nota/stat_admin.php";
		}
		else if($_GET['aksi']=='stat_admin2spd'){
			include "module/nota/stat_admin2spd.php";
		}
		else if($_GET['aksi']=='stat_adminfad'){
			include "module/nota/stat_adminfad.php";
		}
		else if($_GET['aksi']=='verifikasi_adminhcd'){
			include "module/nota/verifikasi_adminhcd.php";
		}
		else if($_GET['aksi']=='verifikasi_admin'){
			include "module/nota/verifikasi_admin.php";
		}
		else if($_GET['aksi']=='verifikasi_admin2spd'){
			include "module/nota/verifikasi_admin2spd.php";
		}
		else if($_GET['aksi']=='verifikasi_adminfad'){
			include "module/nota/verifikasi_adminfad.php";
		}
		else if($_GET['aksi']=='direksi2'){
			include "module/nota/direksi2.php";
		}
		else if($_GET['aksi']=='view_direksi2'){
			include "module/nota/view_direksi2.php";
		}
		else{
			include "module/nota/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	

case 'off':  
	$user=$idUser;
	$menu="off";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/off/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/off/tambah.php";
		}
		else if($_GET['aksi']=='adminunpost_off'){
			include "module/off/adminunpost_off.php";
		}	
		else if($_GET['aksi']=='manager'){
			include "module/off/manager.php";
		}	
		else if($_GET['aksi']=='verifikasi_manager'){
			include "module/off/verifikasi_manager.php";
		}	
		else if($_GET['aksi']=='stat_manager'){
			include "module/off/stat_manager.php";
		}
		else if($_GET['aksi']=='adminhcd'){
			include "module/off/adminhcd.php";
		}
		else if($_GET['aksi']=='verifikasi_adminhcd'){
			include "module/off/verifikasi_adminhcd.php";
		}	
		else if($_GET['aksi']=='stat_adminhcd'){
			include "module/off/stat_adminhcd.php";
		}		
		else if($_GET['aksi']=='view'){
			include "module/off/view.php";
		}
			
		else{
			include "module/off/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	
case 'service':  
	$user=$idUser;
	$menu="service";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/service/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/service/tambah.php";
		}
		else if($_GET['aksi']=='adminunpost_service'){
			include "module/service/adminunpost_service.php";
		}
		else if($_GET['aksi']=='view'){
			include "module/service/view.php";
		}
		else if($_GET['aksi']=='sm'){
			include "module/service/sm.php";
		}
		else if($_GET['aksi']=='gaom'){
			include "module/service/gaom.php";
		}
		else if($_GET['aksi']=='famd'){
			include "module/service/famd.php";
		}
		else if($_GET['aksi']=='verifikasi_sm'){
			include "module/service/verifikasi_sm.php";
		}
		else if($_GET['aksi']=='stat_sm'){
			include "module/service/stat_sm.php";
		}
		else if($_GET['aksi']=='verifikasi_gaom'){
			include "module/service/verifikasi_gaom.php";
		}
		else if($_GET['aksi']=='stat_gaom'){
			include "module/service/stat_gaom.php";
		}
		else if($_GET['aksi']=='verifikasi_gaom_all'){
			include "module/service/verifikasi_gaom_all.php";
		}	
		else if($_GET['aksi']=='stat_gaom_all'){
			include "module/service/stat_gaom_all.php";
		}
		else if($_GET['aksi']=='verifikasi_famd_all'){
			include "module/service/verifikasi_famd_all.php";
		}	
		else if($_GET['aksi']=='stat_famd_all'){
			include "module/service/stat_famd_all.php";
		}			
		else if($_GET['aksi']=='verifikasi_famd'){
			include "module/service/verifikasi_famd.php";
		}
		else if($_GET['aksi']=='stat_famd'){
			include "module/service/stat_famd.php";
		}		
		else{
			include "module/service/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	
//TAMBAH TABEL FORM JABATAN
case 'jabatan':  
	$user=$idUser;
	$menu="jabatan";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/jabatan/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/jabatan/tambah.php";
		}		
		else{
			include "module/jabatan/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	

case 'unit':  
	$user=$idUser;
	$menu="unit";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/unit/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/unit/tambah.php";
		}
		else if($_GET['aksi']=='admin'){
			include "module/unit/admin.php";
		}	
		else if($_GET['aksi']=='admin2'){
			include "module/unit/admin2.php";
		}	
		else if($_GET['aksi']=='view_admin'){
			include "module/unit/view_admin.php";
		}		
		else{
			include "module/unit/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;

case 'sewa':  
	$user=$idUser;
	$menu="sewa";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/sewa/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/sewa/tambah.php";
		}
		else if($_GET['aksi']=='admin'){
			include "module/sewa/admin.php";
		}	
		else if($_GET['aksi']=='admin2'){
			include "module/sewa/admin2.php";
		}	
		else if($_GET['aksi']=='view_admin'){
			include "module/sewa/view_admin.php";
		}		
		else{
			include "module/sewa/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;

case 'izin':  
	$user=$idUser;
	$menu="izin";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/izin/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/izin/tambah.php";
		}
		else if($_GET['aksi']=='admin'){
			include "module/izin/admin.php";
		}	
		else if($_GET['aksi']=='admin2'){
			include "module/izin/admin2.php";
		}	
		else if($_GET['aksi']=='view_admin'){
			include "module/izin/view_admin.php";
		}		
		else{
			include "module/izin/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;

//TAMBAH TABEL FORM SECTION
case 'section':  
	$user=$idUser;
	$menu="section";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/section/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/section/tambah.php";
		}		
		else{
			include "module/section/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	

//TAMBAH TABEL FORM STATUS NIKAH
case 'status':  
	$user=$idUser;
	$menu="status";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/status/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/status/tambah.php";
		}		
		else{
			include "module/status/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	

//TAMBAH TABEL FORM ITEM
case 'item':  
	$user=$idUser;
	$menu="item";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/item/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/item/tambah.php";
		}		
		else{
			include "module/item/tampil.php";
		} 
		
}
	else{
		include "noakses.php";
	}
break;
case 'item1':  
	$user=$idUser;
	$menu="item1";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/item1/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/item1/tambah.php";
		}		
		else{
			include "module/item1/tampil.php";
		} 
		
}
	else{
		include "noakses.php";
	}
break;	

//TAMBAH TABEL FORM ATK
case 'atk':  
	$user=$idUser;
	$menu="atk";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/atk/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/atk/tambah.php";
		}		
		else{
			include "module/atk/tampil.php";
		} 
		
}
	else{
		include "noakses.php";
	}
break;	

//TAMBAH TABEL FORM SUPLIER
case 'suplier':  
	$user=$idUser;
	$menu="suplier";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/suplier/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/suplier/tambah.php";
		}		
		else{
			include "module/suplier/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;
case 'divisi':  
	$user=$idUser;
	$menu="divisi";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/divisi/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/divisi/tambah.php";
		}		
		else{
			include "module/divisi/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	

case 'departemen':  
	$user=$idUser;
	$menu="departemen";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/departemen/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/departemen/tambah.php";
		}		
		else{
			include "module/departemen/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	

case 'barang':  
	$user=$idUser;
	$menu="barang";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/barang/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/barang/tambah.php";
		}		
		else{
			include "module/barang/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;


case 'history':  
	$user=$idUser;
	$menu="history";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/history/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/history/tambah.php";
		}		
		else{
			include "module/history/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	
case 'tujuan':  
	$user=$idUser;
	$menu="tujuan";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/tujuan/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/tujuan/tambah.php";
		}		
		else{
			include "module/tujuan/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	
case 'spd':  
	$user=$idUser;
	$menu="spd";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/spd/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/spd/tambah.php";
		}		
		else{
			include "module/spd/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	
case 'transport':  
	$user=$idUser;
	$menu="transport";
	$cekmenu=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hak_akses WHERE user='$user' AND menu='$menu'"));
	if($cekmenu==1)
	{ 		                    
		if($_GET['aksi']=='edit'){
			include "module/transport/edit.php";
		}
		else if($_GET['aksi']=='tambah'){
			include "module/transport/tambah.php";
		}		
		else{
			include "module/transport/tampil.php";
		} 
}
	else{
		include "noakses.php";
	}
break;	
//TAMBAH DEFAULT MENU 	
default:			           
	include "module/hris_ver_0/tampil.php";
	break;
}	 
?>