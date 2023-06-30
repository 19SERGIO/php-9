<?php
require '../conexion/con_bd.php';
//crear medico
if (isset($_POST['crear'])) {
    // Obtener los valores del formulario
    $pac_id = $_POST["pac_id"];
    $pac_nom = $_POST["pac_nom"];
    $pac_dir = $_POST["pac_dir"];
    $pac_tel = $_POST["pac_tel"];
    $pac_cod_pos = $_POST["pac_cod_pos"];
    $pac_ced = $_POST["pac_ced"];
    $pac_num_seg_soc = $_POST["pac_num_seg_soc"];
    $med_id = $_POST["med_id"];
    // Preparar la consulta SQL para insertar el nuevo médico
    $sql = "INSERT INTO pacientes (pac_id, pac_nom, pac_dir, pac_tel, pac_cod_pos, pac_ced, pac_num_seg_soc, med_id) 
            VALUES ('$pac_id', '$pac_nom', '$pac_dir', '$pac_tel', '$pac_cod_pos', '$pac_ced', '$pac_num_seg_soc', 
            '$med_id')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>
            setTimeout(function() {
            alert("Paciente creado con Exito");
            window.location.href = "../php/paciente.php";
        }); 
        </script>';
    } else {
        echo "Error al crear el paciente: " . mysqli_error($conn);
    }

    
}
