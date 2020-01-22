<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Auth controllers class
 *
 ** @package     HRA CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */
class Riwayat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Profile_model'));
        $this->load->library('form_validation');
        $this->load->helper('string');
        $this->load->helper('url');        
    
        $this->load->model(array('Users_model', 'Transaksi_model', 'Konfirmasi_model'));
    }

    function index() {  
        if ($this->session->userdata('user_logged') == NULL) {
            header("Location:" . site_url('user/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->view('user/riwayat_pesanan');
    }

    function add(){
       
        $tgl_skr = date('Ymd');
        $cek_kode = $this->Transaksi_model->cek_kode($tgl_skr);
        $kode_trans = "";
        foreach($cek_kode->result() as $ck)
        {
            if($ck->kd==NULL)
            {
                $kode_trans = $tgl_skr.'001';
            }
            else
            {
                $kd_lama = $ck->kd;
                $kode_trans = $kd_lama+1;
            }
        }
        $params['id_users']         = $this->session->userdata('id_users');
        $params['kode_transaksi']   = $kode_trans;
        $params['pesan_iklan']      = $this->input->post('ta');
        $params['tgl_tayang']       = $this->input->post('tgl_tayang');
        $params['tgl_transaksi']    = date('Y-m-d');
        $params['jml_baris']        = $this->input->post('jml_baris');
        $params['total_biaya']      = $this->input->post('total_biaya');

        


            
                $this->Transaksi_model->add($params);

                $this->session->set_flashdata('sukses','Data Berhasil Dikirim');
                ?>
                <script type="text/javascript">
                    alert("Pesanan anda telah terkirim, Silahkan melakukan Konfirmasi Pembayaran. Kami akan memproses pesanan anda ketika telah melakukan Konfirmasi Pembayaran.\nTerima Kasih");
                </script>
                <?php
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."user/home'>";
            
    }

    function tampil(){


        $this->load->view('user/aaaaa');

    }

    function detail($kode_transaksi = null){
        if ($this->session->userdata('user_logged') == NULL) {
            header("Location:" . site_url('user/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $data['data_header'] = $this->Transaksi_model->get(array('kode_transaksi' => $kode_transaksi));
        $data['konfirmasi'] = $this->Konfirmasi_model->get(array('kode_transaksi' => $kode_transaksi));
        $this->load->view('user/detail_riwayat', $data);

    }

    function batal($kode_transaksi = null){
        if ($this->session->userdata('user_logged') == NULL) {
            header("Location:" . site_url('user/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        
            
            $params['kode_transaksi_update'] = $kode_transaksi;

            $params['status'] = 'Transaksi Dibatalkan';

            $aksi = $this->Transaksi_model->add($params);
    
        
                
                
            
            if (isset($aksi)) {
                $this->session->set_flashdata('success', 'Berhasil Memproses Transaksi');

                     redirect('user/riwayat');
            }
            else{
                    $this->session->set_flashdata('failed', 'User Belum Melakukan Pembayaran');

                    redirect('user/riwayat');
                }
            
    }


    //insert
        // foreach ($period as $day) {
        //     // Do stuff with each $day...
        //     $tag[]  = "('".$day->format('Y-m-d')."')"; // Change this line

        // }

        // $values = implode(",", $tag);

        // $sql = "INSERT INTO my_table (date) VALUES ".$values;


    // function login() {
    //     if ($this->session->userdata('logged')) {
    //         redirect('admin');
    //     }
    //     $this->form_validation->set_rules('username', 'Username', 'trim|required');
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required');
    //     if ($_POST AND $this->form_validation->run() == TRUE) {
    //         if ($this->input->post('location')) {
    //             $lokasi = $this->input->post('location');
    //         } else {
    //             $lokasi = NULL;
    //         }
    //         $this->process_login($lokasi);
    //     } else {
    //         $this->load->view('admin/login');
    //     }
    // }

    // // Login Prosessing
    // function process_login($lokasi = '') {
    //     $this->load->library('form_validation');
    //     $this->form_validation->set_rules('username', 'Username', 'required');
    //     $this->form_validation->set_rules('password', 'Password', 'required');

    //     if ($this->form_validation->run() == TRUE) {
    //         $username = $this->input->post('username', TRUE);
    //         $password = $this->input->post('password', TRUE);
    //         $this->db->from('users');
    //         $this->db->where('user_name', $username);
    //         $this->db->where('user_password', md5($password));
            
    //         $query = $this->db->get();

    //         if ($query->num_rows() > 0) {
    //             $this->session->set_userdata('logged', TRUE);
    //             $this->session->set_userdata('id_users', $query->row('id_users'));
    //             $this->session->set_userdata('user_name', $query->row('user_name'));
    //             $this->session->set_userdata('user_email', $query->row('user_email'));
    //             $this->session->set_userdata('user_nama', $query->row('user_nama'));
                
    //             if ($lokasi != '') {
    //                 header("Location:" . htmlspecialchars($lokasi));
    //             } else {
    //                 redirect('admin');
    //             }
    //         } else {
    //             if ($lokasi != '') {
    //                 $this->session->set_flashdata('failed', 'Sorry, username and password do not match');
    //                 header("Location:" . site_url('user/login') . "?location=" . urlencode($lokasi));
    //             } else {
    //                 $this->session->set_flashdata('failed', 'Sorry, username and password do not match');
    //                 redirect('user/login');
    //             }
    //         }
    //     } else {
    //         $this->session->set_flashdata('failed', 'Sorry, username and password are not complete');
    //         redirect('user/login');
    //     }
    // }

    // // Logout Processing
    // function logout() {
    //     $this->session->unset_userdata('logged');
    //     $this->session->unset_userdata('id_users');
    //     $this->session->unset_userdata('user_name');
    //     $this->session->unset_userdata('user_email');
    //     $this->session->unset_userdata('user_nama');
    //     if ($this->input->post('location')) {
    //         $lokasi = $this->input->post('location');
    //     } else {
    //         $lokasi = NULL;
    //     }
    //     header("Location:" . $lokasi);
    // }

}
