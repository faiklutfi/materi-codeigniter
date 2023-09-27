<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_model');
		$this->load->helper('my_helper');
	}

	public function index()
	{
		$data['user'] = $this->m_model->get_by_id('admin', 'id', $this->session->userdata('id'))->result();
		$this->load->view('account/profile', $data);
	}

	public function aksi_ubah_akun()
	{
		$password_baru = $this->input->post('password_baru');
		$konfirmasi_password = $this->input->post('konfirmasi_password');
		$email = $this->input->post('email');
		$username = $this->input->post('username');

		$data = array(
			'email' => $email,
			'username' => $username
		);

		if (!empty($password_baru)) {
			if ($password_baru === $konfirmasi_password) {
				$data['password'] = md5($password_baru);
			} else {
				$this->session->set_flashdata('message', 'Password baru dan Konfirmasi password tidak sama');
				redirect(base_url('account'));
			}
		}

		$this->session->set_userdata($data);
		$update_result = $this->m_model->ubah_data('admin', $data, array('id' => $this->session->userdata('id')));

		if ($update_result) {
			redirect(base_url('account'));
		} else {
			redirect(base_url('account'));
		}
	}
}
?>