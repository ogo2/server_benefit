<?php
    session_start();
    if (!$_SESSION['user']){
        $_SESSION['message'] = 'Войдите или зарегестрируйте прежде чем добавлять товар в корзину!';
        echo 'Войдите или зарегестрируйте прежде чем добавлять товар в корзину!';
    }else {
        $tovar = $_POST['text'];
        $res = file_get_contents('../basket/basket.json');
        //    print_r($res);
        $name_user = $_SESSION['user']["login"];

        $data = json_decode($res, true);
        //    echo $tovar;
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['name'] === $name_user) {
                array_push($data[$i]['basket'], (int)$tovar);
                print_r($data[$i]['basket']);

            }
        }
        $jsonData = json_encode($data);
        file_put_contents('../basket/basket.json', $jsonData);
//        echo $name_user;
    }
//    $plus_tovar_basket = "INSET INTO `users` (basket) VALUES ()"

?>
