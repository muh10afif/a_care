<?php
  
$nama_dokumen='PDF';
//require(APPPATH.'third_party/fpdf.php'); // file fpdf.php harus diincludekan
// require(APPPATH.'third_party/mpdf-baru/src/Mpdf.php');
base_url('vendor/autoload.php');

//$mpdf=new \Mpdf\Mpdf('utf-8', 'A4-L', 8, 'arial','4','15','5','16','9','9','L'); // Membuat file mpdf baru
$mpdf=new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [190, 236],
    'orientation' => 'L'
]); // Membuat file mpdf baru

/*$mpdf = new mPDF('',    // mode - default ''
 '',    // format - A4, for example, default ''
 0,     // font size - default 0
 '',    // default font family
 15,    // margin_left
 15,    // margin right
 16,     // margin top
 16,    // margin bottom
 9,     // margin header
 9,     // margin footer
 'L');  // L - landscape, P - portrait*/
 
//Memulai proses untuk menyimpan variabel php dan html
ob_start();
 
?>
<!doctype html>
<html>
    <head>
        <title></title>

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <style>
    th, td {
      padding: 10px;

    }

    th {
      text-align: center;
    }

    </style>
    </head>
    <body>
        
    <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
        <tr>
        <th colspan="6" style="font-size: 20px;">LAPORAN DATA PROPERTI JUAL</th>
        </tr>
        <tr>
          <th colspan="6">CV. SOLUSI PRIMA</th>
        </tr>
        <tr>
          <th colspan="6">Jln. Gunung Batu No. 25 Bandng</th>
        </tr>
        </thead>
      </table>
      
    </div>
    <div class="col-md-12" style="height: 5px; background-color: black;"></div><br>
    <div class="col-md-12">
      <table border="1" width="100%">
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
          <?php $no=1; foreach ($asset->result_array() as $a): ?>
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
 
<?php
//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
 
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>