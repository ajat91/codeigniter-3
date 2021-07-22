<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Data Barang</h3>

            <div class="card-tools">
                <a href="<?= base_url('barang/tambah')?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus">Tambah</i>
                </a>
            </div>
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
            <table class="table table-bordered" id="example1">
                <thead class="text-center">
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php foreach ($barang as $item) : ?>
                        <tr>
                            <td><?= $item->id_barang?></td>
                            <td>
                                <?= $item->nama_barang?><br>
                                Berat : <?= $item->berat  ?>
                            </td>
                            <td><?= $item->nama_kategori?></td>
                            <td>Rp.<?= number_format($item->harga,0)?></td>
                            <td><img src="<?= base_url('asset/gambar/'.$item->gambar)?>" width="40" alt=""></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#detail<?= $item->id_barang?>"class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i> Detail</a>
                                <a href="<?=base_url('barang/edit/'.$item->id_barang)?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                <button data-toggle="modal" data-target="#hapus<?= $item->id_barang?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>   
                            </td>                            
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
<!-- /.card -->
</div>

<?php foreach ($barang as $item)  :?>
<div class="modal fade" id="hapus<?= $item->id_barang?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h4 class="modal-title">Apakah anda yakin menghapus data <?= $item->nama_barang?></h4> 
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <a href="<?=base_url('barang/delete/'.$item->id_barang)?>" type="submit" class="btn btn-primary">Yes</a>
        </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php foreach ($barang as $item)  :?>
<div class="modal fade" id="detail<?= $item->id_barang?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Detail Barang</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="table-responsive">
                        <table class="table">
                        <tr>
                            <th style="width:50%">ID barang</th>
                            <td><?= $item->id_barang?></td>
                        </tr>
                        <tr>
                            <th>Nama Barang</th>
                            <td><?= $item->nama_barang?></td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td><?= $item->nama_kategori?></td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td><?= $item->harga?></td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td><?= $item->deskripsi?></td>
                        </tr>
                        <tr>
                            <td>
                            <img src="<?= base_url('asset/gambar/'.$item->gambar)?>" width="40" alt="">
                            </td>
                        </tr>
                        </table>
                    </div>
        </div>
                    <!-- /.col -->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

