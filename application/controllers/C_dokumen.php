<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dokumen extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('form_validation');
        $this->load->model('m_opd');
         //load file helper
        $this->load->helper('file');
        $this->load->library('user_agent');
        
    }
    
	function index(){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opd');
        }else{
            $data['DataDokumen']=$this->m_opd->get_all_data('dokumen')->result();
            $this->m_opd->prepLog("*","Cek all dokumen");
            $this->load->view('admin/dokumen/v_dokumen',$data);
        }
        
    }

    function testt(){
        $msg = 'saya makan (sjkdf 126) ii';

        // $encrypted_string = $this->encryption->encrypt($msg);
        // $plaintext_string = $this->encryption->decrypt($encrypted_string);
        // echo $encrypted_string.'<br>';
        // echo $plaintext_string.'<br>';
        // $key  =  bin2hex($this->encryption->create_key(16));
        // echo $key.'<br>';
        // echo strlen($encrypted_string);
        
        $a=url_title($msg, 'dash', true);
        echo $a;

    }

    

    function cekDokumen(){
        $id=$this->uri->segment(2);
       
        $tmpQuery=$this->m_opd->get_one_specific_data('dokumen','IDDOKUMEN',$id);
        if($tmpQuery->num_rows() > 0){
            $data['tmpDokumen']=$tmpQuery->row_array();
            $data['cekTmpDokumen']='true';
            $this->m_opd->prepLog($id,"Cek dokumen");
            $this->load->view('admin/dokumen/v_cekDokumen',$data);
        }else{
            $data['cekTmpDokumen']='false';
            $this->load->view('admin/dokumen/v_cekDokumen',$data);
            
        }




        // $data['tmpDokumen']=$this->m_opd->get_one_specific_data('dokumen','IDDOKUMEN',$id)->row_array();
        // $this->m_opd->prepLog($id,"Cek dokumen");
        // $this->load->view('admin/dokumen/v_cekDokumen',$data);

    }

    function addDokumen(){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opd');
        }else{
            $this->m_opd->prepLog("*","Form add dokumen");
            $this->load->view('admin/dokumen/v_addDokumen');
        } 
    }

    function doAddDokumen(){
        //konfigurasi form validation
        $this->form_validation->set_rules('dokumen_judul', '', 'callback_judul_check');
        $this->form_validation->set_rules('dokumen_deskripsi', '', 'callback_deskripsi_check');
        $this->form_validation->set_rules('file', '', 'callback_file_check2');
        $this->form_validation->set_rules('fileThumbnail', '', 'callback_file_checkThumb');
        
        
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opd');
        }else{
            if($this->form_validation->run()){
                //konfigurasi upload pdf
                $config['upload_path']          = 'assets/dokumen/';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;
                $config['overwrite']            = FALSE;
                $this->load->library('upload', $config);
                $this->upload->do_upload('file');//untuk melakukan upload file
                $pdf_upload=$this->upload->data();

                //konfigurasi upload  thumbnail
                $config2['upload_path']          = 'assets/dokumen/img/';
                $config2['allowed_types']        = 'gif|jpg|png';
                $config2['max_size']             = 0;
                $config2['max_width']            = 0;
                $config2['max_height']           = 0;
                $config2['overwrite']            = FALSE;
                $this->upload->initialize($config2);
                $this->upload->do_upload('fileThumbnail');//untuk melakukan upload file
                $thumbnail_upload=$this->upload->data();
                $dataDokumen=array(
                    'IDUSER'=> $this->session->userdata('sess_id'),
                    'NAMADOKUMEN '=> $pdf_upload['file_name'],
                    'IMGthumbnail '=> $thumbnail_upload['file_name'],
                    'JUDULDOKUMEN '=> $this->input->post('dokumen_judul'),
                    'KETDOKUMEN '=> $this->input->post('dokumen_deskripsi'),
                    );
                    
                    $id_insert = $this->m_opd->insert_data("dokumen", $dataDokumen);
                    $this->m_opd->prepLog($id_insert,"Add dokumen succes");
                redirect('c_dokumen');
            }else{
                $this->load->view('admin/dokumen/v_addDokumen');
            }
        }
    }

    function updateDokumen(){
        $id=$this->uri->segment(3);
        $data['tmpDokumen']=$this->m_opd->get_one_specific_data('dokumen','IDDOKUMEN',$id)->row_array();
        $this->m_opd->prepLog($id,"Form update dokumen");
        $this->load->view('admin/dokumen/v_updateDokumen',$data);
    }

    function doUpdateDokumen(){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opd');
        }else{
            //konfigurasi upload pdf
            $config['upload_path']          = 'assets/dokumen/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;
            $config['overwrite']            = FALSE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');//untuk melakukan upload file
            $pdf_upload=$this->upload->data();

            //konfigurasi upload  thumbnail
            $config2['upload_path']          = 'assets/dokumen/img/';
            $config2['allowed_types']        = 'gif|jpg|png';
            $config2['max_size']             = 0;
            $config2['max_width']            = 0;
            $config2['max_height']           = 0;
            $config2['overwrite']            = FALSE;
            $this->upload->initialize($config2);
            $this->upload->do_upload('fileThumbnail');//untuk melakukan upload file
            $thumbnail_upload=$this->upload->data();
            
            $id=$this->input->post('dokumen_id');
            $thumbnail=$thumbnail_upload['file_name'];
            $pdf=$pdf_upload['file_name'];
            
            if($thumbnail!='' && $pdf!=''){
                //konfigurasi form validation
                $this->form_validation->set_rules('dokumen_judul', '', 'callback_judul_check');
                $this->form_validation->set_rules('dokumen_deskripsi', '', 'callback_deskripsi_check');
                $this->form_validation->set_rules('file', '', 'callback_file_check2');
                $this->form_validation->set_rules('fileThumbnail', '', 'callback_file_checkThumb');
                if($this->form_validation->run()){
                    $dataDokumen=array(
                    'NAMADOKUMEN '=> $pdf,
                    'IMGthumbnail '=> $thumbnail,
                    'JUDULDOKUMEN '=> $this->input->post('dokumen_judul'),
                    'KETDOKUMEN '=> $this->input->post('dokumen_deskripsi'),
                    );
                    $this->m_opd->update_data('dokumen','IDDOKUMEN',$id,$dataDokumen);
                    $this->m_opd->prepLog($id,"Update dokumen succes");
                    redirect('c_dokumen');
                }else {
                    redirect('c_dokumen/updateDokumen/'.$id);
                }
            }elseif($thumbnail!=''){
                //konfigurasi form validation
                $this->form_validation->set_rules('dokumen_judul', '', 'callback_judul_check');
                $this->form_validation->set_rules('dokumen_deskripsi', '', 'callback_deskripsi_check');
                $this->form_validation->set_rules('fileThumbnail', '', 'callback_file_checkThumb');
                if($this->form_validation->run()){
                    $dataDokumen=array(
                    'IMGthumbnail '=> $thumbnail,
                    'JUDULDOKUMEN '=> $this->input->post('dokumen_judul'),
                    'KETDOKUMEN '=> $this->input->post('dokumen_deskripsi'),
                    );
                    $this->m_opd->update_data('dokumen','IDDOKUMEN',$id,$dataDokumen);
                    $this->m_opd->prepLog($id,"Update dokumen succes");
                    redirect('c_dokumen');
                }else {
                    redirect('c_dokumen/updateDokumen/'.$id);
                }
            }elseif($pdf!=''){
                //konfigurasi form validation
                $this->form_validation->set_rules('dokumen_judul', '', 'callback_judul_check');
                $this->form_validation->set_rules('dokumen_deskripsi', '', 'callback_deskripsi_check');
                $this->form_validation->set_rules('file', '', 'callback_file_check2');
                if($this->form_validation->run()){
                    $dataDokumen=array(
                    'NAMADOKUMEN '=> $pdf,
                    'JUDULDOKUMEN '=> $this->input->post('dokumen_judul'),
                    'KETDOKUMEN '=> $this->input->post('dokumen_deskripsi'),
                    );
                    $this->m_opd->update_data('dokumen','IDDOKUMEN',$id,$dataDokumen);
                    $this->m_opd->prepLog($id,"Update dokumen succes");
                    redirect('c_dokumen');
                }else {
                    redirect('c_dokumen/updateDokumen/'.$id);
                }
            }else{
                //konfigurasi form validation
                $this->form_validation->set_rules('dokumen_judul', '', 'callback_judul_check');
                $this->form_validation->set_rules('dokumen_deskripsi', '', 'callback_deskripsi_check');
                if($this->form_validation->run()){
                    $dataDokumen=array(
                    'JUDULDOKUMEN '=> $this->input->post('dokumen_judul'),
                    'KETDOKUMEN '=> $this->input->post('dokumen_deskripsi'),
                    );
                    $this->m_opd->update_data('dokumen','IDDOKUMEN',$id,$dataDokumen);
                    $this->m_opd->prepLog($id,"Update dokumen succes");
                    redirect('c_dokumen');
                }else {
                    redirect('c_dokumen/updateDokumen/'.$id);
                }
            }
        }    
    }

    function deleteDokumen(){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opd');
        }else{
            $id=$this->uri->segment(3);
            $this->m_opd->delete_data('dokumen','IDDOKUMEN',$id);
            $this->m_opd->prepLog($id,"Delete dokumen succes");
            redirect('c_dokumen');
        }
    }


    /*
     *inpt text validation
     */
    public function judul_check($str){
        if ($str == ''){
                $this->session->set_flashdata('messageDokumenJudul','The title field is required.');
                return FALSE;
        }
        else{
                return TRUE;
        }
    }

    public function deskripsi_check($str){
        if ($str == ''){
            $this->session->set_flashdata('messageDokumenDeskripsi','The description field is required.');
            return FALSE;
        }
        else{
            return TRUE;
        }
    }


    /*
     * file value and type check during validation for update
     */
    public function file_check2($str){
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file']['name']);
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->session->set_flashdata('messageDokumen','Please select only pdf file.');
                // $this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
                return false;
            }
        }else{
            $this->session->set_flashdata('messageDokumen','Please choose a file to upload.');
            // $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
            
        }
    }

    public function file_checkThumb($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['fileThumbnail']['name']);
        if(isset($_FILES['fileThumbnail']['name']) && $_FILES['fileThumbnail']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->session->set_flashdata('messageDokumenThumbnail','Please select only gif/jpg/png file.');
                // $this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
                return false;
            }
        }else{
            $this->session->set_flashdata('messageDokumenThumbnail','Please choose a file to upload thumbnail.');
            // $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
            
        }
    }

    
  
}
