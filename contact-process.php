<!-- Este es un formulario HTML que utiliza PHP para procesar la información cuando se envía a través del método POST. -->

<!-- Verifica si la solicitud es de tipo POST -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Función para validar si un campo está lleno
    function validateNotEmpty($value, $fieldName)
    {
        if (empty($value)) {
            echo "Error: El campo '{$fieldName}' no ha sido llenado.<br>";
            return false;
        }
        return true;
    }

    // Recibe los datos del formulario
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $email = $_POST["email"];
    $date = $_POST["date"];
    $comentario = $_POST["comentario"];
    $os = isset($_POST["os"]) ? $_POST["os"] : [];
    $paymentMethod = isset($_POST["paymentMethod"]) ? $_POST["paymentMethod"] : "Tarjeta de credito";
    if (!isset($_POST["paymentMethod"])) {
        echo " (Si no se llenad el metodo de pago, por defecto es: Tarjeta de Crédito)";
        echo "<br>";
    }

    echo "<br>";
    $deliveryAddress = $_POST["deliveryAddress"];
    $clave = $_POST["clave"];

    // Valida si los campos obligatorios están llenos
    $validations = [
        validateNotEmpty($nombre, 'Nombre'),
        validateNotEmpty($edad, 'Edad'),
        validateNotEmpty($email, 'Email'),
        validateNotEmpty($paymentMethod, 'Método de Pago'),
        validateNotEmpty($deliveryAddress, 'Dirección de Entrega'),
        validateNotEmpty($clave, 'Clave')
    ];

    // Si todas las validaciones son exitosas, muestra los datos
    if (in_array(false, $validations, true)) {
        echo "Por favor, complete todos los campos obligatorios.<br>";
    } else {
        // Muestra los datos en pantalla
        echo "Nombre: " . $nombre . "<br>";
        echo "<br>";
        echo "Edad: " . $edad . "<br>";
        echo "<br>";
        echo "Email: " . $email . "<br>";
        echo "<br>";
        echo "Fecha: " . $date . "<br>";
        echo "<br>";
        if (empty($comentario)) {
            $comentario = "Ninguno";
        }
        echo "Comentario: " . $comentario . "<br>";
        echo "<br>";

        if (!empty($os)) {
            echo "Sistemas Operativos: " . implode(", ", $os) . "<br>";
        } else {
            echo "Sistemas Operativos no seleccionados.<br>";
        }
        echo "<br>";
        echo "Método de Pago: " . $paymentMethod . "<br>";

        echo "<br>";
        echo "Dirección de Entrega: " . $deliveryAddress . "<br>";
        echo "<br>";
        echo "Clave: " . $clave . "<br>";
        echo "<br>";

        // Manejo del archivo que se puede adjuntar
        if (isset($_FILES['invoice']) && $_FILES['invoice']['error'] === UPLOAD_ERR_OK) {
            $invoiceName = $_FILES['invoice']['name'];
            $invoiceTmpName = $_FILES['invoice']['tmp_name'];

            // Mueve el archivo a tu directorio local
            $destination = './invoices-files/' . $invoiceName;
            move_uploaded_file($invoiceTmpName, $destination);

            echo "Nombre del Archivo Subido: " . $invoiceName . "<br>";
            echo "<pre>El archivo se ha cargado en el directorio local.<br></pre>";
        } else {
            echo "No se ha seleccionado un archivo de factura o ha ocurrido un error al subirlo.<br>";
        }
    }
} else {
    echo "Todavia no se han enviado datos";
}
?>
