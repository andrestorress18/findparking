<?php
$parking_controller = new ParqueaderoController();
if ($_POST['crud'] == 'add') {
    $dir_subida = './public/img/parking/';
    $img = $dir_subida . $_POST['parq_nom'].".jpg";
    $parq_fot = 'public/img/parking/'.$_POST['parq_nom'].'.jpg';
    $new_parking = array(
        'parq_id'  => 0,
        'parq_nom' => $_POST['parq_nom'],
        'parq_des' => $_POST['parq_des'],
        'parq_tar' => $_POST['parq_tar'],
        'parq_log' => $_POST['parq_log'],
        'parq_lat' => $_POST['parq_lat'],
        'parq_fot' => $parq_fot
    );
    $cod_parking = $parking_controller->ins($new_parking);
    $cupos = COUNT($_POST["cupa_cupo_fk"]);
    $cupa_cupo_fk = $_POST["cupa_cupo_fk"];
    $cupa_cub = $_POST["cupa_cub"];
    $cupa_dim = $_POST["cupa_dim"];
    //var_dump($new_parking);
    $template_cuparq = "REPLACE INTO tbl_cupo_parqueadero (cupa_est,cupa_cub, cupa_dim, cupa_parq_fk,cupa_cupo_fk)";
    $template_cuparq .= " VALUES ";
    for ($i=0; $i < $cupos; $i++) { 
        $template_cuparq .= "('0','".$cupa_cub[$i]."','".$cupa_dim[$i]."',".$cod_parking.",".$cupa_cupo_fk[$i]."),";
    }
    $template_cuparq = substr($template_cuparq, 0, -1);
    //echo $template_cuparq;
    $parking_controller->set_detalle($template_cuparq);
    $usuarios = COUNT($_POST["gest_usua_fk"]);
    $gest_usua_fk = $_POST["gest_usua_fk"];

    $template_usuario = "REPLACE INTO tbl_gestor (gest_id,gest_parq_fk, gest_usua_fk)";
    $template_usuario .= " VALUES ";
    for ($a=0; $a < $usuarios; $a++) { 
        $template_usuario .= "(0,".$cod_parking.",".$gest_usua_fk[$a]."),";
    }
    $template_usuario = substr($template_usuario, 0, -1);
    $parking_controller->set_detalle($template_usuario);
    //echo $template_usuario;
    if ($id_user == -1) {
        header('Location: ./parqueaderos&error=El parqueadero no se registro debido a que ya existe.');
    }else{
        if (move_uploaded_file($_FILES['parq_fot']['tmp_name'], $img)) {
            header('Location: ./parqueaderos&success=Parqueadero guardado');
        } else {
            header('Location: ./parqueaderos&error=El parqueadero fue registrado pero no se pudo cargar la imagen');
        }
    }
} else if ($_POST['crud'] == 'del') {
    $parking_controller->del($_POST['parq_id']);
    header('Location: ./parqueaderos&success=Parqueadero eliminado');
} else if ($_POST['crud'] == 'edi') {
    $dir_subida = './public/img/user/';
    $img = $dir_subida . $_POST['usua_ced'].".jpg";
    $usua_img = ($_FILES['usua_img']['name']<>"") ? 'public/img/user/'.$_POST['usua_ced'].'.jpg' : null;
    $usua_pas = ($_POST['usua_pas']<>"") ? $_POST['usua_pas'] : null;
    $act_user = array(
        'usua_cod'  => $_POST['usua_cod'],
        'usua_ced' => $_POST['usua_ced'],
        'usua_nom' => $_POST['usua_nom'],
        'usua_ema' => $_POST['usua_ema'],
        'usua_pas' => $usua_pas,
        'usua_img' => $usua_img,
        'usua_rol' => $_POST['usua_rol'],
        'usua_est' => $_POST['usua_est'],
        'usua_enti_fk' => 1
    );
    $id_user = $user_controller->upd($act_user);
    if ($id_user == -1){
        header('Location: ./parqueaderos&error=El parqueadero no fue actualizado, parqueadero duplicado');
    }else if (isset($usua_img)) {
        if (move_uploaded_file($_FILES['usua_img']['tmp_name'], $img)) {
            header('Location: ./parqueaderos&success=Usuario actualizado');
        } else {
            header('Location: ./parqueaderos&error=El parqueadero fue actualizado pero no se pudo cargar la imagen');
        }
    }else{
        header('Location: ./parqueaderos&success=parqueadero actualizado');
    }
}