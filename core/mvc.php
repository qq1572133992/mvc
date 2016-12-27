<?php 

namespace core;

class mvc
{  
	//临时变量
	public static $classMap = array();
	public $assign;
	public $display;
	static public function run()
	{
		\core\lib\log::init();
		// \core\lib\log::log($_SERVER,'server');

		$route = new \core\lib\route();
		$controller = $route->ctrl;
		$action = $route->action;
		$ctrlFile = APP.'/controller/'.$controller.'Controller.php';
		$ctrlClass = '\\'.MODULE.'\controller\\'.$controller.'Controller';
		if (is_file($ctrlFile)) {
			include $ctrlFile;
			$ctrl = new $ctrlClass();
			$ctrl->$action();
			\core\lib\log::log('controller:'.$controller.'     action:'.$action);
		} else {
			throw new \Exception("找不到次控制器".$controller);
			
		}

	}
	static public function load($class){
		//自动加载类
		//new core\route();
		//$class = '\core\route';
		//MVC.'/core/route.php';
		$class = str_replace('\\', '/', $class);
		$file = MVC.'/'.$class.'.php';
		
		if (isset($classMap[$class])) {
			return true;			
		} else {
			if(is_file($file)){
				include $file;
				self::$classMap[$class] = $class;
			} else {
				return false;
			}
		}
	}
	
	/**
	 * [assign description]
	 * @param  [type] $name  [变量名]
	 * @param  [type] $value [变量值]
	 */
	public 	function assign($name,$value){
		$this->assign[$name] = $value;
	}

	/**
	 * [display description]
	 * @param  [type] $file [文件名]
	 */
	public function display($file){
		$name = $file;
		$file = APP.'/views/'.$file;
		if(is_file($file)){
			\Twig_Autoloader::register();

			$loader = new \Twig_Loader_Filesystem(APP.'/views');
			$twig = new \Twig_Environment($loader, array(
				'cache' => MVC.'/log/twig',
				'debug' => DEBUG
			));
			$template = $twig->loadTemplate($name);
		    $template->display($this->assign?$this->assign:'');
		}
		
	}
}
	
