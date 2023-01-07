
<div class="contenendor olvide">

<?php include_once __DIR__ .'/../templates/nombre-sitio.php'; ?>


<div class="contenedor-sm">
    <p class="descripcion-pagina">Reestablece tu Contraseña</p>
    
    <?php include_once __DIR__ .'/../templates/alertas.php'; ?>

    <form action="/olvide" method="POST" class="formulario">

    <div class="campo">
        <label for="email">Email</label>
        <input 
        type="email"
        id="email"
        placeholder="Tu Email"
        name="email"
        >
    </div>



    <input type="submit" class="boton" value="Enviar Instrucciones">
    </form>
    <div class="acciones">
        <a href="/">Iniciar Sesión</a>
        <a href="/crear">Crear Cuenta</a>

    </div>

</div> <!--Contenedor sm-->
<script src="\build\js\app.js"></script>

</div>

