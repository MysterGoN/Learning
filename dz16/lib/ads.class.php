<?php    
    class ads {        
        private static $instance = NULL;
        private $ads = array();
        
        public function instance() {
            if (self::$instance == NULL) {
                self::$instance = new ads();
            }
            return self::$instance;
        }
        
        public function saveAd($id){
            $this->ads[$id]->save();
        }

        public function deleteAd($id) {
            if ($this->ads[$id]->delete()) {
                unset($this->ads[$id]);
                return true;
            } else {
                return false;
            }
        }

        public function addAd (ad $ad) {
            if (!($this instanceof ads)) {
                die('нельзя использовать этот метод в конструкторе классов');
            }
            $this->ads[$ad->get_id()] = $ad;
            $this->saveAd($ad->get_id());
        }

        public function getAd($id) {
            return $this->ads[$id];
        }
        
        public function getAdsFromDB($search = '') {
            global $db;
            $result = $db->select('select * from ads where title like ?', '%' . $search . '%');
            tableLogger($result);
            foreach ($result as $value) {
                $ad = new ad($value);
                self::addAd($ad);
            }
        }
       
        public function adListPreparation() {
            global $smarty;
            $row = '';
            foreach ($this->ads as $value) {
                $smarty->assign('ad', $value);
                $row .= $smarty->fetch('ads_row.tpl');
            }
            if ($row) {
                $smarty->assign('ads_rows',$row);
            } else {
                $smarty->assign('ads_row', 'Объявлений не найдено.');
            }
            
            
        }
        
        public function display() {
            global $smarty;
            $smarty->display('index.tpl');
        }
    }
    
    
