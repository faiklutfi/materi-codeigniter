<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function dashboard()
    {
        $this->load->view('employee/dashboard');
    }
    public function menu_absen()
    {
        $this->load->view('employee/menu_absen');
    }
    public function history()
    {
        $this->load->view('employee/history');
    }
    public function menu_izin()
    {
        $this->load->view('employee/menu_izin');
    }

    public function aksi_menu_absen()
    {
        if ($this->session->userdata('role') === 'employee') {
            $user_id = $this->session->userdata('id'); // Ambil id pengguna yang sedang login
            $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('employee/menu_absen');
            } else {

                date_default_timezone_set('Asia/Jakarta');
                $jam_masuk = date('H:i:s');

                $data = array(
                    'id_employee' => $user_id, // Tetapkan id_karyawan berdasarkan pengguna yang sedang login
                    'kegiatan' => $this->input->post('kegiatan'),
                    'tanggal' => date('Y-m-d'),
                    'jam_masuk' => $jam_masuk,
                    'status' => 'belum done'
                );

                // Menambahkan absensi dan mendapatkan ID data yang baru ditambahkan
                $new_absensi_id = $this->karyawan_model->addAbsensi($data);

                // Redirect ke halaman history_absen dengan membawa ID baru
                redirect('employee/history_absen/' . $new_absensi_id);
            }
        } else {
            redirect('other_page');
        }
    }

    public function aksi_menu_izin()
    {
        if ($this->session->userdata('role') === 'employee') {
            $user_id = $this->session->userdata('id');
            $this->form_validation->set_rules('keterangan', 'Keterangan Izin', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('employee/menu_izin');
            } else {
                $data = array(
                    'id_employee' => $user_id,
                    'keterangan' => $this->input->post('keterangan'), // Mengambil data dari form input
                );

                // Memanggil fungsi untuk menambahkan izin
                $this->karyawan_model->addIzin($data);

                // Redirect ke halaman history_absen
                redirect('employee/history_absen');
            }
        } else {
            redirect('other_page');
        }
    }



    public function pulang($absen_id)
    {
        if ($this->session->userdata('role') === 'employee') {
            $this->karyawan_model->setAbsensiPulang($absen_id);

            // Set pesan sukses
            $this->session->set_flashdata('success', 'Jam pulang berhasil diisi.');

            // Panggil fungsi JavaScript untuk menampilkan SweetAlert2
            echo '<script>showSweetAlert("Jam pulang berhasil diisi.");</script>';

            redirect('employee/history_absen');
        } else {
            redirect('other_page');
        }
    }
}
