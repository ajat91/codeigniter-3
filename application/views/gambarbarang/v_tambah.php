<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Tambah Gambar Barang : <?php echo $barang->nama_barang  ?></h3>

            <!-- <div class="card-tools">
                <a href="<?= base_url('gambarbarang/index')?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus">Tambah</i>
                </a>
            </div> -->
        <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <?php  
            if($this->session->flashdata('pesan')){
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
                
            }
        ?>
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
                echo form_open_multipart('gambarbarang/tambah/'.$barang->id_barang) ?>
                 
                 <div class="col-md-6">
                    <div class="form-group">
                        <label>Keterangan Gambar</label>
                        <input class="form-control" name="ket" value="<?=set_value('ket')?>" placeholder="Keterangan Gambar">
                    </div>
                    <div class="form-group">
                            <label>Gambar</label><br>
                            <img id="gambar_load" src="<?= base_url('asset/gambar/no-image-icon-15.png')?>" width="100" alt="">
                            <input type="file" id="preview_gambar" onchange="previewImage()" class="form-control" name="gambar" value="<?=set_value('gambar')?>"></input>
                    </div>
                    <div class="form-group">
                            <button name="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="<?=base_url('gambarbarang')?>" class="btn btn-success btn-sm">Kembali</a>
                    </div>
                 </div>
            <?php echo form_close() ?>
            <hr>
            <div class="row">
                <?php foreach ($gambar as $item) :?>
                    <div class="col-sm-3">
                    
                        <div class="form-group">
                            <img id="gambar_load" src="<?= base_url('asset/gambarbarang/'.$item->gambar)?>" width="240px" height="200px" alt=""><br>
                            <p><?php echo $item->ket ?></p>
                            <button data-toggle="modal" data-target="#hapus<?= $item->id_gambar?>" class="btn btn-danger btn-sm btn-block"><i class="fa fa-trash"></i>Hapus</button>
                            
                        
                        </div>
                    </div>
                <?php endforeach; ?>
        </div>
        </div>
        <!-- /.card-body -->
    </div>
<!-- /.card -->
</div>
</div>
</div>
</div>
<?php foreach ($gambar as $item)  :?>
<div class="modal fade" id="hapus<?= $item->id_gambar?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-center">
            <h4 class="modal-title">Apakah anda yakin menghapus gambar ini</h4> 
            <img src="<?= base_url('asset/gambarbarang/'.$item->gambar)?>" width="240px" height="200px" alt="">
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <a href="<?=base_url('gambarbarang/delete/'.$item->id_barang.'/'.$item->id_gambar)?>" type="submit" class="btn btn-primary">Yes</a>
        </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
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
