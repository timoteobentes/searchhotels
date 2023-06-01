<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
    header("Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS");

    class connectDB {

        static $active;
        public static function active() {
            static $host = "us-cdbr-east-06.cleardb.net";
            static $user = "bd2d239bf3b339";
            static $senha = "24ca4824";
            static $db_name = "heroku_4674f3c585da4ec";

            // static $host = "localhost";
            // static $user = "root";
            // static $senha = "Timoteo@24";
            // static $db_name = "searchhotels";

            $active = new PDO("mysql:host=$host; port=3306; dbname=$db_name; charset=utf8", $user, $senha);
            return $active;
        }

    }

?>