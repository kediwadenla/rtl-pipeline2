<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('GetData');
    }

    public function index()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('role_id', 'Role_id', 'required|trim');
        $this->form_validation->set_rules('npp', 'Npp', 'required|trim|is_unique[tb_user.npp]', [
            'is_unique' => 'This NPP has already registered!'
        ]);
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|min_length[11]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Management User';
            $data['user'] = $this->db->get_where('tb_user', ['npp' => $this->session->userdata('npp')])->row_array();
            $data['role'] = $this->db->get('user_role')->result_array();
            $data['alluser'] = $this->GetData->datauser();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'npp' => htmlspecialchars($this->input->post('npp', true)),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'unit' => $this->input->post('unit', true),
                'phone' => htmlspecialchars($this->input->post('phone', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id', true),
                'is_active' => $this->input->post('is_active', true),
                'date_create' => time(),
            ];
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! account has been created.</div>');
            redirect('user');
        }
    }

    public function userdelete($user_id)
    {
        $this->db->delete('tb_user', ['id' => $user_id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Deleted!</div>');
        redirect('user');
    }

    public function userreset($user_id)
    {
        $pass = password_hash('123', PASSWORD_DEFAULT);
        $this->db->set('password', $pass);
        $this->db->where('id', $user_id);
        $this->db->update('tb_user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User has been reset!</div>');
        redirect('user');
    }

    public function userupdate()
    {
        $this->form_validation->set_rules('npp', 'NPP', 'required|trim');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('role_id', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User failed to update!</div>');
            redirect('user');
        } else {
            $user_id = $this->input->post('id');
            $this->db->set('npp', $this->input->post('npp'));
            $this->db->set('name', $this->input->post('name'));
            $this->db->set('phone', $this->input->post('phone'));
            $this->db->set('role_id', $this->input->post('role_id'));
            $this->db->set('is_active', $this->input->post('is_active'));
            $this->db->where('id', $user_id);
            $this->db->update('tb_user');
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Updated!</div>');
        redirect('user');
    }
}
