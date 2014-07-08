<?php

class HomeController extends BaseController {


	public function index()
	{
		return View::make("home.index");
	}

	public function getShortenUrl(){
		$url=Input::get("url");

		$validation=Url::validation(array('url'=>$url));
		if($validation->fails())
		{
			return Redirect::to('/')->withErrors($validation);
		}

		$existedUrl=Url::where('url','=',$url)->first();

		if($existedUrl)
		{
			return View::make('home.result')->with('result',$existedUrl->shorten);
		}


		$theUrl=new Url;
		$theUrl->url=$url;
		$theUrl->shorten=Url::getRandomCharacters();
		$theUrl->save();

		return View::make('home.result')->with('result',$theUrl->shorten);
	}

	public function getRedirect($url){
		$row=Url::where('shorten','=',$url)->first();
		return Redirect::to($row->url);
	}

}
