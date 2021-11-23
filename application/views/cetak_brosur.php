<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.js"></script>
    <style type="text/css">
		body {
		  background: rgb(204,204,204); 
		}
		page {
		  background: white;
		  display: block;
		  margin: 0 auto;
		  box-shadow: 1px;
		}
		page[size="A5"] {  
		  width: 14.8cm;
		  height: 21cm; 
		}

		@media print {
		  body, page {
		    margin: 0;
		    box-shadow: 0;
		  }
		}

		#kiri
		{
			width:6cm;
			height:7cm;
			background-color:#E6E6FA;
			float:left;

		}
		#kanan
		{
			width:8.4cm;
			max-height: 7cm;
			background-color:d;
			float:right;
		}
	</style>

</head>
<body class="fixed-left" style="border: 1px">
<div id="yourTableIdName">
<page size="A5">
<div class="container">
		<img src="<?php echo base_url('assets/img/brosur/atas.jpg');?>" style="width: 14.8cm">

		        <img src="http://vcare.skdigital.id/images/<?php echo $foto['foto'] ?>" style="width: 14.8cm; height: 9.5cm">
		<div id="kiri">
			<img src="<?php echo base_url('assets/img/brosur/samping.jpg');?>" style="width: 6cm">
		</div>
		<div id="kanan" style="color: #0D172B">
	    
	          	<div style="height: 11.5px"></div>
	          	<p style="font-size: 18px; font-family: arial; text-transform: uppercase;"><b><up><?php echo $foto['jenis_asset'] ?></up></b></p>
	          	<p style="font-size: 18px; font-family: arial"><b>Rp <?php echo number_format($foto['harga'],0,',','.'); ?> (Nego)</b></p>
	          	<p style="font-size: 12px; font-family: arial"><b><?php echo (!empty($foto['keterangan'])) ? $foto['keterangan'] : '-' ?></b></p>
	          	<p style="font-size: 12px; font-family: arial"><b><?php echo (!empty($foto['alamat'])) ? $foto['alamat'] : '-' ?></b></p>
	          	<div style="height: 0.3px"></div>
	          	<p style="font-size: 14px; font-family: arial"><b><?php echo $foto['nama_lengkap'] ?></b></p>
	          	<div style="height: 0.1px"></div>
	          	<p style="font-size: 14px; font-family: arial"><b><?php echo $foto['telfon'] ?></b></p>
	         
	    </div>
	    <img src="<?php echo base_url('assets/img/brosur/bawah.jpg');?>" style="width: 14.8cm; height:0.5cm">
</div>
</div>
</page>
<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script src="<?php echo base_url('assets/blue/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/blue/js/bootstrap.min.js');?>"></script>

<script>
		window.print();
</script>
</body>
</html>