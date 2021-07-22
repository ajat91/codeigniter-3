<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Data Kategori</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus">Tambah</i>
                </button>
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
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($kategori as $item) : ?>
                        <tr>
                            <td><?= $item->id_kategori?></td>
                            <td><?= $item->nama_kategori?></td>
                            <td>
                                <button data-toggle="modal" data-target="#detail<?= $item->id_kategori?>"class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i> Detail</button>
                                <button data-toggle="modal" data-target="#edit<?= $item->id_kategori?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                <button data-toggle="modal" data-target="#hapus<?= $item->id_kategori?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>   
                            </td>                            
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
<!-- /.card -->



<div class="modal fade" id="tambah">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Kategori</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php
                echo form_open('kategori/tambah');
             ?>
                <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" placeholder="Masukan kategori" required>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        <?php
                echo form_close(); 
            ?>
        </div>
    </div>
</div>

<?php foreach ($kategori as $item)  :?>
<div class="modal fade" id="edit<?= $item->id_kategori?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit kategori</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php
                echo form_open('kategori/edit/'.$item->id_kategori);
             ?>
                <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" value="<?= $item->nama_kategori?>" name="nama_kategori" placeholder="Masukan Nama" required>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        <?php
                echo form_close(); 
            ?>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php foreach ($kategori as $item)  :?>
<div class="modal fade" id="hapus<?= $item->id_kategori?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h4 class="modal-title">Apakah anda yakin menghapus data <?= $item->nama_kategori?></h4> 
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <a href="<?=base_url('kategori/delete/'.$item->id_kategori)?>" type="submit" class="btn btn-primary">Yes</a>
        </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php foreach ($kategori as $item)  :?>
<div class="modal fade" id="detail<?= $item->id_kategori?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Detail Kategori</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="table-responsive">
                        <table class="table">
                        <tr>
                            <th style="width:50%">ID Kategori</th>
                            <td><?= $item->id_kategori?></td>
                        </tr>
                        <tr>
                            <th>Nama Kategori</th>
                            <td><?= $item->nama_kategori?></td>
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

