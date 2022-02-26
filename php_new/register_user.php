<?php
    session_start();
    $CONNECT = mysqli_connect('localhost', 'root','', 'vpt');


    $email = $_POST['mail'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $phone = $_POST['tel'];
    $name = $_POST['name'];
    $first_name = $_POST['first_name'];
    $get_username = "SELECT * FROM users WHERE login='$login' OR e_mail='$email' OR phone=$phone";
    $post_pass = password_hash($password, PASSWORD_DEFAULT);
    $post_user = "INSERT INTO users (e_mail, login, password, phone, name, first_name) VALUES ('$email', '$login', '$post_pass', $phone, '$name', '$first_name')";
    $result = mysqli_query($CONNECT, $get_username);
//    $sql = "INSERT INTO users (login) VALUES ('Tom')";
//    $result = mysqli_query($CONNECT, $sql);
    $full = $result->num_rows;
    if ($full>0){
        $_SESSION['message'] = 'Пользователь с таким логином или почтой уже существует';
        header('Location: ../register.php');
    }else{
        if ($password === $password_confirm){
            mysqli_query($CONNECT, $post_user);
            $_SESSION['message'] = 'Пользователь успешно зарегестророван';
            echo $phone;
            echo $name;
            echo $first_name;
//            header('Location: ../register.php');
        }else{
            $_SESSION['message'] = 'Пароли не совпадают';
            header('Location: ../register.php');
        }
    }
//    foreach ($result as $row) {
//        echo " id = " . $row['login'] . "\n";
//    }
//        echo  $full[6];
//    foreach($result as $suka){
//        echo $suka['login'];
//        if($suka['login'] === $login){
//            echo 'Пользователь с таким именем уже существует';
//            break;
//        }else{
//            echo 'пользователь успешно добавлен';
//        }
//    }
//    while ($row = mysqli_fetch_array($result)) {
//        print("Город: " . $row['login'] . "; Идентификатор: . " . $row['id'] . "<br>");
//    }
//    if ($result){
//        echo "гуд";
//        echo $result['login'];
//    }else{
//        echo 'error';
//    }
    mysqli_close($CONNECT);
?>
