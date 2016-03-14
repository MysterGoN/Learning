<?php
$ta = array();
function getMyDate($format, $array) {
    for ($i=0; $i < count($array); $i++) {
        global $ta;
        $ta[$i] = date($format, $array[$i]);
        echo date($format, $array[$i]) . ' ';
    }    
    echo "<br>\n";
}

$date = array('', '', '', '', '');
for ($i=0; $i < count($date); $i++) {
    $date[$i] = rand(1, time());
    echo $date[$i] . ' ';
}

echo "<br>\n";
getMyDate('d', $date);
echo 'Минимальный день - ' . min($ta) . "<br>\n";
getMyDate('m', $date);
echo 'Максимальный месяц - ' . max($ta) . "<br>\n";

sort($date);

echo print_r($date);

echo "<br>\n" . $selected = end($date) . "<br>\n";
echo date('d.m.Y H:i:s', $selected) . "<br>\n";
date_default_timezone_set('America/New_York');
echo date('d.m.Y H:i:s', $selected) . "<br>\n";