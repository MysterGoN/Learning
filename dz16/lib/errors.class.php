<?php
    class errors {
        private $errors = array();
        
        public function __construct($errors) {
            $this->errors = $errors;
        }
        
        public function ad_error_check(ad $ad, $smarty) {
            $vars = $ad->get_vars();
            $errorsNumber = 0;
            $err = array();
            foreach ($this->errors as $value) {
                if(empty($vars[$value])){
                    $err['fields'][] = $value;
                    $errorsNumber++;
                }
            }
            if ($errorsNumber) {
                $err['status'] = true;
            } else {
                $err['status'] = false;
            }
            $err['all_fields'] = $this->errors;
            return $err;
        }
    }