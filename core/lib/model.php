<?php  
namespace core\lib;
use \core\lib\conf;
class model extends \medoo{
	public function __construct(){
		$temp = conf::all('database');
		parent::__construct($temp);
		// $dsn = 'mysql:host=localhost;dbname=ltyhose';
		// $username = 'root';
		// $passwd = 'root';
		// $temp = conf::all('database');
		// var_dump($temp);
		// try {
		// 	parent::__construct($temp['DSN'],$temp['USERNAME'],$temp['PASSWD']);
		// } catch (\PDOException $e) {
		// 	var_dump($e->getMessage());
		// }
		
	}
}

