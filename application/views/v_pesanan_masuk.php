    
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
                                    <th>Penerima</th>
                                    <th>Tanggal</th>
                                    <th>Total Pembayaran</th>
                                    <th>Expedisi</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach ($pesanan as $item)  :?>
                                    <tr>
                                        <td><?=$item->no_order?></td>
                                        <td><?=$item->nama_penerima?></td>
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
                                        <?php if($item->status_order==1): ?>
                                            <button data-toggle="modal" data-target="#detail<?=$item->id_transaksi?>" class="btn btn-sm btn-success">Validasi</button>
                                            <a href="<?=base_url('admin/proses/'.$item->id_transaksi)?>" class="btn btn-sm btn-flat btn-primary">Data Valid</a>
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
                                    <th>Penerima</th>
                                    <th>Tanggal</th>
                                    <th>Total Pembayaran</th>
                                    <th>Expedisi</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach ($pesanan_diproses as $item)  :?>
                                    <tr>
                                        <td><?=$item->no_order?></td>
                                        <td><?=$item->nama_penerima?></td>
                                        <td><?=$item->tgl_order?></td>
                                        <td>
                                            <b>Rp. <?=number_format($item->total_bayar)?></b><br>
                                            <span class="badge badge-primary">Proses Pengemasan</span>
                                        </td>
                                        <td>
                                            <b><?=$item->expedisi?></b><br>
                                            Paket : <?=$item->paket?><br>
                                            Ongkir: <?=number_format($item->ongkir)?>
                                        </td>
                                        <td>
                                        <?php if($item->status_order==1): ?>
                                           <button class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#kirim<?=$item->id_transaksi?>" ><i class="fas fa-paper-plane"></i>Kirim Barang</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                        <table class="table table-striped">
                                <tr>
                                    <th>No order</th>
                                    <th>Penerima</th>
                                    <th>Tanggal</th>
                                    <th>Total Pembayaran</th>
                                    <th>Expedisi</th>
                                    <th>No. Resi</th>
                                </tr>
                                <?php foreach ($pesanan_dikirim as $item)  :?>
                                    <tr>
                                        <td><?=$item->no_order?></td>
                                        <td><?=$item->nama_penerima?></td>
                                        <td><?=$item->tgl_order?></td>
                                        <td>
                                            <b>Rp. <?=number_format($item->total_bayar)?></b><br>
                                            <span class="badge badge-success">Dikirim</span>
                                        </td>
                                        <td>
                                            <b><?=$item->expedisi?></b><br>
                                            Paket : <?=$item->paket?><br>
                                            Ongkir: <?=number_format($item->ongkir)?>
                                        </td>
                                        <td><?=$item->no_resi?></td>
                                    </tr>
                                <?php endforeach;?>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                        <table class="table table-striped">
                                <tr>
                                    <th>No order</th>
                                    <th>Penerima</th>
                                    <th>Tanggal</th>
                                    <th>Total Pembayaran</th>
                                    <th>Expedisi</th>
                                    <th>No. Resi</th>
                                </tr>
                                <?php foreach ($pesanan_selesai as $item)  :?>
                                    <tr>
                                        <td><?=$item->no_order?></td>
                                        <td><?=$item->nama_penerima?></td>
                                        <td><?=$item->tgl_order?></td>
                                        <td>
                                            <b>Rp. <?=number_format($item->total_bayar)?></b><br>
                                            <span class="badge badge-success">Selesai</span>
                                        </td>
                                        <td>
                                            <b><?=$item->expedisi?></b><br>
                                            Paket : <?=$item->paket?><br>
                                            Ongkir: <?=number_format($item->ongkir)?>
                                        </td>
                                        <td><?=$item->no_resi?></td>
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
    </div>
    <?php foreach($pesanan as $item) :?>
    <div class="modal fade" id="detail<?=$item->id_transaksi?>">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">No. Resi-<?=$item->no_order?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tr>
                        <th>Nama Bank</th>
                        <th>:</th>
                        <td><?=$item->nama_bank?></td>
                    </tr>
                    <tr>
                        <th>Norek</th>
                        <th>:</th>
                        <td><?=$item->no_rek?></td>
                    </tr>
                    <tr>
                        <th>Nama Pengirim</th>
                        <th>:</th>
                        <td><?=$item->atas_nama?></td>
                    </tr>
                    <tr>
                        <th>Total Bayar</th>
                        <th>:</th>
                        <td>Rp. <?=number_format($item->total_bayar)?></td>
                    </tr>
                </table>
                <img class="img-fluid pad" src="<?=base_url('asset/bukti_bayar/'.$item->bukti_bayar)?>" alt="">
            </div>
            <div class="modal-footer justify-content-between">
            </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <?php foreach($pesanan_diproses as $item) :?>
    <div class="modal fade" id="kirim<?=$item->id_transaksi?>">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">No. Resi-<?=$item->no_order?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('admin/kirim/'.$item->id_transaksi) ?>
                <table class="table table-striped">
                    <tr>
                        <th>Expedisi</th>
                        <th>:</th>
                        <th><?=$item->expedisi?></th>
                    </tr>
                    <tr>
                        <th>Paket</th>
                        <th>:</th>
                        <th><?=$item->paket?></th>
                    </tr>
                    <tr>
                        <th>Ongkos Kirim</th>
                        <th>:</th>
                        <th>Rp. <?=number_format($item->ongkir)?></th>
                    </tr>
                    <tr>
                        <th>No. Resi</th>
                        <th>:</th>
                        <th><input type="text" name="no_resi" name="form-control" required placeholder="No Resi"></th>
                    </tr>
                </table>
                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                <button type="submit" class="btn btn-primary">Kirim</button> 
            </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
    <?php endforeach; ?>


