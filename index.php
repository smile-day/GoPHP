<?php

#定义项目版本（开发，测试，上线）
define('ENVIRONMENT',isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development' );
//define('ENVIRONMENT','production');
switch(ENVIRONMENT)
{
	case 'development':
		error_reporting(-1);
		ini_set('display_errors',1);
	break;

	case 'testing':
	case 'production':
		ini_set('display_errors',0); //将日志写在php_error.log文件中了
		if (version_compare(PHP_VERSION,'5.3','>')) {
			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
		}else{
			error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
		}
	break;

	default:
		header('HTTP/1.1 503 Service Unavailable.',True,503);
		echo 'The application environment is not set correctly.';
		exit(1); //EXIT_ERROR
}

#定义项目根目录
define('APP_PATH','app'.DIRECTORY_SEPARATOR);
#调试模式是否开启
define('APP_DEBUG',TRUE);
#定义系统目录
define('SYSTEM_PATH', 'system'.DIRECTORY_SEPARATOR);
#定义项目视图目录
define('VIEW_PATH','app/views'.DIRECTORY_SEPARATOR);

require_once(SYSTEM_PATH.'core/GoPhp.php');

