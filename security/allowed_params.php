<?php

function allowed_post_params($allowed_params=[]) {
	$allowed_array = [];
	foreach($allowed_params as $param) {
		if(isset($_POST[$param])) {
			$allowed_array[$param] = $_POST[$param];
		} else {
			$allowed_array[$param] = NULL;
		}
	}
	return $allowed_array;
}

?>
