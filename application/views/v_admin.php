<div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3><?=$jumlah_pesanan_masuk?></h3>

                        <p>Pesanan Masuk</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="<?=base_url('admin/pesanan_masuk')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3><?= $total_barang ?></h3>
                        <p>Barang</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-cubes"></i>
                      </div>
                      <a href="<?=base_url('barang')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3><?=$jumlah_pelanggan?></h3>

                        <p>Pelanggan</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-users"></i>
                      </div>
                      <a href="<?=base_url('user')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3><?= $total_kategori ?></h3>

                        <p>Kategori</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-list"></i>
                      </div>
                      <a href="<?=base_url('kategori')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
          </div>
      </div>
    </div>
</div>