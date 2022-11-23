<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('form_validation');
        $this->load->model('m_opd');
         //load file helper
         $this->load->helper('file');
         $this->load->library('user_agent');
         if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02' || $this->session->userdata('sess_role') != 'bkl03') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opd');
            // echo'aaal'; 
        }
        
    }
    
	function index(){
        if($this->session->userdata('sess_role') == 'bkl01') {
            $data['DataUser']=$this->m_opd->get_all_data('user')->result();
            $this->m_opd->prepLog("*","Cek all user");
            $this->load->view('admin/settingUser/v_cekUser',$data);
            // echo'super';
        }else{
            redirect('c_opd');
        }
        
    }

    function specificUser(){
        if($this->session->userdata('sess_role') == 'bkl01'){
            $id=$this->uri->segment(3);
            $data['tmpUser']=$this->m_opd->get_one_specific_data('user','IDUSER',$id)->row_array();
            $this->m_opd->prepLog($id,"Cek one user");
            $this->load->view('admin/settingUser/v_cekOneUser',$data);
            
        }else{
            redirect('c_opd');
        }   
    }

    function doUpdateUserRole(){
        if($this->session->userdata('sess_role') == 'bkl01'){
            $id=$this->input->post('user_id');
            $role=$this->input->post('user_role');
            $dataUSER=array(
                'ROLE'=> $role,
                );
            $this->m_opd->update_data('user','IDUSER',$id,$dataUSER);
            $this->m_opd->prepLog($id,"Update role user");
            redirect('c_user');
        }else{
            redirect('c_opd');
        } 
        

    }
    function deleteUser (){
        if($this->session->userdata('sess_role') == 'bkl01'){
            $id=$this->uri->segment(3);
            $this->m_opd->delete_data('user','IDUSER',$id);
            $this->m_opd->prepLog($id,"Delete user");
            redirect('c_user');
        }else{
            redirect('c_opd');
        }
        
    }

    function profilUser(){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02' || $this->session->userdata('sess_role') != 'bkl03') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opd');
            // echo'aaal'; 
        }else{
            $id=$this->uri->segment(3);
            $data['tmpUser']=$this->m_opd->get_one_specific_data('user','IDUSER',$id)->row_array();
            $this->m_opd->prepLog($id,"Cek profil user");
            $this->load->view('user/v_cekProfilUser',$data);
        }
        
    }

}
