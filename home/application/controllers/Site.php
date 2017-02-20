<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	// UNTUK PI
	// public function index()
	// {
	// 	$data['konten'] = 'konten';
	// 	$this->load->view('template', $data);
	// }

	public function index()
	{		
		if(is_logged_in())
		{
			$data['title']	= 'Aturkeuanganku - Home';
			$data['konten'] = '';
			$data['username'] = $this->session->userdata('username');
			$this->load->view('user_template', $data);
		} else
		{
			$data['title']  = 'Aturkeuanganku - Atur perencanaan keuangan Anda';
			$data['konten'] = 'home';
			$this->load->view('template', $data);
		}
	}

	// AKHIR UNTUK PI

	// UNTUK PWEB

	

	// AKHIR UNTUK PWEB
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */