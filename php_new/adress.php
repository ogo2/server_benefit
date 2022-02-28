<?php
    session_start();
    $user = $_SESSION['user']['id'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $region = $_POST['region'];
    $post_index = $_POST['post_index'];
    $num_home = $_POST['num_home'];
    $but = $_POST['button_add'];
    $num_card = $_POST['num_card'];
    $valid_date = $_POST['valid_date'];
    $cvc = $_POST['cvc'];
    $name_card = $_POST['name_card'];
    echo $but;

    function add_adress($user, $country, $city, $street, $region, $post_index, $num_home)
        {
            $connect = mysqli_connect('localhost', 'root', '', 'vpt');

            $post_adress = "INSERT INTO adress (country, region, city, street, post_index, num_home, user_id) VALUES ('$country', '$region', '$city', '$street', $post_index, '$num_home', $user)";
            mysqli_query($connect, $post_adress);
        }
    function delete_adress($user)
        {
            $connect = mysqli_connect('localhost', 'root', '', 'vpt');
            $delete_adress = "DELETE FROM `adress` WHERE `user_id`= $user";
            mysqli_query($connect, $delete_adress);

        }
    function delete_card($user)
        {
            $connect = mysqli_connect('localhost', 'root', '', 'vpt');
            $delete_adress = "DELETE FROM `buy_card` WHERE `user_id`= $user";
            mysqli_query($connect, $delete_adress);
        }
    function add_card($user, $num_card, $valid_date, $cvc, $name_card)
        {
//            echo "$user<br>$num_card<br>$valid_date<br>$cvc<br>$name_card";
            $connect = mysqli_connect('localhost', 'root', '', 'vpt');
            $post_adress = "INSERT INTO `buy_card` (id_user, num_card, valid_date, cvc, name) VALUES ($user, '$num_card', '$valid_date', '$cvc', '$name_card')";
            mysqli_query($connect, $post_adress);

        }
    if ($but === 'add_adress'){
        add_adress($user, $country, $city, $street, $region, $post_index, $num_home);
        header('Location: ../profile.php');

    }if($but === 'delete_adress'){
        delete_adress($user);
        header('Location: ../profile.php');

    }if($but === 'delete_card'){
        delete_card($user);
        header('Location: ../profile.php');

    }if($but === 'add_card'){
        add_card($user, $num_card, $valid_date, $cvc, $name_card);
        header('Location: ../profile.php');

}
    ?>