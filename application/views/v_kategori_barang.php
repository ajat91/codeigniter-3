<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
    <div class="carousel-item active">
        <img class="d-block w-100" src="<?=base_url()?>asset/slider/slider1.jpg"  alt="First slide">
    </div>
    <div class="carousel-item">
        <img class="d-block w-100" src="<?=base_url()?>asset/slider/slider2.jpg"  alt="Second slide">
    </div>
    <div class="carousel-item">
        <img class="d-block w-100" src="<?=base_url()?>asset/slider/slider3.jpg"  alt="Third slide">
    </div>
    <div class="carousel-item">
        <img class="d-block w-100" src="<?=base_url()?>asset/slider/slider4.jpg"  alt="Third slide">
    </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
</div>
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
        
      <?php foreach ($barang as $item): ?> 
        <div class="col-sm-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                <h2 class="lead"><b><?=$item->nama_barang  ?></b></h2>
                <p class="text-muted text-sm"><b>Kategori: </b> <?=$item->nama_kategori ?> </p>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <!-- <div class="col-7">
                    <p class="text-muted text-sm"><b>Deskripsi: </b> <?=$item->deskripsi ?> </p>
                    </div> -->
                    <div class="col-4 text-center">
                      <img src="<?=base_url('asset/gambar/'.$item->gambar)?>" alt="" width="300">
                    </div>
                  </div>
                  
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="text-left">
                      <span class="badge bg-primary">Rp. <?=number_format($item->harga,0) ?></h5></span>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-right">
                        <a href="<?=base_url('home/detail_barang/'.$item->id_barang)?>" class="btn btn-sm btn-primary">
                          <i class="fas fa-street-view"></i>
                        </a>
                        <a href="#" class="btn btn-sm bg-teal">
                          <i class="fas fa-cart-plus">Add</i>
                        </a>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <?php endforeach; ?> 
        </div>
    </div>
</div>