<?php
	function p($val){
		if (is_bool($val)) {
			var_dump($val);
		} else if (is_null($val)){
			var_dump(null);
		} else {
			die;
		}
	}
?>