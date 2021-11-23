<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/img/background.png">
  <title>A -CARE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/select2/dist/css/select2.min.css">

  <!-- toast -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/toast/toastr.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/iCheck/all.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>dist/dropify/css/dropify.min.css">

  <!-- JPreview -->
  <link rel="stylesheet" href="<?= base_url() ?>dist/jpreview/jpreview.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style type="text/css">
    .aktif {
      background-color: #f0f0f0;
    }
    .aktif1 {
      background-color: #f0f0f0;
    }
    .navbar1 {
      position: fixed;
    }
  </style>

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar1 navbar-static-top" style="background-color:#122E5D; width: 100%">
      <div class="container">
        <div class="navbar-header" >
          <a href="<?= base_url() ?>home" class="navbar-brand"><b style="font-size: 40px; text-shadow: 2px 1px 2px #000;"><img width="40px" style="margin-top: -10px;" src="<?php echo base_url()?>assets/img/background.png"><?= nbs() ?> Assets Care </b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
       <!--  <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
         <ul class="nav navbar-nav">
           
         </ul>
       </div> -->
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu" id="navbar-collapse" style="background-color:#EDE90F;">
          <ul class="nav navbar-nav a">
            
            <li class="<?= (!empty($home)) ? $home : '' ?>"><a href="<?= base_url() ?>Home"><b style="color: #122E5D"> Home </b></a></li>
            <li class="<?= (!empty($info)) ? $info : '' ?>"><a href="<?= base_url() ?>Info"><b style="color: #122E5D">Information</b></a></li>
            <li class="<?= (!empty($katalog1)) ? $katalog1 : '' ?>"><a href="<?= base_url() ?>Katalog"><b style="color: #122E5D">Katalog</b></a></li>
           
            <li class="dropdown <?= (!empty($aset)) ? $aset : '' ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b style="color: #122E5D">Dokumen Aset</b> <span class="caret" style="color: #122E5D"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class="<?= (!empty($a_kel)) ? 'active' :'' ?>"><a href="<?= base_url() ?>Agunan"><b style="color: #122E5D">Kelolaan</b></a></li>
                <li class="<?= (!empty($a_non_kel)) ? 'active' :'' ?>"><a href="<?= base_url() ?>agunan/non_kelolaan"><b style="color: #122E5D">Non Kelolaan</b></a></li>
              </ul>
            </li>
            
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 50px">
                <!-- The user image in the navbar-->
                <img src="<?= base_url() ?>assets/dist/img/pp3.png" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><b style="color: #122E5D">ADMIN</b></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header" style="background-color:#122E5D;"><br>
                  <img src="<?= base_url() ?>assets/dist/img/pp3.png" class="img-circle" alt="User Image">

                  <p style="color: white;">
                    ADMIN
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="<?= base_url('login/logout') ?>"><button class="btn" style="background-color: #EDE90F; color: #122E5D; font-weight: bold;">L O G O U T</button></a>
                  </div>
                </li>
              </ul>
            </li>
            
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper" style="margin-top: 50px;">
    <div class="container">
      <?= $contents ?>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2019 Solusi Karya Digital.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- toast -->
<script src="<?= base_url() ?>assets/toast/toastr.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/bower_components/chart.js/Chart.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url() ?>dist/dropify/js/dropify.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>

<!-- JPreview -->
    <script src="<?= base_url() ?>dist/jpreview/jpreview.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

<script type="text/javascript">
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    $('.select2').select2()

    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart"        : oSettings._iDisplayStart,
                "iEnd"          : oSettings.fnDisplayEnd(),
                "iLength"       : oSettings._iDisplayLength,
                "iTotal"        : oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage"         : Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages"   : Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var t = $("#mytable").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                        .off('.DT')
                        .on('keyup.DT', function(e) {
                            if (e.keyCode == 13) {
                                api.search(this.value).draw();
                    }
                });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {"url": "agunan/json", "type": "POST"},
            columns: [
                {
                    "data": "ID",
                    "orderable": false
                },
                {"data": "nama_debitur"},
                {"data": "no_klaim"},
                {"data": "bank"},
                {"data": "cabang_bank"},
                {"data": "tgl_klaim"},
                {"data": "cabang_asuransi"},
                {"data": "aksi"}
            ],
            order: [[1, 'asc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info    = this.fnPagingInfo();
                var page    = info.iPage;
                var length  = info.iLength;
                var index   = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    });
</script>


<script type="text/javascript">
    
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
 
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
 
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }
</script>

<script>
    $(function () {
        $('.dropify').dropify();
        $('#tabel').DataTable();
        $('#tabel2').DataTable();
        $('#tabel_non').DataTable({
          "columnDefs": [
            { "orderable": false, "targets": [5] }
        ]
        })

         //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass   : 'iradio_minimal-blue'
        })

        $('.select2').select2()

        //Date picker
        $('#datepicker').datepicker({
          format: 'yyyy-mm-dd',
          autoclose: true
        });

    })


    $('.demo').jPreview();

    

    // Daftar Rekanan

    var save_method;

    function tambah_rekanan() {
      save_method = 'tambah';
      $('#modal_form').modal('show');
    }

    function edit_rekanan(id)
    {
        save_method = 'ubah';
        $('#form')[0].reset(); 
     
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('info/ambil_data_ajax_rekanan')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id_rekanan"]').val(data.id_rekanan);
                $('[name="nama_rekanan"]').val(data.nama_rekanan);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Data Rekanan'); // Set title to Bootstrap modal title
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
     }

     function hapus_rekanan(id)
        {
            if(confirm('Apakah yakin akan menghapus data ini ?'))
            {
                // ajax delete data to database
                $.ajax({
                    url : "<?php echo site_url('info/hapus_rekanan')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        //if success reload ajax table
                        $('#modal_form').modal('hide');
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error deleting data');
                    }
                });
         
            }
        }

     function aksi_rekanan() {
        var url;
 
        if(save_method == 'tambah') {
            url = "<?php echo site_url('info/tambah_rekanan')?>";

        } else {
            url = "<?php echo site_url('info/ubah_data_ajax_rekanan')?>";
        
        }

        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                $('#modal_form').modal('hide');
                window.location.href = "<?php echo site_url('info/info_sk/3')?>";
            },
            error: function(jqXHR,textStatus, errorThrown){
                alert('error Tambah / update');
            }
        });
     }

    // Jadwal Lelang
     var save_method;

    function tambah_lelang() {
      save_method = 'add';
      $('#modal_form_lelang').modal('show');
    }

    function aksi_lelang() {
        var url;
 
        if(save_method == 'add') {
            url = "<?php echo site_url('info/tambah_lelang')?>";

        } else {
            url = "<?php echo site_url('info/ubah_data_ajax_lelang')?>";
        
        }

        $.ajax({
            url : url,
            type: "POST",
            data: $('#form_lelang').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                $('#modal_form_lelang').modal('hide');
                // location.reload();
                window.location.href = "<?php echo site_url('info/info_sk/2')?>";
            },
            error: function(jqXHR,textStatus, errorThrown){
                alert('error Tambah / update');
            }
        });
     }  

     function edit_lelang(id)
    {
        save_method = 'edit';
        $('#form_lelang')[0].reset(); 
     
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('info/ambil_data_ajax_lelang')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id_jadwal_lelang"]').val(data.id_jadwal_lelang);
                $('[name="jenis"]').val(data.id_asset);
                $('[name="tempat"]').val(data.alamat);
                $('[name="tanggal"]').val(data.jadwal_lelang);

                $('#modal_form_lelang').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Data Lelang'); // Set title to Bootstrap modal title
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
     }

     function hapus_lelang(id)
        {
            if(confirm('Apakah yakin akan menghapus data ini ?'))
            {
                // ajax delete data to database
                $.ajax({
                    url : "<?php echo site_url('info/hapus_lelang')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        //if success reload ajax table
                        $('#modal_form_lelang').modal('hide');
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error deleting data');
                    }
                });
         
            }
        }

    // ubah status
    function ubah_status(id_dok, id_deb) {

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('katalog/ambil_data_status')?>/"+id_dok+"/"+id_deb,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id_status"]').val(data.id_asset);
                $('[name="id_debitur"]').val(data.id_debitur);
                $('[name="debitur"]').val(data.nama_debitur);
                $('[name="favorit"]').val(data.favorit);
                $('[name="status"]').val(data.status);
                $('[name="publis"]').val(data.publis);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Ubah Status'); // Set title to Bootstrap modal title
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function aksi_status() {
        $.ajax({
            url : "<?php echo site_url('katalog/ubah_data_status')?>",
            type: "POST",
            data: $('#form_status').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                $('#modal_form').modal('hide');
                location.reload();
            },
            error: function(jqXHR,textStatus, errorThrown){
                alert('error Tambah / update');
            }
        }); 
    }
  

</script>
</body>
</html>
