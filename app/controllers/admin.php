<?php

class Admin extends Controller
{
    public function index()
    {
        $User = $this->load_model('User');
        $user_data = $User->check_login();

        if (is_array($user_data)) {
        $data['user_data'] = $user_data;
    
        }

        $data['page_title'] = "Admin";
        $this->view("admin/index", $data);
    }
}
