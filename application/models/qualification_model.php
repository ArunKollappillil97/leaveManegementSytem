<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class qualification_model extends CI_Model {

	public function addQualification($qualification)//insert function qualification
	{
		         $data['course']=$qualification['course'];
                 $data['stream']=$qualification['stream'];
                 $data['added_on']=date('Y-m-d');
      	         $data['modified_on']=date('Y-m-d');
      	         $data['added_ip']=$this->input->ip_address();
      	         $data['modified_ip']=$this->input->ip_address();


        $data=$this->db->insert('tbl_qualification',$data);
		 if($data==true)
        {
            $this->session->set_flashdata('success', "Qualification added Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry,Qualification adding Failed");
        }
        redirect($_SERVER['HTTP_REFERER']);
		
	}
	 public function fetchQualification()//fetching all qualifications
    {		
    $this->db->select('stream,course'); 

    $this->db->from('tbl_qualification');

    $this->db->where('active','Y');

    $query=$this->db->get();
    return $query;
    
  }


}
