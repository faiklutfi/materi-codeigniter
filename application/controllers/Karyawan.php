<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('karyawan_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('upload');
    }

    public function index()
    {
        if ($this->session->userdata('role') === 'karyawan') {
            // Di dalam controller Karyawan.php
            $data['absensi'] = $this->karyawan_model->get_data('absensi')->result();
            $this->load->view('karyawan/dashboard', $data);
        } else {
            redirect('other_page');
        }
    }

    public function history_absen()
    {
        if ($this->session->userdata('role') === 'karyawan') {
            // Set zona waktu ke 'Asia/Jakarta'
            date_default_timezone_set('Asia/Jakarta');

            $data['absensi'] = $this->karyawan_model->get_data('absensi')->result();
            $this->load->view('karyawan/history_absen', $data);
        } else {
            redirect('other_page');
        }
    }

    public function menu_absen()
    {
        if ($this->session->userdata('role') === 'karyawan') {
            $user_id = $this->session->userdata('id'); // Ambil id pengguna yang sedang login
            $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('karyawan/menu_absen');
            } else {
                date_default_timezone_set('Asia/Jakarta');
                $jam_masuk = date('H:i:s');

                $data = array(
                    'id_karyawan' => $user_id, // Tetapkan id_karyawan berdasarkan pengguna yang sedang login
                    'kegiatan' => $this->input->post('kegiatan'),
                    'tanggal' => date('Y-m-d'),
                    'jam_masuk' => $jam_masuk,
                    'status' => 'belum done',
                    'keterangan_izin' => '-'
                );

                // Menambahkan absensi dan mendapatkan ID data yang baru ditambahkan
                $new_absensi_id = $this->karyawan_model->addAbsensi($data);

                // Redirect ke halaman history_absen dengan membawa ID baru
                redirect('karyawan/history_absen/' . $new_absensi_id);
            }
        } else {
            redirect('other_page');
        }
    }

    public function menu_izin()
    {
        if ($this->session->userdata('role') === 'karyawan') {
            $user_id = $this->session->userdata('id');
            $this->form_validation->set_rules('keterangan', 'Keterangan Izin', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('karyawan/menu_izin');
            } else {
                $data = array(
                    'id_karyawan' => $user_id,
                    'keterangan' => $this->input->post('keterangan'), // Mengambil data dari form input
                );

                // Memanggil fungsi untuk menambahkan izin
                $this->karyawan_model->addIzin($data);

                // Redirect ke halaman history_absen
                redirect('karyawan/history_absen');
            }
        } else {
            redirect('other_page');
        }
    }

    public function pulang($absen_id)
    {
        if ($this->session->userdata('role') === 'karyawan') {
            $this->karyawan_model->setAbsensiPulang($absen_id);

            // Set pesan sukses
            $this->session->set_flashdata('success', 'Jam pulang berhasil diisi.');

            // Panggil fungsi JavaScript untuk menampilkan SweetAlert2
            echo '<script>showSweetAlert("Jam pulang berhasil diisi.");</script>';

            redirect('karyawan/history_absen');
        } else {
            redirect('other_page');
        }
    }

    public function ubah_absensi($absen_id)
    {
        if ($this->session->userdata('role') === 'karyawan') {
            // Mengambil data absensi berdasarkan ID yang diberikan
            $absensi = $this->karyawan_model->getAbsensiById($absen_id);

            // Periksa apakah data absensi ditemukan
            if ($absensi) {
                // Mengecek apakah pengguna mengirimkan formulir perubahan
                if ($this->input->post()) {
                    // Lakukan validasi terhadap input
                    $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');
                    $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
                    $this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required');

                    if ($this->form_validation->run() === TRUE) {
                        // Dapatkan data input pengguna
                        $kegiatan = $this->input->post('kegiatan');
                        $jam_masuk = $this->input->post('jam_masuk');
                        $tanggal = $this->input->post('tanggal');

                        // Lakukan pembaruan data absensi
                        $data = array(
                            'kegiatan' => $kegiatan,
                            'jam_masuk' => $jam_masuk,
                            'tanggal' => $tanggal
                        );

                        $this->karyawan_model->updateAbsensi($absen_id, $data);

                        // Set pesan sukses
                        $this->session->set_flashdata('success', 'Data absensi berhasil diubah.');

                        // Redirect kembali ke halaman riwayat absen
                        redirect('karyawan/history_absen');
                    }
                }

                $data['absensi'] = $absensi;
                $data['absen_id'] = $absen_id;
                $this->load->view('karyawan/ubah_absensi', $data);
            } else {
                // Data absensi tidak ditemukan, tampilkan pesan error
                show_error('Data absensi tidak ditemukan.', 404, 'Data Tidak Ditemukan');
            }
        } else {
            // Pengguna bukan karyawan, redirect ke halaman lain
            redirect('other_page');
        }
    }

    public function batal_pulang($absen_id)
    {
        if ($this->session->userdata('role') === 'karyawan') {
            $this->karyawan_model->batalPulang($absen_id);

            // Set pesan sukses
            $this->session->set_flashdata('success', 'Batal Pulang berhasil.');

            // Redirect kembali ke halaman riwayat absen
            redirect('karyawan/history_absen');
        } else {
            redirect('other_page');
        }
    }

    public function hapus($absen_id)
    {
        if ($this->session->userdata('role') === 'karyawan') {
            $this->karyawan_model->hapusAbsensi($absen_id);
            redirect('karyawan/history_absen');
        } else {
            redirect('other_page');
        }
    }

    public function profile()
    {
        $data['user'] = $this->karyawan_model->get_by_id('user', 'id', $this->session->userdata('id'));
        $this->load->view('karyawan/profile', $data);
    }

    public function upload_image($field_name)
    {
        $config['upload_path'] = './images/karyawan/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 30000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($field_name)) {
            $error = array('error' => $this->upload->display_errors());
            return array(false, $error);
        } else {
            $data = $this->upload->data();
            $file_name = $data['file_name'];
            return array(true, $file_name);
        }
    }


    public function aksi_ubah_akun()
    {
        $image = $this->upload_image('foto');
        if ($image[0] == false) {
            $password_baru = $this->input->post('password_baru');
            $konfirmasi_password = $this->input->post('konfirmasi_password');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $data = [
                'image' => 'User.png', // Ganti 'foto' menjadi 'image'
                'email' => $email,
                'username' => $username,
                'first_name' => $first_name,
                'last_name' => $last_name,
            ];


            if (!empty($password_baru)) {
                if ($password_baru === $konfirmasi_password) {
                    $data['password'] = md5($password_baru);
                } else {
                    $this->session->set_flashdata('message', 'Password baru dan Konfirmasi password harus sama');
                    redirect(base_url('karyawan/profile'));
                }
            }
            $this->session->set_userdata($data);
            $update_result = $this->karyawan_model->update('user', $data, ['id' => $this->session->userdata('id')]);

            if ($update_result) {
                redirect(base_url('karyawan/profile'));
            } else {
                redirect(base_url('karyawan/profile'));
            }
        } else {
            $password_baru = $this->input->post('password_baru');
            $konfirmasi_password = $this->input->post('konfirmasi_password');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $data = [
                'foto' => $image[1],
                'email' => $email,
                'username' => $username,
                'first_name' => $first_name,
                'last_name' => $last_name,
            ];
            if (!empty($password_baru)) {
                if ($password_baru === konfirmasi_password) {
                    $data['password'] = md5($password_baru);
                } else {
                    $this->session->set_flashdata('message', 'Password baru dan Konfirmasi password harus sama');
                    redirect(base_url('karyawan/profile'));
                }
            }
            $this->session->set_userdata($data);
            $update_result = $this->karyawan_model->update('user', $data, ['id' => $this->session->userdata('id')]);

            if ($update_result) {
                redirect(base_url('karyawan/profile'));
            } else {
                redirect(base_url('karyawan/profile'));
            }
        }
    }

    public function import_karyawan()
    {
        if (isset($_FILES["file"]["name"])) {
            // Pastikan file yang diunggah adalah file Excel
            $allowedFileTypes = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
            if (in_array($_FILES["file"]["type"], $allowedFileTypes)) {
                // Path file yang diunggah
                $path = $_FILES["file"]["tmp_name"];

                // Load file Excel menggunakan PhpSpreadsheet
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
                $worksheet = $spreadsheet->getActiveSheet();

                // Loop melalui data di file Excel dan masukkan ke dalam database
                foreach ($worksheet->getRowIterator(2) as $row) {
                    $namaKaryawan = $worksheet->getCellByColumnAndRow(2, $row->getRowIndex())->getValue();
                    $kegiatan = $worksheet->getCellByColumnAndRow(3, $row->getRowIndex())->getValue();
                    $tanggal = $worksheet->getCellByColumnAndRow(4, $row->getRowIndex())->getValue();
                    $jamMasuk = $worksheet->getCellByColumnAndRow(5, $row->getRowIndex())->getValue();
                    $jamPulang = $worksheet->getCellByColumnAndRow(6, $row->getRowIndex())->getValue();
                    $status = $worksheet->getCellByColumnAndRow(7, $row->getRowIndex())->getValue();

                    // Simpan data ke dalam database, sesuaikan dengan struktur tabel Anda
                    $data = [
                        'kegiatan' => $kegiatan,
                        'tanggal' => $tanggal,
                        'jam_masuk' => $jam_masuk,
                        'jam_pulang' => $jam_pulang,
                        'status' => $status,
                    ];

                    $this->karyawan_model->tambah_data('absensi', $data);
                }

                // Redirect ke halaman yang sesuai setelah import selesai
                redirect(base_url('karyawan/history_absen'));
            } else {
                echo 'Tipe file tidak didukung.';
            }
        } else {
            echo 'File tidak diunggah.';
        }
    }
}
