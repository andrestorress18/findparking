<?php
$function = new FunctionModel();
$comprobante_controller = new RegistroController();
$vehiculo_controller = new VehiculoController();
$cupo_controller = new ParqueaderoController();
if ($_POST['crud'] == 'add') {
    $new_vehi = array(
        'vehi_cod'  => 0,
        'vehi_pla' => $_POST['vehi_pla'],
        'vehi_col' => $_POST['vehi_col'],
        'vehi_con' => $_POST['vehi_con']
    );  
    //var_dump($new_vehi);      
    $vehi_cod = $vehiculo_controller->ins($new_vehi);
    $new_comp = array(
        'comp_cod'  => 0,
        'comp_fin' => $_POST['comp_fin'],
        'comp_hin' => $_POST['comp_hin'],
        'comp_cupo_fk' => $_POST['comp_cupo_fk'],
        'comp_vehi_fk' => $vehi_cod
    );        
    $comp_cod = $comprobante_controller->ins($new_comp);
    $cupo_controller->upd_cupo(1,$_POST['comp_cupo_fk']);
    //var_dump($new_comp);
    header('Location: ./registro&success=Ingreso guardado');
    
} else if ($_POST['crud'] == 'edi') {
    $act_comp = array(
        'comp_tit' => $_POST['comp_tit'],
        'comp_cod'  => $_POST['comp_cod'],
    );
    $comprobante_controller->set($act_comp);
    header('Location: ./registro&success=Comprobante actualizado');
}else if ($_POST['crud'] == 'del') {
    $comprobante_controller->del($_POST['comp_cod']);
    $cupo_controller->upd_cupo(0,$_POST['cupa_cod']);
    header('Location: ./registro&success=Comprobante eliminado');
}else if ($_POST['crud'] == 'fac') {
    $fechaIngreso = new DateTime($_POST['comp_fin']);
    $fechaSalida = new DateTime($_POST['comp_fsa']);
    $diff = $fechaIngreso->diff($fechaSalida);
    $dias = $diff->days;

    $horas = $dias*24;

    $horaIngreso = new DateTime($_POST['comp_hin']);
    $horaSalida = new DateTime($_POST['comp_hsa']);

    $d = $horaIngreso->diff($horaSalida);

    if ($horaIngreso<$horaSalida) {
        $horas = $horas + $d->format('%H');
    }else{
        $horas = $horas - $d->format('%H');
    }
    
    $valorMinuto = $_SESSION['parq_tar']/60;
    $minutos = $valorMinuto * $d->format('%I');
    //var_dump($new_fact);
    $pagar = ($horas*$_SESSION['parq_tar'] )+ $minutos;
    //echo $_POST['comp_fin']." - ".$_POST['comp_fsa']." : ".$_POST['comp_hin']." - ".$_POST['comp_hsa'];
   // echo "<br>Horas a pagar: ".$horas." por un valor de: $ ".number_format($pagar, 0);
    $new_fact = array(
        'comp_cod'  => $_POST['comp_cod'],
        'comp_fin' => $_POST['comp_fin'],
        'comp_hin' => $_POST['comp_hin'],
        'comp_fsa' => $_POST['comp_fsa'],
        'comp_hsa' => $_POST['comp_hsa'],
        'comp_val' => number_format($pagar, 0, '.', '')
    );
    $comprobante_controller->upd($new_fact);
    $cupo_controller->upd_cupo(0,$_POST['comp_cupo_fk']);
    header('Location: ./registro&success=Comprobante generado');
}
