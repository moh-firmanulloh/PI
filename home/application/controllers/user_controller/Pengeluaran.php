<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/Model_flow');
	}

	public function cekData()
	{
		if(is_logged_in())
		{
			$id_user 	= $this->session->userdata('id_user');
			$res 		= $this->Model_flow->checkUserBP($id_user);

			if($res)
			{
				$query = $this->Model_flow->getUserBP($id_user);
				return $query;
			} else
			{
				return false;
			}
		}else
		{
			redirect('','refresh');
		}
	}

	public function getPengeluaran()
	{
		if(is_logged_in())
		{
			$id_user	= $this->session->userdata('id_user');
			$res 		= $this->Model_flow->getPengeluaran($id_user);

			if($res)
			{
				return $res;
			} else
			{
				return false;
			}
		}
	}

	public function outcome()
	{
		if(is_logged_in())
		{
			$data['title']		= 'Aturkeuanganku - Pengeluaran';
			$data['username']	= $this->session->userdata('username');
			$query = $this->cekData();
			if($query != NULL)
			{
				$res = $this->getPengeluaran();

				if($res)
				{
					$data['res']	= $res;
				} else
				{

				}
				$data['konten'] 	= 'user/pengeluaran';
				$data['query']		= $query;
				$this->load->view('user_template', $data);	
			} elseif ($query == NULL) 
			{
				$data['konten'] 	= 'user/errors/pengeluaranNoPlan';
				$this->load->view('user_template', $data);
			}
		} else
		{
			redirect('login','refresh');
		}
	}

	public function addPengeluaran()
	{
		$data['id_user']	= $this->session->userdata('id_user');
		$data['id_budget']	= $this->input->post('perencanaan');
		$data['nominal']	= implode("",explode(".",$this->input->post('nominalPengeluaran')));
		$data['opsi']		= $this->input->post('opsiGambar');
		$inputTanggal		= $this->input->post('tanggal');
		list($tanggal, $bulan, $tahun) 	= explode("/", $inputTanggal);
		$urut							= array(
												1	=> $tahun,
												2	=> $bulan,
												3	=> $tanggal);
		ksort($urut, SORT_NUMERIC);
		$data['tanggal']				= implode("-", $urut);
		$data['catatan']	= $this->input->post('catatan');

		if($data['opsi'] == 'ya')
		{
			$config['upload_path'] 		= './uploads/';
			$config['allowed_types'] 	= 'jpg|png|jpeg|JPG|JPEG';
			$config['encrypt_name']		= TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar');
			$data['img_name']	= $this->upload->data('file_name');

			$this->Model_flow->addPengeluaran($data);

			redirect('flow/pengeluaran','refresh');
		}elseif ($data['opsi'] == 'tidak') 
		{
			$data['img_name']	= NULL;
			$this->Model_flow->addPengeluaran($data);

			redirect('flow/pengeluaran','refresh');
		}
	}

}

/* End of file Pengeluaran.php */
/* Location: ./application/controllers/Pengeluaran.php */