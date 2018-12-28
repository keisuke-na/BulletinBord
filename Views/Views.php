<?php
function view() 
{	
	if(!empty(func_get_args())) extract(func_get_arg(0));
	$cntrlerClass = lcfirst(Routes::$className); // make a string's first character lowercase e.g. Post -> post
	$mthdName = Routes::$mthdName;
	$filePath = "./resources/{$cntrlerClass}.{$mthdName}.php";
	Err::Catch(file_exists($filePath),';´･ω-)つ Not found file.');
	include("./resources/{$cntrlerClass}.{$mthdName}.php");
}

function viewer($file) 
{	
	$filePath = "./resources/{$file}.php";
	Err::Catch(file_exists($filePath),';´･ω-)つ Not found file.');
	include($filePath);
	exit;
}

function error($key){
	return (isset(Controllers::$errors->$key)) ? Controllers::$errors->$key : '';
}

function notice($key){
	return (isset(Controllers::$notice->$key)) ? Controllers::$notice->$key : '';
}
?>