<?php
class RegistroModel extends Model{

    public function ins($comp_data = array()){
        foreach ($comp_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_comprobante (comp_fin, comp_hin, comp_cupo_fk, comp_vehi_fk) VALUES ('$comp_fin', '$comp_hin', $comp_cupo_fk, $comp_vehi_fk)";
        $this->set_query();
    }
    public function upd($comp_data = array()){
        foreach ($comp_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE tbl_comprobante SET comp_fsa = '$comp_fsa', comp_hsa = '$comp_hsa', comp_val = '$comp_val' WHERE comp_cod = $comp_cod";
        $this->set_query();
    }

    public function sel($comp_cod = '',$parq_id = ''){
        $this->query = ($comp_cod != '')? "SELECT * FROM tbl_vehiculo AS V
                INNER JOIN tbl_comprobante AS C ON V.vehi_cod = C.comp_vehi_fk
                INNER JOIN tbl_cupo_parqueadero AS CP ON C.comp_cupo_fk = CP.cupa_cod
                INNER JOIN tbl_cupo AS CU ON CP.cupa_cupo_fk = CU.cupo_cod
                INNER JOIN tbl_parqueadero AS P ON CP.cupa_parq_fk = P.parq_id
                WHERE C.comp_cod = $comp_cod"
            :($parq_id != '')? "SELECT * FROM tbl_vehiculo AS V
                INNER JOIN tbl_comprobante AS C ON V.vehi_cod = C.comp_vehi_fk
                INNER JOIN tbl_cupo_parqueadero AS CP ON C.comp_cupo_fk = CP.cupa_cod
                INNER JOIN tbl_cupo AS CU ON CP.cupa_cupo_fk = CU.cupo_cod
                INNER JOIN tbl_parqueadero AS P ON CP.cupa_parq_fk = P.parq_id
                WHERE P.parq_id = $parq_id"
                :
                "SELECT * FROM tbl_vehiculo AS V
                INNER JOIN tbl_comprobante AS C ON V.vehi_cod = C.comp_vehi_fk
                INNER JOIN tbl_cupo_parqueadero AS CP ON C.comp_cupo_fk = CP.cupa_cod
                INNER JOIN tbl_cupo AS CU ON CP.cupa_cupo_fk = CU.cupo_cod
                INNER JOIN tbl_parqueadero AS P ON CP.cupa_parq_fk = P.parq_id";
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
