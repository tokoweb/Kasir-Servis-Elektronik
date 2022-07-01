<?php  
	include '_header-artibut.php';
	$id = $_GET['id'];

	// query data berdasarkan id
	$servis       = query("SELECT * FROM data_servis WHERE ds_id = $id ")[0];
	$nota         					 = $servis['ds_nota'];
	$status       					 = $servis['ds_status'];
	$ds_garansi_komplain_penerima_id = $servis['ds_garansi_komplain_penerima_id'];
	$cabangServis 					 = $servis['ds_cabang'];
?>

                      	
    <div class="form-group">
        <label for="ds_kondisi_barang">Garansi Servis</label>
        <input type="date" name="ds_garansi" class="form-control" id="ds_garansi" value="<?= $servis['ds_garansi']; ?>" required>
    </div>

    <input type="hidden" name="ds_id" value="<?= $servis['ds_id']; ?>">
	<input type="hidden" name="ds_nota" value="<?= $servis['ds_nota']; ?>">
	<input type="hidden" name="ds_teknisi" value="<?= $servis['ds_teknisi']; ?>">
	<input type="hidden" name="ds_cabang" value="<?= $servis['ds_cabang']; ?>">
	<input type="hidden" name="ds_penyerah_id" value="<?= $userIdLogin; ?>">
	<input type="hidden" name="ds_garansi_komplain_penerima_id" value="<?= $ds_garansi_komplain_penerima_id; ?>">
                  


    
                