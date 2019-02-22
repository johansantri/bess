<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Education extends CI_Controller {
             
   
        function __construct(){
            parent::__construct();
             $this->load->library('form_validation');
            $this->load->model('Education_m');
                        
        }      
   
    public function index()
    {  
            if(empty($this->session->userdata['email'])){
                redirect(site_url().'auth/login');
            }            
            $data  = array('x' => 'Education' ,
                            'isi'=>'backand/home/education' );
                             
            $this->load->view('backand/setup/konek',$data);
                    
    }
       
       public function create()
    {
 
        $validator = array('success' => false, 'messages' => array());
 
        $config = array(
        array(
        'field' => 'institusi',
        'label' => 'institutions',
        'rules' => 'trim|required'
        ),
         array(
        'field' => 'jurusan',
        'label' => 'department',
        'rules' => 'trim|required'
        ), array(
        'field' => 'level_pendidikan',
        'label' => 'level',
        'rules' => 'trim|required'
        ),
          array(
        'field' => 'tahun_lulus',
        'label' => 'year',
        'rules' => 'trim|required'
        ),
           array(
        'field' => 'nilai',
        'label' => 'ipk',
        'rules' => 'trim|required'
        )
           
       
        );
 
          $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
 
        if($this->form_validation->run() === true) {
 
            $createEducation = $this->Education_m->create();
 
            if($createEducation === true) {
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
 
        echo json_encode($validator);
    }
 
    public function fetchEducationData()
    {
         if(empty($this->session->userdata['email'])){
                redirect(site_url().'auth/login');
            } 
        $result = array('data' => array());
 
        $data = $this->Education_m->fetchEducationData();
        foreach ($data as $key => $value) {
            
             //  $birth = $value['tempat_lahir'] . ' ' . $value['tgl_lahir'];
 
            // button
            $buttons = '
            <div class="btn-group">
             
                <a type="button" class="btn btn-danger btn-sm" onclick="removeEducation('.$value['id_pendidikan'].')" data-toggle="modal" data-target="#removeEducationModal"> <span class="fa fa-trash"></span></a>
           
             
            </div>
            ';
 
            $result['data'][$key] = array(
                 $buttons,
                $value['institusi'],
                $value['jurusan'],
                $value['tahun_lulus']          
             
            );
        } // /foreach
 
        echo json_encode($result);
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