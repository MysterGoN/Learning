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
            $ad = new ad(dataForm());
            $err = $errors->ad_error_check($ad, $smarty);
            if ($err['status']) {
                $result['status'] = 'error';
                $result['message'] = "Заполните пожалуйста поле!";
                $result['fields'] = $err['fields'];
                $result['all_fields'] = $err['all_fields'];
                echo json_encode($result);
            } else {
                $result['status'] = 'success';
                $result['message'] = "Товар успешно добавлен/изменен!";
                $result['all_fields'] = $err['all_fields'];
                $ads->addAd($ad);
                $ads->getAdsFromDB();
                $tmpad = $ads->getLastAd();
                $result['ad_id'] = $tmpad->get_id();
                echo json_encode($result);
            } 
            break;
        case 'edit':
            $ad = $ads->getAd($_POST['id']);
            echo json_encode($ad->get_vars());
            break;
        case 'search':
            break;
        case 'form':
            $ad = new ad();
            echo json_encode($ad);
            break;
        default:
            break;
    }