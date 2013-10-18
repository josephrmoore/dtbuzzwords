<?php
	if(!empty($_GET)){
		$up = $_GET['up'];
		$down = $_GET['down'];
		$who = $_GET['who'];
		$value = $_GET['value'];
		
		$object = array();
		$object['up'] = $up;
		$object['down'] = $down;
		$object['who'] = $who;
		$object['value'] = $value;
		
		$text = "{";
		$text .= '"up": '.$up.',';
		$text .= '"down": '.$down.',';
		$text .= '"who": '.$who.',';
		$text .= '"value": '.$value.',';
		$text .= '"type": update_stats';
		$text .= "}";
		
		$file = "buzzwords.json";
		$file_text = file_get_contents($file);
		$file_object = json_decode($file_text);
		foreach($file_object->buzzwords as $word){
			if($word->value == $value && $word->who == $who){
				$word->up = $up;
				$word->down = $down;
			}
		}
		var_dump($file_object);	
		$current = json_encode($file_object);
		file_put_contents($file, $current);
		
		$log = "log.txt";
		$log_text = file_get_contents($file);
		$log_text .= $text;
		var_dump($log_text);
		file_put_contents($log, $log_text);
	}
?>

