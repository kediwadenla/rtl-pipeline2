<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_log_pipeline_bisnis extends CI_Model
{

    public function record($id)
    {
        $this->db->select('log_pipeline_bisnis.*,tb_progress_status.progress_status');
        $this->db->from('log_pipeline_bisnis');
        $this->db->join('tb_progress_status', 'tb_progress_status.id = log_pipeline_bisnis.id_progress_status');
        $this->db->where('id_pipeline', $id);
        // $this->db->where('status !=', "new");
        $query = $this->db->get();
        return $query->result_array();
    }
}
