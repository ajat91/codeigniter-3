<div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Rekening Toko</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <p>Silahkan transfer uang ke salah satu nomer rekening dibawah ini sebesar : 
                        <h1 class="text-primary">Rp. <?=number_format($pesanan->total_bayar)  ?></h1></p>
                    <table class="table table-striped">
                        <tr>
                            <th>Bank</th>
                            <th>No Rekening</th>
                            <th>Atas Nama</th>
                        </tr>
                        <?php foreach($rekening as $item) :?>
                        <tr>
                            <td><?=$item->nama_bank?></td>
                            <td><?=$item->no_rek?></td>
                            <td><?=$item->atas_nama?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>  
                </div>
                </div>
        </div>
    </div>
    <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Bukti Bayar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <?php echo form_open_multipart('pesanan_saya/bayar/'.$pesanan->id_transaksi) ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nomer Rekening</label>
                    <input type="text" name="no_rek" class="form-control" id="exampleInputEmail1" placeholder="Nomer Rekening" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Pengirim</label>
                    <input type="text" name="atas_nama" class="form-control" id="exampleInputPassword1" placeholder="Nama Pengirim" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Bank</label>
                    <input type="text" name="nama_bank" class="form-control" id="exampleInputPassword1" placeholder="Nama Bank" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Bukti Bayar</label>
                    <input type="file" name="bukti_bayar" class="form-control" id="exampleInputFile" required>
                </div>
                <!-- /.card-body -->
                </div>
                <div class="card-footer">
                    <a href="<?=base_url('pesanan_saya')?>" class="btn btn-success">Kembali</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              <?php echo form_close() ?>
            </div>
</div>
