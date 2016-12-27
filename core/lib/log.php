<?php 
namespace core\lib;
use core\lib\conf;
class log {
	/**
	 * 1.确定日志储存方式
	 *
	 *
	 * 2.写日志
	 */
	static $class;
	static public function init(){
		//确定储存方式
		$drive = conf::get('DRIVE','log');
		$class = '\core\lib\drive\log\\'.$drive;

		self::$class = new $class;
	}
	static public function log($name,$file = 'log'){
		//调用$class里面的log方法
		self::$class->log($name,$file);
	}
}