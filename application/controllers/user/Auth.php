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
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Profile_model'));
        $this->load->library('form_validation');
        $this->load->helper('string');
        $this->load->helper('url');        
    }

    function index() {  
         if ($this->session->userdata('user_logged') == NULL) {
            header("Location:" . site_url('user/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        redirect('user/auth/login');
    }

    function login() {
        if ($this->session->userdata('user_logged')) {
            redirect('user');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($_POST AND $this->form_validation->run() == TRUE) {
            $this->process_login();
        } else {

            $this->load->view('user/login');
        }
    }

    
    // Login Prosessing
    function process_login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);
            $this->db->from('users');
            $this->db->where('user_name', $username);
            $this->db->where('user_password', md5($password));
            
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                
                $this->session->set_userdata('user_logged', TRUE);
                $this->session->set_userdata('id_users', $query->row('id_users'));
                $this->session->set_userdata('user_name', $query->row('user_name'));
                $this->session->set_userdata('user_email', $query->row('user_email'));
                $this->session->set_userdata('user_nama', $query->row('user_nama'));
                
                
                    redirect('user');
                
            } else {
            ?>
             <script>
                    alert("Username atau password anda salah!!.\nSilahkan Login Kembali :)");
                </script>
            <?php
                    redirect('user/auth');
                
            }
        } else {
                        ?>
             <script>
                    alert("Username atau password anda salah!!.\nSilahkan Login Kembali :)");
                </script>
            <?php

            redirect('user/login');
        }
    }

    // Logout Processing
    function logout() {
        $this->session->unset_userdata('user_logged');
        $this->session->unset_userdata('id_users');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_nama');
        
        redirect('user','refresh');
    }

}
