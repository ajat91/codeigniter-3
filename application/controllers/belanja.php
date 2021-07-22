<?php  
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Belanja extends CI_Controller {
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('m_home');
            $this->load->model('m_transaksi');
            
        }
        public function index()
        {
            if(empty($this->cart->contents())){
                redirect('home');
            }
            $data=array(
                'title'=>'Keranjang Belanja',
                //'barang'=>$this->m_home->getAllData(),
                'isi'=>'v_belanja'
            );
            
            $this->load->view('layout/v_wrapper_frontend',$data,FALSE);
        }
      
        
        // public function index()
        // {
        //     $data=array(
        //         'title'=>'Home',
        //         'barang'=>$this->m_home->getAllData(),
        //         'isi'=>'v_home'
        //     );

        //     $this->load->view('layout/v_wrapper_frontend',$data,FALSE);
        // }
        public function tambah()
        {
            $redirect_page= $this->input->post('redirect_page');
            $data = array(
                'id'      => $this->input->post('id'),
                'qty'     => $this->input->post('qty'),
                'price'   => $this->input->post('price'),
                'name'    => $this->input->post('name'),
        );
        $this->cart->insert($data); 
        redirect($redirect_page,'refresh');     
        }
        public function delete($rowid)
        {
                $this->cart->remove($rowid);
                
                redirect('belanja');
                
        }
        public function update()
        {
            $i=1;
            foreach ($this->cart->contents() as $item){
                $data = array(
                    'rowid' => $item['rowid'],
                    'qty'   => $this->input->post($i.'[qty]'),
            );
            
            $this->cart->update($data);
            $i++;
            }
            $this->session->set_flashdata('pesan', 'Keranjang Berhasil Diupdate');
            redirect('belanja');
        }
        public function clear()
        {
                $this->cart->destroy();
                
                redirect('belanja');
                
        }
        public function cekout()
        {

            $this->pelanggan_login->proteksi_halaman();
            $this->form_validation->set_rules('provinsi','Provinsi','required',
            array('required'=>'%s Harus Diisi') );
            $this->form_validation->set_rules('kota','Kota','required',
            array('required'=>'%s Harus Diisi') );
            $this->form_validation->set_rules('expedisi','expedisi','required',
            array('required'=>'%s Harus Diisi') );
            $this->form_validation->set_rules('paket','paket','required',
            array('required'=>'%s Harus Diisi') );
            
         
            
            if ($this->form_validation->run() == FALSE) {
                $data=array(
                    'title'=>'Checkout Belanja',
                    //'barang'=>$this->m_home->getAllData(),
                    'isi'=>'v_cekout'
                );
                
                $this->load->view('layout/v_wrapper_frontend',$data,FALSE);
            } else {
                //simpan ke tabel transaksi
               $data=array(
                   'id_pelanggan'=>$this->session->userdata('id_pelanggan'),
                   'no_order'=>$this->input->post('no_order'),
                   'tgl_order'=>date('Y-m-d'),
                   'no_hp'=>$this->input->post('no_hp'),
                   'provinsi'=>$this->input->post('provinsi'),
                   'kode_pos'=>$this->input->post('kode_pos'),
                   'alamat'=>$this->input->post('alamat'),
                   'expedisi'=>$this->input->post('expedisi'),
                   'kota'=>$this->input->post('kota'),
                   'estimasi'=>$this->input->post('estimasi'),
                   'berat'=>$this->input->post('berat'),
                   'ongkir'=>$this->input->post('ongkir'),
                   'grand_total'=>$this->input->post('grand_total'),
                   'total_bayar'=>$this->input->post('total_bayar'),
                   'nama_penerima'=>$this->input->post('nama_penerima'),
                   'paket'=>$this->input->post('paket'),
                   'status_bayar'=>'0',
                   'status_order'=>'0',
                );
                $this->m_transaksi->simpan_transaksi($data);
                //simpan ke tabel rinci transaksi
                $i=1;
                foreach ($this->cart->contents() as $item){
                    $data_rinci=array(
                        'no_order'=>$this->input->post('no_order'),
                        'id_barang'=>$item['id'],
                        'qty'=>$this->input->post('qty'.$i++),
                    );
                     //menyimpan data ke tabel rincian transaksi
                    $this->m_transaksi->simpan_rinci_transaksi($data_rinci);
                
                }
               //
                $this->session->set_flashdata('pesan', 'Pesanan Berhasil Diproses');
                $this->cart->destroy();
                redirect('pesanan_saya');                
            }
            
            
        }
        
}
?>