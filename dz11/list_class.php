<?php
    class adList{
        private $title;
        private $price;
        private $name;
        private $edit;
        private $delete;
        
        public function __construct($title, $price, $name, $id) {
            $this->title = $title;
            $this->price = $price;
            $this->name = $name;
            $this->edit = "<a  href='?id=" . $id . "'>редактировать</a> ";
            $this->delete = "<a  href='?delete=". $id ."'>удалить</a><br>";
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
    
    class adLists{
        private $lists = array();
        
        public function addList(adList $list){
            $this->lists[] = $list;
        }
        
        public function showLists(){
            $date = array();
            foreach ($this->lists as $value) {
                foreach ($value->convertToArray() as $value1){
                    $date[] = $value1;
                }
            }
            return $date;
        }
    }
