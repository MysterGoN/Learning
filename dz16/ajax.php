<?php
    require_once 'initialization.php';    
    switch ($_GET['action']) {
        case 'delete':
            if ($ads->deleteAd($_GET['id'])) {
                $result['status'] = 'success';
                $result['message'] = "Товар " . $_GET['id'] . " удален успешно!";
            } else {
                $result['status'] = 'error';
                $result['message'] = "Такого объявления не существует";
            }
            echo json_encode($result);
            break;
        case 'submit':
            
            break;
        case 'edit':
            $ad = $ads->getAd($_POST['id']);
            echo json_encode($ad->get_vars());
            break;
        case 'search':
            break;
        
        default:
            break;
    }