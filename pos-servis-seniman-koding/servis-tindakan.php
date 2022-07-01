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
            <h1>Data Tindakan Servis</h1>
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


    <span id="servis-tindakan-table"></span>

  </div>
</div>

  <div class="modal fade modal-input-servis" id="modal-id-edit" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="servis-tindakan-edit-proses.php" id="form-edit-servis" method="post" >
            <div class="modal-header">
              <h4 class="modal-title">Tindakan Servis</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="data-edit-servis">
                
            
            </div>
          </form>
        </div>
      </div>
    </div>




<?php include '_footer.php'; ?>
<script>
  $(document).ready(function(){
    $("#servis-tindakan-table").load("servis-tindakan-table.php");

    // Proses Edit
    $('#form-edit-servis').submit(function(e){
      e.preventDefault();

      var dataFormUser = $('#form-edit-servis').serialize();
      $.ajax({
        url: "servis-tindakan-edit-proses.php",
        type: "post",
        data: dataFormUser,
        success: function(result) {
          var hasil = JSON.parse(result);
          if (hasil.hasil !== "sukses") {
            Swal.fire(
              'Gagal',
              'Data Gagal Tersimpan',
              'error'
            );
          } else {
            $('#modal-id-edit').modal('hide');
            $(".form-control").val('');
            $("#servis-tindakan-table").load("servis-tindakan-table.php");
            Swal.fire(
              'Sukses !!',
              'Barang Servis Bisa Anda Kerjakan, Lihat <b>Menu Teknisi/Servis Dikerjakan</b> Untuk Melihat History Servis Anda !!',
              'success'
            );
          }
        }
      });
    });
  })
</script>


</body>
</html>