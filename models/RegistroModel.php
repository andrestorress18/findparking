<?php
class RegistroModel extends Model{

    public function set($cpuc_data = array()){
        foreach ($cpuc_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "REPLACE INTO tbl_comprobante (comp_cod,plan_nom,plan_img,plan_nci,plan_des,plan_espe_fk) VALUES ($comp_cod,'$plan_nom','$plan_img','$plan_nci','$plan_des',$plan_espe_fk)";
        $this->set_query();
    }

    public function get($comp_cod = ''){
        $this->query = ($comp_cod != '')
        ? "SELECT * FROM tbl_comprobante WHERE comp_cod = $comp_cod"
        : 'SELECT * FROM tbl_comprobante';
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
