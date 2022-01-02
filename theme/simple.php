<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="true">

    <link rel="stylesheet" href="<?=baseUri()?>/asset/css/style.css" />
    <link rel="stylesheet" href="<?=baseUri()?>/asset/css/main.css" />
    <link rel="stylesheet" href="<?=baseUri()?>/asset/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?=baseUri()?>/asset/bootstrap/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="<?=baseUri()?>/asset/bootstrap/css/bootstrap-reboot.css" />
    <script src="<?=baseUri()?>/asset/js/jquery-1.11.3.min.js"></script>
    <script src="<?=baseUri()?>/asset/bootstrap/bootstrap.min.js"></script>
    <script src="<?=baseUri()?>/asset/bootstrap/popper.js"></script>
    <script src="<?=baseUri()?>/asset/bootstrap/dropdown.js"></script>

    <link rel="stylesheet" type="text/css" href="<?=baseUri()?>/asset/sliderengine/amazingslider-1.css">
    <script src="<?=baseUri()?>/asset/sliderengine/jquery.js"></script>
    <script src="<?=baseUri()?>/asset/sliderengine/amazingslider.js"></script>
    <script src="<?=baseUri()?>/asset/sliderengine/initslider-1.js"></script>

    <link rel="stylesheet" href="<?=baseUri()?>/asset/index_files/mbcsmbmcp.css" type="text/css" />

    <title>
        <?
        if( !isset($data['title']) ){
            echo "";
        }else{
            echo $data['title'];
        }
        ?>
    </title>
    <style>
		*{
			display:none;
		}
    </style>
    <script type="text/javascript" src="/asset/index_files/mbjsmbmcp.js"></script>
<body>
    <?=$content?>
</body>
</html>
