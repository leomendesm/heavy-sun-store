</main>

<footer class="page-footer black" style="position: -webkit-sticky;">
    <div class="container">
        <div class="row">
            <div class="col l9 m9 s12">
                <h5 class="white-text">HEAVY SUN CLOTHING</h5>
                <p class="grey-text text-lighten-4">Descrição</p>
            </div>
            <div class="col l3 m3 offset-m3">
                <ul>
                    <li><a class="white-text" href="/login">Login</a></li>
                    <li><a class="white-text" href="/contact_us">Carrinho</a></li>
                    <li><a class="white-text" href="/about">Sobre</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright grey darken-4">
        <div class="container">
            Todos os direitos reservados
        </div>
    </div>
</footer>
</body>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>
<script src="js/init.js"></script>
<script>
    (function ($) {
        $(function () {
            var islog = <?php
            if(isset($_SESSION["id"])) {
                echo $_SESSION["id"];
            }else{ echo "null"; }?>;
            var auto = <?php
            if(isset($_SESSION["auto"])) {
                echo $_SESSION["auto"];
            }else{ echo "null"; } ?>;
            if (islog != "" && islog != null) {
                $('#shop').show();
                $("#acc").show();
                $("#logout").show();
                $('#log').hide();
                $("#cad").hide();
                $('#comprar').removeClass("disabled");
            }
            if(auto == 1  && auto != null){
                $('#prodger').show();
            }
        })
    })(jQuery);
</script>
<?php mysqli_close($con); ?>

    </html>
