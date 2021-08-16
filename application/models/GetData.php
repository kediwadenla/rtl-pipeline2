<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GetData extends CI_Model
{

    public function dataMenu()
    {
        $query = $this->db->get('user_menu');
        return $query->result_array();
    }


    public function dataSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";

        return $this->db->query($query)->result_array();
    }

    public function dataRole()
    {
        $query = $this->db->get('user_role');
        return $query->result_array();
    }

    public function datauser()
    {
        $query = "SELECT `tb_user`.*, `user_role`.`role`
                    FROM `user_role` JOIN `tb_user`
                    ON `user_role`.`id` = `tb_user`.`role_id`";

        return $this->db->query($query)->result_array();
    }
}
