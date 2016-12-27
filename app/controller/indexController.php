<?php 
namespace app\controller;
// use app\model\UserModel;
use core\lib\model;
class indexController extends \core\mvc{

	public function index(){
		// var_dump('it is ok');
		// $model = new \app\model\UserModel();
		// $data = $model->lists();
		// dump($data);
		// $res = $model->query($sql);
		// var_dump($res->fetchAll());
		// $temp = \core\lib\conf::get('CTRL','route');
		// $temp = \core\lib\conf::get('ACTION','route');
		// var_dump($temp);
		
		$title = '这是标题';
		$data = 'index';
		$this->assign('title',$title);
		$this->assign('data',$data);
		$this->display('index.html');
	} 
}

