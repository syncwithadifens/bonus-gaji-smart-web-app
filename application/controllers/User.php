<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

	// CAN'T LOGIN IF NOT LOGGED IN
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		if (!$this->session->userdata('username'))
		{
			redirect('auth');
		}
	}

	public function home()
	{
		$data['title'] = 'Home';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['jmlAlt'] = $this->Home_model->jmlAlternatif();
		$data['jmlLayak'] = $this->Home_model->jmlLayak();
		$data['jmlTdkLayak'] = $this->Home_model->jmlTdkLayak();
		$data['jmlKriteria'] = $this->Home_model->jmlKriteria();
		$data['jmlSubKriteria'] = $this->Home_model->jmlSubKriteria();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/home', $data);
		$this->load->view('templates/footer', $data);
	}

	public function caraPenggunaan()
	{
		$data['title'] = 'Cara Penggunaan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/cara-penggunaan', $data);
		$this->load->view('templates/footer');
	}

	public function profil()
	{
		$data['title'] = 'Profil';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/profil', $data);
		$this->load->view('templates/footer');
	}

	public function editAkun()
	{
		$data['title'] = 'Edit Profil';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		
		$this->form_validation->set_rules('fullname','Full name', 'required|trim');

		if ($this->form_validation->run() == false)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit-akun', $data);
			$this->load->view('templates/footer');
		}	
			else
			{
				$fullname = $this->input->post('fullname');
				$username = $this->input->post('username');

				// IF THERE IS AN IMAGE
				$upload_image = $_FILES['image']['name'];

				if ($upload_image)
				{
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']      = '5048';
					$config['upload_path']   = './assets/img/profile/';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('image'))
					{
						$old_image = $data['user']['image'];
						if ($old_image != 'default.png')
						{
							unlink(FCPATH . 'assets/img/profile/' . $old_image);
						}

						$new_image = $this->upload->data('file_name');
						$this->db->set('image', $new_image);
					}
						else
						{
							echo $this->upload->display_errors();
						}
				}

				$this->db->set('fullname', $fullname);
				$this->db->where('username', $username);
				$this->db->update('user');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="exception">
				Profil berhasil diubah.
				</div>');
				redirect('user/profil');
			}
	}

	public function changePassword()
	{
		$data['title'] = 'Ubah Password';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Passwod', 'required|trim', [
			'required' => "Current Password harus diisi"
		]);

		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]', [
			'required' => "New Password harus diisi",
			'min_length' => "New Password harus terdiri dari 3 karakter"
		]);

		$this->form_validation->set_rules('new_password2', 'Repeat Password', 'required|trim|min_length[3]|matches[new_password1]', [
			'required' => "Repeat Password harus diisi",
			'min_length' => "Repeat Password harus terdiri dari 3 karakter"
		]);

		if ($this->form_validation->run() == false)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/change-password', $data);
			$this->load->view('templates/footer');
		}
			else
			{
				$current_password = $this->input->post('current_password');
				$new_password = $this->input->post('new_password1');

				if (!password_verify($current_password, $data['user']['password']))
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Current password is invalid.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>');
					redirect('user/changePassword');
				}
					else
					{
						if ($current_password == $new_password)
						{
							$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="exception">
							Current Password tidak boleh sama dengan New Password.
							</div>');
							redirect('user/changePassword');
						}
							else
							{
								$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

								$this->db->set('password', $password_hash);
								$this->db->where('username', $this->session->userdata('username'));
								$this->db->update('user');

								$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="exception">
							Password berhasil diubah.
							</div>');
									redirect('user/changePassword');
							}
					}

			}		
	}

}