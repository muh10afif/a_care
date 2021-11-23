<div class="row tbl_deb">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header bg-info">
            <div class="btn-group float-right mr-2">
                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tambah Asset
                </button>
                <div class="dropdown-menu">
                    <?php foreach ($jenis_asset as $j): ?>
                        <a class="dropdown-item" href="javascript:void(0)"><?= ucwords($j['jenis_asset']) ?></a>
                    <?php endforeach; ?>
                    
                </div>
            </div>
            <button class="btn waves-effect waves-light btn-sm float-right btn-warning mr-2" id="simpan_pilih_asset" hidden>Simpan Data</button>
                <h4 class="mb-0 text-white">List Asset <?= ucwords(strtolower($nama_debitur)) ?></h4>
            </div>
            <div class="card-body table-responsive">

                <table class="table table-bordered table-hover" id="tabel_asset_deb" width="100%">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>No</th>
                            <th>Check</th>
                            <th>Jenis Asset</th>
                            <th>Alamat</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
                
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function () {
    
    var tabel_asset_deb = $('#tabel_asset_deb').DataTable({

        "processing"    : true,
        "order"         : [],
        "ajax"          : {
            "url"   : "<?= base_url("agunan/tampil_asset_deb/$id_debitur") ?>",
            "type"  : "POST"
        },
        "columnDefs"    : [{
            "targets"       : [0, 1, 5],
            "orderable"     : false
        }]

    })

    $('#tabel_asset_deb').on('click', '.pilih_asset', function () {
        var pilih_asset = $('input[name="id_dok[]"]:checked').map(function () {
            return this.value;
        }).get();

        if(pilih_asset != "") 
        {
            $('#simpan_pilih_asset').removeAttr('hidden');
        } else {
            $('#simpan_pilih_asset').attr('hidden', true);
        }
    })

})

</script>