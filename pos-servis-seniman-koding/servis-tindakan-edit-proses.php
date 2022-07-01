<?php

include "aksi/koneksi.php";
date_default_timezone_set('Asia/Jakarta');

$ds_id 								= $_POST['ds_id'];
$ds_teknisi 					    = $_POST['ds_teknisi'];
$ds_nota 							= $_POST['ds_nota'];
$ds_status  						= 4;
$hst_date 							= date("Y-m-d");
$hst_date_time						= date("d F Y g:i:s a");
$ds_cabang 							= $_POST['ds_cabang'];

	// Edit status di table data_servis
	$query = "UPDATE data_servis SET
					ds_teknisi 						= '$ds_teknisi',
					ds_status 						=  '$ds_status'
					WHERE ds_id = '$ds_id' ";
	mysqli_query($conn, $query);

	// Insert ke history_servis_tekinis
	$query2 = "INSERT INTO history_servis_tekinis VALUES ('', '$ds_nota', '$ds_teknisi', '$ds_status', '$hst_date', '$hst_date_time', '$ds_cabang')";				
	mysqli_query($conn, $query2);

	

	// or die ("Gagal Perintah SQL".mysql_error());
	$data['hasil'] = 'sukses';
    

echo json_encode($data);

?>
