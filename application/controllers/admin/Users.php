<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * siswa controllers class
 *
 * @package     CMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Achyar Anshorie
 */
class Users extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('users_model', 'Users_model'));
        $this->load->library('upload');
    }

    // siswa view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        // Apply Filter
        // Get $_GET variable
        $f = $this->input->get(NULL, TRUE);

        $data['f'] = $f;

        $params = array();
        // nis
        if (isset($f['n']) && !empty($f['n']) && $f['n'] != '') {
            $params['siswa_nama'] = $f['n'];
        }

        $paramsPage = $params;
        $params['limit'] = 10;
        $params['offset'] = $offset;
        $data['users'] = $this->Users_model->get($params);

        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['base_url'] = site_url('admin/users/index');
        $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['total_rows'] = count($this->Users_model->get($paramsPage));
        $this->pagination->initialize($config);

        $data['title'] = 'users';
        $data['main'] = 'admin/users/user_list';
        $this->load->view('admin/layout', $data);
    }



    // Delete siswa
    public function delete($id = NULL) {
        if (isset($id)) {
            $this->Users_model->delete($id);
            
            $this->session->set_flashdata('success', 'Hapus posting berhasil');
            redirect('admin/users');
        } else  {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/users');
        }
    }


   
}

/* End of file siswa.php */
/* Location: ./application/controllers/admin/users.php */
