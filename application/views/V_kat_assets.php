<style type="text/css">
    #gmbr{
        width: 200px;
        height: 125px;
        cursor: pointer;
    }
</style>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">Katalog <?= ucwords($jenis_asset) ?></h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Assets Care</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('katalog') ?>">Katalog</a></li>
						<li class="breadcrumb-item">Katalog <?= ucwords($jenis_asset) ?></li>
						<li class="breadcrumb-item active" aria-current="page">Lihat Katalog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<a href="<?= base_url() ?>katalog/asset/<?= $id_jenis_asset ?>"><button class="btn btn-success">Kembali</button></a>
		</div>
	</div>

	<?php if (!isset($_POST['cari'])): ?>

		<?php if (!$foto): ?>

			<div class="row mt-3">
				<div class="col-md-12">	
					<div class="alert alert-danger" align="center">
						Data Katalog <?= ucfirst($jenis_asset) ?> Kosong!
					</div>
				</div>
			</div>

		<?php else: ?>

			<div class="row mt-3">
	<div class="col-md-9">

		<div class="card shadow">
		<div class="card-body">

				<?php if (isset($_POST['cari'])): ?>
				<?= $this->session->flashdata('pesan'); ?>
				<?php endif ?>
			<div class="row gambar">


				<?php foreach ($foto as $f): ?>

					<div class="col-lg-3 col-md-6">
						<!-- Card -->
						<div class="card shadow card-hover">
							<div class="card-header bg-info">
								<h4 class="card-title text-center text-white"><?= ucfirst($f['jenis_asset']) ?></h4>
								<h6 class="card-title text-center text-white mt-1"><?= ucwords(strtolower($f['nama_debitur'])) ?></h6>
							</div>
							<!-- <img class="card-img-top img-responsive" id="gmbr" style="height: 250px; width: 100%;" src="http://localhost/vcare/images/<?php echo $f['foto'];?>" > -->
							<img class="card-img-top img-responsive" id="gmbr" style="height: 250px; width: 100%;" src="http://vcare-new.skdigital.id/images/<?php echo $f['foto'];?>" >
							<div class="card-footer text-center">
								<?php if ($f['status_asset'] == 'Belum Terjual'): ?>
										<h4><span class="label label-danger">Belum Terjual</span></h4>
								<?php elseif ($f['status_asset'] == 'Sudah Terjual'): ?>
									<h4><span class="label label-success">Sudah Terjual</span></h4>
								<?php else: ?>
										<h4><span class="label label-info"><?= ucwords($f['status_asset']) ?></span></h4>
								<?php endif ?>
							</div>
						</div>
						<!-- Card -->
					</div>

				<?php endforeach ?>

			</div>

			<?php if (!isset($_POST['cari'])): ?>
				<!--Tampilkan pagination-->
				<div class="row">
					<div class="col-md-12">
						<?php echo $pagination; ?>
					</div>
				</div>
			<?php endif ?>
			

		</div>
	</div>
		


	</div>

	<div class="col-md-3">

		<div class="card shadow">
			<div class="card-header bg-info">
				<h4 class="text-white mb-0">Filter Data</h4>
			</div>
			<form method="post" action="<?= base_url() ?>katalog/lihat_katalog/<?= $id_jenis_asset ?>">
			<div class="card-body">
				<div class="form-group row">
					<div class="col-md-3">
						<label class="mt-1">Wilayah</label>
					</div>
					<div class="col-md-9">
						<select class="form-control custom-select" name="kota">
							<option value="">-- Pilih Wilayah --</option>
							<?php foreach ($kota->result_array() as $k): ?>
								<option value="<?= $k['kota'] ?>"><?= $k['kota'] ?></option>
							<?php endforeach ?>
							
						</select>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-3">
						<label class="mt-1">Harga</label>
					</div>
					<div class="col-md-9">
						<select class="form-control custom-select" name="harga">
							<option value="">-- Urut Harga --</option>
							<option value="desc">Termahal</option>
							<option value="asc">Termurah</option>
						</select>
					</div>
				</div>
				
			</div>
			<div class="card-footer">
				<div class="col-md-12 text-right">
					<button class="btn btn-sm btn-info mr-2" name="cari" type="submit" >Tampilkan</button>
					<button class="btn btn-sm btn-secondary" name="all" type="submit">Reset</button>
				</div>
			</div>
			</form>
		</div>

		<div class="card shadow table-responsive">
			<div class="card-body">
				<table class="table text-center table-bordered">
					<thead class="bg-info text-white">
					<tr>
					<th>Agen Pemasaran</th>
					</tr>
					</thead>
					<tr>
						<td>
							<select name="agen" id="agen" class="form-control custom-select">
								<option value="-0">-- Pilih Agen --</option>
								<?php foreach ($agen->result_array() as $a): ?>
									<option value="<?= $a['id_agen_pemasaran'] ?>"><?= $a['agen_pemasaran'] ?></option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
				</table><br>
				<table id="pembeli" class="table text-center table-hover table-bordered">
				<thead class="bg-info text-white">
					<tr>
					<th>No</th>
					<th>Nama Pembeli</th>
					</tr>
					
				</thead>
				<tbody class="pembeli">
				<tr>
					<td colspan="2">Data Kosong</td>
					</tr> 
				</tbody>
				</table>
			</div>
		</div>

		
	</div>

	</div>

		<?php endif; ?>

	<?php else: ?>

	<div class="row mt-3">
	<div class="col-md-9">

		<div class="card shadow">
		<div class="card-body">

				<?php if (isset($_POST['cari'])): ?>
				<?= $this->session->flashdata('pesan'); ?>
				<?php endif ?>
			<div class="row gambar">


				<?php foreach ($foto as $f): ?>

					<div class="col-lg-3 col-md-6">
						<!-- Card -->
						<div class="card shadow card-hover">
							<div class="card-header bg-info">
								<h4 class="card-title text-center text-white"><?= ucfirst($f['jenis_asset']) ?></h4>
								<h6 class="card-title text-center text-white mt-1"><?= ucwords(strtolower($f['nama_debitur'])) ?></h6>
							</div>
							<img class="card-img-top img-responsive" id="gmbr" style="height: 250px; width: 100%;" src="http://localhost/vcare/images/<?php echo $f['foto'];?>" >
							<div class="card-footer text-center">
								<?php if ($f['status_asset'] == 'Belum Terjual'): ?>
										<h4><span class="label label-danger">Belum Terjual</span></h4>
								<?php elseif ($f['status_asset'] == 'Sudah Terjual'): ?>
									<h4><span class="label label-success">Sudah Terjual</span></h4>
								<?php else: ?>
										<h4><span class="label label-info"><?= ucwords($f['status_asset']) ?></span></h4>
								<?php endif ?>
							</div>
						</div>
						<!-- Card -->
					</div>

				<?php endforeach ?>

			</div>

			<?php if (!isset($_POST['cari'])): ?>
				<!--Tampilkan pagination-->
				<div class="row">
					<div class="col-md-12">
						<?php echo $pagination; ?>
					</div>
				</div>
			<?php endif ?>
			

		</div>
	</div>
		


	</div>

	<div class="col-md-3">

		<div class="card shadow">
			<div class="card-header bg-info">
				<h4 class="text-white mb-0">Filter Data</h4>
			</div>
			<form method="post" action="<?= base_url() ?>katalog/lihat_katalog/<?= $id_jenis_asset ?>">
			<div class="card-body">
				<div class="form-group row">
					<div class="col-md-3">
						<label class="mt-1">Wilayah</label>
					</div>
					<div class="col-md-9">
						<select class="form-control custom-select" name="kota">
							<option value="">-- Pilih Wilayah --</option>
							<?php foreach ($kota->result_array() as $k): ?>
								<option value="<?= $k['kota'] ?>"><?= $k['kota'] ?></option>
							<?php endforeach ?>
							
						</select>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-3">
						<label class="mt-1">Harga</label>
					</div>
					<div class="col-md-9">
						<select class="form-control custom-select" name="harga">
							<option value="">-- Urut Harga --</option>
							<option value="desc">Termahal</option>
							<option value="asc">Termurah</option>
						</select>
					</div>
				</div>
				
			</div>
			<div class="card-footer">
				<div class="col-md-12 text-right">
					<button class="btn btn-sm btn-info mr-2" name="cari" type="submit" >Tampilkan</button>
					<button class="btn btn-sm btn-secondary" name="all" type="submit">Reset</button>
				</div>
			</div>
			</form>
		</div>

		<div class="card shadow table-responsive">
			<div class="card-body">
				<table class="table text-center table-bordered">
					<thead class="bg-info text-white">
					<tr>
					<th>Agen Pemasaran</th>
					</tr>
					</thead>
					<tr>
						<td>
							<select name="agen" id="agen" class="form-control custom-select">
								<option value="-0">-- Pilih Agen --</option>
								<?php foreach ($agen->result_array() as $a): ?>
									<option value="<?= $a['id_agen_pemasaran'] ?>"><?= $a['agen_pemasaran'] ?></option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
				</table><br>
				<table id="pembeli" class="table text-center table-hover table-bordered">
				<thead class="bg-info text-white">
					<tr>
					<th>No</th>
					<th>Nama Pembeli</th>
					</tr>
					
				</thead>
				<tbody class="pembeli">
				<tr>
					<td colspan="2">Data Kosong</td>
					</tr> 
				</tbody>
				</table>
			</div>
		</div>

		
	</div>

	</div>

	<?php endif; ?>
</div>

<!-- Photoviewer -->
<link rel="stylesheet" href="<?= base_url() ?>template/viewer/css/viewer.css">
<!-- Photoviewer -->
<script src="<?= base_url() ?>template/viewer/js/viewer.js"></script>

<script type="text/javascript">
	$('.gambar').viewer();
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#agen').change(function () {
			var id = $(this).val();
			$.ajax({ 
				url    : "<?= base_url() ?>katalog/get_pembeli",
				method : "POST",
				data   : {id: id},
				async  : false,
				dataType : 'json',
				success  : function(data) {
					var html = '';
					var i;
					for (var i = 0; i < data.length; i++) {
						html += '<tr><td>'+(i+1)+'</td><td>'+data[i].nama_calon_pembeli+'</td></tr>';
					}
					$('.pembeli').html(html);
				}
			 });
		});
	});

	
</script>
