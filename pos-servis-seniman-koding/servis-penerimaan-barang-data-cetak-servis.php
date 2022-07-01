<?php  
	include '_header-artibut.php';
?>


			<?php  
                $infoCetakServis = query("SELECT * FROM data_servis WHERE ds_penerima_id = $userIdLogin && ds_cabang = $sessionCabang ORDER BY ds_id DESC LIMIT 1 ")[0];
            ?>
                <div class="cetak-nota-servis-wa text-center">
                  <a href="nota-servis?id=<?= base64_encode($infoCetakServis['ds_id']); ?>" class="btn btn-warning" target="_blank">Print Nota <i class="fa fa-print"></i></a>

                <?php 
                    // Mencari No. Tlpn Customer
                    $ds_customer_id = $infoCetakServis['ds_customer_id'];

                    $namaCustomer = mysqli_query($conn, "select customer_nama, customer_tlpn, customer_alamat from customer where customer_id = ".$ds_customer_id." ");
                    $nc = mysqli_fetch_array($namaCustomer);
                    $customer_nama   = $nc['customer_nama'];
                    $customer_tlpn   = $nc['customer_tlpn'];
                    $customer_alamat = $nc['customer_alamat'];

                    $noHp  = substr_replace($customer_tlpn,'62',0,1);
                    $namaKonter = $dataTokoLogin['toko_nama']." ".$dataTokoLogin['toko_kota'];
                    $cekServis = $dataTokoLogin['toko_link']."/cek-servis?data=".base64_encode($infoCetakServis['ds_cabang'])."-".base64_encode($infoCetakServis['ds_nota']);
                    $koma  = '%2C'; 
                    $spasi = '%0A';
                    $garis = '------------------------------------------------------';

                    // Mencari Nama Barang
                    $dkjbsi_id = $infoCetakServis['ds_kategori_jenis_barang_servis_id'];
                    $namaKategori = mysqli_query($conn, "select kategori_servis_nama from kategori_servis where kategori_servis_id = ".$dkjbsi_id." ");
                    $nk = mysqli_fetch_array($namaKategori);
                    $kategori_servis_nama   = $nk['kategori_servis_nama'];

                    $isiWa = "*TANDA TERIMA SERVIS*".$spasi.$namaKonter.$spasi.$spasi.$garis.$spasi.$spasi."Nota: ".$infoCetakServis['ds_nota'].$spasi."Nama: ".$customer_nama.$spasi."Tgl. Diterima: ".tanggal_indo($infoCetakServis['ds_terima_date']).$spasi."Tlpn: ".$customer_tlpn.$spasi."Alamat: ".$customer_alamat.$spasi.$spasi.$garis.$spasi.$spasi."Nama Barang: ".$kategori_servis_nama." ".$infoCetakServis['ds_merk'].$spasi."Model/Seri: ".$infoCetakServis['ds_model_seri'].$spasi."No. SN: ".$infoCetakServis['ds_sn'].$spasi."Imei: ".$infoCetakServis['ds_imei'].$spasi."Kerusakan: ".$infoCetakServis['ds_kerusakan'].$spasi."Kelengkapan: ".$infoCetakServis['ds_kelengkapan'].$spasi.$spasi.$garis.$spasi.$spasi."Cek Servis: ".$cekServis.$spasi.$spasi;
                ?>
                <a href="https://api.whatsapp.com/send?phone=<?= $noHp; ?>&text=<?= $isiWa; ?>" class="btn btn-success" target="_blank">Nota WA <i class="fa fa-whatsapp"></i></a>

                <?php if ( $infoCetakServis['ds_teknisi_disarankan'] > 0 ) { ?>
                <?php  
                	$ds_teknisi_disarankan = $infoCetakServis['ds_teknisi_disarankan'];

                    $namaTeknisi = mysqli_query($conn, "select user_nama, user_no_hp from user where user_id = ".$ds_teknisi_disarankan." ");
                    $nc = mysqli_fetch_array($namaTeknisi);
                    $user_nama   = strtoupper($nc['user_nama']);
                    $user_tlpn   = $nc['user_no_hp'];
                    $noHpTeknisi  = substr_replace($user_tlpn,'62',0,1);


                    $isiWaTeknisi = "*INFO SERVIS MASUK UNTUK TEKNISI NAMA ".$user_nama."*".$spasi.$namaKonter.$spasi.$spasi.$garis.$spasi.$spasi."Nota: ".$infoCetakServis['ds_nota'].$spasi."Nama: ".$customer_nama.$spasi."Tgl. Diterima: ".tanggal_indo($infoCetakServis['ds_terima_date']).$spasi."Tlpn: ".$customer_tlpn.$spasi."Alamat: ".$customer_alamat.$spasi.$spasi.$garis.$spasi.$spasi."Nama Barang: ".$kategori_servis_nama." ".$infoCetakServis['ds_merk'].$spasi."Model/Seri: ".$infoCetakServis['ds_model_seri'].$spasi."No. SN: ".$infoCetakServis['ds_sn'].$spasi."Imei: ".$infoCetakServis['ds_imei'].$spasi."Kerusakan: ".$infoCetakServis['ds_kerusakan'].$spasi."Kelengkapan: ".$infoCetakServis['ds_kelengkapan'].$spasi.$spasi.$garis.$spasi.$spasi."Silhakan Login ke Sistem kemudian pilih menu *Teknisi/Tindakan Servis* cari No. Nota ".$infoCetakServis['ds_nota']." Kemudian Approve".$spasi.$spasi;
                ?>
                <a href="https://api.whatsapp.com/send?phone=<?= $noHpTeknisi; ?>&text=<?= $isiWaTeknisi; ?>" class="btn btn-info" target="_blank">Info Teknisi <i class="fa fa-whatsapp"></i></a>
                <?php } ?>
                </div>