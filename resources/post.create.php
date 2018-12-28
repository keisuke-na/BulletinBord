<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=0.9">
        <title>New Post</title>
        <link rel="stylesheet" type="text/css" href="<?= url('/public/css','styles.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?= url('/public/css','autoComplete.css'); ?>">
    </head>
    <body>
    	<div class="container">
	    	<h1>
	    		<a href="<?= url('/', null) ?>" class="header-menu">Back</a>
	    		New post
	    	</h1>
    		<form method="post" action="<?= url('/post/store',null); ?>">
                <p>
                    <input type="text" name="title" placeholder="enter title">
                </p>
    			<p>
    				<textarea name="content" placeholder="enter content"></textarea>
    			</p>
    			<p>
    				<input type="submit" value="Post">
    			</p>
    		</form>
    	</div>
    </body>
    <script src="<?= url('/public/js','autoComplete.php'); ?>"></script>
</html>