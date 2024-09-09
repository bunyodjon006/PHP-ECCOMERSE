<?php

class SignUp extends Controller
{
    public function index()
    {
        $data['page_title'] = "SignUp";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            show($_POST);
            $User = $this->load_model("User");
        }
        $this->view("sign", $data);
    }

}
