<?php

include "aksi/koneksi.php";
date_default_timezone_set('Asia/Jakarta');

$ds_nota_count 						= $_POST['ds_nota_count'];
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
$ds_kondisi_unit_masuk 				= htmlspecialchars($_POST['ds_kondisi_unit_masuk']);
$ds_keterangan 						= htmlspecialchars($_POST['ds_keterangan']);
$ds_password 						= htmlspecialchars($_POST['ds_password']);
$ds_dp 								= htmlspecialchars($_POST['ds_dp']);
$ds_penerima_id 					= htmlspecialchars($_POST['ds_penerima_id']);
$ds_terima_date 					= date("Y-m-d");
$ds_terima_date_time 				= date("d F Y g:i:s a");
$ds_teknisi_disarankan 			    = htmlspecialchars($_POST['ds_teknisi_disarankan']);
$ds_cabang 							= htmlspecialchars($_POST['ds_cabang']);


    
		$query = "insert INTO data_servis SET
					ds_nota 							= '$ds_nota_count',
					ds_nota_count 						= '$ds_nota_count',
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
					ds_kondisi_unit_masuk               = '$ds_kondisi_unit_masuk',
					ds_keterangan 						= '$ds_keterangan',
					ds_password 						= '$ds_password',
					ds_dp 								= '$ds_dp',
					ds_penerima_id 						= '$ds_penerima_id',
					ds_terima_date 						= '$ds_terima_date',
					ds_terima_date_time 				= '$ds_terima_date_time',
					ds_kondisi_barang 					= '',
					ds_note 							= '',
					ds_total_biaya_jasa 				= '',
					ds_total_biaya_sparepart 			= '',
					ds_total_biaya_sparepart_beli       = '',
					ds_total 							= '',
					ds_total_sisa_bayar 				= '',
					ds_teknisi 							= '',
					ds_teknisi_disarankan               = '$ds_teknisi_disarankan',
					ds_penyerah_id 						= '',
					ds_ambil_date 						= '-',
					ds_ambil_date_time 					= '-',
					ds_status 							= '1',
					ds_garansi 							= '',
					ds_garansi_date_time 				= '',
					ds_garansi_komplain_date 			= '',
					ds_garansi_komplain_date_time 		= '',
					ds_garansi_komplain_penerima_id 	= '',
					ds_garansi_komplain_note 			= '',
					ds_cabang 							= '$ds_cabang'
				";

		mysqli_query($conn, $query)
		or die ("Gagal Perintah SQL".mysql_error());
		
    $data['hasil'] = 'sukses';
    

echo json_encode($data);

?>
