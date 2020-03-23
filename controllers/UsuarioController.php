<?php
class UsuarioController {
	private $model;

	public function __construct() {
		$this->model = new UsuarioModel();
	}
	public function set($usuario_data = array()) {
		return $this->model->set($usuario_data);
	}
	public function add($usuario_data = array()) {
		return $this->model->add($usuario_data);
	}
	public function set_pass($pass_data = array()) {
		return $this->model->set_pass($pass_data);
	}
	public function get($user = '') {
		return $this->model->get($user);
	}
	public function get_enti($enti = '') {
		return $this->model->get_enti($enti);
	}
	public function del($user = '') {
		return $this->model->del($user);
	}
}