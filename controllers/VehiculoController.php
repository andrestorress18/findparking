<?php 
class VehiculoController {
	private $model;

	public function __construct() {
		$this->model = new VehiculoModel();
	}
	public function ins($vehi_data = array()) {
		return $this->model->ins($vehi_data);
	}
	public function upd($vehi_cod = '') {
		return $this->model->upd($vehi_cod);
	}
	public function sel($vehi_cod = '') {
		return $this->model->sel($vehi_cod);
	}
	public function del($vehi_cod = '') {
		return $this->model->del($vehi_cod);
	}
}