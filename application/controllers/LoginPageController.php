<?php
class LoginPageController extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('LoginController');
    }
     $this->load->model('HR_model');
     $this->load->model('Staff_model');
  }
 
  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('usertype')==='1'){
      $data['qual']=$this->HR_model->selectqualification();
      $data['seff']=$this->HR_model->selectstaff();
      $data['hr']=$this->HR_model->fetchHRman();
      $data['leave']=$this->Staff_model->selectleave();
                $this->load->view('admin/header');
                $this->load->view('admin/dashboard',$data);
                $this->load->view('admin/footer');
      }else{
          echo "Access Denied";
      }
 
  }
 
  function staff(){
    //Allowing akses to staff only
    if($this->session->userdata('usertype')==='3'){
                $staff=$this->session->userdata('user_id');
                $data['leave']=$this->Staff_model->selectleave();
                $data['staff']=$this->HR_model->selectstaff();
                $this->load->view('staff/header');
                $this->load->view('staff/dashboard',$data);
                $this->load->view('staff/footer');
    }else{
        echo "Access Denied";
    }
  }
 
  function HR(){
    //Allowing akses to author only
    if($this->session->userdata('usertype')==='2'){
      //echo "heloo";
            $data['qual']=$this->HR_model->selectqualification();  
            $data['hr']=$this->HR_model->fetchHRman();
                $this->load->view('hrmanager/header');
                $this->load->view('hrmanager/dashboard',$data);
                $this->load->view('hrmanager/footer');
    }else{
        echo "Access Denied";
    }
  }
 
}