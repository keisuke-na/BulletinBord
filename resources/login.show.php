<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=0.9">
        <title>New Post</title>
        <link rel="stylesheet" type="text/css" href="<?= url('/public/css','styles.css'); ?>">
    </head>
    <body>
    	<div class="container">
	    	<h1>
	    		<a href="<?= url('/', null) ?>" class="header-menu">Back</a>
	    		Sign in/Sign up
	    	</h1>
            <h3 class="errors"><?= error('error') ?></h3>
            <h3>Sign in</h3>
    		<form method="post" action="<?= url('/login/signin',null); ?>">
    			<p>
    				<input type="text" name="name" placeholder="enter user_name">
                    <span class="error"></span>
    			</p>
    			<p>
                    <input type="password" name="passwd" placeholder="enter password">
                    <span class="error"></span>
    			</p>
    			<p>
    				<input type="submit" value="sign in">
    			</p>
    		</form>

            <h3>Sign up</h3>
            <form method="post" action="<?= url('/login/signup',null); ?>">
                <p>
                    <input type="text" name="name" placeholder="enter user_name">
                    <span class="error"></span>
                </p>
                <p>
                    <input type="password" name="passwd" placeholder="enter password">
                    <span class="error"></span>
                </p>
                <p>
                    <input type="password" name="verify_pw" placeholder="enter confirm password">
                    <span class="error"></span>
                </p>
                <p>
                    <input type="submit" value="sign in">
                </p>
            </form>
    	</div>
    </body>
</html>