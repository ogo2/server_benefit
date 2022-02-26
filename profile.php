<?php
    session_start();
    require 'header.php';
    if (!$_SESSION['user']){
        header('Location: register.php');
}
?>
    <section>

        <div class="content_zone1">
            <div class="info">

                <h2>Профиль</h2>
                <div class="block_seen2">
                    <h1 class="h1_profile"><?= $_SESSION['user']['name'] ?> <?= $_SESSION['user']['first_name'] ?></h1>
                    <ul class="ul_profile">
                        <li class="li_profile"><button value="korsin" class="but_profile">Корзина</button></li>
                        <li class="li_profile"><button value="street" class="but_profile">Мой адрес</button></li>
                        <li class="li_profile"><button value="buy" class="but_profile">Способы оплаты</button></li>
                        <li class="li_profile"><button value="my_tovar" class="but_profile">Мои заказы</button></li>
                    </ul>
                    <div class="block_profile_right">
                        <h1 style="display: none" class="h1_type_profile"></h1>
                        <?php
                            $res = file_get_contents('basket/basket.json');
                            $name_user = $_SESSION['user']["login"];
                            $data = json_decode($res, true);
                        for ($i=0; $i<count($data); $i++){
                            if ($data[$i]['name']===$name_user){
                                $id_prod = $data[$i]['basket'];
                                break;
                            }
                        }
                        ?>
                        <div style="display: none" class="shop_bracelets_block">
                            <?php
                            $CONNECT = mysqli_connect('localhost', 'root','', 'vpt');
                                foreach($id_prod as $help_me){
                                    $get_product = "SELECT * FROM `product` WHERE `id` = $help_me";
                                    $result = mysqli_query($CONNECT, $get_product);
                                    $product = mysqli_fetch_all($result);

                                    foreach ($product as $inf_prod) {
                                        $product_id = $inf_prod[0];

                                        $product_name = $inf_prod[1];
                                        $price = $inf_prod[2];
                                        $photo = $inf_prod[4];
                                        echo "<div class='bracelets_block'>
                                                <img src='$photo'>
                                                <div class='name_bracelets'>
                                                    <p>$product_name</p>
                                                </div>
                                                <p>$price$</p>
                                                <form action='php_new/delete.php' method='post'>
                                                    <button value='$product_id' name='delete_product'>Убрать из корзины</button>
                                                </form>
                                            </div>";
                                    }
                                }
                            ?>


                        </div>
                        <div class="block_button_korsina" style="display: none">
                            <?php
                            if (count($id_prod)){
                                echo "<button  class='buy_tovar'>Оформить заказ</button>";
                            }else{
                                echo '<h1 class="left_pusto">Ваша корзина пуста!</h1>';
                            }
                            ?>
                        </div>
                        <form style="display: none" action="php_new/adress.php" class="adress_form" method="post">
                            <?php
                                $connect = mysqli_connect('localhost', 'root', '', 'vpt');
                                $user_id = $_SESSION['user']['id'];
                                $adress_user = "SELECT * FROM adress WHERE `user_id`='$user_id'";
                                $result = mysqli_query($connect, $adress_user);
                                $all_result = mysqli_fetch_all($result);
                                if ($lol=mysqli_num_rows($result)){

                                    foreach ($all_result as $adress) {
                                        $country = $adress[1];
                                        $region = $adress[2];
                                        $city = $adress[3];
                                        $street = $adress[4];
                                        $post_index = $adress[5];
                                        $num_home = $adress[6];
                                        $user_id = $adress[7];

                                        echo "<ul>
                                    <li>
                                        <label><p>Страна: $country</p></label>
                                    </li>
                                    <li>
                                        <label><p>Регион: $region</p></label>
                                    </li>
                                    <li>
                                        <label><p>Город: $city</p></label>
                                    </li>
                                    <li>
                                        <label><p>Улица: $street</p></label>
                                    </li>
                                    <li>
                                        <label><p>Почтовый индекс: $post_index</p></label>
                                    </li>";
                                        if ($num_home) {
                                            echo "<li>
                                                <label><p>Номер дома: $num_home</p></label>
                                            </li>";
                                        }
                                    echo '<button class="butttt" value="delete_adress" type="submit">
                                    <a href=""><p>Удалить адрес</p></a>
                                </button>';
                                    }
                                    }else{
                                    echo '<ul>
                                <li>
                                    <label for="country"><p>Страна</p></label>
                                    <input class="form_inp" aria-invalid="false" required  type="text" id="country" name="country" placeholder="Росиия">
                                </li>
                                <li>
                                    <label for="region"><p>Регион</p></label>
                                    <input class="form_inp" aria-invalid="false" required  type="text" id="region" name="region" placeholder="Ленинградская область">
                                </li>
                                <li>
                                    <label for="city"><p>Город</p></label>
                                    <input class="form_inp" aria-invalid="false" required  type="text" id="city" name="city" placeholder="Волхов">
                                </li>
                                <li>
                                    <label for="street"><p>Улица и номер дома</p></label>
                                    <input class="form_inp" aria-invalid="false" required  type="text" id="street" name="street" placeholder="Пушкина, 15">
                                </li>
                                
                                <li>
                                    <label for="post_index"><p>Почтовый индекс</p></label>
                                    <input class="form_inp" aria-invalid="false" required  type="text" id="post_index" name="post_index" placeholder="187401">
                                </li>
                                <li>
                                    <label for="num_home"><p>Номер квартиры (необязательно)</p></label>
                                    <input class="form_inp" aria-invalid="false"  type="text" id="num_home" name="num_home" placeholder="23">
                                </li>
                                <button class="butttt" name="button_add" value="add_adress" type="submit">
                                    <a href=""><p>Добавить адрес</p></a>
                                </button>
                                <p>


                                </p>


                            </ul>';
                                }
                            ?>


                        </form>
                        <form style="display: none" action="php_new/adress.php" class="card_form" method="post">
                            <?php
                                $connect = mysqli_connect('localhost', 'root', '', 'vpt');
                                $user_id = $_SESSION['user']['id'];
                                $adress_user = "SELECT * FROM buy_card WHERE `id_user`='$user_id'";
                                $result = mysqli_query($connect, $adress_user);
                                $all_result = mysqli_fetch_all($result);
                                if ($lol=mysqli_num_rows($result)){
                                    foreach ($all_result as $lol) {
                                        $num_card = substr($lol[2], 15);
                                        echo "<ul>
                                    <li>
                                        <label for='name'><p>Номер карты: $num_card</p></label>
                                    </li>
                                    <li>
                                        <label for='name'><p>Срок действия: $lol[3]</p></label>
                                    </li>
                                    <li>
                                        <label for='name'><p>Имя владельца: $lol[5]</p></label>
                                    </li>
                                    <button class='butttt' name='button_add' value='delete_card' type='submit'>
                                    <a href=''><p>Добавить карту</p></a>
                                </button>";
                                    }
                                }else{
                                    echo "<ul>
                                <li>
                                    <label for='name'><p>Номер карты</p></label>
                                    <input class='form_inp' pattern='[0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4}' inputmode='numeric' aria-invalid='false' required  type='text' id='name' name='num_card' placeholder='1111 1111 1111 1111'>
                                </li>
                                <li>
                                    <label for='name'><p>Срок действия</p></label>
                                    <input class='form_inp' pattern='[0-9]{2}\/[0-9]{2}' inputmode='numeric' aria-invalid='false' required  type='text' id='name' name='valid_date' placeholder='12/22'>
                                </li>
                                <li>
                                    <label for='name'><p>CVC</p></label>
                                    <input class='form_inp' pattern='[0-9]{3}' inputmode='numeric' aria-invalid='false' required  type='text' id='name' name='cvc' placeholder='111'>
                                </li>
                                <li>
                                    <label for='name'><p>Имя</p></label>
                                    <input class='form_inp'  inputmode='numeric' aria-invalid='false' required  type='text' id='name' name='name_card' placeholder='IVANOV IVAN'>
                                </li>
                                <button class='butttt' name='button_add' value='add_card' type='submit'>
                                    <a href=''><p>Добавить карту</p></a>
                                </button>
                                <p>
                                    

                                </p>


                            </ul>";
                                };
                                ?>


                        </form>

                    </div>
                </div>

            </div>


        </div>
    </section>

<?php

    require 'footer.php';

?>