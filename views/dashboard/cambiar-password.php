<?php include_once __DIR__ . '/header-dashboard.php';?>

<div class="contenedor-sm">
    <?php include_once __DIR__ . '/../templates/alertas.php'?>

    <a href="/perfil" class="enlace">Volver al Perfil</a>

    <form method="POST" action="/cambiar-password" class="formulario">
        <div class="campo">
            <label for="nombre">Contraseña Actual</label>
            <input 
                type="password"
                name="password_actual"
                placeholder="Contraseña Actual"
            >
        </div>

        <div class="campo">
            <label for="email">Contraseña Nuevo</label>
            <input 
                type="password"
                name="password_nuevo"
                placeholder="Nueva Contraseña"
            >
        </div>

        <input type="submit" value="Guardar Cambios">
    </form>
</div>


<?php include_once __DIR__ . '/footer-dashboard.php';?>
