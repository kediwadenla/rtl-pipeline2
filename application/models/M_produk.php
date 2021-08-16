<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_produk extends CI_Model
{
    public function alldata()
    {
        $this->db->select('tb_produk.*, tb_produk_group.produk_group');
        $this->db->from('tb_produk');
        $this->db->join('tb_produk_group', 'tb_produk_group.id = tb_produk.id_produk_group');
        // $this->db->order_by("tb_produk.produk");
        $query = $this->db->get();
        return $query->result_array();
    }
}
