<div class="col-md-4">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Laporan Harian</h3>
        </div>
        <div class="card-body">
            <?php
            if($this->session->flashdata('pesan')){
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
            }

            echo form_open('laporan/lap_harian'); ?>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <select type="date" name="tanggal" id="" class="form-control">
                            <?php
                                for ($i=1;$i<=31;$i++) {
                                    echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                }
                            ?>
                            
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Bulan</label>
                        <select name="bulan" id="" class="form-control">
                        <?php
                                for ($i=1;$i<=12;$i++) {
                                    echo '<option value='.$i.'>'.$i.'</option>';
                                }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <select name="tahun" id="" class="form-control" required>
                        <?php
                            $tahun=2012;
                            for ($i=$tahun;$i<$tahun+10;$i++) {
                                echo '<option value='.$i.'>'.$i.'</option>';
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button name="submit" target="" class="btn btn-primary btn-sm btn-block"><i class="fas fa-file-powerpoint"></i>  Cetak Laporan</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Laporan Bulanan</h3>
        </div>
        <div class="card-body">
            <?php
            if($this->session->flashdata('pesan')){
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
            }

            echo form_open('laporan/lap_bulanan'); ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Bulan</label>
                        <select name="bulan" id="" class="form-control">
                        <?php
                                for ($i=1;$i<=12;$i++) { 
                                    echo '<option value='.$i.'>'.$i.'</option>';
                                }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <select name="tahun" id="" class="form-control" required>
                        <?php
                            $tahun=2012;
                            for ($i=$tahun;$i<$tahun+10;$i++) {
                                echo '<option value='.$i.'>'.$i.'</option>';
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button name="submit" class="btn btn-primary btn-sm"><i class="fas fa-file-powerpoint"></i>  Cetak Laporan</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Laporan Tahunan</h3>
        </div>
        <div class="card-body">
            <?php
            if($this->session->flashdata('pesan')){
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
            }

            echo form_open('laporan/lap_tahunan'); ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <select name="tahun" id="" class="form-control" required>
                        <?php
                               $tahun=2012;
                               for ($i=$tahun;$i<$tahun+10;$i++) {
                                   echo '<option value='.$i.'>'.$i.'</option>';
                               }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button name="submit" class="btn btn-primary btn-sm"><i class="fas fa-file-powerpoint"></i>  Cetak Laporan</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</div>
</div>
</div>