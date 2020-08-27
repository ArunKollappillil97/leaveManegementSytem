<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HRcontroller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Staff_model','qualification_model','HR_model'));
        $this->load->library('image_lib');
        $this->load->helper('file');   
         }  
    public function HRmanager()//function for view staff adding form
    { 
      $data['qual']=$this->qualification_model->fetchQualification();
      $datas['hr']=$this->HR_model->fetchHRman();
      //print_r($datas);die;
      $this->load->view('admin/header',$datas);
      $this->load->view('admin/addHR',$data);
      $this->load->view('admin/footer');  
    }
 
    public function AddHRmanager()//function for adding qualification
    {
      $staffdata=$this->input->post();
      
     $this->form_validation->set_rules('name', 'name', 'trim|required');
     $this->form_validation->set_rules('phone', 'phone', 'trim|required|numeric|min_length[10]|max_length[10]');
     $this->form_validation->set_rules('email', 'email', 'trim|required');
     $this->form_validation->set_rules('password', 'password', 'trim|required');
     $this->form_validation->set_rules('designation', 'designation', 'trim|required');
     // print_r($staffdata);die;
     if($this->form_validation->run()== TRUE)
        {
            //echo "string";
            $data=$this->HR_model->AddHRmanager($staffdata);
       }
    }
    public function ListStaffbyHR()//function for List staff by hr
    {
      $data['staff']=$this->Staff_model->fetchstaff();
      $datas['hr']=$this->HR_model->fetchHRman();
      //print_r($datas);die;//fetching the staff details from database
      $this->load->view('hrmanager/header');
      $this->load->view('hrmanager/liststaffbyHR',$data);
      $this->load->view('hrmanager/footer');  
    }
    public function dashboard()//function dashboard hrmanager
    {
      //$data['department']=$this->HR_model->select_departments();
      $data['qual']=$this->HR_model->selectqualification();
      $data['hr']=$this->HR_model->fetchHRman();
      $data['seff']=$this->HR_model->selectstaff();
     // print_r($datas);die;//fetching the staff details from database
      $this->load->view('hrmanager/header');
      $this->load->view('hrmanager/dashboard',$data);
      $this->load->view('hrmanager/footer');  
    }
     public function admindashboard()//function dashboard admin
    {
      
      $data['qual']=$this->HR_model->selectqualification();
      $data['seff']=$this->HR_model->selectstaff();
      $data['hr']=$this->HR_model->fetchHRman();
      $data['leave']=$this->Staff_model->selectleave();
     // print_r($datas);die;//fetching the staff details from database
      $this->load->view('admin/header');
      $this->load->view('admin/dashboard',$data);
      $this->load->view('admin/footer');  
    }
    
    public function ViewHRmanager()//function for List of HR
    {
      $data['staff']=$this->HR_model->fetchHR();
      //fetching the staff details from database
      $this->load->view('admin/header');
      $this->load->view('admin/HRlist',$data);
      $this->load->view('admin/footer');  
    }
    public function LeavelistbyHR()//function for List leave by hr
    {
      $data['leave']=$this->Staff_model->fetchleavelist();//fetching the leave details from database
      $this->load->view('admin/header');
      $this->load->view('hrmanager/leavelistbyHR',$data);
      $this->load->view('admin/footer');  
    }
      public function leaveaccept($leaveid)//function for accept leave by hr
    {
      $data=$this->HR_model->acceptleavelist($leaveid);
       
    }
    public function leavereject($leaveid)//function for accept leave by hr
    {
      $data=$this->HR_model->rejectleavelist($leaveid);
       
    }
    public function HRprofile()//function for staffprofile form
    {
      $datas['hr']=$this->HR_model->fetchHRman();
      //print_r($datas);die;
      $data['HR']=$this->HR_model->fetchprofileHR();
      $this->load->view('hrmanager/header');
      $this->load->view('hrmanager/HRprofile',$data);
      $this->load->view('hrmanager/footer');  
    }
     
     public function updateHR()//function for  staffprofile update
     {
      $staffdata=$this->input->post();
      //print_r($staffdata);die;
     $this->form_validation->set_rules('name', 'name', 'trim|required');
     $this->form_validation->set_rules('phone', 'phone', 'trim|required|numeric|min_length[10]|max_length[10]');
     $this->form_validation->set_rules('email', 'email', 'trim|required');
     $this->form_validation->set_rules('password', 'password', 'trim|required');
     $this->form_validation->set_rules('designation', 'designation', 'trim|required');
     $this->form_validation->set_rules('doj', 'doj', 'trim|required');
     $this->form_validation->set_rules('dob', 'dob', 'trim|required');
     $this->form_validation->set_rules('university', 'university', 'trim|required');
     $this->form_validation->set_rules('stream', 'stream', 'trim|required');
     $this->form_validation->set_rules('courseing', 'courseing', 'trim|required');
     $this->form_validation->set_rules('institution', 'institution', 'trim|required');
     $this->form_validation->set_rules('yearpassout', 'yearpassout', 'trim|required');
     $this->form_validation->set_rules('filephoto', 'filephoto', 'trim|required');
     if($this->form_validation->run()== TRUE)
        {
            //echo "string";
            $this->load->library('image_lib');
            $config['upload_path']= 'uploads/profile-pic/';
            $config['allowed_types'] ='gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('filephoto'))
            {
                $image='hravatar.png';
            }
            else
            {
                $image_data =   $this->upload->data();

                $configer =  array(
                  'image_library'   => 'gd2',
                  'source_image'    =>  $image_data['full_path'],
                  'maintain_ratio'  =>  TRUE,
                  'width'           =>  150,
                  'height'          =>  150,
                  'quality'         =>  50
                );
                $this->image_lib->clear();
                $this->image_lib->initialize($configer);
                $this->image_lib->resize();
                
                $image=$image_data['file_name'];
            }
            $data=$this->HR_model->updateHRprofile($staffdata,$image);
       }
    }
    
}
