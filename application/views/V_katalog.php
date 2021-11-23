<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">Katalog</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Assets Care</a></li>
						<li class="breadcrumb-item active" aria-current="page">Katalog</li>
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
          <h4 class="mb-0 text-white">Jenis Asset</h4></div>
        <div class="card-body">
          <div class="row">
          <?php foreach ($j_asset as $j): ?>
            <div class="col-md-4">
              <a href="<?= base_url() ?>katalog/asset/<?= $j['id_jenis_asset'] ?>">
               
                <div class="d-flex flex-row mt-3 mb-3 card-hover border border-info">
                  <div class="bg-info text-center" style="width: 60px;">
                      <h3 class="text-white box mt-2"><i class="<?= $j['icon'] ?>" aria-hidden="true"></i></h3></div>
                  <div class="p-10" style="margin-top: 10px;">
                      <h3 class="text-info mb-0" style="font-size: 17px;"><?php $a = $j['jenis_asset']; echo ucfirst($a); ?></h3>
                  </div>
                  <div class="align-self-center mr-3 ml-auto">
                      <h2 class="text-info mb-0"><?= $j['jml_siap_lelang'] ?></h2>
                  </div>
              </div>
              
              </a></div>
          <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>