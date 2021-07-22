<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {
    public function lap_harian($tanggal,$bulan,$tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rinci_transaksi');
        $this->db->join('tbl_transaksi','tbl_transaksi.no_order=tbl_rinci_transaksi.no_order','left');
        $this->db->join('tbl_barang','tbl_barang.id_barang=tbl_rinci_transaksi.id_barang','left');
        $this->db->where('DAY(tbl_transaksi.tgl_order)',$tanggal);
        $this->db->where('MONTH(tbl_transaksi.tgl_order)',$bulan);
        $this->db->where('YEAR(tbl_transaksi.tgl_order)',$tahun);
        return $this->db->get()->result();
        
    }
    public function lap_bulanan($bulan,$tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('MONTH(tgl_order)',$bulan);
        $this->db->where('YEAR(tgl_order)',$tahun);
        $this->db->where('status_order=1');
        return $this->db->get()->result();
        
    }
    public function lap_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('YEAR(tgl_order)',$tahun);
        $this->db->where('status_order=1');
        return $this->db->get()->result();
        
    }

    public function show_laporan_harian()
    {
        $tanggal=$this->input->post('tanggal');
        $bulan=$this->input->post('bulan');
        $tahun=$this->input->post('tahun');

        $this->db->select('*');
        $this->db->from('tbl_rinci_transaksi');
        $this->db->join('tbl_transaksi','tbl_transaksi.no_order=tbl_rinci_transaksi.no_order','left');
        $this->db->join('tbl_barang','tbl_barang.id_barang=tbl_rinci_transaksi.id_barang','left');
        $this->db->where('DAY(tbl_transaksi.tgl_order)',$tanggal);
        $this->db->where('MONTH(tbl_transaksi.tgl_order)',$bulan);
        $this->db->where('YEAR(tbl_transaksi.tgl_order)',$tahun);
        $query = $this->db->get()->result();

        $data=array(
            'laporan'=>$query,
        );

        $content = $this->load->view('v_lap_harian',$data,TRUE);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($content);
        $mpdf->Output('reportMahasiswa.pdf',\Mpdf\Output\Destination::INLINE);
    }

}
?>