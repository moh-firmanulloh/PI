<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_activity extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function addPemasukan($data)
	{
		$this->db->set(array(
			'id_saldo' 	=> $data['id_kategori'],
			'nominal'	=> $data['nominal'],
			'id_user'	=> $data['id_user'],
			'jenis'		=> $data['jenis'],
			'tanggal'	=> $data['tanggal'],
			'catatan'	=> $data['catatan']));
		$this->db->insert('pemasukan');
	}

}

/* End of file Model_activity.php */
/* Location: ./application/models/Model_activity.php */