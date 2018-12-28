<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=0.9">
        <title><?= $datas->title ?></title>
        <link rel="stylesheet" type="text/css" href="<?= url('/public/css','styles.css'); ?>">
    </head>
    <body>
    	<div class="container">
	    	<h1>
	    		<a href="<?= url('/', null) ?>" class="header-menu">Back</a>
	    		<?= $datas->title ?>
	    	</h1>
    		<form method="post" action="<?= url('/post/update',null); ?>">
    			<input type="hidden" name="id" value="<?= $datas->id ?>">
    			<p>
    				<input type="text" name="title" placeholder="enter title" value="<?= $datas->title ?>">
    			</p>
    			<p>
    				<textarea name="content" placeholder="enter body"><?= $datas->content ?></textarea>
    			</p>
    			<p>
    				<input type="submit" value="Edit">
    			</p>
    		</form>
    	</div>
    </body>
</html>