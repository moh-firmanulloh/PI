<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_regist extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
	}

	public function registerTempUser($data)
	{
		$this->db->insert('temp_register', $data);
	}

	public function sendEmailVerification($data)
	{
		$config = array
		(
	     'protocol' => 'smtp',
	     'smtp_host' => 'ssl://smtp.gmail.com.',
	     'smtp_port' => 465,
	     'smtp_user' => 'aturkeuanganku@gmail.com', 
	     'smtp_pass' => '1n1p4ssw0rd', 
	     'mailtype' => 'html',
	     'charset' => 'iso-8859-1',
	     'wordwrap' => TRUE
  		);

  		$this->email->initialize($config);
  		$this->email->set_newline("\r\n");
		$this->email->from('aturkeuanganku@gmail.com', "Admin Team");
	  	$this->email->to($data['email']);  
		$this->email->subject("Email Verification");
	  	$this->email->message("Dear User,\nPlease click on below URL or paste into your browser to verify your Email Address\n\n".base_url()."daftar/verifikasiEmail/".$data['email_verif_code']."\n"."\n\nThanks\nAdmin Team");
	  	$this->email->send();
	  	return $this->email->send();
	}

	public function verifyEmailAddress($verificationCode)
	{
		$kondisi = "email_verif_code=" . "'" . $verificationCode ."'";
		$this->db->select('*');
		$this->db->from('temp_register');
		$this->db->where($kondisi);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1)
		{
			foreach ($query->result_array() as $row) 
			{
				$data['nama']		= $row['nama'];
				$data['email']		= $row['email'];
				$data['username'] 	= $row['username'];
				$data['password'] 	= $row['password'];
				$data['status']		= 1;
			}
			$this->db->insert('daftar_user', $data);
			$this->db->delete('temp_register', array('username' => $data['username']));
			return true;
		}
	}

}

/* End of file Model_regist.php */
/* Location: ./application/models/Model_regist.php */