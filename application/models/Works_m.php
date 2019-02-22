<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Works_m extends CI_Model
{
     public function __construct()
    {
        parent::__construct();
    }
    public function create()
    {
        $data = array(
            'organisasi'        => $this->input->post('organisasi'),
            'jabatan'            => $this->input->post('jabatan'),
            'deskripsi'          => $this->input->post('deskripsi'),
            'tahun'          => $this->input->post('tahun'),
            'gaji'        => $this->input->post('gaji'),          
            'id_user'        => $this->session->userdata('id_user')

        );
 
        $sql = $this->db->insert('t_pengalaman', $data);
 
        if($sql === true) {
            return true;
        } else {
            return false;
        }
    }
 
    
    public function fetchWorksData($id = null)
    {
        $id = $this->session->userdata['id_user']; // dapatkan id user yg login 
        $this->db->select('*'); 
        $this->db->where('id_user', $id);// 
        $this->db->from('t_pengalaman'); 
        $query = $this->db->get(); 
        return $query->result_array();

        // if($id) {
        //     $sql = "SELECT * FROM t_detail WHERE id_detail = ?";
        //     $query = $this->db->query($sql, array($id));
        //     return $query->row_array();
        // }
 
        // $sql = "SELECT * FROM t_detail";
        // $query = $this->db->query($sql);
        // return $query->result_array();
    }
 
    public function remove($id = null) {
        if($id) {
            $sql = "DELETE FROM t_pengalaman WHERE id_pengalaman = ?";
            $query = $this->db->query($sql, array($id));
            return ($query === true) ? true : false;           
        }
    }
   
}