<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile_m extends CI_Model
{
     public function __construct()
    {
        parent::__construct();
    }
    public function create()
    {
        $data = array(
            'alamat'        => $this->input->post('alamat'),
            'jk'            => $this->input->post('jk'),
            'tlpn'          => $this->input->post('tlpn'),
            'status'        => $this->input->post('status'),
            'tempat_lahir'  => $this->input->post('tempat_lahir'),
            'tgl_lahir'     => $this->input->post('tgl_lahir'),
            'nik_paspor'    => $this->input->post('nik_paspor'),
             'negara'       => $this->input->post('negara'),
            'id_user'       => $this->session->userdata('id_user')
           
        );
 
        $sql = $this->db->insert('t_detail', $data);
 
        if($sql === true) {
            return true;
        } else {
            return false;
        }
    }

    public function fetchProfileData($id = null)
    {
        $id = $this->session->userdata['id_user']; // dapatkan id user yg login 
        $this->db->select('*'); 
        $this->db->where('id_user', $id);// 
        $this->db->where('maksimal <>','1');// 
        $this->db->from('t_detail'); 
        $query = $this->db->get(); 
       if ($query==true){
         return $query->result_array();
     }else{
        return false;
     }

    }
 
    public function remove($id = null) {
        if($id) {
            $sql = "DELETE FROM t_detail WHERE id_detail = ?";
            $query = $this->db->query($sql, array($id));
            return ($query === true) ? true : false;           
        }
    }


   
   
}