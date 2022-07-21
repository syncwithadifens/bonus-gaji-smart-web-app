<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{

		// CAN'T MOVE TO LOGIN PAGE IF ALREADY LOGGED IN
		if ($this->session->userdata('username'))
		{
			redirect ('user/carapenggunaan');
		}

		// VALIDATION RULES
		$this->form_validation->set_rules('username', 'Username', 'required|trim', [
			'required' => "Username can't be blank"
		]);

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'required' => "Password can't be blank",
			'min_length' => 'Password too short'
		]);

		// VALIDATION FAILED
		if ($this->form_validation->run() == false)
		{
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		}	// VALIDATION SUCCESSFUL
			else
			{
				$this->_login();
			}
	}

	// LOGIN METHOD (USED IF VALIDATION SUCCESSFUL)
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		// USERNAME IS VALID
		if ($user)
		{	// PASSWORD IS VALID
			if (password_verify($password, $user['password']))
			{
				$data = [
					'username' => $user['username']
				];
				
				$this->session->set_userdata($data);
				redirect('user/home');
			}	// PASSWORD IS INVALID
				else
				{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="exception">
				Password salah.
				</div>');
					redirect('auth');
				}
		}	// USERNAME IS INVALID
			else
			{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="exception">
			Username tidak terdaftar.
			</div>');
				redirect('auth');
			}
	}

	public function registration()
	{

		// CAN'T MOVE TO REGISTRATION PAGE IF ALREADY LOGGED IN
		if ($this->session->userdata('username'))
		{
			redirect('user');
		}

		// VALIDATION RULES
		$this->form_validation->set_rules('fullname', 'Full Name', 'required|trim', [
			'required' => "Full Name can't be blank"
		]);

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
			'required' => "Username can't be blank",
			'is_unique' => "Username has already been registered"
		]);

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'required' => "Password can't be blank",
			'matches' => "Password don't match",
			'min_length' => 'Password too short'
		]);

		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		// VALIDATION FAILED
		if ($this->form_validation->run() == false)
		{
			$data['title'] = 'User Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		}	// VALIDATION SUCCESSFUL
			else
			{
				$data = [
					'fullname' => htmlspecialchars($this->input->post('fullname', true)),
					'username' => htmlspecialchars($this->input->post('username', true)),
					'image' => 'default.png',
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'date_created' => time()
				];

			// INSERT TO DATABASE
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="exception">
			Akun berhasil dibuat. Silakan login.
			</div>');
			redirect('auth');
			}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="exception">
		Anda telah keluar.
		</div>');
		redirect('auth');
	}

}