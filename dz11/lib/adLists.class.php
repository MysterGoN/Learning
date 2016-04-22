<?php    
    class adLists{
        private $lists = array();
        
        public function __construct($dbList) {
            foreach ($dbList as $value) {
                $list = new adList($value);
                $this->lists[] = $list;
            }
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