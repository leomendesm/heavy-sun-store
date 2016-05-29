</main>

<footer class="page-footer white">
    <div class="footer-copyright grey darken-4">
        <div class="container center">
            Todos os direitos reservados
        </div>
    </div>
</footer>
</body>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="/projeto/js/materialize.min.js"></script>
<script src="/projeto/js/jquery.maskedinput.min.js" type="text/javascript"></script>
<script src="/projeto/js/init.js"></script>
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
