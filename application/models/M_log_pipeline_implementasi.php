<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_log_pipeline_implementasi extends CI_Model
{

    public function log($id)
    {
        $this->db->select('log_pipeline_implementasi.*,tb_progress_status_implementasi.progress_status');
        $this->db->from('log_pipeline_implementasi');
        $this->db->join('tb_progress_status_implementasi', 'tb_progress_status_implementasi.id = log_pipeline_implementasi.id_progress_status_implementasi');
        $this->db->where('id_pipeline', $id);
        // $this->db->where('status !=', "new");
        $query = $this->db->get();
        return $query->result_array();
    }
}
