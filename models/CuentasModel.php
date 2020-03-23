<?php
class CuentasModel extends Model{

    public function set($cpuc_data = array()){
        foreach ($cpuc_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "REPLACE INTO tbl_cuentas_puc (cpuc_id,plan_nom,plan_img,plan_nci,plan_des,plan_espe_fk) VALUES ($cpuc_id,'$plan_nom','$plan_img','$plan_nci','$plan_des',$plan_espe_fk)";
        $this->set_query();
    }

    public function get($cpuc_cate = ''){
        $this->query = ($cpuc_cate != '')
        ? "SELECT * FROM tbl_cuentas_puc WHERE cpuc_cate_fk = $cpuc_cate"
        : 'SELECT * FROM tbl_cuentas_puc';
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function get_resultados($cpuc_resul = ''){
        $this->query = ($cpuc_resul != '')
        ? "SELECT * FROM tbl_cuentas AS C 
            INNER JOIN tbl_usuario AS U ON U.usua_cod = C.cuen_usua_fk
            INNER JOIN tbl_estado AS E ON E.esta_id = C.cuen_esta_fk
            INNER JOIN tbl_cuentas_puc AS CP ON CP.cpuc_id = C.cuen_cpuc_fk
            INNER JOIN tbl_categoria_puc AS CA ON CA.catp_id = CP.cpuc_cate_fk
            WHERE cpuc_cate_fk = $cpuc_cate"
        : 'SELECT * FROM tbl_cuentas AS C 
            INNER JOIN tbl_usuario AS U ON U.usua_cod = C.cuen_usua_fk
            INNER JOIN tbl_estado AS E ON E.esta_id = C.cuen_esta_fk
            INNER JOIN tbl_cuentas_puc AS CP ON CP.cpuc_id = C.cuen_cpuc_fk
            INNER JOIN tbl_categoria_puc AS CA ON CA.catp_id = CP.cpuc_cate_fk';
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }

    public function getCategoria($catp_id = ''){
        $this->query = ($catp_id != '')
        ? "SELECT * FROM tbl_categoria_puc WHERE catp_id = '$catp_id'"
        : 'SELECT * FROM tbl_categoria_puc';
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    
    public function del($cpuc_id = ''){
        $this->query = "DELETE FROM tbl_cuentas_puc WHERE cpuc_id = $cpuc_id";
        $this->set_query();
    }
}
