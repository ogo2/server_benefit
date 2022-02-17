<?php
session_start();
if (!$_SESSION['user']){
    $_SESSION['message'] = 'Войдите или зарегестрируйте прежде чем добавлять товар в корзину!';
    header('Location: ../register.php');
}
$tovar = $_POST['delete_product'];
$res = file_get_contents('../basket/basket.json');
//    print_r($res);
$name_user = $_SESSION['user']["login"];
//echo $name_user;
$data = json_decode($res, true);
//    echo $tovar;
for ($i=0; $i<count($data); $i++){
    if ($data[$i]['name']===$name_user){
//        array_push($data[$i]['basket'], (int)$tovar);
        $key = array_search((int)$tovar, $data[$i]['basket']);
        echo $key;
        unset($data[$i]['basket'][$key]);
        print_r($data[$i]['basket']);
        break;

    }
}
$jsonData = json_encode($data);
file_put_contents('../basket/basket.json', $jsonData);
header("Location:".$_SERVER['HTTP_REFERER']);

//    $plus_tovar_basket = "INSET INTO `users` (basket) VALUES ()"

?>
