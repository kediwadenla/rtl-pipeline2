<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_progress_status extends CI_Model
{
    public function alldata()
    {
        $query = $this->db->get('tb_progress_status');
        return $query->result_array();
    }
    public function byProductCategory($id)
    {
        $this->db->select('id_produk_group, id_progress_status');
        $this->db->from('tb_pipeline_bisnis');
        $this->db->where('id', $id);
        $query = $this->db->get()->result_array();
        $id_produk_group = $query[0]['id_produk_group'];
        $id_progress_status = $query[0]['id_progress_status'];

        $this->db->select('*');
        $this->db->from('tb_role_progress');
        $this->db->where('id_product_group', $id_produk_group);
        $this->db->where('id_progress_status >', $id_progress_status);
        $this->db->join('tb_progress_status', 'tb_progress_status.id = tb_role_progress.id_progress_status');
        $query = $this->db->get()->result_array();
        return $query;
    }
}
