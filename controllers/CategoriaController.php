<?php
class CategoriaController {
    private $model;

    public function __construct() {
        $this->model = new CategoriaModel();
    }
    
    public function set($espe_data = array()) {
        return $this->model->set($espe_data);
    }

    public function set_clima_especie($espe_data = array()) {
        return $this->model->set_clima_especie($espe_data);
    }

    public function get($espe = '') {
        return $this->model->get($espe);
    }

    public function get_clima($clim_id = '') {
        return $this->model->get_clima($clim_id);
    }
    
    public function get_clima_especie($espe_id = '') {
        return $this->model->get_clima_especie($espe_id);
    }

    public function del($espe = '') {
        return $this->model->del($espe);
    }
    
}
