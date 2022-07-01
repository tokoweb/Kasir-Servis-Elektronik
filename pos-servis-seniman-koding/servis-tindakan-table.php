<?php  
	include '_header-artibut.php';
?>



	<div class="container-fluid">
		<section class="content">
	      <div class="row">
	        <div class="col-12">

	          <div class="card">
	            <div class="card-header">
	              <h3 class="card-title">Data Barang Servis <b>Status Baru Masuk & Oper Teknisi Lain</b></h3>
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body">
	              <div class="table-auto">
	                <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
	                  <thead>
	                  <tr>
	                    <th style="width: 6%;">No.</th>
	                    <th style="width: 13%;">Nota</th>
	                    <th>Customer</th>
	                    <th>Tanggal Masuk</th>
	                    <th>Teknisi yg Disarankan</th>
	                    <th>Status</th>
	                    <th style="text-align: center; width: 4%">Aksi</th>
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




<script>
    $(document).ready(function(){
        var table = $('#example1').DataTable( { 
             "processing": true,
             "serverSide": true,
             "ajax": "servis-tindakan-data.php?cabang=<?= $sessionCabang; ?>",
             "columnDefs": 
             [
              {
                "targets": -1,
                  "data": null,
                  "defaultContent": 
                  `<center class="orderan-online-button">
                      <button class='btn btn-primary tblEdit' title="Retur">
                          <i class='fa fa-edit'></i>
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


        $('#example1 tbody').on('click','.tblEdit',function(e){
	      e.preventDefault();
	      var data  = table.row( $(this).parents('tr')).data();
	      $("#modal-id-edit").modal('show');
	      $.post('servis-tindakan-data-modal.php',
	        {id:data[0]},
	        function(html){
	          $("#data-edit-servis").html(html);
	        }   
	      );
	    });
    });
</script>


<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>