<?php 
class CuentasController {
	private $model;

	public function __construct() {
		$this->model = new CuentasModel();
	}
	public function set($plan_data = array()) {
		return $this->model->set($plan_data);
	}
	public function get($cpuc_cate = '') {
		return $this->model->get($cpuc_cate);
	}
	public function get_resultados($cpuc_resul = '') {
		return $this->model->get_resultados($cpuc_resul);
	}
	public function getCategoria($catp_id = '') {
		return $this->model->getCategoria($catp_id);
	}
	public function del($plan_id = '') {
		return $this->model->del($plan_id);
	}
}