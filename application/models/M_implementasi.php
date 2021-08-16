<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_implementasi extends CI_Model
{

    public function pipeline()
    {
        $this->db->select('tb_pipeline_implementasi.*, tb_produk.produk, tb_counterpart.counterpart, tb_progress_status_implementasi.progress_status');
        $this->db->from('tb_pipeline_implementasi');
        $this->db->join('tb_produk', 'tb_produk.id = tb_pipeline_implementasi.id_produk');
        $this->db->join('tb_counterpart', 'tb_counterpart.id = tb_pipeline_implementasi.id_counterpart');
        $this->db->join('tb_progress_status_implementasi', 'tb_progress_status_implementasi.id = tb_pipeline_implementasi.id_progress_status_implementasi');
        $this->db->where('id_user', $this->session->userdata('npp'));
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function listpending()
    {
        $this->db->select('tb_pipeline_implementasi.*, tb_user.name, tb_produk.produk');
        $this->db->from('tb_pipeline_implementasi');
        $this->db->join('tb_user', 'tb_user.npp = tb_pipeline_implementasi.id_user_bisnis');
        $this->db->join('tb_produk', 'tb_produk.id = tb_pipeline_implementasi.id_produk');
        $this->db->where('id_user', 0);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function alldata($id)
    {
        $this->db->select('*');
        $this->db->from('tb_pipeline_implementasi');
        $this->db->join('tb_wilayah', 'tb_wilayah.id = tb_pipeline_implementasi.id_wilayah');
        $this->db->join('tb_cabang', 'tb_cabang.id = tb_pipeline_implementasi.id_cabang');
        $this->db->join('tb_produk', 'tb_produk.id = tb_pipeline_implementasi.id_produk');
        $this->db->join('tb_sektor_industri', 'tb_sektor_industri.id = tb_pipeline_implementasi.id_sektor_industri');
        $this->db->where('id_pipeline', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function detailpipeline($id)
    {
        $this->db->select('tb_pipeline_implementasi.*, tb_wilayah.wilayah, tb_cabang.cabang, tb_counterpart.counterpart, tb_produk.produk, tb_sektor_industri.sektor_industri, tb_user.name, tb_progress_status_implementasi.progress_status');
        $this->db->from('tb_pipeline_implementasi');
        $this->db->join('tb_wilayah', 'tb_wilayah.id = tb_pipeline_implementasi.id_wilayah');
        $this->db->join('tb_user', 'tb_user.npp = tb_pipeline_implementasi.id_user_bisnis');
        $this->db->join('tb_cabang', 'tb_cabang.id = tb_pipeline_implementasi.id_cabang');
        $this->db->join('tb_produk', 'tb_produk.id = tb_pipeline_implementasi.id_produk');
        $this->db->join('tb_counterpart', 'tb_counterpart.id = tb_pipeline_implementasi.id_counterpart');
        $this->db->join('tb_progress_status_implementasi', 'tb_progress_status_implementasi.id = tb_pipeline_implementasi.id_progress_status_implementasi');
        $this->db->join('tb_sektor_industri', 'tb_sektor_industri.id = tb_pipeline_implementasi.id_sektor_industri');
        $this->db->where('id_pipeline', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
}
