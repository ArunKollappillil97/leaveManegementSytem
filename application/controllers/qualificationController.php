<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class qualificationController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('qualification_model'));
    }  
    public function Qualification()//function for view qualification
    {
      $this->load->view('hrmanager/header');
      $this->load->view('hrmanager/addqualification');
      $this->load->view('hrmanager/footer');  
    }

    public function AddQualification()//function for adding qualification
    {
      $qualification=$this->input->post();
     // print_r($qualification);
     $this->form_validation->set_rules('stream', 'stream', 'trim|required');
     $this->form_validation->set_rules('course', 'course', 'trim|required');
     if($this->form_validation->run()== TRUE)
        {
            $data=$this->qualification_model->addQualification($qualification);
       }
    }
    public function ListQualification()//function for Listqualification
    {
      $data['qual']=$this->qualification_model->fetchQualification();//fetching the qualifications from database
      $this->load->view('hrmanager/header');
      $this->load->view('hrmanager/listqualification',$data);
      $this->load->view('hrmanager/footer');  
    }
    public function adminListQualification()//function for Listqualification
    {
      $data['qual']=$this->qualification_model->fetchQualification();//fetching the qualifications from database
      $this->load->view('admin/header');
      $this->load->view('hrmanager/listqualification',$data);
      $this->load->view('admin/footer');  
    }

}
