<?php
/********************************************************
This is Main of routing file.
Tha's why all access are catched by this file.
********************************************************/

/********************************************************
This file is main file of ruting.
If you access "http://~~/ququ/sayHi",Controller of "sayHi" is
excuted by this class. This class is in './Routes/RoutesClass.php';
********************************************************/
require_once('./Routes/RoutesClass.php');

/********************************************************
This is class of error hundling.You can catch error by useing 
ErrHundler::Catch().
 After that you can get error message,if you excute 
 ErrHundler::getErrMessage()
********************************************************/
require_once('./Config/ErrClass.php');

/********************************************************
Class of Controllers is automatically excuted by RoutesClass.
You have to put $url name of method for ControllersClass
of method.
E.G:
"http://~~/ququ/sayHi" -> Controllers::sayHi();
********************************************************/
require_once('./Controllers/ControllersClass.php');

/********************************************************
Class of database.Easy to hundle database.
********************************************************/
require_once('./models/DBClass.php');

/********************************************************
Views file can display template.Template file is in resou-
rces and display data of request.You can display data of re-
quest,when you put "<?= input($property) ?>" on template file.
********************************************************/
require_once('./Views/Views.php');

/********************************************************
e.g. dire($extension,$filename) -> dire('css','styles.css')
	 return './public/css/styles.css'
e.g. easy to put directory. 
<link rel="stylesheet"...href="<?= dire('css','styles')">
********************************************************/
require_once('./Config/Redirect.php');
require_once('./Config/DBConfig.php');


Routes::route('index', 'Index@show');
Routes::route('post/create', 'Post@create');
Routes::route('post/store', 'Post@store');
Routes::route('post/show/{id}', 'Post@show');
Routes::route('post/edit/{id}', 'Post@edit');
Routes::route('post/update', 'Post@update');
Routes::route('post/delete/{id}', 'Post@delete');
echo '(*´･ω･`) Not found';
?>