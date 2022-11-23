<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_login_register extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('form_validation');
        $this->load->model('m_opd');
         //load file helper
         $this->load->helper('file');
         $this->load->library('user_agent');

         if($this->session->userdata('sess_login') == TRUE){
            redirect('home');
        }
        
    }

    function index(){
        $this->m_opd->prepLog("*","Form login");
        $this->load->view('LoginRegister/v_login');
    }

    function register(){
        $this->m_opd->prepLog("*","Form registern");
        $this->load->view('LoginRegister/v_register',array('gg' => '' ));
    }

    function index_forgetPasswor(){
        $this->m_opd->prepLog("*","Form forget password");
        $this->load->view('LoginRegister/v_forget_password');
    }
    //login
    function authLogin(){
        $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required');

        if($this->form_validation->run()){
            $result = $this->m_opd->can_login($this->input->post('user_email'), $this->input->post('user_password'));
            
            if($result == 'LOGIN_bkl_TRUE'){
                $tmpuser=$this->m_opd->get_one_specific_data('user','EMAIL',$this->input->post('user_email'))->row_array();
                $this->session->set_userdata('sess_login',TRUE);
                $this->session->set_userdata('sess_id',$tmpuser['IDUSER']);
                $this->session->set_userdata('sess_nama',$tmpuser['NAMALENGKAP']);
                $this->session->set_userdata('sess_role',$tmpuser['ROLE']);
                $this->session->set_userdata('sess_photo',$tmpuser['PHOTOUSER']);
                $this->m_opd->prepLog($this->session->userdata('sess_id'),"Login succes");
                redirect('home');
                
            }else{
                $this->session->set_flashdata('message',$result);
                redirect('c_login_register');
            }
        }else{
            $this->load->view('LoginRegister/v_login');
        }   
    }

    //logout
    // function logout(){
    //     $this->session->sess_destroy(); // Hapus semua session
    //     redirect('c_opd', 'refresh');
    // }

    //register
    function sendVerificationEmail(){
        //konfigurasi form validation
        $this->form_validation->set_rules('user_name', 'Name', 'required|trim');
        $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('file', '', 'callback_file_check');
        $this->form_validation->set_rules('user_number', 'Mobile Number ', 'required|max_length[12]|min_length[11]|greater_than[0]'); //{10} for 10 digits number
        $this->form_validation->set_rules('user_address', 'Address', 'required|min_length[10]|max_length[50]');
        $this->form_validation->set_rules('schoolGroups','School groups','required|callback_check_default');
        $this->form_validation->set_message('check_default', 'You need to select something other than the default');
        //konfigurasi upload 
        $config['upload_path']          = 'assets/images/user/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1200;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['overwrite']            = FALSE;
        $this->load->library('upload', $config);

        $this->m_opd->delete_user_if_no_verification($this->input->post('user_email'),'no');
        if($this->form_validation->run()){
            $this->upload->do_upload('file');//untuk melakukan upload file
            $GetAdminUser=$this->m_opd->get_one_specific_data('user','ROLE','bkl01');
            //get form input 
            $verification_key = md5(rand());
            $pas = $this->input->post('user_password');
            $encrypted_password = password_hash($pas, PASSWORD_DEFAULT);
            $email=$this->input->post('user_email');
            $dataUSER=array(
                        'NAMALENGKAP'=> $this->input->post('user_name'),
                        'EMAIL'=> $this->input->post('user_email'),
                        'PASSWORD'=> $encrypted_password,
                        'NOHP'=> $this->input->post('user_number'),
                        'ALAMAT'=> $this->input->post('user_address'),
                        'GENDER'=> $this->input->post('schoolGroups'),
                        'VERIFICATIONKEY'=> $verification_key,
                        'EMAILVERIFIED'=> 'no',
                        'CHANGEPASSWORDVERIFIED'=> 'no',
                        );
            $dataUSER['PHOTOUSER'] = $this->upload->data('file_name');
            $query=$this->m_opd->get_all_data('user');
            if($query->num_rows() > 0){
                $dataUSER['ROLE'] = 'bkl03';
            }else{
                $dataUSER['ROLE'] = 'bkl01';
            }

            //konfigurasi librari email
            $this->load->library('email');
            $config = array();
            $config['charset'] = 'iso-8859-1';
            $config['protocol']= "smtp";
            $config['mailtype']= "html";
            $config['smtp_host']= "smtp.gmail.com";//pengaturan smtp
            $config['smtp_crypto']= "ssl";
            $config['smtp_port']= "465";
            $config['smtp_timeout']= "30";
            $config['smtp_user']= "irfanlasvegas97@gmail.com"; // isi dengan email kamu
            $config['smtp_pass']= "yuhewfpbwgxrplpe"; // isi dengan password yg di genenarate langsung dari gmail
            $config['crlf']="\r\n";
            $config['newline']="\r\n";
            $config['wordwrap'] = TRUE;
            $dt= array(
                'userName'=> $this->input->post('user_name'),
                'userKey'=> $verification_key
                  );
            $body = $this->load->view('LoginRegister/v_email_verification',$dt,TRUE);
            //memanggil library email dan set konfigurasi untuk pengiriman email
            $this->email->initialize($config);
            //konfigurasi pengiriman
            $this->email->from($config['smtp_user'],'KOMINFO');
            $this->email->to($email);
            $this->email->subject("cek akun user");

            
            if($GetAdminUser->num_rows() < 1){
                $this->email->message($body);
                if($this->email->send()){
                    $this->m_opd->insert('user',$dataUSER);
                    $this->session->set_flashdata('message', 'Silahkan cek inbox/spam pada email anda untuk melakukan veritivikasi');
                    $this->load->view('LoginRegister/v_login');
                }else {
                    echo "email gagal terkirim";
                }
            }else{
                $this->email->message($body);
                if($this->email->send()){
                    $this->m_opd->insert('user',$dataUSER);
                    $this->session->set_flashdata('message', 'Silahkan cek inbox/spam pada email anda untuk melakukan veritivikasi');
                    $this->load->view('LoginRegister/v_login');
                }else {
                    echo "email gagal terkirim";
                }
                
            }  
        }else{
            $error = array('gg' => $this->upload->display_errors());
            $this->load->view('LoginRegister/v_register', $error);
        }  
    }

    //forget password
    function sendVerificationPassword(){
        $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email|callback_check_user');
        if($this->form_validation->run()){
            $email=$this->input->post('user_email');
            
            //konfigurasi librari email
            $this->load->library('email');
            $config = array();
            $config['charset'] = 'iso-8859-1';
            $config['protocol']= "smtp";
            $config['mailtype']= "html";
            $config['smtp_host']= "smtp.gmail.com";//pengaturan smtp
            $config['smtp_crypto']= "ssl";
            $config['smtp_port']= "465";
            $config['smtp_timeout']= "30";
            $config['smtp_user']= "irfanlasvegas97@gmail.com"; // isi dengan email anda
            $config['smtp_pass']= "yuhewfpbwgxrplpe"; //lyczxyrspkbxpmeu     isi dengan password yg di genenarate langsung dari gmail
            $config['crlf']="\r\n";
            $config['newline']="\r\n";
            $config['wordwrap'] = TRUE;
            $verification_key = md5(rand());
            $tmpUsername=$this->m_opd->get_one_specific_data('user','EMAIL',$email)->row_array();
            // print_r( $tmpUsername['NAMALENGKAP']);
            $dt= array(
                'tmpEMAIL'=> $email,
                'tmpKey'=> $verification_key,
                'userName'=> $tmpUsername['NAMALENGKAP']
                  );
            $body = $this->load->view('LoginRegister/v_forget_password_verification',$dt,TRUE);
            //memanggil library email dan set konfigurasi untuk pengiriman email
            $this->email->initialize($config);
            //konfigurasi pengiriman
            $this->email->from($config['smtp_user'],'KOMINFO');
            $this->email->to($email);
            $this->email->subject("Change password");
            
            $this->email->message($body);
            if($this->email->send()){
                //update key
                
                $dataUSER=array(
                    'VERIFICATIONKEY'=> $verification_key,
                    'CHANGEPASSWORDVERIFIED'=> 'yes',
                    );
                $this->m_opd->update_data('user','EMAIL',$email,$dataUSER);
                $this->session->set_flashdata('message', 'Silahkan cek inbox/spam pada email anda untuk melakukan veritivikasi perubahan password');
                $this->load->view('LoginRegister/v_login');
            }else {
                echo "email gagal terkirim";
            }
            

        }else{
            $this->load->view('LoginRegister/v_forget_password');
        }
    }

    function verify_password(){
        if($this->uri->segment(3)){
            $verification_key = $this->uri->segment(3);
            if($this->m_opd->verify_password($verification_key)){
                $this->m_opd->prepLog("*","Password veritication succes");
                $this->load->view('LoginRegister/v_update_password',array('tmpKEYuser' => $verification_key ));
            }else {
                $this->m_opd->prepLog("*","Password veritication invalid");
                $data['message'] = '<h1 align="center">Invalid Link</h1>';
                $this->load->view('LoginRegister/v_email_verification_success', $data);
            }
        }

    }

    function updatePassword(){
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[8]');
        $keyUser2=$this->input->post('user_key');
        $newPassword=$this->input->post('user_password');
        $encrypted_password = password_hash($newPassword, PASSWORD_DEFAULT);
        if($this->form_validation->run()){
            $dataUSER=array(
                'PASSWORD'=> $encrypted_password,
                'CHANGEPASSWORDVERIFIED'=> 'no',
                );
            $this->m_opd->update_data('user','VERIFICATIONKEY',$keyUser2,$dataUSER);
            $this->m_opd->prepLog($keyUser2,"Update password succes");
            $this->session->set_flashdata('message','Update password berhasil');
            redirect('c_login_register');
        }else{
            $this->load->view('LoginRegister/v_update_password',array('tmpKEYuser' => $keyUser2));
        }
    }

    function verify_email(){
        if($this->uri->segment(3)){
            $verification_key = $this->uri->segment(3);
            if($this->m_opd->verify_email($verification_key)){
                $this->m_opd->prepLog("*","Email veritication succes");
                $data['message'] = '<h1 align="center">Your Email has been successfully verified, now you can login from <a href="'.base_url().'index.php/c_login_register">here</a></h1>';
            }else {
                $this->m_opd->prepLog("*","Email veritication invalid");
                $data['message'] = '<h1 align="center">Invalid Link</h1>';
            }
            $this->load->view('LoginRegister/v_email_verification_success', $data);
        }
    }

    function check_default($post_string){
        return $post_string == '0' ? FALSE : TRUE;
    }

    function check_user($str){
        $query=$this->db->query("SELECT * FROM user WHERE EMAIL='$str' LIMIT 1");
        if($str==''){
            $this->form_validation->set_message('check_user', 'The Email Address field is required');
            return false;
        }else{
            if($query->num_rows() > 0){
                $query=$query->row_array();
                if($query['EMAILVERIFIED']=='yes'){
                    return true;
                }else{
                    $this->form_validation->set_message('check_user', 'First verified your email address');
                return false;
                }
                
            }else{
                $this->form_validation->set_message('check_user', 'Your email is not registered.');
                return false;
            }
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
                $this->form_validation->set_message('file_check', 'Please select only pdf/gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
            
        }
    }

    
}
?>