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
      <li><a href="sustituto.php">Médico Sustituto</a></li>
      <li><a href="horarios.php">Horarios Medicos</a></li>
      <li><a href="empleado.php">Empleados</a></li>
      <li><a href="paciente.php">Pacientes</a></li>
    </ul>
  </nav>
  <table >
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
            <th>MATRICULA PROFESIONAL</th>
            <th>TIPO DE MEDICO</th>
            <th></th>
        </tr>   
            </div>
        
        <?php
        
        $query = "SELECT * FROM medicos";
        $result = mysqli_query($conn, $query);

        // Verificar si se obtuvieron resultados
        if (mysqli_num_rows($result) > 0) {
            // Iterar sobre los resultados y llenar la tabla
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['med_id'] . "</td>";
                echo "<td>" . $row['med_nom'] . "</td>";
                echo "<td>" . $row['med_dir'] . "</td>";
                echo "<td>" . $row['med_tel'] . "</td>";
                echo "<td>" . $row['med_ciu'] . "</td>";
                echo "<td>" . $row['med_dep'] . "</td>";
                echo "<td>" . $row['med_cod_pos'] . "</td>";
                echo "<td>" . $row['med_ced'] . "</td>";
                echo "<td>" . $row['med_num_seg_soc'] . "</td>";
                echo "<td>" . $row['med_mat_pro'] . "</td>";
                echo "<td>" . $row['med_tip'] . "</td>";
                ?>
                <td>
                <form method="post" action="../consultas/edit_med.php">
                <input type="hidden" name="med_id" value="<?php echo $row['med_id']; ?>">
                <button type="submit">Editar</button>
                </form>
                
                <form method="post" action="../consultas/eli_med.php">
                <input type="hidden" name="med_id" value="<?php echo $row['med_id']; ?>">
                <button type="submit">Eliminar</button>
            
    </form>
                <?php
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No se encontraron empleados</td></tr>";
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
        ?>
    </table>
    <center>
    <h2>Crear nuevo médico</h2>
    <form method="post" action="../consultas/mod_med.php">
        <label for="med_id">Id:</label>
        <input type="text" name="med_id" required><br>

        <label for="med_nom">Nombre:</label>
        <input type="text" name="med_nom" required><br>

        <label for="med_dir">Dirección:</label>
        <input type="text" name="med_dir" required><br>

        <label for="med_tel">Teléfono:</label>
        <input type="text" name="med_tel" required><br>

        <label for="med_ciu">Ciudad:</label>
        <input type="text" name="med_ciu" required><br>

        <label for="med_dep">Departamento:</label>
        <input type="text" name="med_dep" required><br>

        <label for="med_cod_pos">Código Postal:</label>
        <input type="text" name="med_cod_pos" required><br>

        <label for="med_ced">Cédula:</label>
        <input type="text" name="med_ced" required><br>

        <label for="med_num_seg_soc">Número de Seguro Social:</label>
        <input type="text" name="med_num_seg_soc" required><br>

        <label for="med_mat_pro">Matrícula Profesional:</label>
        <input type="text" name="med_mat_pro" required><br>

        <label for="med_tip">Tipo de médico:</label>
        <select name="med_tip">
            <option value="medico titular">Médico Titular</option>
            <option value="medico interino">Médico Interino</option>
            <option value="medico sustituto">Médico Sustituto</option>
        </select><br>

        <input type="submit" name="crear" value="Crear médico">
    </form>
    </center>
</body>
</html>