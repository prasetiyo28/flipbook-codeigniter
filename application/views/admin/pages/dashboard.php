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

 				<?php if (empty($cabang)) { ?>
 					<div class="card-body">
 						<h1>Silahkan lengkapi data catering anda dengan klik <a  href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">lengkapi data catering</a> untuk dapat menjadi mitra kami </h1>
 					</div>

 				<?php }else{		 ?>
 					<div class="card-body">
 						<h1>Hai <?php echo $this->session->userdata('nama_cabang') ?>, Quick Chicken</h1>
 					</div>
 				<?php } ?>


 			</div>

 		</div>
 		<div class="col-xl-12 col-md-12 mb-12">
 			<div class="card bg-warning shadow h-100 py-2">
 				<div class="card-body">
 					<div class="row no-gutters align-items-center">
 						<div class="col mr-2">
 							<div class="text-xs font-weight-bold text-white text-uppercase mb-1"><h1 class="text-white">Paket Terlaris :</h1></div>
 						</div>
 						<div class="col-auto text-white">
 							<h1><?php echo $paket->nama; ?></h1>
 							
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>

 		<div class="col-xl-12 col-md-12 mb-12">
 			<div class="card bg-info shadow h-100 py-2">
 				<div class="card-body">
 					<div class="row no-gutters align-items-center">
 						<div class="col mr-2">
 							<div class="text-xs font-weight-bold text-white text-uppercase mb-1"><h1 class="text-white">Jumlah Stock Sayap</h1></div>
 						</div>
 						<div class="col-auto text-white">
 							<h1><?php echo intval($sayap); ?></h1>
 							
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>

 		<div class="col-xl-12 col-md-12 mb-12">
 			<div class="card bg-info shadow h-100 py-2">
 				<div class="card-body">
 					<div class="row no-gutters align-items-center">
 						<div class="col mr-2">
 							<div class="text-xs font-weight-bold text-white text-uppercase mb-1"><h1 class="text-white">Jumlah Stock Paha</h1></div>
 						</div>
 						<div class="col-auto text-white">
 							<h1><?php echo intval($paha); ?></h1>
 							
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>

 		<div class="col-xl-12 col-md-12 mb-12">
 			<div class="card bg-info shadow h-100 py-2">
 				<div class="card-body">
 					<div class="row no-gutters align-items-center">
 						<div class="col mr-2">
 							<div class="text-xs font-weight-bold text-white text-uppercase mb-1"><h1 class="text-white">Jumlah Stock Dada</h1></div>
 						</div>
 						<div class="col-auto text-white">
 							<h1><?php echo intval($dada); ?></h1>
 							
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>

 	</div>
 </div>

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 	<div class="modal-dialog" role="document">
 		<div class="modal-content">
 			<div class="modal-header">
 				<h5 class="modal-title" id="exampleModalLabel">Lengkapi Data Mitra</h5>
 				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">&times;</span>
 				</a>
 			</div>
 			<div class="modal-body">
 				<form action='<?php echo base_url() ?>Mitra/save_mitra' method="POST" enctype="multipart/form-data">

 					<div class="form-group">
 						<label for="inputText3" class="col-form-label">Nama Catering</label>
 						<input id="inputText3" name="nama" type="text" class="form-control" placeholder="Nama Catering...">

 					</div>


 					<div class="form-group">
 						<label for="inputText3" class="col-form-label">Alamat</label>
 						<textarea class="form-control" name="alamat" placeholder="Alamat Catering..."></textarea>
 					</div>

 					<div class="form-group">
 						<label for="inputText3" class="col-form-label">No Telp</label>
 						<input id="inputText3" name="nomor" type="text" class="form-control" placeholder="No Telp Catering...">

 					</div>

 					<div class="form-group">
 						<label for="inputText3" class="col-form-label">Nama Pemilik Catering</label>
 						<input id="inputText3" name="pemilik" type="text" class="form-control" placeholder="Nama Pemilik Catering...">

 					</div>


 					<div class="form-group">
 						<label for="inputText3" class="col-form-label">Nama Bank</label>

 						<select name="bank" class="form-control">
 							<option value="">-Pilih Bank-</option>
 							<option>BCA (Bank Central Asia)</option>
 							<option>BRI (Bank Rakyat Indonesia)</option>
 							<option>BNI (BANK Nasional Indonesia)</option>
 							<option>CIMB</option>
 							<option>MAYBANK</option>
 							<option>UOB</option>
 						</select>

 					</div>

 					<div class="form-group">
 						<label for="inputText3" class="col-form-label">Nomor Rekening</label>
 						<input id="inputText3" name="rekening" type="text" class="form-control" placeholder="Nomor Rekening Catering...">


 					</div>

 					<div class="form-group">
 						<label for="inputText3" class="col-form-label">Nama Account Bank</label>
 						<input id="inputText3" name="nama_rekening" type="text" class="form-control" placeholder="Nama Account Bank...">

 					</div>





 					


					<!-- <div class="form-group">
						<label for="inputText3" class="col-form-label">Detail Foto</label>
						<p>*file yang diterima hanya berekstensi .jpg, .jpeg, .png</p>
						<input type="file" accept="image/jpg, image/jpeg, image/png" name="foto">

					</div> -->

					
					<div class="modal-footer">
						<a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
						<input type="submit" value="Simpan" class="btn btn-primary">
					</div>


				</form>
			</div>
		</div>
	</div>

</div>