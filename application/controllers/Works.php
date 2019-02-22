<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Works extends CI_Controller {
             
   
        function __construct(){
            parent::__construct();
             $this->load->library('form_validation');
            $this->load->model('Works_m');
                        
        }      
   
    public function index()
    {  
            if(empty($this->session->userdata['email'])){
                redirect(site_url().'auth/login');
            }            
            $data  = array('x' => 'Works Experience' ,
                            'isi'=>'backand/home/works' );
                             
            $this->load->view('backand/setup/konek',$data);
                    
    }
       
       public function create()
    {
 
        $validator = array('success' => false, 'messages' => array());
 
        $config = array(
        array(
        'field' => 'organisasi',
        'label' => 'company',
        'rules' => 'trim|required'
        ),
         array(
        'field' => 'jabatan',
        'label' => 'position',
        'rules' => 'trim|required'
        ),
          array(
        'field' => 'deskripsi',
        'label' => 'jobs descriptions ',
        'rules' => 'trim|required'
        ),
          
            array(
        'field' => 'tahun',
        'label' => 'year',
        'rules' => 'trim|required'
        ),
             array(
        'field' => 'gaji',
        'label' => 'salery',
        'rules' => 'trim|required'
        )
              
       
        );
 
          $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
 
        if($this->form_validation->run() === true) {
 
            $createWorks = $this->Works_m->create();
 
            if($createWorks === true) {
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
 
    public function fetchWorksData()
    {
         if(empty($this->session->userdata['email'])){
                redirect(site_url().'auth/login');
            } 
        $result = array('data' => array());
 
        $data = $this->Works_m->fetchWorksData();
        foreach ($data as $key => $value) {
            
               //$birth = $value['tempat_lahir'] . ' ' . $value['tgl_lahir'];
 
            // button
            $buttons = '
            <div class="btn-group">
             
                <a type="button" class="btn btn-danger btn-sm" onclick="removeWorks('.$value['id_pengalaman'].')" data-toggle="modal" data-target="#removeWorksModal"> <span class="fa fa-trash"></span></a>
           
             
            </div>
            ';
 
            $result['data'][$key] = array(
                 $buttons,
                $value['organisasi'],
                $value['jabatan'],
                $value['deskripsi'],
                $value['tahun'],
                $value['gaji']
               
               
                
            );
        } // /foreach
 
        echo json_encode($result);
    }
 
    public function getSelectedWorksInfo($id)
    {
        if(empty($this->session->userdata['email'])){
                redirect(site_url().'auth/login');
            }
        if($id) {
            $data = $this->Works_m->fetchWorksData($id);
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
 
            $removeWorks = $this->Works_m->remove($id);
            if($removeWorks === true) {
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