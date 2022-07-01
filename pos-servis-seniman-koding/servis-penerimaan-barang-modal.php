<?php  
	include '_header-artibut.php';


	$countServis = mysqli_query($conn, "select * from data_servis where ds_cabang = ".$sessionCabang." ");
    $countServis = mysqli_num_rows($countServis);
    if ( $countServis < 1 ) {
        $nota = 0;
    } else {
        $servis = query("SELECT * FROM data_servis WHERE ds_cabang = $sessionCabang ORDER BY ds_id DESC lIMIT 1")[0];
        $nota = $servis['ds_nota_count'];
    }
    $nota = $nota + 1;
?>



				<div class="row">
					<input type="hidden" name="ds_nota_count" value="<?= $nota; ?>">
                    <input type="hidden" name="ds_cabang" value="<?= $sessionCabang; ?>">
                    <input type="hidden" name="ds_penerima_id" value="<?= $_SESSION['user_id']; ?>">
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_customer_id">Customer <span class="red">*</span></label>
                            <select class="form-control select2bs3" required="" name="ds_customer_id" id="ds_customer_id">
                              <option selected="selected" value="">-- Pilih Customer --</option>
                              <?php  
                                $customer = query("SELECT * FROM customer WHERE customer_cabang = $sessionCabang && customer_status = 1 ORDER BY customer_id DESC ");
                              ?>
                              <?php foreach ( $customer as $ctr ) : ?>
                                <?php if ( $ctr['customer_id'] > 1 && $ctr['customer_nama'] !== "Customer Umum" ) { ?>
                                <option value="<?= $ctr['customer_id'] ?>"><?= $ctr['customer_nama'] ?> - <?= $ctr['customer_tlpn'] ?></option>
                                <?php } ?>
                              <?php endforeach; ?>
                            </select>
                            <small>
                              <a href="#!" id="tambah-customer">Tambah Customer <i class="fa fa-plus"></i></a>
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_kategori_jenis_barang_servis_id">Kategori Servis <span class="red">*</span></label>
                            <select class="form-control select2bs4" required="" name="ds_kategori_jenis_barang_servis_id">
                              <option selected="selected" value="">-- Pilih --</option>
                              <?php  
                                $kategori_servis = query("SELECT * FROM kategori_servis WHERE kategori_servis_cabang = $sessionCabang && kategori_servis_status > 0 ORDER BY kategori_servis_id DESC ");
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
                            <input type="text" name="ds_merk" class="form-control" id="ds_merk" placeholder="Contoh: Samsung" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_model_seri">Model/Seri <span class="red">*</span></label>
                            <input type="text" name="ds_model_seri" class="form-control" id="ds_model_seri" placeholder="Input Model/Seri Barang" required>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_sn">No. SN</label>
                            <input type="text" name="ds_sn" class="form-control" id="ds_sn" placeholder="Input Nomor Serial Number">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_imei">Imei</label>
                            <input type="text" name="ds_imei" class="form-control" id="ds_imei" placeholder="Imei Barang">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_warna">Warna Barang <span class="red">*</span></label>
                            <input type="text" name="ds_warna" class="form-control" id="ds_warna" placeholder="Input Warna Barang Barang" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_memory">Memory</label>
                            <input type="text" name="ds_memory" class="form-control" id="ds_memory" placeholder="Contoh 16 GB">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_kelengkapan">Kelengkapan <span class="red">*</span></label>
                            <input type="text" name="ds_kelengkapan" class="form-control" id="ds_kelengkapan" placeholder="Kelengkapan Barang" required>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_kerusakan">Kerusakan <span class="red">*</span></label>
                            <input type="text" name="ds_kerusakan" class="form-control" id="ds_kerusakan" placeholder="Input Kerusakan Barang" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_kondisi_unit_masuk">Kondisi Unit Masuk <span class="red">*</span></label>
                            <input type="text" name="ds_kondisi_unit_masuk" class="form-control" id="ds_kondisi_unit_masuk" placeholder="Contoh: Kondisi Nyala" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_keterangan">Keterangan/Keluhan</label>
                            <textarea name="ds_keterangan" id="textarea" class="form-control" rows="3" placeholder="Keterangan dari customer tentang keluhan barang"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_dp">DP</label>
                            <input type="number" name="ds_dp" class="form-control" id="ds_dp" placeholder="Input DP Servis">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_password">Password</label>
                            <input type="text" name="ds_password" class="form-control" id="ds_password" placeholder="Input Password Barang Jika Ada">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="ds_teknisi_disarankan">Teknisi yang Dipilih </label>
                            <select class="form-control select2bs5" name="ds_teknisi_disarankan" id="ds_teknisi_disarankan" disabled="">
                              <option selected="selected" value="">-- Pilih Teknisi --</option>
                              <?php  
                                $namaTeknisi = query("SELECT * FROM user WHERE user_level = 'teknisi' || user_level = 'super admin' && user_status = 1 && user_cabang = ".$sessionCabang."  ORDER BY user_id DESC ");
                              ?>
                              <?php foreach ( $namaTeknisi as $nt ) : ?>
                                <option value="<?= $nt['user_id'] ?>"><?= $nt['user_nama'] ?></option>
                              <?php endforeach; ?>
                            </select>
                            <input type="hidden" id="ds_teknisi_disarankan2" name="ds_teknisi_disarankan" value="0">

                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="1" class="checkbox-teknisi" name="checkbox_teknisi">
                                  <small style="color: red">
                                    Aktifkan Checklist untuk <b>Pilih Teknisi</b>
                                  </small>
                                </label>
                              </div>
                        </div>
                    </div>
                </div>

<script>
	$(function () {

        //Initialize Select2 Elements
        $('.select2bs3').select2({
          theme: 'bootstrap4'
        })
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })
        $('.select2bs5').select2({
          theme: 'bootstrap4'
        })
    });

    $('.checkbox-teknisi').change(function() {
        // this will contain a reference to the checkbox   
        if (this.checked) {
            $("#ds_teknisi_disarankan").removeAttr("disabled");
            $("#ds_teknisi_disarankan").attr("required", true);
            $("#ds_teknisi_disarankan2").attr("disabled", true);
        } else {
            $("#ds_teknisi_disarankan").attr("disabled", true);
            $("#ds_teknisi_disarankan").removeAttr("required");
            $("#ds_teknisi_disarankan2").removeAttr("disabled");
        }
    });
</script>