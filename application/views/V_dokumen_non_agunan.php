<style type="text/css">
	table tr th {
		text-align: center;
	}
	#a td {
		vertical-align: middle;
	}
</style>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">Dokumen Asset Non Kelolaan</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Assets Care</a></li>
						<li class="breadcrumb-item">Dokumen Asset</li>
						<li class="breadcrumb-item active" aria-current="page">Debitur Non Kelolaan</li>
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
				<div class="card-header bg-info">
					<div class="btn-group">
						<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Tambah Asset
						</button>
						<div class="dropdown-menu animated flipInX">
							<?php foreach ($jenis_asset as $j): ?>
								<li><a  class="dropdown-item" href="<?= base_url("agunan/tambah_agunan/0/".$j['id_jenis_asset']) ?>"><?= ucwords($j['jenis_asset']) ?></a></li>
							<?php endforeach ?>
						</div>
					</div>

					<?php if (!empty($asset)): ?>
						<button class="btn waves-effect waves-warning btn-warning pull-right" type="button" id="pilih_asset" hidden>Pilih Asset</button>
					<?php endif ?>
				</div>
				<div class="card-body table-responsive">
					<table class="table table-bordered table-hover tabel" width="100%">
	            		<thead class="bg-info text-white">
	            			<tr>
	            				<th>No</th>
	            				<th>Jenis Asset</th>
	            				<th>Atas Nama</th>
	            				<th>Alamat</th>
	            				<th>Tanggal</th>
	            				<th><input type="checkbox" class="pilih_dok" id="checkAll"> <?= nbs(7) ?>Aksi </th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			<?php $no=1; foreach ($asset as $a): ?>
	            				<tr>
		            				<td align="center"><?= $no ?></td>
		            				<td><?= strtoupper($a['jenis_asset']) ?></td>
		            				<td><?= $a['atas_nama'] ?></td>
		            				<td><?= $a['alamat'] ?></td>
		            				<td align="center"><?= tgl_indo_timestamp($a['tanggal_dok']) ?></td>
		            				<td align="center">
		            					<?php if ($a['status'] == 1): ?>
		            						<label>
			            						<input type="hidden" name="id_dok_asset[]" value="<?= $a['id_dokumen_asset'] ?>">
							                  <input type="checkbox" id="cek" name="id_dok[]" class="pilih_dok" value="<?= $a['id_dokumen_asset'] ?>"> Pilih
							                </label><?= nbs(5) ?>
		            					<?php endif ?>
		            					<a href="<?php echo base_url() ?>katalog/detail_asset/<?= $a['id_jenis_asset'] ?>/<?= $a['id_debitur'] ?>/<?= $a['id_dokumen_asset'] ?>/det_debitur"><button class="btn btn-sm waves-effect waves-light btn-outline-info" type="button">Detail</button></a></td>
		            			</tr>
	            			<?php $no++; endforeach ?>
	            		</tbody>
	            	</table>
				</div>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript">
	$("#checkAll").click(function(){
	    $('input:checkbox').not(this).prop('checked', this.checked);
	});
</script>

<script type="text/javascript">

  $(document).ready(function () {

    $('.pilih_dok').on('click', function () {
        var pilih_asset = $('input[name="id_dok[]"]:checked').map(function () {
            return this.value;
        }).get();

        console.log(pilih_asset);

        if(pilih_asset != "") 
        {
            $('#pilih_asset').removeAttr('hidden');
        } else {
            $('#pilih_asset').attr('hidden', true);
        }
    })

    $('#pilih_asset').on('click', function () {

		var id_dok_asset = $('input[name="id_dok_asset[]"]').map(function () {
            return this.value;
        }).get();

        var id_dok = $('input[name="id_dok[]"]:checked').map(function () {
            return this.value;
        }).get();

		console.log(id_dok_asset);

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
                    url         : "<?= base_url('agunan/ubah_status_non_debitur') ?>",
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
                    data        : {id_dok_asset:id_dok_asset, id_dok:id_dok},
                    dataType    : "JSON",
                    success     : function (data) {

                        swal({
                            title : 'Pilih Asset',
                            html : 'Data Berhasil Disimpan',
                            type : 'success',
							timer: 800,
							showConfirmButton: false
						}).then(function () {
							location.reload();
						})

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
                    'Anda membatalkan pilih asset',
                    'error'
                )
            }
        })
    })

  })

</script>