<?php
require "../conexion/con_bd.php";

if (isset($_POST['hm_id'])) {
    $hm_id = $_POST['hm_id'];

    $query = "DELETE FROM horarios_medicos WHERE hm_id = '$hm_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>
            setTimeout(function() {
                alert("Horario médico eliminado con éxito");
                window.location.href = "../php/horarios.php";
            }); 
        </script>';
    } else {
        echo "Error al eliminar el horario médico: " . mysqli_error($conn);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
} else {
    echo "ID de horario médico no especificado.";
}
?>
