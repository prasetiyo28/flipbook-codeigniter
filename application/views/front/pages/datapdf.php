<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Data PDF</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data PDF <br></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							
							<th>No</th>
							<th>Judul</th>
							<th>Action</th>
						</tr>
					</thead>

					
					<tbody>
						<?php $no=1; foreach ($flipbook as $r) { ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $r->title; ?></td>

								<td>



								<!-- 	<a 
									href="javascript:;"
									data-id="<?php echo $r->id_PDF ?>"
									data-jumlah="<?php echo $r->banyak ?>"
									data-harga="<?php echo $r->harga ?>"
									data-keterangan="<?php echo $r->keterangan ?>"
									data-toggle="modal" data-target="#edit-data">
									<button  data-toggle="modal" data-target="#ubah-data" class="btn btn-warning">Edit</button>
								</a> -->

								<!-- <a href="<?php echo base_url() ?>cabang/hapus_PDF/<?php echo $r->id_PDF ?>" class="btn btn-danger">Delete</a> -->
								<!-- <a href="<?php echo base_url() ?>admin/delete/<?php echo $r->id ?>" class="btn btn-danger">Delete</a> -->
								<a href="<?php echo base_url() ?>Front/detail/<?php echo $r->id ?>" target="_blank"><img width="250px" src="<?php echo base_url() ?>uploads/<?php echo $r->cover ?>"></a>

							</td>

						</tr>
					<?php } ?>



				</tbody>
			</table>
		</div>
	</div>
</div>

</div>
<!-- /.container-fluid -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah PDF</h5>
				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</a>
			</div>
			<div class="modal-body">
				<form action='<?php echo base_url() ?>admin/save_pdf' method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Judul</label>
						<input id="inputText3" name="title" type="text" class="form-control" placeholder="Judul">

					</div>
					<div class="form-group">
						<label for="inputText3" class="col-form-label">File PDF</label>
						<input id="inputText3" name="pdf" type="file" accept=".pdf" class="form-control" placeholder="Nama PDF...">

					</div>
					<!-- <div class="form-group">
						<label for="inputText3" class="col-form-label">Detail Foto</label>
						<p>*file yang diterima hanya berekstensi .jpg, .jpeg, .png</p>
						<input type="file" accept="image/jpg, image/jpeg, image/png" name="foto">

					</div> -->

					

					<div class="modal-footer">
						<a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
						<input type="submit" value="Simpan" class="btn btn-success">
					</div>


				</form>
			</div>
		</div>
	</div>
</div>




<!-- Modal Ubah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Data</h4>
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
				
			</div>
			<form class="form-horizontal" action="<?php echo base_url('cabang/update_pengeluaran')?>" method="post" enctype="multipart/form-data" role="form">
				<div class="modal-body">
					<div class="form-group">
						<label class="col-lg-2 col-sm-2 control-label">Tanggal</label>
						<div class="col-lg-10">
							<input type="text" readonly class="form-control" id="tanggal" name="tanggal" placeholder="tanggal">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-2 col-sm-2 control-label">Jumlah</label>
						<div class="col-lg-10">
							<input type="hidden" id="id" name="id">
							<input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Id Pengeluaran">
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


<!-- END Modal Ubah -->

<script>
	$(document).ready(function() {
        // Untuk sunting

        <?php if ($this->session->flashdata('gagal') != '') { ?>
        	window.alert("Username/password salah");
        <?php } ?>
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#jumlah').attr("value",div.data('jumlah'));
            modal.find('#tanggal').attr("value",div.data('tanggal'));

        });
    });
</script>