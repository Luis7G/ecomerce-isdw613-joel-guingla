<html>
    <body>
        <h1>
            N&uacute;mero de elementos en carrito
        </h1>
        <?php
            if (isset($_COOKIE['ecommerce-cookie-cart-items'])) {
                echo $_COOKIE['ecommerce-cookie-cart-items'];
            }else {
                echo "No especificado";
            }
        ?>
        <script>
            console.log(document.cookie);
        </script>
    </body>
</html>