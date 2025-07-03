<?php
	include "../../config/config.php";
		
	mysqli_query($koneksi,"DELETE FROM off WHERE id='$_GET[idoff]'");

	header('location:../../?p=off&aksi=adminunpost_off');
?>