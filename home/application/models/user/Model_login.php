<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

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

}

/* End of file Model_login.php */
/* Location: ./application/models/Model_login.php */