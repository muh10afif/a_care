<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">Informasi</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Assets Care</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Informasi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

  <div class="row">
    <div class="col-md-12">
      <div class="card border-info shadow">
          <div class="card-header bg-info">
              <h4 class="mb-0 text-white">Infomasi</h4></div>
          <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#informasi" role="tab"><span class="hidden-sm-up"><span class="hidden-xs-down"><h5>Informasi</h5></span></a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#jadwal_lelang" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down"><h5>Jadwal Lelang</h5></span></a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#daftar_rekanan" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down"><h5>Daftar Rekanan</h5></span></a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#kontak" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down"><h5>Info Kontak</h5></span></a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="informasi" role="tabpanel">
                    <div class="p-20">

                      <div class="row"> 

                        <?php foreach ($informasi as $i): ?>
                          <div class="col-md-4">
                              <div class="card card-hover border border-info">
                                <div class="card-header bg-info">
                                    <h4 class="mb-0 text-white"><?= ucwords($i['jenis_informasi']) ?></h4></div>
                                <div class="card-body">
                                  <input type="hidden" name="id_jenis_informasi[]" value="<?= $i['id_jenis_informasi'] ?>" >
                                  <textarea class="form-control" rows="5" name="informasi[]" id="informasi[]"><?= $i['informasi'] ?></textarea>
                                </div>
                            </div>
                          </div>
                        <?php endforeach; ?>

                      </div>

                      <div class="d-flex justify-content-end">
                        <button type="button" class="btn waves-effect waves-light btn-success" id="simpan_informasi">Simpan</button>
                      </div>
                      
                    </div>
                </div>
                <div class="tab-pane  p-20" id="jadwal_lelang" role="tabpanel">
                  <div class="card border border-info">
                      <div class="card-header bg-info">
                          <button class="btn waves-effect waves-light btn-warning btn-sm float-right" type="button" id="tambah_data">Tambah Data</button>
                          <h4 class="mb-0 text-white">List Jadwal Lelang</h4>
                      </div>
                      <div class="card-body table-responsive">
                          <table class="table table-bordered table-hover" id="tabel_jadwal_lelang" width="100%">
                              <thead class="bg-info text-white">
                                  <tr>
                                      <th>No</th>
                                      <th>Tempat Lelang</th>
                                      <th>Jenis Aset</th>
                                      <th>Tanggal</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                          </table>
                      </div>
                  </div>
                </div>
                <div class="tab-pane p-20" id="daftar_rekanan" role="tabpanel">
                  <div class="card border border-info">
                      <div class="card-header bg-info">
                          <button class="btn waves-effect waves-light btn-warning btn-sm float-right" type="button" id="tambah_rekanan">Tambah Data</button>
                          <h4 class="mb-0 text-white">List Daftar Rekanan</h4>
                      </div>
                      <div class="card-body table-responsive">
                          <table class="table table-bordered table-hover" id="tabel_daftar_rekanan" width="100%">
                              <thead class="bg-info text-white">
                                  <tr>
                                      <th>No</th>
                                      <th>Nama Rekanan</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                          </table>
                      </div>
                  </div>
                </div>
                <div class="tab-pane p-20" id="kontak" role="tabpanel">
                  <div class="card border border-info">
                      <div class="card-header bg-info">
                          <h4 class="mb-0 text-white">List Kontak</h4>
                      </div>
                      <div class="card-body table-responsive">
                          <table class="table table-bordered table-hover" id="tabel_kontak" width="100%">
                              <thead class="bg-info text-white">
                                  <tr>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>No Telepon</th>
                                      <th>No WhatsApp</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                          </table>
                      </div>
                  </div>
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>

</div>

<!-- modal jadwal lelang -->
<div id="modal_jadwal_lelang" class="modal fade" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="vcenter">Tambah Jadwal Lelang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <input type="hidden" id="id_jadwal_lelang" name="id_jadwal_lelang">
            <input type="hidden" id="aksi" name="aksi" value="Tambah">
            <div class="modal-body">

                <div class="row d-flex justify-content-center mt-3 mb-3">
                    <div class="col-md-10">
                        <div class="row">
                            <label class="col-md-3 control-label col-form-label">Jenis Asset</label>
                            <div class="col-md-9">
                              <select class="select2 form-control custom-select" name="jenis_asset" id="jenis_asset" style="width: 100%; height:36px;">  
                                    <option value="a">-- Pilih Jenis Asset --</option>
                                    <?php foreach ($jenis_asset as $b): ?>
                                        <option value="<?= $b['id_jenis_asset'] ?>"><?= ucwords($b['jenis_asset']) ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 mt-3">
                        <div class="row">
                            <label class="col-md-3 control-label col-form-label">Tempat Lelang</label>
                            <div class="col-md-9">
                              <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Tempat Lelang"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 mt-3">
                        <div class="row">
                            <label class="col-md-3 control-label col-form-label">Tanggal Lelang</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="text" class="form-control mdate" name="tgl_lelang" id="tgl_lelang" placeholder="Tanggal Lelang" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark waves-effect mr-2" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-info waves-effect" id="simpan_jadwal_lelang">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah rekanan -->
<div id="modal_daftar_rekanan" class="modal fade" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white judul_rekanan" id="vcenter">Tambah Daftar Rekanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <input type="hidden" id="id_rekanan" name="id_rekanan">
            <input type="hidden" id="aksi_rekanan" name="aksi_rekanan" value="Tambah">
            <div class="modal-body">

                <div class="row d-flex justify-content-center mt-3 mb-3">
                    <div class="col-md-10 mt-3">
                        <div class="row">
                            <label class="col-md-3 control-label col-form-label">Nama Rekanan</label>
                            <div class="col-md-9">
                              <textarea class="form-control" name="nama_rekanan" id="nama_rekanan" placeholder="Masukkan Nama Rekanan"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark waves-effect mr-2" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-info waves-effect" id="simpan_rekanan">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- modal kontak -->
<div id="modal_kontak" class="modal fade" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="vcenter">Edit Info Kontak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <form id="form-kontak" method="POST">
                <input type="hidden" id="id_kontak" name="id_kontak">
                <div class="row d-flex justify-content-center mt-3 mb-3">
                    <div class="col-md-10 mt-3">
                        <div class="row">
                            <label class="col-md-3 control-label col-form-label">Nama Kontak</label>
                            <div class="col-md-9">
                              <textarea class="form-control" name="nama_kontak" id="nama_kontak" placeholder="Masukkan Nama Kontak"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-10 mt-3">
                        <div class="row">
                            <label class="col-md-3 control-label col-form-label">No Telepon</label>
                            <div class="col-md-9">
                              <input type="text" name="no_telp" id="no_telp" class="form-control angka" placeholder="Masukkan No Telepon">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-10 mt-3">
                        <div class="row">
                            <label class="col-md-3 control-label col-form-label">No WhatsApp</label>
                            <div class="col-md-9">
                              <input type="text" name="no_wa" id="no_wa" class="form-control angka" placeholder="Masukkan No WhatsApp">
                            </div>
                        </div>
                    </div>

                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark waves-effect mr-2" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-info waves-effect" id="simpan_kontak">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>

  $(document).ready(function () {

    // INFO KONTAK 

    var tabel_kontak = $('#tabel_kontak').DataTable({
        "processing"    : true,
        "ajax"          : "<?= base_url('info/tampil_kontak') ?>",
        stateSave       : true,
        "order"         : [],
        "paging"        : false,
        "ordering"      : false,
        "info"          : false,
        "searching"     : false
    }) 

    $('#tabel_kontak').on('click', '.edit-kontak', function () {
        
        var id_kontak = $(this).data('id');

        $.ajax({
            url : "<?php echo base_url('info/ambil_data_ajax_kontak')?>/"+id_kontak,
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

                $('[name="id_kontak"]').val(data.id_kontak);
                $('[name="nama_kontak"]').val(data.nama);
                $('[name="no_telp"]').val(data.no_telp);
                $('[name="no_wa"]').val(data.no_wa);

                $('#modal_kontak').modal('show');
                $('.modal-title').html('Edit Info Kontak');
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });

    })

    // aksi simpan kontak 
    $('#simpan_kontak').on('click', function () {
        
        var id_kontak   = $('#id_kontak').val();
        var nama_kontak = $('#nama_kontak').val();
        var no_telp     = $('#no_telp').val();
        var no_wa       = $('#no_wa').val();

        var data = $('#form-kontak').serialize();

        if (nama_kontak == '') {
            swal(
                'Peringatan',
                'Harap isi nama kontak',
                'warning'
            )

            return false;
        } else if(no_telp == '') {
            swal(
                'Peringatan',
                'Harap isi nomer telepon',
                'warning'
            )

            return false;
        } else if(no_wa == '') {
            swal(
                'Peringatan',
                'Harap isi nomer whatsapp',
                'warning'
            )

            return false;
        } else {

            swal({
                title       : 'Konfirmasi',
                text        : 'Yakin akan kirim data',
                type        : 'warning',

                showCancelButton    : true,
                confirmButtonText   : 'Kirim Data',
                confirmButtonColor  : '#d33',
                cancelButtonColor   : '#3085d6',
                cancelButtonText    : 'Batal',
                reverseButtons      : true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url         : "<?= base_url('info/ubah_data_kontak') ?>",
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
                        data        : data,
                        dataType    : "JSON",
                        success     : function (data) {

                            tabel_kontak.ajax.reload(null, false);

                            swal(
                                'Ubah Info Kontak',
                                'Data Berhasil Disimpan',
                                'success'
                            )
                            
                            $('#modal_kontak').modal('hide');
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
                        'Anda membatalkan ubah info kontak',
                        'error'
                    )
                }
            })

        }

    })

    // DAFTAR REKANAN

    var tabel_daftar_rekanan = $('#tabel_daftar_rekanan').DataTable({

        "processing"    : true,
        "serverSide"    : true,
        "order"         : [],
        "ajax"          : {
            "url"   : "<?= base_url("info/tampil_daftar_rekanan") ?>",
            "type"  : "POST"
        },
        "columnDefs"    : [{
            "targets"       : [0, 2],
            "orderable"     : false
        }]

    })

    // aksi button tambah rekanan
    $('#tambah_rekanan').on('click', function () {
        $('#modal_daftar_rekanan').modal('show');

        $('#nama_rekanan').val('');
        $('.judul_rekanan').text('Tambah Daftar Rekanan');
        $('#aksi_rekanan').val('Tambah');
    })

    // aksi simpan rekanan
    $('#simpan_rekanan').on('click', function () {
        var id_rekanan      = $('#id_rekanan').val();
        var aksi_rekanan    = $('#aksi_rekanan').val();
        var nama_rekanan    = $('#nama_rekanan').val();

        if (nama_rekanan == '') {
            swal(
                'Peringatan',
                'Harap isi nama rekanan',
                'warning'
            )

            return false;
        } else {

            swal({
              title       : 'Konfirmasi',
              text        : 'Yakin akan kirim data',
              type        : 'warning',

              showCancelButton    : true,
              confirmButtonText   : 'Kirim Data',
              confirmButtonColor  : '#d33',
              cancelButtonColor   : '#3085d6',
              cancelButtonText    : 'Batal',
              reverseButtons      : true
          }).then((result) => {
              if (result.value) {
                  $.ajax({
                      url         : "<?= base_url('info/aksi_daftar_rekanan') ?>",
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
                      data        : {id_rekanan:id_rekanan, aksi_rekanan:aksi_rekanan, nama_rekanan:nama_rekanan},
                      dataType    : "JSON",
                      success     : function (data) {

                        tabel_daftar_rekanan.ajax.reload(null, false);

                          swal(
                              aksi_rekanan+' Daftar Rekanan',
                              'Data Berhasil Disimpan',
                              'success'
                          )
                          
                          $('#modal_daftar_rekanan').modal('hide');
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
                      'Anda membatalkan '+aksi_rekanan.toLowerCase()+' daftar rekanan',
                      'error'
                  )
              }
          })

        }
        
    })

    // menampilkan data edit rekanan
    $('#tabel_daftar_rekanan').on('click', '.edit-rekanan', function () {

        var id_rekanan = $(this).data('id');

        $.ajax({
            url : "<?php echo base_url('info/ambil_data_ajax_rekanan')?>/"+id_rekanan,
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

                $('[name="id_rekanan"]').val(data.id_rekanan);
                $('[name="nama_rekanan"]').val(data.nama_rekanan);

                $('#modal_daftar_rekanan').modal('show');
                $('.judul_rekanan').text('Edit Daftar Rekanan');
                $('#aksi_rekanan').val('Edit');
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    })

    // aksi hapus rekanan
    $('#tabel_daftar_rekanan').on('click', '.hapus-rekanan', function () {
        
        var id_rekanan      = $(this).data('id');
        var aksi_rekanan    = 'Hapus';

        swal({
            title       : 'Konfirmasi',
            text        : 'Yakin akan hapus data',
            type        : 'warning',

            showCancelButton    : true,
            confirmButtonText   : 'Hapus Data',
            confirmButtonColor  : '#d33',
            cancelButtonColor   : '#3085d6',
            cancelButtonText    : 'Batal',
            reverseButtons      : true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url         : "<?= base_url('info/aksi_daftar_rekanan') ?>",
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
                    data        : {aksi_rekanan:aksi_rekanan, id_rekanan:id_rekanan},
                    dataType    : "JSON",
                    success     : function (data) {

                        tabel_daftar_rekanan.ajax.reload(null, false);

                        swal(
                            'Hapus Rekanan',
                            'Data Berhasil Disimpan',
                            'success'
                        )
                        
                        $('#modal_daftar_rekanan').modal('hide');

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
                    'Anda membatalkan hapus daftar rekanan',
                    'error'
                )
            }
        })

    })


    // JADWAL LELANG

      var tabel_jadwal_lelang = $('#tabel_jadwal_lelang').DataTable({

        "processing"    : true,
        "serverSide"    : true,
        "order"         : [],
        "ajax"          : {
            "url"   : "<?= base_url("info/tampil_jadwal_lelang") ?>",
            "type"  : "POST"
        },
        "columnDefs"    : [{
            "targets"       : [0, 4],
            "orderable"     : false
        }]

      })

      // aksi tambah data
      $('#tambah_data').on('click', function () {
          $('#modal_jadwal_lelang').modal('show');

          $('#jenis_asset').select2('val', 'a');
          $('#alamat').val('');
          $('.mdate').datepicker('setDate', null);
          $('.modal-title').text('Tambah Jadwal Lelang');
          $('#aksi').val('Tambah');
      })

      // proses simpan jadwal lelang
      $('#simpan_jadwal_lelang').on('click', function () {
         
        var id_jenis_asset    = $('#jenis_asset').val();
        var alamat            = $('#alamat').val();
        var tgl_lelang        = $('#tgl_lelang').val();
        var aksi              = $('#aksi').val();
        var id_jadwal_lelang  = $('#id_jadwal_lelang').val();

        if (id_jenis_asset == 'a') {
          swal(
            'Peringatan',
            'Harap isi jenis asset',
            'warning'
          )

          return false;
        } else if (alamat == '') {
          swal(
            'Peringatan',
            'Harap isi alamat',
            'warning'
          )

          return false;
        } else if (tgl_lelang == '') {
          swal(
            'Peringatan',
            'Harap isi tanggal lelang',
            'warning'
          )

          return false;
        } else {

          swal({
              title       : 'Konfirmasi',
              text        : 'Yakin akan kirim data',
              type        : 'warning',

              showCancelButton    : true,
              confirmButtonText   : 'Kirim Data',
              confirmButtonColor  : '#d33',
              cancelButtonColor   : '#3085d6',
              cancelButtonText    : 'Batal',
              reverseButtons      : true
          }).then((result) => {
              if (result.value) {
                  $.ajax({
                      url         : "<?= base_url('info/aksi_jadwal_lelang') ?>",
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
                      data        : {id_jenis_asset:id_jenis_asset, alamat:alamat, tgl_lelang:tgl_lelang, aksi:aksi, id_jadwal_lelang:id_jadwal_lelang},
                      dataType    : "JSON",
                      success     : function (data) {

                          tabel_jadwal_lelang.ajax.reload(null, false);

                          swal(
                              aksi+' Jadwal Lelang',
                              'Data Berhasil Disimpan',
                              'success'
                          )
                          
                          $('#modal_jadwal_lelang').modal('hide');
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
                      'Anda membatalkan '+aksi.toLowerCase()+' jadwal lelang',
                      'error'
                  )
              }
          })

        }
         

      })

      // aksi edit jadwal lelang
      $('#tabel_jadwal_lelang').on('click', '.edit-lelang', function () {
        
        var id_jadwal_lelang = $(this).data('id');

        // $('#spinner').removeAttr('hidden');
        // $('#namanya').hide();

        $.ajax({
            url : "<?php echo base_url('info/ambil_data_ajax_lelang')?>/"+id_jadwal_lelang,
            type: "GET",
            beforeSend  : function () {
              // $('#spinner').removeAttr('hidden');
              // $('#namanya').hide();
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

                $('[name="id_jadwal_lelang"]').val(data.id_jadwal_lelang);
                $('[name="jenis_asset"]').select2('val', data.id_asset);
                $('[name="alamat"]').val(data.alamat);
                $('[name="tgl_lelang"]').val(data.jadwal_lelang);

                $('#modal_jadwal_lelang').modal('show');
                $('.modal-title').text('Edit Jadwal Lelang');
                $('#aksi').val('Edit');
                // $('#spinner').attr('hidden', true);
                // $('#namanya').show();
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });

      })


      // aksi hapus jadwal lelang 
      $('#tabel_jadwal_lelang').on('click', '.hapus-lelang', function () {
        
          var id_jadwal_lelang  = $(this).data('id');
          var aksi              = 'Hapus';

          swal({
              title       : 'Konfirmasi',
              text        : 'Yakin akan hapus data',
              type        : 'warning',

              showCancelButton    : true,
              confirmButtonText   : 'Hapus Data',
              confirmButtonColor  : '#d33',
              cancelButtonColor   : '#3085d6',
              cancelButtonText    : 'Batal',
              reverseButtons      : true
          }).then((result) => {
              if (result.value) {
                  $.ajax({
                      url         : "<?= base_url('info/aksi_jadwal_lelang') ?>",
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
                      data        : {aksi:aksi, id_jadwal_lelang:id_jadwal_lelang},
                      dataType    : "JSON",
                      success     : function (data) {

                          tabel_jadwal_lelang.ajax.reload(null, false);

                          swal(
                              'Hapus Jadwal Lelang',
                              'Data Berhasil Disimpan',
                              'success'
                          )
                          
                          $('#modal_jadwal_lelang').modal('hide');

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
                      'Anda membatalkan hapus jadwal lelang',
                      'error'
                  )
              }
          })

      })


    // INFORMASI

      // aksi simpan informasi
      $('#simpan_informasi').on('click', function () {
        
        var informasi = $('textarea[name="informasi[]"]').map(function () {
            return this.value;
        }).get();

        var id_jenis_informasi = $('input[name="id_jenis_informasi[]"]').map(function () {
            return this.value;
        }).get();

        $.ajax({
            url         : "<?= base_url('info/simpan_informasi') ?>",
            type        : "POST",
            beforeSend  : function () {
              swal({
                title   : 'Menunggu',
                html    : 'Memproses data',
                onOpen  : () => {
                  swal.showLoading();
                }
              })
            },
            data      : {informasi:informasi, id_jenis_informasi:id_jenis_informasi},
            dataType  : "JSON",
            success   : function (data) {
              swal(
                'Simpan Data',
                'Berhasil simpan data informasi',
                'success'
              )
            }
        })

      return false;

      })
    
  })

</script>