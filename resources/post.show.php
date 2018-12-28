<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=0.9">
        <title><?= $blog->title ?></title>
        <link rel="stylesheet" type="text/css" href="<?= url('/public/css','styles.css'); ?>">
    </head>
    <body>
    	<div class="container">
    		<h1>
               <a href="<?= url('/', null) ?>" class="header-menu">Back</a> 
                <span id="title"><?= $blog->title ?></span><br>
    			<?= $blog->date ?>
    		</h1>
            	<p><?= replaceBR($blog->content) ?></p>
    	</div>
    </body>
</html>