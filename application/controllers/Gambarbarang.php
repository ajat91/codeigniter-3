<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class gambarbarang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_gambarbarang');
        $this->load->model('m_barang');

    }

    // List all your items
    public function index( $offset = 0 )
    {
            $data=array(
                'title'=>'Gambar Barang',
                'gambarbarang'=>$this->m_gambarbarang->getAllData(),
                'isi'=>'gambarbarang/v_index'
            );

            $this->load->view('layout/v_wrapper_backend',$data,FALSE);
        }
    
    public function tambah($id_barang){
        $this->form_validation->set_rules('ket','Keterangan Gambar','required',
            array('required'=>'%s Harus Diisi')
        );
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './asset/gambarbarang/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name='gambar';
            if(!$this->upload->do_upload($field_name)){
                $data=array(
                    'title'=>'Tambah Gambar Barang',
                    'error_upload'=>$this->upload->display_errors(),
                    'barang'=>$this->m_barang->getData($id_barang),
                    'gambar'=>$this->m_gambarbarang->getGambar($id_barang),
                    'isi'=>'gambarbarang/v_tambah'
                );
                $this->load->view('layout/v_wrapper_backend',$data,FALSE);
                }else{
                $upload_data=array('uploads'=>$this->upload->data());
                $config['image_library']='gd2';
                $config['source_image']='./asset/gambarbarang/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data=array(
                    'id_barang'=>$id_barang,
                    'ket'=>$this->input->post('ket'),
                    'gambar'=>$upload_data['uploads']['file_name']
                );
                $this->m_gambarbarang->tambah($data);
                $this->session->set_flashdata('pesan', 'Gambar Berhasil Ditambahkan');
                redirect('gambarbarang/tambah/'.$id_barang);
            }
        } 
          $data=array(
            'title'=>'Tambah Gambar Barang',
            'barang'=>$this->m_barang->getData($id_barang),
            'gambar'=>$this->m_gambarbarang->getGambar($id_barang),
            'isi'=>'gambarbarang/v_tambah'
        );

        $this->load->view('layout/v_wrapper_backend',$data,FALSE);
    }
    public function delete( $id_barang,$id_gambar )
    {
        //hapus gambar
        $gambar=$this->m_gambarbarang->getData($id_gambar);
        if($gambar->gambar!=""){
            unlink('./asset/gambarbarang/'.$gambar->gambar);
        }
            //end 
        $data=array(
            'id_gambar'=>$id_gambar
        );
        $this->m_gambarbarang->delete($data);
        $this->session->set_flashdata('pesan', 'Gambar Berhasil Dihapus');
        redirect('gambarbarang/tambah/'.$id_barang);
    }
}

?>