<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_kategori');
        

    }

    // List all your items
    public function index( $offset = 0 )
    {
        {
            $data=array(
                'title'=>'Kategori',
                'kategori'=>$this->m_kategori->getAllData(),
                'isi'=>'v_kategori'
            );

            $this->load->view('layout/v_wrapper_backend',$data,FALSE);
        }
    }

    // Add a new item
    public function tambah()
    {
        $data=array(
            'nama_kategori'=>$this->input->post('nama_kategori'),
          );
        $this->m_kategori->tambah($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
        redirect('kategori');
    }

    public function edit( $id_kategori )
    {
        $data=array(
            'id_kategori'=>$id_kategori,
            'nama_kategori'=>$this->input->post('nama_kategori')
        );
        $this->m_kategori->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diubah');
        redirect('kategori');
    }

    //Delete one item
    public function delete( $id_kategori )
    {
        $data=array(
            'id_kategori'=>$id_kategori
        );
        $this->m_kategori->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('kategori');
    }
}

/* End of file Kategori.php */

  
?>