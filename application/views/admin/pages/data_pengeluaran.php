<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Data Pengeluaran</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<!-- <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-success"><i class="fa fa-plus"></i> Pengeluaran Hari ini</a></h6> -->
			<a href="#" id="print" class="btn btn-info"> <i class="fa fa-print"></i>print</a>
			<script type="text/javascript">
				function printData()
				{
					var divToPrint=document.getElementById("dataTable");
					newWin= window.open("");
					newWin.document.write(divToPrint.outerHTML);
					newWin.print();
					newWin.close();
				}

				$('#print').on('click',function(){
					printData();
				})
			</script>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							
							<th>No</th>
							<th>Tanggal</th>
							<th>Jumlah</th>
							<th>Jenis</th>
						</tr>
					</thead>

					
					<tbody>
						<?php $no=1; foreach ($pengeluaran as $r) { ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $r->tanggal; ?></td>
								<td><?php echo $r->jumlah; ?></td>
								<td><?php echo $r->kategori; ?></td>
							</tr>
						<?php } ?>



					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->



