<?php
    class ad {
        private $id = '';
        private $private_id = '';
        private $name = '';
        private $email = '';
        private $allow_mail_id = '';
        private $phone = '';
        private $city_id = '';
        private $ad_category_id = '';
        private $title = '';
        private $description = '';
        private $price = '';
        
        public function __construct($ad = '') {
            if (isset($ad['id'])) {
                $this->id = $ad['id'];
            }
            $this->private_id = $ad['private_id'];
            $this->name = $ad['name'];
            $this->email = $ad['email'];
            $this->allow_mail_id = $ad['allow_mail_id'];
            $this->phone = $ad['phone'];
            $this->city_id = $ad['city_id'];
            $this->ad_category_id = $ad['ad_category_id'];
            $this->title = $ad['title'];
            $this->description = $ad['description'];
            $this->price = $ad['price'];
        }
        
        public function get_id() {return $this->id;}
        public function get_private_id() {return $this->private_id;}
        public function get_name() {return $this->name;}
        public function get_email() {return $this->email;}
        public function get_allow_mail_id() {return $this->allow_mail_id;}
        public function get_phone() {return $this->phone;}
        public function get_city_id() {return $this->city_id;}
        public function get_ad_category_id() {return $this->ad_category_id;}
        public function get_title() {return $this->title;}
        public function get_description() {return $this->description;}
        public function get_price() {return $this->price;}
        public function get_vars() {return get_object_vars($this);}
        
        public function save() {
            global $db;
            $vars = get_object_vars($this);
            $db->query('replace into ads (?#) values (?a)',
                    array_keys($vars), array_values($vars));
        }
        
        public function delete() {
            global $db;
            $db->query('delete from ads where ads.id = ?', $this->id);
        }
    }