<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function verifyUserSaldo($id_user)
	{
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

	public function getUserSaldo($id_user)
	{
		$this->db->select('*');
		$this->db->from('saldo_user');
		$this->db->where('id_user', $id_user);
		$query		= $this->db->get();

		return $query;
	}

	public function tambahUserKategori($data)
	{
		$this->db->set(array(
			'id_user'	=> $data['id_user'],
			'kategori'	=> $data['kategori'],
			'nominal'	=> $data['nominal']));
		$this->db->insert('saldo_user');
	}

	public function tambahUserSaldoOpsiTidak($data)
	{
		$this->db->select('*');
		$this->db->from('saldo_user');
		$this->db->where('id_user', $data['id_user']);
		$this->db->where('id', $data['id_kategori']);
		$this->db->limit(1);

		$query		= $this->db->get();

		if($query)
		{
			foreach ($query->result_array() as $row) 
			{
				$saldo = $row['nominal'];
			}

			$saldoBaru = $saldo + $data['nominal'];

			$this->db->set(array('nominal'	=> $saldoBaru));
			$this->db->where('id_user', $data['id_user']);
			$this->db->where('id', $data['id_kategori']);
			$this->db->update('saldo_user');
		}
	}

	public function tambahUserSaldoOpsiYa($data)
	{
		$nominal 		= $data['nominal'];
		$this->db->select('*');
		$this->db->from('saldo_user');
		$this->db->where('id_user', $data['id_user']);
		$this->db->where('id', $data['id_kategori']);
		$this->db->limit(1);

		$query	= $this->db->get();
		if($query)
		{
			foreach ($query->result() as $row) 
			{
				$saldo = $row->nominal;
			}

			$saldoBaru = $saldo + $nominal;

			$this->db->set(array('nominal'	=> $saldoBaru));
			$this->db->where('id_user', $data['id_user']);
			$this->db->where('id', $data['id_kategori']);
			$this->db->update('saldo_user');

			$this->potongUserSaldo($data);
		}
	}

	public function potongUserSaldo($data)
	{
		$nominal 		= $data['nominal'];

		$this->db->select('*');
		$this->db->from('saldo_user');
		$this->db->where('id_user', $data['id_user']);
		$this->db->where('id', $data['opsiKategori']);
		$this->db->limit(1);

		$query	= $this->db->get();

		$saldoOpsi = 0;

		foreach ($query->result_array() as $row) 
		{
			$saldoOpsi = $row['nominal'];
		}

		$potongSaldo = $saldoOpsi - $nominal;

		$this->db->set(array('nominal'	=> $potongSaldo));
		$this->db->where('id_user', $data['id_user']);
		$this->db->where('id', $data['opsiKategori']);
		$this->db->update('saldo_user');
	}

		public function deleteUserKategori($data)
	{
			$this->db->where('id', $data);
			$this->db->delete('saldo_user');
	}

	public function editUserKategori($data)
	{
			$this->db->where('id', $data['prevKategori']);
			$this->db->set(array(
				'kategori' => $data['nextKategori'],
				'nominal' => $data['nextNominal']));
			$this->db->update('saldo_user');
	}
}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */