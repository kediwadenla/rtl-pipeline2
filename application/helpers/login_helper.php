<?php

function is_logged_in()
{
    $ini = get_instance();
    if (!$ini->session->userdata('npp')) {
        redirect('auth');
    } else {
        $role_id = $ini->session->userdata('role_id');
        $menu = $ini->uri->segment(1);
        $queryMenu = $ini->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ini->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ini = get_instance();
    $ini->db->where('role_id', $role_id);
    $ini->db->where('menu_id', $menu_id);
    $result = $ini->db->get('user_access_menu');
    if ($result->num_rows() > 0) {
        return "checked = 'checked'";
    }
}
