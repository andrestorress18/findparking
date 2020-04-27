<?php
class ParqueaderoModel extends Model {

    public function ins($parq_data = array()) {
        foreach ($parq_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "REPLACE INTO tbl_parqueadero (parq_id, parq_nom, parq_des, parq_tar, parq_log, parq_lat, parq_fot) VALUES ($parq_id, '$parq_nom', '$parq_des', '$parq_tar', '$parq_log', '$parq_lat', '$parq_fot');";
        $id_reg = $this->set_query();
        return $id_reg;
    }

    public function set_detalle($parq_query) {
        $this->query = $parq_query;
        $this->set_query();
    }

    public function upd($parq_data = array()) {
        foreach ($parq_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "REPLACE INTO tbl_parqueadero (parq_id, parq_nom, parq_des) VALUES ($parq_id, '$parq_nom', '$parq_des');";
        $id_reg = $this->set_query();
        return $id_reg;
    }

    public function sel($parq_id = '') {
        $this->query = ($parq_id != '')
        ? "SELECT * FROM tbl_parqueadero WHERE parq_id = $parq_id"
        : 'SELECT * FROM tbl_parqueadero ';
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function sel_cupo($cupo_id = '') {
        $this->query = ($parq_id != '')
        ? "SELECT * FROM tbl_cupo WHERE cupo_cod = $cupo_cod"
        : 'SELECT * FROM tbl_cupo';
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function del($parq_id = '') {
        $this->query = "DELETE FROM tbl_parqueadero WHERE parq_id = $parq_id";
        $this->set_query();
    }

}
