<?php 
  include '_header.php';
  include '_nav.php';
  include '_sidebar.php'; 
?>

<?php  
  if ( $levelLogin !== "super admin" ) {
    echo "
      <script>
        document.location.href = 'bo';
      </script>
    ";
  }
    
?>

<?php  
    $id = abs((int)base64_decode($_GET["cabang"]));

    if ( $id < 1 ) {
      $titleCabang = "Pusat";
    } else {
      $titleCabang = "Cabang ".$id;
    }
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User <b><?= $titleCabang; ?></b></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="bo">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
          <div class="tambah-data">
          	<a href="user-add?cabang=<?= base64_encode($id); ?>" class="btn btn-primary">Tambah Data</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <?php  
    	$data = query("SELECT * FROM user WHERE user_cabang = $id && user_id > 1 && user_status > 0 ORDER BY user_id DESC");
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-6 col-lg-6">
                      <h3 class="card-title card-title-user">Data User <b>Aktif</b></h3>
                  </div>
                  <div class="col-md-6 col-lg-6">
                      <div class="box-user-select">
                          <span>Status User: </span>
                          <span>
                              <select class="form-control" id="mySelect" onchange="myFunction()">
                                  <option value="1">Aktif</option>
                                  <option value="0">Tidak Aktif</option>
                              </select>
                          </span>
                      </div>
                  </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th style="text-transform: capitalize;">Nama</th>
                  <th>No. Hp</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center; width: 14%;">Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php $i = 1; ?>
                <?php foreach ( $data as $row ) : ?>
                <tr>
                  	<td><?= $i; ?></td>
                  	<td><?= $row['user_nama']; ?></td>
                   	<td><?= $row['user_no_hp']; ?></td>
                    <td><?= $row['user_email']; ?></td>
                   	<td style="text-transform: capitalize;"><?= $row['user_level']; ?></td>
                    <td style="text-align: center;">
                    	<?php 
                    		if ( $row['user_status'] === "1" ) {
                    			echo "<b>Aktif</b>";
                    		} else {
                    			echo "<b style='color: red;'>Tidak Aktif</b>";
                    		}
                    	?>		
                    </td>
                    <td class="orderan-online-button">
                      <?php 
                        $idUser = $row["user_id"];
                      ?>

                    	<a href="user-zoom?id=<?= base64_encode($idUser); ?>&cabang=<?= base64_encode($id); ?>" title="Zoom Data" target="_blank">
                            <button class="btn btn-info" type="submit">
                               <i class="fa fa-search"></i>
                            </button>
                      </a>
                      <a href="user-payroll?id=<?= base64_encode($idUser); ?>&cabang=<?= base64_encode($id); ?>" title="Gaji Bonus Komisi">
                            <button class="btn btn-success" type="submit">
                               <i class="fa fa-money"></i>
                            </button>
                      </a>
                    	<a href="user-edit?id=<?= base64_encode($idUser); ?>&cabang=<?= base64_encode($id); ?>" title="Edit Data">
                            <button class="btn btn-primary" type="submit">
                               <i class="fa fa-edit"></i>
                            </button>
                      </a>
                        <?php  
                          // Menghitung di penjualan
                          $barangPenjualanParent = mysqli_query($conn,"select * from invoice where invoice_kasir = $idUser && invoice_cabang = $sessionCabang ");
                          $barangPenjualan = mysqli_num_rows($barangPenjualanParent);

                          // Menghitung di pembelian
                          $barangPembelianParent = mysqli_query($conn,"select * from invoice_pembelian where invoice_kasir = $idUser && invoice_pembelian_cabang = $sessionCabang ");
                          $barangPembelian = mysqli_num_rows($barangPembelianParent);

                          // Menghitung di data kurir
                          $barangKurir = mysqli_query($conn,"select * from invoice where invoice_kurir = $idUser && invoice_cabang = $sessionCabang ");
                          $barangKurir = mysqli_num_rows($barangKurir);


                          // Menghitung Penerima Servis
                          $penerimaServis = mysqli_query($conn,"select * from data_servis where ds_penerima_id = $idUser && ds_cabang = $sessionCabang ");
                          $penerimaServis = mysqli_num_rows($penerimaServis);

                          // Menghitung Penyerah Servis
                          $penyerahServis = mysqli_query($conn,"select * from data_servis where ds_penyerah_id = $idUser && ds_cabang = $sessionCabang ");
                          $penyerahServis = mysqli_num_rows($penyerahServis);

                          // Menghitung Teknisi Servis
                          $teknisiServis = mysqli_query($conn,"select * from data_servis where ds_teknisi = $idUser && ds_cabang = $sessionCabang ");
                          $teknisiServis = mysqli_num_rows($teknisiServis);

                          $totalCount = $barangPenjualan + $barangPembelian + $barangKurir + $penerimaServis + $penyerahServis + $teknisiServis;
                        ?>

                      <?php if ( $_SESSION['user_id'] != $idUser ) : ?>
                        

                        <?php if ( $totalCount < 1 ) : ?>
                        <a href="user-delete?id=<?= base64_encode($idUser); ?>&cabang=<?= base64_encode($id); ?>" onclick="return confirm('Yakin dihapus ?')" title="Delete Data">
                            <button class="btn btn-danger" type="submit" name="hapus">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </a>
                        <?php else : ?>
                        <a data-toggle="modal" href='#modal-id-2' title="Delete Data">
                            <button class="btn btn-default" type="submit" name="hapus">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </a>
                        <?php endif; ?>

                      <?php else : ?>
                        <a href="#!" title="Delete Data">
                            <button class="btn btn-default" type="submit" name="hapus">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </a>
                      <?php endif; ?>
                    </td>
                </tr>
                <?php $i++; ?>
            	<?php endforeach; ?>
              </table>
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
  </div>
</div>

<div class="modal fade" id="modal-id-2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Warning</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body text-center">
        <h4>
            Data User ada di dalam database dan pernah melakukan transaksi Jadi <b>TIDAK BISA DIHAPUS</b>
        </h4>
        <small>
            Jika ingin menghapus user ini Lakukan <b>Hapus Semua Data</b> dengan Transaksi <b>user tersebut !!</b>
        </small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<?php include '_footer.php'; ?>

<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
<script>
function myFunction() {
  var x = document.getElementById("mySelect").value;
  if ( x === "1" ) {
    document.location.href = "users?cabang=<?= $_GET['cabang']; ?>";
  } else {
    document.location.href = "users-tidak-aktif?cabang=<?= $_GET['cabang']; ?>";
  }
}
</script>
</body>
</html>
