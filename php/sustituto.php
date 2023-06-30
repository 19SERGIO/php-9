<?php
    require '../conexion/con_bd.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sana que Sana</title>
    <link rel="stylesheet" href="../css/medicos.css">
</head>
<body>
<nav>
    <ul>
      <li><a href="index.php">Inicio</a></li>
      <li><a href="medico.php">Médicos</a></li>
      <li><a href="horarios.php">Horarios Medicos</a></li>
      <li><a href="empleado.php">Empleados</a></li>
      <li><a href="paciente.php">Pacientes</a></li>
    </ul>
  </nav>
  <table>
    <div class="titulo">
      <tr>
        <th>ID MEDICO SUSTITUTO</th>
        <th>ID MEDICO</th>
        <th>FECHA DE ALTA</th>
        <th>FECHA DE BAJA</th>
        <th></th>
      </tr>
    </div>
    <?php
      $query = "SELECT * FROM sustitutos";
      $result = mysqli_query($conn, $query);

      // Verificar si se obtuvieron resultados
      if (mysqli_num_rows($result) > 0) {
          // Iterar sobre los resultados y llenar la tabla
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['sus_id'] . "</td>";
              echo "<td>" . $row['med_id'] . "</td>";
              echo "<td>" . $row['sus_fec_alt'] . "</td>";
              echo "<td>" . $row['sus_fec_baj'] . "</td>";
              ?>
              <td>
                
              </td>
              <?php
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='4'>No se encontraron médicos sustitutos</td></tr>";
      }

      // Cerrar la conexión a la base de datos
      mysqli_close($conn);
    ?>
  </table>
  <center>
    <h2>Crear nuevo médico suplente</h2>
    <form method="post" action="../consultas/mod_sus.php">
        <label for="sus_id">Id médico sustituto:</label>
        <input type="text" name="sus_id" required><br>

        <label for="med_id">Id médico:</label>
        <input type="text" name="med_id" required><br>
        
        <label for="sus_fec_alt">Fecha de alta:</label>
        <input type="text" name="sus_fec_alt" required><br>

        <label for="sus_fec_baj">Fecha de baja:</label>
        <input type="text" name="sus_fec_baj" required><br>
        <input type="submit" name="crear_sus" value="Crear médico sustituto">
    </form>
  </center>
</body>
</html>
