<?php

class User
{
    private $error = "";

    public function signup($POST)
    {

        $data = array();
        $db = Database::getInstance();

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

        $sql = "SELECT * FROM user WHERE email = :email LIMIT 1";
        $arr['email'] = $data['email'];
        $check = $db->read($sql, $arr);
        if (is_array($check)) {
            $this->error .= "That email is already in use";
        }
       

        $data['url_addrees'] = $this->get_random_string_max(60);
        $arr = [];
        $sql = "SELECT * FROM user WHERE url_addrees = :url_addrees limit 1";
        $arr['url_addrees'] = $data['url_addrees'];
        $check = $db->read($sql, $arr);
        if (is_array($check)) {
            $data['url_addrees'] = $this->get_random_string_max(60);
        }
        // If there are no errors, proceed with the registration
        if ($this->error == "") {
            $data['rank'] = "customer";
            $data['password'] = hash('sha1', $data['password']);
            $data['date'] = date("Y-m-d H:i:s");
            //url_addrees	
            // Prepare the SQL query
            $query = "INSERT INTO user (url_addrees, name, email, password, date, `rank`) 
                      VALUES (:url_addrees, :name, :email, :password, :date, :rank)";
            $db = Database::getInstance();
            $result = $db->write($query, $data);
            if ($result) {
                header("Location: " . ROOT . "");
                die;
            }
        }
        $_SESSION['error'] = $this->error;
    }


    public function login($POST)
    {

        $data = array();
        $db = Database::getInstance();
        $data['email'] = isset($POST['email']) ? trim($POST['email']) : '';
        $data['password'] = isset($POST['password']) ? trim($POST['password']) : '';

        // Validate email
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->error .= "Please enter a valid email address <br>";
        }
        // Validate name

        // Validate password length
        if (strlen($data['password']) < 6) {
            $this->error .= "Password must be at least 6 characters long <br>";
        }



        // If there are no errors, proceed with the registration
        if ($this->error == "") {

            $data['password'] = hash('sha1', $data['password']);

            //url_addrees	
            // Prepare the SQL query
            $sql = "SELECT * FROM user WHERE email = :email AND password = :password LIMIT 1";
            $params = [
                'email' => $data['email'],
                'password' => $data['password'],
            ];
            $result = $db->read($sql, $params);


            if (is_array($result)) {
                $_SESSION['user_url'] = $result[0]['url_addrees'];
                header("Location: " . ROOT . "home");
            } else {
                $this->error .= "Wrong email and password <br>";
            }
        }
        $_SESSION['error'] = $this->error;
    }

    public function get_user($url) {}

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
    // function check_login()
    // {
    //     if (isset($_SESSION['user_url'])) {
    //         $arr['url'] = $_SESSION['user_url'];
    //         $query = "SELECT * FROM user WHERE url_addrees = :url_addrees LIMIT 1";
    //         $db = Database::getInstance();
    //         $result = $db->read($query, $arr);
    //     } 
    //     return false;
    // }
}
