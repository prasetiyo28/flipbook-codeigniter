 <div class="container-fluid">

 	<!-- Page Heading -->
 	<div class="d-sm-flex align-items-center justify-content-between mb-4">
 		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
 	</div>



 	<!-- Content Row -->
 	<div class="row">

 		<!-- Earnings (Monthly) Card Example -->

 		<!-- Content Column -->
 		<div class="col-lg-12 mb-4">

 			<!-- Project Card Example -->
 			<div class="card shadow mb-4">
 				<div class="card-header py-3">
 					<h6 class="m-0 font-weight-bold text-primary">Welcome</h6>
 				</div>
 				<div class="col-md-8">
 					
 					<form>
 						<div class="form-group">
 							<label for="inputText3" class="col-form-label">Nama Catering</label>
 							<input readonly id="inputText3" value="<?php echo $cabang->minimum ?>" name="nama" type="text" class="form-control" placeholder="Nama Catering...">

 						</div>
 						<td>
 							<a 
 							href="javascript:;"
 							data-minimum="<?php echo $cabang->minimum ?>"
 							data-toggle="modal" data-target="#edit-data">
 							<button  data-toggle="modal" data-target="#ubah-data" class="btn btn-warning">Edit</button></a>
 						</td>

 					</form>
 				</div>
 				<div class="card-body">
 					
 				</div>


 			</div>

 		</div>
 		
 	</div>
 </div>
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
 				<h4 class="modal-title">Ubah Data</h4>
 				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

 			</div>
 			<form class="form-horizontal" action="<?php echo base_url('cabang/update_minimum')?>" method="post" enctype="multipart/form-data" role="form">
 				<div class="modal-body">
 					<div class="form-group">
 						<label class="col-lg-4 col-sm-4 control-label">Minimum Stock</label>

 						<div class="col-lg-12">

 							<input type="text" class="form-control" id="minimum" name="minimum" placeholder="Minimum Order">
 						</div>
 					</div>




 				</div>
 				<div class="modal-footer">
 					<button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
 					<button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
 				</div>
 			</form>
 		</div>
 	</div>
 </div>

 <script>
 	$(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#minimum').attr("value",div.data('minimum'));

        });
    });
</script>