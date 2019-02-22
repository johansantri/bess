<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Upload extends CI_Controller {
             
   
        function __construct(){
            parent::__construct();
             $this->load->library('form_validation');
           $this->load->model('image_m');
             
           
        }      
   
    public function index()
    {  
            if(empty($this->session->userdata['email'])){
                redirect(site_url().'auth/login');
            }  

            $id = $this->session->userdata['id_user']; // dapatkan id user yg login 
            $this->db->select('*'); 
            $this->db->where('id_user', $id);// 
            $this->db->where('maksimal <>','1');// 
            $this->db->from('t_image'); 
            $query = $this->db->get();
            $jml = $query->num_rows();
           
            $data  = array('x' => 'Upload Photo Profile' ,
                            'tes'=>$jml,                         
                            'isi'=>'backand/home/upload' );
                             
            $this->load->view('backand/setup/konek',$data);
                    
    }
       
      function do_upload(){
        $config['upload_path']="./images";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload',$config);
      if($this->upload->do_upload("file")){
          $data = $this->upload->data();

          //Resize and Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./images/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '60%';
            $config['width']= 600;
            $config['height']= 400;
            $config['new_image']= './images/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

         
          $image= $data['file_name']; 
          
          $result= $this->image_m->save_upload($image);
          echo json_decode($result);
        }

     }



    
 
 
    public function del()
    {
            if(!empty($_POST["path"]))  
         {  
              if(unlink($_POST["path"]))  
              {  
                   echo 'Image Deleted';  
              }  
         }  
     }
 
    public function getSelectedEducationInfo($id)
    {
        if(empty($this->session->userdata['email'])){
                redirect(site_url().'auth/login');
            }
        if($id) {
            $data = $this->Education_m->fetchEducationData($id);
            echo json_encode($data);
        }
    }
 
   
 
    public function remove($id = null)
    {
        if(empty($this->session->userdata['email'])){
                redirect(site_url().'auth/login');
            }
        if($id) {
            $validator = array('success' => false, 'messages' => array());
 
            $removeEducation = $this->Education_m->remove($id);
            if($removeEducation === true) {
                $validator['success'] = true;
                $validator['messages'] = "Successfully removed";
            }
            else {
                $validator['success'] = true;
                $validator['messages'] = "Successfully removed";
            }
 
            echo json_encode($validator);
        }
    }
     
       
}