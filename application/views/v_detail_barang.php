 <!-- Main content -->
 <section class="content">

<!-- Default box -->
<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3 class="d-inline-block d-sm-none"><?=$detail->nama_barang?></h3>
        <div class="col-12">
          <img src="<?=base_url('asset/gambar/'.$detail->gambar)?>" class="product-image" alt="Product Image">
        </div>
        <div class="col-12 product-image-thumbs">
          <div class="product-image-thumb active"><img src="<?=base_url('asset/gambar/'.$detail->gambar)?>" alt="Product Image"></div>
          <?php foreach($gambar as $item): ?>
          <div class="product-image-thumb" ><img src="<?=base_url('asset/gambarbarang/'.$item->gambar)?>" alt="Product Image"></div>
            <?php endforeach; ?>
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <h3 class="my-3"><?=$detail->nama_barang  ?></h3>
        <hr>
        <h5><?=$detail->nama_kategori  ?></h5>
        <hr>
        <p><?=$detail->deskripsi  ?></p>
        <hr>
        <div class="bg-gray py-2 px-3 mt-4">
          <h2 class="mb-0">
            Rp. <?=number_format($detail->harga,0)  ?>
          </h2>
        </div>
        <hr>
        <?php 
        echo form_open('belanja/tambah');
        echo form_hidden('id',$detail->id_barang); 
        echo form_hidden('price',$detail->harga);    
        echo form_hidden('name',$detail->nama_barang);
        echo form_hidden('redirect_page',str_replace('index.php/','',current_url()));        
 
        ?>
        <div class="mt-4">
            <div class="row">
                <div class="col-2">
                    <input type="number" name="qty" value="0" min="1" class="form-control">
                </div>
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-primary btn-flat swalDefaultSuccess">
                        <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
        <?php form_close(); ?>
        <div class="mt-4 product-share">
          <a href="#" class="text-gray">
            <i class="fab fa-facebook-square fa-2x"></i>
          </a>
          <a href="#" class="text-gray">
            <i class="fab fa-twitter-square fa-2x"></i>
          </a>
          <a href="#" class="text-gray">
            <i class="fas fa-envelope-square fa-2x"></i>
          </a>
          <a href="#" class="text-gray">
            <i class="fas fa-rss-square fa-2x"></i>
          </a>
        </div>

      </div>
    </div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
<!-- jQuery -->
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>template/dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url()?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Barang berhasil ditambahkan ke keranjang'
      })
    });
  });
</script>