<style type="text/css">
    img{
        cursor: pointer;
    }
</style>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">Asset <?= ucwords($jenis_asset) ?> Debitur <?= ucwords(strtolower($nama_debitur)) ?></h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?= base_url() ?>">Assets Care</a></li>
                      <li class="breadcrumb-item"><a href="<?= base_url('katalog') ?>">Katalog</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Katalog <?= ucwords($jenis_asset) ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid ">

    <div class="row mb-2">
      <div class="col-md-12">
      <?php if ($this->uri->segment(6) == null): ?>
        <a href="<?= base_url() ?>katalog/asset/<?= $id_jenis_asset ?>"><button class="btn waves-effect waves-light btn-success">Kembali</button></a>
        <a href="<?= base_url() ?>katalog/detail_asset/<?= $id_jenis_asset ?>/<?= $id_debitur ?>/<?= $id_dokumen_asset ?>/edit"><button class="btn waves-effect waves-light btn-warning pull-right">Ubah Data</button></a>
        <?php elseif ($this->uri->segment(6) == 'det_debitur'): ?>

        <?php if ($id_debitur != 0): ?>
          <a href="<?= base_url() ?>agunan/detail_agunan/<?= $id_debitur ?>">
        <?php else: ?>
          <a href="<?= base_url() ?>agunan/non_kelolaan">
        <?php endif ?>


        <button class="btn waves-effect waves-light btn-success">Kembali</button></a>  
        <a href="<?= base_url() ?>katalog/detail_asset/<?= $id_jenis_asset ?>/<?= $id_debitur ?>/<?= $id_dokumen_asset ?>/edit_deb"><button class="btn waves-effect waves-light btn-warning pull-right">Ubah Data</button></a>
        <?php else: ?>
          <?php if ($this->uri->segment(6) == 'edit_deb'): ?>
            <a href="<?= base_url() ?>katalog/detail_asset/<?= $id_jenis_asset ?>/<?= $id_debitur ?>/<?= $id_dokumen_asset ?>/det_debitur"><button class="btn waves-effect waves-light btn-success">Kembali</button></a>
          <?php else: ?>
            <a href="<?= base_url() ?>katalog/detail_asset/<?= $id_jenis_asset ?>/<?= $id_debitur ?>/<?= $id_dokumen_asset ?>"><button class="btn waves-effect waves-light btn-success">Kembali</button></a>
          <?php endif ?>
        <?php endif ?>
      </div>
    </div>

<?= $this->session->flashdata('pesan'); ?>

<?php if (($aksi == 'tampil') || ($aksi == 'det_debitur')): ?>

  <!-- awal detail form asset -->

  <div class="row mt-3">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header bg-info">
              <h4 class="text-white mb-0">Detail</h4>
            </div>
            <div class="card-body">

  <?php if ($id_jenis_asset == 8 || $id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 2 || $id_jenis_asset == 7 || $id_jenis_asset == 9): ?>
						
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
      <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 7) : ?>

      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bangunan" role="tab">Bangunan</a> </li>

      <?php endif; ?>

      <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 8 || $id_jenis_asset == 7) : ?>
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#spek_bangunan" role="tab">Spesifikasi Bangunan</a> </li>
      <?php endif; ?>
      
      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#fasilitas" role="tab">Fasilitas</a> </li>
      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ket_tambahan" role="tab">Keterangan Tambahan</a> </li>
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
                  <textarea name="alamat" id="alamat" class="form-control" rows="3" disabled><?= $detail['alamat'] ?></textarea>
                </div>
              </div>
              <!--/span-->
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Yang Dijumpai</label>
                  <textarea name="yang_dijumpai" id="yang_dijumpai" class="form-control" rows="3" disabled><?= $detail['bertemu'] ?></textarea>
                </div>
              </div>
              <!--/span-->
            </div>
          <?php else: ?>
            <div class="row pt-3">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Atas Nama</label>
                  <input type="text" name="atas_nama" class="form-control" value="<?= $detail['atas_nama'] ?>" disabled>
                </div>
              </div>
            </div>
          <?php endif; ?>
          
          <!--/row-->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group has-success">
                <label class="control-label">Status PIC</label>
                <select class="form-control custom-select" name="status_pic" disabled>
                  <option value="">-- Pilih Status PIC --</option>
                  <option value="Debitur" <?= ($detail['status_pic'] == 'Debitur') ? 'selected' : '' ?>>Debitur</option>
                  <option value="Keluarga" <?= ($detail['status_pic'] == 'Keluarga') ? 'selected' : '' ?>>Keluarga</option>
                  <option value="Pihak Lain" <?= ($detail['status_pic'] == 'Pihak Lain') ? 'selected' : '' ?>>Pihak Lain</option>
                </select></div>
            </div>
            <!--/span-->
            <div class="col-md-6">
              <div class="form-group has-success">
                <label class="control-label">Status Agunan</label>
                <select class="form-control custom-select" name="status_agunan" disabled>
                  <option value="">-- Pilih Status Agunan --</option>
                  <?php foreach ($status_milik as $s): ?>
                    <option value="<?= $s['id'] ?>" <?= ($detail['status_milik'] == $s['id']) ? 'selected' : '' ?>><?= $s['status_milik'] ?></option>
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
                <select class="form-control custom-select" name="batas_utara" disabled>
                  <option value="">-- Pilih Batas Utara --</option>
                  <option value="Rumah" <?= ($detail['batas_utara'] == 'Rumah') ? 'selected' : '' ?>>Rumah</option>
                  <option value="Tanah Kosong" <?= ($detail['batas_utara'] == 'Tanah Kosong') ? 'selected' : '' ?>>Tanah Kosong</option>
                  <option value="Jalan" <?= ($detail['batas_utara'] == 'Jalan') ? 'selected' : '' ?>>Jalan</option>
                </select></div>
            </div>
            <!--/span-->
            <div class="col-md-6">
              <div class="form-group has-success">
                <label class="control-label">Batas Selatan</label>
                <select class="form-control custom-select" name="batas_selatan" disabled>
                  <option value="">-- Pilih Batas Selatan --</option>
                  <option value="Rumah" <?= ($detail['batas_selatan'] == 'Rumah') ? 'selected' : '' ?>>Rumah</option>
                  <option value="Tanah Kosong" <?= ($detail['batas_selatan'] == 'Tanah Kosong') ? 'selected' : '' ?>>Tanah Kosong</option>
                  <option value="Jalan" <?= ($detail['batas_selatan'] == 'Jalan') ? 'selected' : '' ?>>Jalan</option>
                </select></div>
            </div>
            <!--/span-->
          </div>
          <!--/row-->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group has-success">
                <label class="control-label">Batas Barat</label>
                <select class="form-control custom-select" name="batas_barat" disabled>
                  <option value="">-- Pilih Batas Utara --</option>
                  <option value="Rumah" <?= ($detail['batas_utara'] == 'Rumah') ? 'selected' : '' ?>>Rumah</option>
                  <option value="Tanah Kosong" <?= ($detail['batas_utara'] == 'Tanah Kosong') ? 'selected' : '' ?>>Tanah Kosong</option>
                  <option value="Jalan" <?= ($detail['batas_utara'] == 'Jalan') ? 'selected' : '' ?>>Jalan</option>
                </select></div>
            </div>
            <!--/span-->
            <div class="col-md-6">
              <div class="form-group has-success">
                <label class="control-label">Batas Timur</label>
                <select class="form-control custom-select" name="batas_timur" disabled>
                  <option value="">-- Pilih Batas Timur --</option>
                  <option value="Rumah" <?= ($detail['batas_timur'] == 'Rumah') ? 'selected' : '' ?>>Rumah</option>
                  <option value="Tanah Kosong" <?= ($detail['batas_timur'] == 'Tanah Kosong') ? 'selected' : '' ?>>Tanah Kosong</option>
                  <option value="Jalan" <?= ($detail['batas_timur'] == 'Jalan') ? 'selected' : '' ?>>Jalan</option>
                </select></div>
            </div>
            <!--/span-->
          </div>
          <!--/row-->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group has-success">
                <label class="control-label">Status Dokumen</label>
                <select class="form-control custom-select" name="dokumen" disabled>
                  <option value="">-- Pilih Status Dokumen --</option>
                  <option value="SHM/SHGB" <?= ($detail['jenis_dok'] == 'SHM/SHGB') ? 'selected' : '' ?>>SHM/SHGB</option>
                  <option value="SHRSS" <?= ($detail['jenis_dok'] == 'SHRSS') ? 'selected' : '' ?>>SHRSS</option>
                  <option value="Girik" <?= ($detail['jenis_dok'] == 'Girik') ? 'selected' : '' ?>>Girik</option>
                  <option value="AJB" <?= ($detail['jenis_dok'] == 'AJB') ? 'selected' : '' ?>>AJB</option>
                  <option value="Akta Hibah" <?= ($detail['jenis_dok'] == 'Akta Hibah') ? 'selected' : '' ?>>Akta Hibah</option>
                </select></div>
            </div>
            <div class="col-md-6">
              <div class="form-group has-success">
                <label class="control-label">Total Harga</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                  <span class="input-group-text">Rp.</span>
                  </div>
                  <input type="text" name="total_harga" class="form-control" id="rupiah" value="<?= number_format($detail['total_harga'],0,'.','.') ?>" disabled>

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
              <select class="form-control custom-select" name="lokasi" disabled>
                <option value="">-- Pilih Lokasi --</option>
                <option value="Pusat kota" <?= ($detail['lokasi'] == 'Pusat kota') ? 'selected' : '' ?>>Pusat Kota</option>
                <option value="Pinggiran kota" <?= ($detail['lokasi'] == 'Pinggiran kota') ? 'selected' : '' ?>>Pinggiran Kota</option>
              </select></div>
          </div>
          <!--/span-->
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Kepadatan Bangunan</label>
              <select class="form-control custom-select" name="kepadatan_bangunan" disabled>
                <option value="">-- Pilih Kepadatan Bangunan --</option>
                <option value="> 75%" <?= ($detail['kepadatan_bangunan'] == '> 75%') ? 'selected' : '' ?>>> 75%</option>
                <option value="25% - 75%" <?= ($detail['kepadatan_bangunan'] == '25% - 75%') ? 'selected' : '' ?>>25% - 75%</option>
                <option value="< 25%" <?= ($detail['kepadatan_bangunan'] == '< 25%') ? 'selected' : '' ?>>< 25%</option>
              </select></div>
          </div>
          <!--/span-->
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Pertumbuhan Bangunan</label>
              <select class="form-control custom-select" name="pertumbuhan_bangunan" disabled>
                <option value="">-- Pilih Pertumbuhan Bangunan --</option>
                <option value="Cepat" <?= ($detail['pertumbuhan_bangunan'] == 'Cepat') ? 'selected' : '' ?>>Cepat</option>
                <option value="Stabil" <?= ($detail['pertumbuhan_bangunan'] == 'Stabil') ? 'selected' : '' ?>>Stabil</option>
                <option value="Lambat" <?= ($detail['pertumbuhan_bangunan'] == 'Lambat') ? 'selected' : '' ?>>Lambat</option>
              </select></div>
          </div>
          <!--/span-->
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Harga Tanah</label>
              <select class="form-control custom-select" name="harga_tanah" disabled>
                <option value="">-- Pilih Harga Tanah --</option>
                <option value="Naik Cepat" <?= ($detail['h_tanah'] == 'Naik Cepat') ? 'selected' : '' ?>>Naik Cepat</option>
                <option value="Stabil" <?= ($detail['h_tanah'] == 'Stabil') ? 'selected' : '' ?>>Stabil</option>
                <option value="Gejala Turun" <?= ($detail['h_tanah'] == 'Gejala Turun') ? 'selected' : '' ?>>Gejala Turun</option>
              </select></div>
          </div>
          <!--/span-->
        </div>
      </div>
      <div class="tab-pane p-20" id="analisa_lingkungan" role="tabpanel">
        
        <?php if ($id_jenis_asset == 9) : ?>

          <div class="row pt-3">
            <div class="col-md-6">
              <div class="form-group has-success">
                <label class="control-label">Aksesbilitas</label>
                <select class="form-control custom-select" name="aksesbilitas" disabled>
                  <option value="">-- Pilih Aksesbilitas --</option>
                  <option value="Baik" <?= ($detail['aksesbilitas'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                  <option value="Cukup" <?= ($detail['aksesbilitas'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                  <option value="Kurang" <?= ($detail['aksesbilitas'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                </select></div>
            </div>
            <div class="col-md-6">
              <div class="form-group has-success">
                <label class="control-label">Transportasi</label>
                <select class="form-control custom-select" name="transportasi" disabled>
                  <option value="">-- Pilih Transportasi --</option>
                  <option value="Baik" <?= ($detail['aksesbilitas'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                  <option value="Cukup" <?= ($detail['aksesbilitas'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                  <option value="Kurang" <?= ($detail['aksesbilitas'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                </select>
              </div>
            </div>
          </div>

        <?php else : ?>

        <div class="row pt-3">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Aksesbilitas</label>
              <select class="form-control custom-select" name="aksesbilitas" disabled>
                <option value="">-- Pilih Aksesbilitas --</option>
                <option value="Baik" <?= ($detail['aksesbilitas'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                <option value="Cukup" <?= ($detail['aksesbilitas'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                <option value="Kurang" <?= ($detail['aksesbilitas'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
              </select></div>
          </div>
          <!--/span-->
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Pusat Perbelanjaan</label>
              <select class="form-control custom-select" name="pusat_belanja" disabled>
                <option value="">-- Pilih Perbelanjaan --</option>
                <option value="Dekat" <?= ($detail['pusat_belanja'] == 'Dekat') ? 'selected' : '' ?>>Dekat</option>
                <option value="Jauh" <?= ($detail['pusat_belanja'] == 'Jauh') ? 'selected' : '' ?>>Jauh</option>
              </select></div>
          </div>
          <!--/span-->
        </div>
        <div class="row">
          <?php if ($id_jenis_asset != 7) : ?>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Sekolah</label>
              <select class="form-control custom-select" name="sekolah" disabled>
                <option value="">-- Pilih Sekolah --</option>
                <option value="Ada" <?= ($detail['sekolah'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Jauh" <?= ($detail['sekolah'] == 'Jauh') ? 'selected' : '' ?>>Jauh</option>
              </select></div>
          </div>
          <?php endif; ?>
          <!--/span-->
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Transportasi</label>
              <select class="form-control custom-select" name="transportasi" disabled>
                <option value="">-- Pilih Transportasi --</option>
                <option value="Baik" <?= ($detail['aksesbilitas'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                <option value="Cukup" <?= ($detail['aksesbilitas'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                <option value="Kurang" <?= ($detail['aksesbilitas'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
              </select>
              </div>
          </div>
          <!--/span-->
        </div>
        <div class="row">
            <?php if ($id_jenis_asset != 7) : ?>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Rekreasi</label>
              <select class="form-control custom-select" name="rekreasi" disabled>
                <option value="">-- Pilih Rekreasi --</option>
                <option value="Ada" <?= ($detail['rekreasi'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['rekreasi'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select></div>
          </div>
          <?php endif; ?>
        </div>

        <?php endif; ?>
      </div>
      <div class="tab-pane p-20" id="kawasan" role="tabpanel">
        <div class="d-flex justify-content-center pt-3">
          <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6) : ?>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Mayaoritas Data Hunian</label>
              <select class="form-control custom-select" name="mayor_data_hunian" disabled>
                <option value="">-- Pilih Mayaoritas Data Hunian --</option>
                <option value="Niaga" <?= ($detail['data_hunian'] == 'Niaga') ? 'selected' : '' ?>>Niaga</option>
                <option value="Pemilikan" <?= ($detail['data_hunian'] == 'Pemilikan') ? 'selected' : '' ?>>Pemilikan</option>
                <option value="Penyewaan" <?= ($detail['data_hunian'] == 'Penyewaan') ? 'selected' : '' ?>>Penyewaan</option>
                <option value="Rumah Dinas" <?= ($detail['data_hunian'] == 'Rumah Dinas') ? 'selected' : '' ?>>Rumah Dinas</option>
                <option value="Kosong" <?= ($detail['data_hunian'] == 'Kosong') ? 'selected' : '' ?>>Kosong</option>
              </select></div>
          </div>
          <?php endif; ?>
          <?php if ($id_jenis_asset == 8 || $id_jenis_asset == 2) : ?>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Mayaoritas Data Hunian</label>
              <select class="form-control custom-select" name="mayor_data_hunian" disabled>
                <option value="">-- Pilih Mayaoritas Data Hunian --</option>
                <option value="Pemilikan" <?= ($detail['data_hunian'] == 'Pemilikan') ? 'selected' : '' ?>>Pemilikan</option>
                <option value="Penyewaan" <?= ($detail['data_hunian'] == 'Penyewaan') ? 'selected' : '' ?>>Penyewaan</option>
                <option value="Rumah Dinas" <?= ($detail['data_hunian'] == 'Rumah Dinas') ? 'selected' : '' ?>>Rumah Dinas</option>
                <option value="Kosong" <?= ($detail['data_hunian'] == 'Kosong') ? 'selected' : '' ?>>Kosong</option>
              </select></div>
          </div>
          <?php endif; ?>
          <?php if ($id_jenis_asset == 9) : ?>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Mayaoritas Data Hunian</label>
              <select class="form-control custom-select" name="mayor_data_hunian" disabled>
                <option value="">-- Pilih Mayaoritas Data Hunian --</option>
                <option value="Pabrik" <?= ($detail['data_hunian'] == 'Pabrik') ? 'selected' : '' ?>>Pabrik</option>
                <option value="Pergudangan" <?= ($detail['data_hunian'] == 'Pergudangan') ? 'selected' : '' ?>>Pergudangan</option>
                <option value="Hunian/Pemukiman" <?= ($detail['data_hunian'] == 'Hunian/Pemukiman') ? 'selected' : '' ?>>Hunian/Pemukiman</option>
                <option value="Sawah" <?= ($detail['data_hunian'] == 'Sawah') ? 'selected' : '' ?>>Sawah</option>
                <option value="Lahan Kosong" <?= ($detail['data_hunian'] == 'Lahan Kosong') ? 'selected' : '' ?>>Lahan Kosong</option>
              </select></div>
          </div>
          <?php endif; ?>
          <?php if ($id_jenis_asset == 7) : ?>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Mayaoritas Data Hunian</label>
              <select class="form-control custom-select" name="mayor_data_hunian" disabled>
                <option value="">-- Pilih Mayaoritas Data Hunian --</option>
                <option value="Perkantoran"  <?= ($detail['data_hunian'] == 'Perkantoran') ? 'selected' : '' ?>>Perkantoran</option>
                <option value="Sekolah"  <?= ($detail['data_hunian'] == 'Sekolah') ? 'selected' : '' ?>>Sekolah</option>
                <option value="Komplek Perumahan"  <?= ($detail['data_hunian'] == 'Komplek Perumahan') ? 'selected' : '' ?>>Komplek Perumahan</option>
                <option value="Pasar"  <?= ($detail['data_hunian'] == 'Pasar') ? 'selected' : '' ?>>Pasar</option>
                <option value="Hunian"  <?= ($detail['data_hunian'] == 'Hunian') ? 'selected' : '' ?>>Hunian</option>
                <option value="Jalan"  <?= ($detail['data_hunian'] == 'Jalan') ? 'selected' : '' ?>>Jalan</option>
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
              <select class="form-control custom-select" name="jaringan_listrik" disabled>
                <option value="">-- Pilih --</option>
                <option value="Ada" <?= ($detail['jaringan_listrik'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['jaringan_listrik'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Jaringan Air Bersih</label>
              <select class="form-control custom-select" name="jaringan_air_bersih" disabled>
                <option value="">-- Pilih --</option>
                <option value="Ada" <?= ($detail['jaringan_air_bersih'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['jaringan_air_bersih'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Jaringan Telepon</label>
              <select class="form-control custom-select" name="jaringan_telepon" disabled>
                <option value="">-- Pilih --</option>
                <option value="Ada" <?= ($detail['jaringan_telepon'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['jaringan_telepon'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Jaringan Gas</label>
              <select class="form-control custom-select" name="jaringan_gas" disabled>
                <option value="">-- Pilih --</option>
                <option value="Ada" <?= ($detail['jaringan_gas'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['jaringan_gas'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Penampungan Sampah</label>
              <select class="form-control custom-select" name="penampungan_sampah" disabled>
                <option value="">-- Pilih --</option>
                <option value="Ada" <?= ($detail['penampungan_sampah'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['penampungan_sampah'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Jalan Masuk</label>
              <select class="form-control custom-select" name="jalan_masuk" disabled>
                <option value="">-- Pilih --</option>
                <option value="Ada" <?= ($detail['jalan_masuk'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['jalan_masuk'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Jalan Depan Objek</label>
              <select class="form-control custom-select" name="jalan_depan_objek" disabled>
                <option value="">-- Pilih --</option>
                <option value="Ada" <?= ($detail['jalan_depan_objek'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['jalan_depan_objek'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Saluran Air</label>
              <select class="form-control custom-select" name="saluran_air" disabled>
                <option value="">-- Pilih --</option>
                <option value="Ada" <?= ($detail['saluran_air'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['saluran_air'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Trotoar</label>
              <select class="form-control custom-select" name="trotoar" disabled>
                <option value="">-- Pilih --</option>
                <option value="Ada" <?= ($detail['trotoar'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['trotoar'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane p-20" id="topografi" role="tabpanel">
          <?php if ($id_jenis_asset != 7) : ?>
        <div class="row pt-3">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Penghijauan</label>
              <select class="form-control custom-select" name="penghijauan" disabled>
                <option value="">-- Pilih Penghijauan --</option>
                <option value="Rimbun" <?= ($detail['penghijauan'] == 'Rimbun') ? 'selected' : '' ?>>Rimbun</option>
                <option value="Gersang" <?= ($detail['penghijauan'] == 'Gersang') ? 'selected' : '' ?>>Gersang</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Penataan Lingkungan</label>
              <select class="form-control custom-select" name="penataan_lingkungan" disabled>
                <option value="">-- Pilih Penataan Lingkungan --</option>
                <option value="Baik" <?= ($detail['penataan_lingkungan'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                <option value="Kurang" <?= ($detail['penataan_lingkungan'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
              </select>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Resiko Banjir</label>
              <select class="form-control custom-select" name="resiko_banjir" disabled>
                <option value="">-- Pilih Resiko Banjir --</option>
                <option value="Aman" <?= ($detail['resiko_banjir'] == 'Aman') ? 'selected' : '' ?>>Aman</option>
                <option value="Rentan" <?= ($detail['resiko_banjir'] == 'Rentan') ? 'selected' : '' ?>>Rentan</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Tinggi Tanah Dari Jalan</label>
              <select class="form-control custom-select" name="tinggi_tanah" disabled>
                <option value="">-- Pilih Tinggi Tanah Dari Jalan --</option>
                <option value="Rendah" <?= ($detail['tinggi_tanah'] == 'Rendah') ? 'selected' : '' ?>>Rendah</option>
                <option value="Tinggi" <?= ($detail['tinggi_tanah'] == 'Tinggi') ? 'selected' : '' ?>>Tinggi</option>
              </select>
            </div>
          </div>
        </div>

        <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 2) : ?>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Tusuk Sate</label>
              <select class="form-control custom-select" name="tusuk_sate" disabled>
                <option value="">-- Pilih --</option>
                <option value="Ada" <?= ($detail['tusuk_sate'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['tusuk_sate'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Sutet</label>
              <select class="form-control custom-select" name="sutet" disabled>
                <option value="">-- Pilih --</option>
                <option value="Ada" <?= ($detail['tusuk_sate'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['tusuk_sate'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Jenis Tanah</label>
              <select class="form-control custom-select" name="jenis_tanah" disabled>
                <option value="">-- Pilih Jenis Tanah --</option>
                <option value="Subur" <?= ($detail['jenis_tanah'] == 'Subur') ? 'selected' : '' ?>>Subur</option>
                <option value="Tandus" <?= ($detail['jenis_tanah'] == 'Tandus') ? 'selected' : '' ?>>Tandus</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Lampu Jalan</label>
              <select class="form-control custom-select" name="lampu_jalan" disabled>
                <option value="">-- Pilih Lampu Jalan --</option>
                <option value="Ada" <?= ($detail['lampu_jalan'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['lampu_jalan'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select>
            </div>
          </div>
        </div>

        <?php endif; ?>

        <?php if ($id_jenis_asset == 8 || $id_jenis_asset == 7) : ?>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Lampu Jalan</label>
              <select class="form-control custom-select" name="lampu_jalan" disabled>
                <option value="">-- Pilih Lampu Jalan --</option>
                <option value="Ada" <?= ($detail['lampu_jalan'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['lampu_jalan'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
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
                <input type="number" name="nilai_taksiran" class="form-control" id="rupiah" value="<?= number_format($detail['nilai_taksiran']) ?>" disabled>

              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Bentuk Tanah</label>
              <select class="form-control custom-select" name="bentuk_tanah" disabled>
                <option value="">-- Pilih Bentuk Tanah --</option>
                <option value="Datar" <?= ($detail['bentuk_tanah'] == 'Datar') ? 'selected' : '' ?>>Datar</option>
                <option value="Miring" <?= ($detail['bentuk_tanah'] == 'Miring') ? 'selected' : '' ?>>Miring</option>
                <option value="Tidak Rata" <?= ($detail['bentuk_tanah'] == 'Tidak Rata') ? 'selected' : '' ?>>Tidak Rata</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Letak Tanah</label>
              <select class="form-control custom-select" name="letak_tanah" disabled>
                <option value="">-- Pilih Letak Tanah --</option>
                <option value="Strategis" <?= ($detail['letak_tanah'] == 'Strategis') ? 'selected' : '' ?>>Strategis</option>
                <option value="Biasa" <?= ($detail['letak_tanah'] == 'Biasa') ? 'selected' : '' ?>>Biasa</option>
                <option value="Tidak Strategis" <?= ($detail['letak_tanah'] == 'Tidak Strategis') ? 'selected' : '' ?>>Tidak Strategis</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Luas Tanah</label>
              <div class="input-group mb-3">
              <input type="number" name="luas_tanah" class="form-control" value="<?= $detail['l_tanah'] ?>" disabled>

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
          <?php if ($id_jenis_asset != 9) : ?>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Lokasi</label>
              <select class="form-control custom-select" name="lokasi_cat" disabled>
                <option value="">-- Pilih Lokasi --</option>
                <?php if ($id_jenis_asset == 8) : ?>
                  <option value="Dekat Pusat Kota" <?= ($detail['lokasi_cat'] == 'Dekat Pusat Kota') ? 'selected' : '' ?>>Dekat Pusat Kota</option>
                  <option value="Pinggiran Kota" <?= ($detail['lokasi_cat'] == 'Pinggiran Kota') ? 'selected' : '' ?>>Pinggiran Kota</option>
                <?php elseif ($id_jenis_asset == 6 || $id_jenis_asset == 1 || $id_jenis_asset == 2 || $id_jenis_asset == 7) : ?>
                  <option value="Dekat Pusat Kota" <?= ($detail['lokasi_cat'] == 'Dekat Pusat Kota') ? 'selected' : '' ?>>Dekat Pusat Kota</option>
                  <option value="Strategis" <?= ($detail['lokasi_cat'] == 'Strategis') ? 'selected' : '' ?>>Strategis</option>
                  <option value="Terpencil" <?= ($detail['lokasi_cat'] == 'Terpencil') ? 'selected' : '' ?>>Terpencil</option>
                <?php endif ?>
                
              </select>
            </div>
          </div>
          <?php endif ?>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Marketability</label>
              <select class="form-control custom-select" name="marketability" disabled>
                <option value="">-- Pilih Marketability --</option>
                <?php foreach ($sifat_asset as $s): ?>
                  <option value="<?= $s['id_sifat_asset'] ?>" <?= $detail['id_sifat_asset'] == $s['id_sifat_asset'] ? 'selected' : '' ?>><?= $s['sifat_asset'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Kawasan Properti</label>
              <select class="form-control custom-select" name="kawasan_properti" disabled>
                <option value="">-- Pilih Kawasan Properti --</option>
                <option value="Jauh" <?= ($detail['kawasan_property'] == 'Jauh') ? 'selected' : '' ?>>Jauh</option>
                <option value="Dekat" <?= ($detail['kawasan_property'] == 'Dekat') ? 'selected' : '' ?>>Dekat</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Lebar Jalan</label>
              <select class="form-control custom-select" name="lebar_jalan" disabled>
                <option value="">-- Pilih Lebar Jalan --</option>
                <option value="2 mtr" <?= ($detail['lebar_jalan'] == '2 mtr') ? 'selected' : '' ?>>2 mtr</option>
                <option value="6 mtr" <?= ($detail['lebar_jalan'] == '6 mtr') ? 'selected' : '' ?>>6 mtr</option>
                <option value="10 mtr" <?= ($detail['lebar_jalan'] == '10 mtr') ? 'selected' : '' ?>>10 mtr</option>
                <option value="> 10 mtr" <?= ($detail['lebar_jalan'] == '> 10 mtr') ? 'selected' : '' ?>>> 10 mtr</option>
              </select>
            </div>
          </div>
        </div>
        
        <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 2 || $id_jenis_asset == 7) : ?>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Wilayah</label>
              <select class="form-control custom-select" name="wilayah" disabled>
                <option value="">-- Pilih Wilayah --</option>
                <option value="Perkotaan" <?= ($detail['wilayah'] == 'Perkotaan') ? 'selected' : '' ?>>Perkotaan</option>
                <option value="Pedesaan" <?= ($detail['wilayah'] == 'Pedesaan') ? 'selected' : '' ?>>Pedesaan</option>
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
              <input type="number" class="form-control" name="jumlah_lantai" value="<?= $detail['jml_lantai'] ?>" disabled>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane p-20" id="spek_bangunan" role="tabpanel">
        <div class="row pt-3">

          <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 7) : ?>

            <div class="col-md-6">
              <div class="form-group has-success">
                <label class="control-label">Konstruksi</label>
                <select class="form-control custom-select" name="konstruksi" disabled>
                  <option value="">-- Pilih Konstruksi --</option>
                  <option value="Kayu" <?= ($detail['konstruksi'] == 'Kayu') ? 'selected' : '' ?>>Kayu</option>
                  <option value="Semi" <?= ($detail['konstruksi'] == 'Semi') ? 'selected' : '' ?>>Semi</option>
                  <option value="Permanen" <?= ($detail['konstruksi'] == 'Permanen') ? 'selected' : '' ?>>Permanen</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group has-success">
                <label class="control-label">Pondasi</label>
                <select class="form-control custom-select" name="pondasi" disabled>
                  <option value="">-- Pilih Pondasi --</option>
                  <option value="Semen Batu" <?= ($detail['pondasi'] == 'Semen Batu') ? 'selected' : '' ?>>Semen Batu</option>
                  <option value="Beton" <?= ($detail['pondasi'] == 'Beton') ? 'selected' : '' ?>>Beton</option>
                </select>
              </div>
            </div>

          <?php endif; ?>

            <div class="col-md-6">
              <div class="form-group has-success">
                <label class="control-label">Dinding</label>
                <select class="form-control custom-select" name="dinding" disabled>
                  <option value="">-- Pilih Dinding --</option>
                  <option value="Kayu" <?= ($detail['dinding'] == 'Kayu') ? 'selected' : '' ?>>Kayu</option>
                  <option value="Semi" <?= ($detail['dinding'] == 'Semi') ? 'selected' : '' ?>>Semi</option>
                  <option value="Tembok" <?= ($detail['dinding'] == 'Tembok') ? 'selected' : '' ?>>Tembok</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group has-success">
                <label class="control-label">Partisi</label>
                <select class="form-control custom-select" name="partisi" disabled>
                  <option value="">-- Pilih Partisi --</option>
                  <option value="Kayu" <?= ($detail['dinding'] == 'Kayu') ? 'selected' : '' ?>>Kayu</option>
                  <option value="Gipsum" <?= ($detail['dinding'] == 'Gipsum') ? 'selected' : '' ?>>Semi</option>
                  <option value="Tembok" <?= ($detail['dinding'] == 'Tembok') ? 'selected' : '' ?>>Tembok</option>
                </select>
              </div>
            </div>
          
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Lantai</label>
              <select class="form-control custom-select" name="lantai" disabled>
                <option value="">-- Pilih Lantai --</option>
                <option value="Granit" <?= ($detail['lantai'] == 'Granit') ? 'selected' : '' ?>>Granit</option>
                <option value="Keramik" <?= ($detail['lantai'] == 'Keramik') ? 'selected' : '' ?>>Keramik</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Langit - langit</label>
              <select class="form-control custom-select" name="langit_langit" disabled>
                <option value="">-- Pilih Langit - langit --</option>
                <option value="Gipsum/GRC" <?= ($detail['langit'] == 'Gipsum/GRC') ? 'selected' : '' ?>>Gipsum/GRC</option>
                <option value="Beton" <?= ($detail['langit'] == 'Beton') ? 'selected' : '' ?>>Beton</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Jendela</label>
              <select class="form-control custom-select" name="jendela" disabled>
                <option value="">-- Pilih Jendela --</option>
                <option value="Kayu" <?= ($detail['jendela'] == 'Kayu') ? 'selected' : '' ?>>Kayu</option>
                <option value="Beton" <?= ($detail['jendela'] == 'Beton') ? 'selected' : '' ?>>Beton</option>
                <option value="Alumunium" <?= ($detail['jendela'] == 'Alumunium') ? 'selected' : '' ?>>Alumunium</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Pintu</label>
              <select class="form-control custom-select" name="pintu" disabled>
                <option value="">-- Pilih Pintu --</option>
                <option value="Kayu" <?= ($detail['pintu'] == 'Kayu') ? 'selected' : '' ?>>Kayu</option>
                <option value="Asbes" <?= ($detail['pintu'] == 'Asbes') ? 'selected' : '' ?>>Asbes</option>
                <option value="Triplek" <?= ($detail['pintu'] == 'Triplek') ? 'selected' : '' ?>>Triplek</option>
              </select>
            </div>
          </div>
        </div>
                      
        <?php if ($id_jenis_asset == 7) : ?>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Luas Bangunan</label>
              <div class="input-group mb-3">
                <input type="number" name="luas_bangunan" class="form-control" value="<?= $detail['l_bangunan'] ?>" disabled>

                <div class="input-group-prepend">
                  <span class="input-group-text">m<sup>2</sup></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Atap</label>
              <select class="form-control custom-select" name="atap" disabled>
                <option value="">-- Pilih Atap --</option>
                <option value="Genteng" <?= ($detail['atap'] == 'Genteng') ? 'selected' : '' ?>>Genteng</option>
                <option value="Seng" <?= ($detail['atap'] == 'Seng') ? 'selected' : '' ?>>Seng</option>
                <option value="Asbes" <?= ($detail['atap'] == 'Asbes') ? 'selected' : '' ?>>Asbes</option>
                <option value="Tradisional" <?= ($detail['atap'] == 'Tradisional') ? 'selected' : '' ?>>Tradisional</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Kamar Tidur</label>
              <input type="number" class="form-control" name="kamar_tidur" value="<?= $detail['k_tidur'] ?>" disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Toilet</label>
              <input type="number" class="form-control" name="toilet" value="<?= $detail['toilet'] ?>" disabled>
            </div>
          </div>
        </div>

        <?php else : ?>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Luas Bangunan</label>
              <div class="input-group mb-3">
                <input type="number" name="luas_bangunan" class="form-control" value="<?= $detail['l_bangunan'] ?>" disabled>

                <div class="input-group-prepend">
                  <span class="input-group-text">m<sup>2</sup></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Ruang Tamu</label>
              <input type="number" class="form-control" name="ruang_tamu" value="<?= $detail['r_tamu'] ?>" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Ruang Keluarga</label>
              <input type="number" class="form-control" name="ruang_keluarga" value="<?= $detail['r_keluarga'] ?>" disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Kamar Tidur</label>
              <input type="number" class="form-control" name="kamar_tidur" value="<?= $detail['k_tidur'] ?>" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Toilet</label>
              <input type="number" class="form-control" name="toilet" value="<?= $detail['toilet'] ?>" disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Dapur</label>
              <input type="number" class="form-control" name="dapur" value="<?= $detail['dapur'] ?>" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Garasi</label>
              <select class="form-control custom-select" name="garasi" disabled>
                <option value="">-- Pilih --</option>
                <option value="Ada" <?= ($detail['garasi'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['garasi'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Bangunan Lain</label>
              <select class="form-control custom-select" name="bangunan_lain" disabled>
                <option value="">-- Pilih --</option>
                <option value="Ada" <?= ($detail['b_lain'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['b_lain'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                <option value="Tempat Usaha" <?= ($detail['b_lain'] == 'Tempat Usaha') ? 'selected' : '' ?>>Tempat Usaha</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Atap</label>
              <select class="form-control custom-select" name="atap" disabled>
                <option value="">-- Pilih Atap --</option>
                <option value="Genteng" <?= ($detail['atap'] == 'Genteng') ? 'selected' : '' ?>>Genteng</option>
                <option value="Seng" <?= ($detail['atap'] == 'Seng') ? 'selected' : '' ?>>Seng</option>
                <option value="Asbes" <?= ($detail['atap'] == 'Asbes') ? 'selected' : '' ?>>Asbes</option>
                <option value="Tradisional" <?= ($detail['atap'] == 'Tradisional') ? 'selected' : '' ?>>Tradisional</option>
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
              <select class="form-control custom-select" name="air" disabled>
                <option value="">-- Pilih --</option>
                <option value="Cukup" <?= ($detail['air'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                <option value="Kurang" <?= ($detail['air'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                <option value="Tidak Ada" <?= ($detail['air'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Listrik</label>
              <div class="input-group mb-3">
                <input type="number" name="listrik" class="form-control" value="<?= $detail['listrik'] ?>" disabled>

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
              <select class="form-control custom-select" name="telepon" disabled>
                <option value="">-- Pilih --</option>
                <option value="Ada" <?= ($detail['no_telepon'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak" <?= ($detail['no_telepon'] == 'Tidak') ? 'selected' : '' ?>>Tidak</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Pagar</label>
              <select class="form-control custom-select" name="pagar" disabled>
                <option value="">-- Pilih --</option>
                <option value="Kayu" <?= ($detail['pagar'] == 'Ada') ? 'selected' : '' ?>>Kayu</option>
                <option value="Tembok" <?= ($detail['pagar'] == 'Ada') ? 'selected' : '' ?>>Tembok</option>
                <option value="Besi" <?= ($detail['pagar'] == 'Ada') ? 'selected' : '' ?>>Besi</option>
                <option value="Tidak Ada" <?= ($detail['pagar'] == 'Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-success">
              <label class="control-label">Saluran Air</label>
              <select class="form-control custom-select" name="saluran_air" disabled>
                <option value="">-- Pilih --</option>
                <option value="PDAM" <?= ($detail['saluran_air'] == 'PDAM') ? 'selected' : '' ?>>PDAM</option>
                <option value="Sumur/Pompa" <?= ($detail['saluran_air'] == 'Sumur/Pompa') ? 'selected' : '' ?>>Sumur/Pompa</option>
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
              <textarea name="ket_tambahan" rows="4" class="form-control" disabled><?= $detail['keterangan'] ?></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php elseif ($id_jenis_asset == 3 || $id_jenis_asset == 4 || $id_jenis_asset == 5) : ?>

      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data" role="tab">Data</a> </li>
        <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#foto_lainnya" role="tab">Foto</a> </li> -->
      </ul>
      
      <div class="tab-content tabcontent-border"> 
        <div class="tab-pane p-20 active" id="data" role="tabpanel">

        <?php if ($id_jenis_asset == 3): ?>

        <div class="row pt-3">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Nomor Polisi</label>
              <input type="text" class="form-control" name="nomor_polisi" value="<?= $detail['nomor_polisi'] ?>" disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Nama Pemilik STNK</label>
              <input name="nama_pemilik_stnk" class="form-control" rows="3" value="<?= $detail['nama_stnk'] ?>" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="alamat">Alamat Agunan</label>
              <textarea class="form-control" name="alamat" id="alamat" rows="2" disabled><?= $detail['alamat'] ?></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="no_rangka">Nomor Rangka</label>
              <input type="text" name="no_rangka" class="form-control" id="no_rangka" value="<?= $detail['nomor_rangka'] ?>" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="no_mesin">Nomor Mesin</label>
              <input type="text" name="no_mesin" class="form-control" id="no_mesin" value="<?= $detail['nomor_mesin'] ?>" disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="warna_kdr">Warna Kendaraan</label>
              <input type="text" name="warna_kdr" class="form-control" id="warna_kdr" value="<?= $detail['warna_kendaraan'] ?>" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="jenis_kendaraan">Jenis Kendaraan</label>
              <input type="text" name="jenis_kendaraan" class="form-control" id="jenis_kendaraan" value="<?= $detail['jenis_kendaraan'] ?>" disabled> 
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="merk">Merk</label>
              <input type="text" name="merk" class="form-control" id="merk" value="<?= $detail['merek'] ?>" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="type_kdr">Type</label>
              <input type="text" name="type_kdr" class="form-control" id="type_kdr" value="<?= $detail['type_kendaraan'] ?>" disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="thn_buat">Tahun Pembuatan</label>
              <input type="text" name="thn_buat" class="form-control" id="thn_buat" value="<?= $detail['tahun_pembuatan'] ?>" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="cc">Silinder/CC</label>
              <input type="text" name="cc" class="form-control" id="cc" value="<?= $detail['cc'] ?>" disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="bahan_bakar">Bahan Bakar</label>
              <input type="text" name="bahan_bakar" class="form-control" id="bahan_bakar" value="<?= $detail['bahan_bakar'] ?>" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="warna_tnkb">Warna TNKB</label>
              <select name="warna_tnkb" class="form-control custom-select" disabled>
                <option value="">-- Pilih --</option>
                <option value="Plat Hitam" <?= ($detail['warna_tnkb'] == 'Plat Hitam') ? 'selected' : '' ?>>Plat Hitam</option>
                <option value="Plat Kuning" <?= ($detail['warna_tnkb'] == 'Plat Kuning') ? 'selected' : '' ?>>Plat Kuning</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="pajak_berlaku">Pajak Berlaku s/d</label>
              <div class="input-group">
                <input type="text" class="form-control mdate" name="pajak_berlaku" value="<?= $detail['pajak_berlaku'] ?>" readonly>
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
              <select name="status_milik" class="form-control custom-select" disabled>
                <option value="">-- Pilih --</option>
                <?php foreach ($status_milik as $s): ?>
                  <option value="<?= $s['id'] ?>" <?= ($detail['status_milik'] == $s['id']) ? 'selected' : '' ?>><?= $s['status_milik'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="bpkb">BPKB</label>
              <select name="bpkb" class="form-control custom-select" disabled>
                <option value="">-- Pilih --</option>
                <option value="Ada" <?= ($detail['bpkb'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                <option value="Tidak Ada" <?= ($detail['bpkb'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nomor BPKB</label>
              <input type="text" name="nomor_bpkb" value="<?= $detail['nomor_bpkb'] ?>" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="harga">Harga</label>
              <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
                </div>
                <input type="text" name="total_harga" class="form-control" id="rupiah" value="<?=  number_format($detail['total_harga'],0,'.','.') ?>" disabled>

              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="informasi">Informasi Tambahan</label>
              <textarea class="form-control" name="ket_tambahan" disabled><?= $detail['keterangan'] ?></textarea>
            </div>
          </div>
        </div>

        <?php elseif ($id_jenis_asset == 4): ?>
          <div class="row pt-3">
            <div class="col-md-6">
              <div class="form-group">
                <label>Dokumen</label>
                <input type="text" name="dokumen" value="<?= $detail['jenis_dok'] ?>" class="form-control" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="harga">Harga</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                  <span class="input-group-text">Rp.</span>
                  </div>
                  <input type="text" name="total_harga" class="form-control" id="rupiah" value="<?=  number_format($detail['total_harga'],0,'.','.') ?>" disabled>

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="informasi">Alamat</label>
                <textarea class="form-control" name="alamat" disabled><?= $detail['alamat'] ?></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="informasi">Informasi Tambahan</label>
                <textarea class="form-control" name="ket_tambahan" disabled><?= $detail['keterangan'] ?></textarea>
              </div>
            </div>
          </div>
        <?php elseif ($id_jenis_asset == 5): ?>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="informasi">Alamat</label>
                <textarea class="form-control" name="alamat" disabled><?= $detail['alamat'] ?></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="informasi">Keterangan</label>
                <textarea class="form-control" name="ket_tambahan" disabled><?= $detail['keterangan'] ?></textarea>
              </div>
            </div>
          </div>
        <?php endif; ?>
        </div>

      </div>
      
    <?php endif; ?>

  <!-- batas akhir detail form asset -->

            </div>
        </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-header bg-info">
            
        <div class="row">
            <div class="col-md-6">
              <h4 class="card-title text-white mt-0" >Foto Dokumen</h4>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
              <button type="button" class="btn btn-warning mt-0" id="proses_tampil" hidden>Pilih Tampil Foto</button>
            </div>
        </div>
            
        </div>
        <input type="hidden" name="uri" value="<?= $this->uri->segment(6) ?>">
        <input type="hidden" name="id_deb" value="<?= $id_debitur ?>">
        <input type="hidden" name="id_dok" value="<?= $id_dokumen_asset ?>">
        <input type="hidden" name="id_jenis" value="<?= $id_jenis_asset ?>">
        <div class="card-body">
          <div class="row gbr">

            <?php $no=0; foreach ($foto as $f): $no++; ?>
              <div class="col-lg-3 col-md-6">
                  <!-- Card -->
                  <div class="card shadow card-hover">
                      <div class="card-header bg-info">
                          <h4 class="card-title text-center text-white">Tampak <?= $f['tampak_asset'] ?></h4>
                      </div>
                      <!-- <img class="card-img-top img-responsive" style="height: 250px; width: 100%;" src="http://localhost/vcare/images/<?php echo $f['foto'];?>" alt="Tampak <?= $f['tampak_asset'] ?>"> -->

                      <img class="card-img-top img-responsive" style="height: 250px; width: 100%;" src="http://vcare-new.skdigital.id/images/<?php echo $f['foto'];?>" alt="Tampak <?= $f['tampak_asset'] ?>">

                      <div class="card-footer text-center">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="tampil[]" class="custom-control-input tampil_f" id="customCheck<?= $no ?>" value="<?= $f['id_foto_dokumen'] ?>" <?= ($f['status'] == 1) ? 'checked' : '' ?>>
                            <label class="custom-control-label" for="customCheck<?= $no ?>">Tampil</label>
                          </div>
                      </div>
                  </div>
                  <!-- Card -->
              </div>
            <?php endforeach ?>

          </div>
      </div>
    </div>
  </div>
  </div>

<?php else: ?>

  <div class="card shadow mt-3">
      <div class="card-body">

  <?= form_open_multipart('katalog/ubah_detail_asset_baru'); ?>

  <input type="hidden" name="uri" value="<?= $this->uri->segment(6) ?>">
  <input type="hidden" name="id_dokumen_asset" value="<?= $id_dokumen_asset ?>">
  <input type="hidden" name="id_debitur" value="<?= $id_debitur ?>">
  <input type="hidden" name="id_jenis_asset" value="<?= $id_jenis_asset ?>">
  
  <div class="row mt-3">
    <div class="col-md-12">
        <div class="card  border border-info">
            <div class="card-header bg-info">
              <button class="btn btn-warning float-right" type="submit" onclick = "return confirm('Anda yakin akan menyimpan data ini ?..')">Simpan</button>
              <h4 class="text-white mb-0">Ubah Data</h4>
            </div>
          <div class="card-body">
          <?php if ($id_jenis_asset == 8 || $id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 2 || $id_jenis_asset == 7 || $id_jenis_asset == 9): ?>
						
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
              <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 7) : ?>
        
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bangunan" role="tab">Bangunan</a> </li>
        
              <?php endif; ?>
        
              <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 8 || $id_jenis_asset == 7) : ?>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#spek_bangunan" role="tab">Spesifikasi Bangunan</a> </li>
              <?php endif; ?>
              
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#fasilitas" role="tab">Fasilitas</a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ket_tambahan" role="tab">Keterangan Tambahan</a> </li>
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
                          <textarea name="alamat" id="alamat" class="form-control" rows="3" ><?= $detail['alamat'] ?></textarea>
                        </div>
                      </div>
                      <!--/span-->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Yang Dijumpai</label>
                          <textarea name="yang_dijumpai" id="yang_dijumpai" class="form-control" rows="3" ><?= $detail['bertemu'] ?></textarea>
                        </div>
                      </div>
                      <!--/span-->
                    </div>
                  <?php else: ?>
                    <div class="row pt-3">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Atas Nama</label>
                          <input type="text" name="atas_nama" class="form-control" value="<?= $detail['atas_nama'] ?>" required>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                  
                  <!--/row-->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group has-success">
                        <label class="control-label">Status PIC</label>
                        <select class="form-control custom-select" name="status_pic" >
                          <option value="">-- Pilih Status PIC --</option>
                          <option value="Debitur" <?= ($detail['status_pic'] == 'Debitur') ? 'selected' : '' ?>>Debitur</option>
                          <option value="Keluarga" <?= ($detail['status_pic'] == 'Keluarga') ? 'selected' : '' ?>>Keluarga</option>
                          <option value="Pihak Lain" <?= ($detail['status_pic'] == 'Pihak Lain') ? 'selected' : '' ?>>Pihak Lain</option>
                        </select></div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                      <div class="form-group has-success">
                        <label class="control-label">Status Agunan</label>
                        <select class="form-control custom-select" name="status_agunan" >
                          <option value="">-- Pilih Status Agunan --</option>
                          <?php foreach ($status_milik as $s): ?>
                            <option value="<?= $s['id'] ?>" <?= ($detail['status_milik'] == $s['id']) ? 'selected' : '' ?>><?= $s['status_milik'] ?></option>
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
                        <select class="form-control custom-select" name="batas_utara" >
                          <option value="">-- Pilih Batas Utara --</option>
                          <option value="Rumah" <?= ($detail['batas_utara'] == 'Rumah') ? 'selected' : '' ?>>Rumah</option>
                          <option value="Tanah Kosong" <?= ($detail['batas_utara'] == 'Tanah Kosong') ? 'selected' : '' ?>>Tanah Kosong</option>
                          <option value="Jalan" <?= ($detail['batas_utara'] == 'Jalan') ? 'selected' : '' ?>>Jalan</option>
                        </select></div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                      <div class="form-group has-success">
                        <label class="control-label">Batas Selatan</label>
                        <select class="form-control custom-select" name="batas_selatan" >
                          <option value="">-- Pilih Batas Selatan --</option>
                          <option value="Rumah" <?= ($detail['batas_selatan'] == 'Rumah') ? 'selected' : '' ?>>Rumah</option>
                          <option value="Tanah Kosong" <?= ($detail['batas_selatan'] == 'Tanah Kosong') ? 'selected' : '' ?>>Tanah Kosong</option>
                          <option value="Jalan" <?= ($detail['batas_selatan'] == 'Jalan') ? 'selected' : '' ?>>Jalan</option>
                        </select></div>
                    </div>
                    <!--/span-->
                  </div>
                  <!--/row-->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group has-success">
                        <label class="control-label">Batas Barat</label>
                        <select class="form-control custom-select" name="batas_barat" >
                          <option value="">-- Pilih Batas Utara --</option>
                          <option value="Rumah" <?= ($detail['batas_utara'] == 'Rumah') ? 'selected' : '' ?>>Rumah</option>
                          <option value="Tanah Kosong" <?= ($detail['batas_utara'] == 'Tanah Kosong') ? 'selected' : '' ?>>Tanah Kosong</option>
                          <option value="Jalan" <?= ($detail['batas_utara'] == 'Jalan') ? 'selected' : '' ?>>Jalan</option>
                        </select></div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                      <div class="form-group has-success">
                        <label class="control-label">Batas Timur</label>
                        <select class="form-control custom-select" name="batas_timur" >
                          <option value="">-- Pilih Batas Timur --</option>
                          <option value="Rumah" <?= ($detail['batas_timur'] == 'Rumah') ? 'selected' : '' ?>>Rumah</option>
                          <option value="Tanah Kosong" <?= ($detail['batas_timur'] == 'Tanah Kosong') ? 'selected' : '' ?>>Tanah Kosong</option>
                          <option value="Jalan" <?= ($detail['batas_timur'] == 'Jalan') ? 'selected' : '' ?>>Jalan</option>
                        </select></div>
                    </div>
                    <!--/span-->
                  </div>
                  <!--/row-->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group has-success">
                        <label class="control-label">Status Dokumen</label>
                        <select class="form-control custom-select" name="dokumen" >
                          <option value="">-- Pilih Status Dokumen --</option>
                          <option value="SHM/SHGB" <?= ($detail['jenis_dok'] == 'SHM/SHGB') ? 'selected' : '' ?>>SHM/SHGB</option>
                          <option value="SHRSS" <?= ($detail['jenis_dok'] == 'SHRSS') ? 'selected' : '' ?>>SHRSS</option>
                          <option value="Girik" <?= ($detail['jenis_dok'] == 'Girik') ? 'selected' : '' ?>>Girik</option>
                          <option value="AJB" <?= ($detail['jenis_dok'] == 'AJB') ? 'selected' : '' ?>>AJB</option>
                          <option value="Akta Hibah" <?= ($detail['jenis_dok'] == 'Akta Hibah') ? 'selected' : '' ?>>Akta Hibah</option>
                        </select></div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group has-success">
                        <label class="control-label">Total Harga</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">Rp.</span>
                          </div>
                          <input type="text" name="total_harga" class="form-control" id="rupiah" value="<?=  number_format($detail['total_harga'],0,'.','.') ?>" >
        
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
                      <select class="form-control custom-select" name="lokasi" >
                        <option value="">-- Pilih Lokasi --</option>
                        <option value="Pusat kota" <?= ($detail['lokasi'] == 'Pusat kota') ? 'selected' : '' ?>>Pusat Kota</option>
                        <option value="Pinggiran kota" <?= ($detail['lokasi'] == 'Pinggiran kota') ? 'selected' : '' ?>>Pinggiran Kota</option>
                      </select></div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Kepadatan Bangunan</label>
                      <select class="form-control custom-select" name="kepadatan_bangunan" >
                        <option value="">-- Pilih Kepadatan Bangunan --</option>
                        <option value="> 75%" <?= ($detail['kepadatan_bangunan'] == '> 75%') ? 'selected' : '' ?>>> 75%</option>
                        <option value="25% - 75%" <?= ($detail['kepadatan_bangunan'] == '25% - 75%') ? 'selected' : '' ?>>25% - 75%</option>
                        <option value="< 25%" <?= ($detail['kepadatan_bangunan'] == '< 25%') ? 'selected' : '' ?>>< 25%</option>
                      </select></div>
                  </div>
                  <!--/span-->
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Pertumbuhan Bangunan</label>
                      <select class="form-control custom-select" name="pertumbuhan_bangunan" >
                        <option value="">-- Pilih Pertumbuhan Bangunan --</option>
                        <option value="Cepat" <?= ($detail['pertumbuhan_bangunan'] == 'Cepat') ? 'selected' : '' ?>>Cepat</option>
                        <option value="Stabil" <?= ($detail['pertumbuhan_bangunan'] == 'Stabil') ? 'selected' : '' ?>>Stabil</option>
                        <option value="Lambat" <?= ($detail['pertumbuhan_bangunan'] == 'Lambat') ? 'selected' : '' ?>>Lambat</option>
                      </select></div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Harga Tanah</label>
                      <select class="form-control custom-select" name="harga_tanah" >
                        <option value="">-- Pilih Harga Tanah --</option>
                        <option value="Naik Cepat" <?= ($detail['h_tanah'] == 'Naik Cepat') ? 'selected' : '' ?>>Naik Cepat</option>
                        <option value="Stabil" <?= ($detail['h_tanah'] == 'Stabil') ? 'selected' : '' ?>>Stabil</option>
                        <option value="Gejala Turun" <?= ($detail['h_tanah'] == 'Gejala Turun') ? 'selected' : '' ?>>Gejala Turun</option>
                      </select></div>
                  </div>
                  <!--/span-->
                </div>
              </div>
              <div class="tab-pane p-20" id="analisa_lingkungan" role="tabpanel">
                
                <?php if ($id_jenis_asset == 9) : ?>
        
                  <div class="row pt-3">
                    <div class="col-md-6">
                      <div class="form-group has-success">
                        <label class="control-label">Aksesbilitas</label>
                        <select class="form-control custom-select" name="aksesbilitas" >
                          <option value="">-- Pilih Aksesbilitas --</option>
                          <option value="Baik" <?= ($detail['aksesbilitas'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                          <option value="Cukup" <?= ($detail['aksesbilitas'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                          <option value="Kurang" <?= ($detail['aksesbilitas'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                        </select></div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group has-success">
                        <label class="control-label">Transportasi</label>
                        <select class="form-control custom-select" name="transportasi" >
                          <option value="">-- Pilih Transportasi --</option>
                          <option value="Baik" <?= ($detail['aksesbilitas'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                          <option value="Cukup" <?= ($detail['aksesbilitas'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                          <option value="Kurang" <?= ($detail['aksesbilitas'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                        </select>
                      </div>
                    </div>
                  </div>
        
                <?php else : ?>
        
                <div class="row pt-3">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Aksesbilitas</label>
                      <select class="form-control custom-select" name="aksesbilitas" >
                        <option value="">-- Pilih Aksesbilitas --</option>
                        <option value="Baik" <?= ($detail['aksesbilitas'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                        <option value="Cukup" <?= ($detail['aksesbilitas'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                        <option value="Kurang" <?= ($detail['aksesbilitas'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                      </select></div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Pusat Perbelanjaan</label>
                      <select class="form-control custom-select" name="pusat_belanja" >
                        <option value="">-- Pilih Perbelanjaan --</option>
                        <option value="Dekat" <?= ($detail['pusat_belanja'] == 'Dekat') ? 'selected' : '' ?>>Dekat</option>
                        <option value="Jauh" <?= ($detail['pusat_belanja'] == 'Jauh') ? 'selected' : '' ?>>Jauh</option>
                      </select></div>
                  </div>
                  <!--/span-->
                </div>
                <div class="row">
                  <?php if ($id_jenis_asset != 7) : ?>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Sekolah</label>
                      <select class="form-control custom-select" name="sekolah" >
                        <option value="">-- Pilih Sekolah --</option>
                        <option value="Ada" <?= ($detail['sekolah'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Jauh" <?= ($detail['sekolah'] == 'Jauh') ? 'selected' : '' ?>>Jauh</option>
                      </select></div>
                  </div>
                  <?php endif; ?>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Transportasi</label>
                      <select class="form-control custom-select" name="transportasi" >
                        <option value="">-- Pilih Transportasi --</option>
                        <option value="Baik" <?= ($detail['aksesbilitas'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                        <option value="Cukup" <?= ($detail['aksesbilitas'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                        <option value="Kurang" <?= ($detail['aksesbilitas'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                      </select>
                      </div>
                  </div>
                  <!--/span-->
                </div>
                <div class="row">
                    <?php if ($id_jenis_asset != 7) : ?>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Rekreasi</label>
                      <select class="form-control custom-select" name="rekreasi" >
                        <option value="">-- Pilih Rekreasi --</option>
                        <option value="Ada" <?= ($detail['rekreasi'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['rekreasi'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select></div>
                  </div>
                  <?php endif; ?>
                </div>
        
                <?php endif; ?>
              </div>
              <div class="tab-pane p-20" id="kawasan" role="tabpanel">
                <div class="d-flex justify-content-center pt-3">
                  <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6) : ?>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Mayaoritas Data Hunian</label>
                      <select class="form-control custom-select" name="mayor_data_hunian" >
                        <option value="">-- Pilih Mayaoritas Data Hunian --</option>
                        <option value="Niaga" <?= ($detail['data_hunian'] == 'Niaga') ? 'selected' : '' ?>>Niaga</option>
                        <option value="Pemilikan" <?= ($detail['data_hunian'] == 'Pemilikan') ? 'selected' : '' ?>>Pemilikan</option>
                        <option value="Penyewaan" <?= ($detail['data_hunian'] == 'Penyewaan') ? 'selected' : '' ?>>Penyewaan</option>
                        <option value="Rumah Dinas" <?= ($detail['data_hunian'] == 'Rumah Dinas') ? 'selected' : '' ?>>Rumah Dinas</option>
                        <option value="Kosong" <?= ($detail['data_hunian'] == 'Kosong') ? 'selected' : '' ?>>Kosong</option>
                      </select></div>
                  </div>
                  <?php endif; ?>
                  <?php if ($id_jenis_asset == 8 || $id_jenis_asset == 2) : ?>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Mayaoritas Data Hunian</label>
                      <select class="form-control custom-select" name="mayor_data_hunian" >
                        <option value="">-- Pilih Mayaoritas Data Hunian --</option>
                        <option value="Pemilikan" <?= ($detail['data_hunian'] == 'Pemilikan') ? 'selected' : '' ?>>Pemilikan</option>
                        <option value="Penyewaan" <?= ($detail['data_hunian'] == 'Penyewaan') ? 'selected' : '' ?>>Penyewaan</option>
                        <option value="Rumah Dinas" <?= ($detail['data_hunian'] == 'Rumah Dinas') ? 'selected' : '' ?>>Rumah Dinas</option>
                        <option value="Kosong" <?= ($detail['data_hunian'] == 'Kosong') ? 'selected' : '' ?>>Kosong</option>
                      </select></div>
                  </div>
                  <?php endif; ?>
                  <?php if ($id_jenis_asset == 9) : ?>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Mayaoritas Data Hunian</label>
                      <select class="form-control custom-select" name="mayor_data_hunian" >
                        <option value="">-- Pilih Mayaoritas Data Hunian --</option>
                        <option value="Pabrik" <?= ($detail['data_hunian'] == 'Pabrik') ? 'selected' : '' ?>>Pabrik</option>
                        <option value="Pergudangan" <?= ($detail['data_hunian'] == 'Pergudangan') ? 'selected' : '' ?>>Pergudangan</option>
                        <option value="Hunian/Pemukiman" <?= ($detail['data_hunian'] == 'Hunian/Pemukiman') ? 'selected' : '' ?>>Hunian/Pemukiman</option>
                        <option value="Sawah" <?= ($detail['data_hunian'] == 'Sawah') ? 'selected' : '' ?>>Sawah</option>
                        <option value="Lahan Kosong" <?= ($detail['data_hunian'] == 'Lahan Kosong') ? 'selected' : '' ?>>Lahan Kosong</option>
                      </select></div>
                  </div>
                  <?php endif; ?>
                  <?php if ($id_jenis_asset == 7) : ?>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Mayaoritas Data Hunian</label>
                      <select class="form-control custom-select" name="mayor_data_hunian" >
                        <option value="">-- Pilih Mayaoritas Data Hunian --</option>
                        <option value="Perkantoran"  <?= ($detail['data_hunian'] == 'Perkantoran') ? 'selected' : '' ?>>Perkantoran</option>
                        <option value="Sekolah"  <?= ($detail['data_hunian'] == 'Sekolah') ? 'selected' : '' ?>>Sekolah</option>
                        <option value="Komplek Perumahan"  <?= ($detail['data_hunian'] == 'Komplek Perumahan') ? 'selected' : '' ?>>Komplek Perumahan</option>
                        <option value="Pasar"  <?= ($detail['data_hunian'] == 'Pasar') ? 'selected' : '' ?>>Pasar</option>
                        <option value="Hunian"  <?= ($detail['data_hunian'] == 'Hunian') ? 'selected' : '' ?>>Hunian</option>
                        <option value="Jalan"  <?= ($detail['data_hunian'] == 'Jalan') ? 'selected' : '' ?>>Jalan</option>
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
                      <select class="form-control custom-select" name="jaringan_listrik" >
                        <option value="">-- Pilih --</option>
                        <option value="Ada" <?= ($detail['jaringan_listrik'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['jaringan_listrik'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Jaringan Air Bersih</label>
                      <select class="form-control custom-select" name="jaringan_air_bersih" >
                        <option value="">-- Pilih --</option>
                        <option value="Ada" <?= ($detail['jaringan_air_bersih'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['jaringan_air_bersih'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Jaringan Telepon</label>
                      <select class="form-control custom-select" name="jaringan_telepon" >
                        <option value="">-- Pilih --</option>
                        <option value="Ada" <?= ($detail['jaringan_telepon'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['jaringan_telepon'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Jaringan Gas</label>
                      <select class="form-control custom-select" name="jaringan_gas" >
                        <option value="">-- Pilih --</option>
                        <option value="Ada" <?= ($detail['jaringan_gas'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['jaringan_gas'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Penampungan Sampah</label>
                      <select class="form-control custom-select" name="penampungan_sampah" >
                        <option value="">-- Pilih --</option>
                        <option value="Ada" <?= ($detail['penampungan_sampah'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['penampungan_sampah'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Jalan Masuk</label>
                      <select class="form-control custom-select" name="jalan_masuk" >
                        <option value="">-- Pilih --</option>
                        <option value="Ada" <?= ($detail['jalan_masuk'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['jalan_masuk'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Jalan Depan Objek</label>
                      <select class="form-control custom-select" name="jalan_depan_objek" >
                        <option value="">-- Pilih --</option>
                        <option value="Ada" <?= ($detail['jalan_depan_objek'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['jalan_depan_objek'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Saluran Air</label>
                      <select class="form-control custom-select" name="saluran_air" >
                        <option value="">-- Pilih --</option>
                        <option value="Ada" <?= ($detail['saluran_air'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['saluran_air'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Trotoar</label>
                      <select class="form-control custom-select" name="trotoar" >
                        <option value="">-- Pilih --</option>
                        <option value="Ada" <?= ($detail['trotoar'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['trotoar'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane p-20" id="topografi" role="tabpanel">
                  <?php if ($id_jenis_asset != 7) : ?>
                <div class="row pt-3">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Penghijauan</label>
                      <select class="form-control custom-select" name="penghijauan" >
                        <option value="">-- Pilih Penghijauan --</option>
                        <option value="Rimbun" <?= ($detail['penghijauan'] == 'Rimbun') ? 'selected' : '' ?>>Rimbun</option>
                        <option value="Gersang" <?= ($detail['penghijauan'] == 'Gersang') ? 'selected' : '' ?>>Gersang</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Penataan Lingkungan</label>
                      <select class="form-control custom-select" name="penataan_lingkungan" >
                        <option value="">-- Pilih Penataan Lingkungan --</option>
                        <option value="Baik" <?= ($detail['penataan_lingkungan'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                        <option value="Kurang" <?= ($detail['penataan_lingkungan'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                      </select>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Resiko Banjir</label>
                      <select class="form-control custom-select" name="resiko_banjir" >
                        <option value="">-- Pilih Resiko Banjir --</option>
                        <option value="Aman" <?= ($detail['resiko_banjir'] == 'Aman') ? 'selected' : '' ?>>Aman</option>
                        <option value="Rentan" <?= ($detail['resiko_banjir'] == 'Rentan') ? 'selected' : '' ?>>Rentan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Tinggi Tanah Dari Jalan</label>
                      <select class="form-control custom-select" name="tinggi_tanah" >
                        <option value="">-- Pilih Tinggi Tanah Dari Jalan --</option>
                        <option value="Rendah" <?= ($detail['tinggi_tanah'] == 'Rendah') ? 'selected' : '' ?>>Rendah</option>
                        <option value="Tinggi" <?= ($detail['tinggi_tanah'] == 'Tinggi') ? 'selected' : '' ?>>Tinggi</option>
                      </select>
                    </div>
                  </div>
                </div>
        
                <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 2) : ?>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Tusuk Sate</label>
                      <select class="form-control custom-select" name="tusuk_sate" >
                        <option value="">-- Pilih --</option>
                        <option value="Ada" <?= ($detail['tusuk_sate'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['tusuk_sate'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Sutet</label>
                      <select class="form-control custom-select" name="sutet" >
                        <option value="">-- Pilih --</option>
                        <option value="Ada" <?= ($detail['tusuk_sate'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['tusuk_sate'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                </div>
        
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Jenis Tanah</label>
                      <select class="form-control custom-select" name="jenis_tanah" >
                        <option value="">-- Pilih Jenis Tanah --</option>
                        <option value="Subur" <?= ($detail['jenis_tanah'] == 'Subur') ? 'selected' : '' ?>>Subur</option>
                        <option value="Tandus" <?= ($detail['jenis_tanah'] == 'Tandus') ? 'selected' : '' ?>>Tandus</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Lampu Jalan</label>
                      <select class="form-control custom-select" name="lampu_jalan" >
                        <option value="">-- Pilih Lampu Jalan --</option>
                        <option value="Ada" <?= ($detail['lampu_jalan'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['lampu_jalan'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                </div>
        
                <?php endif; ?>
        
                <?php if ($id_jenis_asset == 8 || $id_jenis_asset == 7) : ?>
        
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Lampu Jalan</label>
                      <select class="form-control custom-select" name="lampu_jalan" >
                        <option value="">-- Pilih Lampu Jalan --</option>
                        <option value="Ada" <?= ($detail['lampu_jalan'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['lampu_jalan'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
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
                        <input type="number" name="nilai_taksiran" class="form-control" id="rupiah" value="<?= number_format($detail['nilai_taksiran']) ?>" >
        
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Bentuk Tanah</label>
                      <select class="form-control custom-select" name="bentuk_tanah" >
                        <option value="">-- Pilih Bentuk Tanah --</option>
                        <option value="Datar" <?= ($detail['bentuk_tanah'] == 'Datar') ? 'selected' : '' ?>>Datar</option>
                        <option value="Miring" <?= ($detail['bentuk_tanah'] == 'Miring') ? 'selected' : '' ?>>Miring</option>
                        <option value="Tidak Rata" <?= ($detail['bentuk_tanah'] == 'Tidak Rata') ? 'selected' : '' ?>>Tidak Rata</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Letak Tanah</label>
                      <select class="form-control custom-select" name="letak_tanah" >
                        <option value="">-- Pilih Letak Tanah --</option>
                        <option value="Strategis" <?= ($detail['letak_tanah'] == 'Strategis') ? 'selected' : '' ?>>Strategis</option>
                        <option value="Biasa" <?= ($detail['letak_tanah'] == 'Biasa') ? 'selected' : '' ?>>Biasa</option>
                        <option value="Tidak Strategis" <?= ($detail['letak_tanah'] == 'Tidak Strategis') ? 'selected' : '' ?>>Tidak Strategis</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Luas Tanah</label>
                      <div class="input-group mb-3">
                      <input type="number" name="luas_tanah" class="form-control" value="<?= $detail['l_tanah'] ?>" >
        
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
                  <?php if ($id_jenis_asset != 9) : ?>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Lokasi</label>
                      <select class="form-control custom-select" name="lokasi_cat" >
                        <option value="">-- Pilih Lokasi --</option>
                        <?php if ($id_jenis_asset == 8) : ?>
                          <option value="Dekat Pusat Kota" <?= ($detail['lokasi_cat'] == 'Dekat Pusat Kota') ? 'selected' : '' ?>>Dekat Pusat Kota</option>
                          <option value="Pinggiran Kota" <?= ($detail['lokasi_cat'] == 'Pinggiran Kota') ? 'selected' : '' ?>>Pinggiran Kota</option>
                        <?php elseif ($id_jenis_asset == 6 || $id_jenis_asset == 1 || $id_jenis_asset == 2 || $id_jenis_asset == 7) : ?>
                          <option value="Dekat Pusat Kota" <?= ($detail['lokasi_cat'] == 'Dekat Pusat Kota') ? 'selected' : '' ?>>Dekat Pusat Kota</option>
                          <option value="Strategis" <?= ($detail['lokasi_cat'] == 'Strategis') ? 'selected' : '' ?>>Strategis</option>
                          <option value="Terpencil" <?= ($detail['lokasi_cat'] == 'Terpencil') ? 'selected' : '' ?>>Terpencil</option>
                        <?php endif ?>
                        
                      </select>
                    </div>
                  </div>
                  <?php endif ?>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Marketability</label>
                      <select class="form-control custom-select" name="marketability" >
                        <option value="">-- Pilih Marketability --</option>
                        <?php foreach ($sifat_asset as $s): ?>
                          <option value="<?= $s['id_sifat_asset'] ?>" <?= $detail['id_sifat_asset'] == $s['id_sifat_asset'] ? 'selected' : '' ?>><?= $s['sifat_asset'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Kawasan Properti</label>
                      <select class="form-control custom-select" name="kawasan_properti" >
                        <option value="">-- Pilih Kawasan Properti --</option>
                        <option value="Jauh" <?= ($detail['kawasan_property'] == 'Jauh') ? 'selected' : '' ?>>Jauh</option>
                        <option value="Dekat" <?= ($detail['kawasan_property'] == 'Dekat') ? 'selected' : '' ?>>Dekat</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Lebar Jalan</label>
                      <select class="form-control custom-select" name="lebar_jalan" >
                        <option value="">-- Pilih Lebar Jalan --</option>
                        <option value="2 mtr" <?= ($detail['lebar_jalan'] == '2 mtr') ? 'selected' : '' ?>>2 mtr</option>
                        <option value="6 mtr" <?= ($detail['lebar_jalan'] == '6 mtr') ? 'selected' : '' ?>>6 mtr</option>
                        <option value="10 mtr" <?= ($detail['lebar_jalan'] == '10 mtr') ? 'selected' : '' ?>>10 mtr</option>
                        <option value="> 10 mtr" <?= ($detail['lebar_jalan'] == '> 10 mtr') ? 'selected' : '' ?>>> 10 mtr</option>
                      </select>
                    </div>
                  </div>
                </div>
                
                <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 2 || $id_jenis_asset == 7) : ?>
        
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Wilayah</label>
                      <select class="form-control custom-select" name="wilayah" >
                        <option value="">-- Pilih Wilayah --</option>
                        <option value="Perkotaan" <?= ($detail['wilayah'] == 'Perkotaan') ? 'selected' : '' ?>>Perkotaan</option>
                        <option value="Pedesaan" <?= ($detail['wilayah'] == 'Pedesaan') ? 'selected' : '' ?>>Pedesaan</option>
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
                      <input type="number" class="form-control" name="jumlah_lantai" value="<?= $detail['jml_lantai'] ?>" >
                    </div>
                  </div>
                </div>
              </div>
        
              <div class="tab-pane p-20" id="spek_bangunan" role="tabpanel">
                <div class="row pt-3">
        
                  <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 7) : ?>
        
                    <div class="col-md-6">
                      <div class="form-group has-success">
                        <label class="control-label">Konstruksi</label>
                        <select class="form-control custom-select" name="konstruksi" >
                          <option value="">-- Pilih Konstruksi --</option>
                          <option value="Kayu" <?= ($detail['konstruksi'] == 'Kayu') ? 'selected' : '' ?>>Kayu</option>
                          <option value="Semi" <?= ($detail['konstruksi'] == 'Semi') ? 'selected' : '' ?>>Semi</option>
                          <option value="Permanen" <?= ($detail['konstruksi'] == 'Permanen') ? 'selected' : '' ?>>Permanen</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group has-success">
                        <label class="control-label">Pondasi</label>
                        <select class="form-control custom-select" name="pondasi" >
                          <option value="">-- Pilih Pondasi --</option>
                          <option value="Semen Batu" <?= ($detail['pondasi'] == 'Semen Batu') ? 'selected' : '' ?>>Semen Batu</option>
                          <option value="Beton" <?= ($detail['pondasi'] == 'Beton') ? 'selected' : '' ?>>Beton</option>
                        </select>
                      </div>
                    </div>
        
                  <?php endif; ?>
        
                    <div class="col-md-6">
                      <div class="form-group has-success">
                        <label class="control-label">Dinding</label>
                        <select class="form-control custom-select" name="dinding" >
                          <option value="">-- Pilih Dinding --</option>
                          <option value="Kayu" <?= ($detail['dinding'] == 'Kayu') ? 'selected' : '' ?>>Kayu</option>
                          <option value="Semi" <?= ($detail['dinding'] == 'Semi') ? 'selected' : '' ?>>Semi</option>
                          <option value="Tembok" <?= ($detail['dinding'] == 'Tembok') ? 'selected' : '' ?>>Tembok</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group has-success">
                        <label class="control-label">Partisi</label>
                        <select class="form-control custom-select" name="partisi" >
                          <option value="">-- Pilih Partisi --</option>
                          <option value="Kayu" <?= ($detail['dinding'] == 'Kayu') ? 'selected' : '' ?>>Kayu</option>
                          <option value="Gipsum" <?= ($detail['dinding'] == 'Gipsum') ? 'selected' : '' ?>>Semi</option>
                          <option value="Tembok" <?= ($detail['dinding'] == 'Tembok') ? 'selected' : '' ?>>Tembok</option>
                        </select>
                      </div>
                    </div>
                  
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Lantai</label>
                      <select class="form-control custom-select" name="lantai" >
                        <option value="">-- Pilih Lantai --</option>
                        <option value="Granit" <?= ($detail['lantai'] == 'Granit') ? 'selected' : '' ?>>Granit</option>
                        <option value="Keramik" <?= ($detail['lantai'] == 'Keramik') ? 'selected' : '' ?>>Keramik</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Langit - langit</label>
                      <select class="form-control custom-select" name="langit_langit" >
                        <option value="">-- Pilih Langit - langit --</option>
                        <option value="Gipsum/GRC" <?= ($detail['langit'] == 'Gipsum/GRC') ? 'selected' : '' ?>>Gipsum/GRC</option>
                        <option value="Beton" <?= ($detail['langit'] == 'Beton') ? 'selected' : '' ?>>Beton</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Jendela</label>
                      <select class="form-control custom-select" name="jendela" >
                        <option value="">-- Pilih Jendela --</option>
                        <option value="Kayu" <?= ($detail['jendela'] == 'Kayu') ? 'selected' : '' ?>>Kayu</option>
                        <option value="Beton" <?= ($detail['jendela'] == 'Beton') ? 'selected' : '' ?>>Beton</option>
                        <option value="Alumunium" <?= ($detail['jendela'] == 'Alumunium') ? 'selected' : '' ?>>Alumunium</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Pintu</label>
                      <select class="form-control custom-select" name="pintu" >
                        <option value="">-- Pilih Pintu --</option>
                        <option value="Kayu" <?= ($detail['pintu'] == 'Kayu') ? 'selected' : '' ?>>Kayu</option>
                        <option value="Asbes" <?= ($detail['pintu'] == 'Asbes') ? 'selected' : '' ?>>Asbes</option>
                        <option value="Triplek" <?= ($detail['pintu'] == 'Triplek') ? 'selected' : '' ?>>Triplek</option>
                      </select>
                    </div>
                  </div>
                </div>
                              
                <?php if ($id_jenis_asset == 7) : ?>
        
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Luas Bangunan</label>
                      <div class="input-group mb-3">
                        <input type="number" name="luas_bangunan" class="form-control" value="<?= $detail['l_bangunan'] ?>" >
        
                        <div class="input-group-prepend">
                          <span class="input-group-text">m<sup>2</sup></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Atap</label>
                      <select class="form-control custom-select" name="atap" >
                        <option value="">-- Pilih Atap --</option>
                        <option value="Genteng" <?= ($detail['atap'] == 'Genteng') ? 'selected' : '' ?>>Genteng</option>
                        <option value="Seng" <?= ($detail['atap'] == 'Seng') ? 'selected' : '' ?>>Seng</option>
                        <option value="Asbes" <?= ($detail['atap'] == 'Asbes') ? 'selected' : '' ?>>Asbes</option>
                        <option value="Tradisional" <?= ($detail['atap'] == 'Tradisional') ? 'selected' : '' ?>>Tradisional</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Kamar Tidur</label>
                      <input type="number" class="form-control" name="kamar_tidur" value="<?= $detail['k_tidur'] ?>" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Toilet</label>
                      <input type="number" class="form-control" name="toilet" value="<?= $detail['toilet'] ?>" >
                    </div>
                  </div>
                </div>
        
                <?php else : ?>
        
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Luas Bangunan</label>
                      <div class="input-group mb-3">
                        <input type="number" name="luas_bangunan" class="form-control" value="<?= $detail['l_bangunan'] ?>" >
        
                        <div class="input-group-prepend">
                          <span class="input-group-text">m<sup>2</sup></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Ruang Tamu</label>
                      <input type="number" class="form-control" name="ruang_tamu" value="<?= $detail['r_tamu'] ?>" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Ruang Keluarga</label>
                      <input type="number" class="form-control" name="ruang_keluarga" value="<?= $detail['r_keluarga'] ?>" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Kamar Tidur</label>
                      <input type="number" class="form-control" name="kamar_tidur" value="<?= $detail['k_tidur'] ?>" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Toilet</label>
                      <input type="number" class="form-control" name="toilet" value="<?= $detail['toilet'] ?>" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Dapur</label>
                      <input type="number" class="form-control" name="dapur" value="<?= $detail['dapur'] ?>" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Garasi</label>
                      <select class="form-control custom-select" name="garasi" >
                        <option value="">-- Pilih --</option>
                        <option value="Ada" <?= ($detail['garasi'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['garasi'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Bangunan Lain</label>
                      <select class="form-control custom-select" name="bangunan_lain" >
                        <option value="">-- Pilih --</option>
                        <option value="Ada" <?= ($detail['b_lain'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['b_lain'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                        <option value="Tempat Usaha" <?= ($detail['b_lain'] == 'Tempat Usaha') ? 'selected' : '' ?>>Tempat Usaha</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Atap</label>
                      <select class="form-control custom-select" name="atap" >
                        <option value="">-- Pilih Atap --</option>
                        <option value="Genteng" <?= ($detail['atap'] == 'Genteng') ? 'selected' : '' ?>>Genteng</option>
                        <option value="Seng" <?= ($detail['atap'] == 'Seng') ? 'selected' : '' ?>>Seng</option>
                        <option value="Asbes" <?= ($detail['atap'] == 'Asbes') ? 'selected' : '' ?>>Asbes</option>
                        <option value="Tradisional" <?= ($detail['atap'] == 'Tradisional') ? 'selected' : '' ?>>Tradisional</option>
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
                      <select class="form-control custom-select" name="air" >
                        <option value="">-- Pilih --</option>
                        <option value="Cukup" <?= ($detail['air'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                        <option value="Kurang" <?= ($detail['air'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                        <option value="Tidak Ada" <?= ($detail['air'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Listrik</label>
                      <div class="input-group mb-3">
                        <input type="number" name="listrik" class="form-control" value="<?= $detail['listrik'] ?>" >
        
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
                      <select class="form-control custom-select" name="telepon" >
                        <option value="">-- Pilih --</option>
                        <option value="Ada" <?= ($detail['no_telepon'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak" <?= ($detail['no_telepon'] == 'Tidak') ? 'selected' : '' ?>>Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Pagar</label>
                      <select class="form-control custom-select" name="pagar" >
                        <option value="">-- Pilih --</option>
                        <option value="Kayu" <?= ($detail['pagar'] == 'Ada') ? 'selected' : '' ?>>Kayu</option>
                        <option value="Tembok" <?= ($detail['pagar'] == 'Ada') ? 'selected' : '' ?>>Tembok</option>
                        <option value="Besi" <?= ($detail['pagar'] == 'Ada') ? 'selected' : '' ?>>Besi</option>
                        <option value="Tidak Ada" <?= ($detail['pagar'] == 'Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <label class="control-label">Saluran Air</label>
                      <select class="form-control custom-select" name="saluran_air" >
                        <option value="">-- Pilih --</option>
                        <option value="PDAM" <?= ($detail['saluran_air'] == 'PDAM') ? 'selected' : '' ?>>PDAM</option>
                        <option value="Sumur/Pompa" <?= ($detail['saluran_air'] == 'Sumur/Pompa') ? 'selected' : '' ?>>Sumur/Pompa</option>
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
                      <textarea name="ket_tambahan" rows="4" class="form-control" ><?= $detail['keterangan'] ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        
            <?php elseif ($id_jenis_asset == 3 || $id_jenis_asset == 4 || $id_jenis_asset == 5) : ?>
        
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data" role="tab">Data</a> </li>
                <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#foto_lainnya" role="tab">Foto</a> </li> -->
              </ul>
              
              <div class="tab-content tabcontent-border"> 
                <div class="tab-pane p-20 active" id="data" role="tabpanel">
        
                <?php if ($id_jenis_asset == 3): ?>
        
                <div class="row pt-3">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Nomor Polisi</label>
                      <input type="text" class="form-control" name="nomor_polisi" value="<?= $detail['nomor_polisi'] ?>" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Nama Pemilik STNK</label>
                      <input name="nama_pemilik_stnk" class="form-control" rows="3" value="<?= $detail['nama_stnk'] ?>" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="alamat">Alamat Agunan</label>
                      <textarea class="form-control" name="alamat" id="alamat" rows="2" ><?= $detail['alamat'] ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="no_rangka">Nomor Rangka</label>
                      <input type="text" name="no_rangka" class="form-control" id="no_rangka" value="<?= $detail['nomor_rangka'] ?>" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="no_mesin">Nomor Mesin</label>
                      <input type="text" name="no_mesin" class="form-control" id="no_mesin" value="<?= $detail['nomor_mesin'] ?>" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="warna_kdr">Warna Kendaraan</label>
                      <input type="text" name="warna_kdr" class="form-control" id="warna_kdr" value="<?= $detail['warna_kendaraan'] ?>" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="jenis_kendaraan">Jenis Kendaraan</label>
                      <input type="text" name="jenis_kendaraan" class="form-control" id="jenis_kendaraan" value="<?= $detail['jenis_kendaraan'] ?>" > 
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="merk">Merk</label>
                      <input type="text" name="merk" class="form-control" id="merk" value="<?= $detail['merek'] ?>" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="type_kdr">Type</label>
                      <input type="text" name="type_kdr" class="form-control" id="type_kdr" value="<?= $detail['type_kendaraan'] ?>" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="thn_buat">Tahun Pembuatan</label>
                      <input type="text" name="thn_buat" class="form-control" id="thn_buat" value="<?= $detail['tahun_pembuatan'] ?>" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cc">Silinder/CC</label>
                      <input type="text" name="cc" class="form-control" id="cc" value="<?= $detail['cc'] ?>" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="bahan_bakar">Bahan Bakar</label>
                      <input type="text" name="bahan_bakar" class="form-control" id="bahan_bakar" value="<?= $detail['bahan_bakar'] ?>" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="warna_tnkb">Warna TNKB</label>
                      <select name="warna_tnkb" class="form-control custom-select" >
                        <option value="">-- Pilih --</option>
                        <option value="Plat Hitam" <?= ($detail['warna_tnkb'] == 'Plat Hitam') ? 'selected' : '' ?>>Plat Hitam</option>
                        <option value="Plat Kuning" <?= ($detail['warna_tnkb'] == 'Plat Kuning') ? 'selected' : '' ?>>Plat Kuning</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="pajak_berlaku">Pajak Berlaku s/d</label>
                      <div class="input-group">
                        <input type="text" class="form-control mdate" name="pajak_berlaku" value="<?= $detail['pajak_berlaku'] ?>" readonly>
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
                      <select name="status_milik" class="form-control custom-select" >
                        <option value="">-- Pilih --</option>
                        <?php foreach ($status_milik as $s): ?>
                          <option value="<?= $s['id'] ?>" <?= ($detail['status_milik'] == $s['id']) ? 'selected' : '' ?>><?= $s['status_milik'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="bpkb">BPKB</label>
                      <select name="bpkb" class="form-control custom-select" >
                        <option value="">-- Pilih --</option>
                        <option value="Ada" <?= ($detail['bpkb'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                        <option value="Tidak Ada" <?= ($detail['bpkb'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nomor BPKB</label>
                      <input type="text" name="nomor_bpkb" value="<?= $detail['nomor_bpkb'] ?>" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="harga">Harga</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="text" name="total_harga" class="form-control" id="rupiah" value="<?=  number_format($detail['total_harga'],0,'.','.') ?>" >
        
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="informasi">Informasi Tambahan</label>
                      <textarea class="form-control" name="ket_tambahan" ><?= $detail['keterangan'] ?></textarea>
                    </div>
                  </div>
                </div>
        
                <?php elseif ($id_jenis_asset == 4): ?>
                  <div class="row pt-3">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Dokumen</label>
                        <input type="text" name="dokumen" value="<?= $detail['jenis_dok'] ?>" class="form-control" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="harga">Harga</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">Rp.</span>
                          </div>
                          <input type="text" name="total_harga" class="form-control" id="rupiah" value="<?=  number_format($detail['total_harga'],0,'.','.') ?>" >
        
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="informasi">Alamat</label>
                        <textarea class="form-control" name="alamat" ><?= $detail['alamat'] ?></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="informasi">Informasi Tambahan</label>
                        <textarea class="form-control" name="ket_tambahan" ><?= $detail['keterangan'] ?></textarea>
                      </div>
                    </div>
                  </div>
                <?php elseif ($id_jenis_asset == 5): ?>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="informasi">Alamat</label>
                        <textarea class="form-control" name="alamat" ><?= $detail['alamat'] ?></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="informasi">Keterangan</label>
                        <textarea class="form-control" name="ket_tambahan" ><?= $detail['keterangan'] ?></textarea>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                </div>
        
              </div>
              
            <?php endif; ?>
          </div>
        </div>
    </div>
  </div>

  <?= form_close(); ?>
  
  <!-- <div class="row">
    <div class="col-md-12">
      <div class="card border border-info">
        <div class="card-header bg-info "  >
            <h4 class="card-title text-white" >Foto Dokumen Sebelumnya</h4>
        </div>
        <div class="card-body">
          <div class="row sbl">

          <?php foreach ($foto as $f): ?>
            <div class="col-md-2 thumbnail" style="margin: 10px;">
                 <img class="img-responsive" style="height: 100px; width: 100%;" src="http://vcare.skdigital.id/images/<?= $f['foto'] ?>">
                <img class="img-responsive" style="height: 100px; width: 100%;" src="http://vcare-new.skdigital.id/images/<?= $f['foto'] ?>">
            </div>
          <?php endforeach ?>
          
          </div>
        </div>

      </div>
    </div>
  </div> -->

  <div class="row">
    <div class="col-md-12">
      <div class="card border border-info">
        <div class="card-header bg-info">
            <button class="btn btn-warning float-right" type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Foto</button>
            <h4 class="card-title text-white" >Foto Dokumen</h4>

            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bg-info">
                          <h4 class="modal-title text-white" id="myLargeModalLabel">Tambah Foto</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      </div>
                      <form action="<?= base_url("katalog/simpan_foto/$id_debitur/$id_dokumen_asset/$id_jenis_asset") ?>" method="post" enctype="multipart/form-data">
                      
                      <div class="modal-body">
                        <div class="row d-flex justify-content-center mt-3 mb-3">
                          <div class="col-md-10">
                              <div class="row">
                                  <label class="col-md-3 control-label col-form-label">Tampak Foto</label>
                                  <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="tampak_foto" id="tampak_foto" style="width: 100%; height:36px;" required>  
                                        <option value="">-- Pilih Tampak Foto --</option>
                                        <?php foreach ($jml_tampak_asset as $b): ?>
                                            <?php if ($b['id_tampak_asset'] != 6) : ?>
                                              <option value="<?= $b['id_tampak_asset'] ?>"><?= ucwords($b['tampak_asset']) ?></option>
                                            <?php endif ?>
                                        <?php endforeach;?>
                                    </select>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-10 mt-3">
                              <div class="row">
                                  <label class="col-md-3 control-label col-form-label">Upload Foto</label>
                                  <div class="col-md-9">
                                      <input type="file" name="foto_banyak[]" class="demo form-control" multiple data-jpreview-container="#preview-container2" accept="image/*" /><br>
                                      <div id="preview-container2" class="jpreview-container">
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                          <button class="btn btn-warning waves-effect mr-2" type="submit">Simpan</button>
                          <button type="button" class="btn btn-secondary waves-effect text-left" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                  </div>
                  <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
        <div class="card-body">
          <input type="hidden" name="nama_deb" value="<?= $detail['nama_debitur'] ?>">

          <?php if (($id_jenis_asset == 3) ||($id_jenis_asset == 4) || ($id_jenis_asset == 5)): ?>

            <?php foreach ($foto as $f): ?>

              <input type="hidden" name="foto_lama_banyak[]" value="<?= $f['foto'] ?>">
              
            <?php endforeach ?>

            <input type="file" name="foto_banyak[]" class="demo form-control" multiple data-jpreview-container="#preview-container2" /><br>
            <div id="preview-container2" class="jpreview-container">
            </div>

          <?php else: ?>

            <div class="row p-3 gbr">

                <?php $no=0; foreach ($foto as $f): $no++; ?>
                  <div class="col-lg-3 col-md-6">
                      <!-- Card -->
                      <div class="card shadow card-hover">
                          <div class="card-header bg-info">
                              <h4 class="card-title text-center text-white">Tampak <?= $f['tampak_asset'] ?></h4>
                          </div>

                          <img class="card-img-top img-responsive" style="height: 250px; width: 100%;" src="http://localhost/vcare_new/images/<?php echo $f['foto'];?>" alt="Tampak <?= $f['tampak_asset'] ?>">

                          <div class="card-footer text-center">
                            <a href="<?= base_url("katalog/hapus_foto/$id_debitur/$id_dokumen_asset/".$f['id_tampak_asset']."/".$f['id_foto_dokumen']) ?>"><button class="btn btn-danger btn-sm" type="submit">Hapus</button></a>
                          </div>
                      </div>
                      <!-- Card -->
                  </div>
                <?php endforeach ?>
          

            <!-- <?php $no=1; foreach ($foto as $t): ?>

              <?php 
              $b = str_replace(" ", "_", $t['tampak_asset']);
              $c = str_replace("-", "_", $b);
              $a = 'foto_'.strtolower($c);
              ?>

              <?php if ($t['id_tampak_asset'] != 6): ?>
             
                <div class="col-md-4">
										<div class="form-group has-success">
                    <label><?= ucwords($t['tampak_asset']) ?></label>
                    <input type="hidden" name="foto_lama[]" value="<?= $$a['foto'] ?>">
                    <input type="file" id="input-file-now" name="foto[]" class="dropify" data-default-file="http://vcare-new.skdigital.id/images/<?= $t['foto'] ?>" data-show-remove="false"/>
                    </div>
                    
                    <div class="text-center mb-3">
                      <a href="<?= base_url("katalog/hapus_foto/$id_debitur/$id_dokumen_asset/".$t['id_tampak_asset']."/".$t['id_foto_dokumen']) ?>"><button class="btn btn-danger btn-sm">Hapus</button></a>
                    </div>
                </div>
                
              <?php endif ?>
              

            <?php $no++; endforeach ?> -->

            </div>
              
            <?php endif ?>

      </div>
    </div>
    
  </div>

    </div>
  </div>
<?php endif ?>     
  
</div>

<link rel="stylesheet" href="<?= base_url() ?>template/viewer/css/viewer.css">

<script src="<?= base_url() ?>template/viewer/js/viewer.js"></script>

<script type="text/javascript">

  $('.gbr').viewer();
  $('.sbl').viewer();

</script>


<script type="text/javascript">

  $(document).ready(function () {

    $('.dropify').each(function() {
        dropifyElements[this.id] = true;

        console.log($(this).val());
    });

    var drEvent = $('.dropify').dropify();

    drEvent.on('dropify.beforeClear', function(event, element) {
        id = event.target.id;

        consol.log(id);

        if(dropifyElements[id]) {
            var x = false;
            return swal({   
                title: "Are you sure?",   
                text: "You will not be able undo this operation!",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes, delete it!",   
                cancelButtonText: "No, cancel please!",   
                closeOnConfirm: false,   
                closeOnCancel: false 
            }, function(isConfirm){   
                if (isConfirm) {
                    x = true;
                } else {     
                    swal({
                        title:"Cancelled",
                        text:"Delete Cancelled :)",
                        type:"error",
                        timer: 2000,
                    });
                    x = true;
                } 
            });
            return x;
            //return confirm("Do you really want to delete this image?");
            // return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        }
    });

    $('.tampil_f').on('click', function () {
        var pilih_foto = $('input[name="tampil[]"]:checked').map(function () {
            return this.value;
        }).get();

        console.log(pilih_foto);

        if(pilih_foto != "") 
        {
            $('#proses_tampil').removeAttr('hidden');
        } else {
            $('#proses_tampil').attr('hidden', true);
        }
    })

    $('#proses_tampil').on('click', function () {

        var uri       = $("input[name='id_deb']").val();
        var id_deb    = $("input[name='id_deb']").val();
        var id_dok    = $("input[name='id_dok']").val();
        var id_jenis  = $("input[name='id_jenis']").val();

        var pilih_foto = $('input[name="tampil[]"]:checked').map(function () {
            return this.value;
        }).get();

        swal({
            title       : 'Konfirmasi',
            text        : 'Yakin akan kirim data',
            type        : 'warning',

            showCancelButton    : true,
            confirmButtonText   : 'Kirim Data',
            confirmButtonColor  : '#3085d6',
            cancelButtonColor   : '#d33',
            cancelButtonText    : 'Batal',
            reverseButtons      : true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url         : "<?= base_url('katalog/proses_pilih_foto') ?>",
                    method      : "POST",
                    beforeSend  : function () {
                        swal({
                            title   : 'Menunggu',
                            html    : 'Memproses Data',
                            onOpen  : () => {
                                swal.showLoading();
                            }
                        })
                    },
                    data        : {pilih_foto:pilih_foto, uri:uri, id_deb:id_deb, id_dok:id_dok, id_jenis:id_jenis},
                    dataType    : "JSON",
                    success     : function (data) {

                        swal(
                            'Pilih Foto',
                            'Data Berhasil Disimpan',
                            'success'
                        )

                    },
                    error       : function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                    }

                })

                return false;
            } else if (result.dismiss === swal.DismissReason.cancel) {
                swal(
                    'Batal',
                    'Anda membatalkan pilih foto',
                    'error'
                )
            }
        })
    })

  })

</script>