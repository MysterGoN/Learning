<?php    
    class adSet {
        private $dbSimple;
        
        public function __construct($dbSimple) {
            $this->dbSimple = $dbSimple;
        }
        
        public function takeAd($id) {        
            $result = $this->dbSimple->selectRow('select * from ads where ads.id = ?', $id);
            tableLogger($result);
            return $result;
        }
        
        public function takeAdList($search) {
            $result = $this->dbSimple->select('select id, title, price, name from ads where title like ?', '%' . $search . '%');
            tableLogger($result);
            return $result;
        }
        
        public function saveAD(ad $ad){
            $vars = $ad->get_vars();
            $this->dbSimple->query("replace into ads (?#) value (?a)", 
                        array_keys($vars), array_values($vars));
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
            $result = $this->dbSimple->select('select id as array_key, '
                                                   . 'parrent_id as parent_key, '
                                                   . 'category '
                                                   . 'from categorys');
            tableLogger($result);
            return treeToArray($result);
        }
    }
    
    
