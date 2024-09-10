<?php

class SignUp extends Controller
{
    public function index()
    {
        $data['page_title'] = "SignUp";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user = $this->load_model("User");
            $user->signup($_POST);
        }
        $this->view("sign", $data);
    }

}
