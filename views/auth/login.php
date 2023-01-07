
<div class="contenendor login">

<?php include_once __DIR__ .'/../templates/nombre-sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Iniciar Sesión</p>
        <?php include_once __DIR__ .'/../templates/alertas.php'; ?>

        <form action="/" method="POST" class="formulario">

        <div class="campo">
            <label for="email">Email</label>
            <input 
            type="email"
            id="email"
            placeholder="Tu Email"
            name="email"
            >
        </div>

        <div class="campo">
            <label for="password">Password</label>
            <input 
            type="password"
            id="password"
            placeholder="Tu Password"
            name="password"
            >
        </div>


        <input type="submit" class="boton" value="Iniciar Sesión">
        </form>
        <div class="acciones">
            <a href="/crear">Crear una cuenta</a>
            <a href="/olvide">Olvidé mi contraseña</a>

        </div>

    </div> <!--Contenedor sm-->
    <script src="\build\js\app.js"></script>

</div>

