<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?= base_url() ?>template/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url() ?>template/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>template/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!--This page plugins -->
<script src="<?= base_url() ?>template/assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="<?= base_url() ?>template/dist/js/pages/datatable/datatable-basic.init.js"></script>
<!-- date picker -->
<script src="<?= base_url() ?>template/Cross-browser-Date-Time-Selector/date-time-picker.min.js"></script>
<!-- apps -->
<script src="<?= base_url() ?>template/dist/js/app.min.js"></script>
<!-- minisidebar -->
<script>
$(function() {
    "use strict";
    $("#main-wrapper").AdminSettings({
        Theme: false, // this can be true or false ( true means dark and false means light ),
        Layout: 'vertical',
        LogoBg: 'skin1', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6 
        NavbarBg: 'skin6', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
        SidebarType: 'mini-sidebar', // You can change it full / mini-sidebar / iconbar / overlay
        SidebarColor: 'skin1', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
        SidebarPosition: false, // it can be true / false ( true means Fixed and false means absolute )
        HeaderPosition: false, // it can be true / false ( true means Fixed and false means absolute )
        BoxedLayout: false, // it can be true / false ( true means Boxed and false means Fluid ) 
    });
});
</script>
<script src="<?= base_url() ?>template/dist/js/app-style-switcher.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?= base_url() ?>template/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= base_url() ?>template/assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="<?= base_url() ?>template/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?= base_url() ?>template/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= base_url() ?>template/dist/js/custom.js"></script>
<!--This page JavaScript -->
<script src="<?= base_url() ?>template/assets/libs/moment/moment.js"></script>
<script src="<?= base_url() ?>template/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>template/assets/libs/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker-custom.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>template/assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>template/assets/libs/select2/dist/js/select2.min.js"></script>
<script src="<?= base_url() ?>template/dist/js/pages/forms/select2/select2.init.js"></script>
<!-- sweet alert -->
<script src="<?= base_url() ?>template/assets/swa/sweetalert2.all.min.js"></script>
<!-- separator divider -->
<script src="<?= base_url() ?>template/divider/number-divider.min.js"></script>
<!-- Dropify -->
<script src="<?= base_url() ?>template/dropify/dist/js/dropify.min.js"></script>

<!-- JPreview -->
<script src="<?= base_url() ?>dist/jpreview/jpreview.js"></script>

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

    $(document).ready(function () {

        $('.dropify').dropify({
            messages: {
                default: 'Drag atau drop untuk memilih gambar',
                replace: 'Ganti',
                remove:  'Hapus',
                error:   'error'
            }
        });
        
    })

    $('.demo').jPreview();

    $('.tabel').DataTable();

    $('body').tooltip({selector: '[data-toggle="tooltip"]'});

    $('.angka').keypress(function(event) {
        if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    $('.mdate').bootstrapMaterialDatePicker({ format: 'DD MMMM YYYY', weekStart: 0, time: false });

    jQuery('#date-range-2').datepicker({
        toggleActive: true,
        orientation : "bottom",
        autoclose   : true,
        format      : "dd-MM-yyyy"
    });

    $(document).ready(function () {
        $('#tabel').DataTable();
    })

    $('#tanggal').dateTimePicker({

    // used to limit the date range
    limitMax: null, 
    limitMin: null, 

    // year name
    yearName: '',

    // month names
    monthName: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

    // day names
    dayName: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],

    // "date" or "dateTime"
    mode: 'date', 

    // custom date format
    format: null 

    });

    $('#tanggal2').dateTimePicker({

    // used to limit the date range
    limitMax: null, 
    limitMin: null, 

    // year name
    yearName: '',

    // month names
    monthName: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

    // day names
    dayName: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],

    // "date" or "dateTime"
    mode: 'date', 

    // custom date format
    format: null 

    });

    $('#tanggal_3').dateTimePicker({

        // used to limit the date range
        limitMax: null, 
        limitMin: null, 

        // year name
        yearName: '',

        // month names
        monthName: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

        // day names
        dayName: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],

        // "date" or "dateTime"
        mode: 'date', 

        // custom date format
        format: null 

        });

        $('#tanggal_4').dateTimePicker({

        // used to limit the date range
        limitMax: null, 
        limitMin: null, 

        // year name
        yearName: '',

        // month names
        monthName: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

        // day names
        dayName: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],

        // "date" or "dateTime"
        mode: 'date', 

        // custom date format
        format: null 

        });

        $('#tanggal_exp').dateTimePicker({

        // used to limit the date range
        limitMax: null, 
        limitMin: null, 

        // year name
        yearName: '',

        // month names
        monthName: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

        // day names
        dayName: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],

        // "date" or "dateTime"
        mode: 'date', 

        // custom date format
        format: null 

        });

        $('.tanggal').dateTimePicker({

        // used to limit the date range
        limitMax: null, 
        limitMin: null, 

        // year name
        yearName: '',

        // month names
        monthName: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

        // day names
        dayName: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],

        // "date" or "dateTime"
        mode: 'date', 

        // custom date format
        format: null 

        });


        $('.tanggal1').dateTimePicker({

            // used to limit the date range
            limitMax: null, 
            limitMin: null, 

            // year name
            yearName: '',

            // month names
            monthName: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

            // day names
            dayName: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],

            // "date" or "dateTime"
            mode: 'date', 

            // custom date format
            format: null 

            });
            
            $('.tanggal2').dateTimePicker({

            // used to limit the date range
            limitMax: null, 
            limitMin: null, 

            // year name
            yearName: '',

            // month names
            monthName: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

            // day names
            dayName: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],

            // "date" or "dateTime"
            mode: 'date', 

            // custom date format
            format: null 

            });
</script>