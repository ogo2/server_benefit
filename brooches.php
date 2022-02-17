<?php
    session_start();
    require 'header.php';
    $CONNECT = mysqli_connect('localhost', 'root','', 'vpt');
    $get_product = "SELECT * FROM `product` WHERE `category` = 'Броши'";
    $result = mysqli_query($CONNECT, $get_product);
    $product = mysqli_fetch_all($result);
?>
    <section>
        <div class="content_zone1">
            <h1 class="">Броши</h1>
            <div class="shop_bracelets_block">
                <?php
                    foreach ($product as $brooches){
                        $product_id = $brooches[0];
                        $product_name = $brooches[1];
                        $photo = $brooches[4];
                        $price = $brooches[2];

                        echo "<div class='bracelets_block'>
                    <img src='$photo'>
                    <div class='name_bracelets'>
                        <p>$product_name</p>
                    </div>
                    <p>$price$</p>
                    <form action='php_new/buy.php' method='post'>
                        <button value='$product_id' name='buy'>В корзину</button>
                    </form>
                </div>";
                }
                ?>

            </div>
        </div>
    </section>

<?php
    require 'footer.php';
?>