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
class CaraIklan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Profile_model'));
        $this->load->library('form_validation');
        $this->load->helper('string');
        $this->load->helper('url');        
    }

    function index() {  
        // redirect('user/login');


        $this->load->view('user/cara_iklan');
    }

    
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
