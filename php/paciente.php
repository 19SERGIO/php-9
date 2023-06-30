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
      <li><a href="sustituto.php">Médico</a></li>
      <li><a href="empleado.php">Empleados</a></li>
    </ul>
  </nav>
  <table >
            <div class="titulo">
             <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>DIRECCION</th>
            <th>TELEFONO</th>
            <th>CODIGO POSTAL</th>
            <th>CEDULA</th>
            <th>NUMERO DE SEGURIDAD SOCIAL</th>
            <th>ID MEDICO</th>
            <th></th>
        </tr>   
            </div>
        
        <?php
        
        $query = "SELECT * FROM pacientes";
        $result = mysqli_query($conn, $query);

        // Verificar si se obtuvieron resultados
        if (mysqli_num_rows($result) > 0) {
            // Iterar sobre los resultados y llenar la tabla
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['pac_id'] . "</td>";
                echo "<td>" . $row['pac_nom'] . "</td>";
                echo "<td>" . $row['pac_dir'] . "</td>";
                echo "<td>" . $row['pac_tel'] . "</td>";
                echo "<td>" . $row['pac_cod_pos'] . "</td>";
                echo "<td>" . $row['pac_ced'] . "</td>";
                echo "<td>" . $row['pac_num_seg_soc'] . "</td>";
                echo "<td>" . $row['med_id'] . "</td>";
                ?>
                <td>
                
                
                <form method="post" action="../consultas/eli_pac.php">
                <input type="hidden" name="pac_id" value="<?php echo $row['pac_id']; ?>">
                <button type="submit">Eliminar</button>
                </form>
                </td>
                <?php
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No se encontraron pacientes</td></tr>";
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
        ?>
    </table>
    <center>
    <h2>Crear nuevo paciente</h2>
    <form method="post" action="../consultas/mod_pac.php">
        <label for="pac_id">Id:</label>
        <input type="text" name="pac_id" required><br>

        <label for="pac_nom">Nombre:</label>
        <input type="text" name="pac_nom" required><br>

        <label for="pac_dir">Dirección:</label>
        <input type="text" name="pac_dir" required><br>

        <label for="pac_tel">Teléfono:</label>
        <input type="text" name="pac_tel" required><br>

        <label for="pac_cod_pos">Código Postal:</label>
        <input type="text" name="pac_cod_pos" required><br>

        <label for="pac_ced">Cédula:</label>
        <input type="text" name="pac_ced" required><br>

        <label for="pac_num_seg_soc">Número de Seguro Social:</label>
        <input type="text" name="pac_num_seg_soc" required><br>

        <label for="med_id">Id Médico:</label>
        <input type="text" name="med_id" required><br>

        <input type="submit" name="crear" value="Crear paciente">
    </form>
    </center>
</body>
</html>
