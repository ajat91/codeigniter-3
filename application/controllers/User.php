<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        //Load Dependencies

    }

    // List all your items
    public function index()
    {
        {
            $data=array(
                'title'=>'User',
                'user'=>$this->m_user->getAllData(),
                'isi'=>'v_user'
            );

            $this->load->view('layout/v_wrapper_backend',$data,FALSE);
        }
    }

    // Add a new item
    public function tambah()
    {
        $data=array(
            'nama_user'=>$this->input->post('nama'),
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password'),
            'level'=>$this->input->post('level')
        );
        $this->m_user->tambah($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
        redirect('user');
        
    }

    //Update one item
    public function edit( $id_user )
    {
        $data=array(
            'id_user'=>$id_user,
            'nama_user'=>$this->input->post('nama'),
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password'),
            'level'=>$this->input->post('level')
        );
        $this->m_user->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diubah');
        redirect('user');
    }

    //Delete one item
    public function delete( $id_user )
    {
        $data=array(
            'id_user'=>$id_user);
        $this->m_user->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('user');
    }
}

/* End of file Controllername.php */

  
?>