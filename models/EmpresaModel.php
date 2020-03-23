<?php
class EmpresaModel extends Model {
	
	public function set($empresa_data= array()){
       
    }

	public function get($empre_cod = '') {
		$this->query = ($empre_cod != '')
		?"SELECT * FROM tbl_entidad WHERE enti_cod = $empre_cod"
    	:"SELECT * FROM tbl_entidad";
		$this->get_query();
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		//var_dump($data);
		return $data;
	}
	public function del(){}
}

