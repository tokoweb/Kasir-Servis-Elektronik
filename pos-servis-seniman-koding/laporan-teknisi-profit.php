<?php 
  include '_header.php';
  include '_nav.php';
  include '_sidebar.php'; 
?>
<?php  
  if ( $levelLogin === "teknisi") {
    echo "
      <script>
        document.location.href = 'bo';
      </script>
    ";
  }
    
?>

	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Laporan Teknisi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="bo">Home</a></li>
              <li class="breadcrumb-item active">Laporan Teknisi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Filter Data Berdasrkan Tanggal</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <form role="form" action="" method="POST">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggal_awal">Tanggal Awal</label>
                        <input type="date" name="tanggal_awal" class="form-control" id="tanggal_awal" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggal_akhir">Tanggal Akhir</label>
                        <input type="date" name="tanggal_akhir" class="form-control" id="tanggal_akhir" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggal_akhir">Nama Teknisi</label>
                        <select class="form-control select2bs4" required="" name="user_id">
                            <option selected="selected" value="">-- Pilih Teknisi --</option>
                            <?php  
                              $user = query("SELECT * FROM user WHERE user_status = '1' && user_level = 'teknisi' || user_level = 'super admin' ORDER BY user_id DESC ");
                            ?>
                            <?php foreach ( $user as $ctr ) : ?>
                              <?php if ( $ctr['user_cabang'] == $sessionCabang ) { ?>
                              <option value="<?= $ctr['user_id'] ?>"><?= $ctr['user_nama'] ?></option>
                              <?php } ?>
                            <?php endforeach; ?>
                          </select>
                    </div>
                </div>
              </div>
              <div class="card-footer text-right">
                  <button type="submit" name="submit" class="btn btn-primary">
                    <i class="fa fa-filter"></i> Filter
                  </button>
              </div>
            </div>
          </form>
      </div>
    </section>


    <?php if( isset($_POST["submit"]) ){ ?>
        <?php  
          $tanggal_awal  = $_POST['tanggal_awal'];
          $tanggal_akhir = $_POST['tanggal_akhir'];
          $user_id       = $_POST['user_id'];
        ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Laporan Teknisi Tanggal Awal <?= tanggal_indo($tanggal_awal); ?> sampai <?= tanggal_indo($tanggal_akhir); ?></h3>
            </div>
            <!-- /.card-header -->
            <?php  
              $data = query("SELECT * FROM data_servis WHERE ds_ambil_date BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' && ds_cabang = $sessionCabang && ds_teknisi = $user_id ORDER BY ds_id DESC ");
            ?>
            <div class="card-body">
              <div class="table-auto">
                <table id="laporan-teknisi-profit" class="table table-bordered table-striped table-laporan">
                  <thead>
                  <tr>
                    <th style="width: 6%;">No.</th>
                    <th>Nota</th>
                    <th>Teknisi</th>
                    <th>Total Servis</th>
                    <th>Biaya Sparepart</th>
                    <th>Total Biaya Jasa</th>
                    <th>Profit Toko</th>
                    <th>Pendapatan Teknisi</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php 
                    $i            = 1; 
                    $totalProfit  = 0;
                    $totalTeknisi = 0;
                    foreach ( $data as $rowProduct ) :
                  ?>
                  <tr>
                    	<td><?= $i; ?></td>
                      <td>
                        <?php  
                          $nota = $rowProduct['ds_nota'];
                          echo $nota;
                        ?>

                        <?php  
                          $biayaJasa = query("SELECT * FROM data_servis_teknisi WHERE dst_id_nota = $nota && dst_cabang = $sessionCabang ");
                        ?>

                        <?php 
                          $ds_biaya_jasa_teknisi = 0;
                          $ds_biaya_profit       = 0; 
                        ?>
                        <?php foreach ( $biayaJasa as $row ) : ?>
                          <?php 
                            $ds_biaya_jasa_teknisi += $row['ds_biaya_jasa_teknisi']; 
                            $ds_biaya_profit += $row['ds_biaya_profit']; 
                          ?>
                        <?php endforeach; ?>
                      </td>
                      <td>
                          <?php  
                            $teknisiId = $rowProduct['ds_teknisi'];
                            $namaTeknisi = mysqli_query($conn, "SELECT user_nama FROM user WHERE user_id = $teknisiId ");
                            $namaTeknisi = mysqli_fetch_array($namaTeknisi);
                            $user_nama   = $namaTeknisi['user_nama'];
                            echo $user_nama;
                          ?>      
                      </td>
                      <td>
                        Rp. <?= number_format($rowProduct['ds_total'], 0, ',', '.');?>
                      </td>
                      <td>
                        Rp. <?= number_format($rowProduct['ds_total_biaya_sparepart'], 0, ',', '.');?>
                      </td>
                      <td>
                        Rp. <?= number_format($rowProduct['ds_total_biaya_jasa'], 0, ',', '.');?>
                      </td>
                      <td>
                        Rp. <?= number_format($ds_biaya_profit, 0, ',', '.'); ?>
                      </td>
                      <td>
                        Rp. <?= number_format($ds_biaya_jasa_teknisi, 0, ',', '.'); ?>
                      </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                  <tr>
                      <td colspan="6">
                        <b>Total </b>
                      </td>
                        <?php  
                          $biayaJasaKeseluruhan = query("SELECT * FROM data_servis_teknisi WHERE dst_teknisi_id = $user_id && dst_pengambilan_date BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' && dst_cabang = $sessionCabang ");
                        ?>

                        <?php 
                          $ds_biaya_jasa_teknisiKeseluruhan = 0;
                          $ds_biaya_profitKeseluruhan       = 0; 
                        ?>
                        <?php foreach ( $biayaJasaKeseluruhan as $row ) : ?>
                          <?php 
                            $ds_biaya_jasa_teknisiKeseluruhan += $row['ds_biaya_jasa_teknisi']; 
                            $ds_biaya_profitKeseluruhan += $row['ds_biaya_profit']; 
                          ?>
                        <?php endforeach; ?>
                      <td>
                        Rp. <?php echo number_format($ds_biaya_profitKeseluruhan, 0, ',', '.'); ?>
                      </td>
                      <td>
                        Rp. <?php echo number_format($ds_biaya_jasa_teknisiKeseluruhan, 0, ',', '.'); ?>
                      </td>
                  </tr>
                 </tbody>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <?php  } ?>
  </div>
</div>



<?php include '_footer.php'; ?>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#laporan-transaksi-kasir").DataTable();
  });
</script>
<script>
  $(function () {

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
</script>
</body>
</html>