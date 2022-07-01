<?php 
  include '_header-artibut.php';
  include "dist/qr/phpqrcode/qrlib.php";
?>
<?php  
  $status = $_SESSION['user_status'];
    if ( $status === '0') {
    echo"
          <script>
            alert('Akun Tidak Aktif');
            window.location='./';
          </script>";
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nota Cetak POS SERVIS - Seniman Koding</title>
	<meta charset=utf-8>
	<meta name=description content="">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<!-- Tempusdominus Bootstrap 3 -->
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap-3.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/style.css">

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php  
    // ambil data di URL
    $id = abs((int)base64_decode($_GET['id']));

    // query data 
    $servis = query("SELECT * FROM data_servis WHERE ds_id = $id && ds_cabang = $sessionCabang ")[0];
?>

<!-- Nama Kasir -->
<?php  
    $kasirPenerima         = $servis['ds_penerima_id'];
    $kasirPenyerah         = $servis['ds_penyerah_id'];
    $kasirPenerimaKomplain = $servis['ds_garansi_komplain_penerima_id'];

    // Mencari Data Penerima
    $dataKasirPenerima = query("SELECT * FROM user WHERE user_id = $kasirPenerima");

    // Mencari Data Penyerah
    $dataKasirPenyerah = query("SELECT * FROM user WHERE user_id = $kasirPenyerah");

    // Mencari Data Penerima Komplain
    $dataKasirPenerimaKomplain = query("SELECT * FROM user WHERE user_id = $kasirPenerimaKomplain");
?>
<?php foreach ( $dataKasirPenerima as $ksr ) : ?>
    <?php $kasirPenerima = $ksr['user_nama']; ?>
<?php endforeach; ?>

<?php foreach ( $dataKasirPenyerah as $ksr ) : ?>
    <?php $kasirPenyerah = $ksr['user_nama']; ?>
<?php endforeach; ?>

<?php foreach ( $dataKasirPenerimaKomplain as $ksr ) : ?>
    <?php $kasirPenerimaKomplain = $ksr['user_nama']; ?>
<?php endforeach; ?>

<!-- Nama Customer -->
<?php  
    $customer = $servis['ds_customer_id'];
    $dataCustomer = query("SELECT * FROM customer WHERE customer_id = $customer");
?>
<?php foreach ( $dataCustomer as $ctr ) : ?>
    <?php 
      $ctrId     = $ctr['customer_id']; 
      $ctrNama   = $ctr['customer_nama']; 
      $ctrTlpn   = $ctr['customer_tlpn'];
      $ctrAlmt   = $ctr['customer_alamat'];
    ?>
<?php endforeach; ?>

<?php  
    $toko = query("SELECT * FROM toko WHERE toko_cabang = $sessionCabang");
?>
<?php foreach ( $toko as $row ) : ?>
    <?php 
      $toko_nama              = $row['toko_nama'];
      $toko_kota              = $row['toko_kota'];
      $toko_tlpn              = $row['toko_tlpn'];
      $toko_wa                = $row['toko_wa'];
      $toko_print             = $row['toko_lebar_print_servis']; 
      $toko_alamat            = $row['toko_alamat'];
      $keteranganMasuk        = $row['toko_teks_nota_servis_masuk'];
      $keteranganAmbil        = $row['toko_teks_nota_servis_ambil'];
      $link_cek               = $row['toko_link']; 
      $toko_tipe_print_servis = $row['toko_tipe_print_servis'];
    ?>
<?php endforeach; ?>

<?php  
  $lebarPrint = $toko_print."cm";
?>
      <?php  
        $statusServisSaatIni = $servis['ds_status'];
        if ( $statusServisSaatIni == 1 ) {
           $sssi = "TANDA TERIMA SERVIS";
           $tanggalAmbil = "";
           $tanggalAmbil2 = "";
           $tektTTd = "PENERIMA";
           $kasir   = $kasirPenerima;
           $keterangan = $keteranganMasuk;

        } elseif ( $statusServisSaatIni == 2 ) {
            $sssi = "TANDA TERIMA SERVIS";
            $tanggalAmbil = "";
            $tanggalAmbil2 = "";
            $tektTTd = "PENERIMA";
            $kasir   = $kasirPenerima;
            $keterangan = $keteranganMasuk;

        } elseif ( $statusServisSaatIni == 3 ) {
            $sssi = "TANDA TERIMA SERVIS";
            $tanggalAmbil = "";
            $tanggalAmbil2 = "";
            $tektTTd = "PENERIMA";
            $kasir   = $kasirPenerima;
            $keterangan = $keteranganMasuk;
                                    
        } elseif ( $statusServisSaatIni == 4 ) {
            $sssi = "TANDA TERIMA SERVIS";
            $tanggalAmbil = "";
            $tanggalAmbil2 = "";
            $tektTTd = "PENERIMA";
            $kasir   = $kasirPenerima;
            $keterangan = $keteranganMasuk;
                                    
        } elseif ( $statusServisSaatIni == 5 ) {
            $sssi = "TANDA TERIMA SERVIS";
            $tanggalAmbil = "";
            $tanggalAmbil2 = "";
            $tektTTd = "PENERIMA";
            $kasir   = $kasirPenerima;
            $keterangan = $keteranganMasuk;
                                    
        } elseif ( $statusServisSaatIni == 6 ) {
            $sssi = "TANDA PENGEMBALIAN SERVIS";
            $tanggalAmbil = '
                <div class="nota-name-teks">
                  <b>Tgl. Ambil</b>: '.$servis["ds_ambil_date_time"].'
                </div>
            ';
            $tanggalAmbil2 = '
              <tr>
                 <td>Tgl Ambil</td>
                    <td>: '.$servis["ds_ambil_date_time"].'</td>
              </tr>
            ';
            $tektTTd = "PENYERAH";
            $kasir   = $kasirPenyerah;
            $keterangan = $keteranganAmbil;
                                    
        }elseif ( $statusServisSaatIni == 7 ) {
            $sssi = "TANDA TERIMA SERVIS";
            $tanggalAmbil = "";
            $tanggalAmbil2 = "";
            $tektTTd = "PENERIMA";
            $kasir   = $kasirPenerima;
            $keterangan = $keteranganMasuk;
                                    
        } elseif ( $statusServisSaatIni == 8 ) {
            $sssi = "TANDA PENGEMBALIAN SERVIS";
            $tanggalAmbil = '
                <div class="nota-name-teks">
                  <b>Tgl. Ambil</b>: '.$servis["ds_ambil_date_time"].'
                </div>
            ';
            $tanggalAmbil2 = '
              <tr>
                 <td>Tgl Ambil</td>
                    <td>: '.$servis["ds_ambil_date_time"].'</td>
              </tr>
            ';
            $tektTTd = "PENYERAH";
            $kasir   = $kasirPenyerah;
            $keterangan = $keteranganAmbil;
                                    
        } elseif ( $statusServisSaatIni == 9 ) {
            $sssi = "TANDA KOMPLAIN SERVIS";
            $tanggalAmbil = '
                <div class="nota-name-teks">
                  <b>Tgl. Ambil</b>: '.$servis["ds_ambil_date_time"].'
                </div>
            ';
            $tanggalAmbil2 = '
              <tr>
                 <td>Tgl Ambil</td>
                    <td>: '.$servis["ds_ambil_date_time"].'</td>
              </tr>
            ';
            $tektTTd = "PENERIMA";
            $kasir   = $kasirPenerimaKomplain;
            $keterangan = $keteranganAmbil;
                                    
        } else {
            $sssi = "TANDA PENGEMBALIAN SERVIS";
            $tanggalAmbil = '
                <div class="nota-name-teks">
                  <b>Tgl. Ambil</b>: '.$servis["ds_ambil_date_time"].'
                </div>
            ';
            $tanggalAmbil2 = '
              <tr>
                 <td>Tgl Ambil</td>
                    <td>: '.$servis["ds_ambil_date_time"].'</td>
              </tr>
            ';
            $tektTTd = "Penyerah";
            $kasir   = $kasirPenyerah;
            $keterangan = $keteranganAmbil;
        }
      ?>  

  <!-- Cetak QR -->
  <?php  
      $tempdir = "qr-img/servis/";
      $isi_teks = $link_cek."/cek-servis?data=".base64_encode($servis['ds_cabang'])."-".base64_encode($servis['ds_nota']);
      $namafile = date("Y-m-d")."-cabang-".$servis['ds_cabang']."-nota-".$servis['ds_nota'].".png";
      $quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
      $ukuran = 1; //batasan 1 paling kecil, 10 paling besar
      $padding = 0;
                         
      QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
  ?>

  <?php if ( $toko_tipe_print_servis > 0 ) : ?>
  <section class="nota-servis" style="width: <?= $lebarPrint; ?>;">
    <div class="title-nota text-center">
      <?php echo "<em><b>".$sssi."</b></em>"; ?>
    </div>

    <div class="nota-header">
      <div class="nota-header-nama">
        <?= $toko_nama; ?>
      </div>
      <div class="nota-header-alamat">
        <?= $toko_kota; ?>
      </div>
      <div class="nota-header-kontak">
        <?= $toko_tlpn; ?> <?= $toko_wa; ?>
      </div>
    </div>

    <div class="nota-name">
      <div class="nota-name-teks">
        <b>Nota: <?= $servis['ds_nota']; ?></b>
      </div>
      <div class="nota-name-teks">
        <b>Nama</b>: <?= $ctrNama; ?>
      </div>
      <div class="nota-name-teks">
        <b>Tgl. Diterima</b>: <?= $servis['ds_terima_date_time']; ?>
      </div>

      <?= $tanggalAmbil; ?>

      <?php if ( $statusServisSaatIni == 9 ) { ?>
      <div class="nota-name-teks">
        <b>Tgl. Komplain</b>: <?= $servis['ds_garansi_komplain_date_time']; ?>
      </div>
      <?php } ?>

      <div class="nota-name-teks">
        <b>Tlpn</b>: <?= $ctrTlpn; ?>
      </div>
      <div class="nota-name-teks">
        <b>Alamat</b>: <?= $ctrAlmt; ?>
      </div>
    </div>

    <div class="nota-table">
      <div class="">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nama Barang</th>
              <th>Kerusakan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                  <?= $servis['ds_merk']; ?> <?= $servis['ds_model_seri']; ?><br>
                  <small>Warna: <?= $servis['ds_warna']; ?></small>
                  <small>SN: <?= $servis['ds_sn']; ?></small>
              </td>
              <td>
                  <?= $servis['ds_kerusakan']; ?>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="nota-table-kelengkapan">
        <b>Kondisi Unit Masuk</b>: <?= $servis['ds_kondisi_unit_masuk']; ?>
      </div>
      <div class="nota-table-kelengkapan">
        <b>Kelengkapan</b>: <?= $servis['ds_kelengkapan']; ?>
      </div>

      <?php if ( $statusServisSaatIni == 6 || $statusServisSaatIni == 8 || $statusServisSaatIni == 9 || $statusServisSaatIni == 0 ) { ?>
      <div class="nota-table-kelengkapan">
        <?php  
          $teknisi = $servis['ds_teknisi'];
          $dataTeknisi = mysqli_query($conn, "SELECT user_nama FROM user WHERE user_id = $teknisi ");
          $dataTeknisi = mysqli_fetch_array($dataTeknisi);
          $ds_teknisi  = $dataTeknisi['user_nama'];
        ?>
        <b>Teknisi</b>: <?= $ds_teknisi; ?>
      </div>

      <div class="nota-table-kelengkapan">
        <b>Garansi</b>: <?= tanggal_indo($servis['ds_garansi']); ?>
      </div>
      <div class="nota-table-kelengkapan">
        <b>Catatan dari Teknisi</b>: <?= $servis['ds_note']; ?>
      </div>
      <?php } ?>
      <?php if ( $link_cek != null ) { ?>
      <div class="nota-table-kelengkapan">
        <b>SCAN QR Code untuk Cek Servis</b>: <br>
          <img src="qr-img/servis/<?= $namafile; ?>" class="img-fluid">
      </div>
      <?php } ?>
    </div>

    <div class="nota-servis-biaya">
      <div class="row">
        <?php if ( $statusServisSaatIni == 6 || $statusServisSaatIni == 8 || $statusServisSaatIni == 9 || $statusServisSaatIni == 0 ) { ?>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          Total Biaya Servis
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          : Rp <span class="nota-nominal-right">
            <?php echo number_format($servis['ds_total'], 0, ',', '.'); ?>
            </span>
        </div>
        <?php } ?>

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          DP (Bayar Diawal) 
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          : Rp <span class="nota-nominal-right">
            <?php echo number_format($servis['ds_dp'], 0, ',', '.'); ?>
            </span>
        </div>

        <?php if ( $statusServisSaatIni == 6 || $statusServisSaatIni == 8 || $statusServisSaatIni == 9 || $statusServisSaatIni == 0 ) { ?>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <b>Total Sisa Bayar</b>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <b>: Rp <span class="nota-nominal-right">
            <?php echo number_format($servis['ds_total_sisa_bayar'], 0, ',', '.'); ?>
            </span>
          </b>
        </div>
        <?php } ?>
      </div>
    </div>

    <div class="nota-penerima">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="nota-name">
            <div class="nota-name-teks">
              <b>Keterangan</b>: <?= $keterangan; ?>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <div class="nota-penerima-teks-parent text-center">
                <div class="nota-penerima-teks nota-penerima-teks-ttd">
                  <b>CUSTOMER</b>
                </div>
                <div class="nota-penerima-teks">
                  _______________
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <div class="nota-penerima-teks-parent text-center">
                <div class="nota-penerima-teks nota-penerima-teks-ttd">
                  <b><?= $tektTTd; ?></b>
                </div>
                <div class="nota-penerima-teks">
                  _______________
                  <br>
                  <b style="text-transform: capitalize;">
                    <?= $kasir; ?>
                  </b>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="nota-box-footer">
        <div class="nbf-text">
          Powered By
        </div>
        <div class="nbf-url">
          www.senimankoding.com
        </div>
    </div>
  </section>

  <?php else : ?>
  <section class="nota-lebar">
        <div class="">
            <div class="nota-lebar-box">
                <div class="nti-title text-center">
                     <?= $sssi; ?>
                </div>
                <div class="nzb-top">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="nzb-top-text">
                                <p><span><b><?= $toko_nama; ?></b></span></p>
                                <p><?= $toko_alamat; ?></p>
                                <p><?= $toko_kota; ?></p>
                                <p><?= $toko_tlpn; ?> - <?= $toko_wa; ?></p>
                            </div>
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-padding">
                            <div class="nzb-top-invoice">
                                <table class="table">
                                  <tbody>
                                    <tr>
                                        <td><b>NO. NOTA</b></td>
                                        <td><b>: <?= $servis['ds_nota']; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Tgl Diterima</td>
                                        <td>: <?= $servis['ds_terima_date_time']; ?></td>
                                    </tr>
                                    <?php if ( $statusServisSaatIni == 9 ) : ?>
                                    <tr>
                                        <td>Tgl Kompalin</td>
                                        <td>: <?= $servis['ds_garansi_komplain_date_time']; ?></td>
                                    </tr>
                                    <?php else : ?>
                                      <?= $tanggalAmbil2; ?>
                                    <?php endif; ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="nzb-top-invoice">
                                <table class="table">
                                  <tbody>
                                    <tr>
                                        <td><b>Kepada</b></td>
                                        <td><b>: <?= $ctrNama; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Tlpn</td>
                                        <td>: <?= $ctrTlpn; ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nzb-desc">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>No. SN & Warna</th>
                                <th>Kelengkapan</th>
                                <th>Kondisi Masuk</th>
                                <th>Kerusakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?= $servis['ds_merk']; ?> <?= $servis['ds_model_seri']; ?>
                                </td>
                                <td>
                                    Warna: <?= $servis['ds_warna']; ?> - SN: <?= $servis['ds_sn']; ?>
                                </td>
                                <td>
                                    <?= $servis['ds_kelengkapan']; ?>
                                </td>
                                <td>
                                  <?= $servis['ds_kondisi_unit_masuk']; ?>
                                </td>
                                <td>
                                    <?= $servis['ds_kerusakan']; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="nota-box-text">
                    <div class="row">
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <?php if ( $statusServisSaatIni == 6 || $statusServisSaatIni == 8 || $statusServisSaatIni == 9 || $statusServisSaatIni == 0 ) { ?>
                            <div class="nota-table-kelengkapan">
                              <?php  
                                $teknisi = $servis['ds_teknisi'];
                                $dataTeknisi = mysqli_query($conn, "SELECT user_nama FROM user WHERE user_id = $teknisi ");
                                $dataTeknisi = mysqli_fetch_array($dataTeknisi);
                                $ds_teknisi  = $dataTeknisi['user_nama'];
                              ?>
                              <b>Teknisi</b>: <?= $ds_teknisi; ?>
                            </div>

                            <div class="nota-table-kelengkapan">
                              <b>Garansi</b>: <?= tanggal_indo($servis['ds_garansi']); ?>
                            </div>
                            <div class="nota-table-kelengkapan">
                              <b>Catatan dari Teknisi</b>: <?= $servis['ds_note']; ?>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <div class="nota-table-kelengkapan nota-note">
                              <b>Keterangan</b>: <?= $keterangan; ?>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                          <?php if ( $link_cek != null ) { ?>
                          <div class="nota-table-kelengkapan text-center">
                              <b>Cek Servis</b>: <br>
                              <img src="qr-img/servis/<?= $namafile; ?>" class="img-fluid" style="margin: 0 auto; display: block;">
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="nota-box-text-harga">
                  <div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                          <div class="nota-servis-biaya">
                            <div class="row">
                              <?php if ( $statusServisSaatIni == 6 || $statusServisSaatIni == 8 || $statusServisSaatIni == 9 || $statusServisSaatIni == 0 ) { ?>
                              <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                Total Biaya Servis
                              </div>
                              <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                : Rp <span class="nota-nominal-right">
                                  <?php echo number_format($servis['ds_total'], 0, ',', '.'); ?>
                                  </span>
                              </div>
                              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
                              <?php } ?>

                              <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                DP (Bayar Diawal) 
                              </div>
                              <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                : Rp <span class="nota-nominal-right">
                                  <?php echo number_format($servis['ds_dp'], 0, ',', '.'); ?>
                                  </span>
                              </div>
                              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>

                              <?php if ( $statusServisSaatIni == 6 || $statusServisSaatIni == 8 || $statusServisSaatIni == 9 || $statusServisSaatIni == 0 ) { ?>
                              <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <b>Total Sisa Bayar</b>
                              </div>
                              <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <b>: Rp <span class="nota-nominal-right">
                                  <?php echo number_format($servis['ds_total_sisa_bayar'], 0, ',', '.'); ?>
                                  </span>
                                </b>
                              </div>
                              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
                              <?php } ?>
                            </div>
                          </div>
                      </div>

                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="nota-servis-biaya">
                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                              <div class="nota-penerima-teks-parent text-center">
                                <div class="nota-penerima-teks nota-penerima-teks-ttd">
                                  <b>CUSTOMER</b>
                                </div>
                                <div class="nota-penerima-teks">
                                  _______________
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                              <div class="nota-penerima-teks-parent text-center">
                                <div class="nota-penerima-teks nota-penerima-teks-ttd">
                                  <b><?= $tektTTd; ?></b>
                                </div>
                                <div class="nota-penerima-teks">
                                  _______________
                                  <br>
                                  <b style="text-transform: capitalize;">
                                    <?= $kasir; ?>
                                  </b>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>

                <div class="nzb-footer">
                    <div class="nzb-footer-box">
                        <div class="nota-box-footer">
                            <div class="nbf-text">
                                Powered By:  www.senimankoding.com
                            </div>
                            <!-- <div class="nbf-url"></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </section>
  <?php endif; ?>


</body>
</html>
<script>
  window.print();
</script>