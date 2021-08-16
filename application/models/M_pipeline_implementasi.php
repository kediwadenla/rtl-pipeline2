<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pipeline_impelentasi extends CI_Model
{

    public function alldata($id)
    {
        $query = $this->db->get('tb_pipeline_implementasi', ['id_pipeline' => $id]);
        return $query->row_array();
    }
}
