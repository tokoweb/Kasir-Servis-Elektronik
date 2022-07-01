<?php  
	include '_header-artibut.php';
    $id = $_POST['id'];
    
    $dataEditServis = query("SELECT * FROM data_servis WHERE ds_id = $id ")[0];
?>

				<div class="row">
                    <div class="col-md-6 col-lg-4">
                        <input type="hidden" name="ds_id" value="<?= $id; ?>">
                        <div class="form-group">
                            <label for="ds_customer_id">Customer <span class="red">*</span></label>
                            <select class="form-control select2bs4" required="" name="ds_customer_id" id="ds_customer_id">
                              <?php  
                                $customer_id = $dataEditServis['ds_customer_id'];
                                $customer_nama = mysqli_query($conn, "select customer_nama from customer where customer_id = ".$customer_id." ");
                                $customer_nama = mysqli_fetch_array($customer_nama);
                                $customer_nama = $customer_nama['customer_nama'];
                              ?>

                              <option selected="selected" value="<?= $customer_id; ?>"><?= $customer_nama; ?></option>
                              <?php  
                                $customer = query("SELECT * FROM customer WHERE customer_cabang = $sessionCabang && customer_status = 1 && customer_id != $customer_id ORDER BY customer_id DESC ");
                              ?>
                              <?php foreach ( $customer as $ctr ) : ?>
                                <?php if ( $ctr['customer_id'] > 1 ) { ?>
                                <option value="<?= $ctr['customer_id'] ?>"><?= $ctr['customer_nama'] ?></option>
                                <?php } ?>
                              <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_kategori_jenis_barang_servis_id">Kategori Servis <span class="red">*</span></label>
                            <select class="form-control select2bs4" required="" name="ds_kategori_jenis_barang_servis_id">
                              <?php  
                                $dkjbsi_id = $dataEditServis['ds_kategori_jenis_barang_servis_id'];
                                $dkjbsi = mysqli_query($conn, "select kategori_servis_nama from kategori_servis where kategori_servis_id = ".$dkjbsi_id." ");
                                $dkjbsi = mysqli_fetch_array($dkjbsi);
                                $dkjbsi = $dkjbsi['kategori_servis_nama'];
                              ?>
                              <option selected="selected" value="<?= $dkjbsi_id; ?>"><?= $dkjbsi; ?></option>
                              <?php  
                                $kategori_servis = query("SELECT * FROM kategori_servis WHERE kategori_servis_cabang = $sessionCabang && kategori_servis_status > 0 && kategori_servis_id != $dkjbsi_id ORDER BY kategori_servis_id DESC ");
                              ?>
                              <?php foreach ( $kategori_servis as $row ) : ?>
                                <option value="<?= $row['kategori_servis_id'] ?>"><?= $row['kategori_servis_nama'] ?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_merk">Merek <span class="red">*</span></label>
                            <input type="text" name="ds_merk" class="form-control" id="ds_merk" placeholder="Contoh: Samsung" value="<?= $dataEditServis['ds_merk']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_model_seri">Model/Seri <span class="red">*</span></label>
                            <input type="text" name="ds_model_seri" class="form-control" id="ds_model_seri" value="<?= $dataEditServis['ds_model_seri']; ?>" placeholder="Input Model/Seri Barang" required>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_sn">No. SN</label>
                            <input type="text" name="ds_sn" class="form-control" value="<?= $dataEditServis['ds_sn']; ?>" id="ds_sn" placeholder="Input Nomor Serial Number">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_imei">Imei</label>
                            <input type="text" name="ds_imei" class="form-control" value="<?= $dataEditServis['ds_imei']; ?>" id="ds_imei" placeholder="Imei Barang">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_warna">Warna Barang <span class="red">*</span></label>
                            <input type="text" name="ds_warna" class="form-control" id="ds_warna" placeholder="Input Warna Barang Barang" value="<?= $dataEditServis['ds_warna']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_memory">Memory</label>
                            <input type="text" name="ds_memory" class="form-control" id="ds_memory" value="<?= $dataEditServis['ds_memory']; ?>" placeholder="Contoh 16 GB">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_kelengkapan">Kelengkapan <span class="red">*</span></label>
                            <input type="text" name="ds_kelengkapan" class="form-control" id="ds_kelengkapan" value="<?= $dataEditServis['ds_kelengkapan']; ?>" placeholder="Kelengkapan Barang" required>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_kerusakan">Kerusakan <span class="red">*</span></label>
                            <input type="text" name="ds_kerusakan" class="form-control" id="ds_kerusakan" value="<?= $dataEditServis['ds_kerusakan']; ?>" placeholder="Input Kerusakan Barang" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_keterangan">Keterangan/Keluhan</label>
                            <textarea name="ds_keterangan" id="textarea" class="form-control" rows="3" placeholder="Keterangan dari customer tentang keluhan barang"><?= $dataEditServis['ds_keterangan']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_dp">DP</label>
                            <input type="number" name="ds_dp" class="form-control" id="ds_dp" placeholder="Input DP Servis" value="<?= $dataEditServis['ds_dp']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_password">Password</label>
                            <input type="text" name="ds_password" class="form-control" id="ds_password" value="<?= $dataEditServis['ds_password']; ?>" placeholder="Input Password Barang Jika Ada">
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_teknisi_disarankan">Teknisi yang Mengerjakan </label>
                            <select class="form-control select2bs4" name="ds_teknisi_disarankan" id="ds_teknisi_disarankan">
                              <?php  
                                $ds_teknisi = $dataEditServis['ds_teknisi_disarankan'];
                                $teknisi_data = mysqli_query($conn, "select user_nama from user where user_id = ".$ds_teknisi." ");
                                $user_nama = mysqli_fetch_array($teknisi_data);
                                $user_nama = $user_nama['user_nama'];
                              ?>

                              <?php if ( $ds_teknisi > 0 ) : ?>
                              <option selected="selected" value="<?= $ds_teknisi; ?>"><?= $user_nama; ?></option>
                              <?php else : ?>
                              <option selected="selected" value="">-- Pilih Teknisi --</option>
                              <?php endif; ?>

                              <?php  
                                $namaTeknisi = query("SELECT * FROM user WHERE user_level = 'teknisi' || user_level = 'super admin' && user_status = 1 && user_cabang = ".$sessionCabang."  ORDER BY user_id DESC ");
                              ?>

                              <?php foreach ( $namaTeknisi as $nt ) : ?>
                                <?php if ( $nt['user_id'] != $ds_teknisi ) { ?>
                                <option value="<?= $nt['user_id'] ?>"><?= $nt['user_nama'] ?></option>
                                <?php } ?>
                              <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

<script>
	$(function () {

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
</script>