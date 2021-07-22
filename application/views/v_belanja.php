<div class="card card-solid">
    <div class="card-body pb-0">
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
            </div>
            <div class="col-sm-12">
                <?php
                echo form_open('belanja/update'); ?>
                <table cellpadding="6" cellspacing="1" style="width:100%" class="table">
                <tr>
                        <td width="8%">QTY</td>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Sub-Total</th>
                        <th class="text-center">Action</th>
                </tr>
                <?php $i = 1; ?>
                <?php
                    $totalberat=0; 
                    foreach ($this->cart->contents() as $items): 
                    $barang=$this->m_home->detail_barang($items['id']);
                    $berat=$items['qty']*$barang->berat;

                    $totalberat+=$berat;
                ?>
                        <tr>
                                <td>
                                    <?php echo form_input(array(
                                    'name' => $i.'[qty]', 
                                    'value' => $items['qty'], 
                                    'maxlength' => '3', 
                                    'min'=>'0',
                                    'size' => '5',
                                    'type'=>'number',
                                    'class'=>'form-control')); ?>
                                </td>
                                <td>
                                    <?php echo $items['name']; ?>
                                </td>
                                <td>Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                                <td><?=$berat?></td>
                                <td>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                <td class="text-center">
                                    <a href="<?=base_url('belanja/delete/'.$items['rowid'])?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                <tr>
                        <td class="right"><h3>Total</h3></td>
                        <td class="right"><h3>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></h3></td>
                        <th colspan="2">Total Berat : <?=$totalberat  ?></th>
                </tr>
                </table>
                <div class="row">
                    <div class="col-sm-6">
                            <button type="submit" class="btn btn-success"><i class="fa fa-cart-plus"></i> Update Cart</button>
                            <a href="<?=base_url('belanja/cekout')?>" class="btn btn-primary"><i class="fas fa-check-square"></i> Checkout</a>
                            <a href="<?=base_url('belanja/clear')?>" class="btn btn-danger"><i class="fa fa-recycle"></i> Clear Cart</a>
                    </div>
                </div>
                    
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
</div>
