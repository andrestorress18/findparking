<?php
$user_controller = new UsuarioController();
if ($_POST['crud'] == 'edit-pass') {
    $act_pass = array(
        'user_id' => $_POST['user_id'],
        'new_pass'  => $_POST['pass_new']
    );
    $user_controller->set_pass($act_pass);
    unset($_POST['crud']);
    $_SESSION['usua_pas'] = md5($_POST['pass_new']);
    $_GET['r'] = isset($_GET['r']) ? $_GET['r'] : 'inicio';
    header('Location: ./'.$_GET['r'].'&success=Contraseña actualizada');
}else if ($_POST['crud'] == 'add') {
    $dir_subida = './public/img/user/';
    $img = $dir_subida . $_POST['usua_ced'].".jpg";
    $usua_img = 'public/img/user/'.$_POST['usua_ced'].'.jpg';
    $new_user = array(
        'usua_cod'  => 0,
        'usua_ced' => $_POST['usua_ced'],
        'usua_nom' => $_POST['usua_nom'],
        'usua_ema' => $_POST['usua_ema'],
        'usua_pas' => $_POST['usua_pas'],
        'usua_img' => $usua_img,
        'usua_rol' => $_POST['usua_rol'],
        'usua_est' => $_POST['usua_est'],
        'usua_enti_fk' => 1
    );
    $id_user = $user_controller->add($new_user);
    if ($id_user == -1) {
        header('Location: ./usuarios&error=El usuario no se registro debido a que ya existe.');
    }else{
        if (move_uploaded_file($_FILES['usua_img']['tmp_name'], $img)) {
            header('Location: ./usuarios&success=Usuario guardado');
        } else {
            header('Location: ./usuarios&error=El usuario fue registrado pero no se pudo cargar la imagen');
        }
    }
} else if ($_POST['crud'] == 'del') {
    $user_controller->del($_POST['usua_cod']);
    header('Location: ./usuarios&success=Usuario eliminado');
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
    $id_user = $user_controller->set($act_user);
    if ($id_user == -1){
        header('Location: ./usuarios&error=El usuario no fue actualizado, usuario duplicado');
    }else if (isset($usua_img)) {
        if (move_uploaded_file($_FILES['usua_img']['tmp_name'], $img)) {
            header('Location: ./usuarios&success=Usuario actualizado');
        } else {
            header('Location: ./usuarios&error=El usuario fue actualizado pero no se pudo cargar la imagen');
        }
    }else{
        header('Location: ./usuarios&success=Usuario actualizado');
    }
}