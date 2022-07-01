<?php 
  include '_header.php';
  include '_nav.php';
  include '_sidebar.php'; 
?>
<?php  
  if ( $levelLogin === "kurir" ) {
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
            <h1>Data Barang Servis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="bo">Home</a></li>
              <li class="breadcrumb-item active">Barang Servis</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Barang Servis Keseluruhan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-auto">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 6%;">No.</th>
                    <th style="width: 13%;">Nota</th>
                    <th>Customer</th>
                    <th>Tanggal Masuk</th>
                    <th>Status</th>
                    <th>Tanggal Ambil</th>
                    <th>Teknisi</th>
                    <th style="text-align: center; width: 14%">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>

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
  </div>
</div>


<script>
    $(document).ready(function(){
        var table = $('#example1').DataTable( { 
             "processing": true,
             "serverSide": true,
             "ajax": "servis-data-barang-data.php?cabang=<?= $sessionCabang; ?>",
             "columnDefs": 
             [
              {
                "targets": -1,
                  "data": null,
                  "defaultContent": 
                  `<center class="orderan-online-button">
                      <button class='btn btn-warning tblPrint' title='Print Nota'>
                          <i class='fa fa-print'></i>
                      </button>&nbsp;

                      <button class='btn btn-success tblZoom' title='Lihat Data'>
                          <i class='fa fa-eye'></i>
                      </button>&nbsp;

                      <?php if (  $levelLogin === "super admin" ) { ?>
                      <button class='btn btn-primary tblEdit' title="Edit Data">
                          <i class='fa fa-edit'></i>
                      </button>&nbsp;
                      

                      <button class='btn btn-danger tblDelete' title="Delete Invoice">
                          <i class='fa fa-trash-o'></i>
                      </button> 
                      <?php } ?>
                  </center>` 
              }
            ]
        });

        table.on('draw.dt', function () {
            var info = table.page.info();
            table.column(0, { search: 'applied', order: 'applied', page: 'applied' }).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1 + info.start;
            });
        });

        $('#example1 tbody').on( 'click', '.tblPrint', function () {
            var data = table.row( $(this).parents('tr')).data();
            var data0 = data[0];
            var data0 = btoa(data0);
            window.open('nota-servis?id='+ data0, '_blank');
        });

        $('#example1 tbody').on( 'click', '.tblZoom', function () {
            var data = table.row( $(this).parents('tr')).data();
            var data0 = data[0];
            var data0 = btoa(data0);
            window.open('servis-data-barang-zoom?id='+ data0, '_blank');
        });

        $('#example1 tbody').on( 'click', '.tblEdit', function () {
            var data  = table.row( $(this).parents('tr')).data();
            var data0 = data[0];
            var data0 = btoa(data0);
            window.location.href = "servis-dikerjakan-detail?id="+ data0;
        });

        $('#example1 tbody').on( 'click', '.tblDelete', function () {
            var data  = table.row( $(this).parents('tr')).data();
            var data0 = data[0];
            var data0 = btoa(data0);
            var data1 = data[1];
            var link  = confirm('Apakah Anda Yakin Hapus No.Nota '+ data1 + ' ?');
            if ( link === true ) {
                window.location.href = "servis-data-barang-delete?id="+ data0;
            }
        });

    });
  </script>


<?php include '_footer.php'; ?>


<script>
  $(function () {
    $("#example1").DataTable();
  });

  $(".delete-data").click(function(){
    alert("Data tidak bisa dihapus karena masih ada di data Invoice");
  });
</script>
</body>
</html>