<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * jns_byr controllers class
 *
 * @package     CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */
class Laporanpdf extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Transaksi_model', 'Users_model'));
        $this->load->library('pdf');
    }

    public function index($id = NULL) {
    
             
            $data['main'] = 'admin/laporanpdf/laporan';
            $this->load->view('admin/layout', $data);
        
    }

    function cetak(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('date_start', 'Dari Tanggal', 'trim|required|xss_clean');
        $this->form_validation->set_rules('date_end', 'Sampai Tanggal', 'trim|required|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        
        $status = null;
        $jenis = null;
        $dari =$this->input->post('date_start');

       
         // $pecah = explode("-", $dari);
         // //mencari element array 0
         // $hasil = $pecah[0];

        $sampai = $this->input->post('date_end');

        if ($_POST AND $this->form_validation->run() == TRUE) {

            
            $params['date_start'] = $this->input->post('date_start');
            $params['date_end'] = $this->input->post('date_end');
           
            
            
            $status = $this->Transaksi_model->get($params);


            // $this->session->set_flashdata('success', $data['operation'] . ' posting berhasil');
            // redirect('admin/laporanpdf');
        }

        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage('P', 'A5');

        // $logo = media_url().'/images/tut-wuri.png';
        // $pdf->Image($logo,10,10,20,25);  

        // $pdf->Cell(25);
        // $pdf->SetFont('Times','B','12');
        // $pdf->Cell(0,5,'PEMERINTAH KOTA PEKANBARU',0,1,'C');
        // $pdf->Cell(25);
        // $pdf->Cell(0,5,'DINAS PENDIDIKAN',0,1,'C');
        // $pdf->Cell(25);
        // $pdf->SetFont('Times','B','15');
        // $pdf->Cell(0,5,'SEKOLAH MENENGAH ATAS NEGERI 4',0,1,'C');
        // $pdf->Cell(25);
        // $pdf->SetFont('Times','I','8');
        // $pdf->Cell(0,5,'Jambat Balo Pagar Alam Selatan Kota Pagar Alam Telp. (0730)622442',0,1,'C');
        // $pdf->Cell(25);
        // $pdf->Cell(0,2,'Website: http://sman4pagaralam.sch.id | E-Mail: smanegeri4pagaralam@gmail.com',0,1,'C');


        

        // $pdf->SetLineWidth(1);
        // $pdf->Line(10,36,138,36);
        // $pdf->SetLineWidth(0);
        // $pdf->Line(10,37,138,37);

         $siswa = null;

            $total_spp      = $this->Transaksi_model->get();
            // $ttl_msk = null;
            //         foreach ($total_spp as $row) {
            //             $ttl_msk = $ttl_msk+$row['jumlah_byr'];
            //         }


            $pdf->Cell(10,5,'',0,1);

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(0,10,'Laporan Transaksi Pesan Iklan Baris',0,1,'C');
            
            $pdf->SetFont('Arial','B',6);
            $pdf->Cell(5,6,'No',1,0);
            $pdf->Cell(11,6,'Tanggal',1,0);
            $pdf->Cell(20,6,'Kode Transaksi',1,0);
            $pdf->Cell(22,6,'Nama',1,0);
            $pdf->Cell(21,6,'Email',1,0);
            $pdf->Cell(35,6,'Tanggal Tayang',1,0);
            $pdf->Cell(15,6,'Total Biaya',1,1);
            $pdf->SetFont('Arial','',5);
            $i=1;

            foreach ($status as $row){

            $user = $this->Users_model->get(array('id_users' => $row['id_users']));          
                $pdf->Cell(5,6,$i,1,0);
                $pdf->Cell(11,6,$row['tgl_transaksi'],1,0);
                $pdf->Cell(20,6,$row['kode_transaksi'],1,0);
                $pdf->Cell(22,6,$user['user_nama'],1,0);
                $pdf->Cell(21,6,$user['user_email'],1,0);
                $pdf->Cell(35,6,$row    ['tgl_tayang'],1,0);
                $pdf->Cell(15,6,'Rp. '.$row['total_biaya'],1,1);
                $i++;
            }
                // $pdf->Cell(104,6,'TOTAL',1,0,'C');
                
                // $pdf->Cell(25,6,'Rp. '.$ttl_msk,1,1);

        
        $pdf->Output();
    }

    
   
}
