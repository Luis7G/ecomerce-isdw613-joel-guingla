<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $errors = false;
    if (
        isset($_POST["nombre"]) && $_POST["nombre"] != ""
        && isset($_POST["edad"]) && $_POST["edad"] != ""
        && isset($_POST["email"]) && $_POST["email"] != ""
    ) {
        echo 'Nombre: ' .  $_POST["nombre"] . '<br>';
        echo 'Edad: ' . $_POST["edad"] . '<br>';
        echo 'Email: ' . $_POST["email"] . '<br>';
    } else {
        echo "Todos los campos son requeridos";
    }
    ?>


</body>

</html>