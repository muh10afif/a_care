<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="row">
		<div class="col-md-12">
			<table>
				<thead>
				<tr>
				<th colspan="6" style="font-size: 20px;">LAPORAN DATA PROPERTI JUAL</th>
				</tr>
				<tr>
					<th colspan="6" style="font-size: 15px;">CV. SOLUSI PRIMA</th>
				</tr>
				<tr>
					<th colspan="6" style="font-size: 15px;">Jln. Gunung Batu No. 25 Bandng</th>
				</tr>
				<tr>
					<th colspan="6"></th>
				</tr>
				</thead>
			</table>
			
		</div>
		<div class="col-md-12">
			<table border="2">
				<thead>
		          <tr>
		            <th>NO</th>
		            <th>DEBITUR</th>
		            <th>JENIS ASSET</th>
		            <th>STATUS ASSET</th>
		            <th>ALAMAT</th>
		            <th>TANGGAL</th>
		          </tr>
		        </thead>
		        <tbody>

		          <?php $no=1; foreach ($asset as $a): ?>
		          <tr>
		            <td><?= $no++ ?></td>
		            <td><?= $a['nama_debitur'] ?></td>
		            <td><?= $a['jenis_asset'] ?></td>
		            <td><?= $a['status_asset'] ?></td>
		            <td><?= $a['alamat'] ?></td>
		            <td><?php $a = substr($a['add_time'], 0, 10); echo tgl_indo($a) ?></td>
		          </tr>
		          <?php endforeach ?>
		          
		        </tbody>
			</table>
		</div>
	</div>

	

</body>
</html>

