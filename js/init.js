(function ($) {
    $(function () {
        $('.button-collapse').sideNav();
        $('.parallax').parallax();
        $('.modal-trigger').leanModal();
        $('select').material_select();
        $("#cep").mask("99999-999");
        $("#cpf").mask("999.999.999-99");
        $("#erro").hide();
        $('#submit').click(function () {
            $('#prog_reg').show();
            var nome = $('#nome').val(); //Pega valor do campo nome
            var email = $('#email').val(); //Pega valor do campo email
            var senha = $('#pass').val(); //Pega valor do campo senha
            var csenha = $('#cpass').val(); //Pega valor do campo confirmar senha
            var end = $('#end').val(); //Pega valor do campo endereço
            var cep = $('#cep').val(); //Pega valor do campo cep
            var cpf = $('#cpf').val(); //Pega valor do campo cpf
            $.ajax({ //Função AJAX
                url: "register.php", //Arquivo php
                type: "post", //Método de envio
                data: "nome=" + nome + "&senha=" + senha + "&email=" + email + "&csenha=" + csenha + "&end=" + end + "&cep=" + cep + "&cpf=" + cpf
                , success: function (result) { //Sucesso no AJAX
                    if (result == 1) {
                        $('#modal1').closeModal();
                        $('#modal2').openModal();
                    } else {
                        $('#erro').show();
                    }
                }
            })
            return false; //Evita que a página seja atualiza
        })
    });
    $('#logar').click(function () {
        $('#prog_reg').show();
        var senha = $('#lsenha').val(); //Pega valor do campo nome
        var email = $('#email').val(); //Pega valor do campo email
        $.ajax({ //Função AJAX
            url: "logar.php", //Arquivo php
            type: "post", //Método de envio
            data: "senha=" + senha + "&email=" + email
            , success: function (result) { //Sucesso no AJAX
                if (result == 1) {
                    $('#modal1').closeModal();
                    $('#modal2').openModal();
                } else {
                    $('#erro').show();
                }
            }
        })
        return false; //Evita que a página seja atualiza
    });
})(jQuery); // end of jQuery name space