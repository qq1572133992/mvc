<?php
/**
 * ����ļ�
 * 1.���峣��
 * 2.���غ�����
 * 3.�������
 */
// echo '123' ;die;
define('MVC', realpath('./'));//��ǰ�������Ŀ¼
define('CORE',MVC.'/core');//��Ŀ�еĺ�����
define('APP',MVC.'/app'); //��Ŀ�ļ�����Ŀ¼
define('MODULE','app'); //������

define('DEBUG',true);
// var_dump(APP);die;
// var_dump(MODULE);die;
include "vendor/autoload.php";

if(DEBUG) {
	$whoops = new \Whoops\Run;
	$errorTitle = '��ܳ�����';
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

spl_autoload_register('\core\mvc::load');//��û��������Զ�ִ��
\core\mvc::run();  










