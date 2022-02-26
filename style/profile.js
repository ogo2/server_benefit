let text_tovar = document.querySelector('.shop_bracelets_block')
let address = document.querySelector('.adress_form')
var but_korsina = document.querySelector('.block_button_korsina')
var h1_korsina = document.querySelector('.h1_type_profile')
var card_form = document.querySelector('.card_form')


$(document).ready(function(){
    $(document).on('click', '.but_profile', function(){
        if(this.value==='korsin'){
            $('.h1_type_profile').html('Корзина');
            h1_korsina.style.display = '';
            h1_korsina.innerHTML = 'Корзина';
            text_tovar.style.display = '';
            address.style.display = 'none';
            but_korsina.style.display = '';
            card_form.style.display = 'none';

        }if(this.value==='street'){
            $('.h1_type_profile').html('Мой адрес');
            h1_korsina.style.display = '';
            h1_korsina.innerHTML = 'Мой адрес';
            text_tovar.style.display = 'none';
            address.style.display = '';
            card_form.style.display = 'none';

            but_korsina.style.display = 'none';
        }if(this.value==='buy'){
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

    var fuck = '../basket/basket.json';
    var request;
    request = new XMLHttpRequest();
    request.open('GET', '../basket/basket.json')
    request.onreadystatechange = function () {
        if(request.readyState === 4){
            if (request.status === 200 || request.status === 0){
                var item = JSON.parse(request.responseText);
                console.log(item);
            }
        }
    }


    request.send();
    $(document).on('click', '.buy_tovar_button', function (){

        $.post('php_new/buy.php', {text: this.value}, function(data){
            alert(data)
        });
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