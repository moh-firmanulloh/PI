<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Debug extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/Model_budget');
	}

	public function index()
	{
		$this->load->view('debugging');
	}

	public function debugging()
	{
		$checkbox = explode("-", $this->input->post('cb'));
		$hasil = array();
		foreach ($checkbox as $cb) {
			$hasil[] = $cb;
		}
		$result = array(
			'kode' => $hasil[0],
			'pilihan' => $hasil[1],
			'nilai' => $hasil[2]);

		print_r($result);
		echo $result['kode'];
	}

}

/* End of file debug.php */
/* Location: ./application/controllers/debug.php */