<?php
class M_opd extends CI_Model{
	//email
	function verify_email($key){
		$this->db->escape($key);
		$this->db->where('VERIFICATIONKEY', $key);
		$this->db->where('EMAILVERIFIED', 'no');
		$query = $this->db->get('user');
		if($query->num_rows() > 0){
			$data = array('EMAILVERIFIED'  => 'yes');
			$this->db->where('VERIFICATIONKEY', $key);
			$this->db->update('user', $data);
			return true;
		}
		else{
			return false;
		}
	}

	function verify_password($key){
		$this->db->escape($key);
		$this->db->where('VERIFICATIONKEY', $key);
		$this->db->where('CHANGEPASSWORDVERIFIED', 'yes');
		$query = $this->db->get('user');
		if($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	function delete_user_if_no_verification($email,$verification){
		$this->db->escape($email);
		$this->db->escape($verification);
    $query=$this->db->query("SELECT * FROM user WHERE EMAIL='$email' AND EMAILVERIFIED ='$verification' LIMIT 1");
    if($query->num_rows() > 0){
			$where = array('EMAIL' => $email);
			$this->db->where($where);
			$this->db->delete('user');
		}
	}

	function can_login($email, $password){
		$this->db->escape($email);
		$this->db->escape($password);
		$this->db->where('EMAIL', $email);
		$query = $this->db->get('user');
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				if($row->EMAILVERIFIED == 'yes'){
					$store_password = $row->PASSWORD;
					if(password_verify($password,$store_password)){
						//$this->session->set_userdata('id', $row->IDUSER);
						return 'LOGIN_bkl_TRUE';
					}
					else{
						return 'Wrong Password';
					}
				}
				else{
					return 'First verified your email address';
				}
			}
		}
		else{
			return 'Wrong Email Address';
		}
	}
	

	
	// galeri
    function get_gallery_list_Limit($limit, $start){
			$this->db->escape($limit);
			$this->db->escape($start);
			$this->db->where('IDKATEGORIGALERY', '3');
			$this->db->order_by("IDGALERY","desc");
			$query = $this->db->get('galery', $limit, $start);
			return $query;
    }
	// berita
		function get_news_log(){
			$this->db->order_by("ID","desc");
					$query = $this->db->get('logberita');
					return $query;
		}
    function get_news_list($limit, $start){
				$this->db->select('berita.*, user.NAMALENGKAP');//juts get atribut  NAMALENGKAP in table user, than join with all atribut in table berita
				$this->db->from('berita');
				$this->db->join('user', 'user.IDUSER = berita.IDUSER','inner');
				$this->db->order_by("IDBERITA","desc");
				$this->db->escape($limit);
				$this->db->escape($start);
				$query = $this->db->limit( $limit, $start);
				$query = $this->db->get();
        return $query;
	}
	
	function get_one_news($kode){
		$this->db->escape($kode);
		$this->db->select('berita.*, user.NAMALENGKAP');//juts get atribut  NAMALENGKAP in table user, than join with all atribut in table berita
		$this->db->from('berita');
		$this->db->join('user', 'user.IDUSER = berita.IDUSER','inner');
		$this->db->where('berita.IDBERITA', $kode);
		$query = $this->db->get();
		return $query;	
	}

	
	


	//global
    function insert_data($table,$data){
		$this->db->insert($table, $data);
		return $this->db->insert_id();
    }

    function get_one_specific_data($table,$atribut,$kode){
		
		return $this->db->get_where($table,array($atribut => $kode));	
		}

		function get_one_specific_data_desc($table,$atribut,$kode){
			$this->db->order_by("IDGALERY","desc");
			return $this->db->get_where($table,array($atribut => $kode));	
			}
		
	

    function get_all_data($table){
		$tmp=$this->db->get($table);//megambil semua data di tabel 
		return $tmp;
	}
    
    function update_data($table,$atribut,$kode,$data){
		$this->db->where($atribut,$kode);
		$this->db->update($table,$data);//nama tabel dan data
    }
    
	function delete_data($table,$atribut,$kode){
		$where = array($atribut => $kode);
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function insert($table,$data){
		$this->db->insert($table, $data);
	}
	// komentar
	
	public function insert_comment()
    {
        $dataKomentar=array(
			'IDBERITA '=> $this->input->post('berita_id'),
			'IDUSER '=> $this->session->userdata('sess_id'),
			'PARENT_KOMENTAR_ID '=> $this->input->post('komentar_id'),
			'KOMENTAR'=> $this->input->post('komen'),
			
		);
		$this->db->insert('komentar',$dataKomentar);
		return $this->db->insert_id();
		
	}

	function listComment(){
		$this->db->select('komentar.*, user.NAMALENGKAP, user.PHOTOUSER');//juts get atribut  NAMALENGKAP in table user, than join with all atribut in table berita
		$this->db->from('komentar');
		$this->db->join('user', 'user.IDUSER = komentar.IDUSER','inner');
		$this->db->where('PARENT_KOMENTAR_ID ','0');
		$this->db->where('IDBERITA',$this->uri->segment(3));
		$this->db->order_by("KOMENTAR_ID","desc");
		$query = $this->db->get();
		return $query;	
	}

	function listLevelComment($parent_id){
		// $tmp=$this->db->query("SELECT * FROM komentar WHERE PARENT_KOMENTAR_ID='$parent_id'");
		$this->db->select('komentar.*, user.NAMALENGKAP, user.PHOTOUSER');//juts get atribut  NAMALENGKAP in table user, than join with all atribut in table berita
		$this->db->from('komentar');
		$this->db->join('user', 'user.IDUSER = komentar.IDUSER','inner');
		$this->db->where('PARENT_KOMENTAR_ID ',$parent_id);
        $query = $this->db->get();
		return $query;
	}
	


	// log
	function prepLog($IDaction, $Action){
		$controller = $this->router->fetch_class();//get controller
		$method = $this->router->fetch_method();//get function in controller
		if(($this->session->userdata('sess_role') == 'bkl01') && $this->session->userdata('sess_login') == TRUE){
			$tmpRole="Super Admin";
		}elseif(($this->session->userdata('sess_role') == 'bkl02') && $this->session->userdata('sess_login') == TRUE){
			$tmpRole="Admin";
		}
		else{
			$tmpRole="User";
		}

		if ($this->agent->is_browser()){
			$agent = $this->agent->browser().' '.$this->agent->version();
		}
		elseif ($this->agent->is_robot()){
			$agent = $this->agent->robot();
		}
		elseif ($this->agent->is_mobile()){
			$agent = $this->agent->mobile();
		}
		else{
			$agent = 'Unidentified User Agent';
		}
		date_default_timezone_set('Asia/jakarta');
		if(($this->session->userdata('sess_role') != 'bkl01' || $this->session->userdata('sess_role') != 'bkl02') && $this->session->userdata('sess_login') != TRUE){
			$path='./assets/log/Log_user.txt';
			$data = "\n\n"."IDuser : null".
							"\n"."IP : ".$this->input->ip_address().
							"\n"."Browser : ".$agent.
							"\n"."Platform : ".$this->agent->platform().
							"\n"."Role : ".$tmpRole.
							"\n"."URLpage : ".($controller).'/'.($method).
							"\n"."IDaction : ".$IDaction.
							"\n"."Action : ".$Action.
							
							"\n"."TGL : ".date('d/M/Y h:i:s A').
							"\n"."==========================================================";
			write_file($path, $data,'a+');
			// 
		}else{
			$path='./assets/log/Log_user_admin.txt';
			$data = "\n\n"."IDuser : ".$this->session->userdata('sess_id')." - ".$this->session->userdata('sess_nama').
							"\n"."IP : ".$this->input->ip_address().
							"\n"."Browser : ".$agent.
							"\n"."Platform : ".$this->agent->platform().
							"\n"."Role : ".$tmpRole.
							"\n"."URLpage : ".($controller).'/'.($method).
							"\n"."IDaction : ".$IDaction.
							"\n"."Action : ".$Action.
							
							"\n"."TGL : ".date('d/M/Y h:i:s A').
							"\n"."==========================================================";
			write_file($path, $data,'a+');
			
		}
	}

	function textToSlug($text='') {
		$text = trim($text);
		if (empty($text)) return '';
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
			
			return $text;
	}
}
?>