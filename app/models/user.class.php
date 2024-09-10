<?php

class User
{
    private $error = "";

    public function signup($POST)
    {
        $data = array();
        $data['name'] = trim($POST['name']);
        $data['email'] = trim($POST['email']);
        $data['password'] = trim($POST['password']);
        $password2 = isset($POST['password2']) ? trim($POST['password2']) : '';

        // Validate email
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->error .= "Please enter a valid email address <br>";
        }
        // Validate name
        if (empty($data['name']) || !preg_match("/^[a-zA-Z]+$/", $data['name'])) {
            $this->error .= "Please enter a valid name <br>";
        }
        // Validate password match
        if ($data['password'] !== $password2) {
            $this->error .= "Passwords do not match <br>";
        }
        // Validate password length
        if (strlen($data['password']) < 6) {
            $this->error .= "Password must be at least 6 characters long <br>";
        }
        // If there are no errors, proceed with the registration
        if ($this->error == "") {
            $data['rank'] = "customer";
            $data['url_address'] = $this->get_random_string_max(60);
            $data['date'] = date("Y-m-d H:i:s");

            // Prepare the SQL query
            $query = "INSERT INTO users (url_address, name, email, password, date, rank) 
                      VALUES (:url_address, :name, :email, :password, :date, :rank)";
            $db = Database::getInstance();
            $result = $db->write($query, $data);
            if ($result) {
                header("Location: " . ROOT . "login");
                exit;
            }
        }
    }


    public function login($POST)
    {
    }

    public function get_user($url)
    {
    }

    private function get_random_string_max($length): string
    {
        $array = array_merge(range(1, 9), range('a', 'z'));
        $text = "";
        $length = rand(4, $length);
        for ($i = 0; $i < $length; $i++) {
            $random = rand(0, count($array) - 1);
            $text .= $array[$random];
        }
        return $text;
    }

}


