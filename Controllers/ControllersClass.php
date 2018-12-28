<?php
class Index {
	/**
	*
	*
		for http://hogehoge.net/
	*/
	public static function show()
	{
		$board = new DB('sample_tb');
		$datas = $board->findAll();
		view(['datas' => $datas]);
	}
}

class Post {
	/**
	*
	*
		for http://hogehoge.net/post/create
	*/
	public static function create()
	{
		//Show post.create.php to user 
		view();
	}
	
	/**
	*
	*
		for http://hogehoge.net/post/store
	*/
	public static function store()
	{
		$sample_tb = new DB('sample_tb');
		$data = array(
			'title' => P('title'),
			'content' => P('content'),
			'date' => date('Y-m-d'),
		);
		$sample_tb->create($data);

		//redirect to http://hogehoge/
		return redirect(url('/', null));
	}

	/**
	*
	*
		for http://hogehoge.net/post/show/{id}
	*/
	public static function show()
	{
		$board = new DB('sample_tb');
		$datas = $board->findId(G('id'));
		view(['blog' => $datas]);
	}

	/**
	*
	*
		for http://hogehoge.net/post/edit/{id}
	*/
	public static function edit()
	{
		$board = new DB('sample_tb');
		$datas = $board->findId(G('id'));
		view(['datas' => $datas]);
	}

	/**
	*
	*
		for http://hogehoge.net/post/update/
	*/
	public static function update()
	{
		$board = new DB('sample_tb');
		$data = $board->findId(P('id'));
		$data->title = P('title');
		$data->content = P('content');
		$data->date = date('Y-m-d');
		$data->save();
		return redirect(url('/', null));
	}

	/**
	*
	*
		for http://hogehoge.net/post/delete/{id}
	*/
	public static function delete()
	{
		$board = new DB('sample_tb');
		$data = $board->findId(G('id'));
		$data->delete();
		return redirect(url('/', null));
	}
}
?>