<?php
    require '../conexion/con_bd.php';

    if (isset($_POST['med_id'])) {
        $med_id = $_POST['med_id'];

        // Consulta para eliminar el médico
        $query = "DELETE FROM medicos WHERE med_id = '$med_id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo '<script>
        setTimeout(function() {
        alert("Medico Eliminado con exito con Exito");
        window.location.href = "../php/medico.php";
    }); 
    </script>';
        } else {
            echo "Error al eliminar el médico: " . mysqli_error($conn);
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
    } else {
        echo "ID de médico no especificado.";
    }
?>
