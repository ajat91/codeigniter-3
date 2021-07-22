<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesanan_masuk extends CI_Model {
    
    public function pesanan(){
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_bayar=0');
        $this->db->order_by('id_transaksi','desc');
        return $this->db->get()->result();
       
    }
    public function jumlah_pesanan_masuk(){
        return $this->db->get('tbl_transaksi')->num_rows(); 
    }
    public function update_order($data){
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('tbl_transaksi', $data);
   
    }
    public function pesanan_diproses(){
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_bayar=1');
        $this->db->order_by('id_transaksi','desc');
        return $this->db->get()->result();
    }
    public function pesanan_dikirim(){
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_bayar=2');
        $this->db->order_by('id_transaksi','desc');
        return $this->db->get()->result(); 
    }
    public function pesanan_selesai(){
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_bayar=3');
        $this->db->order_by('id_transaksi','desc');
        return $this->db->get()->result(); 
    }
}
?>