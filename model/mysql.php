<?php

    class mysql {
        private static $mysql;

        public function getcon() {
            if(!isset(self::$mysql)) {
                try {
                    self::$mysql = new PDO('mysql:host=127.0.0.1;port=3306;dbname=database', 'user', 'password', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    self::$mysql->setAttribute(PDO::ATTR_TIMEOUT, 10);
                    return self::$mysql;
                } catch(PDOException $e) {
                    echo 'ERROR: ' . $e->getMessage();
                }
            } else {
                return self::$mysql;
            }
        }
    }

?>