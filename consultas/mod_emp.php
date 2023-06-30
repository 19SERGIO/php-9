<?php
require '../conexion/con_bd.php';

// Crear empleado
if (isset($_POST['crear'])) {
    $emp_id = $_POST["emp_id"];
    $emp_nom = $_POST["emp_nom"];
    $emp_dir = $_POST["emp_dir"];
    $emp_tel = $_POST["emp_tel"];
    $emp_ciu = $_POST["emp_ciu"];
    $emp_dep = $_POST["emp_dep"];
    $emp_cod_pos = $_POST["emp_cod_pos"];
    $emp_ced = $_POST["emp_ced"];
    $emp_num_seg_soc = $_POST["emp_num_seg_soc"];

    // Preparar la consulta SQL para insertar el nuevo empleado
    $sql = "INSERT INTO empleados (emp_id, emp_nom, emp_dir, emp_tel, emp_ciu, emp_dep, emp_cod_pos, emp_ced, emp_num_seg_soc) 
            VALUES ('$emp_id', '$emp_nom', '$emp_dir', '$emp_tel', '$emp_ciu', '$emp_dep', '$emp_cod_pos', '$emp_ced', '$emp_num_seg_soc')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>
            setTimeout(function() {
            alert("Empleado creado con éxito");
            window.location.href = "../php/empleado.php";
        }); 
        </script>';
    } else {
        echo "Error al crear el empleado: " . mysqli_error($conn);
    }
}
?>
