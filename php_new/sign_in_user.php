<?php
session_start();
$CONNECT = mysqli_connect('localhost', 'root','', 'vpt');


$login = $_POST['login'];
$password = $_POST['password'];
$get_user = "SELECT * FROM `users` WHERE `login` = '$login'";
$get_password = "SELECT password FROM `users` WHERE `login` = '$login'";
$result2 = mysqli_query($CONNECT, $get_password);
$fuck =mysqli_fetch_row($result2);
//print_r(mysqli_fetch_row($result2));
//echo $fuck[0];
$full_pass = password_verify($password, $fuck[0]);
echo $full_pass;
$result = mysqli_query($CONNECT, $get_user);
//print_r($result);
echo mysqli_num_rows($result);
if (mysqli_num_rows($result) >0){
    if (password_verify($password, $fuck[0])){
        $user = mysqli_fetch_assoc($result);
        print_r($user);
        $_SESSION['user'] = [

            'id' => $user['id'],
            'login' => $user['login'],
            'name' => $user['name'],
            'first_name' => $user['first_name'],
            'email' => $user['e_mail'],
            'phone' => $user['phone']
        ];
        header('Location: ../profile.php');
    }else{
        $_SESSION['test'] = 'Неправельный логин или пароль';
        header('Location: ../register.php');

    }
}else{
    $_SESSION['test'] = 'Неправельный логин или пароль';
    header('Location: ../register.php');

}
//if(mysqli_num_rows($result)>0){
//    //good
//    echo 'good';
//}else{
//    $_SESSION['message']= 'Не верный логин или пароль';
//    header('Location: ../register.php');
//}
?>