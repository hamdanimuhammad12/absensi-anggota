<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Absen";
        $tanggal = date('Y-m-d');
        $data['hadir'] = $this->admin->getHadir();
        $this->template->load('templates/dashboard', 'report/data', $data);
    }


    public function cabang()
    {
        $data['title'] = "Absen";
        $tanggal = date('Y-m-d');
        $data['cabang'] = $this->admin->getCabang();
        $this->template->load('templates/dashboard', 'report/cabang', $data);
    }

    public function lepas()
    {
        $data['title'] = "Absen";
        $tanggal = date('Y-m-d');
        $data['lepas'] = $this->admin->getLepas();
        $this->template->load('templates/dashboard', 'report/lepas', $data);
    }

    public function izin()
    {
        $data['title'] = "Absen";
        $tanggal = date('Y-m-d');
        $data['izin'] = $this->admin->getIzin();
        $this->template->load('templates/dashboard', 'report/izin', $data);
    }
}
