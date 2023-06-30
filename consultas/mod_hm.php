<?php
require '../conexion/con_bd.php';

// Crear horario médico
if (isset($_POST['crear'])) {
    $hm_id = $_POST["hm_id"];
    $med_id = $_POST["med_id"];
    $hm_dia = $_POST["hm_dia"];
    $hm_sem = $_POST["hm_sem"];
    $hm_hini = $_POST["hm_hini"];
    $hm_hfin = $_POST["hm_hfin"];

    // Preparar la consulta SQL para insertar el nuevo horario médico
    $sql = "INSERT INTO horarios_medicos (hm_id, med_id, hm_dia, hm_sem, hm_hini, hm_hfin) 
            VALUES ('$hm_id', '$med_id', '$hm_dia', '$hm_sem', '$hm_hini', '$hm_hfin')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>
            setTimeout(function() {
            alert("Horario médico creado con éxito");
            window.location.href = "../php/horarios.php";
        }); 
        </script>';
    } else {
        echo "Error al crear el horario médico: " . mysqli_error($conn);
    }
}
?>