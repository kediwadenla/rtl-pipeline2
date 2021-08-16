<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_counterpart extends CI_Model
{
    public function alldata()
    {
        $query = $this->db->get('tb_counterpart');
        return $query->result_array();
    }
}
