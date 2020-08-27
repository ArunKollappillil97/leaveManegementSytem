<?php
class LoginController extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('Login_model');
  }
 
  function index(){
    $this->load->view('login');
  }
 
  function auth(){
    $email    = $this->input->post('username');
    $password = $this->input->post('password');
    $validate = $this->Login_model->validate($email,$password);
    if($validate->num_rows() > 0){
      //print_r($validate)
        $data  = $validate->row_array();
        $username  = $data['user_name'];
        $usertype = $data['user_type'];
        $password = $data['password'];
        $user_id = $data['user_id'];

        $sesdata = array(
            'username'  => $username,
            'usertype'     => $usertype,
            'password'     => $password,
            'user_id'     => $user_id,
            'logged_in' => TRUE
        );
        print_r($sesdata);
        $this->session->set_userdata($sesdata);
         $th=$this->session->userdata('usertype');
         //print_r($th);die;
        // access login for admin
        if($usertype =='1'){
            redirect('LoginPageController');
 
        // access login for staff
        }elseif($usertype =='2'){
            redirect('LoginPageController/HR');
        // access login for author
        }else{
          redirect('LoginPageController/staff');
 
        }
    }else{
        echo $this->session->set_flashdata('login_error','Username or Password is Wrong');
        redirect('LoginController');
    }
  }
 
  function logout(){
      $this->session->sess_destroy();
      redirect('LoginController');
  }
 
}