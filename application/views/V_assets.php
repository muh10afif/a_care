<style>

    .status {
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
						<li class="breadcrumb-item active" aria-current="page">Katalog <?= ucwords($jenis_asset) ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

	<!-- Untuk filter data -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Filter Data</h4>
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="mt-2">Urutkan</label>
                                        </div>
                                        <div class="col-md-12">
                                            <select class="select2 form-control custom-select" name="urutkan" id="urutkan" style="width: 100%; height:36px;">  
												<option value="a">-- Pilih Order By --</option>
												<option value="desc">Terbaru</option>
			                    				<option value="asc">Terlama</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="mt-2">Wilayah</label>
                                        </div>
                                        <div class="col-md-12">
                                            <select class="select2 form-control custom-select" name="wilayah" id="wilayah" style="width: 100%; height:36px;">  
                                                <option value="a">-- Pilih Wilayah --</option>
												<?php foreach ($kota->result_array() as $k): ?>	
													<option value="<?= $k['id_kota'] ?>"><?= $k['kota'] ?></option>
												<?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="mt-2">Harga</label>
                                        </div>
                                        <div class="col-md-12">
                                            <select class="select2 form-control custom-select" name="harga" id="harga" style="width: 100%; height:36px;">  
												<option value="a">-- Urutkan Harga --</option>
												<option value="desc">Termahal</option>
												<option value="asc">Termurah</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="mt-2">Cabang Bank</label>
                                        </div>
                                        <div class="col-md-12">
                                            <select class="select2 form-control custom-select" name="cabang_bank" id="cabang_bank" style="width: 100%; height:36px;">  
                                            <option value="a">-- Pilih Cabang Bank --</option>
                                            <?php foreach ($cabang->result_array() as $c): ?>	
                                                <option value="<?= $c['id_cabang_bank'] ?>"><?= $c['cabang_bank'] ?></option>
                                            <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-md-12" align="right">
                            <button type="button" class="btn btn-success" id="cari">Tampilkan</button><?= nbs(3) ?>
                            <button type="button" class="btn btn-dark" id="reset">Reset</button><?= nbs(3) ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- menampilkan data sesuai jenis asset -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-info">
                    
                    <a href="<?= base_url() ?>katalog/lihat_katalog/<?= $id_jenis_asset ?>"><button class="btn waves-effect waves-light btn-warning btn-sm float-right" type="button" id="tambah_data">Lihat Katalog</button></a>
					<h4 class="mb-0 text-white">List Debitur</h4>	
                </div>
                <div class="card-body table-responsive">

                    <table class="table table-bordered table-hover" id="tabel_katalog_asset" width="100%">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>No</th>
                                <th>Debitur</th>
                                <th>Atas Nama</th>
                                <th>Alamat</th>
                                <th>Wilayah</th>
                                <th>Tanggal</th>
                                <th>Total Harga</th>
                                <th>Cabang Bank</th>
								<th width="20%">Status</th>
								<th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="modal_form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="my-modal-title">Title</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <form action="#" id="form_status" method="POST">
                        <input type="hidden" name="id_status">
                        <input type="hidden" name="id_debitur">
                        
                        <div class="form-group row mt-2">
                            <label for="example-search-input" class="col-3 col-form-label">Nama Debitur</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="debitur" readonly>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="example-search-input" class="col-3 col-form-label">Status Dokumen</label>
                            <div class="col-9">
                                <select name="status_dok" class="form-control select2 is-valid" style="width: 100%; height:36px;">
                                    <option value="a">-- Pilih Status Dokumen --</option>
                                    <?php foreach ($status_dok as $d): ?>
                                        <option value="<?= $d['id_status_info'] ?>"><?= $d['status_info'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="example-search-input" class="col-3 col-form-label">Sifat Asset</label>
                            <div class="col-9">
                                <select name="sifat_asset" class="form-control select2" style="width: 100%; height:36px;">
                                    <option value="a">-- Pilih Sifat Asset --</option>
                                    <?php foreach ($sifat_asset as $s): ?>
                                        <option value="<?= $s['id_sifat_asset'] ?>"><?= $s['sifat_asset'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row mt-2">
                            <label for="example-search-input" class="col-3 col-form-label">Favorit</label>
                            <div class="col-9">
                                <select name="favorit" class="form-control select2" style="width: 100%; height:36px;">
                                    <option value="a">-- Pilih Favorit --</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="example-search-input" class="col-3 col-form-label">Status</label>
                            <div class="col-9">
                                <select name="status" class="form-control select2" style="width: 100%; height:36px;">
                                    <option value="a">-- Pilih Status --</option>
                                    <?php foreach ($status->result_array() as $j): ?>
                                        <option value="<?= $j['id_status_asset'] ?>"><?= $j['status_asset'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="example-search-input" class="col-3 col-form-label">Publish</label>
                            <div class="col-9">
                                <select name="publis" class="form-control select2" style="width: 100%; height:36px;">
                                    <option value="a">-- Pilih Publish --</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-dark mr-2">Batal</button>
                        <button type="button" id="btnSave" onclick="aksi_status()" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    // ubah status
    function ubah_status(id_dok, id_deb) {

        console.log(id_deb);

        $('[name="status_dok"]').select2('val', 'a');
        $('[name="sifat_asset"]').select2('val', 'a');
        $('[name="favorit"]').select2('val', 'a');
        $('[name="status"]').select2('val', 'a');
        $('[name="publis"]').select2('val', 'a');
    
        $.ajax({
            url : "<?php echo site_url('katalog/ambil_data_status')?>/"+id_dok+"/"+id_deb,
            type: "GET",
            beforeSend  : function () {
                swal({
                    title   : 'Menunggu',
                    html    : 'Memproses Data',
                    onOpen  : () => {
                        swal.showLoading();
                    }
                })
            },
            dataType: "JSON",
            success: function(data)
            {
                swal.close();
                
                $('[name="id_status"]').val(data.id_asset);
                $('[name="id_debitur"]').val(data.id_debitur);
                $('[name="debitur"]').val(data.nama_debitur);
                $('[name="status_dok"]').select2('val', data.status_info);
                $('[name="sifat_asset"]').select2('val', data.id_sifat_asset);
                $('[name="favorit"]').select2('val', data.favorit);
                $('[name="status"]').select2('val', data.status);
                $('[name="publis"]').select2('val', data.publis);

                $('#modal_form').modal('show');
                $('.modal-title').text('Ubah Status');

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function aksi_status() {
        $.ajax({
            url         : "<?php echo site_url('katalog/ubah_data_status')?>",
            type        : "POST",
            beforeSend  : function () {
                swal({
                    title   : 'Menunggu',
                    html    : 'Memproses Data',
                    onOpen  : () => {
                        swal.showLoading();
                    }
                })
            },
            data        : $('#form_status').serialize(),
            dataType    : "JSON",
            success: function(data)
            {
                $('#modal_form').modal('hide');

                swal(
                    'Ubah Status',
                    'Data berhasil disimpan',
                    'success'
                )

                tabel_katalog_asset.ajax.reload(null, false);
                
            },
            error: function(jqXHR,textStatus, errorThrown){
                alert('error ubah status');
            }
        }); 
    }

    var tabel_katalog_asset = $('#tabel_katalog_asset').DataTable({

        "processing"    : true,
        "serverSide"    : true,
        "order"         : [],
        "ajax"          : {
            "url"   : "<?= base_url("katalog/tampil_deb_asset/$id_jenis_asset") ?>",
            "type"  : "POST",
            "data"  : function (data) {
                data.urutkan        = $('#urutkan').val();
                data.wilayah        = $('#wilayah').val();
                data.harga          = $('#harga').val();
                data.cabang_bank    = $('#cabang_bank').val();
            }
        },
        "columnDefs"    : [{
            "targets"       : [0, 5, 6],
            "orderable"     : false
        },{
            "targets"       : [8],
            "className"     : 'text-center'
        } ]

    })

$(document).ready(function () {

    // aksi filter data
    $('#cari').click(function () {
        tabel_katalog_asset.ajax.reload(null, false);        
    })

    // aksi reset data filter
    $('#reset').click(function () {
        $('#urutkan').select2("val", 'a');
        $('#wilayah').select2("val", 'a');
        $('#harga').select2("val", 'a');
        $('#cabang_bank').select2("val", 'a');

        tabel_katalog_asset.ajax.reload(null, false);
    })




    
})

</script>