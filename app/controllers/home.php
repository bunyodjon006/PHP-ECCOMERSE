<?php

class Home extends Controller
{
    public function index()
    {
        $data['page_title']="Home1";
        $this->view("index", $data);
    }


}


