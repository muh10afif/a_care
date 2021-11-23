<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
			<?php if ($id_debitur == 0): ?>
				<a href="<?= base_url('agunan/non_kelolaan') ?>">
			<?php else: ?>
				<a href="<?= base_url('agunan/detail_agunan/'.$id_debitur) ?>">
			<?php endif ?>

			<button class="btn btn-success float-right">Kembali</button></a>
            <h4 class="page-title">Debitur <?= ucwords(strtolower($nm_deb)) ?></h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Assets Care</a></li>
						<li class="breadcrumb-item">Dokumen Asset</li>
						<li class="breadcrumb-item">Kelolaan</li>
						<li class="breadcrumb-item">Detail Debitur</li>
						<li class="breadcrumb-item">Tambah Asset <?= $nm_asset['jenis_asset'] ?></li>
                    </ol>
                </nav>
			</div>
        </div>
    </div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow">

				<?php echo form_open_multipart('agunan/simpan_dok_agunan_baru_1/'.$jenis_asset.'/'.$id_debitur, array('autocomplete' => 'off')); ?>

				<input type="hidden" name="nama_deb" value="<?php echo $deb['nama_debitur'] ?>">

				<div class="card-header bg-info">
				<button type="submit" class="btn btn-warning float-right mb-2">Simpan</button>
					<h4 class="mb-3 text-white">Tambah Asset <?= $nm_asset['jenis_asset'] ?></h4>
					
				</div>
				<div class="card-body">

					<?php if ($jenis_asset == 8 || $jenis_asset == 1 || $jenis_asset == 6 || $jenis_asset == 2 || $jenis_asset == 7 || $jenis_asset == 9): ?>
						
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#info" role="tab">Informasi</a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#lingkungan" role="tab">Lingkungan</a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#analisa_lingkungan" role="tab">Analisa Lingkungan</a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#kawasan" role="tab">Kawasan</a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#lokasi_site" role="tab">Lokasi Site</a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#topografi" role="tab">Topografi</a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data_tanah" role="tab">Data Tanah</a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#catatan" role="tab">Catatan</a> </li>
						<?php if ($jenis_asset == 1 || $jenis_asset == 6 || $jenis_asset == 7) : ?>

						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bangunan" role="tab">Bangunan</a> </li>

						<?php endif; ?>

						<?php if ($jenis_asset == 1 || $jenis_asset == 6 || $jenis_asset == 8 || $jenis_asset == 7) : ?>
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#spek_bangunan" role="tab">Spesifikasi Bangunan</a> </li>
						<?php endif; ?>
						
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#fasilitas" role="tab">Fasilitas</a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ket_tambahan" role="tab">Keterangan Tambahan</a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#foto" role="tab">Foto</a> </li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border"> 
						<div class="tab-pane active" id="info" role="tabpanel">
							<div class="p-20">
								<?php if ($id_debitur != 0): ?>
									<div class="row pt-3">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Alamat Agunan</label>
												<textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="masukkan alamat agunan"></textarea>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Yang Dijumpai</label>
												<textarea name="yang_dijumpai" id="yang_dijumpai" class="form-control" rows="3" placeholder="masukkan keterangan"></textarea>
											</div>
										</div>
										<!--/span-->
									</div>
								<?php else: ?>
									<div class="row pt-3">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Atas Nama</label>
												<input type="text" name="atas_nama" class="form-control" placeholder="Masukkan Atas Nama" required>
											</div>
										</div>
									</div>
								<?php endif; ?>
								
								<!--/row-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group has-success">
											<label class="control-label">Status PIC</label>
											<select class="form-control custom-select" name="status_pic">
												<option value="">-- Pilih Status PIC --</option>
												<option value="Debitur">Debitur</option>
												<option value="Keluarga">Keluarga</option>
												<option value="Pihak Lain">Pihak Lain</option>
											</select></div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group has-success">
											<label class="control-label">Status Agunan</label>
											<select class="form-control custom-select" name="status_agunan">
												<option value="">-- Pilih Status Agunan --</option>
												<?php foreach ($status_milik as $s): ?>
													<option value="<?= $s['id'] ?>"><?= $s['status_milik'] ?></option>
												<?php endforeach; ?>
											</select></div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group has-success">
											<label class="control-label">Batas Utara</label>
											<select class="form-control custom-select" name="batas_utara">
												<option value="">-- Pilih Batas Utara --</option>
												<option value="Rumah">Rumah</option>
												<option value="Tanah Kosong">Tanah Kosong</option>
												<option value="Jalan">Jalan</option>
											</select></div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group has-success">
											<label class="control-label">Batas Selatan</label>
											<select class="form-control custom-select" name="batas_selatan">
												<option value="">-- Pilih Batas Selatan --</option>
												<option value="Rumah">Rumah</option>
												<option value="Tanah Kosong">Tanah Kosong</option>
												<option value="Jalan">Jalan</option>
											</select></div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group has-success">
											<label class="control-label">Batas Barat</label>
											<select class="form-control custom-select" name="batas_barat">
												<option value="">-- Pilih Batas Utara --</option>
												<option value="Rumah">Rumah</option>
												<option value="Tanah Kosong">Tanah Kosong</option>
												<option value="Jalan">Jalan</option>
											</select></div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group has-success">
											<label class="control-label">Batas Timur</label>
											<select class="form-control custom-select" name="batas_timur">
												<option value="">-- Pilih Batas Selatan --</option>
												<option value="Rumah">Rumah</option>
												<option value="Tanah Kosong">Tanah Kosong</option>
												<option value="Jalan">Jalan</option>
											</select></div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group has-success">
											<label class="control-label">Status Dokumen</label>
											<select class="form-control custom-select" name="dokumen">
												<option value="">-- Pilih Status Dokumen --</option>
												<option value="SHM/SHGB">SHM/SHGB</option>
												<option value="SHRSS">SHRSS</option>
												<option value="Girik">Girik</option>
												<option value="AJB">AJB</option>
												<option value="Akta Hibah">Akta Hibah</option>
											</select></div>
									</div>
									<div class="col-md-6">
										<div class="form-group has-success">
											<label class="control-label">Total Harga</label>
											<div class="input-group">
												<div class="input-group-prepend">
												<span class="input-group-text">Rp.</span>
												</div>
												<input type="text" name="total_harga" class="form-control" id="rupiah" placeholder="Masukkan Harga">

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane  p-20" id="lingkungan" role="tabpanel">
							<div class="row pt-3">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Lokasi</label>
										<select class="form-control custom-select" name="lokasi">
											<option value="">-- Pilih Lokasi --</option>
											<option value="Pusat Kota">Pusat Kota</option>
											<option value="Pinggiran Kota">Pinggiran Kota</option>
										</select></div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Kepadatan Bangunan</label>
										<select class="form-control custom-select" name="kepadatan_bangunan">
											<option value="">-- Pilih Kepadatan Bangunan --</option>
											<option value="> 75%">> 75%</option>
											<option value="25% - 75%">25% - 75%</option>
											<option value="< 25%">< 25%</option>
										</select></div>
								</div>
								<!--/span-->
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Pertumbuhan Bangunan</label>
										<select class="form-control custom-select" name="pertumbuhan_bangunan">
											<option value="">-- Pilih Pertumbuhan Bangunan --</option>
											<option value="Cepat">Cepat</option>
											<option value="Stabil">Stabil</option>
											<option value="Lambat">Lambat</option>
										</select></div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Harga Tanah</label>
										<select class="form-control custom-select" name="harga_tanah">
											<option value="">-- Pilih Harga Tanah --</option>
											<option value="Naik Cepat">Naik Cepat</option>
											<option value="Stabil">Stabil</option>
											<option value="Gejala Turun">Gejala Turun</option>
										</select></div>
								</div>
								<!--/span-->
							</div>
						</div>
						<div class="tab-pane p-20" id="analisa_lingkungan" role="tabpanel">
							
							<?php if ($jenis_asset == 9) : ?>

								<div class="row pt-3">
									<div class="col-md-6">
										<div class="form-group has-success">
											<label class="control-label">Aksesbilitas</label>
											<select class="form-control custom-select" name="aksesbilitas">
												<option value="">-- Pilih Aksesbilitas --</option>
												<option value="Baik">Baik</option>
												<option value="Cukup">Cukup</option>
												<option value="Kurang">Kurang</option>
											</select></div>
									</div>
									<div class="col-md-6">
										<div class="form-group has-success">
											<label class="control-label">Transportasi</label>
											<select class="form-control custom-select" name="transportasi">
												<option value="">-- Pilih Transportasi --</option>
												<option value="Baik">Baik</option>
												<option value="Cukup">Cukup</option>
												<option value="Kurang">Kurang</option>
											</select>
										</div>
									</div>
								</div>

							<?php else : ?>

							<div class="row pt-3">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Aksesbilitas</label>
										<select class="form-control custom-select" name="aksesbilitas">
											<option value="">-- Pilih Aksesbilitas --</option>
											<option value="Baik">Baik</option>
											<option value="Cukup">Cukup</option>
											<option value="Kurang">Kurang</option>
										</select></div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Pusat Perbelanjaan</label>
										<select class="form-control custom-select" name="pusat_belanja">
											<option value="">-- Pilih Perbelanjaan --</option>
											<option value="Dekat">Dekat</option>
											<option value="Jauh">Jauh</option>
										</select></div>
								</div>
								<!--/span-->
							</div>
							<div class="row">
								<?php if ($jenis_asset != 7) : ?>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Sekolah</label>
										<select class="form-control custom-select" name="sekolah">
											<option value="">-- Pilih Sekolah --</option>
											<option value="Ada">Ada</option>
											<option value="Jauh">Jauh</option>
										</select></div>
								</div>
								<?php endif; ?>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Transportasi</label>
										<select class="form-control custom-select" name="transportasi">
											<option value="">-- Pilih Transportasi --</option>
											<option value="Baik">Baik</option>
											<option value="Cukup">Cukup</option>
											<option value="Kurang">Kurang</option>
										</select></div>
								</div>
								<!--/span-->
							</div>
							<div class="row">
							    <?php if ($jenis_asset != 7) : ?>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Rekreasi</label>
										<select class="form-control custom-select" name="rekreasi">
											<option value="">-- Pilih Rekreasi --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select></div>
								</div>
								<?php endif; ?>
							</div>

							<?php endif; ?>
						</div>
						<div class="tab-pane p-20" id="kawasan" role="tabpanel">
							<div class="d-flex justify-content-center pt-3">
								<?php if ($jenis_asset == 1 || $jenis_asset == 6) : ?>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Mayaoritas Data Hunian</label>
										<select class="form-control custom-select" name="mayor_data_hunian">
											<option value="">-- Pilih Mayaoritas Data Hunian --</option>
											<option value="Niaga">Niaga</option>
											<option value="Pemilikan">Pemilikan</option>
											<option value="Penyewaan">Penyewaan</option>
											<option value="Rumah Dinas">Rumah Dinas</option>
											<option value="Kosong">Kosong</option>
										</select></div>
								</div>
								<?php endif; ?>
								<?php if ($jenis_asset == 8 || $jenis_asset == 2) : ?>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Mayaoritas Data Hunian</label>
										<select class="form-control custom-select" name="mayor_data_hunian">
											<option value="">-- Pilih Mayaoritas Data Hunian --</option>
											<option value="Pemilikan">Pemilikan</option>
											<option value="Penyewaan">Penyewaan</option>
											<option value="Rumah Dinas">Rumah Dinas</option>
											<option value="Kosong">Kosong</option>
										</select></div>
								</div>
								<?php endif; ?>
								<?php if ($jenis_asset == 9) : ?>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Mayaoritas Data Hunian</label>
										<select class="form-control custom-select" name="mayor_data_hunian">
											<option value="">-- Pilih Mayaoritas Data Hunian --</option>
											<option value="Pabrik">Pabrik</option>
											<option value="Pergudangan">Pergudangan</option>
											<option value="Hunian/Pemukiman">Hunian/Pemukiman</option>
											<option value="Sawah">Sawah</option>
											<option value="Lahan Kosong">Lahan Kosong</option>
										</select></div>
								</div>
								<?php endif; ?>
								<?php if ($jenis_asset == 7) : ?>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Mayaoritas Data Hunian</label>
										<select class="form-control custom-select" name="mayor_data_hunian">
											<option value="">-- Pilih Mayaoritas Data Hunian --</option>
											<option value="Perkantoran">Perkantoran</option>
											<option value="Sekolah">Sekolah</option>
											<option value="Komplek Perumahan">Komplek Perumahan</option>
											<option value="Pasar">Pasar</option>
											<option value="Hunian">Hunian</option>
											<option value="Jalan">Jalan</option>
										</select></div>
								</div>
								<?php endif; ?>

							</div>
						</div>
						<div class="tab-pane p-20" id="lokasi_site" role="tabpanel">
							<div class="row pt-3">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Jaringan Listrik</label>
										<select class="form-control custom-select" name="jaringan_listrik">
											<option value="">-- Pilih --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Jaringan Air Bersih</label>
										<select class="form-control custom-select" name="jaringan_air_bersih">
											<option value="">-- Pilih --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Jaringan Telepon</label>
										<select class="form-control custom-select" name="jaringan_telepon">
											<option value="">-- Pilih --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Jaringan Gas</label>
										<select class="form-control custom-select" name="jaringan_gas">
											<option value="">-- Pilih --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Penampungan Sampah</label>
										<select class="form-control custom-select" name="penampungan_sampah">
											<option value="">-- Pilih --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Jalan Masuk</label>
										<select class="form-control custom-select" name="jalan_masuk">
											<option value="">-- Pilih --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Jalan Depan Objek</label>
										<select class="form-control custom-select" name="jalan_depan_objek">
											<option value="">-- Pilih --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Saluran Air</label>
										<select class="form-control custom-select" name="saluran_air">
											<option value="">-- Pilih --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Trotoar</label>
										<select class="form-control custom-select" name="trotoar">
											<option value="">-- Pilih --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane p-20" id="topografi" role="tabpanel">
						    <?php if ($jenis_asset != 7) : ?>
							<div class="row pt-3">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Penghijauan</label>
										<select class="form-control custom-select" name="penghijauan">
											<option value="">-- Pilih Penghijauan --</option>
											<option value="Rimbun">Rimbun</option>
											<option value="Gersang">Gersang</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Penataan Lingkungan</label>
										<select class="form-control custom-select" name="penataan_lingkungan">
											<option value="">-- Pilih Penataan Lingkungan --</option>
											<option value="Baik">Baik</option>
											<option value="Kurang">Kurang</option>
										</select>
									</div>
								</div>
							</div>
							<?php endif; ?>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Resiko Banjir</label>
										<select class="form-control custom-select" name="resiko_banjir">
											<option value="">-- Pilih Resiko Banjir --</option>
											<option value="Aman">Aman</option>
											<option value="Rentan">Rentan</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Tinggi Tanah Dari Jalan</label>
										<select class="form-control custom-select" name="tinggi_tanah">
											<option value="">-- Pilih Tinggi Tanah Dari Jalan --</option>
											<option value="Rendah">Rendah</option>
											<option value="Tinggi">Tinggi</option>
										</select>
									</div>
								</div>
							</div>

							<?php if ($jenis_asset == 1 || $jenis_asset == 6 || $jenis_asset == 2) : ?>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Tusuk Sate</label>
										<select class="form-control custom-select" name="tusuk_sate">
											<option value="">-- Pilih --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Sutet</label>
										<select class="form-control custom-select" name="sutet">
											<option value="">-- Pilih --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Jenis Tanah</label>
										<select class="form-control custom-select" name="jenis_tanah">
											<option value="">-- Pilih Jenis Tanah --</option>
											<option value="Subur">Subur</option>
											<option value="Tandus">Tandus</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Lampu Jalan</label>
										<select class="form-control custom-select" name="lampu_jalan">
											<option value="">-- Pilih Lampu Jalan --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
							</div>

							<?php endif; ?>

							<?php if ($jenis_asset == 8 || $jenis_asset == 7) : ?>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Lampu Jalan</label>
										<select class="form-control custom-select" name="lampu_jalan">
											<option value="">-- Pilih Lampu Jalan --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
							</div>

							<?php endif; ?>

						</div>
						<div class="tab-pane p-20" id="data_tanah" role="tabpanel">
							<div class="row pt-3">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Nilai Taksiran</label>
										<div class="input-group">
											<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Rp.</span>
											</div>
											<input type="number" name="nilai_taksiran" class="form-control" id="rupiah" placeholder="Masukkan Nilai Taksiran">

										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Bentuk Tanah</label>
										<select class="form-control custom-select" name="bentuk_tanah">
											<option value="">-- Pilih Bentuk Tanah --</option>
											<option value="Datar">Datar</option>
											<option value="Miring">Miring</option>
											<option value="Tidak Rata">Tidak Rata</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Letak Tanah</label>
										<select class="form-control custom-select" name="letak_tanah">
											<option value="">-- Pilih Letak Tanah --</option>
											<option value="Strategis">Strategis</option>
											<option value="Biasa">Biasa</option>
											<option value="Tidak Strategis">Tidak Strategis</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Luas Tanah</label>
										<div class="input-group mb-3">
										<input type="number" name="luas_tanah" class="form-control" placeholder="Masukkan Luas Tanah">

										<div class="input-group-prepend">
											<span class="input-group-text">m<sup>2</sup></span>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane p-20" id="catatan" role="tabpanel">
							<div class="row pt-3">
								<?php if ($jenis_asset != 9) : ?>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Lokasi</label>
										<select class="form-control custom-select" name="lokasi_cat">
											<option value="">-- Pilih Lokasi --</option>
											<?php if ($jenis_asset == 8) : ?>
												<option value="Dekat Pusat Kota">Dekat Pusat Kota</option>
												<option value="Pinggiran Kota">Pinggiran Kota</option>
											<?php elseif ($jenis_asset == 6 || $jenis_asset == 1 || $jenis_asset == 2 || $jenis_asset == 7) : ?>
												<option value="Dekat Pusat Kota">Dekat Pusat Kota</option>
												<option value="Strategis">Strategis</option>
												<option value="Terpencil">Terpencil</option>
											<?php endif ?>
											
										</select>
									</div>
								</div>
								<?php endif ?>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Marketability</label>
										<select class="form-control custom-select" name="marketability">
											<option value="">-- Pilih Marketability --</option>
											<?php foreach ($sifat_asset as $s): ?>
												<option value="<?= $s['id_sifat_asset'] ?>"><?= $s['sifat_asset'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Kawasan Properti</label>
										<select class="form-control custom-select" name="kawasan_properti">
											<option value="">-- Pilih Kawasan Properti --</option>
											<option value="Jauh">Jauh</option>
											<option value="Dekat">Dekat</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Lebar Jalan</label>
										<select class="form-control custom-select" name="lebar_jalan">
											<option value="">-- Pilih Lebar Jalan --</option>
											<option value="2 mtr">2 mtr</option>
											<option value="6 mtr">6 mtr</option>
											<option value="10 mtr">10 mtr</option>
											<option value="> 10 mtr">> 10 mtr</option>
										</select>
									</div>
								</div>
							</div>
							
							<?php if ($jenis_asset == 1 || $jenis_asset == 6 || $jenis_asset == 2 || $jenis_asset == 7) : ?>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Wilayah</label>
										<select class="form-control custom-select" name="wilayah">
											<option value="">-- Pilih Wilayah --</option>
											<option value="Perkotaan">Perkotaan</option>
											<option value="Pedesaan">Pedesaan</option>
										</select>
									</div>
								</div>
							</div>

							<?php endif; ?>

						</div>

						<div class="tab-pane p-20" id="bangunan" role="tabpanel">
							<div class="d-flex justify-content-center pt-3">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Jumlah Lantai</label>
										<input type="number" class="form-control" name="jumlah_lantai">
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane p-20" id="spek_bangunan" role="tabpanel">
							<div class="row pt-3">

								<?php if ($jenis_asset == 1 || $jenis_asset == 6 || $jenis_asset == 7) : ?>

									<div class="col-md-6">
										<div class="form-group has-success">
											<label class="control-label">Konstruksi</label>
											<select class="form-control custom-select" name="konstruksi">
												<option value="">-- Pilih Konstruksi --</option>
												<option value="Kayu">Kayu</option>
												<option value="Semi">Semi</option>
												<option value="Permanen">Permanen</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group has-success">
											<label class="control-label">Pondasi</label>
											<select class="form-control custom-select" name="pondasi">
												<option value="">-- Pilih Pondasi --</option>
												<option value="Semen Batu">Semen Batu</option>
												<option value="Beton">Beton</option>
											</select>
										</div>
									</div>

								<?php endif; ?>

									<div class="col-md-6">
										<div class="form-group has-success">
											<label class="control-label">Dinding</label>
											<select class="form-control custom-select" name="dinding">
												<option value="">-- Pilih Dinding --</option>
												<option value="Kayu">Kayu</option>
												<option value="Semi">Semi</option>
												<option value="Tembok">Tembok</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group has-success">
											<label class="control-label">Partisi</label>
											<select class="form-control custom-select" name="partisi">
												<option value="">-- Pilih Partisi --</option>
												<option value="Kayu">Kayu</option>
												<option value="Gipsum">Gipsum</option>
												<option value="Tembok">Tembok</option>
											</select>
										</div>
									</div>
								
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Lantai</label>
										<select class="form-control custom-select" name="lantai">
											<option value="">-- Pilih Lantai --</option>
											<option value="Granit">Granit</option>
											<option value="Keramik">Keramik</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Langit - langit</label>
										<select class="form-control custom-select" name="langit_langit">
											<option value="">-- Pilih Langit - langit --</option>
											<option value="Gipsum/GRC">Gipsum/GRC</option>
											<option value="Beton">Beton</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Jendela</label>
										<select class="form-control custom-select" name="jendela">
											<option value="">-- Pilih Jendela --</option>
											<option value="Kayu">Kayu</option>
											<option value="Beton">Beton</option>
											<option value="Alumunium">Alumunium</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Pintu</label>
										<select class="form-control custom-select" name="pintu">
											<option value="">-- Pilih Pintu --</option>
											<option value="Kayu">Kayu</option>
											<option value="Asbes">Asbes</option>
											<option value="Triplek">Triplek</option>
										</select>
									</div>
								</div>
							</div>
                            
							<?php if ($jenis_asset == 7) : ?>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Luas Bangunan</label>
										<div class="input-group mb-3">
											<input type="number" name="luas_bangunan" class="form-control" placeholder="Masukkan Luas Bangunan">

											<div class="input-group-prepend">
												<span class="input-group-text">m<sup>2</sup></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Atap</label>
										<select class="form-control custom-select" name="atap">
											<option value="">-- Pilih Atap --</option>
											<option value="Genteng">Genteng</option>
											<option value="Seng">Seng</option>
											<option value="Asbes">Asbes</option>
											<option value="Tradisional">Tradisional</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Kamar Tidur</label>
										<input type="number" class="form-control" name="kamar_tidur" placeholder="Masukkan Jumlah Kamar Tidur">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Toilet</label>
										<input type="number" class="form-control" name="toilet" placeholder="Masukkan Jumlah Toilet">
									</div>
								</div>
							</div>

							<?php else : ?>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Luas Bangunan</label>
										<div class="input-group mb-3">
											<input type="number" name="luas_bangunan" class="form-control" placeholder="Masukkan Luas Bangunan">

											<div class="input-group-prepend">
												<span class="input-group-text">m<sup>2</sup></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Ruang Tamu</label>
										<input type="number" class="form-control" name="ruang_tamu" placeholder="Masukkan Jumlah Ruang Tamu">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Ruang Keluarga</label>
										<input type="number" class="form-control" name="ruang_keluarga" placeholder="Masukkan Jumlah Ruang Keluarga">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Kamar Tidur</label>
										<input type="number" class="form-control" name="kamar_tidur" placeholder="Masukkan Jumlah Kamar Tidur">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Toilet</label>
										<input type="number" class="form-control" name="toilet" placeholder="Masukkan Jumlah Toilet">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Dapur</label>
										<input type="number" class="form-control" name="dapur" placeholder="Masukkan Jumlah Dapur">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Garasi</label>
										<select class="form-control custom-select" name="garasi">
											<option value="">-- Pilih --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Bangunan Lain</label>
										<select class="form-control custom-select" name="bangunan_lain">
											<option value="">-- Pilih --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
											<option value="Tempat Usaha">Tempat Usaha</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Atap</label>
										<select class="form-control custom-select" name="atap">
											<option value="">-- Pilih Atap --</option>
											<option value="Genteng">Genteng</option>
											<option value="Seng">Seng</option>
											<option value="Asbes">Asbes</option>
											<option value="Tradisional">Tradisional</option>
										</select>
									</div>
								</div>
							</div>

							<?php endif; ?>
						</div>
						<div class="tab-pane p-20" id="fasilitas" role="tabpanel">
							<div class="row pt-3">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Air</label>
										<select class="form-control custom-select" name="air">
											<option value="">-- Pilih --</option>
											<option value="Cukup">Cukup</option>
											<option value="Kurang">Kurang</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Listrik</label>
										<div class="input-group mb-3">
											<input type="number" name="listrik" class="form-control" placeholder="Masukkan Jumlah Listrik">

											<div class="input-group-prepend">
												<span class="input-group-text">Watt</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Telepon</label>
										<select class="form-control custom-select" name="telepon">
											<option value="">-- Pilih --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Pagar</label>
										<select class="form-control custom-select" name="pagar">
											<option value="">-- Pilih --</option>
											<option value="Kayu">Kayu</option>
											<option value="Tembok">Tembok</option>
											<option value="Besi">Besi</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Saluran Air</label>
										<select class="form-control custom-select" name="saluran_air">
											<option value="">-- Pilih --</option>
											<option value="PDAM">PDAM</option>
											<option value="Sumur/Pompa">Sumur/Pompa</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane p-20" id="ket_tambahan" role="tabpanel">
							<div class="d-flex justify-content-center pt-3">
								<div class="col-md-6">
									<div class="form-group has-success">
										<label class="control-label">Keterangan Tambahan</label>
										<textarea name="ket_tambahan" rows="4" class="form-control" placeholder="Masukkan Keterangan Tambahan"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane p-20" id="foto" role="tabpanel">
							<div class="row pt-3">
								
								<?php $no=0; foreach ($tampak_asset as $t): ?>

									<?php if ($t['id_tampak_asset'] != 6): ?>

									<div class="col-md-4">
										<div class="form-group has-success">

										<label class="control-label">Tampak <?= $t['tampak_asset'] ?></label>
										<input type="file" id="input-file-now" name="foto<?= $no ?>" class="dropify"/>
									
										</div>
									</div>

									<?php endif ?>

								<?php $no++; endforeach ?>
									
							</div>
						</div>
					</div>

					<?php elseif ($jenis_asset == 3 || $jenis_asset == 4 || $jenis_asset == 5) : ?>

						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data" role="tab">Data</a> </li>
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#foto_lainnya" role="tab">Foto</a> </li>
						</ul>
						
						<div class="tab-content tabcontent-border"> 
							<div class="tab-pane p-20 active" id="data" role="tabpanel">

							<?php if ($jenis_asset == 3): ?>

							<div class="row pt-3">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Nomor Polisi</label>
										<input type="text" class="form-control" name="nomor_polisi" placeholder="Masukkan nomor polisi">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Nama Pemilik STNK</label>
										<input name="nama_pemilik_stnk" class="form-control" rows="3" placeholder="Masukkan nama pemilik STNK">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="alamat">Alamat Agunan</label>
										<textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat Agunan" rows="2"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="no_rangka">Nomor Rangka</label>
										<input type="text" name="no_rangka" class="form-control" id="no_rangka" placeholder="Masukkan Nomor Rangka">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="no_mesin">Nomor Mesin</label>
										<input type="text" name="no_mesin" class="form-control" id="no_mesin" placeholder="Masukkan Nomor Mesin">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="warna_kdr">Warna Kendaraan</label>
										<input type="text" name="warna_kdr" class="form-control" id="warna_kdr" placeholder="Masukkan Warna Kendaraan">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="jenis_kendaraan">Jenis Kendaraan</label>
										<input type="text" name="jenis_kendaraan" class="form-control" id="jenis_kendaraan" placeholder="Masukkan Jenis Kendaraan">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="merk">Merk</label>
										<input type="text" name="merk" class="form-control" id="merk" placeholder="Masukkan Merk">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="type_kdr">Type</label>
										<input type="text" name="type_kdr" class="form-control" id="type_kdr" placeholder="Masukkan Type Kendaraan">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="thn_buat">Tahun Pembuatan</label>
										<input type="text" name="thn_buat" class="form-control" id="thn_buat" placeholder="Masukkan Tahun Pembuatan">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="cc">Silinder/CC</label>
										<input type="text" name="cc" class="form-control" id="cc" placeholder="Masukkan Silinder/CC">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="bahan_bakar">Bahan Bakar</label>
										<input type="text" name="bahan_bakar" class="form-control" id="bahan_bakar" placeholder="Masukkan Bahan Bakar">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="warna_tnkb">Warna TNKB</label>
										<select name="warna_tnkb" class="form-control custom-select">
											<option value="">-- Pilih --</option>
											<option value="Plat Hitam">Plat Hitam</option>
											<option value="Plat Kuning">Plat Kuning</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="pajak_berlaku">Pajak Berlaku s/d</label>
										<div class="input-group">
											<input type="text" class="form-control mdate" name="pajak_berlaku" placeholder="Pajak Berlaku" readonly>
											<div class="input-group-append">
												<span class="input-group-text"><i class="icon-calender"></i></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="status_milik">Status Kepemilikan</label>
										<select name="status_milik" class="form-control custom-select">
											<option value="">-- Pilih --</option>
											<?php foreach ($status_milik as $s): ?>
												<option value="<?= $s['id'] ?>"><?= $s['status_milik'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="bpkb">BPKB</label>
										<select name="bpkb" class="form-control custom-select">
											<option value="">-- Pilih --</option>
											<option value="Ada">Ada</option>
											<option value="Tidak Ada">Tidak Ada</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Nomor BPKB</label>
										<input type="text" name="nomor_bpkb" placeholder="Masukkan nomor BPKB" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="harga">Harga</label>
										<div class="input-group">
											<div class="input-group-prepend">
											<span class="input-group-text">Rp.</span>
											</div>
											<input type="text" name="total_harga" class="form-control" id="rupiah" placeholder="Masukkan Harga">

										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="informasi">Informasi Tambahan</label>
										<textarea class="form-control" name="ket_tambahan" placeholder="Masukkan Informasi Tambahan"></textarea>
									</div>
								</div>
							</div>

							<?php elseif ($jenis_asset == 4): ?>
								<div class="row pt-3">
									<div class="col-md-6">
										<div class="form-group">
											<label>Dokumen</label>
											<input type="text" name="dokumen" placeholder="Masukkan nama dokumen" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="harga">Harga</label>
											<div class="input-group">
												<div class="input-group-prepend">
												<span class="input-group-text">Rp.</span>
												</div>
												<input type="text" name="total_harga" class="form-control" id="rupiah" placeholder="Masukkan Harga">

											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="informasi">Alamat</label>
											<textarea class="form-control" name="alamat" placeholder="Masukkan Alamat"></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="informasi">Informasi Tambahan</label>
											<textarea class="form-control" name="ket_tambahan" placeholder="Masukkan Informasi Tambahan"></textarea>
										</div>
									</div>
								</div>
							<?php elseif ($jenis_asset == 5): ?>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="informasi">Alamat</label>
											<textarea class="form-control" name="alamat" placeholder="Masukkan Alamat"></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="informasi">Keterangan</label>
											<textarea class="form-control" name="ket_tambahan" placeholder="Masukkan Informasi Tambahan"></textarea>
										</div>
									</div>
								</div>
							<?php endif; ?>
							</div>

							<input type="hidden" name="ini_foto" value="1">

							<div class="tab-pane p-20" id="foto_lainnya" role="tabpanel">
								<div class="d-flex justify-content-center">
									<div class="col-md-6">
									<label class="text-info">Upload 1 foto atau lebih</label>
										<input type="file" name="foto_banyak[]" class="demo form-control" multiple data-jpreview-container="#preview-container2" /><br>
										<div id="preview-container2" 
											class="jpreview-container">
										</div>
									</div>
								</div>
							</div>
						</div>
						
					<?php endif; ?>
	
				</div>
				

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>