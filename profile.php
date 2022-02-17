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
                        <li class="li_profile"><button class="but_profile">Корзина</button></li>
                        <li class="li_profile"><button class="but_profile">Мой адрес</button></li>
                        <li class="li_profile"><button class="but_profile">Способы оплаты</button></li>
                        <li class="li_profile"><button class="but_profile">Мои заказы</button></li>
                    </ul>
                    <div class="block_profile_right">
                        <h1 class="h1_type_profile">Корзина</h1>
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
                        <div class="shop_bracelets_block">
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
                        <?php
                        if (count($id_prod)){
                            echo "<button class='buy_tovar'>Оформить заказ</button>";
                        }else{
                            echo '<h1 class="left_pusto">Ваша корзина пуста!</h1>';
                        }
                        ?>


                    </div>
                </div>

            </div>


        </div>
    </section>
<?php

    require 'footer.php';

?>