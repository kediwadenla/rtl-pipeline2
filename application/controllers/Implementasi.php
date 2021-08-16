<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Implementasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('GetData');
        $this->load->model('M_counterpart');
        $this->load->model('M_sektor_industri');
        $this->load->model('M_wilayah');
        $this->load->model('M_cabang');
        $this->load->model('M_produk');
        $this->load->model('M_implementasi');
        $this->load->model('M_pipeline_bisnis');
        $this->load->model('M_progress_status');
        $this->load->model('M_progress_status_implementasi');
        $this->load->model('M_log_pipeline_bisnis');
        $this->load->model('M_log_pipeline_implementasi');
    }

    public function index()
    {
        $data['title'] = 'My List';
        $data['list'] = $this->M_implementasi->pipeline();
        $data['user'] = $this->db->get_where('tb_user', ['npp' => $this->session->userdata('npp')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('implementasi/index', $data);
        $this->load->view('template/footer');
    }

    public function list_pending()
    {
        $data['title'] = 'List Pending';
        $data['list'] = $this->M_implementasi->listpending();
        $data['user'] = $this->db->get_where('tb_user', ['npp' => $this->session->userdata('npp')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('implementasi/list-pending', $data);
        $this->load->view('template/footer');
    }

    public function detail($id)
    {
        $data['detail'] = $this->M_implementasi->detailpipeline($id);
        $data['log'] = $this->M_log_pipeline_implementasi->log($id);
        $data['status'] = $this->M_progress_status_implementasi->byProductCategory($id);
        $data['title'] = 'My List';
        $data['subtitle'] = 'Detail';
        $data['user'] = $this->db->get_where('tb_user', ['npp' => $this->session->userdata('npp')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('implementasi/detail', $data);
        $this->load->view('template/footer');
    }

    public function detail_pending($id)
    {
        $data['detail'] = $this->M_implementasi->alldata($id);
        $data['title'] = 'List Pending';
        $data['subtitle'] = 'Detail Pending';
        $data['user'] = $this->db->get_where('tb_user', ['npp' => $this->session->userdata('npp')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('implementasi/detail-pending', $data);
        $this->load->view('template/footer');
    }

    public function get_pipeline($id)
    {
        $id = $id;
        $npp = $this->session->userdata('npp');
        $this->db->set('id_user', $npp);
        $this->db->set('status', "New");
        $this->db->where('id_pipeline', $id);
        $this->db->update('tb_pipeline_implementasi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pipeline berhasil di pilih.</div>');
        redirect('implementasi/list_pending');
    }

    public function update()
    {

        $this->form_validation->set_rules('note', 'Note', 'required|trim');

        $id_pipeline = $this->input->post('id');
        $progress_status = $this->input->post('progress_status');
        $newnote = $this->input->post('note');
        $status = "Update";
        $this->db->select('*');
        $this->db->where('id_pipeline', $id_pipeline);
        $note = $this->db->get('tb_pipeline_implementasi')->row_array();
        $oldnote = $note['note'];

        if ($this->form_validation->run() == false) {
            redirect('implementasi/detail/' . $id_pipeline);
        } else {
            if ($progress_status == $note['id_progress_status_implementasi'] and $newnote == $oldnote) {
                redirect('implementasi/detail/' . $id_pipeline);
            } else {

                $this->db->query("UPDATE tb_pipeline_implementasi SET 
                    `id_progress_status_implementasi` = '$progress_status',
                    `note` = '$newnote',
                    `status` = '$status'
                    WHERE `id_pipeline` = '$id_pipeline'");
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! pipeline has been updated.</div>');
                redirect('implementasi/detail/' . $id_pipeline);
            }
        }
    }
}
