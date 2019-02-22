<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Education_m extends CI_Model
{
     public function __construct()
    {
        parent::__construct();
    }
    public function create()
    {
        $data = array(
            'institusi'        => $this->input->post('institusi'),
            'jurusan'            => $this->input->post('jurusan'),
             'level_pendidikan'  => $this->input->post('level_pendidikan'),
            'tahun_lulus'          => $this->input->post('tahun_lulus'),
            'nilai'          => $this->input->post('nilai'),
            'id_user'        => $this->session->userdata('id_user')
        
        );
 
        $sql = $this->db->insert('t_pendidikan', $data);
 
        if($sql === true) {
            return true;
        } else {
            return false;
        }
    }
 
    
    public function fetchEducationData($id = null)
    {
        $id = $this->session->userdata['id_user']; // dapatkan id user yg login 
        $this->db->select('*'); 
        $this->db->where('id_user', $id);// 
        $this->db->from('t_pendidikan'); 
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
            $sql = "DELETE FROM t_pendidikan WHERE id_pendidikan = ?";
            $query = $this->db->query($sql, array($id));
            return ($query === true) ? true : false;           
        }
    }
   
}