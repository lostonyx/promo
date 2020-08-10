<?php

class Main extends mysql {

    public function generateNumbers($pincode, $userid) {
        $i = 1;
        while ($i <= 10) {
            while (true) {
                $number = rand(1000, 1999);
                $number_mais = $number++;
                $number_menos = $number--;
                $query = $this->getcon()->prepare('SELECT * FROM numbers WHERE number IN (?, ?, ?)');
                $query->execute([$number, $number_mais, $number_menos]);
                if(!$query->fetch(PDO::FETCH_ASSOC)) {
                    $query = $this->getcon()->prepare('INSERT INTO numbers (number, status, pincode, userid) VALUES (?, ?, ?, ?)');
                    if($query->execute([$number, '0', $pincode, $userid])) {
                        break;
                    }
                }
            }
            $i++;
        }
        $query = $this->getcon()->prepare('UPDATE pincode SET userid = ? WHERE pin = ?');
        if($query->execute([$userid, $pincode])) {
            return true;
        } else {
            return false;
        }
    }

    public function getPinCode($pincode) {
        $query = $this->getcon()->prepare('SELECT * FROM pincode WHERE pin = ?');
        $query->execute([$pincode]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getNumbers($userid) {
        $query = $this->getcon()->prepare('SELECT * FROM numbers WHERE userid = ?');
        $query->execute([$userid]);

        return $query->fetchAll();
    }

}

?>