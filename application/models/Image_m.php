<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Image_m extends CI_Model
{
  

    function save_upload($image){
        $data = array(
               'id_user'        => $this->session->userdata('id_user'),
                'file_name' => $image
            );  
        $result= $this->db->insert('t_image',$data);
        return $result;
    }

     public function fetchUploadData()
    {
        $query = $this->db->get('t_image');
                return $query->result();
    }


}
