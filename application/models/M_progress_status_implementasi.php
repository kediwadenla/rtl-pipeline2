<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_progress_status_implementasi extends CI_Model
{
    public function byProductCategory($id)
    {
        $this->db->select('id_produk_group_implementasi, id_progress_status_implementasi');
        $this->db->from('tb_pipeline_implementasi');
        $this->db->where('id_pipeline', $id);
        $query = $this->db->get()->result_array();
        $id_produk_group_implementasi = $query[0]['id_produk_group_implementasi'];
        $id_progress_status_implementasi = $query[0]['id_progress_status_implementasi'];

        $this->db->select('*');
        $this->db->from('tb_role_progress_implementasi');
        $this->db->where('id_produk_group_implementasi', $id_produk_group_implementasi);
        $this->db->where('id_progress_status_implementasi >', $id_progress_status_implementasi);
        $this->db->join('tb_progress_status_implementasi', 'tb_progress_status_implementasi.id = tb_role_progress_implementasi.id_progress_status_implementasi');
        $query = $this->db->get()->result_array();
        return $query;
    }
}
