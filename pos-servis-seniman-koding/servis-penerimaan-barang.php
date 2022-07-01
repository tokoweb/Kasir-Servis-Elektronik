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
            <h1>Penerimaan Barang Servis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="bo">Home</a></li>
              <li class="breadcrumb-item active">Data Penerimaan Barang Servis</li>
            </ol>
          </div>
          <div class="tambah-data">
            <a href='#' class="btn btn-primary" id="btn-input-servis">Tambah Data</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <span id="servis-penerimaan-barang-data"></span>

  </div>



    <div class="modal fade modal-input-servis" id="modal-id" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="servis-penerimaan-barang-input.php" id="form-input-servis" method="post" >
            <div class="modal-header">
              <h4 class="modal-title">Data Servis Masuk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="data-input-servis">
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary" name="servisPenerimaanBarang">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div class="modal fade modal-input-servis" id="modal-id-edit" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="servis-penerimaan-barang-edit-proses.php" id="form-edit-servis" method="post" >
            <div class="modal-header">
              <h4 class="modal-title">Data Edit Servis Masuk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="data-edit-servis">
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary" name="servisEditBarang">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div class="modal fade modal-input-servis" id="modal-id-cetak" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Print Nota & WhatsApp</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="data-cetak-servis">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-id-customer" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="servis-penerimaan-customer-input.php" id="form-input-customer" method="post" >
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Customer</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="data-input-servis">
                <div class="">
                  <div class="row">
                    <div class="col-md-6 col-lg-6">
                      <input type="hidden" name="customer_cabang" value="<?= $sessionCabang; ?>">
                        <div class="form-group">
                          <label for="customer_nama">Nama Lengkap</label>
                          <input type="text" name="customer_nama" class="form-control" id="customer_nama" placeholder="Enter Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="customer_tlpn">No. WhatsApp</label>
                            <input type="number" name="customer_tlpn" class="form-control" id="customer_tlpn" placeholder="Contoh: 081234567890" required onkeypress="return hanyaAngka(event)">
                        </div>
                         <div class="form-group">
                          <label for="customer_email">Email (Tidak Wajib)</label>
                          <input type="email" name="customer_email" class="form-control" id="customer_email" placeholder="Enter email">
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6">
                       <div class="form-group">
                            <label for="customer_alamat">Alamat</label>
                            <textarea name="customer_alamat" id="customer_alamat" class="form-control" required="required" placeholder="Alamat Lengkap" style="height:123px;"></textarea>
                        </div>
                        <div class="form-group ">
                          <label for="customer_status">Status</label>
                          <div class="">
                              <select name="customer_status" required="" class="form-control ">
                                  <option value="">-- Status --</option>
                                  <option value="1">Active</option>
                                  <option value="0">Not Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary" name="tambahCustomer">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    

<?php include '_footer.php'; ?>

<script>

  $(document).ready(function(){
    // Memanggil data servis
    $('#servis-penerimaan-barang-data').load('servis-penerimaan-barang-data.php');

    // Memanggil modal input
    $(document).on('click','#btn-input-servis',function(e){
      e.preventDefault();
      $("#modal-id").modal('show');
      $.post('servis-penerimaan-barang-modal.php',
        function(html){
          $("#data-input-servis").html(html);
        }   
      );
    });

    // input servis
    $('#form-input-servis').submit(function(e){
      e.preventDefault();

      var dataFormUser = $('#form-input-servis').serialize();
      $.ajax({
        url: "servis-penerimaan-barang-input.php",
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
            $('#modal-id').modal('hide');
            $(".form-control").val('');
            $('#data-input-servis').remove('servis-penerimaan-barang-modal.php');
            $('#servis-penerimaan-barang-data').load('servis-penerimaan-barang-data.php');
            Swal.fire(
              'Sukses !!',
              'Data Berhasil Tersimpan',
              'success'
            );
            $("#modal-id-cetak").modal('show');
            $('#data-cetak-servis').load('servis-penerimaan-barang-data-cetak-servis.php');
          }
        }
      });
    });


    // Edit
    $(document).on('click','#edit_servis',function(e){
      e.preventDefault();
      $("#modal-id-edit").modal('show');
      $.post('servis-penerimaan-barang-edit.php',
        {id:$(this).attr('data-id')},
        function(html){
          $("#data-edit-servis").html(html);
        }   
      );
    });

    // Proses Edit
    $('#form-edit-servis').submit(function(e){
      e.preventDefault();

      var dataFormUser = $('#form-edit-servis').serialize();
      $.ajax({
        url: "servis-penerimaan-barang-edit-proses.php",
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
            $('#servis-penerimaan-barang-data').load('servis-penerimaan-barang-data.php');
            Swal.fire(
              'Sukses !!',
              'Data Berhasil Diedit',
              'success'
            );
          }
        }
      });
    });

    // Memanggil modal Customer
    $(document).on('click','#tambah-customer',function(e){
      e.preventDefault();
      $("#modal-id-customer").modal('show');
      $('#modal-id').modal('hide');
    });

    // input customer
    $('#form-input-customer').submit(function(e){
      e.preventDefault();

      var dataFormUser = $('#form-input-customer').serialize();
      $.ajax({
        url: "servis-penerimaan-customer-input.php",
        type: "post",
        data: dataFormUser,
        success: function(result) {
          var hasil = JSON.parse(result);
          if (hasil.hasil !== "sukses") {
            Swal.fire(
              'Gagal',
              'Data Customer Sudah Ada !!',
              'error'
            );
          } else {
            $("#modal-id-customer").modal('hide');
            $(".form-control").val('');
            // $('#modal-id').modal('show');
            // $.post('servis-penerimaan-barang-modal.php',
            //   function(html){
            //     $("#data-input-servis").html(html);
            //   }   
            // );
            Swal.fire(
              'Sukses !!',
              'Data Berhasil Tersimpan',
              'success'
            );
          }
        }
      });
    });

  });
</script>