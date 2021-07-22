 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('admin')?>" class="brand-link">
      <img src="<?=base_url()?>template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Halaman Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata('nama_user') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="<?=base_url('admin')?>" class="nav-link <?php 
               if ($this->uri->segment(1)=='admin' && $this->uri->segment(2)==''){
                echo "active";
              }
            ?>">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url('kategori')?>" class="nav-link  <?php 
               if ($this->uri->segment(1)=='kategori'){
                echo "active";
              }
            ?>">
                    <i class="nav-icon fab fa-product-hunt"></i>
                    <p>
                        Kategori
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url('barang')?>" class="nav-link <?php 
               if ($this->uri->segment(1)=='barang'){
                echo "active";
              }
            ?>">
                <i class="nav-icon fab fa-goodreads"></i>
                    <p>
                        Barang
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url('gambarbarang')?>" class="nav-link <?php 
               if ($this->uri->segment(1)=='gambarbarang'){
                echo "active";
              }
            ?>">
                <i class="nav-icon fas fa-photo-video"></i>
                    <p>
                        Gambar Barang
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url('admin/pesanan_masuk')?>" class="nav-link <?php 
               if ($this->uri->segment(2)=='pesanan_masuk' && $this->uri->segment(1)=='admin'){
                echo "active";
                }
                ?>">
                <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                        Pesanan Masuk
                    </p>
                </a>
            </li>
            <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item">
            <a href="<?=base_url('laporan')?>" class="nav-link <?php 
               if ($this->uri->segment(1)=='laporan'){
                echo "active";
                }
                ?>">
              <i class="nav-icon fa fa-file-export"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin/setting')?>" class="nav-link <?php 
               if ($this->uri->segment(1)=='admin' && $this->uri->segment(2)=='setting' ){
                echo "active";
                }
                ?>">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Setting
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('user')?>" class="nav-link  <?php 
               if ($this->uri->segment(1)=='user'){
                echo "active";
                }
                ?> ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('auth/logout_user')?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0 text-dark"><?= $title?></h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin')?>">Home</a></li>
              <li class="breadcrumb-item active"><?= $title?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">