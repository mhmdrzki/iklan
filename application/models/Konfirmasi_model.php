<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Posts Model Class
 *
 * @package     CMS
 * @subpackage  Models
 * @category    Models
 * @author      Achyar Anshorie
 */

class Konfirmasi_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id_konfirmasi']))
        {
            $this->db->where('konfirmasi_pembayaran.id_konfirmasi', $params['id_konfirmasi']);
        }
        if(isset($params['kode_transaksi']))
        {
            $this->db->where('kode_transaksi', $params['kode_transaksi']);
        }
        
        if(isset($params['tgl_bayar']))
        {
            $this->db->where('tgl_bayar', $params['tgl_bayar']);
        }
        if(isset($params['jml_bayar']))
        {
            $this->db->where('jml_bayar', $params['jml_bayar']);
        }
        if(isset($params['nama_bank']))
        {
            $this->db->where('nama_bank', $params['nama_bank']);
        }
        if(isset($params['tujuan_byr']))
        {
            $this->db->where('tujuan_byr', $params['tujuan_byr']);
        }
        if(isset($params['no_rek']))
        {
            $this->db->where('no_rek', $params['no_rek']);
        }
        if(isset($params['nama_rek']))
        {
            $this->db->where('nama_rek', $params['nama_rek']);
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
        

        $this->db->select('konfirmasi_pembayaran.id_konfirmasi, kode_transaksi,  tgl_bayar,
            jml_bayar, nama_bank, tujuan_byr, no_rek, nama_rek');
        $res = $this->db->get('konfirmasi_pembayaran');

        if(isset($params['id_konfirmasi']) OR (isset($params['limit']) AND $params['limit'] == 1) OR (isset($params['nama_bank'])))
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

    if(isset($data['id_konfirmasi'])) {
        $this->db->set('id_konfirmasi', $data['id_konfirmasi']);
    }

    if(isset($data['kode_transaksi'])) {
        $this->db->set('kode_transaksi', $data['kode_transaksi']);
    }

    

    if(isset($data['tgl_bayar'])) {
        $this->db->set('tgl_bayar', $data['tgl_bayar']);
    }

    

    if(isset($data['jml_bayar'])) {
        $this->db->set('jml_bayar', $data['jml_bayar']);
    }

    if(isset($data['nama_bank'])) {
        $this->db->set('nama_bank', $data['nama_bank']);
    }

    if(isset($data['tujuan_byr'])) {
        $this->db->set('tujuan_byr', $data['tujuan_byr']);
    }

    if(isset($data['no_rek'])) {
        $this->db->set('no_rek', $data['no_rek']);
    }

    if(isset($data['nama_rek'])) {
        $this->db->set('nama_rek', $data['nama_rek']);
    }

    

    if (isset($data['kode_transaksi_update'])) {
        $this->db->where('kode_transaksi', $data['kode_transaksi_update']);
        $this->db->update('konfirmasi_pembayaran');
        $id = $data['kode_transaksi_update'];
    } else {
        $this->db->insert('konfirmasi_pembayaran');
        $id = $this->db->insert_id();
    }

    $status = $this->db->affected_rows();
    return ($status == 0) ? FALSE : $id;
}

    // Delete to database
function delete($id) {
    $this->db->where('id_konfirmasi', $id);
    $this->db->delete('konfirmasi_pembayaran');
}



}
