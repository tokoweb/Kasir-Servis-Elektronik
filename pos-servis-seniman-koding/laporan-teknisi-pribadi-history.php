<?php 
  include '_header.php';
  include '_nav.php';
  include '_sidebar.php'; 
?>
<?php  
  if ( $levelLogin === "kasir") {
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
          <div class="col-sm-8">
            <h1>Data Laporan History Teknisi <b><?= $_SESSION['user_nama']; ?></b></h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="bo">Home</a></li>
              <li class="breadcrumb-item active">Laporan History Teknisi</li>
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_awal">Tanggal Awal</label>
                        <input type="date" name="tanggal_awal" class="form-control" id="tanggal_awal" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_akhir">Tanggal Akhir</label>
                        <input type="date" name="tanggal_akhir" class="form-control" id="tanggal_akhir" required>
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
          $user_id       = $_SESSION['user_id'];
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
            <div class="card-body">
              <div class="table-auto">
                <table id="laporan-teknisi-pribadi-history" class="table table-bordered table-striped table-laporan">
                  <thead>
                  <tr>
                    <th style="width: 6%;">No.</th>
                    <th>Nota</th>
                    <th>Customer</th>
                    <th>Tanggal Masuk</th>
                    <th>Status</th>
                    <th>Tanggal Ambil</th>
                    <th>Total Servis</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php 
                    $i = 1; 
                    $total = 0;
                    $queryInvoice = $conn->query("SELECT data_servis.ds_id, 
                      data_servis.ds_nota, 
                      data_servis.ds_customer_id, 
                      data_servis.ds_terima_date_time, 
                      data_servis.ds_status, 
                      data_servis.ds_teknisi,
                      data_servis.ds_ambil_date_time, 
                      data_servis.ds_total,
                      data_servis.ds_cabang,
                      customer.customer_id,
                      customer.customer_nama
                               FROM data_servis 
                               JOIN customer ON data_servis.ds_customer_id = customer.customer_id
                               WHERE ds_terima_date BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' && ds_cabang = $sessionCabang
                               ORDER BY ds_id DESC
                               ");
                    while ($rowProduct = mysqli_fetch_array($queryInvoice)) {
                    if ( $rowProduct['ds_teknisi'] === $user_id ) {
                      $total += $rowProduct['ds_total'];
                  ?>
                  <tr>
                    	<td><?= $i; ?></td>
                      <td><?= $rowProduct['ds_nota']; ?></td>
                      <td><?= $rowProduct['customer_nama']; ?></td>
                      <td><?= $rowProduct['ds_terima_date_time']; ?></td>
                      <td>
                          <?php  
                            $statusServisHistory = $rowProduct['ds_status'];
                            include "_status-servis.php"; 
                            echo $sshView;
                          ?>        
                      </td>
                      <td><?= $rowProduct['ds_ambil_date_time']; ?></td>
                      <td>
                          <?php  
                            if ( $rowProduct['ds_total'] < 1 ) {
                              echo "Rp. -";
                            } else {
                              echo "Rp. ".number_format($rowProduct['ds_total'], 0, ',', '.');
                            }
                          ?>
                      </td>
                  </tr>
                  <?php $i++; ?>
                  <?php } ?>
                  <?php } ?>
                  <tr>
                      <td colspan="6">
                        <b>Total</b>
                      </td>
                      <td>
                        Rp. <?php echo number_format($total, 0, ',', '.'); ?>
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