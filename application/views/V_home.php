<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Assets Care</a></li>
						<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

  <div class="row">
    <!-- kiri -->
    <div class="col-md-3">
      <div class="card border-dark shadow">
          <div class="card-header bg-light">
              <h4 class="mb-0">Jenis Agunan</h4></div>
          <div class="card-body">

            <?php foreach ($jenis_asset->result_array() as $j): ?>
                <a href="<?= base_url() ?>katalog/asset/<?= $j['id_jenis_asset'] ?>">

                  <div class="d-flex flex-row mt-2 card-hover">
                    <div class="bg-info text-center" style="width: 60px;">
                        <h3 class="text-white box mt-2"><i class="<?= $j['icon'] ?>" aria-hidden="true"></i></h3></div>
                    <div class="p-10" style="margin-top: 10px;">
                        <h3 class="text-info mb-0" style="font-size: 17px;"><?php $a = $j['jenis_asset']; echo ucfirst($a); ?></h3>
                    </div>
                </div>

                </a>
            <?php endforeach ?>

          </div>
      </div>
      <div class="d-flex justify-content-center mb-2">
          <div class="btn-group">
						<button type="button" class="btn btn-warning dropdown-toggle mr-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Unduh Excel
						</button>
						<div class="dropdown-menu animated flipInX">
							<?php foreach ($jenis_asset->result_array() as $j): ?>
								<li><a class="dropdown-item" href="<?= base_url("home/unduh_data/excel/".$j['id_jenis_asset']) ?>"><?= ucwords($j['jenis_asset']) ?></a></li>
							<?php endforeach ?>
						</div>
					</div>
      <a target="blank" href="<?= base_url('home/unduh_data/pdf') ?>"><button class="btn btn-success card-hover" style="font-weight: bold;"><i class="fa fa-download"></i><?= nbs(3) ?>Unduh Pdf</button></a>
      </div>
    </div>
    <div class="col-md-6">
      <div id="favorit" class="carousel slide shadow" data-ride="carousel">
          <ol class="carousel-indicators">

              <?php 
                $a = count($favorite);

                for ($i = 0; $i < $a; $i++) : ?>

                <?php if ($i == 0) : ?>
                  <li data-target="#favorit" data-slide-to="<?= $i ?>" class="active"></li>
                <?php else: ?>
                  <li data-target="#favorit" data-slide-to="<?= $i ?>"></li>
                <?php endif ?>

              <?php endfor ?>

          </ol>
          <div class="carousel-inner" role="listbox">

          <?php if (!empty($favorite)): ?>

            <?php $no=0; foreach ($favorite as $r) : $no++?>
              <?php if ($no == 1): ?>
              <div class="carousel-item active">
                <img width="100%" src="http://vcare-new.skdigital.id/images/<?php echo $r['foto'];?>" alt="First slide">
                <!-- <img width="100%" src="http://localhost/vcare/images/<?php echo $r['foto'];?>" alt="First slide"> -->

                <div class="carousel-caption d-none d-md-block">

                    <h3 class="text-white"><?php $a = $r['jenis_asset']; echo ucfirst($a); ?></h3>
                    <p><?= $r['nama_debitur'] ?></p>

                </div>
              </div>
              <?php else: ?>
                <div class="carousel-item">
                <img width="100%" src="http://vcare-new.skdigital.id/images/<?php echo $r['foto'];?>" alt="First slide">
                <!-- <img width="100%" src="http://localhost/vcare/images/<?php echo $r['foto'];?>" alt="First slide"> -->

                 <div class="carousel-caption d-none d-md-block">

                    <h3 class="text-white"><?php $a = $r['jenis_asset']; echo ucfirst($a); ?></h3>
                    <p><?= $r['nama_debitur'] ?></p>
                    
                </div>
              </div>
                
              <?php endif ?>
            <?php endforeach ?>

            <?php else: ?>

              <div class="carousel-item active">
                  <img class="img-fluid" src="<?= base_url() ?>template/assets/images/big/img3.jpg" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                      <h3 class="text-white">Favorit</h3>
                      <p>Foto Favorit</p>
                  </div>
              </div>

            <?php endif ?>

          </div>

          <?php if (count($favorite) > 1): ?>
            <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
          <?php endif ?>

      </div>
      <div class="card border-info shadow mt-3">
          <div class="card-header">
              <h4 class="mb-0">Daftar Rekanan</h4></div>
          <div class="card-body text-center">
            <?php foreach ($rekanan->result_array() as $r): ?>
              <span class="badge badge-info mb-2"><?= $r['nama_rekanan'] ?></span><?= nbs(5) ?></span>
            <?php endforeach ?>
          </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-left border-success shadow">
          <div class="card-body">
            <table class="table"> 
                <tr style="border-top: hidden;">
                    <td style="vertical-align: middle; color: #31c44e; font-size: 18px;">Siap Lelang</td>
                    <td style="vertical-align: middle; color: #31c44e; font-size: 23px; text-align: center;"><b><?= $siap_lelang ?></b> Unit</td>
                </tr>
                <tr style="border-top: hidden;">
                    <td style="vertical-align: middle; color: #31c44e; font-size: 18px;">Siap Jual</td>
                    <td style="vertical-align: middle; color: #31c44e; font-size: 23px; text-align: center;"><b><?= $siap_jual ?></b> Unit</td>
                </tr>
                <tr style="border-top: hidden;">
                    <td style="vertical-align: middle; color: #31c44e; font-size: 18px;">Tunggu Bayar</td>
                    <td style="vertical-align: middle; color: #31c44e; font-size: 23px; text-align: center;"><b><?= $tunggu_bayar ?></b> Unit</td>
                </tr>
                <tr style="border-top: hidden;">
                    <td style="vertical-align: middle; color: #31c44e; font-size: 18px;">Nego Ulang</td>
                    <td style="vertical-align: middle; color: #31c44e; font-size: 23px; text-align: center;"><b><?= $nego_ulang ?></b> Unit</td>
                </tr>
                <tr style="border-top: hidden;">
                    <td style="vertical-align: middle; color: #31c44e; font-size: 18px;">Proses</td>
                    <td style="vertical-align: middle; color: #31c44e; font-size: 23px; text-align: center;"><b><?= $proses ?></b> Unit</td>
                </tr>
                <tr style="border-top: inset; border-color: white;">
                    <td style="vertical-align: middle; color: #31c44e; font-size: 18px;">Total</td>
                    <td style="vertical-align: middle; color: #31c44e; font-size: 23px; text-align: center;"><b><?= $siap_lelang+$siap_jual+$tunggu_bayar+$nego_ulang+$proses ?></b> Unit</td>
                </tr> 
            </table>
          </div>
      </div>
      <div class="card shadow mt-2">
        <div class="card-header">
            <h4 class="mb-0">Wilayah</h4></div>
        <div class="card-body">
          <ul class="list-group" style="text-align: left; font-size: 15px;">
              <?php foreach ($wilayah as $a): ?>
                <li class="list-group-item "><?= str_replace('KC ', '', $a['cabang_bank']) ?></li>
              <?php endforeach; ?>
          </ul>
        </div>
    </div>

    </div>
  </div>

</div>