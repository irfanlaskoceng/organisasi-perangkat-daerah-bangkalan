<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_opd extends CI_Controller {
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
        $data['DataGaleri']=$this->m_opd->get_one_specific_data('galery','IDKATEGORIGALERY','1')->result();
        $data['DataGaleri2']=$this->m_opd->get_one_specific_data('galery','IDKATEGORIGALERY','2')->result();
        $data['DataGaleri3'] = $this->m_opd->get_gallery_list_Limit(6, 0)->result();
        $data['DataBerita'] = $this->m_opd->get_news_list(4, 0)->result();
        
        $this->m_opd->prepLog("*","Homepage");
		$this->load->view('user/v_indexUser',$data);
    }
    function visiMisiOPD(){
        $this->m_opd->prepLog("*","Cek visi & misi");
        $this->load->view('user/v_visiMisi');
    }

    function tugasDanFungsiOPD(){
        $this->m_opd->prepLog("*","Tugas & fungsi");
        $this->load->view('user/v_tugasDanFungsi');
    }
    
    function strukturOrganisasiOPD(){
        $this->m_opd->prepLog("*","Struktur organisasi");
        $this->load->view('user/v_strukturOrganisasi');
    }

    function customError404(){
        $this->load->view('user/error404');
    }


    
    function logout(){
        $this->m_opd->prepLog("*","User logout");
        $this->session->sess_destroy(); // Hapus semua session
        redirect('home', 'refresh');
        // redirect('ProsesLogin/logout');

    }
}
