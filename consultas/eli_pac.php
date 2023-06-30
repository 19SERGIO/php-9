<?php
require"../conexion/con_bd.php";

if (isset($_POST['pac_id'])) {
        $pac_id = $_POST['pac_id'];
        
    
        $query = "DELETE FROM pacientes WHERE pac_id = '$pac_id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo '<script>
        setTimeout(function() {
        alert("Paciente eliminado  con Exito");
        window.location.href = "../php/paciente.php";
    }); 
    </script>';
        } else {
            echo "Error al eliminar el paciente: " . mysqli_error($conn);
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
    } else {
        echo "ID de paciente no especificado.";
    }

?>