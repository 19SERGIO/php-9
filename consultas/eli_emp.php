<?php
require "../conexion/con_bd.php";

if (isset($_POST['emp_id'])) {
    $emp_id = $_POST['emp_id'];

    $query = "DELETE FROM empleados WHERE emp_id = '$emp_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>
            setTimeout(function() {
                alert("Empleado eliminado con éxito");
                window.location.href = "../php/empleado.php";
            }); 
        </script>';
    } else {
        echo "Error al eliminar el empleado: " . mysqli_error($conn);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
} else {
    echo "ID de empleado no especificado.";
}
?>
