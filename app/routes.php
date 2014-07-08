<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make("home.index");
});

Route::post('/', function()
{
	$url=Input::get("url");

	$validation=Validator::make(
		array(
			'url'=>$url
			),
		array(
			'url'=>'required|url'
			)
		);

	if($validation->fails())
	{
		return Redirect::to('/')->withErrors($validation);
	}

	$existedUrl=Url::where('url','=',$url)->first();

	if($existedUrl)
	{
		return View::make('home.result')->with('result',$existedUrl->shorten);
	}

	function getRandomCharacters()
	{
		$rand = substr(md5(microtime()),rand(0,26),5);

		if(Url::where('shorten','=',$rand)->first())
		{
			return getRandomCharacters();
		}

		return $rand;
	}

	$theUrl=new Url;
	$theUrl->url=$url;
	$theUrl->shorten=getRandomCharacters();
	$theUrl->save();

	return View::make('home.result')->with('result',$theUrl->shorten);
	

});

Route::get("{url}",function($url)
{
	$row=Url::where('shorten','=',$url)->first();
	return Redirect::to($row->url);
});


