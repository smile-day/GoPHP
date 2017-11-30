<?php

#定义项目版本（开发，测试，上线）
define('ENVIRONMENT',isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development' );

switch(ENVIRONMENT)
{
	case 'development':
		error_reporting(-1);
		ini_set('display_errors',1);
	break;

	case 'testing':
	case 'production':
		ini_set('display_errors',0);
		error_reporting();

}

#定义项目根目录
define('APP_PATH',__DIR__.DIRECTORY_SEPARATOR);
#调试模式是否开启
define('APP_DEBUG',True);

var_dump($_SERVER);

