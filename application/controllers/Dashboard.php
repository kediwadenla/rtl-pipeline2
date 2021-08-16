<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_pipeline_bisnis');
        $this->load->model('M_produk');
        $this->load->model('M_produk_kategori');
        $this->load->model('M_pipeline');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['result'] = $this->M_pipeline->result();
        // $data['produk_group'] = $this->M_produk_kategori->alldata();
        $data['record'] = $this->M_pipeline->tampil();
        // var_dump($data['result']);
        // die;
        $data['user'] = $this->db->get_where('tb_user', ['npp' => $this->session->userdata('npp')])->row_array();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('template/footer');
    }
}
