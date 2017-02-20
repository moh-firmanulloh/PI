<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_budget extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	// public function getUserKategoriSaldo($id_user)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('saldo_user');
	// 	$this->db->where('id_user', $id_user);

	// 	$query = $this->db->get();

	// 	return $query;
	// }

	public function getUserBP($id_user)
	{
		$this->db->select('*');
		$this->db->from('budget_plan');
		$this->db->where('id_user', $id_user);
		$this->db->where('status', 0);

		$query = $this->db->get();

		return $query;
	}

	public function addKategoriBP($data)
	{
		$this->db->set(array(
							'kategori'	=> $data['kategori'],
							'target'	=> $data['target'],
							'progress'	=> $data['progress'],
							'tempo'		=> $data['tempo'],
							'id_saldo'	=> $data['id_saldo'],
							'id_user'	=> $data['id_user'],
							'status'	=> $data['status']
							));
		$this->db->insert('budget_plan');
	}

	public function getDetailBPbyID($id)
	{
		$this->db->select('budget_plan.kategori, budget_plan.target, budget_plan.progress, budget_plan.tempo, budget_plan.status,
			saldo_user.kategori AS kategori_saldo, 
			saldo_user.nominal');
		$this->db->from('budget_plan');
		$this->db->join('saldo_user', 'budget_plan.id_saldo = saldo_user.id AND budget_plan.id = '.$id);

		$query = $this->db->get();

		return $query->result();
	}

	public function getDoneBP($id)
	{
		$this->db->select('*');
		$this->db->from('budget_plan');
		$this->db->where('id_user', $id);
		$this->db->where('status', 1);
		$this->db->order_by('tempo', 'desc');

		$query = $this->db->get();

		return $query;
	}

	public function deleteBP($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('budget_plan');
	}

	public function doneBP($id)
	{
		$this->db->set('status', 1);
		$this->db->where('id', $id);
		$this->db->update('budget_plan');
	}

	// public function editProgress($data)
	// {
	// 	$this->db->set(array(
	// 		'target' 			=> $data['target'],
	// 		'debit_kategori_id' => $data['id_saldo']
	// 		));
	// 	$this->db->where('id_user', $data['id_user']);
	// 	$this->db->where('budget_id', $data['id_perencanaan']);
	// 	$this->db->update('budget_progress');
	// }

}

/* End of file Model_budget.php */
/* Location: ./application/models/Model_budget.php */