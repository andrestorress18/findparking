<?php 
class RegistroController {
	private $model;

	public function __construct() {
		$this->model = new RegistroModel();
	}
	public function ins($regi_data = array()) {
		return $this->model->ins($regi_data);
	}
	public function upd($regi_cod = '') {
		return $this->model->upd($regi_cod);
	}
	public function sel($regi_cod = '',$parq_id = '') {
		return $this->model->sel($regi_cod,$parq_id);
	}
	public function del($regi_cod = '') {
		return $this->model->del($regi_cod);
	}
}