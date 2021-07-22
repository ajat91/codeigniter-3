<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

    public function getAllData(){
        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.id_kategori', 'left');
        $this->db->order_by('tbl_barang.id_barang','desc');
        return $this->db->get()->result(); 
    }
    public function getData($id_barang){
        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.id_kategori', 'left');
        $this->db->where('id_barang', $id_barang);
        
        return $this->db->get()->row(); 
    }
    public function tambah($data){
        $this->db->insert('tbl_barang',$data);
    }
    public function edit($data){
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update('tbl_barang', $data);
    }
    public function delete($data){
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->delete('tbl_barang', $data);
    }
    

}

/* End of file M_user.php */


?>