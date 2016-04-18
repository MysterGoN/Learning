<?php

    function dataForm() {
        $arr = array();
        if (!isset($_POST['allow_mail_id'])) {
            $arr['allow_mail_id'] = 0;
        }
        foreach ($_POST as $key => $value) {
            $temp = $value;
            if ($key == 'submit') {continue;}
            if ($key == 'allow_mail_id') {
                $temp = $temp[0];
            }
            if ($key == 'price' || $key == 'phone') {
                $temp = (int)$temp;
            }
            $arr[$key] = htmlentities(ltrim($temp), ENT_QUOTES, 'UTF-8');
        }
        return $arr;
    }

