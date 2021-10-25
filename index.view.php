<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <title>Formulario Contacto</title>
</head>
<body>
    <div class="wrap">
        <!-- hacer que se quede lo escrito, en caso de error  -->
        <!-- value="<?php //if($enviado = false && isset($nombre)) echo $nombre ?> -->
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre:" value="<?php if($enviado = false && isset($nombre)) echo $nombre ?>">
            <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo:" value="<?php if($enviado = false && isset($correo)) echo $correo ?>">
            <textarea name="mensaje" class="form-control" id="mensaje" placeholder="Mensaje..."><?php if($enviado = false && isset($mensaje)) echo $mensaje ?></textarea>

            <?php if(!empty($errores)): ?>
                <div class="alert error">
                    <?php echo $errores; ?>
                </div>
            <?php elseif($enviado): ?>
                <div class="alert success">
                    <p>Enviado Correctamente</p>
                </div>
            <?php endif ?>

            <input type="submit" name="submit" value="Enviar" class="btn btn-primary">
        </form>
    </div>
</body>
</html>