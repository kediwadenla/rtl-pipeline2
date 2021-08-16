<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pipeline_bisnis extends CI_Model
{

    public function offering()
    {
        $id_user = $this->session->userdata('npp');
        $this->db->select('tb_pipeline_bisnis.*,tb_produk.produk');
        $this->db->from('tb_pipeline_bisnis');
        $this->db->join('tb_produk', 'tb_produk.id = tb_pipeline_bisnis.id_produk');
        $this->db->where('id_progress_status', 1);
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function negotiation()
    {
        $id_user = $this->session->userdata('npp');
        $this->db->select('tb_pipeline_bisnis.*,tb_produk.produk');
        $this->db->from('tb_pipeline_bisnis');
        $this->db->join('tb_produk', 'tb_produk.id = tb_pipeline_bisnis.id_produk');
        $this->db->where('id_progress_status', 2);
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function submission()
    {
        $id_user = $this->session->userdata('npp');
        $this->db->select('tb_pipeline_bisnis.*,tb_produk.produk');
        $this->db->from('tb_pipeline_bisnis');
        $this->db->join('tb_produk', 'tb_produk.id = tb_pipeline_bisnis.id_produk');
        $this->db->where('id_progress_status', 4);
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function nda()
    {
        $id_user = $this->session->userdata('npp');
        $this->db->select('tb_pipeline_bisnis.*,tb_produk.produk');
        $this->db->from('tb_pipeline_bisnis');
        $this->db->join('tb_produk', 'tb_produk.id = tb_pipeline_bisnis.id_produk');
        $this->db->where('id_progress_status', 5);
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function bussiness_deal()
    {
        $id_user = $this->session->userdata('npp');
        $this->db->select('tb_pipeline_bisnis.*,tb_produk.produk');
        $this->db->from('tb_pipeline_bisnis');
        $this->db->join('tb_produk', 'tb_produk.id = tb_pipeline_bisnis.id_produk');
        $this->db->where('id_progress_status', 6);
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pks()
    {
        $id_user = $this->session->userdata('npp');
        $this->db->select('tb_pipeline_bisnis.*,tb_produk.produk');
        $this->db->from('tb_pipeline_bisnis');
        $this->db->join('tb_produk', 'tb_produk.id = tb_pipeline_bisnis.id_produk');
        $this->db->where('id_progress_status', 7);
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function card_production()
    {
        $id_user = $this->session->userdata('npp');
        $this->db->select('tb_pipeline_bisnis.*,tb_produk.produk');
        $this->db->from('tb_pipeline_bisnis');
        $this->db->join('tb_produk', 'tb_produk.id = tb_pipeline_bisnis.id_produk');
        $this->db->where('id_progress_status', 3);
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function success()
    {
        $id_user = $this->session->userdata('npp');
        $this->db->select('tb_pipeline_bisnis.*,tb_produk.produk');
        $this->db->from('tb_pipeline_bisnis');
        $this->db->join('tb_produk', 'tb_produk.id = tb_pipeline_bisnis.id_produk');
        $this->db->where('id_progress_status', 8);
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function failed()
    {
        $id_user = $this->session->userdata('npp');
        $this->db->select('tb_pipeline_bisnis.*,tb_produk.produk');
        $this->db->from('tb_pipeline_bisnis');
        $this->db->join('tb_produk', 'tb_produk.id = tb_pipeline_bisnis.id_produk');
        $this->db->where('id_progress_status', 9);
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert()
    {
        date_default_timezone_set("Asia/Bangkok");
        $id_produk = $this->input->post('produk');
        $expect_balance = $this->input->post('expect_balance');
        $balance = preg_replace('/[Rp. ]/', '', $expect_balance);
        $expect_transaction = $this->input->post('expect_transaction');
        $transaction = preg_replace('/[Rp. ]/', '', $expect_transaction);
        $expect_sv = $this->input->post('expect_sv');
        $sv = preg_replace('/[Rp. ]/', '', $expect_sv);
        $expect_fee = $this->input->post('expect_fee');
        $fee = preg_replace('/[Rp. ]/', '', $expect_fee);
        $query = $this->db->query("SELECT * FROM tb_produk WHERE id ='$id_produk'")->row_array();
        $id_produk_group = $query['id_produk_group'];
        $id_produk_group_implementasi = $query['id_produk_group_implementasi'];
        $query1 = $this->db->query("SELECT * FROM tb_role_progress_implementasi WHERE `id_produk_group_implementasi` = '$id_produk_group_implementasi' LIMIT 1 ")->row_array();
        $id_progress_status_implementasi = $query1['id_progress_status_implementasi'];
        $data = [
            'id_user' => $this->session->userdata('npp'),
            'unit' => $this->session->userdata('unit'),
            'nama_entity' => $this->input->post('nama_entity'),
            'nama_pic' => $this->input->post('nama_pic'),
            'phone_pic' => $this->input->post('phone_pic'),
            'email_pic' => $this->input->post('email_pic'),
            'expect_balance' => $balance,
            'expect_transaction' => $transaction,
            'expect_sv' => $sv,
            'expect_fee' => $fee,
            'id_counterpart' => $this->input->post('counterpart'),
            'id_sektor_industri' => $this->input->post('sektor_industri'),
            'id_wilayah' => $this->input->post('wilayah'),
            'id_cabang' => $this->input->post('cabang'),
            'id_produk' => $id_produk,
            'id_produk_group' => $id_produk_group,
            'id_produk_group_implementasi' => $id_produk_group_implementasi,
            'id_progress_status' => $this->input->post('progress_status'),
            'id_progress_status_implementasi' => $id_progress_status_implementasi,
            'note' => $this->input->post('note'),
            'date_create' =>  date("Y-m-d"),
            'date_update' => '',
        ];
        $this->db->insert('tb_pipeline_bisnis', $data);
    }

    public function detail($id)
    {
        $this->db->select('tb_pipeline_bisnis.*, tb_produk.produk, tb_counterpart.counterpart, tb_sektor_industri.sektor_industri, tb_wilayah.wilayah, tb_cabang.cabang, tb_progress_status.progress_status');
        $this->db->from('tb_pipeline_bisnis');
        $this->db->join('tb_produk', 'tb_produk.id = tb_pipeline_bisnis.id_produk');
        $this->db->join('tb_counterpart', 'tb_counterpart.id = tb_pipeline_bisnis.id_counterpart');
        $this->db->join('tb_sektor_industri', 'tb_sektor_industri.id = tb_pipeline_bisnis.id_sektor_industri');
        $this->db->join('tb_wilayah', 'tb_wilayah.id = tb_pipeline_bisnis.id_wilayah');
        $this->db->join('tb_cabang', 'tb_cabang.id = tb_pipeline_bisnis.id_cabang');
        $this->db->join('tb_progress_status', 'tb_progress_status.id = tb_pipeline_bisnis.id_progress_status');
        $this->db->where('tb_pipeline_bisnis.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function result()
    {
        $query = $this->db->query(
            "SELECT
            produk_group,
            id_produk,
            produk,
            id_produk_group,
            SUM(offering) AS offering,
            SUM(negotiation) AS negotiation,
            SUM(submission) AS submission,
            SUM(nda) AS nda,
            SUM(business_deal) AS business_deal,
            SUM(pks) AS pks,
            SUM(card_production) AS card_production,
            SUM(success) AS success,
            SUM(failed) AS failed
            FROM
            (
                SELECT
                        produk_group,
                        id_produk_group,
                        produk,
                        id_produk,
                        CASE id_progress_status
                                WHEN 1 THEN n
                                ELSE 0
                        END AS offering,
                        CASE id_progress_status
                                WHEN 2 THEN n
                                ELSE 0
                        END AS negotiation,
                        CASE id_progress_status
                                WHEN 3 THEN n
                                ELSE 0
                        END AS card_production,
                        CASE id_progress_status
                                WHEN 4 THEN n
                                ELSE 0
                        END AS submission,
                        CASE id_progress_status
                                WHEN 5 THEN n
                                ELSE 0
                        END AS nda,
                        CASE id_progress_status
                                WHEN 6 THEN n
                                ELSE 0
                        END AS business_deal,
                        CASE id_progress_status
                                WHEN 7 THEN n
                                ELSE 0
                        END AS pks,
                        CASE id_progress_status
                                WHEN 8 THEN n
                                ELSE 0
                        END AS success,
                        CASE id_progress_status
                                WHEN 9 THEN n
                                ELSE 0
                        END AS failed
                FROM (
                        SELECT
                                tb_pipeline.id_produk_group,
                                id_progress_status,
                                id_produk,
                                produk,
                                tb_produk_group.produk_group,
                                COUNT(id_progress_status) AS n
                        FROM
                                tb_pipeline
                        INNER JOIN tb_produk_group ON tb_produk_group.id = tb_pipeline.id_produk_group
                        INNER JOIN tb_produk ON tb_produk.id = tb_pipeline.id_produk
                        GROUP BY 1,2
                        ) AS p
            ) AS y
            GROUP BY produk_group;"
        );

        return $query->result_array();
    }

    public function allpipeline()
    {
        $this->db->select(
            'tb_pipeline_bisnis.*, 
            tb_user.name,
            tb_produk.produk, 
            tb_counterpart.counterpart, 
            tb_wilayah.wilayah as wilayah, 
            tb_cabang.cabang as cabang,
            log_pipeline_bisnis.date_update as date_update_bisnis'
        );
        $this->db->from('tb_pipeline_bisnis');
        $this->db->join('tb_user', 'tb_user.npp = tb_pipeline_bisnis.id_user');
        $this->db->join('tb_produk', 'tb_produk.id = tb_pipeline_bisnis.id_produk');
        $this->db->join('tb_counterpart', 'tb_counterpart.id = tb_pipeline_bisnis.id_counterpart');
        $this->db->join('tb_wilayah', 'tb_wilayah.id = tb_pipeline_bisnis.id_wilayah');
        $this->db->join('tb_cabang', 'tb_cabang.id = tb_pipeline_bisnis.id_cabang');
        $this->db->join('log_pipeline_bisnis', 'log_pipeline_bisnis.id_pipeline = tb_pipeline_bisnis.id');
        return $query = $this->db->get()->result_array();
    }
}
