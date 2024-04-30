<?php
// Conectar a la base de datos
require_once 'config/db.php';
$db = Database::connect();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
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
            </div>
        </div>
    </nav>  
    <section class="reporte" id="section-reporte">
        <div class="subtitulo-reporte">
            <h2>Reportes</h2>
        </div>
        <div class="descripcion-reporte">
            <p>Gestión de ambientes de formación</p>
        </div>
        <div class="tabla-ambientes tabla-scroll">
            <table border="1" >
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha y Hora</th>
                        <th>Id usuario</th>
                        <th>Id ambiente</th>
                        <th>Estado</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
// Consulta SQL para seleccionar todos los registros de la tabla t_ambientes
$query = "SELECT * FROM t_reportes";
$result = $db->query($query);

if ($result->num_rows > 0) {
    // Iterar sobre los resultados y mostrar cada registro en una fila de la tabla HTML
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Id_reporte'] . "</td>";
        echo "<td>" . $row['FechaHora'] . "</td>";
        echo "<td>" . $row['Id_usuario'] . "</td>";
        echo "<td>" . $row['Id_ambiente'] . "</td>";
        echo "<td>" . $row['Estado'] . "</td>";
        echo "<td>" . $row['Observaciones'] . "</td>";
        echo "<td>";
    }
} else {
    // Si no hay filas en el resultado, mostrar un mensaje de que no hay registros
    echo "<tr><td colspan='10'>No hay registros</td></tr>";
}

// Cerrar la conexión a la base de datos
$db->close();
?>

                </tbody>
            </table>
        </div>
        <div class="regresar">
            <?php
                $url_regresar = 'home';
            ?>
            <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
        </div>
        <div class="salir">
            <button id="btn_salir">Salir</button>
        </div>
    </section>
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="../assets/buscador.js"></script>
    <footer>
        <p>Sena todos los derechos reservados</p>
    </footer>
</body>
</html>
