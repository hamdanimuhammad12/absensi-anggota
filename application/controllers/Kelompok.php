<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelompok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        if (is_apel()) {
            redirect('dashboard');
        }

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Absen";
        $tanggal = date('Y-m-d');
        $data['jadwal'] = $this->admin->getJadwal();
        $data['status'] = $this->admin->get('status_absen');
        $data['anggota'] = $this->admin->getAnggota();
        $this->template->load('templates/dashboard', 'kelompok/data', $data);
    }

    public function simpan_ke_database() {
        $data = $this->input->post('data_table');
        if (!empty($data)) {
            foreach ($data as $row) {
                $this->admin->simpan_data($row);
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'Tidak ada data yang diterima.'));
        }
    }


    

}
