<?php session_start();
    if ($_SESSION['user']){
        header('Location: profile.php');
    }
?>
<?php require 'header.php' ?>
<section>
    <div class="content_zone1">
        <div class="register">
            <div class="head_reg">
                <h1>Мой аккаунт</h1>
            </div>
            <div class="center_div">
                <div class="form1">
                    <h2 class="te">Вход</h2>
                    <form action="php_new/sign_in_user.php" method="post">
                        <ul>
                            <li>
                                <label for="name"><p>Имя пользователя или E-Mail</p></label>
                                <input class="form_inp" aria-invalid="false" required  type="text" id="name" name="login" placeholder="Введите Ваш e-mail">
                            </li>
                            <li>
                                <label for="password"><p>Пароль</p></label>
                                <input class="form_inp" aria-invalid="false" required  type="password" id="password" name="password" placeholder="Введите пароль">
                            </li>
                            <button class="butttt" type="submit">
                                <a href=""><p>ВОЙТИ</p></a>
                            </button>
                            <p>
                                <?php
                                echo $_SESSION['test'];
                                unset($_SESSION['test'])
                                ?>

                            </p>
                            <input  class="save_me_input" type="checkbox" name="browser" checked>
                            <p class="save_me">Запомнить меня</p>
                            <div class="butttt2">
                                <a class="link_pass" href="404.html">Забыли пароль?</a>
                            </div>
                        </ul>

                    </form>

                </div>
                <div class="form1">
                    <h2 class="te">Регистрация</h2>
                    <form action="/php_new/register_user.php" method="post">
                        <ul>
                            <li>
                                <label for="mail"><p>E-mail</p></label>
                                <input class="form_inp" type="email" required  aria-invalid="false" id="mail" name="mail" placeholder="Введите Ваш e-mail">
                            </li>
                            <li>
                                <label for="tel"><p>Номер телефона</p></label>
                                <input class="form_inp" type="tel" required  aria-invalid="false" id="tel" name="tel" pattern="\s[0-9]{,3}\s[0-9]{,3}-[0-9]{,2}-[0-9]{,2}" placeholder="Введите Ваш номер телефона">
                            </li>
                            <li>
                                <label for="login"><p>Логин</p></label>
                                <input class="form_inp" type="text" required  aria-invalid="false" id="login" name="login" placeholder="Придумайте имя пользователя">
                            </li>
                            <li>
                                <label for="name"><p>Имя</p></label>
                                <input class="form_inp" type="text" required  aria-invalid="false" id="name" name="name" placeholder="Введите Ваше имя">
                            </li>
                            <li>
                                <label for="first_name"><p>Фамилия</p></label>
                                <input class="form_inp" type="text" required  aria-invalid="false" id="first_name" name="first_name" placeholder="Введите Вашу фамилию">
                            </li>
                            <li>
                                <label for="password"><p>Пароль</p></label>
                                <input class="form_inp" type="password" required  aria-invalid="false" id="password" name="password" placeholder="Придумайте пароль">
                            </li>
                            <li>
                                <label for="password"><p>Подтверждение пароля</p></label>
                                <input class="form_inp" type="password" required  aria-invalid="false" id="password" name="password_confirm" placeholder="Введите пароль повторно">
                            </li>
                            <?php
                                if ($_SESSION['message']){
                                    $sess = $_SESSION["message"];
                                    echo '<p>'.$sess.'</p>';
                                }unset($_SESSION['message'])
                            ?>
                            <button class="butttt" type="submit">
                                <a href=""><p>РЕГИСТРАЦИЯ</p></a>
                            </button>

                        </ul>

                    </form>
                </div>
            </div>
        </div>

        <!--            <div class="foot">&ndash;&gt;-->
        <!--                <h4>Benefit Epoxy Resin ©️ 2021 </h4>-->
        <!--            </div>-->
    </div>

<?php require 'footer.php' ?>
