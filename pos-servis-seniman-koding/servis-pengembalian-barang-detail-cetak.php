<?php  
	include '_header-artibut.php';
	$id = $_GET['id'];

	// query data berdasarkan id
	$servis       = query("SELECT * FROM data_servis WHERE ds_id = $id ")[0];
	$nota         = $servis['ds_nota'];
	$status       = $servis['ds_status'];
	$cabangServis = $servis['ds_cabang'];
?>


			<div class="cetak-nota-servis-wa text-center">
                <a href="nota-servis?id=<?= base64_encode($servis['ds_id']); ?>" class="btn btn-warning" target="_blank">Print Nota <i class="fa fa-print"></i></a>

                <?php 
                    // Mencari No. Tlpn Customer
                	$customer_id = $servis['ds_customer_id'];
                    $customer_nama = mysqli_query($conn, "select customer_nama, customer_tlpn, customer_alamat from customer where customer_id = ".$customer_id." ");
                    $c_n = mysqli_fetch_array($customer_nama);
                    $customer_nama    = $c_n['customer_nama'];
                    $customer_tlpn    = $c_n['customer_tlpn'];
                    $customer_alamat  = $c_n['customer_alamat'];

                    $noHp  = substr_replace($customer_tlpn,'62',0,1);
                    $namaKonter = $dataTokoLogin['toko_nama']." ".$dataTokoLogin['toko_kota'];
                    $keterangan = "Garansi Servis Maksimal 10 Hari";
                    $koma  = '%2C'; 
                    $spasi = '%0A';
                    $garis = '------------------------------------------------------';

                    // Mencari Nama Barang
                    $dkjbsi_id = $servis['ds_kategori_jenis_barang_servis_id'];
                    $namaKategori = mysqli_query($conn, "select kategori_servis_nama from kategori_servis where kategori_servis_id = ".$dkjbsi_id." ");
                    $nk = mysqli_fetch_array($namaKategori);
                    $kategori_servis_nama   = $nk['kategori_servis_nama'];

                    $isiWa = "*TANDA PENGEMBALIAN SERVIS*".$spasi.$namaKonter.$spasi.$spasi.$garis.$spasi.$spasi."Nota: ".$servis['ds_nota'].$spasi."Nama: ".$customer_nama.$spasi."Tgl. Diterima: ".tanggal_indo($servis['ds_terima_date']).$spasi."Tlpn: ".$customer_tlpn.$spasi."Alamat: ".$customer_alamat.$spasi.$spasi.$garis.$spasi.$spasi."Nama Barang: ".$kategori_servis_nama." ".$servis['ds_merk'].$spasi."Model/Seri: ".$servis['ds_model_seri'].$spasi."No. SN: ".$servis['ds_sn'].$spasi."Imei: ".$servis['ds_imei'].$spasi."Kerusakan: ".$servis['ds_kerusakan'].$spasi."Kelengkapan: ".$servis['ds_kelengkapan'].$spasi.$spasi.$garis.$spasi.$spasi."Total Biaya Servis: ".number_format($servis['ds_total'], 0, ',', '.').$spasi."DP (Bayar Diawal): ".number_format($servis['ds_dp'], 0, ',', '.').$spasi."*Total Sisa Bayar: ".number_format($servis['ds_total_sisa_bayar'], 0, ',', '.')."*".$spasi.$spasi.$garis.$spasi.$spasi."Garansi Servis: ".tanggal_indo($servis['ds_garansi']).$spasi.$spasi;
                ?>
                <a href="https://api.whatsapp.com/send?phone=<?= $noHp; ?>&text=<?= $isiWa; ?>" class="btn btn-success" target="_blank">Nota WA <i class="fa fa-whatsapp"></i></a>
            </div>