<?php 
class RegistroController {
	private $model;

	public function __construct() {
		$this->model = new RegistroModel();
	}
	public function set($regi_data = array()) {
		return $this->model->set($regi_data);
	}
	public function get($regi_cod = '') {
		return $this->model->get($regi_cod);
	}
	public function del($regi_cod = '') {
		return $this->model->del($regi_cod);
	}
}