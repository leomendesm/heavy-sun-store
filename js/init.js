(function ($) {
    $(function () {
        $('.button-collapse').sideNav();
        $('.parallax').parallax();
        $('.modal-trigger').leanModal();
        $('select').material_select();
        $('ul.tabs').tabs();
        $('.collapsible').collapsible({
          accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        });
        $("#cep").mask("99999-999");
        $("#cpf").mask("999.999.999-99");
        $('#acc').hide();
        $('#macc').hide();
        $('#shop').hide();
        $('#mshop').hide();
        $('#logout').hide();
        $('#mlogout').hide();
        $('#prodger').hide();
        $('#mprodger').hide();
        $("#erro").hide();
        $('#submit').click(function () {
            var nome = $('#nome').val();
            var email = $('#email').val();
            var senha = $('#pass').val();
            var csenha = $('#cpass').val();
            var end = $('#end').val();
            var cep = $('#cep').val();
            var cpf = $('#cpf').val();
            $.ajax({
                url: "register.php",
                type: "post",
                data: "nome=" + nome + "&senha=" + senha + "&email=" + email + "&csenha=" + csenha + "&end=" + end + "&cep=" + cep + "&cpf=" + cpf,
                success: function (result) {
                    console.log(result);
                    if (result == 1) {
                        $('#mcad').closeModal();
                        $('#mlogin').openModal();
                    } else {
                        Materialize.toast('Campos incorretos ou já existem cadastros semelhantes!', 3000);
                    }
                }
            })
            return false;
        })
    });
    $('#logar').click(function () {
        var senha = $('#lsenha').val();
        var email = $('#lemail').val();
        var remember = $('#remember').is(':checked');
        console.log(remember);
        $.ajax({
            url: "logar.php",
            type: "post",
            data: "senha=" + senha + "&email=" + email + "&remember=" + remember,
            success: function (result) {
                if (result == 0) {
                    $('#mlogin').closeModal();
                    $('#cad').hide();
                    $('#mcad').hide();
                    $('#log').hide();
                    $('#mlog').hide();
                    $('#acc').show();
                    $('#macc').show();
                    $('#shop').show();
                    $('#mshop').show();
                    $('#logout').show();
                    $('#mlogout').show();
                    $('#prodger').remove();
                    $('#mprodger').remove();
                    $('#comprar').removeClass('disabled');
                }else if(result == 1) {
                    $('#mlogin').closeModal();
                    $('#cad').hide();
                    $('#mcadastro').hide();
                    $('#log').hide();
                    $('#mlog').hide();
                    $('#acc').show();
                    $('#macc').show();
                    $('#shop').show();
                    $('#mshop').show();
                    $('#logout').show();
                    $('#mlogout').show();
                    $('#prodger').show();
                    $('#mprodger').show();
                    $('#comprar').removeClass('disabled');
                } else {
                    Materialize.toast('Usuário ou senha incorretos!', 3000);
                }
            }
        })
        //return false;
    });
    $('#comprar').click(function () {
        var idprod = $('#idprod').val();
        var tam = $('#selecttam').val();
        var disabled = $('#comprar').hasClass('disabled');
        if (tam != null && disabled == false) {
            $.ajax({
                url: "add_car.php",
                type: "post",
                data: "idprod=" + idprod + "&tamanho=" + tam,
                success: function (result) {
                    console.log(result);
                    if (result == 1) {
                        Materialize.toast('Item Adicionado ao Carrinho', 3000);
                    } else {
                        Materialize.toast('Algo deu errado!', 3000);
                    }
                }
            })
            return false;
        }else if(disabled == true){
            Materialize.toast('Inicie uma sessão para comprar!', 3000);
        }else{
            Materialize.toast('Selecione um tamanho!', 3000);
        }
    });
})(jQuery);
