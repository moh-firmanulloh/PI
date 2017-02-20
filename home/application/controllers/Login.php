<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/Model_login');
	}

	public function index()
	{
		if (is_logged_in())
		{
			redirect('site');
		} else
			$data['title']	= 'Aturkeuanganku - Login'; 
			$data['konten'] = 'user/form_user';
			$this->load->view('template', $data);
	}

	public function auth()
	{
		$data['title'] = 'Aturkeuanganku - Login';
		$password = $this->input->post('password');
		$passwordhash = password_hash($password, PASSWORD_DEFAULT);
		$data['username'] = strtolower(addslashes($this->input->post('username', TRUE)));
		$data['password'] = $password;

		// $res = $this->Model_login->antiDualLogin($data);
		// if ($res == 1)
		// {
			list($id, $result) = $this->Model_login->verifUserLogin($data);
			if ($result == 1)
			{
				$session_data = array(
				'username'			=> $data['username'],
				'logged_in'			=> '1',
				'id_user'			=> $id);
				$session_stat = $this->session->set_userdata($session_data);
				redirect('site');
			} else
			{
				$data['konten'] = 'user/errors/loginError';
				$this->load->view('template', $data);
			}
		// } else if ($res == $data['username'])
		// {
		// 	$data['konten'] = 'user/errors/dualLoginError';
		// 	$this->load->view('template', $data);
		// } 
	}

	public function logout()
	{
		$get_session = $this->session->userdata('username');
		$this->session->sess_destroy();
		redirect('site');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */