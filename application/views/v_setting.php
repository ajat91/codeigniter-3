            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Setting</h3>
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
                        echo form_open('admin/setting'); ?>
                        <div class="row">
                            <div class="col-sm-4">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="provinsi" id="" class="form-control"></select>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                        <label for="">Kota</label>
                                        <select name="kota" id="" class="form-control">
                                            <option value="<?=$setting->lokasi?>"><?=$setting->lokasi?></option>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                        <label for="">Nama Toko</label>
                                        <input type="text" name="nama_toko" id="" value="<?=$setting->nama_toko?>" class="form-control" required>
                                </div>
                            </div>  
                            <div class="col-sm-4">
                                <div class="form-group">
                                        <label for="">No Telpon</label>
                                        <input type="text" name="no_telp" id="" value="<?=$setting->no_telp?>" class="form-control" required>
                                </div>
                            </div>  
                        </div>
                        <div class="col-sm-4">
                                <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="text" name="alamat" id="" value="<?=$setting->alamat?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                <a href="<?=base_url('admin')?>" class="btn btn-warning btn-sm">Kembali</a>
                            </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        //masukan data provinsi
        $.ajax({
            type:"POST",
            url:"<?=base_url('rajaongkir/provinsi')?>",
            success: function(hasil_provinsi){
                //console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });
        //masukan data kota
        $("select[name=provinsi]").on("change",function(){
            var id_provinsi_terpilih=$("option:selected",this).attr("id_provinsi");
            $.ajax({
                type:"POST",
                url:"<?=base_url('rajaongkir/kota')?>",
                data:"id_provinsi="+id_provinsi_terpilih,
                success:function(hasil_kota){
                    //console.log(hasil_kota);
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        })
    });
</script>
              