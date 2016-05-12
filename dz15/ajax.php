<?php
    require_once 'initialization.php';    
    switch ($_GET['action']) {
        case 'delete':
            $ads->deleteAd($_GET['id']);
            echo "Товар " . $_GET['id'] . " удален успешно!";
            break;
        default:
            break;
    }