<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_cabang extends CI_Model
{
    public function alldata($id_wilayah)
    {
        $query = $this->db->get_where('tb_cabang', ['id_wilayah' => $id_wilayah]);
        return $query->result_array();
    }
}
