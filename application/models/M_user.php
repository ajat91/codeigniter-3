<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function getAllData(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->order_by('id_user','asc');
        return $this->db->get()->result(); 
    }
    public function tambah($data){
        $this->db->insert('tbl_user',$data);
    }
    public function edit($data){
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('tbl_user', $data);
    }
    public function delete($data){
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('tbl_user', $data);
    }
    

}

/* End of file M_user.php */


?>