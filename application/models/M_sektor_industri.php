<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sektor_industri extends CI_Model
{
    public function alldata()
    {
        $query = $this->db->get('tb_sektor_industri');
        return $query->result_array();
    }
}
