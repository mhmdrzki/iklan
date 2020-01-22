<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Posts Model Class
 *
 * @package     CMS
 * @subpackage  Models
 * @category    Models
 * @author      Achyar Anshorie
 */

class Transaksi_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id_transaksi']))
        {
            $this->db->where('transaksi_iklan.id_transaksi', $params['id_transaksi']);
        }
        if(isset($params['id_users']))
        {
            $this->db->where('id_users', $params['id_users']);
        }

        if(isset($params['kode_transaksi']))
        {
            $this->db->where('kode_transaksi', $params['kode_transaksi']);
        }

        if(isset($params['pesan_iklan']))
        {
            $this->db->where('pesan_iklan', $params['pesan_iklan']);
        }
        
        if(isset($params['tgl_tayang']))
        {
            $this->db->where('tgl_tayang', $params['tgl_tayang']);
        }
        if(isset($params['tgl_transaksi']))
        {
            $this->db->where('tgl_transaksi', $params['tgl_transaksi']);
        }
        if(isset($params['jml_baris']))
        {
            $this->db->where('jml_baris', $params['jml_baris']);
        }
        if(isset($params['total_biaya']))
        {
            $this->db->where('total_biaya', $params['total_biaya']);
        }
        if(isset($params['status']))
        {
            $this->db->where('status', $params['status']);
        }
        

        if(isset($params['date_start']) AND isset($params['date_end'])) {
            $this->db->where('tgl_transaksi >=', $params['date_start'] . ' 00:00:00');
            $this->db->where('tgl_transaksi <=', $params['date_end'] . ' 00:00:00');
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
        

        $this->db->select('transaksi_iklan.id_transaksi, id_users, kode_transaksi, pesan_iklan,  tgl_tayang, tgl_transaksi, jml_baris, total_biaya, status');
        $res = $this->db->get('transaksi_iklan');

        if(isset($params['id_transaksi']) OR (isset($params['limit']) AND $params['limit'] == 1) OR (isset($params['total_biaya'])))
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

       if(isset($data['id_transaksi'])) {
        $this->db->set('id_transaksi', $data['id_transaksi']);
    }

    if(isset($data['pesan_iklan'])) {
        $this->db->set('pesan_iklan', $data['pesan_iklan']);
    }

    if(isset($data['id_users'])) {
        $this->db->set('id_users', $data['id_users']);
    }

    if(isset($data['kode_transaksi'])) {
        $this->db->set('kode_transaksi', $data['kode_transaksi']);
    }

    if(isset($data['tgl_tayang'])) {
        $this->db->set('tgl_tayang', $data['tgl_tayang']);
    }

    
    if(isset($data['tgl_transaksi'])) {
        $this->db->set('tgl_transaksi', $data['tgl_transaksi']);
    }

    if(isset($data['jml_baris'])) {
        $this->db->set('jml_baris', $data['jml_baris']);
    }

    if(isset($data['total_biaya'])) {
        $this->db->set('total_biaya', $data['total_biaya']);
    }
    if(isset($data['status'])) {
        $this->db->set('status', $data['status']);
    }


   

    

    if (isset($data['kode_transaksi_update'])) {
        $this->db->where('kode_transaksi', $data['kode_transaksi_update']);
        $this->db->update('transaksi_iklan');
        $id = $data['kode_transaksi_update'];
    } else {
        $this->db->insert('transaksi_iklan');
        $id = $this->db->insert_id();
    }

    $status = $this->db->affected_rows();
    return ($status == 0) ? FALSE : $id;
}

function cek_kode($tgl)
    {
        $query=$this->db->query("select MAX(kode_transaksi) as kd from transaksi_iklan where kode_transaksi like '%$tgl%'");
        return $query;
    }


    // Delete to database
function delete($id) {
    $this->db->where('id_transaksi', $id);
    $this->db->delete('transaksi_iklan');
}



}
