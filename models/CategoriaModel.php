<?php
class CategoriaModel extends Model {

    public function set($espe_data = array()) {
        foreach ($espe_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "REPLACE INTO tbl_especie (espe_id, espe_nom, espe_des) VALUES ($espe_id, '$espe_nom', '$espe_des');";
        $id_reg = $this->set_query();
        return $id_reg;
    }
    public function set_clima_especie($espes_query) {
        $this->query = $espes_query;
        $this->set_query();
    }
    public function get($espe_id = '') {
        $this->query = ($espe_id != '')
        ? "SELECT E.* FROM tbl_especie AS E WHERE E.espe_id = $espe_id"
        : 'SELECT E.* FROM tbl_especie AS E';
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function get_clima($clim_id = '') {
        $this->query = ($clim_id != '')
        ? "SELECT * FROM tbl_clima WHERE clim_id = $clim_id"
        : 'SELECT * FROM tbl_clima';
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }

    public function get_clima_especie($espe_id = '') {
        $this->query = ($espe_id != '')
        ? "SELECT EC.*, C.* FROM tbl_clima AS C
INNER JOIN tbl_especie_clima AS EC ON EC.ecli_clim_fk = C.clim_id
WHERE EC.ecli_espe_fk = $espe_id"
        : 'SELECT * FROM tbl_especie_clima';
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    

    public function del($espe_id = '') {
        $this->query = "DELETE FROM tbl_especie WHERE espe_id = $espe_id";
        $this->set_query();
    }

}
