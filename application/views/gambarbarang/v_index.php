<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Data Gambar Barang</h3>

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
            <table class="table table-bordered" id="example1">
                <thead class="text-center">
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Cover</th>
                    <th>Jumlah Gambar</th>
                    <th>Action</th>
                </thead>
                <tbody class="text-center">
                    <?php $no=1; 
                    foreach($gambarbarang as $item) :?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $item->nama_barang ?></td>
                        <td><img src="<?=base_url('asset/gambar/'.$item->gambar)?>" alt="" width="40"></td>
                        <td><span class="badge bg-primary"><?= $item->total_gambar ?></span></td>
                        <td>
                            <a href="<?=base_url('gambarbarang/tambah/'.$item->id_barang)?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Tambah Gambar</a>   
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
<!-- /.card -->
</div>
</div>
</div>
</div>
