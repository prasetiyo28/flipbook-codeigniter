<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Data Paket</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Paket <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Paket</a></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							
							<th>id</th>
							<th>Nama Paket</th>
							<th>Kategori</th>
							<th>Banyak</th>
							<th>Harga</th>
							<th>Keterangan</th>
							<th>Action</th>
						</tr>
					</thead>

					
					<tbody>
						<?php foreach ($paket as $r) { ?>
							<tr>
								<td><?php echo $r->id_paket; ?></td>
								<td><?php echo $r->nama; ?></td>
								<td><?php echo $r->kategori; ?></td>
								<td><?php echo $r->banyak; ?></td>
								<td><?php echo $r->harga; ?></td>
								<td><?php echo $r->keterangan; ?></td>
								<td>



								<!-- 	<a 
									href="javascript:;"
									data-id="<?php echo $r->id_paket ?>"
									data-jumlah="<?php echo $r->banyak ?>"
									data-harga="<?php echo $r->harga ?>"
									data-keterangan="<?php echo $r->keterangan ?>"
									data-toggle="modal" data-target="#edit-data">
									<button  data-toggle="modal" data-target="#ubah-data" class="btn btn-warning">Edit</button>
								</a> -->

								<a href="<?php echo base_url() ?>cabang/hapus_paket/<?php echo $r->id_paket ?>" class="btn btn-danger">Delete</a>

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
				<h5 class="modal-title" id="exampleModalLabel">Tambah Paket</h5>
				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</a>
			</div>
			<div class="modal-body">
				<form action='<?php echo base_url() ?>cabang/save_paket' method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Nama Paket</label>
						<input id="inputText3" name="nama" type="text" class="form-control" placeholder="Nama Paket...">

					</div>
					<div class="form-group">
						<label for="inputText3" class="col-form-label">Harga</label>
						<input id="inputText3" name="harga" type="number" class="form-control" placeholder="Nama Paket...">

					</div>
					<div class="form-group">
						<label for="inputText3" class="col-form-label">Kategori</label>
						<select name="kategori" class="form-control">
							<option value="1">Paha</option>
							<option value="2">Dada</option>
						</select>

					</div>
					<div class="form-group">
						<label for="inputText3" class="col-form-label">Banyak</label>
						<input id="inputText3" name="banyak" type="number" class="form-control" placeholder="Banyak Ayam...">

					</div>

					<div class="form-group">
						<label for="inputText3" class="col-form-label">keterangan</label>
						<input id="inputText3" name="keterangan" type="text" class="form-control" placeholder="Keterangan Paket...">

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