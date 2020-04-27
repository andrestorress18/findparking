<?php
class UsuarioModel extends Model{

    public function ins($usuario_data = array()) {
        foreach ($usuario_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_usuario (usua_ced,usua_nom,usua_ema,usua_pas,usua_img,usua_rol,usua_est) VALUES ('$usua_ced','$usua_nom','$usua_ema',MD5('$usua_pas'),'$usua_img','$usua_rol','$usua_est')";
         return $this->set_query();
    }

    public function upd($usuario_data = array()) {
        foreach ($usuario_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE tbl_usuario SET usua_ced = '$usua_ced', usua_nom = '$usua_nom', usua_ema = '$usua_ema', usua_rol = '$usua_rol', usua_est = '$usua_est'";
        $this->query .= isset($usua_pas) ? ", usua_pas = MD5('$usua_pas')" : "";
        $this->query .= isset($usua_img) ? ", usua_img = '$usua_img'" : "";
        $this->query .= " WHERE usua_cod = $usua_cod;";
        return $this->set_query();
    }

    public function sel($usua_cod = '') {
        $this->query = ($usua_cod != '') ? "SELECT * FROM tbl_usuario WHERE usua_cod = $usua_cod"
        :"SELECT * FROM tbl_usuario";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    
    public function del($user = '') {
        $this->query = "DELETE FROM tbl_usuario WHERE usua_cod = $user";
        $this->set_query();
    }
    
    public function validate_user($email, $pass) {
        $this->query = "SELECT * FROM tbl_usuario
            WHERE  usua_pas = MD5('$pass') AND usua_ema = '$email'";
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }

}
