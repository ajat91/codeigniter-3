<div class="row">
<div class="col-sm-12">
        <?php  
            if($this->session->flashdata('pesan')){
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
                
            }
        ?>
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Order</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Diproses</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Dikirim</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Selesai</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <table class="table table-striped">
                        <tr>
                            <th>No order</th>
                            <th>Tanggal</th>
                            <th>Total Pembayaran</th>
                            <th>Expedisi</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($belum_bayar as $item)  :?>
                            <tr>
                                <td><?=$item->no_order?></td>
                                <td><?=$item->tgl_order?></td>
                                <td>
                                    <b>Rp. <?=number_format($item->total_bayar)?></b><br>
                                    <?php if($item->status_order==0){?>
                                      <span class="badge badge-warning">Belum Bayar</span>
                                     <?php }else{ ?>
                                      <span class="badge badge-success">Sudah Bayar</span>
                                      <span class="badge badge-primary">Menunggu Verifikasi</span>
                                      <?php } ?>
                                </td>
                                <td>
                                    <b><?=$item->expedisi?></b><br>
                                    Paket : <?=$item->paket?><br>
                                    Ongkir: <?=number_format($item->ongkir)?>
                                </td>
                                <td>
                                  <?php if($item->status_order==0): ?>
                                    <a href="<?=base_url('pesanan_saya/bayar/'.$item->id_transaksi)?>" class="btn btn-sm btn-flat btn-primary">Bayar</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  <table class="table table-striped">
                        <tr>
                            <th>No order</th>
                            <th>Tanggal</th>
                            <th>Total Pembayaran</th>
                            <th>Expedisi</th>
                        </tr>
                        <?php foreach ($diproses as $item)  :?>
                            <tr>
                                <td><?=$item->no_order?></td>
                                <td><?=$item->tgl_order?></td>
                                <td>
                                    <b>Rp. <?=number_format($item->total_bayar)?></b><br>
                                      <span class="badge badge-info"><i class="fa fa-sync"> Proses Pengemasan</i></span>
                                      <span class="badge badge-primary"><i class="fa fa-check"> Terverifikasi</i></span> 
                                </td>
                                <td>
                                    <b><?=$item->expedisi?></b><br>
                                    Paket : <?=$item->paket?><br>
                                    Ongkir: <?=number_format($item->ongkir)?>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                  <table class="table table-striped">
                        <tr>
                            <th>No order</th>
                            <th>Tanggal</th>
                            <th>Total Pembayaran</th>
                            <th>Expedisi</th>
                            <th>No .Resi</th>
                            <th>Konfirmasi</th>
                        </tr>
                        <?php foreach ($dikirim as $item)  :?>
                            <tr>
                                <td><?=$item->no_order?></td>
                                <td><?=$item->tgl_order?></td>
                                <td>
                                    <b>Rp. <?=number_format($item->total_bayar)?></b><br>
                                      <span class="badge badge-success"><i class="fa fa-paper-plane"> Dikirim</i></span>  
                                </td>
                                
                                <td>
                                    <b><?=$item->expedisi?></b><br>
                                    Paket : <?=$item->paket?><br>
                                    Ongkir: <?=number_format($item->ongkir)?>
                                </td>
                                <td><h4><?=$item->no_resi?></h4>
                                </td>
                                <td><button data-toggle="modal" data-target="#terima<?=$item->id_transaksi?>" class="btn btn-success btn-flat">Diterima</button></td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                </div>
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                  <table class="table table-striped">
                        <tr>
                            <th>No order</th>
                            <th>Tanggal</th>
                            <th>Total Pembayaran</th>
                            <th>Expedisi</th>
                            <th>No .Resi</th>
                        </tr>
                        <?php foreach ($selesai as $item)  :?>
                            <tr>
                                <td><?=$item->no_order?></td>
                                <td><?=$item->tgl_order?></td>
                                <td>
                                    <b>Rp. <?=number_format($item->total_bayar)?></b><br>
                                      <span class="badge badge-success"><i class="fa fa-paper-plane"> Selesai</i></span>  
                                </td>
                                
                                <td>
                                    <b><?=$item->expedisi?></b><br>
                                    Paket : <?=$item->paket?><br>
                                    Ongkir: <?=number_format($item->ongkir)?>
                                </td>
                                <td><h4><?=$item->no_resi?></h4>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
        </div>
    </div>
</div>
<?php foreach($dikirim as $item) :?>
    <div class="modal fade" id="terima<?=$item->id_transaksi?>">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pesanan Diterima</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Barang Sudah Diterima ?
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="<?=base_url('pesanan_saya/diterima/'.$item->id_transaksi)?>" class="btn btn-primary">Yes</a>
            </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
