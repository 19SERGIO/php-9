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
      <li><a href="medico.php"> Medicos</a></li>
      <li><a href="sustituto.php">Médico Sustituto</a></li>
      <li><a href="empleado.php">Empleados</a></li>
      <li><a href="paciente.php">Pacientes</a></li>
    </ul>
  </nav>
  <table >
            <div class="titulo">
             <tr>
            <th>ID</th>
            <th>ID Médico</th>
            <th>Día</th>
            <th>Semana</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th></th>
        </tr>   
            </div>
        
        <?php
        
        $query = "SELECT * FROM horarios_medicos";
        $result = mysqli_query($conn, $query);

        // Verificar si se obtuvieron resultados
        if (mysqli_num_rows($result) > 0) {
            // Iterar sobre los resultados y llenar la tabla
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['hm_id'] . "</td>";
                echo "<td>" . $row['med_id'] . "</td>";
                echo "<td>" . $row['hm_dia'] . "</td>";
                echo "<td>" . $row['hm_sem'] . "</td>";
                echo "<td>" . $row['hm_hini'] . "</td>";
                echo "<td>" . $row['hm_hfin'] . "</td>";
                ?>
                <td>
                
                
                <form method="post" action="../consultas/eli_hm.php">
                <input type="hidden" name="hm_id" value="<?php echo $row['hm_id']; ?>">
                <button type="submit">Eliminar</button>
                </form>
                </td>
                <?php
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No se encontraron horarios de médicos</td></tr>";
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
        ?>
    </table>
    <center>
    <h2>Crear nuevo horario de médico</h2>
    <form method="post" action="../consultas/mod_hm.php">
        <label for="hm_id">Id:</label>
        <input type="text" name="hm_id" required><br>

        <label for="med_id">Id Médico:</label>
        <input type="text" name="med_id" required><br>

        <label for="hm_dia">Día:</label>
        <input type="text" name="hm_dia" required><br>

        <label for="hm_sem">Semana:</label>
        <input type="text" name="hm_sem" required><br>

        <label for="hm_hini">Hora Inicio:</label>
        <input type="text" name="hm_hini" required><br>

        <label for="hm_hfin">Hora Fin:</label>
        <input type="text" name="hm_hfin" required><br>

        <input type="submit" name="crear" value="Crear horario">
    </form>
    </center>
</body>
</html>
