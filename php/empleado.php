<?php
require '../conexion/con_bd.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sana que Sana</title>
    <link rel="stylesheet" href="../css/stilos.css">
</head>
<body>
<nav>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="medico.php">Médico</a></li>
    
        <li><a href="paciente.php">Pacientes</a></li>
    </ul>
</nav>
<table>
    <div class="titulo">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>DIRECCION</th>
            <th>TELEFONO</th>
            <th>CIUDAD</th>
            <th>DEPARTAMENTO</th>
            <th>CODIGO POSTAL</th>
            <th>CEDULA</th>
            <th>NUMERO DE SEGURIDAD SOCIAL</th>
            <th></th>
        </tr>
    </div>

    <?php

    $query = "SELECT * FROM empleados";
    $result = mysqli_query($conn, $query);

    // Verificar si se obtuvieron resultados
    if (mysqli_num_rows($result) > 0) {
        // Iterar sobre los resultados y llenar la tabla
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['emp_id'] . "</td>";
            echo "<td>" . $row['emp_nom'] . "</td>";
            echo "<td>" . $row['emp_dir'] . "</td>";
            echo "<td>" . $row['emp_tel'] . "</td>";
            echo "<td>" . $row['emp_ciu'] . "</td>";
            echo "<td>" . $row['emp_dep'] . "</td>";
            echo "<td>" . $row['emp_cod_pos'] . "</td>";
            echo "<td>" . $row['emp_ced'] . "</td>";
            echo "<td>" . $row['emp_num_seg_soc'] . "</td>";
            ?>
            <td>
                

                <form method="post" action="../consultas/eli_emp.php">
                    <input type="hidden" name="emp_id" value="<?php echo $row['emp_id']; ?>">
                    <button type="submit">Eliminar</button>
                </form>
            </td>
            <?php
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No se encontraron empleados</td></tr>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
    ?>
</table>

<center>
    <h2>Crear nuevo empleado</h2>
    <form method="post" action="../consultas/mod_emp.php">
        <label for="emp_id">Id:</label>
        <input type="text" name="emp_id" required><br>

        <label for="emp_nom">Nombre:</label>
        <input type="text" name="emp_nom" required><br>

        <label for="emp_dir">Dirección:</label>
        <input type="text" name="emp_dir" required><br>

        <label for="emp_tel">Teléfono:</label>
        <input type="text" name="emp_tel" required><br>

        <label for="emp_ciu">Ciudad:</label>
        <input type="text" name="emp_ciu" required><br>

        <label for="emp_dep">Departamento:</label>
        <input type="text" name="emp_dep" required><br>

        <label for="emp_cod_pos">Código Postal:</label>
        <input type="text" name="emp_cod_pos" required><br>

        <label for="emp_ced">Cédula:</label>
        <input type="text" name="emp_ced" required><br>

        <label for="emp_num_seg_soc">Número de Seguro Social:</label>
        <input type="text" name="emp_num_seg_soc" required><br>

        <input type="submit" name="crear" value="Crear empleado">
    </form>
</center>
</body>
</html>
