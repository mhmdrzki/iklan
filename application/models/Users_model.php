<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Posts Model Class
 *
 * @package     CMS
 * @subpackage  Models
 * @category    Models
 * @author      Achyar Anshorie
 */

class Users_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id_users']))
        {
            $this->db->where('users.id_users', $params['id_users']);
        }
        if(isset($params['user_name']))
        {
            $this->db->where('user_name', $params['user_name']);
        }
        
        if(isset($params['user_email']))
        {
            $this->db->where('user_email', $params['user_email']);
        }
        if(isset($params['user_password']))
        {
            $this->db->where('user_password', $params['user_password']);
        }
        if(isset($params['user_nama']))
        {
            $this->db->where('user_nama', $params['user_nama']);
        }
        if(isset($params['phone']))
        {
            $this->db->where('phone', $params['phone']);
        }
        if(isset($params['alamat']))
        {
            $this->db->where('alamat', $params['alamat']);
        }

        if(isset($params['limit']))
        { 
            if(!isset($params['offset']))
            {
                $params['offset'] = NULL;
            }

            $this->db->limit($params['limit'], $params['offset']);
        }

        if(isset($params['order_by']))
        {
            $this->db->order_by($params['order_by'], 'asc');
        }
        

        $this->db->select('users.id_users, user_name,  user_email,
            user_password, user_nama, phone, alamat');
        $res = $this->db->get('users');

        if(isset($params['id_users']) OR (isset($params['limit']) AND $params['limit'] == 1) OR (isset($params['user_name'])))
        {
            return $res->row_array();
        }
        else
        {
            return $res->result_array();
        }
    }

    // Add and update to database
    function add($data = array()) {

       if(isset($data['id_users'])) {
        $this->db->set('id_users', $data['id_users']);
    }

    if(isset($data['user_name'])) {
        $this->db->set('user_name', $data['user_name']);
    }

    

    if(isset($data['user_email'])) {
        $this->db->set('user_email', $data['user_email']);
    }

    

    if(isset($data['user_password'])) {
        $this->db->set('user_password', $data['user_password']);
    }

    if(isset($data['user_nama'])) {
        $this->db->set('user_nama', $data['user_nama']);
    }

    if(isset($data['phone'])) {
        $this->db->set('phone', $data['phone']);
    }

    if(isset($data['alamat'])) {
        $this->db->set('alamat', $data['alamat']);
    }

    

    if (isset($data['id_users'])) {
        $this->db->where('id_users', $data['id_users']);
        $this->db->update('users');
        $id = $data['id_users'];
    } else {
        $this->db->insert('users');
        $id = $this->db->insert_id();
    }

    $status = $this->db->affected_rows();
    return ($status == 0) ? FALSE : $id;
}

    // Delete to database
function delete($id) {
    $this->db->where('id_users', $id);
    $this->db->delete('users');
}


}
