<?php
class EmpresaController {
	private $model;
	
	public function __construct() {
		$this->model = new EmpresaModel();
	}

	public function get($empre_cod = '') {
		return $this->model->get($empre_cod);
	}

	public function set($prov_data = array()) {
		return $this->model->set($prov_data);
	}

	public function del($plan_id = '') {
		return $this->model->del($plan_id);
	}	
}