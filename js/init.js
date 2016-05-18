(function ($) {
    $(function () {
        $('.button-collapse').sideNav();
        $('.parallax').parallax();
        $('.modal-trigger').leanModal();
        $('select').material_select();
        $('ul.tabs').tabs();
        $('#prodger').hide();
        $("#cep").mask("99999-999");
        $("#cpf").mask("999.999.999-99");
        $('#acc').hide();
        $('#shop').hide();
        $('#logout').hide();
        $("#erro").hide();
        $('#submit').click(function () {
            $('#prog_reg').show();
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
                    if (result == 1) {
                        $('#mcad').closeModal();
                        $('#mlogin').openModal();
                    } else {
                        $('#erro').show();
                    }
                }
            })
            return false;
        })
    });
    $('#logar').click(function () {
        var senha = $('#lsenha').val();
        var email = $('#lemail').val();
        $.ajax({
            url: "logar.php",
            type: "post",
            data: "senha=" + senha + "&email=" + email,
            success: function (result) {
                console.log(result);
                if (result == 0) {
                    $('#mlogin').closeModal();
                    $('#cad').hide();
                    $('#log').hide();
                    $('#acc').show();
                    $('#shop').show();
                    $('#logout').show();
                    $('#prodger').remove();
                }else if(result == 1) {
                    $('#mlogin').closeModal();
                    $('#cad').hide();
                    $('#log').hide();
                    $('#acc').show();
                    $('#shop').show();
                    $('#logout').show();
                    $('#prodger').show();
                } else {
                    $('#erro').show();
                }
            }
        })
        //return false;
    });
    $('#comprar').click(function () {
        var idprod = $('#idprod').val();
        var tam = $('#selecttam').val();
        if (tam != null) {
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
        }
    });
})(jQuery);
