<?php  


defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barang');
        $this->load->model('m_kategori');
        //Load Dependencies

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $data=array(
            'title'=>'Barang',
            'barang'=>$this->m_barang->getAllData(),
            'isi'=>'barang/v_barang'
        );

        $this->load->view('layout/v_wrapper_backend',$data,FALSE);
    }

    // Add a new item
    public function tambah()
    {
        $this->form_validation->set_rules('nama_barang','Nama Barang','required',
            array('required'=>'%s Harus Diisi')
        );
        $this->form_validation->set_rules('id_kategori','Id Kategori','required',
            array('required'=>'%s Harus Diisi')
        );
        $this->form_validation->set_rules('harga','Harga','required',
            array('required'=>'%s Harus Diisi')
        );
        $this->form_validation->set_rules('deskripsi','Deskripsi','required',
            array('required'=>'%s Harus Diisi')
        );
        $this->form_validation->set_rules('berat','Berat','required',
            array('required'=>'%s Harus Diisi')
        );

        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './asset/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name='gambar';
            if(!$this->upload->do_upload($field_name)){
                $data=array(
                    'title'=>'Tambah Barang',
                    'kategori'=>$this->m_kategori->getAlldata(),
                    'error_upload'=>$this->upload->display_errors(),
                    'isi'=>'barang/v_tambah'
                );
                $this->load->view('layout/v_wrapper_backend',$data,FALSE);
            }else{
                $upload_data=array('uploads'=>$this->upload->data());
                $config['image_library']='gd2';
                $config['source_image']='./asset/gambar/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data=array(
                    'nama_barang'=>$this->input->post('nama_barang'),
                    'id_kategori'=>$this->input->post('id_kategori'),
                    'harga'=>$this->input->post('harga'),
                    'berat'=>$this->input->post('berat'),
                    'deskripsi'=>$this->input->post('deskripsi'),
                    'gambar'=>$upload_data['uploads']['file_name']
                );
                $this->m_barang->tambah($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
                redirect('barang');
            }
        } 
        
        
        $data=array(
            'title'=>'Tambah Barang',
            'kategori'=>$this->m_kategori->getAlldata(),
            'isi'=>'barang/v_tambah'
        );

        $this->load->view('layout/v_wrapper_backend',$data,FALSE);
    }

    //Update one item
    public function edit( $id_barang )
    {
        $this->form_validation->set_rules('nama_barang','Nama Barang','required',
            array('required'=>'%s Harus Diisi')
        );
        $this->form_validation->set_rules('id_kategori','Id Kategori','required',
            array('required'=>'%s Harus Diisi')
        );
        $this->form_validation->set_rules('harga','Harga','required',
            array('required'=>'%s Harus Diisi')
        );
        $this->form_validation->set_rules('deskripsi','Deskripsi','required',
            array('required'=>'%s Harus Diisi')
        );
        $this->form_validation->set_rules('berat','Berat','required',
            array('required'=>'%s Harus Diisi')
        );

        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './asset/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name='gambar';
            if(!$this->upload->do_upload($field_name)){
                $data=array(
                    'title'=>'Edit Data Barang',
                    'kategori'=>$this->m_kategori->getAlldata(),
                    'barang'=>$this->m_barang->getData($id_barang),
                    'error_upload'=>$this->upload->display_errors(),
                    'isi'=>'barang/v_edit'
                );
                $this->load->view('layout/v_wrapper_backend',$data,FALSE);
            }else{
                //hapus gambar
                $barang=$this->m_barang->getData($id_barang);
                if($barang->gambar!=""){
                    unlink('./asset/gambar/'.$barang->gambar);
                }
                //end 
                $upload_data=array('uploads'=>$this->upload->data());
                $config['image_library']='gd2';
                $config['source_image']='./asset/gambar/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data=array(
                    'id_barang'=>$id_barang,
                    'nama_barang'=>$this->input->post('nama_barang'),
                    'id_kategori'=>$this->input->post('id_kategori'),
                    'harga'=>$this->input->post('harga'),
                    'berat'=>$this->input->post('berat'),
                    'deskripsi'=>$this->input->post('deskripsi'),
                    'gambar'=>$upload_data['uploads']['file_name']
                );
                $this->m_barang->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diubah');
                redirect('barang');
            }
            //jika tidak ganti foto
            $data=array(
                'id_barang'=>$id_barang,
                'nama_barang'=>$this->input->post('nama_barang'),
                'id_kategori'=>$this->input->post('id_kategori'),
                'harga'=>$this->input->post('harga'),
                'berat'=>$this->input->post('berat'),
                'deskripsi'=>$this->input->post('deskripsi'),
            );
            $this->m_barang->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diubah');
            redirect('barang');
        } 
        
        
        $data=array(
            'title'=>'Edit Data Barang',
            'kategori'=>$this->m_kategori->getAlldata(),
            'barang'=>$this->m_barang->getData($id_barang),
            'isi'=>'barang/v_edit'
        );

        $this->load->view('layout/v_wrapper_backend',$data,FALSE);
    
    }

    //Delete one item
    public function delete( $id_barang )
    {
        //hapus gambar
        $barang=$this->m_barang->getData($id_barang);
        if($barang->gambar!=""){
            unlink('./asset/gambar/'.$barang->gambar);
        }
            //end 
        $data=array(
            'id_barang'=>$id_barang
        );
        $this->m_barang->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('barang');
    }
}

/* End of file Controllername.php */


?>