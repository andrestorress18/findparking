<?php 
class ViewController {
	private static $view_path = './views/';
	public function load_view($view) {
		require_once(self::$view_path.'head.php');
		require_once(self::$view_path.$view.'.php');
		require_once(self::$view_path.'footer.php');
	}
	public function load_view_user($view) {
		require_once(self::$view_path.'head-user.php');
		require_once(self::$view_path.$view.'.php');
		require_once(self::$view_path.'footer-user.php');
	}
	public function load_page($view) {
		require_once(self::$view_path.$view.'.php');
	}
}