<?php

defined('SYSTEM_PATH') or exit('No direct script access allowed.');

#引入项目自定义常量脚本
if (file_exists(APP_PATH.'config/constants.php')) {
	require_once(APP_PATH.'config/constants.php');
}

#引入公共的函数脚本
if (file_exists(SYSTEM_PATH.'core/Common.php')) {
	require_once(SYSTEM_PATH.'core/Common.php');
}

#自定义异常情况处理函数
// set_error_handler('_error_handler');
// set_exception_handler('_exception_handler');
// register_shutdown_function('_shutdown_handler');

require_once SYSTEM_PATH.'core/Controller.php';

function &get_instance(){
	return CI_Controller::get_instance();
}

require_once SYSTEM_PATH.'core/Core.php';

$go = new GO();






 
