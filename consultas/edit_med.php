<?php
require '../conexion/con_bd.php';

if (isset($_POST['med_id'])) {
    $med_id = $_POST['med_id'];

    // Consultar los datos del médico a editar
    $query = "SELECT * FROM medicos WHERE med_id = '$med_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Mostrar el formulario de edición con los datos del médico cargados
        ?>
        <center>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar médico</title>
            <link rel="stylesheet" href="../css/edit_med.css">
        </head>
        <body>
            <h2>Editar médico</h2>
            <form method="post" action="mod_med.php">
                <input type="hidden" name="med_id" value="<?php echo $row['med_id']; ?>">

                <label for="med_nom">Nombre:</label>
                <input type="text" name="med_nom" value="<?php echo $row['med_nom']; ?>" required><br>

                <label for="med_dir">Dirección:</label>
                <input type="text" name="med_dir" value="<?php echo $row['med_dir']; ?>" required><br>

                <label for="med_tel">Teléfono:</label>
                <input type="text" name="med_tel" value="<?php echo $row['med_tel']; ?>" required><br>

                <label for="med_ciu">Ciudad:</label>
                <input type="text" name="med_ciu" value="<?php echo $row['med_ciu']; ?>" required><br>

                <label for="med_dep">Departamento:</label>
                <input type="text" name="med_dep" value="<?php echo $row['med_dep']; ?>" required><br>

                <label for="med_cod_pos">Código Postal:</label>
                <input type="text" name="med_cod_pos" value="<?php echo $row['med_cod_pos']; ?>" required><br>

                <label for="med_ced">Cédula:</label>
                <input type="text" name="med_ced" value="<?php echo $row['med_ced']; ?>" required><br>

                <label for="med_num_seg_soc">Número de Seguro Social:</label>
                <input type="text" name="med_num_seg_soc" value="<?php echo $row['med_num_seg_soc']; ?>" required><br>

                <label for="med_mat_pro">Matrícula Profesional:</label>
                <input type="text" name="med_mat_pro" value="<?php echo $row['med_mat_pro']; ?>" required><br>

                <label for="med_tip">Tipo de médico:</label>
                <select name="med_tip">
                    <option value="medico titular" <?php if ($row['med_tip'] == 'medico titular') echo 'selected'; ?>>Médico Titular</option>
                    <option value="medico interino" <?php if ($row['med_tip'] == 'medico interino') echo 'selected'; ?>>Médico Interino</option>
                    <option value="medico sustituto" <?php if ($row['med_tip'] == 'medico sustituto') echo 'selected'; ?>>Médico Sustituto</option>
                </select><br>

                <input type="submit" name="guardar" value="Guardar cambios">
                <input type="submit" name="salir-edit-m" value="Salir">
            </form>
        </body>
        </html>
        </center>
        <?php
    } else {
        echo "No se encontró el médico a editar.";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
} else {
    echo "ID de médico no especificado.";
}
?>
