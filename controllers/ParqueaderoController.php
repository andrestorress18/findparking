<?php
class ParqueaderoController {
    private $model;

    public function __construct() {
        $this->model = new ParqueaderoModel();
    }
    public function ins($parq_data = array()) {
        return $this->model->ins($parq_data);
    }
    public function set_detalle($parq_query) {
        return $this->model->set_detalle($parq_query);
    }
    public function upd($parq_data = array()) {
        return $this->model->upd($parq_data);
    }
    public function sel($parq_id = '') {
        return $this->model->sel($parq_id);
    }
    public function sel_cupo($cupo_cod = '') {
        return $this->model->sel_cupo($cupo_cod);
    }
    public function del($parq_id = '') {
        return $this->model->del($parq_id);
    }
    
}
