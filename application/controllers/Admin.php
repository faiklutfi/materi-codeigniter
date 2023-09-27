<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_model');
		$this->load->helper('my_helper');
        $this->load->library('upload');
        if($this->session->userdata('logged_in')!=true) {
            redirect(base_url().'auth');
        }
	}

	public function index()
	{
		$this->load->view('admin/index');
	}

    public function siswa() {
        $data['siswa'] = $this->m_model->get_data('siswa')->result();
        $this->load->view('admin/siswa', $data);
    }

    public function tambah_siswa() {
        $data['kelas'] = $this->m_model->get_data('kelas')->result();
        $this->load->view('admin/tambah_siswa', $data);
    }

    public function aksi_tambah_siswa() {
        $foto = $this->upload_img('foto');
        if ($foto[0] === false) {
            $data = [
                'foto' => 'User.png',
                'nama_siswa' => $this->input->post('nama'),
                'nisn' => $this->input->post('nisn'),
                'gender' => $this->input->post('gender'),
                'id_kelas' => $this->input->post('id_kelas'),
            ];
            $this->m_model->tambah_data('siswa', $data);
            redirect(base_url('admin/siswa'));
        } else {
            $data = [
                'foto' => $foto[1],
                'nama_siswa' => $this->input->post('nama'),
                'nisn' => $this->input->post('nisn'),
                'gender' => $this->input->post('gender'),
                'id_kelas' => $this->input->post('id_kelas'),
            ];
            $this->m_model->tambah_data('siswa', $data);
            redirect(base_url('admin/siswa'));
        }
    }

    // Upload Image
    public function upload_img($value)
    {
        $kode = round(microtime(true) * 1000);
        $config[ 'upload_path'] = './images/siswa/'; 
        $config[ 'allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '30000';
        $config['file_name'] = $kode;
        $this->upload->initialize($config);
        if ($this->upload->do_upload($value)) {
            return array( false, '' );
        } else {
            $fn = $this->upload->data();
            $nama = $fn['file_name'];
            return array( true, $nama );
        }
    }

    public function update_siswa($id){
        $data['siswa']=$this->m_model->get_by_id('siswa', 'id_siswa', $id)->result();
        $data['kelas']=$this->m_model->get_data('kelas')->result();
        $this->load->view('admin/update_siswa', $data);
    }

    public function aksi_update_siswa()
    {
        $data = array (
            'nama_siswa' => $this->input->post('nama'),
            'nisn' => $this->input->post('nisn'),
            'gender' => $this->input->post('gender'),
            'id_kelas' => $this->input->post('id_kelas'),
        );
        $eksekusi=$this->m_model->update_data
        ('siswa', $data, array('id_siswa'=>$this->input->post('id_siswa')));
        if($eksekusi)
        {
            redirect(base_url('admin/siswa'));
        }
        else
        {
            redirect(base_url('admin/update_siswa/'.$this->input->post('id_siswa')));
        }
    }

    public function hapus_siswa($id) {
        $this->m_model->delete('siswa', 'id_siswa', $id);
		redirect(base_url('admin/siswa'));
    }
}
?>