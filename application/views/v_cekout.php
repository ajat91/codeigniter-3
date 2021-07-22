<!-- Main content -->
<div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-shopping-cart"></i> Checkout
                    <small class="float-right">Date: <?php echo date('d-m-Y') ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>John Doe</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
             
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Harga</th>
                      <th>Barang</th>
                      <th>Berat</th>
                      <th>Total Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        $totalberat=0; 
                        foreach ($this->cart->contents() as $items): 
                        $barang=$this->m_home->detail_barang($items['id']);
                        $berat=$items['qty']*$barang->berat;
                        $totalberat+=$berat;
                    ?>
                        <tr>
                            <td><?php echo $items['qty'];?></td>
                            <td>Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                            <td><?php echo $items['name'];?></td>
                            <td><?=$berat?></td>
                            <td>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                        </tr>
                    <?php 
                        $i++;
                        endforeach; 
                    ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <hr>
              <!-- /.row -->
              <?php
              echo validation_errors('<div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i>','</h5></div>');
             
               ?>
              <?php 
              echo form_open('belanja/cekout');
              $no_order=date('Ymd').strtoupper(random_string('alnum',8));
              //echo $no_order;
              ?>
              <div class="row">
                <!-- accepted payments column -->
               
                    <div class="col-sm-7 invoice-col">
                      <!-- <div class="text-center">
                        <h5><b>Tujuan</b></h5> 

                      </div> -->
                        <div class="row">
                            <div class="col-sm-5">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="provinsi" id="" class="form-control"></select>
                            </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                        <label for="">Kabupaten/Kota</label>
                                        <select name="kota" id="" class="form-control">
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                        <label for="">Ekspedisi</label>
                                        <select name="expedisi" id="" class="form-control">
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                        <label for="">Paket</label>
                                        <select name="paket" id="" class="form-control">
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                        <label for="">Alamat</label>
                                       <textarea type="text" name="alamat" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                        <label for="">Penerima</label>
                                        <textarea type="text" name="nama_penerima" class="form-control" required></textarea>
                                </div>            
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                        <label for="">Kode Pos</label>
                                        <input type="text" name="kode_pos" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                        <label for="">No. Handphone</label>
                                        <input type="text" name="no_hp" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>                  
                  
                <!-- /.col -->
                <div class="col-5">
                  <p class="lead">Amount Due <?php echo date('d-m-Y') ?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Grand total</th>
                        <th>Rp. <?php echo $this->cart->format_number($this->cart->total())?></th>
                      </tr>
                      <tr>
                        <th>Berat</th>
                        <th><?=$totalberat?> Gram</th>
                      </tr>
                      <tr>
                        <th>Ongkir </th>
                        <td><label id="ongkir"></label></td>
                      </tr>
                      <tr>
                        <th>Total Pembayaran</th>
                        <td><label id="total_bayar"></label></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- simpan transaksi -->
              <input name="no_order" value="<?=$no_order?>" hidden>
              <input name="estimasi" hidden>
              <input name="ongkir"  hidden>
              <input name="berat" value="<?=$totalberat?> " hidden>
              <input name="grand_total" value="<?=$this->cart->total()?> " hidden>
              <input name="total_bayar" hidden>
              <!-- simpan detail transaksi -->
              <?php
                $i=1;
                foreach ($this->cart->contents() as $items){
                  echo form_hidden('qty'.$i++,$items['qty']);
                }
               ?>
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="<?=base_url('belanja')?>" class="btn btn-warning"><i class="fas fa-backward"></i> kembali</a>
                  <button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-recycle"></i> Proses Checkout
                  </button>
                </div>
              </div>
              <?php echo form_close() ?>
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
            //alert(id_provinsi_terpilih)
            $.ajax({
                type:"POST",
                url:"<?=base_url('rajaongkir/kota')?>",
                data:"id_provinsi="+id_provinsi_terpilih,
                success:function(hasil_kota){
                    //console.log(hasil_kota);
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });
        $("select[name=kota]").on("change",function(){
          $.ajax({
                type:"POST",
                url:"<?=base_url('rajaongkir/expedisi')?>",
                success:function(hasil_expedisi){
                    //console.log(hasil_kota);
                    $("select[name=expedisi]").html(hasil_expedisi);
                }
            });
        });
        $("select[name=expedisi]").on("change",function(){
          //mendapatkan expedisi terpilih
          var expedisi_terpilih=$("select[name=expedisi]").val()
          //mendapatkan id kota tujuan terpilih
          var id_kota_tujuan_terpilih=$("option:selected","select[name=kota]").attr('id_kota')
          //mengambil berat barang
          var tot_berat=<?=$berat?>;
         //alert(tot_berat)
          $.ajax({
                type:"POST",
                url:"<?=base_url('rajaongkir/paket')?>",
                data:'expedisi='+expedisi_terpilih+'&id_kota='+id_kota_tujuan_terpilih+'&berat='+tot_berat,
                success:function(hasil_paket){
                    //console.log(hasil_paket);
                    $("select[name=paket]").html(hasil_paket);
                }
            });
        });
        $("select[name=paket]").on("change",function(){
          var dataongkir=$("option:selected",this).attr('ongkir');
          var reverse=dataongkir.toString().split('').reverse().join(''),
              ribuan_ongkir=reverse.match(/\d{1,3}/g);
              ribuan_ongkir=ribuan_ongkir.join(',').split('').reverse().join('');
          $("#ongkir").html("Rp."+ribuan_ongkir)
          //alert(dataongkir);
          //menghitung total bayar
          //var ongkir=$("option:selected",this).attr('ongkir');

          var data_total_bayar=parseInt(dataongkir)+parseInt(<?=$this->cart->total()?>);
          var reverse2=data_total_bayar.toString().split('').reverse().join(''),
              ribuan_total_bayar=reverse2.match(/\d{1,3}/g);
              ribuan_total_bayar=ribuan_total_bayar.join(',').split('').reverse().join('');
          $("#total_bayar").html("Rp."+ribuan_total_bayar);

          //estimasi dan ongkir
          var estimasi=$("option:selected",this).attr('estimasi');
          $("input[name=estimasi]").val(estimasi);
          $("input[name=ongkir]").val(dataongkir);
          $("input[name=total_bayar]").val(data_total_bayar);
        });
    });
</script>