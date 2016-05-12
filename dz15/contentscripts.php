<?php
    function takeData($name) {
        global $db;
        $result = $db->selectCol('select id as array_key, ?# from ?#', $name, $name . 's');
        tableLogger($result);
        return $result;
    }

    function takeCategorys() {
        global $db;
        $result = $db->select('select id as array_key, '
                                         . 'parrent_id as parent_key, '
                                         . 'category '
                                         . 'from categorys');
        tableLogger($result);
        return treeToArray($result);
    }