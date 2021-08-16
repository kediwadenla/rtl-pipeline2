<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_wilayah extends CI_Model
{
    public function alldata()
    {
        $this->db->where('id !=', 18);
        $query = $this->db->get('tb_wilayah');
        return $query->result_array();
    }
}
