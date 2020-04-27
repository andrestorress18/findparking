<?php
class RegistroModel extends Model{

    public function ins($cpuc_data = array()){
        foreach ($cpuc_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "REPLACE INTO tbl_comprobante (comp_cod,plan_nom,plan_img,plan_nci,plan_des,plan_espe_fk) VALUES ($comp_cod,'$plan_nom','$plan_img','$plan_nci','$plan_des',$plan_espe_fk)";
        $this->set_query();
    }
    public function upd($cpuc_data = array()){
        foreach ($cpuc_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "REPLACE INTO tbl_comprobante (comp_cod,plan_nom,plan_img,plan_nci,plan_des,plan_espe_fk) VALUES ($comp_cod,'$plan_nom','$plan_img','$plan_nci','$plan_des',$plan_espe_fk)";
        $this->set_query();
    }

    public function sel($comp_cod = ''){
        $this->query = ($comp_cod != '')
        ? "SELECT * FROM tbl_comprobante AS C INNER JOIN tbl_vehiculo AS V ON C.comp_vehi_fk = V.vehi_cod WHERE comp_cod = $comp_cod"
        : 'SELECT * FROM tbl_comprobante AS C INNER JOIN tbl_vehiculo AS V ON C.comp_vehi_fk = V.vehi_cod';
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
        
    public function del($comp_cod = ''){
        $this->query = "DELETE FROM tbl_comprobante WHERE comp_cod = $comp_cod";
        $this->set_query();
    }
}
