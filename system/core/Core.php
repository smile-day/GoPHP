<?php

/**
* 
*/
class Go 
{
	
	function __construct()
	{	
		spl_autoload_register(array($this,'loadClass'));
		$this->callHook();
	}

	private function callHook (){
		if (!empty($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
			$request_url = explode('?',strtolower(str_replace($_SERVER['SCRIPT_NAME'],'',$_SERVER['REQUEST_URI'])));
			$request_url = array_values(array_filter(explode('/', $request_url[0])));
			if (count($request_url) < 2) {
				exit('请求不存在！');
			}
			$controller = ucfirst($request_url[0]);
			$action     = $request_url[1];
		}else{
			$controller = 'Welcome';
			$action     = 'index';
		}
		$controller = new $controller();
		if (method_exists($controller,$action)) {
			$controller->$action();
		}else{
			die('请求方法不存在！');
		}
	}

	private static function loadClass($class){
		$go_core = SYSTEM_PATH.$class.'.php';
		$controller = APP_PATH.'controller'.DIRECTORY_SEPARATOR.$class.'.php';
		$model = APP_PATH.'model'.DIRECTORY_SEPARATOR.$class.'.php';
		if (file_exists($go_core)) {
			require_once($go_core);
		}elseif (file_exists($controller)) {
			require_once($controller);
		}elseif (file_exists($model)) {
			require_once($model);
		}else{
			die('非法请求！');
		}
	}
}