<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_berita extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('form_validation');
        $this->load->model('m_opd');
        //load pagination
        $this->load->library('pagination');
        //load file helper
        $this->load->helper('file');
        $this->load->library('user_agent');
        // if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02' || $this->session->userdata('sess_role') != 'bkl03') && $this->session->userdata('sess_login') != TRUE){
        //     redirect('c_opd');
        //     // echo'aaal'; 
        // }
        
    }

    function index(){
        //konfigurasi pagination
        $config['base_url'] = site_url('berita'); //site url
        $config['total_rows'] = $this->db->count_all('berita'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 2;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
    
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->m_opd->get_news_list($config["per_page"], $data['page'])->result();           

        $data['pagination'] = $this->pagination->create_links();

        $this->m_opd->prepLog("*","Cek all berita");

        $this->load->view('admin/berita/v_berita',$data);
        
    }

    function addBerita(){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opd');
        }else{
            $this->m_opd->prepLog("*","Form add berita");
            $this->load->view('admin/berita/v_addBerita');
        } 
    }

    function doAddBerita(){
        $this->form_validation->set_rules('berita_judul', '', 'callback_judul_check');
        $this->form_validation->set_rules('berita_deskripsi', '', 'callback_deskripsi_check');
        $this->form_validation->set_rules('file', '', 'callback_file_checkThumb');
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opd');
        }else{
            if($this->form_validation->run()){
                //konfigurasi upload 
                $config['upload_path']          = 'assets/images/berita/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;
                $config['overwrite']            = FALSE;
                $this->load->library('upload', $config);
                $this->upload->do_upload('file');//untuk melakukan upload file
                $dataBerita=array(
                    'IDUSER'=> $this->session->userdata('sess_id'),
                    'GAMBAR'=> $this->upload->data('file_name'),
                    'JUDULBERITA '=> $this->input->post('berita_judul'),
                    'ISIBERITA '=> $this->input->post('berita_deskripsi'),
                    );
                    // $this->m_opd->insert('berita',$dataBerita);
                    $id_insert = $this->m_opd->insert_data("berita", $dataBerita);
                    $this->m_opd->prepLog($id_insert,"Add berita succes");
                    redirect('berita');
            }else{
                $this->addBerita();
            }
        } 
    }

    function updateNews(){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opd');
        }else{
            $id=$this->uri->segment(3);
            $data['tmpBerita']=$this->m_opd->get_one_specific_data('berita','IDBERITA',$id)->row_array();
            $this->m_opd->prepLog($id,"Update berita succes");
            $this->load->view('admin/berita/v_updateBerita',$data);
        }
    }

    function doUpdateNews(){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_berita');
        }else{
            //konfigurasi upload 
            $config['upload_path']          = 'assets/images/berita/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;
            $config['overwrite']            = FALSE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');//untuk melakukan upload file
            $id=$this->input->post('berita_id');
            $gambar=$this->upload->data('file_name');
            $judul=$this->input->post('berita_judul');
            $deskripsi=$this->input->post('berita_deskripsi');
            if($gambar!=''){
                $this->form_validation->set_rules('berita_judul', '', 'callback_judul_check');
                $this->form_validation->set_rules('berita_deskripsi', '', 'callback_deskripsi_check');
                $this->form_validation->set_rules('file', '', 'callback_file_checkThumb');
                if($this->form_validation->run()){
                    $dataBerita=array(
                        'GAMBAR'=> $gambar,
                        'JUDULBERITA '=> $judul,
                        'ISIBERITA '=> $deskripsi,
                    );
                    $this->m_opd->update_data('berita','IDBERITA',$id,$dataBerita);
                    redirect('berita/'.$id.'/'.url_title($judul, 'dash', true));
                }else{
                    redirect('c_berita/updateNews/'.$id);
                }
            }else{
                $this->form_validation->set_rules('berita_judul', '', 'callback_judul_check');
                $this->form_validation->set_rules('berita_deskripsi', '', 'callback_deskripsi_check');
                if($this->form_validation->run()){
                    $dataBerita=array(
                        'JUDULBERITA '=> $judul,
                        'ISIBERITA '=> $deskripsi,
                    );
                    $this->m_opd->update_data('berita','IDBERITA',$id,$dataBerita);
                    redirect('berita/'.$id.'/'.url_title($judul, 'dash', true));
                }else{
                    redirect('c_berita/updateNews/'.$id);
                }
            }
        }

    }

    function deleteNews(){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            redirect('c_opd');
        }else{
            $id=$this->uri->segment(3);
            $this->m_opd->delete_data('komentar','IDBERITA',$id);
            $this->m_opd->delete_data('berita','IDBERITA',$id);
            $this->m_opd->prepLog($id,"Delete berita succes");
            redirect('berita');
        }
    }

    function readNews(){
        $id=$this->uri->segment(2);
        $tmpQuery=$this->m_opd->get_one_news($id);
        if($tmpQuery->num_rows() > 0){
            $data['tmpBerita']=$tmpQuery->row_array();
            $data['cekTmpBerita']='true';
            $this->m_opd->prepLog($id,"Baca berita");
            $this->load->view('admin/berita/v_bacaBerita',$data);
        }else{
            $data['cekTmpBerita']='false';
            $this->load->view('admin/berita/v_bacaBerita',$data);
            
        }
        // $data['tmpBerita']=$this->m_opd->get_one_news($id)->row_array();
        // $this->m_opd->prepLog($id,"Baca berita");
        // $this->load->view('admin/berita/v_bacaBerita',$data);
    }

    
    function addComment(){
        if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
            $linkLogin=site_url().'/c_login_register';
            $array = array(
                            'success' =>'<div class="alert alert-danger alert-dismissible fade show" role="alert">  
                                Silahkan login untuk melakukan komentar <a href="'.$linkLogin.'" class="alert-link">[ LINK LOGIN ]</a>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>'
            );
        }else{
            $this->form_validation->set_rules('komen', 'comment', 'required');
            $this->form_validation->set_rules('berita_id', 'news id', 'required');
            $this->form_validation->set_rules('komentar_id', 'comment id', 'required');
            if($this->form_validation->run()){
                try {
                    $last_id = $this->m_opd->insert_comment();
                    
                } catch (Exception $e) {
                    var_dump($e->getMessage());
                }

                if (!empty($last_id) && $last_id > 0) {
                    $array = array(
                        'success' =>'<div"></div>', 
                     );
                }
			    
            }else{
                $array = array(
                    'error'   => true,
                    'name_comment' => form_error('komen')
                );
            }
            
        }
        echo json_encode($array);
    }

    function showComment(){
        $output='';
			$res1 = $this->m_opd->listComment();
			while ($row = $res1->unbuffered_row('array')) {
				$output .= '
				  <div class="media border p-3 mb-2">
					<img src="'.base_url().'assets/images/user/'.$row["PHOTOUSER"].'" alt="foto-user" class="mr-3  rounded-circle" width="60" height="60" id="foto'.$row["KOMENTAR_ID"].'">
					<div class="media-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <span style="font-size: 16;" id="nama'.$row["KOMENTAR_ID"].'"><b>'.$row["NAMALENGKAP"].'</b></span>
                                <p id="komentar'.$row["KOMENTAR_ID"].'">'.$row["KOMENTAR"].'</p>
                                <div class="text-right">
                                
                                
                ';
                if($this->session->userdata('sess_role') == 'bkl01'){
                    $output .='
                        <a href=""   id="'.$row["KOMENTAR_ID"].'" class="text-danger mr-2 deleteReplay">Delete</a>
                    ';
                }else{
                    if($row["IDUSER"] == $this->session->userdata('sess_id')){
                        $output .='
                            <a href=""   id="'.$row["KOMENTAR_ID"].'" class="text-danger mr-2 deleteReplay">Delete</a>
                        ';
                    }else{
                        $output .='
                            <a href="" hidden id="'.$row["KOMENTAR_ID"].'" class="text-danger mr-2 deleteReplay">Delete</a>
                        ';
                    }
                }
                $output .='
                                <a href="" class="reply " id="'.$row["KOMENTAR_ID"].'-_-'.$row["KOMENTAR_ID"].'">Reply</a>    
                                </div>
                            </div>
                        </div>
					</div>
				  </div>
                ';
				$output .= $this->showCommentReply($row["KOMENTAR_ID"]);
			}
			echo $output;

    }

    function showCommentReply($parent_id = 0, $marginleft = 0){
        $output='';
        $res1 = $this->m_opd->listLevelComment($parent_id);

        $count = $res1->num_rows();
        if($parent_id == 0) {
            $marginleft = 0;
        } else {
            $marginleft = $marginleft + 48;
        }

        if($count > 0){
            while ($row = $res1->unbuffered_row('array')) {
            $output .= '
                <div class="media border p-3 mb-2" style="margin-left:'.$marginleft.'px">
                    <img src="'.base_url().'assets/images/user/'.$row["PHOTOUSER"].'" alt="foto-user" class="mr-3  rounded-circle" width="60" height="60" id="foto'.$row["KOMENTAR_ID"].'">
                    <div class="media-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <span style="font-size: 16;" id="nama'.$row["KOMENTAR_ID"].'"><b>'.$row["NAMALENGKAP"].'</b></span>
                                <p id="komentar'.$row["KOMENTAR_ID"].'">'.$row["KOMENTAR"].'</p>
                                <div class="text-right">
            ';
            if($this->session->userdata('sess_role') == 'bkl01'){
                $output .='
                    <a href=""   id="'.$row["KOMENTAR_ID"].'" class="text-danger mr-2 deleteReplay">Delete</a>
                ';
            }else{
                if($row["IDUSER"] == $this->session->userdata('sess_id')){
                    $output .='<a href=""   id="'.$row["KOMENTAR_ID"].'" class="text-danger mr-2 deleteReplay">Delete</a>';
                }else{
                    $output .='
                        <a href="" hidden id="'.$row["KOMENTAR_ID"].'" class="text-danger mr-2 deleteReplay">Delete</a>
                    ';
                }
            }   
            $output .='
                                <a href="" class="reply" id="'.$parent_id.'-_-'.$row["KOMENTAR_ID"].'">Reply</a>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
            // jka level replay idak ada batasan ubah variabel $parent_id menjadi $row["KOMENTAR_ID"] pada bagian Reply di atas
            // $output .= $this->showCommentReply($row["KOMENTAR_ID"], $marginleft);
            }
        }
        return $output;
    }

    function deleteComment(){
        if(($this->session->userdata('sess_role') == 'bkl01' || $this->session->userdata('sess_role') == 'bkl02'|| $this->session->userdata('sess_role') == 'bkl03') && $this->session->userdata('sess_login') == TRUE){
            $id=$this->input->post('idKomentar');
            $tmpKmentar=$this->m_opd->get_one_specific_data('komentar','KOMENTAR_ID',$id)->row_array();
            if($tmpKmentar['PARENT_KOMENTAR_ID']=='0'){
                $this->m_opd->delete_data('komentar','KOMENTAR_ID',$id);
                $this->m_opd->delete_data('komentar','PARENT_KOMENTAR_ID',$id);
            }else{
                $this->m_opd->delete_data('komentar','KOMENTAR_ID',$id);
            }
        }
    }
    
    /*
     *inpt text validation
     */
    public function file_checkThumb($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['file']['name']);
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
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


}

?>