<?php
class ParqueaderoController {
    private $model;

    public function __construct() {
        $this->model = new ParqueaderoModel();
    }
    public function ins($parq_data = array()) {
        return $this->model->ins($parq_data);
    }
    public function upd($parq_data = array()) {
        return $this->model->upd($parq_data);
    }
    public function upd_cupo($cupo_est,$cupa_cod) {
        return $this->model->upd_cupo($cupo_est,$cupa_cod);
    }
    public function sel($parq_id = '') {
        return $this->model->sel($parq_id);
    }
    public function sel_cupo($parq_id = '',$cupa_est = '') {
        return $this->model->sel_cupo($parq_id,$cupa_est);
    }
    public function del($parq_id = '') {
        return $this->model->del($parq_id);
    }
    
}
