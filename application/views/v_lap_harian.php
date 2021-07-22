<?php
$no=1; 
$grand_total=0;
$data='';

foreach ($laporan as $item): 
  $tot_harga=$item->qty*$item->harga;

  $grand_total+=$tot_harga;
  $data .= '
  <tr>
      <td>'.$no.'</td>
      <td>'.$item->no_order.'</td>
      <td>'.$item->nama_barang.'</td>
      <td>Rp. '.number_format($item->harga).'</td>
      <td>'.$item->qty.'</td>
      <td>'.number_format($tot_harga).'</td>
  </tr>';
  $no++;
endforeach;

$content = '
<table border="1" width="100%" style="border-collapse:collapse;border: 1px solid black">
  <thead>  
    <tr>
      <th>No.</th>
      <th>No Order</th>
      <th>Barang</th>
      <th>Harga</th>
      <th>Qty</th>
      <th>Total Harga</th>
    </tr>
  </thead>
  <tbody>
    '.$data.'
    <tr>
      <td align="center" colspan="5"><b>Grand Total</b></td>
      <td>'.number_format($grand_total).'</td>
    </tr>
  </tbody>

</table>';

echo $content;
?>