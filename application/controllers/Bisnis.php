<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bisnis extends CI_Controller
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
        $this->load->model('M_pipeline_bisnis');
        $this->load->model('M_progress_status');
        $this->load->model('M_log_pipeline_bisnis');
    }

    public function index()
    {
        // $tes  = $this->input->post('expect_balance');
        // $rupiah = preg_replace('/[Rp. ]/', '', $tes);
        // var_dump($rupiah);
        // die;
        $this->form_validation->set_rules('nama_entity', 'Nama Entity', 'required|trim');
        $this->form_validation->set_rules('nama_pic', 'Nama PIC', 'required|trim');
        $this->form_validation->set_rules('phone_pic', 'Phone PIC', 'required|trim');
        $this->form_validation->set_rules('email_pic', 'Email PIC', 'required|trim|valid_email');
        $this->form_validation->set_rules('expect_balance', 'Expect Balance', 'required|trim');
        $this->form_validation->set_rules('expect_transaction', 'Expect Transaction', 'required|trim');
        $this->form_validation->set_rules('expect_sv', 'Expect SV', 'required|trim');
        $this->form_validation->set_rules('expect_fee', 'Expect Fee', 'required|trim');
        $this->form_validation->set_rules('counterpart', 'Counterpart', 'required|trim');
        $this->form_validation->set_rules('sektor_industri', 'Sektor Industri', 'required|trim');
        if ($this->input->post('counterpart') == 19) {
            $this->form_validation->set_rules('wilayah', 'Wilayah', 'required|trim');
            $this->form_validation->set_rules('cabang', 'Cabang', 'required|trim');
        }
        $this->form_validation->set_rules('produk', 'Produk', 'required|trim');
        // $this->form_validation->set_rules('progress_status', 'Progress Status', 'required|trim');
        $this->form_validation->set_rules('note', 'Note', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Entry Pipeline';
            $data['counterpart'] = $this->M_counterpart->alldata();
            $data['sektor_industri'] = $this->M_sektor_industri->alldata();
            $data['wilayah'] = $this->M_wilayah->alldata();
            $data['produk'] = $this->M_produk->alldata();
            $data['status'] = $this->M_progress_status->alldata();
            $data['user'] = $this->db->get_where('tb_user', ['npp' => $this->session->userdata('npp')])->row_array();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('bisnis/index', $data);
            $this->load->view('template/footer');
        } else {
            $this->M_pipeline_bisnis->insert();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! pipeline has been created.</div>');
            redirect('bisnis/list_pipeline');
        }
    }

    public function getcabang()
    {
        $id_wilayah = $this->input->post('idWilayah');
        if ($id_wilayah !== "") {
            $data = $this->M_cabang->alldata($id_wilayah);
            $output .= '<option value="">-Select-</option>';
            foreach ($data as $dc) {
                $output .= '<option value="' . $dc["id"] . '">' . $dc["cabang"] . '</option>';
            }
        } else {
            $output .= '<option value="">-Select-</option>';
        }
        echo $output;
    }

    public function list_pipeline()
    {
        $data['offering'] = $this->M_pipeline_bisnis->offering();
        $data['negotiation'] = $this->M_pipeline_bisnis->negotiation();
        $data['submission'] = $this->M_pipeline_bisnis->submission();
        $data['nda'] = $this->M_pipeline_bisnis->nda();
        $data['bussiness_deal'] = $this->M_pipeline_bisnis->bussiness_deal();
        $data['pks'] = $this->M_pipeline_bisnis->pks();
        $data['card_production'] = $this->M_pipeline_bisnis->card_production();
        $data['success'] = $this->M_pipeline_bisnis->success();
        $data['failed'] = $this->M_pipeline_bisnis->failed();
        $data['title'] = 'List Pipeline';
        $data['user'] = $this->db->get_where('tb_user', ['npp' => $this->session->userdata('npp')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('bisnis/list-pipeline', $data);
        $this->load->view('template/footer');
    }

    public function detail_pipeline($id)
    {
        $data['detail'] = $this->M_pipeline_bisnis->detail($id);
        $data['record'] = $this->M_log_pipeline_bisnis->record($id);
        $data['status'] = $this->M_progress_status->byProductCategory($id);
        $data['uic'] = $this->db->get('tb_uic')->result_array();
        $data['title'] = 'List Pipeline';
        $data['subtitle'] = 'Detail Pipeline';
        $data['user'] = $this->db->get_where('tb_user', ['npp' => $this->session->userdata('npp')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('bisnis/detail', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {

        $this->form_validation->set_rules('nama_pic', 'Nama PIC', 'required|trim');
        $this->form_validation->set_rules('phone_pic', 'Phone PIC', 'required|trim');
        $this->form_validation->set_rules('email_pic', 'Email PIC', 'required|trim|valid_email');
        $this->form_validation->set_rules('expect_balance', 'Expect Balance', 'required|trim');
        $this->form_validation->set_rules('expect_transaction', 'Expect Transaction', 'required|trim');
        $this->form_validation->set_rules('expect_sv', 'Expect SV', 'required|trim');
        $this->form_validation->set_rules('expect_fee', 'Expect Fee', 'required|trim');

        $id_pipeline = $this->input->post('id');
        $progress_status = $this->input->post('progress_status');
        $nama_pic = $this->input->post('nama_pic');
        $phone_pic = $this->input->post('phone_pic');
        $email_pic = $this->input->post('email_pic');
        $balance = $this->input->post('expect_balance');
        $expect_balance = preg_replace('/[Rp. ]/', '', $balance);
        $transaction = $this->input->post('expect_transaction');
        $expect_transaction = preg_replace('/[Rp. ]/', '', $transaction);
        $sv = $this->input->post('expect_sv');
        $expect_sv = preg_replace('/[Rp. ]/', '', $sv);
        $fee = $this->input->post('expect_fee');
        $expect_fee = preg_replace('/[Rp. ]/', '', $fee);
        $id_uic = $this->input->post('uic');
        $newnote = $this->input->post('note');

        $this->db->select('*');
        $this->db->where('id', $id_pipeline);
        $note = $this->db->get('tb_pipeline_bisnis')->row_array();
        $oldnote = $note['note'];
        $allnote = $newnote . ", " . $oldnote;

        if ($this->form_validation->run() == false) {
            redirect('bisnis/detail_pipeline/' . $id_pipeline);
        } else {
            if ($progress_status == $note['id_progress_status'] and $newnote == $oldnote and $nama_pic == $note['nama_pic'] and $phone_pic == $note['phone_pic'] and $email_pic == $note['email_pic'] and $expect_balance == $note['expect_balance'] and $expect_transaction == $note['expect_transaction'] and $expect_sv == $note['expect_sv'] and $expect_fee == $note['$expect_fee']) {
                redirect('bisnis/detail_pipeline/' . $id_pipeline);
            } else {

                $this->db->query("UPDATE tb_pipeline_bisnis
                    SET 
                    `id_progress_status` = '$progress_status',
                    `nama_pic` = '$nama_pic',
                    `phone_pic` = '$phone_pic',
                    `email_pic` = '$email_pic',
                    `expect_balance` = '$expect_balance',
                    `expect_transaction` = '$expect_transaction',
                    `expect_sv` = '$expect_sv',
                    `expect_fee` = '$expect_fee',
                    `note` = '$newnote',
                    `id_uic` = '$id_uic'
                    WHERE `id` = '$id_pipeline'");
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! pipeline has been updated.</div>');
                redirect('bisnis/detail_pipeline/' . $id_pipeline);
            }
        }





        // $data['detail'] = $this->M_pipeline_bisnis->detail($id);
        // $data['record'] = $this->M_log_pipeline_bisnis->record($id);
        // $data['status'] = $this->M_progress_status->alldata();
        // $data['title'] = 'List Pipeline';
        // $data['subtitle'] = 'Detail Pipeline';
        // $data['user'] = $this->db->get_where('tb_user', ['npp' => $this->session->userdata('npp')])->row_array();

        // $this->load->view('template/header', $data);
        // $this->load->view('template/sidebar', $data);
        // $this->load->view('template/topbar', $data);
        // $this->load->view('bisnis/detail', $data);
        // $this->load->view('template/footer');
    }
}
