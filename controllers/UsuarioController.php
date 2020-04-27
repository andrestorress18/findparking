<?php
class UsuarioController {
	private $model;

	public function __construct() {
		$this->model = new UsuarioModel();
	}
	public function ins($usuario_data = array()) {
		return $this->model->ins($usuario_data);
	}
	public function upd($usuario_data = array()) {
		return $this->model->upd($usuario_data);
	}
	public function set_pass($pass_data = array()) {
		return $this->model->set_pass($pass_data);
	}
	public function sel($user = '') {
		return $this->model->sel($user);
	}
	public function del($user = '') {
		return $this->model->del($user);
	}
}