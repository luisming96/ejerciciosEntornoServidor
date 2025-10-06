<!DOCTYPE html>
<html>
<head>
    <title>Subir Archivo</title>
</head>
<body>
    <h2>Subir Imagen</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Selecciona una imagen:</label><br>
        <input type="file" name="archivo" required><br><br>
        <input type="submit" value="Subir Archivo" name="enviar">
    </form>

    <?php
    if (isset($_POST['enviar'])) {
        if (!file_exists("uploads")) {
            mkdir("uploads");
        }

        $nombreArchivo = basename($_FILES["archivo"]["name"]);
        $rutaCompleta = "uploads/" . $nombreArchivo;
        $tamañoArchivo = $_FILES["archivo"]["size"];

        $extension = "";
        $posicion = strrpos($nombreArchivo, ".");
        if ($posicion !== false) {
            $extension = strtolower(substr($nombreArchivo, $posicion + 1));
        }

        if ($tamañoArchivo > 2000000) {
            echo "El archivo es demasiado grande. Máximo 2MB.<br>";
        } else if ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "gif") {
            echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.<br>";
        } else if (file_exists($rutaCompleta)) {
            echo "El archivo ya existe.<br>";
        } else {
            if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaCompleta)) {
                echo "El archivo se subió correctamente.<br>";
                echo "Nombre: " . $nombreArchivo . "<br>";
                echo "Tamaño: " . $tamañoArchivo . " bytes<br>";
            } else {
                echo "Hubo un error al subir el archivo.<br>";
            }
        }
    }
    ?>
</body>
</html>