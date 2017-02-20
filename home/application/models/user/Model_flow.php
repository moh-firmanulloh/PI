<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_flow extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkUserBP($id_user)
	{
		$this->db->select('*');
		$this->db->from('budget_plan');
		$this->db->where('id_user', $id_user);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->result() != NULL)
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
		$this->db->where('status', 0);

		$query = $this->db->get();

		return $query;
	}

	public function getPengeluaran($id_user)
	{
		$date = new DateTime("now");

 		$curr_date = $date->format('Y-m-d ');
		$this->db->select('*');
		$this->db->from('pengeluaran');
		$this->db->where('id_user', $id_user);
		$this->db->where('DATE(tanggal)', $curr_date);
		$query = $this->db->get();

		return $query;
	}

	public function addPengeluaran($data)
	{
		$this->db->set(array(
			'id_budget'	=> $data['id_budget'],
			'nominal'	=> $data['nominal'],
			'id_user'	=> $data['id_user'],
			'tanggal'	=> $data['tanggal'],
			'jenis'		=> "PENGELUARAN",
			'img_name'	=> $data['img_name'],
			'catatan'	=> $data['catatan']));
		$this->db->insert('pengeluaran');
		$this->addProgress($data);
	}

	public function addProgress($data)
	{
		$id_budget		= $data['id_budget'];
		$nominal		= $data['nominal'];

		$this->db->select('id_saldo, progress');
		$this->db->where('id', $id_budget);
		$this->db->limit(1);
		$query = $this->db->get('budget_plan');

		foreach ($query->result() as $row) 
		{
			$data['id_saldo']	= $row->id_saldo;
			$oldProgress = $row->progress;
		}

		$updateProgress	= $oldProgress + $nominal;

		$this->db->set('progress', $updateProgress);
		$this->db->where('id', $id_budget);
		$this->db->update('budget_plan');

		$this->potongSaldo($data);
	}

	public function potongSaldo($data)
	{
		$id_saldo		= $data['id_saldo'];
		$nominal		= $data['nominal'];

		$this->db->select('nominal');
		$this->db->where('id', $id_saldo);
		$this->db->limit(1);
		$query = $this->db->get('saldo_user');

		foreach ($query->result() as $row) 
		{
			$oldSaldo	= $row->nominal;
		}

		$updateSaldo = $oldSaldo - $nominal;

		$this->db->set('nominal', $updateSaldo);
		$this->db->where('id', $id_saldo);
		$this->db->update('saldo_user');
	}

}

/* End of file Model_flow.php */
/* Location: ./application/models/Model_flow.php */