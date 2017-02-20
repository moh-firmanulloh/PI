<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('user/Model_regist');
	}

	public function index()
	{
		if(is_logged_in())
		{
			redirect('site','refresh');
		} else
		{
			$data = array(
				'title'		=> 'Aturkeuanganku - Daftar',
				'konten'	=> 'daftar',
				'nama'		=> '',
				'email'		=> '',
				'username' 	=> '',
				);
			$this->load->view('template',$data);
		}
	}

	public function validasi_form()
	{
		if(is_logged_in())	
		{
			redirect('site','refresh');
		} else
		{
			$this->form_validation->set_error_delimiters('<div class="warning">', '</div>');
			$this->form_validation->set_rules(
				'name', 'Nama', 'trim|required|alpha_numeric|min_length[3]|max_length[30]', 
				array('required' => 'Kolom Nama harus diisi !')
				);

			$this->form_validation->set_rules(
				'email', 'Alamat Email', 'required|valid_emails|is_unique[daftar_user.email]',
				array('required' 	=> 'Kolom Email harus diisi !',
					  'is_unique'	=> 'Email ini telah terdaftar !',
					  'valid_email' => 'Email harus valid !')
				);
			$this->form_validation->set_rules(
				'username', 'Username', 'trim|required|alpha|min_length[3]|max_length[30]|is_unique[daftar_user.username]',
				array('required' => 'Kolom Username harus diisi !',
					  'is_unique'=> 'Username ini telah terdaftar !')
				);
			$this->form_validation->set_rules(
				'password', 'Password', 'trim|required',
				array('required' => 'Kolom Password harus diisi !')
				);
			$this->form_validation->set_rules(
				'confirm', 'Konfirmasi Password', 'trim|required|matches[password]',
				array('matches' => 'Password tidak sama !',
					'required' => 'Kolom Konfirmasi Password harus diisi !'
					)
				);

			
			if ($this->form_validation->run() == FALSE) 
			{
				$data = array(
					'nama' 		=> $this->input->post('name'),
					'email' 	=> $this->input->post('email'),
					'username'	=> $this->input->post('username'),
					'konten'=> 'daftar'
					);
				$this->load->view('template', $data);
			} else {
				$data['nama'] = $this->input->post('name');
				$data['email'] = $this->input->post('email');
				$data['username'] = strtolower($this->input->post('username'));
				$password = $this->input->post('password');
				$passwordhash = password_hash($password, PASSWORD_DEFAULT);
				$data['password'] = $passwordhash;
				$data['status'] = '0';
				$data['email_verif_code'] = sha1($data['username']);
				$dateFormat = '%Y-%m-%d %h';
				$expiredDate = strtotime('+1 day 7 hours');
				$data['expiredDate'] = mdate($dateFormat, $expiredDate);

				$this->Model_regist->registerTempUser($data);
				$this->Model_regist->sendEmailVerification($data);
				$data['konten'] = 'user/registerBerhasil';
				$this->load->view('template', $data);
			}
		}
	}

	public function verifikasiEmail($verificationCode=NULL)
	{
		$verificationCode=$this->uri->segment(3);
		$res = $this->Model_regist->verifyEmailAddress($verificationCode);
		if ($res == 1) 
		{
			$data['konten'] = 'user/verifikasiBerhasil';
			$this->load->view('template', $data);
		} else
		{
			redirect('site','refresh');
		}
	}
}

/* End of file daftar.php */
/* Location: ./application/controllers/daftar.php */