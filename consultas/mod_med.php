<?php
require '../conexion/con_bd.php';
//crear medico
if (isset($_POST['crear'])) {
    // Obtener los valores del formulario
    $med_id = $_POST["med_id"];
    $med_nom = $_POST["med_nom"];
    $med_dir = $_POST["med_dir"];
    $med_tel = $_POST["med_tel"];
    $med_ciu = $_POST["med_ciu"];
    $med_dep = $_POST["med_dep"];
    $med_cod_pos = $_POST["med_cod_pos"];
    $med_ced = $_POST["med_ced"];
    $med_num_seg_soc = $_POST["med_num_seg_soc"];
    $med_mat_pro = $_POST["med_mat_pro"];
    $med_tip = $_POST["med_tip"];

    // Preparar la consulta SQL para insertar el nuevo médico
    $sql = "INSERT INTO medicos (med_id, med_nom, med_dir, med_tel, med_ciu, med_dep, med_cod_pos,
     med_ced, med_num_seg_soc, med_mat_pro, med_tip) 
            VALUES ('$med_id', '$med_nom', '$med_dir', '$med_tel', '$med_ciu', 
            '$med_dep', '$med_cod_pos', '$med_ced', '$med_num_seg_soc', '$med_mat_pro', '$med_tip')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>
            setTimeout(function() {
            alert("Medico creado con Exito");
            window.location.href = "../php/medico.php";
        }); 
        </script>';
    } else {
        echo "Error al crear el médico: " . mysqli_error($conn);
    }
}

//modificar medico
if (isset($_POST['med_id'])) {
    $med_id = $_POST['med_id'];
    $med_nom = $_POST['med_nom'];
    $med_dir = $_POST['med_dir'];
    $med_tel = $_POST['med_tel'];
    $med_ciu = $_POST['med_ciu'];
    $med_dep = $_POST['med_dep'];
    $med_cod_pos = $_POST['med_cod_pos'];
    $med_ced = $_POST['med_ced'];
    $med_num_seg_soc = $_POST['med_num_seg_soc'];
    $med_mat_pro = $_POST['med_mat_pro'];
    $med_tip = $_POST['med_tip'];

    // Actualizar los datos del médico en la base de datos
    $query = "UPDATE medicos SET
                med_nom = '$med_nom',
                med_dir = '$med_dir',
                med_tel = '$med_tel',
                med_ciu = '$med_ciu',
                med_dep = '$med_dep',
                med_cod_pos = '$med_cod_pos',
                med_ced = '$med_ced',
                med_num_seg_soc = '$med_num_seg_soc',
                med_mat_pro = '$med_mat_pro',
                med_tip = '$med_tip'
              WHERE med_id = '$med_id'";

    if (mysqli_query($conn, $query)) {
        echo '<script>
        setTimeout(function() {
        alert("Medico modificado con exito con Exito");
        window.location.href = "../php/medico.php";
    }); 
    </script>';
    } else {
        echo "Error al guardar los cambios: " . mysqli_error($conn);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
} else {
    echo "ID de médico no especificado.";
}
if (isset($_POST['med_id'])){
    echo '<script>
    window.location.href = "../php/medico.php";
    </script>';
}




?>


