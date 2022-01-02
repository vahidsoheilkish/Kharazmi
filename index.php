<?php
define("test" , true);
require_once(getcwd() . "/system/loader.php");

$uri = getUri();
$uri = str_replace("/nano-v2/" , "/" , $uri);

switch($uri){
	case '/':
		$uri = "/home/home";
	break;
	
	case '/admin':
		$uri = "/admin/login";
	
	case '/admin/':
		$uri = "/admin/login";
	break;
}


$route = $config['route'];
$counterCheck = 0;
foreach ($route as $value) {
	if(preg_match("/".$value."/" , $uri)){
	    ++$counterCheck;
	}
}

if($counterCheck < 1 ){
    $data['title'] = "404";
    echo '
		<body style="margin:0px !important;">
		<div style="position: absolute; margin:0; padding:0; overflow:hidden; width:100%; height:100%; background: url('.baseUri().'/image/404.jpg) no-repeat center; background-size: cover;">
			<a href="'.baseUri().'/home/home" class="btn btn-warning btn-lg" style="position: relative; color:white; text-decoration:none; font-family: tahoma; top:92%; left:1%; ">بازگشت به صفحه اصلی</a>
		</div>
		</body>
    ';
    exit;
}
//$uri = urldecode($uri);
//foreach ($route as $alias=>$target){
//    $alias = '^' . $alias;
//    $alias = str_replace('/' , '\/' , $alias);
//    if (preg_match('/'.$alias.'/' ,  $uri)) {
//        $uri = preg_replace('/' . $alias .'/' , $target , $uri);
//    }
//}
$parts = explode('/' , $uri);
$controller = $parts[1];
$method     = $parts[2];

// echo $controller.'<br />';
// echo $method.'<br />';
// exit;

$params = array();
for($i=3 ; $i< count($parts) ; $i++){
    $params[] = $parts[$i];
}


$control = ucfirst($controller) . "Controller";
$className = new $control();

call_user_func_array( array($className , $method) , array($params) );


?>