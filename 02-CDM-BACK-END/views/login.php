

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
    <main class="login loginInmo" id="home">
        <h2>Tu Inmueble Ideal</h2>
        <p>Ingresa Tu Email y Contraseña</p>
        <form action="../controllers/iniciarSesion.php" method="post">
            <input type="email" placeholder="Correo Electrónico" name="correo">
            <input type="password" placeholder="Contraseña" name="clave">
            <button type="submit">Ingresar</button>
        </form>
    </main>
</body>
</html>