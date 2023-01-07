<?php include_once __DIR__ . '/header-dashboard.php';?>

<?php if (count($proyectos) === 0) {?>
    <p class="no-proyectos">No hay proyectos aún <a href="/crear-proyecto">Comienza creando uno</a></p>
<?php } else {?>
    <ul class="listado-proyectos">
        <?php foreach ($proyectos as $proyecto) {?>
            <li>
                <a class="proyecto" href="/proyecto?id=<?= $proyecto->url; ?>"><?= $proyecto->proyecto; ?></a>
                <form action="/proyecto/eliminar" method="post">
                    <input type="hidden" name="id" value="<?php echo $proyecto->id ?>">
                    <input type="button" id="boton" class="btn btn-eliminar" value="Eliminar"/>
                </form>
            </li>
        <?php }?>
    </ul>
<?php }?>



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="build/js/app.js"></script>

<?php include_once __DIR__ . '/footer-dashboard.php';?>
