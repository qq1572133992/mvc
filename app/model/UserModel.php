<?php  
namespace app\model;
use core\lib\model;
class UserModel extends model{
	public $table = 'user';
	public function lists(){
		$res = $this->select($this->table,'*');
		return $res;
	}
	public function getOne($id){
		$res = $this->get($this->table,'*',array(
			'id'=>$id
		));
	}
	public function setOne($id,$data){
		return $this->update($this->table,$data);
	}
}