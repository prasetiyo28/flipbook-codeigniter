<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Data Paket</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Stock <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-success"><i class="fa fa-plus"></i>Tambah Stock</a></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							
							<th>id</th>
							<th>Tanggal</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Total</th>
							<th>Jenis</th>
							<th>Action</th>
						</tr>
					</thead>

					
					<tbody>
						<?php foreach ($datastock as $r) { ?>
							<tr>
								<td><?php echo $r->id_stock; ?></td>
								<td><?php echo $r->tanggal; ?></td>
								<td><?php echo $r->jumlah; ?></td>
								<td><?php echo $r->harga; ?></td>
								<td><?php echo ($r->jumlah * $r->harga); ?></td>
								<td><?php echo $r->kategori; ?></td>
								<?php if ($r->status == 0) { ?>
									<td>
										<a href="<?php echo base_url() ?>cabang/hapus_pengeluaran/<?php echo $r->id_stock ?>" class="btn btn-danger">Delete</a>
										<a 
										href="javascript:;"
										data-id="<?php echo $r->id_stock ?>"
										data-jumlah="<?php echo $r->jumlah ?>"
										data-tanggal="<?php echo $r->tanggal ?>"
										data-toggle="modal" data-target="#edit-data">
										<button  data-toggle="modal" data-target="#ubah-data" class="btn btn-warning">Edit</button>
									</td>
								<?php }elseif($r->status == 1){ ?>
									<td>
										<a href="javascript:void(0);" class="btn btn-warning"><i class="fa fa-box"></i> Sedang diproses</a>
									</td>

								<?php }elseif($r->status == 2){ ?>
									<td>
										<a href="<?php echo base_url() ?>cabang/terima/<?php echo $r->id_stock  ?>" class="btn btn-info"><i class="fa fa-truck"></i> Sedang dikirim</a>
									</td>
								<?php }else{ ?>
									<td>
										<a href="javascript:void(0);" class="btn btn-success"><i class="fa fa-check"></i> Diterima</a>
									</td>
								<?php } ?>
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
				<h5 class="modal-title" id="exampleModalLabel">Pengeluaran Hari Ini</h5>
				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</a>
			</div>
			<div class="modal-body">
				<form action='<?php echo base_url() ?>cabang/order' method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="inputText3" class="col-form-label">Jenis</label>
						<select class="form-control" name="kategori" required>
							<option value="" disabled selected>-pilih kategori-</option>
							<option value="1">Paha</option>
							<option value="2">Dada</option>
						</select>
					</div>
					<div class="form-group">
						<label for="inputText3" class="col-form-label">Stock</label>
						<input id="inputText3" name="jumlah"  min="0" type="number" class="form-control" placeholder="Jumlah order stock...">
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
			<form class="form-horizontal" action="<?php echo base_url('cabang/update_order')?>" method="post" enctype="multipart/form-data" role="form">
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
