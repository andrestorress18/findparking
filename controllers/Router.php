<?php
class Router{
    public $route;

    public function __construct($route){
        $session_options = array(
            'use_only_cookies' => 1,
            'read_and_close'   => true,
        );
        if (!isset($_SESSION)) {
            session_start($session_options);
            $_SESSION['Sesion'] = false;
        }
        if (!isset($_SESSION['Sesion'])) $_SESSION['Sesion'] = false;
        if ($_SESSION['Sesion'] == true) {
            $this->route = isset($_GET['r']) ? $_GET['r'] : 'inicio';
            $controller  = new ViewController();
            switch ($this->route) {
                case 'login':
                    $controller->load_page('login');
                    break;
                case 'inicio':
                    $controller->load_view('inicio');
                    break;
                case 'mapa-parking':
                    $controller->load_view('mapa-parking');
                    break;
                case 'facturar':
                    if (!isset($_POST['crud'])) $controller->load_view_user('facturar');
                    else if ($_POST['crud'] == 'add') $controller->load_page('actions-planta');
                    else if ($_POST['crud'] == 'del') $controller->load_page('actions-planta');
                    else if ($_POST['crud'] == 'edi') $controller->load_page('actions-planta');
                    break;
                case 'ayuda':
                    if (!isset($_POST['crud'])) $controller->load_view_user('ayuda');
                    else if ($_POST['crud'] == 'add') $controller->load_page('actions-planta');
                    else if ($_POST['crud'] == 'del') $controller->load_page('actions-planta');
                    else if ($_POST['crud'] == 'edi') $controller->load_page('actions-planta');
                    break;
                case 'usuarios':
                    if (!isset($_POST['crud'])) $controller->load_view_user('usuarios');
                    else if ($_POST['crud'] == 'add') $controller->load_page('actions-usuario');
                    else if ($_POST['crud'] == 'del') $controller->load_page('actions-usuario');
                    else if ($_POST['crud'] == 'edi') $controller->load_page('actions-usuario');
                    else if ($_POST['crud'] == 'edit-pass') $controller->load_page('actions-usuario');
                    break;
                case 'escritorio':
                    if (!isset($_POST['crud'])) $controller->load_view_user('escritorio');
                    else if ($_POST['crud'] == 'add') $controller->load_page('actions-categoria');
                    else if ($_POST['crud'] == 'del') $controller->load_page('actions-categoria');
                    else if ($_POST['crud'] == 'edi') $controller->load_page('actions-categoria');
                    else if ($_POST['crud'] == 'val') $controller->load_page('actions-categoria');
                    else if ($_POST['crud'] == 'view') $controller->load_view('view-categoria');
                    else if ($_POST['crud'] == 'edit-pass') $controller->load_page('actions-usuario');
                    break;
                case 'cerrar':
                    $user_session = new SessionController();
                    $user_session->logout();
                    break;
                default:
                    $controller->load_view('inicio');
                    break;
            }
        } else {
            $this->route = isset($_GET['r']) ? $_GET['r'] : 'inicio';
                $controller  = new ViewController();
                switch ($this->route) {
                    case 'login':
                        
                        if (!isset($_POST['email']) && !isset($_POST['pass'])) {
                            $controller->load_page('login');
                        } else {
                            
                            
                            $user_session = new SessionController();
                            $session      = $user_session->login($_POST['email'], $_POST['pass']);
                            if (empty($session)) {
                                header('Location: ./login&error=El usuario ' . $_POST['email'] . ' y el password proporcionados no coinciden.');
                            }else {
                                $_SESSION['Sesion']   = true;
                                $_SESSION['usua_id'] = $session[0]['usua_cod'];
                                $_SESSION['usua_ced'] = $session[0]['usua_ced'];
                                $_SESSION['usua_ema'] = $session[0]['usua_cor'];
                                $_SESSION['usua_tel'] = $session[0]['usua_tel'];
                                $_SESSION['usua_pas'] = $session[0]['usua_con'];
                                $_SESSION['usua_img'] = $session[0]['usua_img'];
                                $_SESSION['usua_nom'] = $session[0]['usua_nom'];
                                $_SESSION['usua_dir'] = $session[0]['usua_dir'];
                                $_SESSION['usua_rol'] = $session[0]['usua_rol'];
                                header('Location: ./resultados');
                            }
                        }
                        break;
                    case 'mapa-parking':
                        $controller->load_view('mapa-parking');
                        break;
                    default: 
                        $controller->load_view('inicio');
                        break;
                    }
            
        }
    }
}
