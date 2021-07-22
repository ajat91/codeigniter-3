<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Data User</h3>

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
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Action</th>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($user as $item) : ?>
                        <tr>
                            <td><?= $item->id_user?></td>
                            <td><?= $item->nama_user?></td>
                            <td><?= $item->username ?></td>
                            <td><?= $item->password?></td>
                            <td><?php 
                                    if($item->level==1){
                                        echo '<span class="badge bg-primary">Admin</span>';
                                    }else{
                                        echo '<span class="badge bg-success">User</span>';
                                    }
                                ?>
                            </td>
                            <td>
                                <button data-toggle="modal" data-target="#detail<?= $item->id_user?>"class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i> Detail</button>
                                <button data-toggle="modal" data-target="#edit<?= $item->id_user?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                <button data-toggle="modal" data-target="#hapus<?= $item->id_user?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                                    
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

<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php
                echo form_open('user/tambah');
             ?>
                <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukan Nama" required>
                </div>
                <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukan Nama" required>
                </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Masukan Nama" required>
                </div>
                <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control">
                                    <option value=""  selected>Masukan Level</option>
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                        </select>
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

<?php foreach ($user as $item)  :?>
<div class="modal fade" id="edit<?= $item->id_user?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php
                echo form_open('user/edit/'.$item->id_user);
             ?>
                <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="<?= $item->nama_user?>" name="nama" placeholder="Masukan Nama" required>
                </div>
                <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" value="<?= $item->username?>" name="username" placeholder="Masukan Nama" required>
                </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" value="<?= $item->password?>" name="password" placeholder="Masukan Nama" required>
                </div>
                <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control">
                                    <option value=""  selected>Masukan Level</option>
                                    <option value="1" <?php if($item->level==1){
                                        echo 'selected';
                                    } ?>>Admin</option>
                                    <option value="0" <?php if($item->level==0){
                                        echo 'selected';
                                    }?>>User</option>
                        </select>
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

<?php foreach ($user as $item)  :?>
<div class="modal fade" id="detail<?= $item->id_user?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Detail User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="table-responsive">
                        <table class="table">
                        <tr>
                            <th style="width:50%">User ID</th>
                            <td><?= $item->id_user?></td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td><?= $item->nama_user?></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td><?= $item->username?></td>
                        </tr>
                        <tr>
                            <th>Level</th>
                            <td><?php if($item->level==1){
                                        echo 'Admin';
                                    }else{
                                        echo 'User';
                                    } ?>
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

<?php foreach ($user as $item)  :?>
<div class="modal fade" id="hapus<?= $item->id_user?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h4 class="modal-title">Apakah anda yakin menghapus data <?= $item->nama_user?></h4> 
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <a href="<?=base_url('user/delete/'.$item->id_user)?>" type="submit" class="btn btn-primary">Yes</a>
        </div>
        </div>
    </div>
</div>
<?php endforeach; ?>