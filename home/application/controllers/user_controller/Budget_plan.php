<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Budget_plan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('user/Model_budget', 'user/Model_user', 'user/Model_activity'));
	}

	public function cekData()
	{
		if(is_logged_in())
		{
			$id_user	= $this->session->userdata('id_user');
			$res 		= $this->Model_user->verifyUserSaldo($id_user);

			if($res)
			{
				return true;
			} else
			{
				return false;
			}
		}else
		{
			redirect('','refresh');
		}
	}

	public function cekSaldo()
	{
		if(is_logged_in())
		{
			$id_user	= $this->session->userdata('id_user');
			$query		= $this->Model_user->getUserSaldo($id_user);
			$saldo = 0;

			foreach ($query->result() as $row) 
			{
				$saldo = $saldo + $row->nominal;
			}

			return $saldo;
		}else
		{
			redirect('','refresh');
		}
	}

	public function cekBudgetPlan()
	{
		if(is_logged_in())
		{
			$id_user	= $this->session->userdata('id_user');
			$query		= $this->Model_budget->getUserBP($id_user);

			return $query;
		}else
		{
			redirect('','refresh');
		}
	}

	public function index()
	{
		if(is_logged_in())
		{
			$data['title']		= 'Aturkeuanganku - Perencanaan Keuangan';
			$data['id_user']	= $this->session->userdata('id_user');
			$data['username']	= $this->session->userdata('username');
			if($this->cekData())
			{
				$saldo = $this->cekSaldo();
				if($saldo > 0)
				{
					$isBudget = $this->cekBudgetPlan();
					if($isBudget->num_rows() != NULL)
					{
						$data['progress']	 = $this->cekBudgetPlan();
						$data['saldo']		 = $this->Model_user->getUserSaldo($data['id_user']);
						$data['konten']	= 'user/budgetBar';
						$this->load->view('user_template', $data);
					} else
					{
						$data['saldo']		= $this->Model_user->getUserSaldo($data['id_user']);
						$data['konten']		= 'user/setupBudgetPlan';
						$this->load->view('user_template', $data);
					}
						
				} else
				{
					$data['konten'] = 'user/errors/budgetNoSaldo';
					$this->load->view('user_template', $data);
				}
			} else
			{
				$data['konten'] = 'user/errors/budgetNoKategori';
				$this->load->view('user_template', $data);
			}
		} else
		{
			redirect('login','refresh');
		}
	}

	public function addKategori()
	{
		if (is_logged_in()) 
		{
			$data['id_user'] 	= $this->session->userdata('id_user');
			$data['kategori']	= ucfirst(strtolower($this->input->post('kategori')));
			$data['id_saldo']	= $this->input->post('kategoriSaldo');
			$data['target']		= $this->input->post('nominal');
			$inputTanggal			= $this->input->post('tanggal');
			list($tanggal, $bulan, $tahun) 	= explode("/", $inputTanggal);
			$urut							= array(
													1	=> $tahun,
													2	=> $bulan,
													3	=> $tanggal);
			ksort($urut, SORT_NUMERIC);
			$data['tempo']				= implode("-", $urut);
			$data['progress']			= 0;
			$data['status']				= 0;

			$this->Model_budget->addKategoriBP($data);

			redirect('budget/perencanaan-keuangan','refresh');
		}
	}

	// public function editKategori()
	// {
	// 	if($this->getSession())
	// 	{
	// 		list($data['id_saldo'], $nominal) = explode("-", $this->input->post('kategoriSaldo'));
	// 		$data['id_user']			= $this->session->userdata('id_user');
	// 		$data['id_perencanaan'] 	= $this->input->post('kategoriPerencanaan');
	// 		$data['target']				= $this->input->post('nominal');

	// 		$this->m_user->editProgress($data);

	// 		redirect('budget/perencanaan-keuangan','refresh');
	// 	}
	// }

	public function deleteBP()
	{
		$id	= $this->input->post('id');

		$this->Model_budget->deleteBP($id);

		redirect('budget/perencanaan-keuangan','refresh');
	}

	public function doneBP()
	{
		$id = $this->input->post('id');

		$this->Model_budget->doneBP($id);

		redirect('budget/perencanaan-keuangan','refresh');
	}

	public function getDetailBPbyId()
	{
		if(is_logged_in())
		{
			$id = $this->input->post('id');
			$query = $this->Model_budget->getDetailBPbyId($id);
			$this->output->set_content_type('application/json');

			echo json_encode($query);
		} else
		{
			redirect('login','refresh');
		}
		
	}

	public function getDoneBP()
	{
		if(is_logged_in())
		{
			$id 				= $this->session->userdata('id_user');
			$data['progress']	= $this->Model_budget->getDoneBP($id);
			$data				= $this->load->view('user/listDoneBP', $data, TRUE);

			echo $data;
		} else
		{
			redirect('login','refresh');
		}
		
	}

	public function getRunningBP()
	{
		if(is_logged_in())
		{
			$id 				= $this->session->userdata('id_user');
			$data['progress']	= $this->cekBudgetPlan($id);
			$data				= $this->load->view('user/listBP', $data, TRUE);

			echo $data;
		} else
		{
			redirect('login','refresh');
		}
		
	}

}

/* End of file Budget_plan.php */
/* Location: ./application/controllers/Budget_plan.php */