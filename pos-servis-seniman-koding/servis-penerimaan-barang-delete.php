<?php 
include 'aksi/functions.php';

$id = base64_decode($_GET["id"]);

if( hapusPenerimaanServis($id) > 0) {
	echo "
		<script>
			document.location.href = 'servis-penerimaan-barang';
		</script>
	";
} else {
	echo "
		<script>
			alert('Data gagal dihapus');
			document.location.href = 'servis-penerimaan-barang';
		</script>
	";
}

?>