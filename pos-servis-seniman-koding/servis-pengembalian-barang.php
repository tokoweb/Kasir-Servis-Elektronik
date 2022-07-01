<?php 
  include '_header.php';
  include '_nav.php';
  include '_sidebar.php'; 
?>
<?php  
  

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ){
  // var_dump($_POST);

  // cek apakah data berhasil di tambahkan atau tidak
  if( tambahKategoriServis($_POST) > 0 ) {
    echo "
      <script>
        document.location.href = 'servis-penerimaan-barang';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('data gagal ditambahkan');
      </script>
    ";
  }
  
}
?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengembalian Barang Servis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="bo">Home</a></li>
              <li class="breadcrumb-item active">Data Pengembalian Barang Servis</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
                    <th>Teknisi</th>
                    <th>Biaya Servis</th>
                    <th style="text-align: center; width: 5%">Aksi</th>
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

  </div>
</div>

  <script>
    $(document).ready(function(){
        var table = $('#example1').DataTable( { 
             "processing": true,
             "serverSide": true,
             "ajax": "servis-pengembalian-barang-data.php?cabang=<?= $sessionCabang; ?>",
             "columnDefs": 
             [
              {
                "targets": 6,
                  "render": $.fn.dataTable.render.number( '.', '', '', 'Rp. ' )
                 
              },
              {
                "targets": -1,
                  "data": null,
                  "defaultContent": 
                  `<center class="text-center">

                      <button class='btn btn-primary tblEdit' title="Print">
                          <i class='fa fa-print'></i>
                      </button>&nbsp; 
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

        $('#example1 tbody').on( 'click', '.tblEdit', function () {
            var data  = table.row( $(this).parents('tr')).data();
            var data0 = data[0];
            var data0 = btoa(data0);
            window.location.href = "servis-pengembalian-barang-detail?id="+ data0;
        });

    });
  </script>



    

<?php include '_footer.php'; ?>

<script>

  $(document).ready(function(){
    


  });
</script>