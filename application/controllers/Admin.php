<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('upload');
        if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'admin') {
            redirect(base_url() . 'auth');
        }
    }

    public function index()
    {
        $this->load->view('admin/index');
    }

    public function siswa()
    {
        $data['siswa'] = $this->m_model->get_data('siswa')->result();
        $this->load->view('admin/siswa', $data);
    }

    public function tambah_siswa()
    {
        $data['kelas'] = $this->m_model->get_data('kelas')->result();
        $this->load->view('admin/tambah_siswa', $data);
    }

    public function aksi_tambah_siswa()
    {
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
    public function ubah_siswa($id)
    {
        $data['siswa'] = $this->m_model->get_by_id('siswa', 'id_siswa', $id)->result();
        $data['kelas'] = $this->m_model->get_data('kelas')->result();
        $this->load->view('admin/ubah_siswa', $data);
    }
    public function aksi_ubah_siswa()
    {
        $data = array(
            'nama_siswa' => $this->input->post('nama'),
            'nisn' => $this->input->post('nisn'),
            'gender' => $this->input->post('gender'),
            'id_kelas' => $this->input->post('id_kelas'),
        );
        $eksekusi = $this->m_model->ubah_data('siswa', $data, array('id_siswa' => $this->input->post('id_siswa')));
        if ($eksekusi) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('admin/siswa'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('admin/siswa/ubah_siswa/' . $this->input->post('id_siswa')));
        }
    }

    // Upload Image
    public function upload_img($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './images/siswa/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '30000';
        $config['file_name'] = $kode;
        $this->upload->initialize($config);
        if ($this->upload->do_upload($value)) {
            return array(false, '');
        } else {
            $fn = $this->upload->data();
            $nama = $fn['file_name'];
            return array(true, $nama);
        }
    }

    public function update_siswa($id)
    {
        $data['siswa'] = $this->m_model->get_by_id('siswa', 'id_siswa', $id)->result();
        $data['kelas'] = $this->m_model->get_data('kelas')->result();
        $this->load->view('admin/update_siswa', $data);
    }

    public function aksi_update_siswa()
    {
        $data = array(
            'nama_siswa' => $this->input->post('nama'),
            'nisn' => $this->input->post('nisn'),
            'gender' => $this->input->post('gender'),
            'id_kelas' => $this->input->post('id_kelas'),
        );
        $eksekusi = $this->m_model->update_data('siswa', $data, array('id_siswa' => $this->input->post('id_siswa')));
        if ($eksekusi) {
            redirect(base_url('admin/siswa'));
        } else {
            redirect(base_url('admin/update_siswa/' . $this->input->post('id_siswa')));
        }
    }
    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $style_col = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            ]
        ];
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            ]
        ];

        $sheet->setCellValue('A1', "DATA SISWA");
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);

        $sheet->setCellValue('A3', "ID");
        $sheet->setCellValue('B3', "FOTO SISWA");
        $sheet->setCellValue('C3', "NAMA SISWA");
        $sheet->setCellValue('D3', "NISN");
        $sheet->setCellValue('E3', "GENDER");
        $sheet->setCellValue('F3', "KELAS");

        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        $sheet->getStyle('F3')->applyFromArray($style_col);


        $data = $this->m_model->get_data_siswa();

        $no = 1;
        $numrow = 4;
        foreach ($data as $data) {

            $sheet->setCellValue('A' . $numrow, $data->id_siswa);
            $sheet->setCellValue('B' . $numrow, $data->foto);
            $sheet->setCellValue('C' . $numrow, $data->nama_siswa);
            $sheet->setCellValue('D' . $numrow, $data->nisn);
            $sheet->setCellValue('E' . $numrow, $data->gender);
            $sheet->setCellValue('F' . $numrow, $data->tingkat_kelas . '' . $data->jurusan_kelas);

            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);

            $no++;
            $numrow++;
        }

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(30);
        // $sheet->getColumnDimension('F')->setWidth(35); 


        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        $sheet->SetTitle("LAPORAN DATA SISWA");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="SISWA.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
    public function import()
    {
        if (isset($_FILES['file']['name'])) {
            $allowedFileType = [
                'application/vnd.ms-excel',
                'text/xls',
                'text/xlsx',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ];
            if (in_array($_FILES['file']['type'], $allowedFileType)) {
                $path = $_FILES['file']['tmp_name'];
                $object = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);

                foreach ($object->getWorksheetIterator() as $worksheet) {
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
                    for ($row = 2; $row <= $highestRow; $row++) {
                        $nama_siswa = $worksheet
                            ->getCellByColumnAndRow(2, $row)
                            ->getValue();
                        $nisn = $worksheet
                            ->getCellByColumnAndRow(3, $row)
                            ->getValue();
                        $gender = $worksheet
                            ->getCellByColumnAndRow(4, $row)
                            ->getValue();
                        $kelas = $worksheet
                            ->getCellByColumnAndRow(5, $row)
                            ->getValue();

                        // Pisahkan nilai 'kelas' menjadi 'tingkat_kelas' dan 'jurusan_kelas' berdasarkan spasi
                        list($tingkat_kelas, $jurusan_kelas) = explode(
                            ' ',
                            $kelas,
                            2
                        );

                        // Panggil fungsi untuk mendapatkan id_kelas berdasarkan 'tingkat_kelas' dan 'jurusan_kelas'
                        $id_kelas = $this->m_model->getKelasByTingkatJurusan(
                            $tingkat_kelas,
                            $jurusan_kelas
                        );

                        if ($id_kelas) {
                            $data = [
                                'nama_siswa' => $nama_siswa,
                                'nisn' => $nisn,
                                'gender' => $gender,
                                'id_kelas' => $id_kelas,
                            ];

                            $this->m_model->tambah_data('siswa', $data);
                        } else {
                            // Handle jika id_kelas tidak ditemukan
                        }
                    }
                }

                redirect(base_url('admin/siswa'));
            } else {
                echo 'Tipe file tidak didukung.';
            }
        } else {
            echo 'File tidak diunggah.';
        }
    }

    public function hapus_siswa($id)
    {
        $this->m_model->delete('siswa', 'id_siswa', $id);
        redirect(base_url('admin/siswa'));
    }
    public function export_guru()
    {
        $data['data_guru'] = $this->m_model->get_data('guru')->result();
        $data['nama'] = 'guru';
        if ($this->uri->segment(3) == "pdf") {
            $this->load->library('pdf');
            $this->pdf->load_view('admin/export_data_guru', $data);
            $this->pdf->render();
            $this->pdf->stream("data_guru.pdf", array("Attachment" => false));
        }
    }
}
