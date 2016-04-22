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
    
//    function databaseErrorHandler($message, $info) {
//            if (!error_reporting()) return;
//            echo "Не удалось установить соединение"
//               . "<br>Пожалуйста перейдите "
//               . "по ссылке для устранения неполадок: "
//               . "<a href='install.php'>Устранить!</a>";
//            exit();
//    }
    
    function databaseErrorHandler($message, $info)
{
    // Если использовалась @, ничего не делать.
    if (!error_reporting()) return;
    // Выводим подробную информацию об ошибке.
    echo "SQL Error: $message<br><pre>"; 
    print_r($info);
    echo "</pre>";
    exit();
}
    
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