<?php
    // Conectar a la base de datos
    require_once 'config/db.php';
    $db = Database::connect();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" type="text/css" href="../assets/styles.css">
</head>
<body>
<header>
    <div class="logo-container">
        <img src="../assets/Logo-Sena.jpg" alt="Logo de la empresa" class="logo">
    </div>
    <div class="title">
        <h1>Gestion de Ambientes de formacion</h1>
    </div>
    <div class="datetime">
        <?php
        date_default_timezone_set('America/Bogota');
        $fechaActual = date("d/m/Y");
        $horaActual = date("h:i a");
        ?>
        <div class="datetime">
            <div class="fecha">
                <p>Fecha actual: <?php echo $fechaActual; ?></p>
            </div>
            <div class="hora">
                <p>Hora actual: <?php echo $horaActual; ?></p>
            </div>
        </div>
    </div>
</header>
<nav>
    <div class="filtro-y-crear">
        <div class="container-fluid">
            <form class="d-flex">
                <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscar por Nombre">
            </form>
        </div>
        <div class="crear-ambiente">
            <ul>
                <?php
                $url_create = '/dashboard/gestion%20de%20ambientes/admin/createUsuario/';
                ?>
                <li><a href="<?php echo $url_create; ?>" id="btn-create">Crear Nuevo Usuario</a></li>
            </ul>
        </div>
    </div>
</nav>  
<section class="ambiente" id="section-ambiente">
    <div class="subtitulo-ambiente">
        <h2>Usuarios</h2>
    </div>
    <div class="descripcion-ambiente">
        <p>Gestión de Usuarios</p>
    </div>
    <div class="tabla-ambientes tabla-scroll">
        <table class="table table-striped table-dark table_id" border="1" id="tabla-ambientes">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Clave</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta para obtener los datos
                $query = "SELECT id_usuario, Nombres, Apellidos, Clave, Rol FROM t_usuarios";
                $result = $db->query($query);

                // Mostrar los datos en la tabla
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_usuario"] . "</td>";
                        echo "<td>" . $row["Nombres"] . "</td>";
                        echo "<td>" . $row["Apellidos"] . "</td>";
                        echo "<td>" . $row["Clave"] . "</td>";
                        echo "<td>" . $row["Rol"] . "</td>";
                        echo "<td>";
                        $url_update = '/dashboard/gestion%20de%20ambientes/admin/updateUsuario/';
                        echo "<a href='" . $url_update . $row['id_usuario'] . "' class=''><img src='../assets/editar.svg'></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>0 resultados</td></tr>";
                }
                $db->close();
                ?>
            </tbody>
        </table>
        <div class="regresar">
            <?php
            $url_regresar = 'home';
            ?>
            <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
        </div>
        <div class="salir">
            <button id="btn_salir">Salir</button>
        </div>
    </div>
</section>
<footer>
    <p>Sena todos los derechos reservados</p>
</footer>
</body>
</html>
