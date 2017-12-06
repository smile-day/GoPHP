<?php

defined('SYSTEM_PATH') or exit('No direct script access allowed.');



//单例模式，全局控制器
class Go_Controller {
	
	private static $instance;

	public function __construct(){
		self::$instance = & $this;
	}

	/**
	 * [get_instance description]
	 * @return [Object] [Go 全局类的一个单例]
	 */
	public static function &get_instance(){
		return self::$instance;
	}
}