<?php
    class database {
        private $server_name;
        private $user_name;
        private $password;
        private $database;
        
        public function __construct($server_name, $user_name, $password, $database) {
            $this->server_name = $server_name;
            $this->user_name = $user_name;
            $this->password = $password;
            $this->database = $database;
        }
        
        public function connect(){
            $db = DbSimple_Generic::connect('mysqli://' . $this->user_name . ':' . $this->password . '@' . $this->server_name . '/' . $this->database);
            $db->setErrorHandler('databaseErrorHandler');
            $db->setLogger('myLogger');
            $db->query("SET NAMES utf8");
            return $db;
        }
    }