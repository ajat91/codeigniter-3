<div class="col-md-12">
            <!-- general form elements disabled -->
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
              //notifikasi error
                echo validation_errors('<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i>','</h5></div>');
                //notifikasi gagal upload
                if(isset($error_upload)){
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i>'.$error_upload.'</h5></div>';
                }
                echo form_open_multipart('barang/edit/'.$barang->id_barang) ?>
                <div class="form-group">
                        <label>Nama Barang</label>
                        <input class="form-control" name="nama_barang" value="<?=$barang->nama_barang?>" placeholder="Nama Barang">
                </div>
                <div class="row">
                        <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="id_kategori" id="" class="form-control">
                                <option value="<?=$barang->id_kategori?>"><?=$barang->nama_kategori?></option>
                                <?php foreach($kategori as $item) : ?>
                                    <option value="<?= $item->id_kategori?>"><?= $item->nama_kategori?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        </div>
                        <div class="col-sm-4">
                        <!-- text input -->
                            <div class="form-group">
                                <label>Harga</label>
                                <input class="form-control" name="harga" value="<?=$barang->harga?>" placeholder="Harga Barang">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <!-- text input -->
                                <div class="form-group">
                                    <label>Berat (Kg)</label>
                                    <input type="number" min="0" class="form-control" name="berat" value="<?=$barang->berat?>" placeholder="Berat Barang">
                                </div>
                        </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" cols="100" rows="10"><?=$barang->deskripsi?></textarea>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                            <label>Ganti Gambar</label><br>
                            <img id="gambar_load" src="<?= base_url('asset/gambar/'.$barang->gambar)?>" width="100" alt="">
                            <input type="file" id="preview_gambar"class="form-control" name="gambar">
                    </div>
                </div>
                <div class="form-group">
                    <button name="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="<?=base_url('barang')?>" class="btn btn-warning btn-sm">Kembali</a>
                </div>
              <?php echo form_close() ?>
            </div>
        </div>
</div>
<script>
    function upload(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#gambar_load').attr('src',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#preview_gambar').change(function(){
        upload(this);
    });
</script>

<!-- <script>
        function previewImage() {
        document.getElementById("gambar_load").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("preview_gambar").files[0]);

        oFReader.onload = function(oFREvent) {
        document.getElementById("gambar_load").src = oFREvent.target.result;
        };
    };
</script> -->

