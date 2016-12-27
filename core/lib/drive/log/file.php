<?php 
namespace core\lib\drive\log;
use core\lib\conf;
class file {
	public $path; #日志存储位置   是一个路径。
	public function __construct(){
		 $conf = conf::get('OPTION','log');
		 $this->path = $conf['PATH'];
	}
	public function log($message,$file = 'log'){
		/**
		 * 1.确定文件储存位置是否存在
		 * 		新建目录
		 * 2.写入日志
		 * $file 文件名
		 * $message 存储的数据
		 * PHP_EOL 特定的换行符
		 * FILE_APPEND 防止存储的数据覆盖
		 */
		
		if(!is_dir($this->path.date('YmdH'))){
			mkdir($this->path.date('YmdH'),'0777',true);			
		}
		return file_put_contents($this->path.date('YmdH').'/'.$file.'.php',date('Y-m-d H:i:s').json_encode($message).PHP_EOL,FILE_APPEND);
	}
}

 