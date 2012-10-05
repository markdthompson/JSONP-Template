<?php
// get the callback function name
$callback = '';
$resource = '';
if (isset($_GET['callback'])){
	$callback = filter_var($_GET['callback'], FILTER_SANITIZE_STRING);
}
if (isset($_GET['r'])){
	$resource = filter_var($_GET['r'], FILTER_SANITIZE_STRING);
}
     
// make an array with our return values
$data = array(
	'anumber' => rand(1,100),
	'astring' => 'Hello '.$resource.'!',
	'aboolean' => (rand(0,1))?true:false
);

// encode the array as json and pad it with the callback function name and enclosing parentheses
if(!empty($callback)){
	echo $callback . '('.json_encode($data).');';
} else { // no callback sent so it's straight json - no padding
	echo json_encode($data);
}