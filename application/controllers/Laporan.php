<?php  
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Laporan extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            //Load Dependencies
             $this->load->model('m_laporan');
            //  $this->load->model('m_pesanan_masuk');
             
    
        }
        public function index()
        {
            $data=array(
                'title'=>'Laporan',
                'isi'=>'v_laporan'
            );

            $this->load->view('layout/v_wrapper_backend',$data,FALSE);
        }
        public function lap_harian()
        {
            $this->m_laporan->show_laporan_harian();
            // $this->load->library('dompdf_gen');
            // $tanggal=$this->input->post('tanggal');
            // $bulan=$this->input->post('bulan');
            // $tahun=$this->input->post('tahun');
            // $data=array(
            //     'title'=>'Laporan Penjualan Harian',
            //     'tanggal'=>$tanggal,
            //     'bulan'=>$bulan,
            //     'tahun'=>$tahun,
            //     'laporan'=>$this->m_laporan->lap_harian($tanggal, $bulan, $tahun),
            //     //'isi'=>'v_lap_harian'
            // );

            // $this->load->view('v_lap_harian',$data);
            // $paper='A4';
            // $ori='portrait';
            // $html=$this->output->get_output();
            // $this->dompdf->set_paper($paper,$ori);
            // $this->dompdf->load_html($html);
            // $this->dompdf->render();
            // $this->dompdf->stream('laporan_harian.pdf',array('Attachment'=>0));

        }

        public function lap_bulanan()
        {
            $bulan=$this->input->post('bulan');
            $tahun=$this->input->post('tahun');
            $data=array(
                'title'=>'Laporan Penjualan Bulanan',
                'bulan'=>$bulan,
                'tahun'=>$tahun,
                'laporan'=>$this->m_laporan->lap_bulanan($bulan, $tahun),
                'isi'=>'v_lap_bulanan'
            );

            $this->load->view('layout/v_wrapper_backend',$data,FALSE);
        }
        public function lap_tahunan()
        {
            $tahun=$this->input->post('tahun');
            $data=array(
                'title'=>'Laporan Penjualan Tahunan',
                'tahun'=>$tahun,
                'laporan'=>$this->m_laporan->lap_tahunan($tahun),
                'isi'=>'v_lap_tahunan'
            );

            $this->load->view('layout/v_wrapper_backend',$data,FALSE);
        }
    }
?>