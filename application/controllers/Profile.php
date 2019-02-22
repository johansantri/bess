<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Profile extends CI_Controller {
             
   
        function __construct(){
            parent::__construct();
             $this->load->library('form_validation');
            $this->load->model('profile_m');
            
           
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
            $this->db->from('t_detail'); 
            $query = $this->db->get();
            $jml = $query->num_rows();
      
         $data  = array('x' => 'Profile' ,
                            'tes'=>$jml,
                            'isi'=>'backand/home/profile');
                             
            $this->load->view('backand/setup/konek',$data);
            
    }
       
       public function create()
    {
 
        $validator = array('success' => false, 'messages' => array());
 
        $config = array(
        array(
        'field' => 'alamat',
        'label' => 'address',
        'rules' => 'trim|required'
        ),
         array(
        'field' => 'jk',
        'label' => 'gender',
        'rules' => 'trim|required'
        ),
          array(
        'field' => 'tlpn',
        'label' => 'phone',
        'rules' => 'trim|required'
        ),
           array(
        'field' => 'status',
        'label' => 'marital merried',
        'rules' => 'trim|required'
        ),
            array(
        'field' => 'tempat_lahir',
        'label' => 'place of birth',
        'rules' => 'trim|required'
        ),
            array(
        'field' => 'tgl_lahir',
        'label' => 'date of birth',
        'rules' => 'required'
        ),
             array(
        'field' => 'nik_paspor',
        'label' => 'paspor',
        'rules' => 'trim|required'
        ),
            array(
        'field' => 'negara',
        'label' => 'country',
        'rules' => 'trim|required'
        )
           
             
             
       
        );
 
          $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
 
        if($this->form_validation->run() === true) {
 
            $createProfile = $this->profile_m->create();
 
            if($createProfile === true) {
                $validator['success'] = true;
                $validator['messages'] = "Successfully added";
            } else {
                $validator['success'] = false;
                $validator['messages'] = "Error while updating the infromation";
            }          
        }
        else {
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);   
            }          
        }
        $data['token']=$this->security->get_csrf_hash();
        echo json_encode($validator);
    }
 
    public function fetchProfileData()
    {
         if(empty($this->session->userdata['email'])){
                redirect(site_url().'auth/login');
            } 
        $result = array('data' => array());
 
        $data = $this->profile_m->fetchProfileData();
        foreach ($data as $key => $value) {
            
               $birth = $value['tempat_lahir'] . ' ' . $value['tgl_lahir'];
 
            // button
            $buttons = '
            <div class="btn-group">
             
                <a type="button" class="btn btn-danger btn-sm" onclick="removeProfile('.$value['id_detail'].')" data-toggle="modal" data-target="#removeProfileModal"> <span class="fa fa-trash"></span></a>
           
             
            </div>

            
            ';
 
            $result['data'][$key] = array(
                 $buttons,
                $value['alamat'],
                $value['tlpn'],
                $value['jk'],
                $value['status'],
               $birth,
                 $value['nik_paspor'],
                $value['negara']
               
                
            );
        } // /foreach
 
        echo json_encode($result);
    }
 

   


    public function getSelectedProfileInfo($id)
    {
        if(empty($this->session->userdata['email'])){
                redirect(site_url().'auth/login');
            }
        if($id) {
            $data = $this->profile_m->fetchProfileData($id);
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
 
            $removeProfile = $this->profile_m->remove($id);
            if($removeProfile === true) {
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