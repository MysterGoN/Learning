<?php
    class errors {
        private $errors = array();
        
        public function __construct($errors) {
            $this->errors = $errors;
        }
        
        public function ad_error_check(ad $ad, $smarty) {
            $vars = $ad->get_vars();
            $errorsNumber = 0;
            foreach ($this->errors as $value) {
                if(empty($vars[$value])){
                    $smarty->assign('error_' . $value, true);
                    $errorsNumber++;
                }
            }
            if ($errorsNumber) {
                $smarty->assign('error', 'Пожалуйста заполните поле');
                return true;
            } else {
                return false;
            }
        }
    }