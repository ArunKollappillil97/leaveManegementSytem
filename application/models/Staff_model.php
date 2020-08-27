<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff_model extends CI_Model {

    public function addStaff($staffdata)//insert function for registration of staff
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
                 'user_type'=>'3',
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
        public function updatestaffprofile($staffdata,$picture)//update function for registration of staff
    {
        //print_r($staffdata);
        //print_r($image);die;
      $data=array('name'=>$staffdata['name'],
                 'phone'=>$staffdata['phone'],
                 'email'=>$staffdata['email'],
                 'photo'=>$picture,
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
    
    public function addapplyleave($leavedata)//insert function for registration of staff
    { 
         $data=array('leave_reason'=>$leavedata['reason'],
                 'leave_type'=>$leavedata['leavetype'],
                 'leave_fromdate'=>$leavedata['fromdate'],
                 'leave_todate'=>$leavedata['todate'],
                 // 'user_id'=>$this->session->userdata('user_id'); 
                 'user_id'=>$this->session->userdata('user_id'),
                 'added_on'=>date('Y-m-d'),
                 'added_ip'=>$this->input->ip_address()
                 );
         $data=$this->db->insert('tbl_leave',$data);

         if($data==true)
        {
            $this->session->set_flashdata('success', "Leave applyed Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry,leave applyed Failed");
        }
        redirect($_SERVER['HTTP_REFERER']);
        
        }
   public function fetchstaff()//fetching staff details for admin
    {       
    $this->db->select('staff.Staff_id,staff.name,staff.email,log.password,staff.photo,desig.designation'); 

    $this->db->from('tbl_staff staff');

    $this->db->join('tbl_designation desig','staff.designation_id=desig.designation_id','left');

    $this->db->join('tbl_login log','staff.Staff_id=log.user_id','left');
    
    $this->db->where('staff.active','Y');

    $this->db->where('desig.active','Y');

    $this->db->where('log.active','Y');

    $this->db->where('staff.designation_id',3);

    $query=$this->db->get();
    $res=$query->result_array();
     return $res;
    
  }
   public function fetchprofilestaff()//fetching staff details for staffprofile
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
  public function fetchdetailprofilestaff($staff)//fetching staff details for staffprofile
    {       
    $this->db->select('staff.*,core.course,desig.designation'); 

    $this->db->from('tbl_staff staff');

    $this->db->join('tbl_designation desig','staff.designation_id=desig.designation_id','left');

    $this->db->join('tbl_qualification core','staff.course=core.qualification_id','left');
    
    $this->db->where('staff.active','Y');

    $this->db->where('staff.Staff_id',$staff);

    $query=$this->db->get();
    //print_r($this->db->last_query());
     //exit;
    return $query;
    }


 public function fetchstaffleave()//fetching leave details for one staff
    {       
    $this->db->select('leave.leave_reason,leave.leave_type,leave.leave_fromdate,
        leave.leave_todate,leave.leave_id,staff.name,leave.applystatus'); 

    $this->db->from('tbl_leave leave');

    $this->db->join('tbl_staff staff','leave.user_id=staff.Staff_id','left');
    
    $this->db->where('leave.active','Y');

    $this->db->where('leave.user_id',$this->session->userdata('user_id'));

    $this->db->order_by('leave.leave_id ASC');

    $query=$this->db->get();
    //print_r($this->db->last_query());
     //exit;
     $res=$query->result_array();
     return $res;
    
  }
   public function fetchleavelist()//fetching leave details for HR
    {       
    $this->db->select('leave.leave_reason,leave.leave_type,leave.leave_fromdate,
        leave.leave_todate,leave.leave_id,staff.name'); 

    $this->db->from('tbl_leave leave');

    $this->db->join('tbl_staff staff','leave.user_id=staff.Staff_id','left');
    
    $this->db->where('leave.active','Y');

    $this->db->where('leave.applystatus','Y');

    $this->db->where('leave.rejectstatus','Y');

    $this->db->order_by('leave.leave_id ASC');

    $query=$this->db->get();
    //print_r($this->db->last_query());
     //exit;
     $res=$query->result_array();
     return $res;
    
  }
       public function fetchcoursestream()//fetching course details
    {                                                   
        $value=$this->input->post();
        $keyval=key($value);
      //print_r(key($value));die;   
    $this->db->select('qualification_id,course');   

    $this->db->from('tbl_qualification');

    $this->db->where('active','Y');

    $this->db->where('stream',$keyval);

    $query=$this->db->get();
    $output = '';
       foreach($query->result() as $row)
       {
         $output .= '<option value="'.$row->qualification_id.'">'.$row->course.'</option>';
       }
    return $output;  


}
  function selectleave()//fetch dashboard number leave
    {
        $qry=$this->db->get('tbl_leave');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            //print_r($this->db->last_query());
           // exit;
            return $result;
        }
    }
    
}
