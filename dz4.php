<?php
$ini_string='
[игрушка мягкая мишка белый]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
    
[одежда детская куртка синяя синтепон]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
    
[игрушка детская велосипед]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';

';
$bd=  parse_ini_string($ini_string, true);

function tab() {
    return "&nbsp&nbsp&nbsp&nbsp";
}
function name($key) {
    switch ($key) {
        case 'цена':
                return ' руб.';
            break;
        case 'количество заказано':
        case 'осталось на складе':
                return ' шт.';
            break;
        default:
            break;
    }
}
function td($string) {
    return "<td>" . $string . "</td>";
}
function diskontTd($value) {
    switch ($value) {
            case 'diskont0':
                echo td('0%');
                break;
            case 'diskont1':
                echo td('10%');
                break;
            case 'diskont2':
                echo td('20%');
                break;
            default:
                break;
        }
    
}
function diskont($value) {
    switch ($value) {
            case 'diskont0':
                return 1;
                break;
            case 'diskont1':
                return 0.9;
                break;
            case 'diskont2':
                return 0.8;
                break;
            default:
                break;
        }
}
function priceTd($key, $value) {
    if ($key != 'игрушка детская велосипед') {
        if ($value['количество заказано'] > $value['осталось на складе']) {            
            $price = $value['осталось на складе'] 
                    * $value['цена'] 
                    * diskont($value['diskont']) . ' руб.';
        } else {
            $price = $value['количество заказано'] 
                    * $value['цена'] 
                    * diskont($value['diskont']) . ' руб.';
        }
    } else {
        if ($value['количество заказано'] > $value['осталось на складе']) {            
            if ($value['осталось на складе'] >= 3) {
                $price = $value['осталось на складе'] 
                    * $value['цена'] 
                    * 0.7 . ' руб.';
            } else {
                $price = $value['осталось на складе'] 
                    * $value['цена'] 
                    * diskont($value['diskont']) . ' руб.';
            }
            
        } else {
            if ($value['количество заказано'] >= 3) {
                $price = $value['количество заказано'] 
                    * $value['цена'] 
                    * 0.7 . ' руб.';
            } else {
                $price = $value['количество заказано'] 
                    * $value['цена'] 
                    * diskont($value['diskont']) . ' руб.';
            }
        }
    }
    echo td($price);
    totalPrice($price);
}
function total() {
    $totalCount = 0;
    global $bd;
    foreach ($bd as $key => $value) {
        if ($value['количество заказано'] > $value['осталось на складе']) {
            $totalCount += $value['осталось на складе'];
        } else {
            $totalCount += $value['количество заказано'];
        }  
    }
    
    return tab() . 'Количество наименований товаров: ' . count($bd) . "<br>"
        . tab() . 'Заказано товаров: ' . $totalCount . "<br>";
}
function totalPrice($price = 0, $return = false) {
    static $totalPrice = 0;
    $totalPrice += $price;
    if ($return) {
        return $totalPrice;
    }
}
function notification($value) {
    if ($value['количество заказано'] > $value['осталось на складе']) {
        echo td('Из требуемых ' . $value['количество заказано'] 
                . ' товаров на складе осталось ' 
                . $value['осталось на складе']);
    } else {
        echo td("&nbsp");
    }
}
function printBD($bd) {
    echo "<table border='1px solid black' width='1100px'>"
        . "<tr>"
            . "<th>Товар</th>"
            . "<th>Цена</th>"
            . "<th>Заказано</th>"
            . "<th>На складе</th>"
            . "<th>Скидка</th>"
            . "<th>Цена</th>"
            . "<th>Уведомление</th>"
        . "</tr>";
    foreach ($bd as $key => $value) {
        echo "<tr>" . td($key);
        foreach ($value as $key1 => $value1) {
            if ($key1 != 'diskont') {
                echo td($value1 . name($key1));
            } else {
                if ($key == 'игрушка детская велосипед') {
                    if ($value['количество заказано'] > $value['осталось на складе']) {            
                        if ($value['осталось на складе'] >= 3) {
                            echo td('30%');
                        } else {
                            diskontTd($value1);
                        }
                    } else {
                        if ($value['количество заказано'] >= 3) {
                            echo td('30%');
                        } else {
                            diskontTd($value1);
                        }
                    }
                } else {
                    diskontTd($value1);
                }     
            }
        }
        priceTd($key, $value);
        notification($value);
        echo "</tr>";
    }
    echo "</table>";
}

printBD($bd);
if ($bd['игрушка детская велосипед']['количество заказано'] >= 3 && $bd['игрушка детская велосипед']['осталось на складе'] >= 3) {
    echo "<h1><font color='red'>Поздравляем!!! У вас скидка 30% на детскую игрушку велосипед!!!</font></h1>";
}
echo "ИТОГО:<br>" 
    . total($bd)
    . tab() . 'Общая стоимость: ' . totalPrice(0, true) . " руб.";
