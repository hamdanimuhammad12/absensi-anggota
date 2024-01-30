<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['absenHadir'] = $this->admin->countHadir('absen');
        $data['absenCadang'] = $this->admin->countCadang('absen');
        $data['absenLepas'] = $this->admin->countLepas('absen');
        $data['absenIzin'] = $this->admin->countIzin('absen');
        $this->template->load('templates/dashboard', 'dashboard', $data);
    }
}
