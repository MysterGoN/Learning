<?php
    class adList{
        private $title;
        private $price;
        private $name;
        private $edit;
        private $delete;
        
        public function __construct($list) {
            $this->title = $list['title'];
            $this->price = $list['price'];
            $this->name = $list['name'];
            $this->edit = "<a  href='?id=" . $list['id'] . "'>редактировать</a> ";
            $this->delete = "<a  href='?delete=". $list['id'] ."'>удалить</a><br>";
        }
        
        public function convertToArray() {
            $date = array();
            $date[] = $this->title;
            $date[] = $this->price;
            $date[] = $this->name;
            $date[] = $this->edit;
            $date[] = $this->delete;
            return $date;
        }
    }