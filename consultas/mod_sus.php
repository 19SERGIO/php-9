<?php

require '../conexion/con_bd.php';


// crear medico sustituto
if (isset($_POST['crear_sus'])) {
    $sus_id = $_POST["sus_id"];
    $med_id = $_POST["med_id"];
    $sus_fec_alt = $_POST["sus_fec_alt"];
    $sus_fec_baj = $_POST["sus_fec_baj"];
   

    // Preparar la consulta SQL para insertar el nuevo médico
    $sql = "INSERT INTO sustitutos (sus_id, med_id, sus_fec_alt, sus_fec_baj) 
            VALUES ('$sus_id', '$med_id', '$sus_fec_alt', '$sus_fec_baj')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>
            setTimeout(function() {
            alert("Medico sustituto creado con Exito");
            window.location.href = "../php/sustituto.php";
        }); 
        </script>';
    } else {
        echo "Error al crear el médico sustituto: " . mysqli_error($conn);
    }
}