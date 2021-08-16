<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_produk_kategori extends CI_Model
{
    public function alldata()
    {
        $query = $this->db->get('tb_produk_group');
        return $query->result_array();
    }
}
