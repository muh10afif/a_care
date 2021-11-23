<aside class="left-sidebar shadow">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown mt-3">
                        <div class="user-pic"><img src="<?= base_url() ?>template/assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu ml-2">
                            <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 user-name font-medium"><?= ucwords($this->session->userdata('nama'))?><?= nbs(3) ?><i class="fa fa-angle-down"></i></h5>
                                <span class="op-5 user-email"><?= ucwords($this->session->userdata('level')) ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="<?= base_url('login/logout') ?>"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- User Profile-->

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('home') ?>" aria-expanded="false"><i class="fas fa-home"></i><span class="hide-menu"><?= nbs(3) ?>Home</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('info') ?>" aria-expanded="false"><i class=" fas fa-info-circle"></i><span class="hide-menu"><?= nbs(3) ?>Informasi</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('katalog') ?>" aria-expanded="false"><i class="fas fa-th"></i><span class="hide-menu"><?= nbs(3) ?>Katalog</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" fas fa-book"></i><span class="hide-menu"><?= nbs(3) ?>Dokumen Aset</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="<?= base_url('agunan') ?>" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Kelolaan </span></a></li>
                        <li class="sidebar-item"><a href="<?= base_url('agunan/non_kelolaan') ?>" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Non Kelolaan </span></a></li>
                    </ul> 
                </li>
                
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>