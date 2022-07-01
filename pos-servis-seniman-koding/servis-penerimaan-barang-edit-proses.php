<?php

include "aksi/koneksi.php";

$ds_id 								= $_POST['ds_id'];
$ds_customer_id 					= htmlspecialchars($_POST['ds_customer_id']);
$ds_kategori_jenis_barang_servis_id = htmlspecialchars($_POST['ds_kategori_jenis_barang_servis_id']);
$ds_merk 							= htmlspecialchars($_POST['ds_merk']);
$ds_model_seri 						= htmlspecialchars($_POST['ds_model_seri']);
$ds_sn 								= htmlspecialchars($_POST['ds_sn']);
$ds_imei 							= htmlspecialchars($_POST['ds_imei']);
$ds_warna 							= htmlspecialchars($_POST['ds_warna']);
$ds_memory 							= htmlspecialchars($_POST['ds_memory']);
$ds_kelengkapan 					= htmlspecialchars($_POST['ds_kelengkapan']);
$ds_kerusakan 						= htmlspecialchars($_POST['ds_kerusakan']);
$ds_keterangan 						= htmlspecialchars($_POST['ds_keterangan']);
$ds_password 						= htmlspecialchars($_POST['ds_password']);
$ds_dp 								= htmlspecialchars($_POST['ds_dp']);
$ds_teknisi_disarankan 			    = htmlspecialchars($_POST['ds_teknisi_disarankan']);

	
	$query = "UPDATE data_servis SET
					ds_customer_id 						= '$ds_customer_id',
					ds_kategori_jenis_barang_servis_id  = '$ds_kategori_jenis_barang_servis_id',
					ds_merk 							= '$ds_merk',
					ds_model_seri 						= '$ds_model_seri',
					ds_sn 								= '$ds_sn',
					ds_imei 							= '$ds_imei',
					ds_warna 							= '$ds_warna',
					ds_memory 							= '$ds_memory',
					ds_kelengkapan 						= '$ds_kelengkapan',
					ds_kerusakan 						= '$ds_kerusakan',
					ds_keterangan 						= '$ds_keterangan',
					ds_password 						= '$ds_password',
					ds_dp 								= '$ds_dp',
					ds_teknisi_disarankan 				= '$ds_teknisi_disarankan'
					WHERE ds_id = '$ds_id' ";

	mysqli_query($conn, $query)
	or die ("Gagal Perintah SQL".mysql_error());
	$data['hasil'] = 'sukses';
    

echo json_encode($data);

?>
