<?php
    function myLogger($db, $sql, $caller) {
        global $firePHP;
        if (isset($caller['file'])){
            $firePHP->group("at ".@$caller['file'].' line '.@$caller['line']);
        }
        $firePHP->log($sql);
        if (isset($caller['file'])){
            $firePHP->groupEnd();
        }
    }
    
    function tableLogger($table) {
        global $firePHP;
        $firePHP->table('Table Label', $table);
    }
    
    function databaseErrorHandler($message, $info) {
            if (!error_reporting()) return;
            echo "Не удалось установить соединение"
               . "<br>Пожалуйста перейдите "
               . "по ссылке для устранения неполадок: "
               . "<a href='install.php'>Устранить!</a>";
            exit();
    }

    class database {
        private $server_name;
        private $user_name;
        private $password;
        private $database;
        private $dbSimple;
        
        public function __construct($server_name, $user_name, $password, $database) {
            $this->server_name = $server_name;
            $this->user_name = $user_name;
            $this->password = $password;
            $this->database = $database;
        }
        
        public function connect(){
            $this->dbSimple = DbSimple_Generic::connect('mysqli://' . $this->user_name . ':' . $this->password . '@' . $this->server_name . '/' . $this->database);
            $this->dbSimple->setErrorHandler('databaseErrorHandler');
            $this->dbSimple->setLogger('myLogger');
            $this->dbSimple->query("SET NAMES utf8");
        }
        
        public function takeAd($id) {        
            $result = $this->dbSimple->selectRow('select * from ads where ads.id = ?', $id);
            tableLogger($result);
            return $result;
        }
        
        public function takeAdList($search) {
            $result = $this->dbSimple->select('select id, title, price, name from ads where title like ?', '%' . $search . '%');
            tableLogger($result);
            $lists = new adLists();
            foreach ($result as $value) {
                $list = new adList($value['title'], $value['price'], $value['name'], $value['id']);
                $lists->addList($list);
            }
            $data = $lists->showLists();
            return $data;
        }
        
        public function addAd($array) {
            $this->dbSimple->query("insert into ads set ?a", $array);
        }

        public function editAd($array, $id) {
            $this->dbSimple->query("update ads set ?a where id = ?", $array, $id);
        }

        public function deleteAd($id) {
            $this->dbSimple->query("delete from ads where ads.id = ?", $id);
        }
        
        public function takeData($name) {
            $result = $this->dbSimple->selectCol('select id as array_key, ?# from ?#', $name, $name . 's');
            tableLogger($result);
            return $result;
        }

        public function takeCategorys() {
            $result = $this->dbSimple->selectCol('select category as array_key_1, '
                                . 'subcategorys.id as array_key_2, '
                                . 'subcategory '
                                . 'from categorys '
                                . 'left join subcategorys '
                                . 'on (categorys.id = subcategorys.category_id)');
            tableLogger($result);
            return $result;
        }
    }