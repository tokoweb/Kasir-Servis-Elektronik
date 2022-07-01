<?php

include "aksi/koneksi.php";
date_default_timezone_set('Asia/Jakarta');

	$customer_nama     = htmlspecialchars($_POST["customer_nama"]);
	$customer_tlpn     = htmlspecialchars($_POST["customer_tlpn"]);
	$customer_email    = htmlspecialchars($_POST["customer_email"]);
	$customer_alamat   = htmlspecialchars($_POST["customer_alamat"]);
	$customer_date     = date("Y-m-d");
	$customer_create   = date("d F Y g:i:s a");
	$customer_status   = htmlspecialchars($_POST["customer_status"]);
	$customer_cabang   = htmlspecialchars($_POST["customer_cabang"]);

	// Cek Email
	$customer_tlpn_cek = mysqli_num_rows(mysqli_query($conn, "select * from customer where customer_tlpn = '$customer_tlpn' && customer_cabang = $customer_cabang "));


	if ( $customer_tlpn_cek > 0 ) {

		$data['hasil'] = 'gagal';

	} else {
		// query insert data
		$query = "insert INTO customer SET
					customer_nama 							= '$customer_nama',
					customer_tlpn 						= '$customer_tlpn',
					customer_email 						= '$customer_email',
					customer_alamat  = '$customer_alamat',
					customer_date 							= '$customer_date',
					customer_create 						= '$customer_create',
					customer_status 								= '$customer_status',
					customer_count_invoice 							= '',
					customer_count_servis 							= '',
					customer_cabang 							= '$customer_cabang'
				";

		mysqli_query($conn, $query)
		or die ("Gagal Perintah SQL".mysql_error());

		$data['hasil'] = 'sukses';
	}   

echo json_encode($data);

?>
