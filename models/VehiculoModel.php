<?php
class VehiculoModel extends Model{

    public function ins($cpuc_data = array()){
        foreach ($cpuc_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_vehiculo (vehi_pla,vehi_col,vehi_con) VALUES ('$vehi_pla','$vehi_col','$vehi_con')";
        $id_reg = $this->set_query();
        return $id_reg;
    }
    public function upd($cpuc_data = array()){
        foreach ($cpuc_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE tbl_vehiculo SET vehi_pla = '$vehi_pla',vehi_col = '$vehi_col',vehi_con = '$vehi_con'";
        $this->set_query();
    }

    public function sel($vehi_cod = ''){
        $this->query = ($vehi_cod != '')
        ? "SELECT * FROM tbl_vehiculo WHERE vehi_cod = $vehi_cod"
        : 'SELECT * FROM tbl_vehiculo';
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
        
    public function del($vehi_cod = ''){
        $this->query = "DELETE FROM tbl_vehiculo WHERE vehi_cod = $vehi_cod";
        $this->set_query();
    }
}
