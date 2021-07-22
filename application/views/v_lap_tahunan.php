<div class="col-12">
            

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-sync"></i> <?php echo $title ?>
                    <small class="float-right"><?= $tahun?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>No Order</th>
                      <th>Tanggal</th>
                      <th>Grand Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=1; 
                        $grand_total=0;
                        foreach ($laporan as $item): 
                        //$tot_harga=$item->qty*$item->harga;
                        $grand_total+=$item->grand_total;
                        ?>
                    <tr>
                        <td><?= $no++  ?></td>
                        <td><?=$item->no_order?></td>
                        <td><?=date('d-m-Y',strtotime($item->tgl_order))?></td>
                        <td>Rp. <?=number_format($item->grand_total)?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                   
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due <?php echo date('d/m/Y') ?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Grand Total : Rp.</th>
                        <td><h5><b>Rp. <?= number_format($grand_total) ?></b></h5></td>
                      </tr>
                    </table>
                    
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-sm-12">
                  <button type="button" onclick="window.print()"class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Print
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
            </div><!-- /.col --
           </div> /.col -->
        </div>
    </div>
</div>
           
          
          