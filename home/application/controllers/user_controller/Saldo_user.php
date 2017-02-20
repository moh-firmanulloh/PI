<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Saldo_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('user/Model_user', 'user/Model_activity'));
	}

	public function addKategori()
	{
		if(is_logged_in())
		{
			$data['id_user']	= $this->session->userdata('id_user');
			$data['kategori']	= ucfirst(strtolower($this->input->post('kategori')));
			$data['nominal']	= '0';
			$this->Model_user->tambahUserKategori($data);
			redirect('user/atur-saldo');
		} else
		{
			redirect('','refresh');
		}
	}

	public function addNominalSaldo()
	{
		if(is_logged_in())
		{
			$data['id_user']		= $this->session->userdata('id_user');
			$data['id_kategori']	= $this->input->post('daftarKategori');
			$data['catatan'] 		= $this->input->post('catatan');
			$data['nominal']		= str_replace('.', '', $this->input->post('nominalSaldo'));
			$data['opsi']			= $this->input->post('potongSaldo');
			$data['opsiKategori']	= $this->input->post('potongKategori');
			$inputTanggal			= $this->input->post('tanggal');
			list($tanggal, $bulan, $tahun) 	= explode("/", $inputTanggal);
			$urut							= array(
													1	=> $tahun,
													2	=> $bulan,
													3	=> $tanggal);
			ksort($urut, SORT_NUMERIC);
			$data['tanggal']				= implode("-", $urut);
			$data['jenis'] 					= 'Pemasukan';
			if($data['id_kategori'] != '')
			{
				if($data['nominal'] != '')
				{
					if($data['opsi'] == 'ya')
					{
						$this->Model_user->tambahUserSaldoOpsiYa($data);
						$this->Model_activity->addPemasukan($data);
						redirect('user/atur-saldo','refresh');
					} elseif($data['opsi'] == 'tidak')
					{
						$this->Model_user->tambahUserSaldoOpsiTidak($data);
						$this->Model_activity->addPemasukan($data);
						redirect('user/atur-saldo','refresh');
					} else
					{
						redirect('user/atur-saldo','refresh');
					}
				} else
				{
					redirect('user/atur-saldo','refresh');
				}
			} else
			{
				redirect('user/atur-saldo','refresh');
			}
		} else
		{
			redirect('','refresh');
		}
	}

	public function deleteKategori()
	{
		if(is_logged_in())
		{
			$data['username']	= $this->session->userdata('username');
			$data['aksi']		= 'HAPUS';
			$data['jenis']		= 'Kategori';
			$data['keterangan'] = '';
			$data['nominal']	= '';
			$data['id_kategori'] 	= $this->input->post('deleteKategori');

			// $this->m_user->userLog($data);
			$this->Model_user->deleteUserKategori($data['id_kategori']);
			redirect('user/atur-saldo');
		} else
		{
			redirect('','refresh');
		}
	}

	public function editKategori()
	{
		if(is_logged_in())
		{
			$data['prevKategori'] = $this->input->post('prevKategori');
			$data['nextKategori'] = ucfirst(strtolower($this->input->post('nextKategori')));
			$data['nextNominal'] = str_replace('.', '', $this->input->post('nextNominal'));
			$this->Model_user->editUserKategori($data);
			redirect('user/atur-saldo');
		} else
		{
			redirect('','refresh');
		}
	}

	public function cekData()
	{
		if(is_logged_in())
		{
			$id_user	= $this->session->userdata('id_user');
			$res 		= $this->Model_user->verifyUserSaldo($id_user);

			if($res)
			{
				$query = $this->Model_user->getUserSaldo($id_user);
				return $query;
			} else
			{
				return false;
			}
		} else
		{
			redirect('','refresh');
		}
	}

	public function atur_saldo()
	{
		if(is_logged_in())
		{
			$data['title']		= 'Aturkeuanganku - Atur Saldo';
			$data['username']	= $this->session->userdata('username');
			$query = $this->cekData();
			if ($query != NULL)
			{
				$data['konten']		= 'user/saldoUser';
				$data['query']		= $query;
				$this->load->view('user_template', $data);
			} elseif ($query == NULL)
			{
				$data['konten']	= 'user/errors/noSaldo';
				$this->load->view('user_template', $data);
			}
		} else 
		{
			$data['konten'] = 'user/form_user';
			$this->load->view('template', $data);
		}
	}


}

/* End of file saldo_user.php */
/* Location: ./application/controllers/saldo_user.php */