<?php 

namespace core;

class mvc
{  
	//��ʱ����
	public static $classMap = array();
	public $assign;
	public $display;
	static public function run()
	{
		date_default_timezone_set('PRC');
		\core\lib\log::init();
		// \core\lib\log::log($_SERVER,'server');

		$route = new \core\lib\route();
		$controller = $route->ctrl;
		$action = $route->action;
// 		var_dump($action);
// var_dump($controller);die;
		$ctrlFile = APP.'/controller/'.$controller.'Controller.php';
		$ctrlClass = '\\'.MODULE.'\controller\\'.$controller.'Controller';
		if (is_file($ctrlFile)) {
			include $ctrlFile;
			$ctrl = new $ctrlClass();
			$ctrl->$action();
			\core\lib\log::log('controller:'.$controller.'     action:'.$action);
		} else {
			throw new \Exception("�Ҳ����ο�����".$controller);
			
		}

	}
	static public function load($class){
		//�Զ�������
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
	 * @param  [type] $name  [������]
	 * @param  [type] $value [����ֵ]
	 */
	public 	function assign($name,$value){
		$this->assign[$name] = $value;
	}

	/**
	 * [display description]
	 * @param  [type] $file [�ļ���]
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
	
