<?php

class Admin extends mysql {

    public function getNumbers() {
        $query = $this->getcon()->prepare('SELECT * FROM numbers WHERE status = 2');
        $query->execute();

        return $query->fetchAll();
    }

    public function generatePinCode($pincode) {
        $query = $this->getcon()->prepare('SELECT * FROM pincode WHERE pin = ?');
        $query->execute([$pincode]);
        if(!$query->fetch(PDO::FETCH_ASSOC)) {
            $query = $this->getcon()->prepare('INSERT INTO pincode (pin) VALUES (?)');
            if($query->execute([$pincode])) {
                return true;
            }
        }
        return false;
    }

    public function clearAll() {
        $query = $this->getcon()->prepare('DELETE FROM numbers');
        if($query->execute()) {
            $query = $this->getcon()->prepare('DELETE FROM pincode');
            if($query->execute()) {
                return true;
            }
        }
        return false;
    }

    public function drawNow() {
        $i = 1;
        while ($i <= 10) {
            while (true) {
                $number = rand(1000, 1999);
                $query = $this->getcon()->prepare('SELECT * FROM numbers WHERE number = ?');
                $query->execute([$number]);
                if($query->fetch(PDO::FETCH_ASSOC)) {
                    $query = $this->getcon()->prepare('UPDATE numbers SET status = 2 WHERE number = ? AND status = 0');
                    if($query->execute([$number])) {
                        break;
                    }
                }
            }
            $i++;
        }
    }

}

?>