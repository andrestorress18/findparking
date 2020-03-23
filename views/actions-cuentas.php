<?php
$function = new FunctionModel();
$vivero_controller = new CuentasController();
if(isset($_POST['crud'])){
    if ($_POST['crud'] == 'add') {
        $vive_img = $function->validateImg($_FILES['vive_ipo'], $_POST['vive_prov_fk'], "proveedor");
        $new_vive = array(
            'vive_id'  => 0,
            'vive_nom' => $_POST['vive_nom'],
            'vive_ipo' => $vive_img,
            'vive_cor' => $_POST['vive_cor'],
            'vive_tel' => $_POST['vive_tel'],
            'vive_cel' => $_POST['vive_cel'],
            'vive_nen' => $_POST['vive_nen'],
            'vive_dir' => $_POST['vive_dir'],
            'vive_lon' => $_POST['vive_lon'],
            'vive_lat' => $_POST['vive_lat'],
            'vive_muni_fk' => $_POST['vive_muni_fk'],
            'vive_prov_fk' => $_POST['vive_prov_fk']
        );
        if($vive_img!="existe" || $vive_img!="nopermitido"){
            $vive_id = $vivero_controller->set($new_vive);
            $planta_id = $_POST['vpla_plan_fk'];
            $planta_can = $_POST['vpla_can'];
            $num_planta = COUNT($planta_id);
            $template_query = "REPLACE INTO tbl_vivero_planta (vpla_id,vpla_can,vpla_vive_fk,vpla_plan_fk)";
            $template_query .= " VALUES ";
            for ($i=0; $i < $num_planta; $i++) { 
                $template_query .= "(0,'".$planta_can[$i]."',".$vive_id.",".$planta_id[$i]."),";
            }
            $template_query = substr($template_query, 0, -1);
            $vivero_controller->set_vivero_planta($template_query);
            //echo $template_query;
            //var_dump($new_vive);
            header('Location: ./viveros&success=Vivero guardado');
        }else{
            header('Location: ./viveros&success=Error al guardar el vivero');
        }
    } else if ($_POST['crud'] == 'del') {
        $vivero_controller->del($_POST['vive_id']);
        header('Location: ./viveros&success=Vivero eliminado');
    } else if ($_POST['crud'] == 'edi') {
        $act_vive = array(
            'vive_tit' => $_POST['vive_tit'],
            'vive_id'  => $_POST['vive_id'],
        );
        $vivero_controller->set($act_vive);
        header('Location: ./viveros&success=Vivero actualizada');
    }
}else if(isset($_POST['search'])){
    if($_POST['search']=="true"){
        header("Location: ./todos-los-viveros&searh=".$_POST['palabra']);
    }
}