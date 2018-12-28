<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=0.9">
        <title>Bulletin Bord</title>
        <link rel="stylesheet" type="text/css" href="<?= url('/public/css','styles.css'); ?>">
    </head>
    <body>
    	<div class="container">
    		<h1>
            Bulletin Bord
            <a href="<?= url('/post/create', null); ?>" class="header-menu">+ Create New</a>
            </h1>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            <?php if($datas): ?>
                <?php foreach($datas as $data): ?>
                    <tr>
                    <td><?= $data->id ?></td>
                    <td><a href="<?= url('/post/show/' . $data->id, null); ?>" ><?= mb_strimwidth( $data->title, 0, 10, "...", "UTF-8" ) ?></a></td>
                    <td><?= mb_strimwidth( $data->content, 0, 20, "...", "UTF-8" ) ?></td>
                    <td><?= $data->date ?></td>
                    <td id="td_action">
                        <a href="<?= url('/post/edit/' . $data->id, null); ?>" >[Edit]</a>
                        <a href="<?= url('/post/delete/' . $data->id, null); ?>" >[Delete]</a>
                    </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Not posts yet</li>
            <?php endif ?>
            </table>
    	</div>
    </body>
</html>