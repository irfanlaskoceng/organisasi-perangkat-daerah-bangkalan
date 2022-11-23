<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_opdGaleri extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('form_validation');
        $this->load->model('m_opd');
         //load file helper
         $this->load->helper('file');
         $this->load->library('user_agent');
         
    }
// ------------------ galeri user ------------------\\
	function index(){
        $data['DataGaleri']=$this->m_opd->get_one_specific_data_desc('galery','IDKATEGORIGALERY','3')->result();
        $this->m_opd->prepLog("*","Cek all galeri for user");
        $this->load->view('user/v_galeri',$data);
    }
// ------------------ action select, insert, update for admin in funtin "do.." ------------------\\

    function selectGaleri($UrlView,$data){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opdGaleri'); 
        }else{
            $this->load->view($UrlView,$data);
        }
    }

    function preInsertGaleri($UrlView,$dtView,$UrlRedirect,$path,$idKategori){
        //konfigurasi form validation
        $this->form_validation->set_rules('file', '', 'callback_file_check');
        //konfigurasi upload 
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['overwrite']            = FALSE;
        $this->load->library('upload', $config);
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opdGaleri'); 
        }else{
            if($this->form_validation->run()){
                $this->upload->do_upload('file');//untuk melakukan upload file
                $dataGaleri=array(
                    'IDKATEGORIGALERY'=> $idKategori,
                    'IDUSER'=> $this->session->userdata('sess_id'),
                    'NAMAGALERY'=> $this->upload->data('file_name'),
                    'JUDULGALERY '=> $this->input->post('galeri_judul'),
                    'KETGALERY'=> $this->input->post('galeri_deskripsi'),
                    );
                
                $id_insert = $this->m_opd->insert_data("galery", $dataGaleri);
                if ($path == 'assets/images/galeri/') {
                    $this->m_opd->prepLog($id_insert,"Add galeri succes");
                }elseif ($path == 'assets/images/galeri/CarouselImage/') {
                    $this->m_opd->prepLog($id_insert,"Add carousel image succes");
                }elseif ($path == 'assets/images/galeri/CarouselLink/') {
                    $this->m_opd->prepLog($id_insert,"Add carousel link succes");
                }
                redirect($UrlRedirect);
            }else{
                $this->load->view($UrlView,$dtView);
            }
        }
    }

    function preUpdateGaleri($UrlRedirectSuccess,$UrlRedirectError,$path){
        //konfigurasi form validation
        $this->form_validation->set_rules('file', '', 'callback_file_check2');
        //konfigurasi upload 
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['overwrite']            = FALSE;
        $this->load->library('upload', $config);
        
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opdGaleri'); 
        }else{
            $this->upload->do_upload('file');//untuk melakukan upload file
            $id=$this->input->post('galeri_id');
            $judul=$this->input->post('galeri_judul');
            $deskripsi=$this->input->post('galeri_deskripsi');
            $namaFile=$this->upload->data('file_name');
            if($namaFile!=''){
                if($this->form_validation->run()){
                    $dataGaleri=array(
                        'NAMAGALERY'=> $namaFile,
                        'JUDULGALERY '=> $judul,
                        'KETGALERY'=> $deskripsi,
                        );
                    $this->m_opd->update_data('galery','IDGALERY',$id,$dataGaleri);
                    if ($path == 'assets/images/galeri/') {
                        $this->m_opd->prepLog($id,"Update galeri succes");
                    }elseif ($path == 'assets/images/galeri/CarouselImage/') {
                        $this->m_opd->prepLog($id,"Update carousel image succes");
                    }elseif ($path == 'assets/images/galeri/CarouselLink/') {
                        $this->m_opd->prepLog($id,"Update carousel link succes");
                    }
                    redirect($UrlRedirectSuccess);
                }else{
                    redirect($UrlRedirectError.$id); 
                }

            }else{
                //update selain gambar
                $dataGaleri=array(
                    'JUDULGALERY '=> $judul,
                    'KETGALERY'=> $deskripsi,
                    );
                $this->m_opd->update_data('galery','IDGALERY',$id,$dataGaleri);
                if ($path == 'assets/images/galeri/') {
                    $this->m_opd->prepLog($id,"Update galeri succes");
                }elseif ($path == 'assets/images/galeri/CarouselImage/') {
                    $this->m_opd->prepLog($id,"Update carousel image succes");
                }elseif ($path == 'assets/images/galeri/CarouselLink/') {
                    $this->m_opd->prepLog($id,"Update carousel link succes");
                }
                redirect($UrlRedirectSuccess);
            }
        }
    }

// ------------------ galeri admin ------------------\\
    function galeriAdmin(){
        $UrlView='admin/galeri/v_galeriADMIN';
        $data['DataGaleri']=$this->m_opd->get_one_specific_data_desc('galery','IDKATEGORIGALERY','3')->result();
        $this->m_opd->prepLog("*","Cek all galeri for admin");
        $this->selectGaleri($UrlView,$data);
    }

    function addGaleri(){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opdGaleri'); 
        }else{
            $dt=array('formAction' => '/doAddGaleri',
                      'breadCRM' => 'Galeri',
                      'formTitle' => 'Add Image Galeri', 
            );
            $this->m_opd->prepLog("*","Form add galeri");
            $this->load->view('admin/galeri/v_addGaleri',$dt);
        }
        
    }


    function doAddGaleri(){
        $dtView=array('formAction' => '/doAddGaleri',
                     'breadCRM' => 'Galeri',
                     'formTitle' => ' Add Image Galeri');
        $UrlView='admin/galeri/v_addGaleri';
        $UrlRedirect='c_opdGaleri/galeriAdmin';
        $path='assets/images/galeri/';
        $idKategori='3';
        $this->preInsertGaleri($UrlView,$dtView,$UrlRedirect,$path,$idKategori);
 
        
    }

    function updateGaleri(){
        $id=$this->uri->segment(3);
        $data['tmpGaleri']=$this->m_opd->get_one_specific_data('galery','IDGALERY',$id)->row_array();
        $data['formAction']='/doUpdateGaleri';
        $data['breadCRM']='Galeri';
        $data['formTitle']='Update Image Gallery';
        $data['pathIMG']='assets/images/galeri/';
        $this->m_opd->prepLog($id,"Form update galeri");
        $this->load->view('admin/galeri/v_updateGaleri',$data);
    }

    function doUpdateGaleri(){
        $UrlRedirectSuccess='c_opdGaleri/galeriAdmin';
        $UrlRedirectError='c_opdGaleri/updateGaleri/';
        $path='assets/images/galeri/';
        $this->preUpdateGaleri($UrlRedirectSuccess,$UrlRedirectError,$path);
    }

    function deleteGaleri(){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opdGaleri'); 
        }else{
            $id=$this->uri->segment(3);
            $this->m_opd->delete_data('galery','IDGALERY',$id);
            $this->m_opd->prepLog($id,"Delete galeri succes");
            $this->galeriAdmin();
        }
        
    }


// ------------------ Carousel image admin ------------------\\
    function imgCarousel(){
        $UrlView='admin/galeri/v_imgCarousel';
        $data['DataGaleri']=$this->m_opd->get_one_specific_data_desc('galery','IDKATEGORIGALERY','1')->result();
        $this->m_opd->prepLog("*","Cek all carousel image for admin");
        $this->selectGaleri($UrlView,$data);
    } 
    
    function addimgCarousel(){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opdGaleri'); 
        }else{
            $dt=array('formAction' => '/doAddimgCarousel',
                      'breadCRM' => 'Carousel Image',
                      'formTitle' => 'Add Carousel Image',
            );
            $this->m_opd->prepLog("*","Form add corousel image");
            $this->load->view('admin/galeri/v_addGaleri',$dt);
        }
    }

    function doAddimgCarousel(){
        $dtView=array('formAction' => '/doAddimgCarousel',
                     'breadCRM' => 'Carousel Image',
                     'formTitle' => ' Add Carousel Image');
        $UrlView='admin/galeri/v_addGaleri';
        $UrlRedirect='c_opdGaleri/imgCarousel';
        $path='assets/images/galeri/CarouselImage/';
        $idKategori='1';
        $this->preInsertGaleri($UrlView,$dtView,$UrlRedirect,$path,$idKategori);
    }

    function updateimgCarousel(){
        $id=$this->uri->segment(3);
        $data['tmpGaleri']=$this->m_opd->get_one_specific_data('galery','IDGALERY',$id)->row_array();
        $data['formAction']='/doUpdateimgCarousel';
        $data['breadCRM']='Carousel Image';
        $data['formTitle']='Update Carousel Image';
        $data['pathIMG']='assets/images/galeri/CarouselImage/';
        $this->m_opd->prepLog($id,"Form update corousel image");
        $this->load->view('admin/galeri/v_updateGaleri',$data);
    }

    function doUpdateimgCarousel(){
        $UrlRedirectSuccess='c_opdGaleri/imgCarousel';
        $UrlRedirectError='c_opdGaleri/updateimgCarousel/';
        $path='assets/images/galeri/CarouselImage/';
        $this->preUpdateGaleri($UrlRedirectSuccess,$UrlRedirectError,$path);
    }

    function deleteCarouselImage(){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opdGaleri'); 
        }else{
            $id=$this->uri->segment(3);
            $this->m_opd->delete_data('galery','IDGALERY',$id);
            $this->m_opd->prepLog($id,"Delete carouse image succes");
            $this->imgCarousel();
        }
        
    }

    
// ------------------ Carousel Link admin ------------------\\
    function linkCarousel(){
        $UrlView='admin/galeri/v_linkCarousel';
        $data['DataGaleri']=$this->m_opd->get_one_specific_data_desc('galery','IDKATEGORIGALERY','2')->result();
        $this->m_opd->prepLog("*","Cek all carousel link for admin");
        $this->selectGaleri($UrlView,$data);
    } 

    function addLinkCarousel(){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opdGaleri'); 
        }else{
            $dt=array('formAction' => '/doAddLinkCarousel',
                      'breadCRM' => 'Carousel Link',
                      'formTitle' => 'Add Carousel Link',
            );
            $this->m_opd->prepLog("*","Form add corousel link");
            $this->load->view('admin/galeri/v_addGaleri',$dt);
        }
    }

    function doAddLinkCarousel(){
        $dtView=array('formAction' => '/doAddLinkCarousel',
                     'breadCRM' => 'Carousel Link',
                     'formTitle' => ' Add Carousel Link');
        $UrlView='admin/galeri/v_addGaleri';
        $UrlRedirect='c_opdGaleri/linkCarousel';
        $path='assets/images/galeri/CarouselLink/';
        $idKategori='2';
        $this->preInsertGaleri($UrlView,$dtView,$UrlRedirect,$path,$idKategori);
    }

    function updateLinkCarousel(){
        $id=$this->uri->segment(3);
        $data['tmpGaleri']=$this->m_opd->get_one_specific_data('galery','IDGALERY',$id)->row_array();
        $data['formAction']='/doUpdateLinkCarousel';
        $data['breadCRM']='Carousel Link';
        $data['formTitle']='Update Carousel Link';
        $data['pathIMG']='assets/images/galeri/CarouselLink/';
        $this->m_opd->prepLog($id,"Form update corousel link");
        $this->load->view('admin/galeri/v_updateGaleri',$data);
    }

    function doUpdateLinkCarousel(){
        $UrlRedirectSuccess='c_opdGaleri/linkCarousel';
        $UrlRedirectError='c_opdGaleri/updateLinkCarousel/';
        $path='assets/images/galeri/CarouselLink/';
        $this->preUpdateGaleri($UrlRedirectSuccess,$UrlRedirectError,$path);
    }

    function deleteCarouselLink(){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opdGaleri'); 
        }else{
            $id=$this->uri->segment(3);
            $this->m_opd->delete_data('galery','IDGALERY',$id);
            $this->m_opd->prepLog($id,"Delete carouse link succes");
            $this->linkCarousel();
        }
        
    }

    /*
     * file value and type check during validation
     */
    public function file_check($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['file']['name']);
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
            
        }
    }

    /*
     * file value and type check during validation for update
     */
    public function file_check2($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['file']['name']);
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->session->set_flashdata('messageUpGal','Please select only gif/jpg/png file.');
                // $this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
                return false;
            }
        }else{
            $this->session->set_flashdata('messageUpGal','Please choose a file to upload.');
            // $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
            
        }
    }
    
}
?>