<?php 
namespace core\lib;
header('content-type:text/html;charset=utf-8');
class conf { 
	static $conf = array();//将配置文件放入$conf
	static public function get($name,$file){
		$file = MVC.'\core\config\\'.$file.'.php';
			// var_dump(self::$conf);
		if (isset(self::$conf[$file])) {
			return self::$conf[$file][$name];	
		} else {
			// var_dump('1');
			if (is_file($file)) {
				$conf = include $file;
				if (isset($conf[$name])) {
					self::$conf[$file] = $conf;
					return $conf[$name]; 
				} else {
					throw new \Exception("没有这个配置文件", 1);						
				}
			} else {
				throw new \Exception("找不到配置文件", 1);
			}
		}
	}
	//直接引入一个配置文件
	static public function all($file){
		if(isset(self::$conf[$file])){
			return self::$conf[$file];
		} else {
			$path = MVC.'\core\config\\'.$file.'.php';
			// var_dump($path);
			if (is_file($path)) {
				//如果存在 将配置放入config
				$conf = include $path;
				self::$conf[$file] = $conf;
				return $conf;
			} else {
				throw new \Exception("没有这个配置文件", 1);					
			}
			// self::$conf[$file] = $conf[$file];
		}
	}
}
