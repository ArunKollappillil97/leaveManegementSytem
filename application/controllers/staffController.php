<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class staffController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Staff_model','qualification_model','HR_model'));
    }  
    public function Staff()//function for view staff adding form view by HR
    { 
      $data['qual']=$this->qualification_model->fetchQualification();
      $this->load->view('hrmanager/header');
      $this->load->view('staff/addstaff',$data);
      $this->load->view('hrmanager/footer');  
    }
 
    public function insertStaff()//function for adding staff
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
            $data=$this->Staff_model->addStaff($staffdata);
       }
    }
    public function insertleave()//function for adding applyedleave
    {
      $leavedata=$this->input->post();
      
     $this->form_validation->set_rules('reason', 'leavereason', 'trim|required');
     $this->form_validation->set_rules('leavetype', 'typeoofleave', 'trim|required');
     $this->form_validation->set_rules('fromdate', 'leavefromdate', 'trim|required');
     $this->form_validation->set_rules('todate', 'leavetodate', 'trim|required');
     // print_r($staffdata);die;
     if($this->form_validation->run()== TRUE)
        {
            //echo "string";
            $data=$this->Staff_model->addapplyleave($leavedata);
       }
    }
    public function ListStaff()//function for Liststaff
    {
      $data['staff']=$this->Staff_model->fetchstaff();//fetching the qualifications from database
      $this->load->view('admin/header');
      $this->load->view('admin/adminliststaff',$data);
      $this->load->view('admin/footer');  
    }
     public function dashboard()//function for dasboard
    {
      //$data['department']=$this->HR_model->select_departments();
      $data['leave']=$this->Staff_model->selectleave();
      $data['staff']=$this->HR_model->selectstaff();
      // $data['seff']=$this->HR_model->selectstaff();
      // $data['staff']=$this->Staff_model->fetchstaff();
      // $datas['hr']=$this->HR_model->fetchHRman();
     // print_r($datas);die;//fetching the staff details from database
      $this->load->view('staff/header');
      $this->load->view('staff/dashboard',$data);
      $this->load->view('staff/footer');  
    }
    public function leave()//function for applyleave form
    {
      //$data['staff']=$this->Staff_model->fetchstaff();
      $this->load->view('staff/header');
      $this->load->view('staff/applyleave');
      $this->load->view('staff/footer');  
    }
     public function Viewstaffleave()//function for applyleave form
    {
      $data['staffleave']=$this->Staff_model->fetchstaffleave();
      $this->load->view('staff/header');
      $this->load->view('staff/viewstaffleave',$data);
      $this->load->view('staff/footer');  
    } 
      public function staffprofile()//function for staffprofile form
    {
      $data['staff']=$this->Staff_model->fetchprofilestaff();
      $this->load->view('staff/header');
      $this->load->view('staff/staffprofile',$data);
      $this->load->view('staff/footer');  
    }
     public function profileview($staff)//function for detailprofile 
    {
      $data['staff']=$this->Staff_model->fetchdetailprofilestaff($staff);
      $this->load->view('staff/header');
      $this->load->view('staff/detailedprofile',$data);
      $this->load->view('staff/footer');  
    }
    public function profileviewadmin($staff)//function for detailprofile foradmin
    {
      $data['staff']=$this->Staff_model->fetchdetailprofilestaff($staff);
      $this->load->view('admin/header');
      $this->load->view('staff/detailedprofile',$data);
      $this->load->view('admin/footer');  
    }
    public function HRprofileview($staff)//function for detailprofile 
    {
      $data['staff']=$this->Staff_model->fetchdetailprofilestaff($staff);
      $this->load->view('hrmanager/header');
      $this->load->view('staff/detailedprofile',$data);
      $this->load->view('hrmanager/footer');  
    }
    
    
    public function fetch_course()//fetching course in accordence with stream
  {
     $value=$this->input->post();
    //print_r($value);die; 
   $result=$this->Staff_model->fetchcoursestream($value);
   //print_r($result);die;
   echo json_encode($result);
  }
  public function updatestaffprofile()//function for  staffprofile update
    {
      $staffdata=$this->input->post();
      //print_r($staffdata);die;
     $this->form_validation->set_rules('name', 'name', 'trim|required');
     $this->form_validation->set_rules('phone', 'phone', 'trim|required');
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
        {      //print_r($staffdata);die;

            //echo "string";
            $staffphoto=$this->input->post('filephoto');
            $this->load->library('image_lib');
            $config['upload_path']= 'uploads/profile-pic/';
            $config['allowed_types'] ='gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('filephoto'))
            {
                $image='staffavatar.jpg';
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
            $data=$this->Staff_model->updatestaffprofile($staffdata,$image);
       }
    }

}
