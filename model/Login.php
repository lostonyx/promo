<?php

class Login extends mysql {

    public function checkEmailExist($email) {
        $query = $this->getcon()->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function userRegister($email, $password, $name, $phone) {
        $query = $this->getcon()->prepare('INSERT INTO users (email, password, name, phone) VALUES (?, ?, ?, ?)');
        if($query->execute([$email, md5($password), $name, $phone])) {
            return true;
        } else {
            return false;
        }
    }

    public function checkLogin($email, $password) {
        $query = $this->getcon()->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
        $query->execute([$email, md5($password)]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

}

?>