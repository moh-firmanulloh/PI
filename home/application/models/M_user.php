<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

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
	     'smtp_user' => 'aturkeuanganku@gmail.com', // change it to yours
	     'smtp_pass' => '1n1p4ssw0rd', // change it to yours
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

	// public function antiDualLogin($data)
	// {
	// 	$kondisi = "username =" . "'" . $data['username'] ."'";
	// 	$this->db->select('*');
	// 	$this->db->from('data_session');
	// 	$this->db->where($kondisi);
	// 	$this->db->limit(1);
	// 	$query = $this->db->get();

	// 	if ($query->num_rows() == 0)
	// 	{
	// 		return true;
	// 	} else if ($query->num_rows() == 1)
	// 	{
	// 		return $data['username'];
	// 	}
	// }

	public function verifUserLogin($data)
	{
			$kondisi = "username =" . "'" . $data['username'] ."'";
			$this->db->select('*');
			$this->db->from('daftar_user');
			$this->db->where($kondisi);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) 
			{
				foreach ($query->result_array() as $row) 
				{
					$hash 	= $row['password'];
					$id 	= $row['id'];
				}
				return array($id, password_verify($data['password'], $hash));
			} else
			{
				return false;
			}
	}

	public function store_session($session_data)
	{
		$this->db->insert('data_session', $session_data);
	}

	public function userLog($data)
	{
		$this->db->set(array(
			'id_user'		=> $data['id_user'],
			'aksi'			=> $data['aksi'],
			'jenis'			=> $data['jenis'],
			'id_kategori'	=> $data['id_kategori'],
			'nominal'		=> $data['nominal'],
			'keterangan'	=> $data['keterangan']));
		$this->db->insert('user_log');
	}

	public function verifyUserSaldo($id_user)
	{
		// $kondisi	= "id_user =" . "'" . $id_user ."'";
		$this->db->select('*');
		$this->db->from('saldo_user');
		$this->db->where('id_user', $id_user);
		$this->db->limit(1);

		$query		= $this->db->get();

		if ($query->result() != null)
		{
			return true;
		} else
		{
			return false;
		}
	}
	
	public function getUserBP($id_user)
	{
		$this->db->select('*');
		$this->db->from('budget_plan');
		$this->db->where('id_user', $id_user);

		$query = $this->db->get();

		return $query;
	}

	public function addKategoriBP($data)
	{
		$this->db->set(array(
			'id_user' 	=> $data['id_user'],
			'kategori'	=> $data['kategori']
			));
		$this->db->insert('budget_plan');
	}

	public function getUserProgress($id_user)
	{
		$this->db->select('
			budget_progress.target, 
			budget_progress.progress, 
			budget_progress.debit_kategori_id,
			budget_plan.kategori');
		$this->db->from('budget_progress');
		$this->db->join('budget_plan', 'budget_progress.budget_id = budget_plan.id AND 
			budget_progress.id_user AND budget_plan.id_user = '.$id_user);

		$query = $this->db->get();

		return $query;
	}

	public function editProgress($data)
	{
		$this->db->set(array(
			'target' 			=> $data['target'],
			'debit_kategori_id' => $data['id_saldo']
			));
		$this->db->where('id_user', $data['id_user']);
		$this->db->where('budget_id', $data['id_perencanaan']);
		$this->db->update('budget_progress');
	}

	// public function verif_session($get_session)
	// {
	// 	$kondisi = "username =" . "'" . $get_session . "'";
	// 	$this->db->select('logged_in')->from('data_session')->where($kondisi)->limit(1);
	// 	$query = $this->db->get();

	// 	if ($query->num_rows() == 1)
	// 	{
	// 		foreach ($query->result_array() as $row)
	// 		{
	// 			$status = $row['logged_in'];
	// 		}
	// 		return $status;
	// 	} else
	// 	{
	// 		return false;
	// 	}
	// }

	// public function del_session($get_session)
	// {
	// 	$kondisi = "username =" . "'" .$get_session ."'";
	// 	$this->db->delete('data_session', $kondisi);
	// }
}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */