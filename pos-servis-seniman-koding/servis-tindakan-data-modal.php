<?php  
	include '_header-artibut.php';
    $id = $_POST['id'];
    
    $dataEditServis = query("SELECT * FROM data_servis WHERE ds_id = $id ")[0];
    $ds_teknisi_disarankan = $dataEditServis['ds_teknisi_disarankan'];
?>

				<div class="row">
                    <input type="hidden" name="ds_teknisi" value="<?= $_SESSION['user_id']; ?>">
                    <input type="hidden" name="ds_id" value="<?= $id; ?>">
                    <input type="hidden" name="ds_cabang" value="<?= $dataEditServis['ds_cabang']; ?>">
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_nota">Nota </label>
                            <input type="text" name="ds_nota" class="form-control" id="ds_nota" value="<?= $dataEditServis['ds_nota']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <input type="hidden" name="ds_id" value="<?= $id; ?>">
                        <div class="form-group">
                            <label for="ds_customer_id">Customer </label>
                            <?php  
                                $customer_id = $dataEditServis['ds_customer_id'];
                                $customer_nama = mysqli_query($conn, "select customer_nama from customer where customer_id = ".$customer_id." ");
                                $customer_nama = mysqli_fetch_array($customer_nama);
                                $customer_nama = $customer_nama['customer_nama'];
                            ?>
                            <input type="text" name="ds_customer_id" class="form-control" id="ds_customer_id" value="<?= $customer_nama; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_kategori_jenis_barang_servis_id">Kategori Servis </label>
                              <?php  
                                $dkjbsi_id = $dataEditServis['ds_kategori_jenis_barang_servis_id'];
                                $dkjbsi = mysqli_query($conn, "select kategori_servis_nama from kategori_servis where kategori_servis_id = ".$dkjbsi_id." ");
                                $dkjbsi = mysqli_fetch_array($dkjbsi);
                                $dkjbsi = $dkjbsi['kategori_servis_nama'];
                              ?>

                            <input type="text" name="ds_customer_id" class="form-control" id="ds_customer_id" value="<?= $dkjbsi; ?>" readonly>  
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_merk">Merek </label>
                            <input type="text" name="ds_merk" class="form-control" id="ds_merk" value="<?= $dataEditServis['ds_merk']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_model_seri">Model/Seri </label>
                            <input type="text" name="ds_model_seri" class="form-control" id="ds_model_seri" value="<?= $dataEditServis['ds_model_seri']; ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_sn">No. SN</label>
                            <input type="text" name="ds_sn" class="form-control" value="<?= $dataEditServis['ds_sn']; ?>" id="ds_sn" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_imei">Imei</label>
                            <input type="text" name="ds_imei" class="form-control" value="<?= $dataEditServis['ds_imei']; ?>" id="ds_imei" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_warna">Warna Barang </label>
                            <input type="text" name="ds_warna" class="form-control" id="ds_warna" placeholder="Input Warna Barang Barang" value="<?= $dataEditServis['ds_warna']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_memory">Memory</label>
                            <input type="text" name="ds_memory" class="form-control" id="ds_memory" value="<?= $dataEditServis['ds_memory']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_kelengkapan">Kelengkapan </label>
                            <input type="text" name="ds_kelengkapan" class="form-control" id="ds_kelengkapan" value="<?= $dataEditServis['ds_kelengkapan']; ?>"  readonly>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_kerusakan">Kerusakan </label>
                            <input type="text" name="ds_kerusakan" class="form-control" id="ds_kerusakan" value="<?= $dataEditServis['ds_kerusakan']; ?>"  readonly>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_kondisi_unit_masuk">Kondisi Unit Masuk </label>
                            <input type="text" name="ds_kondisi_unit_masuk" class="form-control" id="ds_kondisi_unit_masuk" value="<?= $dataEditServis['ds_kondisi_unit_masuk']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_dp">DP</label>
                            <input type="number" name="ds_dp" class="form-control" id="ds_dp"  readonly value="<?= $dataEditServis['ds_dp']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_keterangan">Keterangan/Keluhan</label>
                            <textarea name="ds_keterangan" id="textarea" class="form-control" rows="3" readonly><?= $dataEditServis['ds_keterangan']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_penerima_id">Penerima</label>
                            <?php  
                              $ds_penerima_id = $dataEditServis['ds_penerima_id'];
                              $namaPenerima = mysqli_query($conn, "SELECT user_nama, user_level FROM user WHERE user_id = $ds_penerima_id ");
                              $namaPenerima = mysqli_fetch_array($namaPenerima);
                              $user_nama  = $namaPenerima['user_nama'];
                              $user_level = ucwords($namaPenerima['user_level']);

                              $view_ds_penerima_id = $user_nama." - Level ".$user_level;
                            ?>
                            <input type="text" name="ds_penerima_id" class="form-control" id="ds_penerima_id" value="<?= $view_ds_penerima_id; ?>"  readonly>
                        </div>
                    </div>
                </div>


                </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <?php if ( $ds_teknisi_disarankan != $userIdLogin && $ds_teknisi_disarankan > 0 ) : ?>
                <a href="#" class="btn btn-default btn-aksi">Saya Kerjakan</a>
            <?php else : ?>
                <button type="submit" class="btn btn-primary" name="servisEditBarang">Saya Kerjakan</button>
            <?php endif; ?>

            <!-- Mencari Nama Teknisi yg disarankan -->
            <?php  
                $namaTeknisiDisarankan = mysqli_query($conn, "SELECT user_nama FROM user WHERE user_id = $ds_teknisi_disarankan ");
                $namaTeknisiDisarankan = mysqli_fetch_array($namaTeknisiDisarankan);
                $namaTeknisiDisarankan = $namaTeknisiDisarankan['user_nama'];
            ?>
<script>
    $(".btn-aksi").click(function(){
        alert("Maaf untuk servis No. Nota <?= $dataEditServis['ds_nota']; ?> Sudah disarankan oleh Penerima barang <?= $view_ds_penerima_id; ?> untuk Teknisi Atas Nama <?= $namaTeknisiDisarankan; ?> !!");
    });
</script>