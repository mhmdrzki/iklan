<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * transaksi controllers class
 *
 * @package     CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */
class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Transaksi_model', 'Konfirmasi_model', 'Users_model'));
        $this->load->library('upload');
    }

    // transaksi view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        // Apply Filter
        // Get $_GET variable
        $f = $this->input->get(NULL, TRUE);

        $data['f'] = $f;

        $params = array();
        // kode transaksi
        if (isset($f['n']) && !empty($f['n']) && $f['n'] != '') {
            $params['kode_transaksi'] = $f['n'];
        }

        $paramsPage = $params;
        $params['limit'] = 10;
        $params['offset'] = $offset;
        $params['order_by'] = 'status, kode_transaksi';
        $data['transaksi'] = $this->Transaksi_model->get($params);
        
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['base_url'] = site_url('admin/transaksi/index');
        $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['total_rows'] = count($this->Transaksi_model->get($paramsPage));
        $this->pagination->initialize($config);

        $data['title'] = 'transaksi';
        $data['main'] = 'admin/transaksi/transaksi_list';
        $this->load->view('admin/layout', $data);
    }

    public function diproses($offset = NULL) {
        $this->load->library('pagination');
        // Apply Filter
        // Get $_GET variable
        $f = $this->input->get(NULL, TRUE);

        $data['f'] = $f;

        $params = array();
        // kode transaksi
        if (isset($f['n']) && !empty($f['n']) && $f['n'] != '') {
            $params['kode_transaksi'] = $f['n'];
        }

        $paramsPage = $params;
        $params['limit'] = 10;
        $params['offset'] = $offset;
        $params['order_by'] = 'status, kode_transaksi';
        $data['transaksi'] = $this->Transaksi_model->get($params);
        
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['base_url'] = site_url('admin/transaksi/diproses');
        $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['total_rows'] = count($this->Transaksi_model->get($paramsPage));
        $this->pagination->initialize($config);

        $data['title'] = 'transaksi';
        $data['main'] = 'admin/transaksi/proses_list';
        $this->load->view('admin/layout', $data);
    }

    public function ditolak($offset = NULL) {
        $this->load->library('pagination');
        // Apply Filter
        // Get $_GET variable
        $f = $this->input->get(NULL, TRUE);

        $data['f'] = $f;

        $params = array();
        // kode transaksi
        if (isset($f['n']) && !empty($f['n']) && $f['n'] != '') {
            $params['kode_transaksi'] = $f['n'];
        }

        $paramsPage = $params;
        $params['limit'] = 10;
        $params['offset'] = $offset;
        $params['order_by'] = 'status, kode_transaksi';
        $data['transaksi'] = $this->Transaksi_model->get($params);
        
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['base_url'] = site_url('admin/transaksi/ditolak');
        $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['total_rows'] = count($this->Transaksi_model->get($paramsPage));
        $this->pagination->initialize($config);

        $data['title'] = 'transaksi';
        $data['main'] = 'admin/transaksi/tolak_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($kd = NULL) {
        if ($this->Transaksi_model->get(array('kode_transaksi' => $kd)) == NULL) {
            redirect('admin/transaksi');
        }
        $data['transaksi'] = $this->Transaksi_model->get(array('kode_transaksi' => $kd));
        $data['konfirmasi'] = $this->Konfirmasi_model->get(array('kode_transaksi' => $kd));
        $data['title'] = 'Detail transaksi';
        $data['main'] = 'admin/transaksi/transaksi_detail';
        $this->load->view('admin/layout', $data);
    }

    // Add transaksi and Update
    public function terima($kd = NULL) {
        

            $data  = $this->Konfirmasi_model->get() ;
            foreach ($data as $row2) {

                if($row2['kode_transaksi'] == $kd){
                    
                    $params['kode_transaksi_update'] = $kd;

                    $params['status'] = 'Telah Diproses';

                    $aksi = $this->Transaksi_model->add($params);
            
                }
                
                
            }
            if (isset($aksi)) {
                $this->session->set_flashdata('success', 'Berhasil Memproses Transaksi');

                     redirect('admin/transaksi');
            }
            else{
                    $this->session->set_flashdata('failed', 'User Belum Melakukan Pembayaran');

                    redirect('admin/transaksi');
                }
             
    }
    public function tolak($kd = NULL) {
        

                   
            $params['kode_transaksi_update'] = $kd;

            $params['status'] = 'Ditolak';

            $aksi = $this->Transaksi_model->add($params);
                  
            
            if (isset($aksi)) {
                $this->session->set_flashdata('success', 'Transaksi telah ditolak');

                     redirect('admin/transaksi');
            }
            else{
                    $this->session->set_flashdata('failed', 'Terjadi kesalahan');

                    redirect('admin/transaksi');
                }
             
    }

    
    

    // Delete transaksi
    public function delete($id = NULL) {
        if ($_POST) {
            $this->transaksi_model->delete($this->input->post('del_id'));
           
            $this->session->set_flashdata('success', 'Hapus posting berhasil');
            redirect('admin/transaksi');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/transaksi/edit/' . $id);
        }
    }


function report($id = NULL) {
        $this->load->helper(array('dompdf'));
        if ($id == NULL)
            redirect('admin/transaksi');

        $data['transaksi'] = $this->transaksi_model->get(array('id' => $id));

        $html = $this->load->view('admin/transaksi/transaksi_pdf', $data, true);
        $data = pdf_create($html, '', TRUE);
    }
   
}

/* End of file transaksi.php */
/* Location: ./application/controllers/admin/transaksi.php */
