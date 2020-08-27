<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HR_model extends CI_Model {

    public function AddHRmanager($staffdata)//insert function for registration of HR Manager
    {
     //print_r($staffdata);die;
  $data=array('name'=>$staffdata['name'],
                 'phone'=>$staffdata['phone'],
                 'email'=>$staffdata['email'],
                 'designation_id'=>$staffdata['designation'],
                 'added_on'=>date('Y-m-d'),
                 'modified_on'=>date('Y-m-d'),
                 'added_ip'=>$this->input->ip_address(),
                 'modified_ip'=>$this->input->ip_address()
                 );
        $data=$this->db->insert('tbl_staff',$data);
        $lastid=$this->db->insert_id();
        
      $logdata=array(
                 'user_name'=>$staffdata['email'],
                 'password'=>$staffdata['password'],
                 'user_type'=>'2',
                 'user_id'=>$lastid,
                 'added_on'=>date('Y-m-d'),
                 'modified_on'=>date('Y-m-d'),
                 'added_ip'=>$this->input->ip_address(),
                 'modified_ip'=>$this->input->ip_address()
                 );
      $data=$this->db->insert('tbl_login',$logdata);

         if($data&&$logdata==true)
        {
            $this->session->set_flashdata('success', "Registration Succesfull"); 
        }else{
            $this->session->set_flashdata('error', "Sorry,Registration Failed");
        }
        redirect($_SERVER['HTTP_REFERER']);
        
    }

   public function fetchHR()//fetching HR Manager details for admin
    {       
    $this->db->select('staff.Staff_id,staff.name,staff.email,staff.photo,desig.designation'); 

    $this->db->from('tbl_staff staff');

    $this->db->join('tbl_designation desig','staff.designation_id=desig.designation_id','left');

    $this->db->where('staff.active','Y');

    $this->db->where('desig.active','Y');

    $this->db->where('staff.designation_id',2);

     $query=$this->db->get();
    $res=$query->result_array();
     return $res;
    
    
  }
  public function acceptleavelist($leaveid)//leave accept function 
    {
     //print_r($staffdata);die;
     $data=array('applystatus'=>N,  
                 'modified_on'=>date('Y-m-d'),
                 'modified_ip'=>$this->input->ip_address()
                 );
         $this->db->where('leave_id',$leaveid);
        $acceptdata=$this->db->update('tbl_leave',$data);
        if($acceptdata==true)
        {
            $this->session->set_flashdata('success', "Leave Accepted"); 
        }
        redirect($_SERVER['HTTP_REFERER']);

  }
   public function rejectleavelist($leaveid)//leave reject function 
    {
     //print_r($staffdata);die;
     $data=array('rejectstatus'=>N,
                 'applystatus'=>M,
                 'modified_on'=>date('Y-m-d'),
                 'modified_ip'=>$this->input->ip_address()
                 );
         $this->db->where('leave_id',$leaveid);
        $acceptdata=$this->db->update('tbl_leave',$data);
        if($acceptdata==true)
        {
            $this->session->set_flashdata('success', "Leave Rejected"); 
        }
        redirect($_SERVER['HTTP_REFERER']);

  }
  public function fetchprofileHR()//fetching HR Manager details for staffprofile
    {       
    $this->db->select('staff.name,staff.email,log.password,staff.photo,desig.designation'); 

    $this->db->from('tbl_staff staff');

    $this->db->join('tbl_designation desig','staff.designation_id=desig.designation_id','left');

    $this->db->join('tbl_login log','staff.Staff_id=log.user_id','left');
    
    $this->db->where('staff.active','Y');

    $this->db->where('desig.active','Y');

    $this->db->where('log.active','Y');

    $this->db->where('staff.Staff_id',$this->session->userdata('user_id'));

    $query=$this->db->get();
    return $query;
    
    }


      public function updateHRprofile($staffdata,$image)//update function for registration of HR
    {
        //print_r($staffdata);
        //print_r($image);die;
      $data=array('name'=>$staffdata['name'],
                 'phone'=>$staffdata['phone'],
                 'email'=>$staffdata['email'],
                 'photo'=>$image,
                 'doj'=>$staffdata['doj'],
                 'dob'=>$staffdata['dob'],
                 'address'=>$staffdata['address'],
                 'university'=>$staffdata['university'],
                 'stream'=>$staffdata['stream'],
                 'course'=>$staffdata['courseing'],
                 'institution'=>$staffdata['institution'],
                 'yop'=>$staffdata['yearpassout'],
                 'university'=>$staffdata['university'],
                 'modified_on'=>date('Y-m-d'),
                 'modified_ip'=>$this->input->ip_address()
                 );
         $this->db->where('Staff_id',$this->session->userdata('user_id'));
        $dataup=$this->db->update('tbl_staff',$data);
        $lastid=$this->db->insert_id();

        $datalog=array('password'=>$staffdata['password']);
        $this->db->where('user_id',$lastid);
        $datauplog=$this->db->update('tbl_login',$datalog);

         if($dataup&&$datauplog==true)
        {
            $this->session->set_flashdata('success', "Profile Upadtion Completed"); 
        }else{
            $this->session->set_flashdata('error', "Sorry,Updation Failed");
        }
        redirect($_SERVER['HTTP_REFERER']);

        
      }
      function selectstaff()//fetch dashboard number staff
    {
        $qry=$this->db->get('tbl_staff');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            //print_r($this->db->last_query());
           //exit;
            return $result;
        }
    }
     function selectqualification()//fetch dashboard number qualification
    {
        $qry=$this->db->get('tbl_qualification');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            //print_r($this->db->last_query());
     //exit;
            return $result;
        }
    }
     function fetchHRman()
    {
        
        $qry=$this->db->get('tbl_staff');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            //print_r($this->db->last_query());
     //exit;
            return $result;
        }
    }
    
  
}
