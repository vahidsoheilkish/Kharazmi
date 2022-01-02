<?php

class View{

    public static function render($filePath , $data = array() ){
        extract($data);

        ob_start();
        require_once(getcwd() .'/mvc/view/' . $filePath . '.php');
        $content = ob_get_clean();
        require_once(getcwd() .'/theme/default.php');
    }

    public static function render2($filePath , $data = array() ){
        extract($data);

        ob_start();
        require_once(getcwd() .'/mvc/view/' . $filePath . '.php');
        $content = ob_get_clean();
        require_once(getcwd() .'/theme/simple.php');
    }

    public static function renderPanel($filePath , $data = array() ){
    	extract($data);

    	ob_start();
    	require_once(getcwd() .'/mvc/view/' . $filePath . '.php');
    	$panel = ob_get_clean();
    	require_once(getcwd() .'/theme/admin.php');
    }

    public static function login($filePath , $data = array() ){
        extract($data);

        ob_start();
        require_once(getcwd() .'/mvc/view/' . $filePath . '.php');
        $panel = ob_get_clean();
        require_once(getcwd() .'/theme/login.php');
    }

    public static function showMessage($type , $data = array()){
        extract($data);
        ob_start();
        require_once(getcwd() .'/mvc/view/message/'.$type.'.php');
        $msg = ob_get_clean();

        require_once(getcwd() .'/theme/message.php');
    }


}


?>