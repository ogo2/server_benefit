let text_tovar = document.querySelector('.shop_bracelets_block')
let address = document.querySelector('.adress_hiden')
var but_korsina = document.querySelector('.block_button_korsina')
var h1_korsina = document.querySelector('.h1_type_profile')
var card_form = document.querySelector('.card_form')
var basket_korsin = document.querySelector('.num_tov')
var buy_tovar = document.querySelector('.buy_tovar')

var id_tovar = 0;
$(document).on('click', '.delete_from_basket', function (){
   id_tovar = this.value;
});
$(document).ready(function(){
    var user = '';
    $.get('php_new/aj.php', {text: this.value}, function(data){
        user = data
    });
    $(document).on('click', '.delete_from_basket', function (){
        $.post('php_new/delete.php', {text: this.value}, function(data){


            var fuck = '../basket/basket.json';
            var request;
            var product_id = id_tovar;
            var tovar_from_basket = document.getElementById(`${product_id}`);
            request = new XMLHttpRequest();
            tovar_from_basket.style.display='none';
            request.open('GET', '../basket/basket.json')
            request.onreadystatechange = function () {
                if(request.readyState === 4){
                    if (request.status === 200 || request.status === 0){
                        var item = JSON.parse(request.responseText);
                        console.log(Object.keys(item).length);
                        for (let i=0; i<Object.keys(item).length; i++) {
                            var name2 = item[i].name;

                            if (name2 === user){
                                var k = Object.keys(item[i].basket).length ;

                                if (k >0){
                                    basket_korsin.style.display = '';
                                    var num_f = Object.keys(item[i].basket).length
                                    basket_korsin.innerHTML = num_f;
                                }else{
                                    basket_korsin.style.display = 'none';
                                    buy_tovar.style.display = 'none';
                                    but_korsina.innerHTML = '<h1 class="left_pusto">Ваша корзина пуста!</h1>'
                                }
                                console.log(item[i].basket)
                            }

                        }
                    }
                }
            }
            request.send();
        });
    });
    $(document).on('click', '.buy_tovar_button', function (){

        $.post('php_new/buy.php', {text: this.value}, function(data){
            var fuck = '../basket/basket.json';
            var request;
            request = new XMLHttpRequest();
            request.open('GET', '../basket/basket.json')
            request.onreadystatechange = function () {
                if(request.readyState === 4){
                    if (request.status === 200 || request.status === 0){
                        var item = JSON.parse(request.responseText);
                        console.log(Object.keys(item).length);
                        for (let i=0; i<Object.keys(item).length; i++) {
                            var name2 = item[i].name;

                            if (name2 === user){
                                var k = Object.keys(item[i].basket).length ;

                                if (k >0){
                                    basket_korsin.style.display = '';
                                    var num_f = Object.keys(item[i].basket).length
                                    basket_korsin.innerHTML = num_f;
                                }else{
                                    basket_korsin.style.display = 'none';

                                }
                                console.log(item[i].basket)
                            }

                        }
                    }
                }
            }
            request.send();
        });
    });
     var fuck = '../basket/basket.json';
        var request;
        request = new XMLHttpRequest();
        request.open('GET', '../basket/basket.json')
        request.onreadystatechange = function () {
            if(request.readyState === 4){
                if (request.status === 200 || request.status === 0){
                    var item = JSON.parse(request.responseText);
                    for (let i=0; i<Object.keys(item).length; i++) {
                        var name2 = item[i].name;

                        if (name2 === user){
                            var k = Object.keys(item[i].basket).length ;

                            if (k >0){
                                basket_korsin.style.display = '';
                                var num_f = Object.keys(item[i].basket).length
                                basket_korsin.innerHTML = num_f;
                            }else{
                                basket_korsin.style.display = 'none';

                            }
                            console.log(item[i].basket)
                        }

                    }
                }
            }
        }
        request.send();

    $(document).on('click', '.but_profile', function(){
        console.log(this.value)

        if(this.value==='korsin'){
            $('.h1_type_profile').html('Корзина');
            h1_korsina.style.display = '';
            h1_korsina.innerHTML = 'Корзина';
            text_tovar.style.display = '';
            address.style.display = 'none';
            but_korsina.style.display = '';
            card_form.style.display = 'none';

        }if(this.value==='street'){
            console.log(this.value)

            $('.h1_type_profile').html('Мой адрес');
            h1_korsina.style.display = '';
            h1_korsina.innerHTML = 'Мой адрес';
            text_tovar.style.display = 'none';
            address.style.display = '';
            card_form.style.display = 'none';

            but_korsina.style.display = 'none';
        }if(this.value==='buy'){
            console.log(this.value)
            h1_korsina.style.display = '';
            h1_korsina.innerHTML = 'Способ оплаты';
            card_form.style.display = '';
            text_tovar.style.display = 'none';
            address.style.display = 'none';
            but_korsina.style.display = 'none';

        }if(this.value==='my_tovar'){
            console.log('4')
        }
    });





    // function ajaxGet(){
    //     var request = new XMLHttpRequest();
    //     request.onreadystatechange = function(){
    //         if (request.readyState === 4 && request.status === 200){
    //             document.querySelector('.buy_tovar_button').innerHTML = 'good';
    //         }
    //     }
    //     request.open('POST', 'php_new/buy.php');
    //     request.send()
    // }
});