<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */
// echo '123' ;die;
define('MVC', realpath('./'));//当前框架所在目录
define('CORE',MVC.'/core');//项目中的函数库
define('APP',MVC.'/app'); //项目文件所在目录
define('MODULE','app'); //控制器

define('DEBUG',true);
 // var_dump(APP);die;
// var_dump(MODULE);die;
include "vendor/autoload.php";

if(DEBUG) {
	$whoops = new \Whoops\Run;
	$errorTitle = '框架出错了';
	$option = new \Whoops\Handler\PrettyPageHandler();
	$option->setPageTitle($errorTitle);
	$whoops->pushHandler($option);
	$whoops->register();
	ini_set('display_error','On');
} else {
	ini_set('display_error','Off');
}
// dump($_SERVER);exit();
include CORE.'/common/function.php';
include CORE.'/mvc.php';

spl_autoload_register('\core\mvc::load');//当没有这个类自动执行
\core\mvc::run();  










