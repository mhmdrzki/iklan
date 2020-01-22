<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * user Model Class
 *
 * @package     SYSCMS
 * @subpackage  Models
 * @category    Models
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */
class Profile_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array()) {
        $this->db->select('admin.user_id, user_name, user_password, user_full_name, user_description,
            user_email, user_input_date, user_last_update');

        if (isset($params['id'])) {
            $this->db->where('admin.user_id', $params['id']);
        }
        if (isset($params['user_id'])) {
            $this->db->where('admin.user_id', $params['user_id']);
        }
        if (isset($params['name'])) {
            $this->db->like('user_name', $params['name']);
        }
        if (isset($params['date'])) {
            $this->db->where('user_input_date', $params['date']);
        }

        if (isset($params['limit'])) {
            if (!isset($params['offset'])) {
                $params['offset'] = NULL;
            }

            $this->db->limit($params['limit'], $params['offset']);
        }

        if (isset($params['order_by'])) {
            $this->db->order_by($params['order_by'], 'desc');
        } else {
            $this->db->order_by('user_last_update', 'desc');
        }

        // $this->db->join('user_role', 'user_role.role_id = user.user_role_role_id', 'left');
        $res = $this->db->get('admin');

        if (isset($params['id'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

   

    function add($data = array()) {

        if (isset($data['user_id'])) {
            $this->db->set('user_id', $data['user_id']);
        }

        if (isset($data['user_name'])) {
            $this->db->set('user_name', $data['user_name']);
        }

        if (isset($data['user_password'])) {
            $this->db->set('user_password', $data['user_password']);
        }

        if (isset($data['user_full_name'])) {
            $this->db->set('user_full_name', $data['user_full_name']);
        }

        if (isset($data['user_email'])) {
            $this->db->set('user_email', $data['user_email']);
        }

        if (isset($data['user_description'])) {
            $this->db->set('user_description', $data['user_description']);
        }

        if (isset($data['user_input_date'])) {
            $this->db->set('user_input_date', $data['user_input_date']);
        }

        if (isset($data['user_last_update'])) {
            $this->db->set('user_last_update', $data['user_last_update']);
        }

        

        if (isset($data['user_id'])) {
            $this->db->where('user_id', $data['user_id']);
            $this->db->update('admin');
            $id = $data['user_id'];
        } else {
            $this->db->insert('admin');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    

    function delete($id) {
        $this->db->set('user_is_deleted', 1);
        $this->db->where('user_id', $id);
        $this->db->update('admin');
    }

    

    function change_password($id, $params) {
        $this->db->where('user_id', $id);
        $this->db->update('user', $params);
    }

}
